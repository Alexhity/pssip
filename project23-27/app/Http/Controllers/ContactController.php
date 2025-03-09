<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmation;

class ContactController extends Controller
{
    // Показать форму
    public function showForm()
    {
        return view('contact.form');
    }

    // Отправить письмо
    public function sendEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        $email = $request->input('email');

        // Отправляем письмо
        Mail::to($email)->send(new ContactConfirmation());

        return redirect()->back()->with('success', 'Письмо успешно отправлено! Мы свяжемся с вами в ближайшее время.');
    }
}
