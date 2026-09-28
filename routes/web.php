<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public welcome / landing page
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Main home page (patient-facing hub)
|--------------------------------------------------------------------------
*/
Route::get('/home', function () {
    return view('home');
})->name('home');

/*
|--------------------------------------------------------------------------
| Role-Protected Portals & Dashboards (CAMS)
|--------------------------------------------------------------------------
*/
// 1. Admin Dashboard (Admin පමණි)
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'role:admin'])->name('admin.dashboard');

// 2. Doctor Dashboard (Doctor පමණි)
Route::get('/doctor/dashboard', function () {
    return view('doctor.dashboard');
})->middleware(['auth', 'role:doctor'])->name('doctor.dashboard');

// 3. Pharmacist Dashboard (Pharmacist පමණි)
Route::get('/pharmacist/dashboard', function () {
    return view('pharmacist.dashboard');
})->middleware(['auth', 'role:pharmacist'])->name('pharmacist.dashboard');

/*
|--------------------------------------------------------------------------
| Authenticated dashboard & Profile
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Social OAuth (Socialite)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])
        ->name('social.redirect');

    Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])
        ->name('social.callback');
});

require __DIR__.'/auth.php';
