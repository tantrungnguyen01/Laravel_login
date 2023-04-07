<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
   public function getInfo($social){
        return Socialite::driver($social)->redirect();
   }
   public function checkgetInfo($social){
        $info= Socialite::driver($social)->user();
        dd($info);
   }    
}
