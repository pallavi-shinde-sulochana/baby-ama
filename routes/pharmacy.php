<?php
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PharmacyController;
use Illuminate\Support\Facades\Route;



Route::prefix('pharmacy')->group(function () {

    Route::get('/login', [PharmacyController::class, 'pageLogin'])->name('pharmacy.login');
    Route::post('/login/action', [PharmacyController::class, 'loginAction'])->name('pharmacy.login.post');
    Route::get('/otp', [PharmacyController::class, 'pageOtp'])->name('pharmacy.otp');
    Route::post('/otp/action', [PharmacyController::class, 'otpAction'])->name('pharmacy.otp.post');
});

Route::prefix('pharmacy')->middleware('pharmacy')->group(function () {
    Route::get('/', [PharmacyController::class, 'index'])->name('pharmacy.home');
    Route::get('/inventory/addmedicine', [PharmacyController::class, 'addmedicine'])->name('pharmacy.inventory.addmedicine');
    Route::get('/inventory/medicinelist', [PharmacyController::class, 'medicinelist'])->name('pharmacy.inventory.medicinelist');
    Route::post('/pharmacy/inventory/addmedicine/save', [PharmacyController::class, 'PostAddmedicine'])->name('pharmacy.inventory.addmedicine.post');
    Route::get('pharmacy/inventory/search/medicine', [PharmacyController::class, 'SearchMedicine'])->name('pharmacy.inventory.search.medicine');
    Route::get('/billing/prescription/list', [PharmacyController::class, 'prescriptionList'])->name('pharmacy.billing.prescription.list');
    Route::get('/billing/patient/{prescription_id}/prescription', [PharmacyController::class, 'GetUserPrescription'])->name('pharmacy.billing.patient.prescription');

    Route::get('/billing/{prid}/patient/{userid}/invoice', [PharmacyController::class, 'GetPatientInvoice'])->name('pharmacy.billing.patient.invoice');
    Route::get('/print/billing/{prid}/patient/{userid}/invoice', [PharmacyController::class, 'PrintPatientInvoice'])->name('pharmacy.print.billing.patient.invoice');

    Route::get('/billing/delete/medicine', [PharmacyController::class, 'DeclinedPrescription'])->name('pharmacy.billing.delete.medicine');

    Route::post('save/{prid}/medicine', [PharmacyController::class, 'PostMedicineDetail'])->name('pharmacy.billing.prescription.medicine.post');

  Route::get('/pharmacy/billing/search/patient/prescription', [PharmacyController::class, 'SearchPatientlist'])->name('pharmacy.billing.search.patient.prescription');

});
