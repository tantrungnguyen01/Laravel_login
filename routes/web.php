<?php

use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\User\FacebookController;
use App\Http\Controllers\Admin\User\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\LoginMiddleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;
use RealRashid\SweetAlert\Facades\Alert;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     Alert::alert('WELCOME', 'hello Trung', );
//     return view('welcome');
// });
    Route::get('/', [LoginController::class, 'login'])->name('login');


    Route::get('admin/login', [LoginController::class, 'login'])->name('login');
    Route::post('admin/login/postlogin', [LoginController::class, 'postlogin'])->name('postlogin');
    Route::get('admin/logout', [LoginController::class, 'logout'])->name('logout');


    Route::get('admin/register',[LoginController::class,'register']);
    Route::post('admin/registerpost',[LoginController::class,'registerpost']);
    

  
    Route::get('active/{compa}/{token}', [LoginController::class, 'active'])->name('compa.active');


    Route::get('admin/forget',[LoginController::class,'forgetPass'])->name('admin.forget');
    Route::post('admin/forget',[LoginController::class,'postforgetPass']);
    Route::get('forget_pass/{compa}/{token}',[LoginController::class,'getPass'])->name('compa.getPass');
    Route::post('forget_pass/{compa}/{token}',[LoginController::class,'postgetPass']);

    Route::get('admin/getactive',[LoginController::class,'getActive'])->name('admin.getActive');
    Route::post('admin/getactive',[LoginController::class,'postgetActive']);

    // mạng xã hội facebook
    // Route::prefix('facebook')->name('facebook.')->group( function(){
    //     Route::get('auth', [FacebookController::class, 'loginUsingFacebook'])->name('login');
    //     Route::get('callback', [FacebookController::class, 'callbackFromFacebook'])->name('callback');
    // });
    // end
    Route::get('/getInfo-facebook/{social}',[FacebookController::class,'getInfo']);
    Route::get('/check-Info-facebook/{social}',[FacebookController::class,'checkgetInfo']);
    // 


    
Route::prefix('admin')->middleware('adminLogin')->name('admin.')->group(function () {

    Route::prefix('category')->controller(CategoryController::class)->name('category.')->group(function () {

        Route::get('/index', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/create', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');

        Route::delete('/destroy/{id}', 'destroy')->name('destroy');
    });

});




Route::prefix('admin')->middleware('adminLogin')->name('admin.')->group(function () {

    Route::prefix('user')->controller(UserController::class)->name('user.')->group(function () {


        Route::get('/index', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');


        // Route::get('/destroy/{id}','destroy')->name('destroy');
        Route::DELETE('/destroy/{id}', 'destroy')->name('destroy');

    });

});








Route::prefix('admin')->middleware('adminLogin')->name('admin.')->group(function () {

    Route::prefix('product')->controller(ProductController::class)->name('product.')->group(function () {


        Route::get('/index', 'index')->name('index');

        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');

        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/update/{id}', 'update')->name('update');

        Route::delete('/destroy/{id}', 'destroy')->name('destroyid');
    });

});