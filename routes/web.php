<?php

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

Route::get('/', \App\Http\Livewire\Client\Index::class);
Route::get('/contact-us', \App\Http\Livewire\Client\ContactUs::class);
Route::get('/admin-login', \App\Http\Livewire\Admin\AdminLogin::class);
Route::get('/admin/main', \App\Http\Livewire\Admin\Index::class);


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
