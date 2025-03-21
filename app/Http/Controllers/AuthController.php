<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Menampilkan halaman registrasi
    public function register()
    {
        return view('auth.register');
    }
  
    // Menyimpan data registrasi pengguna
    public function registerSave(Request $request)
    {
        Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ], [
            'name.required' => 'Nama harus diisi.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email telah digunakan.',
            'password.required' => 'Password harus diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.'
        ])->validate();
  
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'User' // Ganti dengan logika level yang sesuai
        ]);
  
        return redirect()->route('login')->with('success', 'Akun berhasil dibuat! Silakan login.');
    }
  
    // Menampilkan halaman login
    public function login()
    {
        return view('auth.login');
    }
  
    // Mengelola aksi login
    public function loginAction(Request $request)
    {
        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi.'
        ])->validate();
  
        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))) {
            return redirect()->route('login')->withErrors(['login' => 'Email atau password salah']);
        }
  
        $request->session()->regenerate();
  
        return redirect()->route('dashboard')->with('success', 'Selamat datang kembali!');
    }
  
    // Mengelola logout
    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return redirect('/')->with('success', 'Anda telah logout.');
    }
 
    // Menampilkan profil pengguna
    public function profile()
    {
        return view('profile');
    }
}