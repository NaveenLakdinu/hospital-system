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
use App\Http\Controllers\Pharmacist\MedicineController;
use App\Http\Controllers\Pharmacist\PrescriptionController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\LabTestController;

Route::middleware(['auth'])->group(function () {
    Route::get('/lab-tests', [LabTestController::class, 'index'])->name('lab.index');
    Route::post('/lab-tests/book', [LabTestController::class, 'store'])->name('lab.store');
    Route::get('/my-lab-bookings', [LabTestController::class, 'myBookings'])->name('lab.my_bookings');
    Route::patch('/lab-tests/{id}/cancel', [LabTestController::class, 'cancel'])->name('lab.cancel');
});

/*
|--------------------------------------------------------------------------
|cold-cough-fever-info
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/cold-cough-fever-info', function () {
        return view('cold_cough_fever.info');
    })->name('cold_cough_fever.info');
});
/*
|--------------------------------------------------------------------------
| joint_pain.info
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/joint-pain-info', function () {
        return view('joint_pain.info');
    })->name('joint_pain.info');
});

/*
|--------------------------------------------------------------------------
| skin-info
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {
    Route::get('/skin-info', function () {
        return view('skin.info');
    })->name('skin.info');
});
/*
|--------------------------------------------------------------------------
| pregnancy.info
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/pregnancy-info', function () {
        return view('pregnancy.info');
    })->name('pregnancy.info');
});
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

/*
|--------------------------------------------------------------------------
| Doctor Portal Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:doctor'])->prefix('doctor')->name('doctor.')->group(function () {
    Route::get('/dashboard', [DoctorDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/consultations/{appointment}', [DoctorConsultationController::class, 'show'])->name('consultation.show');
});

/*
|--------------------------------------------------------------------------
| Pharmacist Portal Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'role:pharmacist'])->prefix('pharmacist')->name('pharmacist.')->group(function () {
    Route::get('/dashboard', function () {
        return view('pharmacist.dashboard');
    })->name('dashboard');
    Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');
    Route::post('/medicines', [MedicineController::class, 'store'])->name('medicines.store');
    Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('prescriptions.index');
    Route::post('/prescriptions/{id}/dispense', [PrescriptionController::class, 'dispense'])->name('prescriptions.dispense');
});

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

/*
|--------------------------------------------------------------------------
| Pharmacist Module Routes 
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->prefix('pharmacist')->group(function () {
    Route::get('/medicines', [MedicineController::class, 'index'])->name('pharmacist.medicines.index');
    Route::post('/medicines', [MedicineController::class, 'store'])->name('pharmacist.medicines.store');

    Route::get('/prescriptions', [PrescriptionController::class, 'index'])->name('pharmacist.prescriptions.index');
    Route::post('/prescriptions/{id}/dispense', [PrescriptionController::class, 'dispense'])->name('pharmacist.prescriptions.dispense');
});

/*
|--------------------------------------------------------------------------
| Chatbot Module Routes 
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::post('/chatbot/ask', [ChatbotController::class, 'ask'])->name('chatbot.ask');
});
Route::middleware(['auth'])->group(function () {
    // ඩිරෙක්ට් පිටුවෙන් Chatbot UI එක බලන්න:
    Route::get('/chatbot', function () {
        return view('chatbot.index');
    })->name('chatbot.index');
});



require __DIR__.'/auth.php';


require __DIR__.'/auth.php';

