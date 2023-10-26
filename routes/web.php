<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Webcontroller;

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

Route::get('/', [Webcontroller::class,'index'])
->name('home');
Route::get('about', [Webcontroller::class,'about'])->name('about');
Route::get('contact', [Webcontroller::class,'contact'])->name('contact');
Route::get('signup', [Webcontroller::class,'signup'])->name('signup');
Route::get('book', [Webcontroller::class,'book'])->name('book');
Route::get('car-info/{id}', [Webcontroller::class,'carinfo']);
Route::post('register', [Webcontroller::class,'register']);
