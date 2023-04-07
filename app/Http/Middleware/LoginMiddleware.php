<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\HttpFoundation\Response;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->level == 1) {
                return $next($request);
            } else {
                Alert::alert()->toast('Tài Khoản Của Bạn Chưa Được Kích Hoạt Qua Gmail Mà Bạn Đã Đăng Kí <a href="'.route('admin.getActive').'">Click Vào Đây Kích Hoạt!!!</a> ', 'warning')->toToast('top')->width('400px')->autoClose(40000)->background('#E0FFFF')->iconHtml('<i class="fa-solid fa-triangle-exclamation fa-beat fa-xl"></i>');
                return redirect('admin/login');
            }
        } else {

            return redirect('admin/login');
        }
        // return $next($request);
    }
}