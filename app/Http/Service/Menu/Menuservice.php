<?php

namespace App\Http\Service\Menu;
use App\Models\Umenusv;
use Illuminate\Support\Facades\Session;

class Menuservice
{
//     public function create($request){
//         try {
//             Umenusv::create([
//                 'id'=>(string) $request->input('id'),
//                 'email'=>(string) $request->input('email'),
//                 'password'=>(string) $request->input('password'),
//                 'fullname'=>(string) $request->input('fullname'),
//                 'gender'=>(string) $request->input('gender'),
//                 'phone'=>(string) $request->input('phone'),
//                 'address'=>(string) $request->input('address'),
//                 'level'=>(string) $request->input('level'),
//                 'status'=>(string) $request->input('status'),
//             ]);
//             Session::flash('success','okokok');
//         } catch (\Exception $err) {
//            Session::flash('errors',$err->getMessage());
//            return false;
//     }
//     return true;
// }
//     public function delte($id){
//         $xoa=Umenusv::where('id',$id->input('id'))->first();
//         $xoa->delete();
//         return true;
//     }



}
