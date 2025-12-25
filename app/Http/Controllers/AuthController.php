<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // ===============================
    // FORM LOGIN
    // ===============================
    public function loginForm()
    {
        return view('auth.login');

    }
    public function logout()
    {
        Auth::logout(); // hapus session login
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login')
            ->with('success', 'Anda berhasil logout');
    }

    // ===============================
    // PROSES LOGIN
    // ===============================
    public function loginProcess(Request $request)
    {
        // VALIDATION
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        // CEK EMAIL
        $user = User::where('email', $request->email)->first();

        if (! $user) {
            return back()
                ->withErrors(['email' => 'Email tidak terdaftar'])
                ->withInput();
        }

        // CEK PASSWORD
        if (! Hash::check($request->password, $user->password)) {
            return back()
                ->withErrors(['password' => 'Password salah'])
                ->withInput();
        }

        // LOGIN BERHASIL
        session(['user' => $user]);

        return redirect()->route('home')
            ->with('success', 'Berhasil login. Selamat datang!');
    }
}
