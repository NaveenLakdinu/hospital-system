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
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');

// Doctor Search & Listing (Public / Patient)
Route::get('/doctors', [DoctorController::class, 'index'])->name('doctors.index');

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

    // Clinic Appointments Monitoring
    Route::get('/appointments', [AdminAppointmentController::class, 'index'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/status', [AdminAppointmentController::class, 'updateStatus'])->name('appointments.updateStatus');

    // Administrator Reports & Analytics
    Route::get('/reports', [AdminReportController::class, 'index'])->name('reports.index');
    Route::get('/reports/export', [AdminReportController::class, 'exportCsv'])->name('reports.export');

    // Administrator Pharmacist Management
    Route::get('/pharmacists', [AdminPharmacistController::class, 'index'])->name('pharmacists.index');
    Route::get('/pharmacists/create', [AdminPharmacistController::class, 'create'])->name('pharmacists.create');
    Route::post('/pharmacists', [AdminPharmacistController::class, 'store'])->name('pharmacists.store');
    Route::delete('/pharmacists/{pharmacist}', [AdminPharmacistController::class, 'destroy'])->name('pharmacists.destroy');
});

/*
|--------------------------------------------------------------------------
| Doctor Portal Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/consultations/{appointment}', [DoctorConsultationController::class, 'show'])->name('consultation.show');
});

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
| Patient Appointment Booking & Management
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/appointments/book/{doctor}', [AppointmentController::class, 'create'])->name('appointments.book');
    Route::post('/appointments/book/{doctor}', [AppointmentController::class, 'store'])->name('appointments.store');
    Route::get('/my-appointments', [AppointmentController::class, 'myAppointments'])->name('appointments.index');
    Route::patch('/appointments/{appointment}/cancel', [AppointmentController::class, 'cancel'])->name('appointments.cancel');
});

/*
|--------------------------------------------------------------------------
| Chatbot Module Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');
    Route::get('/chatbot', function () {
        return view('chatbot.index');
    })->name('chatbot.index');
});

require __DIR__.'/auth.php';