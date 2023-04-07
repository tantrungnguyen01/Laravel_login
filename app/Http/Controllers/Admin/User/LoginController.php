<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest1;

use App\Models\Umenusv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;
use Str;

class LoginController extends Controller
{
    public function login()
    {
        return view('admin.login');
    }

    public function postlogin(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [
                'email.email' => 'Bạn Nhập Chưa Đúng Định Dạng Email !!',
                'password' => 'Mật Khẩu Phải Có ít Nhất 8 Ký Tự Trở Lên !!'
            ]);

        // dd($request->input());


        if (
            Auth::attempt(
                [
                    'email' => $request->input('email'),
                    'password' => $request->input('password')
                ],
                $request->input('remember')
            )
        ) {

            return redirect()->route('admin.user.index');

        } else {

            Alert::alert()->toast('Sai Tài Khoản Hoặc Mật Khẩu', 'error')->toToast('top')->width('370px');



            return redirect()->back();
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }

    public function register()
    {
        return view('admin.register');
    }

    public function registerpost(StoreRequest1 $request)
    {
        $token = Str::random(10);
        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new \DateTime();
        $data['token'] = $token;

        if ($compa = Umenusv::create($data)) {
            Mail::send('admin.active_account', compact('compa'), function ($message) use ($compa) {
                $message->to($compa->email)->subject('Xác Thực Tài Khoản');
            });

        }
        Alert::alert()->toast('Tạo Tài Khoản Thành Công , Mời Bạn Xác Nhận Tài Khoản Qua gmail ', 'warning')->toToast('top')->width('370px')->autoClose(13000);
        return redirect('/admin/login');


    }

    public function active(Umenusv $compa, $token)
    {
        if ($compa->token === $token) {
            $compa->update(['level' => 1, 'token' => null]);
            Alert::alert()->toast('Bạn Đã Xác Nhận Tài Khoản Thành Công, Bây giờ Có thể Đăng Nhập Được rồi', 'success')->toToast('top')->width('370px')->autoClose(11000);
            return redirect('/admin/login');
        } else {
            Alert::alert()->toast('Mã Xác Nhận Không Hợp Lệ', 'error')->toToast('top')->autoClose(10000);
            return redirect('/admin/login');
        }


    }
    public function forgetPass()
    {
        return view('admin.forgetPassWord');
    }
    public function postforgetPass(Request $request)
    {
        $request->validate([
            'email' => 'required|exists:users',

        ], [
                'email.required' => 'Bạn Nhập Chưa Đúng Định Dạng Email',
                'email.exists' => 'Email Này Không Tồn Tài Trong CSDL !!'
            ]);

        $token = Str::random(10);
        $compa = Umenusv::where('email', $request->email)->first();
        $compa->update(['token' => $token]);
        Mail::send('admin.email_forget_mess', compact('compa'), function ($message) use ($compa) {
            $message->to($compa->email)->subject('Lấy Lại Mật Khẩu');
        });

        Alert::alert()->toast('Vui Lòng Kiểm Tra Email Để Thay Đổi Mật Khẩu !', 'success')->toToast('top')->autoClose(10000);
        return redirect('/admin/login');



    }
    public function getPass(Umenusv $compa, $token)
    {
        if ($compa->token === $token) {

            return view('admin.getPass');
        }

        return abort(404);
    }
    public function postgetPass(Umenusv $compa, $token, Request $request)
    {
        $request->validate([
            'password' => 'required|min:6',
        ], [
                'password.required' => 'Vui lòng nhập mật khẩu.',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
            ]);

        $newPassword = Hash::make($request->password);
        $compa->update(['password' => $newPassword, 'token' => null]);

        Alert::alert()
            ->toast('Bạn đã đặt lại mật khẩu thành công.', 'success')
            ->toToast('top')->width('370px')->autoClose(11000);

        return redirect('/admin/login');
    }

    public function getActive(){
        return view('admin.getActive');
    }
    public function postgetActive(Request $request){
        $request->validate([
            'email' => 'required|exists:users',

        ], [
                'email.required' => 'Bạn Nhập Chưa Đúng Định Dạng Email',
                'email.exists' => 'Email Này Không Tồn Tài Trong CSDL !!'
            ]);

        $token = Str::random(10);
        $compa = Umenusv::where('email', $request->email)->first();
        $compa->update(['token' => $token]);
        Mail::send('admin.active_account', compact('compa'), function ($message) use ($compa) {
            $message->to($compa->email)->subject('Xác Thực Tài Khoản');
        });

        Alert::alert()->toast('Vui Lòng Kiểm Tra Email Để Kích Hoạt !', 'success')->toToast('top')->autoClose(10000);
        return redirect('/admin/login');

    }
}