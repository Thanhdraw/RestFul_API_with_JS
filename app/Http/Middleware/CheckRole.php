<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        $user = Auth::user();

        if ($user && $user->role && $user->role->name === $role) {
            return $next($request); // Tiếp tục xử lý nếu vai trò đúng
        }

        // Nếu vai trò không đúng, chuyển hướng đến trang thích hợp
        if ($user && $user->role->name === 'admin') {
            return redirect()->route('dashboard');
        }

        if ($user && $user->role->name === 'customer') {
            return redirect()->route('shop.index');
        }

        // Nếu không đăng nhập hoặc không có vai trò
        return redirect()->route('login');
    }

}
