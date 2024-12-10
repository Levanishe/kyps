<?php
namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class UserController extends Controller
{
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

        try {
            $user->sendEmailVerificationNotification();
        } catch (Exception $e) {
            Log::error('Ошибка отправки уведомления о верификации: ' . $e->getMessage());
        }

        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    public function showLoginForm()
    {
        return view('user.users.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember' => 'boolean',
        ]);

        $remember = $request->has('remember');

        if (Auth::attempt($request->only('email', 'password'), $remember)) {
            $user = Auth::user();

            if (!$user->hasVerifiedEmail()) {
                return redirect()->route('verification.notice');
            }

            return redirect()->route('user.tours.index');
        }

        return back()->withErrors([
            'email' => 'Ошибка входа. Пожалуйста, проверьте свои учетные данные.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.tours.index');
    }

    public function edit()
    {
        return view('user.users.edit', ['user' => Auth::user()]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'password' => 'nullable|string|confirmed',
        ]);

        $user = Auth::user();
        $user->name = $request->name;

        // Если почта изменена, установите email_verified_at в null
        if ($request->email !== $user->email) {
            $user->email = $request->email;
            $user->email_verified_at = null; // Установите в null для проверки новой почты
            $user->sendEmailVerificationNotification(); // Отправьте уведомление о верификации
        }

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('user.users.edit')->with('success', 'Данные успешно обновлены.');
    }
}
