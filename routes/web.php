<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
//dashboard routes
use App\Http\Controllers\Doctor\DashboardController;







//dashboard


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

// Doctor Search & Listing (Public / Patient)
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');

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
Route::get('/doctor/dashboard', [DashboardController::class, 'dashboard'])
    ->middleware(['auth', 'role:doctor'])
    ->name('doctor.dashboard');

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

/*
|--------------------------------------------------------------------------
| Patient Appointment Booking & Management (Auth Required)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/appointments/book/{doctor}', [AppointmentController::class, 'create'])->name('appointments.book');
    Route::post('/appointments/book/{doctor}', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
});

require __DIR__.'/auth.php';
