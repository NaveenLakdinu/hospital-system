<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;

use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\ConsultationController;
use App\Http\Controllers\Doctor\PrescriptionController;

use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\PharmacistController as AdminPharmacistController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Nurse\DashboardController as NurseDashboardController;

use App\Http\Controllers\Nurse\VitalSignController;

use App\Http\Controllers\Nurse\WalkInController;



/*
|--------------------------------------------------------------------------
| Public Welcome Page
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


/*
|--------------------------------------------------------------------------
| Main Home Page
|--------------------------------------------------------------------------
*/

Route::get('/home', function () {
    return view('home');
})->name('home');


/*
|--------------------------------------------------------------------------
| Doctor Search - Public / Patient
|--------------------------------------------------------------------------
*/

Route::get('/doctors', [DoctorController::class, 'index'])
    ->name('doctors.index');


/*
|--------------------------------------------------------------------------
| Doctor Portal
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:doctor'])->group(function () {

    // Doctor Dashboard
    Route::get(
        '/doctor/dashboard',
        [DashboardController::class, 'dashboard']
    )->name('doctor.dashboard');


    // View Consultation
    Route::get(
        '/doctor/consultations/{appointment}',
        [ConsultationController::class, 'show']
    )->name('doctor.consultation.show');


    // Save Consultation
    Route::post(
        '/doctor/consultations/{appointment}',
        [ConsultationController::class, 'store']
    )->name('doctor.consultation.store');


    // Create Prescription using Consultation ID
    Route::get(
        '/doctor/prescriptions/create/{consultation}',
        [PrescriptionController::class, 'create']
    )->name('doctor.prescription.create');


    // Save Prescription using Consultation ID
    Route::post(
        '/doctor/prescriptions/{consultation}',
        [PrescriptionController::class, 'store']
    )->name('doctor.prescription.store');

    Route::get(
    '/doctor/prescriptions/{prescription}/summary',
    [PrescriptionController::class, 'summary']
)->name('doctor.prescription.summary');

Route::delete(
    '/doctor/appointments/{appointment}/consultation',
    [PrescriptionController::class, 'destroy']
)->name('doctor.consultation.destroy');

Route::get(
    '/doctor/profile',
    [DashboardController::class, 'profile']
)->name('doctor.profile');

Route::get(
    '/doctor/profile',
    [DashboardController::class, 'profile']
)->name('doctor.profile');

Route::get(
    '/doctor/appointments/{appointment}/patients/{patient}/history',
    [ConsultationController::class, 'history']
)->name('doctor.patient.history');
Route::get(
    '/doctor/appointments/{appointment}/patients/{patient}/history',
    [ConsultationController::class, 'history']
)->name('doctor.patient.history');

Route::get('/doctor/profile/edit', [DashboardController::class, 'editProfile'])
    ->name('doctor.profile.edit');

Route::put('/doctor/profile', [DashboardController::class, 'updateProfile'])
    ->name('doctor.profile.update');
});


/*
|--------------------------------------------------------------------------
| Admin Dashboard
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])
        ->name('dashboard');

    // Doctors
    Route::get('/doctors', [AdminDoctorController::class, 'index'])
        ->name('doctors.index');
    Route::get('/doctors/create', [AdminDoctorController::class, 'create'])
        ->name('doctors.create');
    Route::post('/doctors', [AdminDoctorController::class, 'store'])
        ->name('doctors.store');
    Route::delete('/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])
        ->name('doctors.destroy');

    // Pharmacists
    Route::get('/pharmacists', [AdminPharmacistController::class, 'index'])
        ->name('pharmacists.index');
    Route::get('/pharmacists/create', [AdminPharmacistController::class, 'create'])
        ->name('pharmacists.create');
    Route::post('/pharmacists', [AdminPharmacistController::class, 'store'])
        ->name('pharmacists.store');
    Route::delete('/pharmacists/{pharmacist}', [AdminPharmacistController::class, 'destroy'])
        ->name('pharmacists.destroy');

    // Appointments
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])
        ->name('appointments.index');
    Route::patch('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])
        ->name('appointments.updateStatus');

    // Reports
    Route::get('/reports', [AdminReportController::class, 'index'])
        ->name('reports.index');
    Route::get('/reports/export-csv', [AdminReportController::class, 'exportCsv'])
        ->name('reports.exportCsv');

});


/*
|--------------------------------------------------------------------------
| Pharmacist Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/pharmacist/dashboard', function () {
    return view('pharmacist.dashboard');
})
    ->middleware(['auth', 'role:pharmacist'])
    ->name('pharmacist.dashboard');


/*
|--------------------------------------------------------------------------
| Nurse Dashboard
|--------------------------------------------------------------------------
*/

Route::get(
    '/nurse/dashboard',
    [NurseDashboardController::class, 'index']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.dashboard');

    Route::get(
    '/nurse/appointments/{appointment}/vitals',
    [VitalSignController::class, 'create']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.vitals.create');
Route::post(
    '/nurse/appointments/{appointment}/vitals',
    [VitalSignController::class, 'store']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.vitals.store');

    Route::get(
    '/nurse/appointments/{appointment}/vitals/summary',
    [VitalSignController::class, 'summary']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.vitals.summary');

    Route::delete(
    '/nurse/appointments/{appointment}/vitals',
    [VitalSignController::class, 'destroy']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.vitals.destroy');

    Route::get(
    '/nurse/profile',
    [NurseDashboardController::class, 'profile']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.profile');

    Route::get('/nurse/profile', [App\Http\Controllers\Nurse\DashboardController::class, 'profile'])
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.profile');

    Route::get(
    '/nurse/walk-ins/create',
    [WalkInController::class, 'create']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.walkins.create');


Route::post(
    '/nurse/walk-ins',
    [WalkInController::class, 'store']
)
    ->middleware(['auth', 'role:nurse'])
    ->name('nurse.walkins.store');

    Route::middleware([
    'auth',
    'role:nurse'
])->group(function () {

    Route::get(
        '/nurse/appointments/{appointment}/vitals',
        [VitalSignController::class, 'create']
    )->name('nurse.vitals.create');


    Route::post(
        '/nurse/appointments/{appointment}/vitals',
        [VitalSignController::class, 'store']
    )->name('nurse.vitals.store');


    Route::get(
        '/nurse/appointments/{appointment}/vitals/summary',
        [VitalSignController::class, 'summary']
    )->name('nurse.vitals.summary');


    Route::delete(
        '/nurse/appointments/{appointment}/vitals',
        [VitalSignController::class, 'destroy']
    )->name('nurse.vitals.destroy');

});

    /*
|--------------------------------------------------------------------------
| Default Authenticated Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


/*
|--------------------------------------------------------------------------
| Profile
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get(
        '/profile',
        [ProfileController::class, 'edit']
    )->name('profile.edit');

    Route::patch(
        '/profile',
        [ProfileController::class, 'update']
    )->name('profile.update');

    Route::delete(
        '/profile',
        [ProfileController::class, 'destroy']
    )->name('profile.destroy');

});


/*
|--------------------------------------------------------------------------
| Social Login
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    Route::get(
        '/auth/{provider}/redirect',
        [SocialLoginController::class, 'redirect']
    )->name('social.redirect');

    Route::get(
        '/auth/{provider}/callback',
        [SocialLoginController::class, 'callback']
    )->name('social.callback');

});


/*
|--------------------------------------------------------------------------
| Patient Appointment Booking & Management (Auth Required)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get(
        '/appointments/book/{doctor}',
        [AppointmentController::class, 'create']
    )->name('appointments.book');

    Route::post(
        '/appointments/book/{doctor}',
        [AppointmentController::class, 'store']
    )->name('appointments.store');

    Route::get(
        '/my-appointments',
        [AppointmentController::class, 'myAppointments']
    )->name('appointments.index');

    Route::patch(
        '/appointments/{appointment}/cancel',
        [AppointmentController::class, 'cancel']
    )->name('appointments.cancel');

});


require __DIR__.'/auth.php';

