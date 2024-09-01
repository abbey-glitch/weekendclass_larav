<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmailController;
use Illuminate\Support\Facades\Route;

/**
 * create a basic route for both theb admin and
 * validate
 */
// Route::get('/admin/login', [App\Http\Controllers\AdminLoginController::class, 'showlogin'])->name('admin.login');

// Route::get('/admin/register', [App\Http\Controllers\AdminRegisterController::class, 'showregister'])->name('admin.register');

// Route::post('/admin/register', [App\Http\Controllers\AdminregisterController::class, 'adminregister'])->name('admin.register');
// end the admin route
Route::get('/', function () {
    return view('welcome');
});
// test email sending
Route::get('/email', [App\Http\Controllers\EmailController::class, 'sendWelcomeEmail']);
Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
require __DIR__.'/admin-auth.php';
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
