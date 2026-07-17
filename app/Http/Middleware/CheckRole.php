<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // 1. Cek apakah user sudah login atau belum
        if (!Auth::check()) {
            return redirect('login');
        }

        // 2. Cek apakah role user ada di dalam daftar role yang diizinkan
        $user = Auth::user();
        if (in_array($user->role, $roles)) {
            return $next($request);
        }

        // 3. Jika tidak punya hak akses, lempar error 403
        abort(403, 'Anda tidak memiliki hak akses untuk halaman ini.');
    }
}