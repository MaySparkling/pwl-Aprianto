<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index() { }
    public function create() { }
    public function store(Request $request) { }
    public function show(User $user) { }
    public function edit(User $user) { }
    public function update(Request $request, User $user) { }
    public function destroy(User $user) { }

    // =========================================================================
    // FUNGSI REGISTER (DAFTAR AKUN BARU)
    // =========================================================================
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            // Jika validasi gagal, kembalikan ke form register dengan pesan error
            return back()->withErrors($validator)->withInput();
        }

        // Buat user baru (Secara default mungkin kamu mau set role-nya sebagai mahasiswa)
        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            // 'role' => 'mahasiswa', // <- Buka komentar ini jika ingin otomatis jadi mahasiswa
        ]);

        // Setelah berhasil daftar, arahkan ke halaman login
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    // =========================================================================
    // FUNGSI LOGIN DENGAN PEMBAGIAN ROLE (LAMPU LALU LINTAS)
    // =========================================================================
    public function login(Request $request)
    {
        // 1. Ambil inputan email dan password
        $credentials = $request->only('email', 'password');

        // 2. Cek apakah cocok dengan database
        if (Auth::attempt($credentials)) {
            
            // Regenerasi session untuk keamanan (mencegah session fixation)
            $request->session()->regenerate();

            // 3. Ambil role user yang sedang login
            $role = Auth::user()->role;

            // 4. ARAHKAN SESUAI ROLE (LAMPU LALU LINTAS)
            if ($role == 'admin') {
                return redirect()->route('mahasiswa.index');
                
            } elseif ($role == 'dosen') {
                // Arahkan dosen ke halaman daftar KRS (yang ada tombol approval)
                return redirect()->route('dosen.krs.index');
                
            } elseif ($role == 'mahasiswa') {
                // Arahkan mahasiswa ke halaman KRS milik dia sendiri
                return redirect()->route('krs.index');
            }

            // Jika role tidak dikenali, lempar ke dashboard utama
            return redirect()->route('dashboard');
        }

        // Jika email/password salah, kembalikan ke form login
        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ])->onlyInput('email');
    }

    // =========================================================================
    // TAMPILAN VIEW
    // =========================================================================
    public function registerView(Request $request)
    {
        return view('register');
    }

    public function loginView(Request $request)
    {
        return view('login');
    }

    // =========================================================================
    // FUNGSI LOGOUT
    // =========================================================================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Setelah logout, arahkan kembali ke halaman awal/login
        return redirect()->route('dashboard');
    }
}