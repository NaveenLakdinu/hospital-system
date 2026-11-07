<?php

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\PharmacistController as AdminPharmacistController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

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
// Admin Portal Dashboard
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

/*
|--------------------------------------------------------------------------
| Administrator Doctor Management (FR-14)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/doctors', [AdminDoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create', [AdminDoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [AdminDoctorController::class, 'store'])->name('doctors.store');
    Route::delete('/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])->name('doctors.destroy');

    // Clinic Appointments Monitoring
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

    /*
    |--------------------------------------------------------------------------
    | Administrator Reports & Analytics (FR-15 & Section 4.3)
    |--------------------------------------------------------------------------
    */
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export', [AdminReportController::class, 'exportCsv'])->name('reports.export');

    /*
    |--------------------------------------------------------------------------
    | Administrator Pharmacist Management (FR-14)
    |--------------------------------------------------------------------------
    */
    Route::get('/pharmacists', [AdminPharmacistController::class, 'index'])->name('pharmacists.index');
    Route::get('/pharmacists/create', [AdminPharmacistController::class, 'create'])->name('pharmacists.create');
    Route::post('/pharmacists', [AdminPharmacistController::class, 'store'])->name('pharmacists.store');
    Route::delete('/pharmacists/{pharmacist}', [AdminPharmacistController::class, 'destroy'])->name('pharmacists.destroy');
});

// 2. Doctor Dashboard (Doctor පමණි)
Route::get('/doctor/dashboard', function () {
    $doctor = Auth::user()->doctor;

    // Doctor ට අදාළ සියලුම Appointments සහ Patient විස්තර Database එකෙන් ලබා ගැනීම
    $appointments = $doctor
        ? $doctor->appointments()->with('patient')->latest('appointment_date')->latest('appointment_time')->get()
        : collect();

    return view('doctor.dashboard', compact('appointments', 'doctor'));
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
