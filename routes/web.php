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

Route::get('/', \App\Http\Livewire\Client\Index::class)->name('client.main');
Route::get('contact-us', \App\Http\Livewire\Client\ContactUs::class)->name('client.contact_us');
Route::get('admin-login', \App\Http\Livewire\Admin\AdminLogin::class)->name('admin.login')
    ->middleware('logout');


Route::prefix('admin')->middleware(['auth:admin'])->group(function (){
    Route::get('/main', \App\Http\Livewire\Admin\Index::class)->name('admin.main');
    Route::get('/register-livestock', \App\Http\Livewire\Admin\RegisterLivestock::class)->name('admin.register.livestock');
    Route::get('/edit-livestock/{livestock}', \App\Http\Livewire\Admin\EditLivestock::class)->name('admin.edit.livestock');
    Route::get('/register-referred', \App\Http\Livewire\Admin\RegisterReferred::class)->name('admin.register.referred');
    //Route::get('/register-medicines', \App\Http\Livewire\Admin\RegisterMedicines::class)->name('admin.register.medicines');
    Route::get('/register-birth-certificate', \App\Http\Livewire\Admin\RegisterBirthCertificate::class)->name('admin.register.certificate');
    Route::get('/edit-birth-certificate/{birthCertificate}', \App\Http\Livewire\Admin\EditBirthCertificate::class)->name('admin.edit.certificate');
    Route::get('/panel-sms', \App\Http\Livewire\Admin\PanelSms::class)->name('admin.panel.sms');
    Route::get('/edit-profile', \App\Http\Livewire\Admin\EditProfile::class)->name('admin.edit.profile');
    Route::get('/register-prescription', \App\Http\Livewire\Admin\RegisterPrescription::class)->name('admin.register.prescription');
    Route::get('/ajax-certificate', [\App\Http\Controllers\AjaxController::class, 'certificate']);
    Route::get('/admin-management', \App\Http\Livewire\Admin\AdminManagement::class)->name('admin.management');
    Route::get('/edit-admin/{admin}', \App\Http\Livewire\Admin\EditAdmin::class)->name('admin.edit');
    Route::get('/list-referred', \App\Http\Livewire\Admin\ListReferred::class)->name('admin.list.referred');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
