<?php

use Illuminate\Support\Facades\Route;

// Auth & Profile
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\ProfileController;

// Public
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LabTestController;

// Doctor Portal
use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\ConsultationController;
use App\Http\Controllers\Doctor\PrescriptionController;

// Admin Portal
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\DoctorController as AdminDoctorController;
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\PharmacistController as AdminPharmacistController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;

// Nurse Portal
use App\Http\Controllers\Nurse\DashboardController as NurseDashboardController;
use App\Http\Controllers\Nurse\VitalSignController;
use App\Http\Controllers\Nurse\WalkInController;

// Pharmacy
use App\Http\Controllers\PharmacyController;

/*
|--------------------------------------------------------------------------
| Public Pages
|--------------------------------------------------------------------------
*/

Route::get('/', fn() => view('welcome'))->name('welcome');
Route::get('/home', fn() => view('home'))->name('home');

// Public doctor listing
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');

/*
|--------------------------------------------------------------------------
| Admin Portal
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Doctors
    Route::get('/doctors',          [AdminDoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create',   [AdminDoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors',         [AdminDoctorController::class, 'store'])->name('doctors.store');
    Route::delete('/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])->name('doctors.destroy');

    // Pharmacists
    Route::get('/pharmacists',              [AdminPharmacistController::class, 'index'])->name('pharmacists.index');
    Route::get('/pharmacists/create',       [AdminPharmacistController::class, 'create'])->name('pharmacists.create');
    Route::post('/pharmacists',             [AdminPharmacistController::class, 'store'])->name('pharmacists.store');
    Route::delete('/pharmacists/{pharmacist}', [AdminPharmacistController::class, 'destroy'])->name('pharmacists.destroy');

    // Appointments
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

    // Reports
    Route::get('/reports',            [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export-csv', [AdminReportController::class, 'exportCsv'])->name('reports.exportCsv');
});

/*
|--------------------------------------------------------------------------
| Doctor Portal
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:doctor'])->group(function () {

    Route::get('/doctor/dashboard', [DashboardController::class, 'dashboard'])->name('doctor.dashboard');

    Route::get('/doctor/profile',       [DashboardController::class, 'profile'])->name('doctor.profile');
    Route::get('/doctor/profile/edit',  [DashboardController::class, 'editProfile'])->name('doctor.profile.edit');
    Route::put('/doctor/profile',       [DashboardController::class, 'updateProfile'])->name('doctor.profile.update');

    Route::get('/doctor/consultations/{appointment}',  [ConsultationController::class, 'show'])->name('doctor.consultation.show');
    Route::post('/doctor/consultations/{appointment}', [ConsultationController::class, 'store'])->name('doctor.consultation.store');

    Route::get('/doctor/prescriptions/create/{consultation}', [PrescriptionController::class, 'create'])->name('doctor.prescription.create');
    Route::post('/doctor/prescriptions/{consultation}',       [PrescriptionController::class, 'store'])->name('doctor.prescription.store');
    Route::get('/doctor/prescriptions/{prescription}/summary', [PrescriptionController::class, 'summary'])->name('doctor.prescription.summary');

    Route::delete('/doctor/appointments/{appointment}/consultation', [PrescriptionController::class, 'destroy'])->name('doctor.consultation.destroy');

    Route::get('/doctor/appointments/{appointment}/patients/{patient}/history', [ConsultationController::class, 'history'])->name('doctor.patient.history');
});

/*
|--------------------------------------------------------------------------
| Nurse Portal
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:nurse'])->group(function () {

    Route::get('/nurse/dashboard', [NurseDashboardController::class, 'index'])->name('nurse.dashboard');
    Route::get('/nurse/profile',   [NurseDashboardController::class, 'profile'])->name('nurse.profile');

    Route::get('/nurse/appointments/{appointment}/vitals',         [VitalSignController::class, 'create'])->name('nurse.vitals.create');
    Route::post('/nurse/appointments/{appointment}/vitals',        [VitalSignController::class, 'store'])->name('nurse.vitals.store');
    Route::get('/nurse/appointments/{appointment}/vitals/summary', [VitalSignController::class, 'summary'])->name('nurse.vitals.summary');
    Route::delete('/nurse/appointments/{appointment}/vitals',      [VitalSignController::class, 'destroy'])->name('nurse.vitals.destroy');

    Route::get('/nurse/walk-ins/create', [WalkInController::class, 'create'])->name('nurse.walkins.create');
    Route::post('/nurse/walk-ins',       [WalkInController::class, 'store'])->name('nurse.walkins.store');
});

/*
|--------------------------------------------------------------------------
| Pharmacist Portal
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:pharmacist'])->prefix('pharmacist')->name('pharmacist.')->group(function () {

    Route::get('/dashboard',    [PharmacyController::class, 'dashboard'])->name('dashboard');
    Route::get('/medicines',    [PharmacyController::class, 'inventory'])->name('medicines.index');
    Route::post('/medicines',   [PharmacyController::class, 'storeMedicine'])->name('medicines.store');
    Route::get('/prescriptions', [PharmacyController::class, 'receivedNotes'])->name('prescriptions.index');
    Route::patch('/prescriptions/{id}/dispense', [PharmacyController::class, 'issueMedicineNote'])->name('prescriptions.dispense');
});

/*
|--------------------------------------------------------------------------
| Patient — Appointments & Lab Tests
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/appointments/book/{doctor}',         [AppointmentController::class, 'create'])->name('appointments.book');
    Route::post('/appointments/book/{doctor}',        [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/my-appointments',                    [AppointmentController::class, 'myAppointments'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/cancel',[AppointmentController::class, 'cancel'])->name('appointments.cancel');

    Route::get('/lab-tests',              [LabTestController::class, 'index'])->name('lab.index');
    Route::post('/lab-tests/book',        [LabTestController::class, 'store'])->name('lab.store');
    Route::get('/my-lab-bookings',        [LabTestController::class, 'myBookings'])->name('lab.my_bookings');
    Route::patch('/lab-tests/{id}/cancel',[LabTestController::class, 'cancel'])->name('lab.cancel');
});

/*
|--------------------------------------------------------------------------
| Chatbot
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');
    Route::get('/chatbot', fn() => view('chatbot.index'))->name('chatbot.index');
});

/*
|--------------------------------------------------------------------------
| Health & Wellness Info Pages
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/depression-anxiety-info', fn() => view('depression_anxiety.info'))->name('depression_anxiety.info');
    Route::get('/child-feeding-info',      fn() => view('child_feeding.info'))->name('child_feeding.info');
    Route::get('/cold-cough-fever-info',   fn() => view('cold_cough_fever.info'))->name('cold_cough_fever.info');
    Route::get('/joint-pain-info',         fn() => view('joint_pain.info'))->name('joint_pain.info');
    Route::get('/skin-info',               fn() => view('skin.info'))->name('skin.info');
    Route::get('/pregnancy-info',          fn() => view('pregnancy.info'))->name('pregnancy.info');
});

/*
|--------------------------------------------------------------------------
| Profile (Authenticated)
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::get('/profile',    [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile',  [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', fn() => view('dashboard'))->middleware('verified')->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Social Login (Guest only)
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/auth/{provider}/redirect', [SocialLoginController::class, 'redirect'])->name('social.redirect');
    Route::get('/auth/{provider}/callback', [SocialLoginController::class, 'callback'])->name('social.callback');
});

/*
|--------------------------------------------------------------------------
| Auth Routes (login, register, password reset, logout)
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
