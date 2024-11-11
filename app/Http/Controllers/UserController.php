<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Метод для отображения формы регистрации
    public function showRegistrationForm()
    {
        return view('users.register');
    }

    public function register(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        // Создание нового пользователя
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Аутентификация пользователя
        Auth::login($user);

        // Перенаправление после успешной регистрации
        return redirect()->route('/tours'); // Или любой другой маршрут
    }


    // Метод для отображения формы входа
    public function showLoginForm()
    {
        return view('users.login');
    }

    // Метод для обработки входа
    public function login(Request $request)
    {
        // Валидация входящих данных
        $request->validate([
            'email' => ['required', 'string', 'email'],
            'password' => ['required', 'string'],
        ]);

        // Проверка учетных данных
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('dashboard'); // Перенаправление на нужную страницу
        }

        return back()->withErrors([
            'email' => 'Ошибка входа. Пожалуйста, проверьте свои учетные данные.',
        ]);
    }

    // Метод для выхода
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login'); // Перенаправление на страницу входа
    }
}
