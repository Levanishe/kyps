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
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:55'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'confirmed', 'min:3'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']), 
        ]);

        $user->sendEmailVerificationNotification();

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    // Метод для отображения формы входа
    public function showLoginForm()
    {
        return view('user.users.login');
    }

    // Метод для обработки входа
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);
    
        // Преобразование значения remember в логический тип
        $remember = $request->has('remember');
    
        // Проверка учетных данных
        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $user = Auth::user();
    
            // Проверка, верифицирован ли email
            if (!$user->hasVerifiedEmail()) {
                Auth::logout();
                return view('user.users.register');
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
