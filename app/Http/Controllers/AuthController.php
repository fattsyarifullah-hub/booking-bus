<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{   
    // === MENAMPILKAN HALAMAN LOGIN ===
    public function showLogin() : View {
        return view('main.auth.login');
    }

    // === FUNGSI LOGIN BEKERJA ===
    public function login(Request $request) {
        $userLogin = $request->only('name', 'password');

        if (Auth::attempt($userLogin)) {
            return redirect('/');
        }

        return back()->with('error', 'login gagal');
    }

    // === MENAMPILKAN HALAMAN REGISTER ===
    public function showRegister() {
        return view('main.auth.register');
    }

    // === FUNGSI REGISTER BEKERJA ===
    public function register(Request $request) {
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        Auth::login($user);

        return redirect('/')->with('success', 'berhasil register');
    }

    // === FUNGSI UNTUK LOGOUT ===
    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    // === MENAMPILKAN DASHBOARD LOGIN ===
    public function showDashboardLogin() {
        return view('dashboard.index');
    }
    
    // === FUNGSI LOGIN DI DALAM DASHBOARD ===
    public function dashboardLogin(Request $request) {
        $adminLogin = $request->only('name', 'password');

        if (Auth::attempt($adminLogin)) {
            $admin = Auth::user();

            if ($admin->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard.management.index'))->with('success', 'berhasil login');
            }

            Auth::logout();
            return back()->with('error', 'anda bukan admin');
        }

        Auth::logout();
        return back()->with('error', 'data yang anda masukkan salah');
    }

    public function showdashboardRegister() {
        return view('dashboard.register');
    }

    public function dashboardRegister(Request $request) {
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        Auth::login($user);

        return redirect()->intended(route('dashboard.management.index'))->with('success', 'berhasil register');
    }

    public function dashboardLogout() {
        Auth::logout();
        return redirect('/');
    }
}
