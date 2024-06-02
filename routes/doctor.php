<?php
use App\Http\Controllers\Account\SettingsController;
use App\Http\Controllers\Documentation\ReferencesController;
use App\Http\Controllers\Logs\SystemLogsController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;



Route::prefix('doctor')->group(function () {

    Route::get('/login', [DoctorController::class, 'pageLogin'])->name('doctor.login');
    Route::post('/login/action', [DoctorController::class, 'loginAction'])->name('doctor.login.post');

    Route::get('/otp', [DoctorController::class, 'pageOtp'])->name('doctor.otp');
    Route::post('/otp/action', [DoctorController::class, 'otpAction'])->name('doctor.otp.post');

    Route::get('/forgot_password', [DoctorController::class, 'pageForgot'])->name('doctor.forgot');
    Route::post('/forgot_password/action', [DoctorController::class, 'forgotAction'])->name('doctor.forgot.post');
    Route::get('/reset_password/{user_email}/{token}', [DoctorController::class, 'pageReset'])->name('doctor.reset');
    Route::post('/reset_password/action', [DoctorController::class, 'resetAction'])->name('doctor.reset.post');

});

Route::prefix('doctor')->middleware('doctor')->group(function () {
    // Route::get('settings', [SettingsController::class, 'index'])->name('settings.index');

    // Route::get('/',function(){
	//     return view('pages.doctor.index');
	// });
    Route::get('/', [DoctorController::class, 'index'])->name('doctor.home');


    Route::get('/appointments', [DoctorController::class, 'GetAppointments'])->name('doctor.appointments');
     Route::get('appointment/{appoinment}/patient', [DoctorController::class, 'GetPatient'])->name('doctor.appointment.patient');

     Route::get('appointment/{appoinment}/patient/{patient}/detail', [DoctorController::class, 'GetPatientDetail'])->name('doctor.appointment.patient.details');

     Route::get('/patient/{patient}/previous/visiting', [DoctorController::class, 'GetPatientVisits'])->name('doctor.patient.visits');

    //  Route::bind('patient', function ($patient) {
    //     return (new \Hashids())->decode($patient)[0] ?? $patient;
    // });



    //Route::get('/patient/{patient}/pediatric', [DoctorController::class, 'GetPatientPediatricForm'])->name('doctor.patient.pediatric');
    Route::get('appointment/{appoinment}/patient/{patient}/pediatric', [DoctorController::class, 'GetPatientPediatricForm'])->name('doctor.patient.pediatric');
    Route::post('/patient/{patient}/pediatric/save', [DoctorController::class, 'PostPatientPediatricForm'])->name('doctor.patient.pediatric.post');

    Route::get('appointment/{appoinment}/patient/{patient}/vaccination', [DoctorController::class, 'GetPatientVaccinationForm'])->name('doctor.patient.vaccination');
    Route::post('/patient/{patient}/vaccination/save', [DoctorController::class, 'PostPatientVaccinationForm'])->name('doctor.patient.vaccination.post');

    Route::get('appointment/{appoinment}/patient/{patient}/dental', [DoctorController::class, 'GetPatientDentalForm'])->name('doctor.patient.dental');
    Route::post('/patient/{patient}/dental/save', [DoctorController::class, 'PostPatientDentalForm'])->name('doctor.patient.dental.post');



    Route::get('appointment/{appoinment}/patient/{patient}/other_services', [DoctorController::class, 'GetOtherServices'])->name('doctor.patient.other_services');

    Route::post('/patient/{patient}/other_services/save', [DoctorController::class, 'PostPatientOtherServiceForm'])->name('doctor.patient.other_services.post');

    /*Prescription*/

     // Route::get('appointment/{appoinment}/patient/{patient}/prescriptions', [DoctorController::class, 'GetPrescriptionDetailPlain'])->name('doctor.appointment.patient.prescription.add');

     Route::get('appointment/{appoinment}/patient/{patient}/prescriptionadd', [DoctorController::class, 'AddPrescriptionDetail'])->name('doctor.appointment.patient.prescription.add');
     Route::get('appointment/{appoinment}/patient/{patient}/prescriptionedit', [DoctorController::class, 'editPrescriptionDetail'])->name('doctor.appointment.patient.prescription.edit');
    Route::get('appointment/{appoinment}/patient/{patient}/prescription/{id}', [DoctorController::class, 'GetPrescriptionDetail'])->name('doctor.appointment.patient.prescription.view');
    Route::get('appointment/{appoinment}/patient/{patient}/prescriptions', [DoctorController::class, 'GetPrescriptionDetailAll'])->name('doctor.appointment.patient.prescription.all');

    Route::get('appointment/{appoinment}/patient/{patient}/prescription', [DoctorController::class, 'GetPrescriptionDetail'])->name('doctor.appointment.patient.prescription');

    Route::get('print/appointment/{appoinment}/prescription/', [DoctorController::class, 'printPrescriptionDetail'])->name('doctor.print.appointment.prescription');

    Route::post('save/{appoinment}/{patient}/prescription', [DoctorController::class, 'PostPrescriptionDetail'])->name('doctor.appointment.prescription.post');
    Route::post('save/{appoinment}/{patient}/edit_prescription', [DoctorController::class, 'editPostPrescriptionDetail'])->name('doctor.appointment.prescription.edit.post');
    Route::post('save/{appoinment}/{patient}/add_prescription', [DoctorController::class, 'addClinicalNoteDetail'])->name('doctor.appointment.clinical.add.post');

    // Route::get('appointment/{appoinment}/patient/{patient}/medicine', [DoctorController::class, 'GetMedicineDetail'])->name('doctor.appointment.patient.prescription.medicine');

     // New
    Route::get('appointment/{appoinment}/patient/{patient}/medicine/{pr_id}', [DoctorController::class, 'GetMedicineDetail'])->name('doctor.appointment.patient.prescription.medicine');

    Route::post('save/{appoinment}/{patient}/medicine', [DoctorController::class, 'PostMedicineDetail'])->name('doctor.appointment.patient.prescription.medicine.post');

    Route::get('doctor/search/medicine', [DoctorController::class, 'SearchMedicine'])->name('doctor.search.medicine');

    Route::get('doctor/edit/medicine', [DoctorController::class, 'EditMedicine'])->name('doctor.edit.medicine');
    Route::get('doctor/delete/medicine', [DoctorController::class, 'DeleteMedicine'])->name('doctor.delete.medicine');


// VG

Route::get('appointment/{appoinment}/patient/{patient}/reports', [DoctorController::class, 'GetReports'])->name('doctor.patient.reports');
Route::post('save/{appoinment}/{patient}/reports', [DoctorController::class, 'PostReportDetail'])->name('doctor.appointment.patient.reports.post');
Route::get('patient/{pid}/search/report', [DoctorController::class, 'SearchReport'])->name('doctor.patient.search.report');
Route::get('appointment/{appoinment}/patient/{patient}/reports', [DoctorController::class, 'GetReports'])->name('doctor.patient.reports');

Route::get('appoinment/{appoinment}/patient/{patient}/case_summery', [DoctorController::class, 'GetCaseSummery'])->name('doctor.patient.case_summery');

Route::get('appoinment/{appoinment}/patient/{patient}/paediatrics_case_summery', [DoctorController::class, 'GetPaediatricsCaseSummery'])->name('doctor.patient.paediatrics_case_summery');
Route::get('appoinment/{appoinment}/patient/{patient}/dental_case_summery', [DoctorController::class, 'GetDentalCaseSummery'])->name('doctor.patient.dental_case_summery');
Route::get('appoinment/{appoinment}/patient/{patient}/gynaecology_case_summery', [DoctorController::class, 'GetGynaecologyCaseSummery'])->name('doctor.patient.gynaecology_case_summery');
Route::get('appoinment/{appoinment}/patient/{patient}/physiotherapy_case_summery', [DoctorController::class, 'GetPhysiotherapyCaseSummery'])->name('doctor.patient.physiotherapy_case_summery');
Route::get('appoinment/{appoinment}/patient/{patient}/women_wellness_case_summery', [DoctorController::class, 'GetWomenWellnessCaseSummery'])->name('doctor.patient.women_wellness_case_summery');

Route::get('appointment/{appoinment}/patient/{patient}/clinical_notes_add', [DoctorController::class, 'AddClinicalNotesDetail'])->name('doctor.appointment.patient.clinical_notes.add');

Route::post('/patient/{patient}/clinical_notes/save', [DoctorController::class, 'PostClinicalNotesForm'])->name('doctor.patient.clinical_notes.post');


Route::get('appointment/{appoinment}/patient/{patient}/anthropometry_growth_chart', [DoctorController::class, 'GetAnthropometryGrowthChart'])->name('doctor.patient.anthropometry_growth_chart');
Route::post('save/patient/{patient}/growth_chart', [DoctorController::class, 'PostGrowthChart'])->name('doctor.patient.growthchart.post');


Route::get('appointment/{appoinment}/patient/{patient}/women_wellness', [DoctorController::class, 'GetWomenWellnessForm'])->name('doctor.patient.women_wellness');
Route::post('/patient/{patient}/women_wellness/save', [DoctorController::class, 'PostWomenWellnessForm'])->name('doctor.patient.women_wellness.post');
Route::get('appointment/{appoinment}/patient/{patient}/physiotherapy', [DoctorController::class, 'GetPhysiotherapyForm'])->name('doctor.patient.physiotherapy');
Route::post('/patient/{patient}/physiotherapy/save', [DoctorController::class, 'PostPhysiotherapyForm'])->name('doctor.patient.physiotherapy.post');

Route::get('appointment/{appoinment}/patient/{patient}/gynaecology_case_record', [DoctorController::class, 'GetGynaecologyCaseRecordForm'])->name('doctor.patient.gynaecology_case_record');
Route::post('/patient/{patient}/gynaecology_case_record/save', [DoctorController::class, 'PostGynaecologyCaseRecordForm'])->name('doctor.patient.gynaecology_case_record.post');

Route::get('appointment/{appoinment}/patient/{patient}/{type}/prescriptionadd', [DoctorController::class, 'AddPrescriptionDetail'])->name('doctor.appointment.patient.type.prescription.add');

Route::get('doctor/delete/reports', [DoctorController::class, 'DeleteReport'])->name('doctor.delete.reports');
Route::get('patient/{pid}/edit/report', [DoctorController::class, 'editReport'])->name('doctor.patient.edit.report');
Route::post('save/{appoinment}/{patient}/report', [DoctorController::class, 'updateReport'])->name('doctor.patient.update.report.post');


});