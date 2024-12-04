<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    // Метод для отображения формы регистрации
    public function showRegistrationForm()
    {
        return view('user.users.register');
    }

    public function register(Request $request)
    {
        // Валидация входящих данных
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed'],
        ]);

        // Создание нового пользователя
        $user = User::create($request->all());

        // Отправка уведомления о подтверждении email
        $user->sendEmailVerificationNotification();

        // Аутентификация пользователя
        Auth::login($user);

        // Перенаправление после успешной регистрации
        return redirect()->route('verification.notice'); // Или любой другой маршрут
    }

    // Метод для отображения формы входа
    public function showLoginForm()
    {
        return view('user.users.login');
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
            $user = Auth::user();

            // Проверка, верифицирован ли email
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                throw ValidationException::withMessages([
                    'email' => 'Вы должны подтвердить свою электронную почту, прежде чем входить.',
                ]);
            }

            return redirect()->route('user.tours.index'); // Перенаправление на нужную страницу
        }

        return back()->withErrors([
            'email' => 'Ошибка входа. Пожалуйста, проверьте свои учетные данные.',
        ]);
    }

    // Метод для выхода
    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.tours.index'); // Перенаправление на страницу входа
    }
}
