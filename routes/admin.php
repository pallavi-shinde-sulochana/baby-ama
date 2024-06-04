<?php
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PharmacyController;
use App\Http\Controllers\TherapistController;



Route::prefix('admin')->middleware(['auth','role:super-admin|admin|pharmacy|therapist'])->group(function () {

	// Admin Index
	Route::get('/index', [AdminController::class, 'dashboard'])->name('admin.index');


	// Admin Users
	Route::get('/users/{type}', [AdminController::class, 'usersCrud'])->name('admin.users.list');

	/*New Admin Users doctors pharmacy and therapist*/

	Route::get('/users/add/administrator', [AdminController::class, 'addAdmin'])->name('admin.users.add.admin');
	Route::get('/users/update/administrator/{admin}', [AdminController::class, 'addAdmin'])->name('admin.users.update.admin');
	Route::get('/users/delete/administrator/{admin}', [AdminController::class, 'deleteAdmin'])->name('admin.users.delete.admin');
	Route::post('/users/save/administrator', [AdminController::class, 'storeAdmin'])->name('admin.users.post.admin');
	Route::get('/users/list/administrator', [AdminController::class, 'listAdmin'])->name('admin.users.list.admin');

	// Doctor Related
	Route::get('/users/add/doctor', [DoctorController::class, 'addDoctor'])->name('doctor.users.add.doctor');
	Route::get('/users/update/doctor/{doctor}', [DoctorController::class, 'addDoctor'])->name('doctor.users.update.doctor');
	Route::get('/users/delete/doctor/{doctor}', [DoctorController::class, 'deleteDoctor'])->name('doctor.users.delete.doctor');
	Route::post('/users/save/doctor', [DoctorController::class, 'storeDoctor'])->name('doctor.users.post.doctor');
	Route::get('/users/list/doctor', [DoctorController::class, 'listDoctor'])->name('doctor.users.list.doctor');

	// Pharmacy User Related
	Route::get('/users/add/pharmacy', [PharmacyController::class, 'addPharmacy'])->name('pharmacy.users.add.pharmacy');
	Route::get('/users/update/pharmacy/{pharmacy}', [PharmacyController::class, 'addPharmacy'])->name('pharmacy.users.update.pharmacy');
	Route::get('/users/delete/pharmacy/{pharmacy}', [PharmacyController::class, 'deletePharmacy'])->name('pharmacy.users.delete.pharmacy');
	Route::post('/users/save/pharmacy', [PharmacyController::class, 'storePharmacy'])->name('pharmacy.users.post.pharmacy');
	Route::get('/users/list/pharmacy', [PharmacyController::class, 'listPharmacy'])->name('pharmacy.users.list.pharmacy');

	// Therapist User Related
	Route::get('/users/add/therapist', [TherapistController::class, 'addTherapist'])->name('therapist.users.add.therapist');
	Route::get('/users/update/therapist/{therapist}', [TherapistController::class, 'addTherapist'])->name('therapist.users.update.therapist');
	Route::get('/users/delete/therapist/{therapist}', [TherapistController::class, 'deleteTherapist'])->name('therapist.users.delete.therapist');
	Route::post('/users/save/therapist', [TherapistController::class, 'storeTherapist'])->name('therapist.users.post.therapist');
	Route::get('/users/list/therapist', [TherapistController::class, 'listTherapist'])->name('therapist.users.list.therapist');

	// Patients related
	Route::get('/patients', [AdminController::class, 'listPatients'])->name('admin.patients.list');

	Route::get('/create/patient', [AdminController::class, 'createPatients'])->name('admin.patients.create');

	Route::get('/update/patient/{patient}', [AdminController::class, 'createPatients'])->name('admin.patients.update');

	Route::post('/store/patient', [AdminController::class, 'storePatients'])->name('admin.patients.store');

	Route::get('/appointments', [AdminController::class, 'getAllAppoinments'])->name('admin.patients.appointments');

	Route::get('/patient/{patient}/create/appointment', [AdminController::class, 'addPatientAppoinments'])->name('admin.patient.create.appointment');

	Route::post('/patient/{patient}/create/appointment', [AdminController::class, 'addStorePatientAppoinments'])->name('admin.patient.create.store.appointment');

    // routes/web.php

    Route::delete('patients/{patient}', [AdminController::class, 'destroyPatients'])->name('admin.patients.destroy');
    Route::post('patients/{patient}/restore', [AdminController::class, 'restorePatients'])->name('admin.patients.restore');



	Route::get('/appointments/{appointment}', [AdminController::class, 'getAppoinment'])->name('admin.patients.get.appointment');

	Route::get('/appointments/{appointment}/edit', [AdminController::class, 'editAppoinment'])->name('admin.patients.edit.appointment');


	Route::get('/appointments/{appointment}/decline/{status}', [AdminController::class, 'declineAppoinment'])->name('admin.patients.decline.appointment');



	Route::post('/appointments/{appointment}/alter', [AdminController::class, 'alterAppoinment'])->name('admin.patients.alter.appointment');


	Route::post('/appointments/assign/doctor', [AdminController::class, 'assignDoctor'])->name('admin.patients.assign.doctor');
	Route::get('/appointment/{appointment_id}/prescription/{prescription_id}',[AdminController::class,'getPrescriptionDetails'])->name('admin.patients.appointments.prescription');
	Route::post('/appointment/prescription/order-and-payment-update',[AdminController::class,'updatePrescriptionOrderAndPaymentStatus'])->name('admin.patients.prescription.order-and-payment-update.save');

	Route::get('print/appointment/{appoinment}/prescription/', [AdminController::class, 'printPrescriptionDetail'])->name('admin.print.appointment.prescription');
	Route::get('print/appointment/{appoinment}/billing/', [AdminController::class, 'printBillingDetail'])->name('admin.print.appointment.billing');
	Route::get('appointment/{appoinment}/billing',[AdminController::class,'appointmentBilling'])->name('admin.patients.appointments.billing');
	Route::post('appointment/billing/save',[AdminController::class,'appointmentBillingSave'])->name('admin.patients.appointments.billing.save');

});



/*Route::group(['middleware' => ['role:super-admin']], function () {
    //
});*/

Route::get('/create-therapist-user-role',function(){
	\Spatie\Permission\Models\Role::create(['name' => 'therapist']);
});
