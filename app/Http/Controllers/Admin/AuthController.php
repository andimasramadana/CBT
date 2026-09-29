<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('admin.login');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'login' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $loginValue = $credentials['login'];

        // Try admin login first (by email or name)
        $user = User::query()
            ->where('is_admin', true)
            ->where(function ($query) use ($loginValue) {
                $query->where('email', $loginValue)
                    ->orWhere('name', $loginValue);
            })
            ->first();

        // If not admin, try student login by NIS
        if (! $user) {
            $student = Student::where('nis', $loginValue)->first();

            if ($student && $student->user_id) {
                $user = User::find($student->user_id);
            }
        }

        if (! $user || ! password_verify($credentials['password'], $user->password)) {
            return back()
                ->withErrors(['login' => 'NIS atau password salah. Pastikan menggunakan NIS sebagai username dan password.'])
                ->onlyInput('login');
        }

        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->intended(
            $user->is_admin ? route('admin.dashboard') : route('home')
        );
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
