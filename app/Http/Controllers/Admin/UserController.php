<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;


use App\Http\Requests\User\StoreRequest1;
use App\Http\Service\Menu\Menuservice;
use App\Models\Umenusv;
use DateTime;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use SebastianBergmann\Environment\Console;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    public $delete_id;




    public function index()
    {
        $users = DB::table('users')->orderBy('created_at', 'ASC')->get();

        return view('admin.user.index', ['users' => $users]);
    }


    public function create()
    {

        return view('admin.user.create');
    }

    public function store(StoreRequest1 $request)
    {

        $data = $request->except('_token', 'password_confirmation');
        $data['password'] = bcrypt($request->password);
        $data['created_at'] = new DateTime();
        $post = DB::table('users')->insert($data);
        


        if ($post) {
            alert()->success('Post Created', 'Successfully');
        } else {
            alert()->error('Post Created', 'Something went wrong!');
        }
        return redirect()->route('admin.user.index');

    }

    public function edit($id)
    {
        $users = DB::table('users')->where('id', $id)->first();


        return view('admin.user.edit', ['data' => $users]);

    }

    public function destroy(Umenusv $user, Request $request, $id)
    {
        if ($request->ajax()) {

            $user = Umenusv::findOrFail($id);

            if ($user) {

                $user->delete();

                return response()->json(array('success' => true));
            }

        }
    }

    public function update(Request $request, $id)
    {

        $data = $request->except('_token', 'password_confirmation', 'password');
        if (!empty($request->password)) {
            $request->validate([
                'password' => 'min:8|confirmed',
            ], [
                    'password.min' => 'Mật Khẩu Đủ 8 Kí Tự Trở Lên',
                    'password.confirmed' => 'Mật Khẩu Không Trùng Khớp',
                ]);

            $data['password'] = bcrypt($request->password);
        }

        $data['updated_at'] = new DateTime();
        $post = DB::table('users')->where('id', $id)->update($data);
        if ($post) {
            alert()->success('Edit Created', 'Successfully');
        } else {
            alert()->error('Edit Created', 'Something went wrong!');
        }
        return redirect()->route('admin.user.index');

    }

    

}