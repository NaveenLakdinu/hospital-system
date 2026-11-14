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
use App\Http\Controllers\Admin\AppointmentController as AdminAppointmentController;
use App\Http\Controllers\Admin\PharmacistController as AdminPharmacistController;
use App\Http\Controllers\Admin\ReportController as AdminReportController;
use App\Http\Controllers\Doctor\DashboardController as DoctorDashboardController;
use App\Http\Controllers\Doctor\ConsultationController as DoctorConsultationController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LabTestController;

/*
|--------------------------------------------------------------------------
| Lab Tests Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/lab-tests', [LabTestController::class, 'index'])->name('lab.index');
    Route::post('/lab-tests/book', [LabTestController::class, 'store'])->name('lab.store');
    Route::get('/my-lab-bookings', [LabTestController::class, 'myBookings'])->name('lab.my_bookings');
    Route::patch('/lab-tests/{id}/cancel', [LabTestController::class, 'cancel'])->name('lab.cancel');
});

/*
|--------------------------------------------------------------------------
| Health & Wellness Information Pages
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/depression-anxiety-info', function () {
        return view('depression_anxiety.info');
    })->name('depression_anxiety.info');

    Route::get('/child-feeding-info', function () {
        return view('child_feeding.info');
    })->name('child_feeding.info');

    Route::get('/cold-cough-fever-info', function () {
        return view('cold_cough_fever.info');
    })->name('cold_cough_fever.info');

    Route::get('/joint-pain-info', function () {
        return view('joint_pain.info');
    })->name('joint_pain.info');

    Route::get('/skin-info', function () {
        return view('skin.info');
    })->name('skin.info');

    Route::get('/pregnancy-info', function () {
        return view('pregnancy.info');
    })->name('pregnancy.info');
});

/*
|--------------------------------------------------------------------------
| Public Welcome & Home Pages

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

| Admin Portal Routes
|--------------------------------------------------------------------------
*/
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/doctors', [AdminDoctorController::class, 'index'])->name('doctors.index');
    Route::get('/doctors/create', [AdminDoctorController::class, 'create'])->name('doctors.create');
    Route::post('/doctors', [AdminDoctorController::class, 'store'])->name('doctors.store');
    Route::delete('/doctors/{doctor}', [AdminDoctorController::class, 'destroy'])->name('doctors.destroy');
/*
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


    // Administrator Reports & Analytics
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export', [AdminReportController::class, 'exportCsv'])->name('reports.export');

    // Administrator Pharmacist Management
    Route::get('/pharmacists', [AdminPharmacistController::class, 'index'])->name('pharmacists.index');
    Route::get('/pharmacists/create', [AdminPharmacistController::class, 'create'])->name('pharmacists.create');
    Route::post('/pharmacists', [AdminPharmacistController::class, 'store'])->name('pharmacists.store');
    Route::delete('/pharmacists/{pharmacist}', [AdminPharmacistController::class, 'destroy'])->name('pharmacists.destroy');

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

Route::get(
    '/admin/dashboard',
    [AdminDashboardController::class, 'index']
)
    ->middleware(['auth', 'role:admin'])
    ->name('admin.dashboard');


// Doctor Send Medicine Note to Pharmacy
Route::middleware(['auth'])->group(function () {
    Route::get('/doctor/prescribe', [PharmacyController::class, 'createDoctorNote'])->name('doctor.prescribe.create');
    Route::post('/doctor/prescribe', [PharmacyController::class, 'storeDoctorNote'])->name('doctor.prescribe.store');
});

/*
|--------------------------------------------------------------------------

| Pharmacist & Pharmacy Admin Portal Routes (Updated New UI)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Pharmacist Role Login Redirect Routes (/pharmacist/...)
    Route::prefix('pharmacist')->name('pharmacist.')->group(function () {
        Route::get('/dashboard', [PharmacyController::class, 'dashboard'])->name('dashboard');
        Route::get('/medicines', [PharmacyController::class, 'inventory'])->name('medicines.index');
        Route::post('/medicines', [PharmacyController::class, 'storeMedicine'])->name('medicines.store');
        Route::get('/prescriptions', [PharmacyController::class, 'receivedNotes'])->name('prescriptions.index');
        Route::patch('/prescriptions/{id}/dispense', [PharmacyController::class, 'issueMedicineNote'])->name('prescriptions.dispense');
    });

    // Pharmacy Portal Full Routes (/pharmacy/...)
    Route::prefix('pharmacy')->name('pharmacy.')->group(function () {
        Route::get('/dashboard', [PharmacyController::class, 'dashboard'])->name('dashboard');

        // Edit Profile
        Route::get('/edit-profile', [PharmacyController::class, 'editProfile'])->name('profile.edit');
        Route::post('/edit-profile', [PharmacyController::class, 'updateProfile'])->name('profile.update');

        // Medicine Inventory (Add, Update, Delete)
        Route::get('/inventory', [PharmacyController::class, 'inventory'])->name('inventory.index');
        Route::post('/inventory', [PharmacyController::class, 'storeMedicine'])->name('inventory.store');
        Route::put('/inventory/{id}', [PharmacyController::class, 'updateMedicine'])->name('inventory.update');
        Route::delete('/inventory/{id}', [PharmacyController::class, 'destroyMedicine'])->name('inventory.destroy');

        // Doctor Received Medicine Notes & Issue Medicine
        Route::get('/received-notes', [PharmacyController::class, 'receivedNotes'])->name('notes.index');
        Route::patch('/received-notes/{id}/issue', [PharmacyController::class, 'issueMedicineNote'])->name('notes.issue');

        // Doctor Records & Reports
        Route::get('/doctor-records', [PharmacyController::class, 'doctorRecords'])->name('doctors.index');
        Route::get('/reports', [PharmacyController::class, 'reports'])->name('reports.index');
    });
});

/*
|--------------------------------------------------------------------------
| Authenticated Dashboard & Profile

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

| Patient Appointment Booking & Management

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

| Chatbot Module Routes

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

    Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');
    Route::get('/chatbot', function () {
        return view('chatbot.index');
    })->name('chatbot.index');
});

require __DIR__.'/auth.php';


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

