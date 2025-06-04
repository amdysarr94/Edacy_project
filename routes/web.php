<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
//     return view('home');
// });
Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('contacts.index');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'saveRegister')->name('register.save');

    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginPost')->name('login.post');

    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});

Route::middleware('auth')->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::post('contacts', 'store')->name('contacts.store');
        Route::put('/contacts/{contact}', 'update')->name('contacts.update');
        Route::delete('/contacts/{contact}', 'destroy')->name('contacts.destroy');
    });

    Route::controller(UserController::class)->group(function(){
        Route::get('profile', 'profile')->name('profil.edit');
        Route::post('profile', 'update')->name('profil.update');
        Route::post('/profil/password', 'updatePassword')->name('profil.password');
        Route::delete('/profil', 'destroy')->name('profil.delete');
    });
});
