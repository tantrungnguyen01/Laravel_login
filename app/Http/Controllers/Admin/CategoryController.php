<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreRequest;
use App\Models\Categ;
use DateTime;



use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;

class CategoryController extends Controller
{
    public function index()
    {   
       
        $users = DB::table('category')->orderBy('created_at', 'ASC')->get();
        return view('admin.category.index', ['users' => $users]);
    }
    public function create()
    {

        return view('admin.category.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',

        ],[
            'name.required'=>'Bạn chưa nhập vào ô Tên Thể Loại !!!'
        ]);

        $data = $request->except('_token');
        $data['created_at'] = new DateTime();
        $data['user_id'] = 1;
        $post = DB::table('category')->insert($data);
        if ($post) {
            alert()->success('Post Created', 'Successfully');
        } else {
            alert()->error('Post Created', 'Something went wrong!');
        }
        return redirect()->route('admin.category.index');
    }

    public function edit($id)
    {
        $users = DB::table('category')->where('id', $id)->first();


        return view('admin.category.edit', ['data' => $users]);
    }


    public function destroy(Categ $user, Request $request, $id)
    {
        if ($request->ajax()) {

            $user = Categ::findOrFail($id);

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
        $post = DB::table('category')->where('id', $id)->update($data);
        if ($post) {
            alert()->success('Edit Created', 'Successfully');
        } else {
            alert()->error('Edit Created', 'Something went wrong!');
        }
        return redirect()->route('admin.category.index');

    }



}