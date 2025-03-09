<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Language;
use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderItem;

class CourseController extends Controller
{
    public function index(Request $request)
    {
        $query = Course::with(['teacher', 'language']);

        // Поиск
        if ($request->has('search')) {
            $query->where('title', 'like', '%' . $request->search . '%');
        }

        // Фильтры
        if ($request->filled('language')) {
            $query->whereHas('language', function ($q) use ($request) {
                $q->where('name', $request->language);
            });
        }

        if ($request->filled('teacher')) {
            $query->whereHas('teacher', function ($q) use ($request) {
                $q->where('id', $request->teacher);
            });
        }

        // Сортировка
        $sort = $request->get('sort', 'title');
        $order = $request->get('order', 'asc');
        $query->orderBy($sort, $order);

        $courses = $query->paginate(9);
        $languages = Language::all();
        $teachers = User::where('role', 'teacher')->get();

        // Получаем корзину из сессии
        $cart = session()->get('cart', []);

        return view('courses.index', compact(
            'courses',
            'languages',
            'teachers',
            'sort',
            'order',
            'cart'
        ));
    }

    public function addToCart(Request $request, Course $course)
    {
        $cart = session()->get('cart', []);

        // Добавляем курс в корзину
        $cart[$course->id] = [
            'id' => $course->id,
            'title' => $course->title,
            'price' => $course->price,
        ];

        session()->put('cart', $cart);

        return redirect()->route('courses.index')->with('success', 'Курс добавлен в корзину!');
    }

    public function removeFromCart($courseId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$courseId]);
        session()->put('cart', $cart);

        return redirect()->route('courses.index')->with('success', 'Курс удален из корзины!');
    }

    public function checkout(Request $request)
    {
        // Проверка авторизации
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Для оформления заказа войдите в систему.');
        }

        $cart = session()->get('cart', []);

        // Если корзина пуста
        if (empty($cart)) {
            return redirect()->back()->with('error', 'Корзина пуста!');
        }

        // Создаем заказ
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => array_sum(array_column($cart, 'price')),
        ]);

        // Добавляем элементы заказа
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'course_id' => $item['id'],
                'price' => $item['price'],
            ]);
        }

        // Очищаем корзину
        session()->forget('cart');

        return redirect()->route('courses.index')->with('success', 'Заказ успешно оформлен!');
    }
}
