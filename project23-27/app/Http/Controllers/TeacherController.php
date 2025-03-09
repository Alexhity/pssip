<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class TeacherController extends Controller
{
    public function index()
    {
        // Получаем всех пользователей с ролью "teacher"
        $teachers = User::where('role', 'teacher')
            ->select('first_name', 'last_name', 'email') // Выбираем нужные поля
            ->get();

        return view('teachers.index', compact('teachers'));
    }
}
