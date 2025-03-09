<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\FreeLessonRequestController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;


// Главная страница
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Курсы
Route::get('/courses', [App\Http\Controllers\CourseController::class, 'index'])->name('courses.index');

// Преподаватели
Route::get('/teachers', function () {
    return view('teachers');
})->name('teachers');

// О школе
Route::get('/about', function () {
    return view('about');
})->name('about');

// Аутентификация (встроенные маршруты Laravel)
Auth::routes();


// Форма для заявки
Route::get('/', [FreeLessonRequestController::class, 'showForm'])->name('home');
// Обработка отправки формы
Route::post('/free-lesson-request', [FreeLessonRequestController::class, 'store'])->name('free-lesson.store');




// Форма для ввода email
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');

// Обработка отправки
Route::post('/contact', [ContactController::class, 'sendEmail'])->name('contact.send');


Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');





// Каталог курсов
Route::get('/courses', [CourseController::class, 'index'])->name('courses.index');

// Корзина
Route::post('/courses/cart/add/{course}', [CourseController::class, 'addToCart'])->name('cart.add');
Route::get('/courses/cart/remove/{courseId}', [CourseController::class, 'removeFromCart'])->name('cart.remove');

// Оформление заказа
Route::post('/checkout', [CourseController::class, 'checkout'])->name('checkout');
