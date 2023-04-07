<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;



use App\Models\Produ;
use App\Models\Umenusv;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Request;


class ProductController extends Controller
{
    public function index()
    {
        $users = DB::table('product')->orderBy('created_at', 'ASC')->get();
        return view('admin.product.index', ['users' => $users]);
    }
    public function create()
    {
        $category = DB::table('category')->get();

        return view('admin.product.create', ['category' => $category]);


    }
 

    public function store(Request $request)
    {

           $request->validate([
            'name'=>'required',

           ],[
            'name.required'=>'Bạn Chưa Nhập Vào Ô input MOvie tiltle !!!'
           ]);
     
       
        $data = $request->except('_token');
        $data['created_at'] = new \DateTime;
        $data['user_id'] = 1;
        if ($request->image) {
            $file = $request->image;
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('image'), $filename);
            $data['image'] = $filename;
        }


        
        $post = DB::table('product')->insert($data);
        if ($post) {
            alert()->success('Post Created', 'Successfully');
        } else {
            alert()->error('Post Created', 'Something went wrong!');
        }
        return redirect()->route('admin.product.index');
    }

    public function edit($id)
    {
        $caterogy = DB::table('category')->get();
        $users = DB::table('product')->where('id', $id)->first();

        return view('admin.product.edit', [
            'data' => $users,
            'category' => $caterogy,
        ]);
    }

    public function destroy(Produ $user, Request $request, $id)
    {
        if ($request->ajax()) {

            $user = Produ::findOrFail($id);

            if ($user) {

                $user->delete();

                return response()->json(array('success' => true));
            }

        }
    }

    public function update(Request $request, $id)
    {

        $data = $request->except('_token','image');
        $data['updated_at'] = new \DateTime;
       

        if (!empty($request->image)) {
           $product=DB::table('product')->where('id',$id)->first();

            //remove old file
            if (file_exists(public_path('image/').$product->image)) { 
               unlink(public_path('image/').$product->image);
            }
            //upload new file
            $file=$request->image;
            $filename= time().'_'. $file->getClientOriginalName();
            $file->move(public_path('image'),$filename);
            $data['image']=$filename;

            //for update in table
            
        }
        $post = DB::table('product')->where('id', $id)->update($data);
        if ($post) {
            alert()->success('Edit Created', 'Successfully');
        } else {
            alert()->error('Edit Created', 'Something went wrong!');
        }
        return redirect()->route('admin.product.index');

    }

}