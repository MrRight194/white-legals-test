<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => ['user']],function(){
    Route::get('/dashboard',[UserController::class, 'dashboard']);
    Route::get('/client-list',[UserController::class, 'clientList']);
    Route::get('/client-active/{id}',[UserController::class, 'clientActive']);
    Route::get('/client-delete/{id}',[UserController::class, 'clientDelete']);
    Route::get('/add-client',[UserController::class, 'addClient']);
    Route::post('/add-client',[UserController::class, 'storeClient']);
    Route::get('/client-edit/{id}',[UserController::class, 'clientEdit']);
    Route::post('/update-client/{id}',[UserController::class, 'updateClient']);
    
    
    Route::post('/logout-user',function(){
        session()->forget('email');
        session()->forget('id');
        session()->forget('name');
        session()->forget('role');
        return redirect('/')->with('success','You are logout successfuly');
    });
}); 

// Admin
Route::get('/',[AuthenticatedSessionController::class, 'index']);
Route::group(['middleware' => ['admin']],function(){
    Route::get('/user-list',[AdminController::class, 'userList']);
    Route::get('/user-active/{id}',[AdminController::class, 'userActive']);
    Route::get('/user-delete/{id}',[AdminController::class, 'userDelete']);
    Route::get('/add-user',[AdminController::class, 'addUser']);
    Route::post('/add-user',[AdminController::class, 'storeUser']);
    Route::get('/user-edit/{id}',[AdminController::class, 'userEdit']);
    Route::post('/update-user/{id}',[AdminController::class, 'updateUser']);

    Route::post('/logout-admin',function(){
        session()->forget('email');
        session()->forget('id');
        session()->forget('name');
        session()->forget('role');
        session()->forget('USER_ID');
        session()->forget('USER_NAME');
        return redirect('/')->with('success','You are logout successfuly');
    });
});
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('admin.dashboard');
// })->name('dashboard');

require __DIR__.'/auth.php';
