<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{   
    // === MENAMPILKAN HALAMAN LOGIN ===
    public function showLogin() : View {
        return view('main.auth.login');
    }

    // === FUNGSI LOGIN BEKERJA ===
    public function login(Request $request) {
        // mengambil request dari input dengan hanya name & password
        $userLogin = $request->only('name', 'password');

        // jika data yang dimasukkan ada yang sama dengan di database maka ia bisa login
        if (Auth::attempt($userLogin)) {
            return redirect()->route('main.index');
        }

        return back()->with('error', 'login gagal');
    }

    // === MENAMPILKAN HALAMAN REGISTER ===
    public function showRegister() {
        return view('main.auth.register');
    }

    // === FUNGSI REGISTER BEKERJA ===
    public function register(Request $request) {
        // validasi request name, email, & password
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // bikin user baru lewat request tadi
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // yang baru register bakalan langsung login
        Auth::login($user);

        return redirect('/')->with('success', 'berhasil register');
    }

    // === FUNGSI UNTUK LOGOUT ===
    public function logout() {
        // logout dari auth
        Auth::logout();
        return redirect('/');
    }

    // === FUNGSI UNTUK MELIHAT AKUN ===
    public function account() {
        // memanggil model User dengan relasi busesnya agar bisa mengambil data dari table bus maupun table pivot
        $user = User::with('buses')->findOrFail(Auth::id());
        return view('main.account', compact('user'));
    }

    // === MENAMPILKAN DASHBOARD LOGIN ===
    public function showDashboardLogin() {
        return view('dashboard.index');
    }
    
    // === FUNGSI LOGIN DI DALAM DASHBOARD ===
    public function dashboardLogin(Request $request) {
        // mengambil request hanya dengan name & password
        $adminLogin = $request->only('name', 'password');

        // jika ada di database maka boleh lanjut ke tahap selanjutnya
        if (Auth::attempt($adminLogin)) {
            $admin = Auth::user();

            // jika role dari data yang dimasukkan oleh user adalah admin maka masuk ke dalam dashboard
            if ($admin->role === 'admin') {
                $request->session()->regenerate();
                return redirect()->intended(route('dashboard.management.index'))->with('success', 'berhasil login');
            }

            // jika bukan admin maka lempar dan tidak boleh masuk ke dalam dashboard
            Auth::logout();
            return back()->with('error', 'anda bukan admin');
        }

        Auth::logout();
        return back()->with('error', 'data yang anda masukkan salah');
    }

    // === MENAMPILKAN HALAMAN REGISTER DASHBOARD ===
    public function showdashboardRegister() {
        return view('dashboard.register');
    }

    // === FUNGSI REGISTER DI DASHBOARD ===
    public function dashboardRegister(Request $request) {
        // validasi request dari user
        $request->validate([
            'name' => 'required|string|max:200',
            'email' => 'required|string|email|max:200|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // buat user baru dengan role admin agar bisa masuk ke dashboard
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
        ]);

        // langsung login
        Auth::login($user);

        return redirect()->intended(route('dashboard.management.index'))->with('success', 'berhasil register');
    }
    
    public function dashboardLogout() {
        Auth::logout();
        return redirect('/');
    }
}
