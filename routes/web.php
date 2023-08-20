<?php

use App\Http\Controllers\CustomAuthController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('site', [CustomAuthController::class, 'site'])->middleware('auth:web')->name('site');
Route::get('admin', [CustomAuthController::class, 'admin'])->middleware('auth:admin')->name('admin');


Route::get('admin/login', [App\Http\Controllers\CustomAuthController::class, 'login'])->name('admin.login');


Route::post('admin/login', [App\Http\Controllers\CustomAuthController::class, 'adminLogin'])->name('save.admin.login');
