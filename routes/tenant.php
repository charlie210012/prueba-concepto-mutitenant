<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/', function () {
        return view('welcome',[
            'tenantName' => tenant('id')
        ]);
    });

    Route::get('/register',function(){
        return view('auth.register',[
            'tenantName' => tenant('id')
        ]);
    })->name('register');
    Route::post('register', [App\Http\Controllers\Auth\RegisterController::class,'register']);

    
    Route::get('login', [App\Http\Controllers\Auth\LoginController::class,'showLoginForm'])->name('login');
    Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);
    Route::post('logout', [App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');


   

    

    // Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class,'register'])->name('register');
    
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});
// Route::get('/', function () {
//     dd(\App\Models\User::all());
//     return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
// });
