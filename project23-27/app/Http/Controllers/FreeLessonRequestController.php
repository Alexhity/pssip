<?php

namespace App\Http\Controllers;
use App\Models\FreeLessonRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class FreeLessonRequestController extends Controller
{
    // Показ формы
    public function showForm()
    {
        $languages = Language::all();
        return view('welcome', compact('languages'));
    }

    // Обработка отправки
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'language_id' => 'required|exists:languages,id'
        ]);

        FreeLessonRequest::create($validated);

        return back()->with('success', 'Заявка успешно отправлена!');
    }
}
