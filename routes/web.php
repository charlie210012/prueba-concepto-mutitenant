<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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

Route::get('/', function () {
    return view('welcome',[
        'tenantName' => null
    ]);
});

Route::get('/register',function(){
    return view('auth.register',[
        'tenantName' => null
    ]);
})->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register']);

Route::get('login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');



// Route::get('/login',function(){
//     return view('auth.login');
// })->name('login');

// Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
