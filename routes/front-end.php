<?php
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;


Route::prefix('patient')->group(function () {

     Route::get('/login', [PatientController::class, 'pageLogin'])->name('patient.login');
    Route::post('/login/action', [PatientController::class, 'loginAction'])->name('patient.login.post');

    Route::get('/otp', [PatientController::class, 'pageOtp'])->name('patient.otp');
    Route::post('/otp/action', [PatientController::class, 'otpAction'])->name('patient.otp.post');
    Route::get('/select/user/{phone}', [PatientController::class, 'selectUser'])->name('patient.select.user');
    Route::post('select/user/login', [PatientController::class, 'selectedUserLogin'])->name('patient.selected.user.login');
});

Route::prefix('patient')->middleware('patient')->group(function () {

 Route::get('/', [PatientController::class, 'index'])->name('patient.home');
 Route::get('/book/{doctor}', [PatientController::class, 'bookAppoinment'])->name('patient.book');
 Route::post('/book/appointment', [PatientController::class, 'bookAppoinmentPost'])->name('patient.book.post');
 Route::get('/appointment/confirm/{appoinment}', [PatientController::class, 'apoinmentConfirm'])->name('patient.appointment.confirm');
 Route::get('/all/appointments', [PatientController::class, 'getAllAppoinments'])->name('patient.appointments.all');


 Route::get('appointment/{appoinment}/patient', [PatientController::class, 'GetPatient'])->name('patient.appointment.patient');
 Route::get('appointment/{appoinment}/patient/details', [PatientController::class, 'GetPatientDetails'])->name('patient.appointment.patient.details');


Route::get('/patient/{patient}/vaccination', [PatientController::class, 'GetPatientVaccinationForm'])->name('patient.vaccination');

Route::get('appointment/{appoinment}/patient/{patient}/prescription', [PatientController::class, 'GetPrescriptionDetail'])->name('appointment.patient.prescription');

});
