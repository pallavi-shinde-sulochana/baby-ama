<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Patient;
use App\Models\User;
use App\Models\UserInfo;
use App\Models\Appoinment;
use Carbon\Carbon;
use App\Traits\SMSTrait;
use App\Models\Medicine;
use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use App\Models\PediatricForm;
use App\Models\PatientPediatricForm;
use App\Models\PatientVaccinationForm;
use App\Models\PatientDentalForm;
use App\Models\InvestigationReports;
use App\Models\ClinicalNotes;
use App\Models\AnthropometryGrowthCharts;
use App\Models\WomenWellness;
use App\Models\Physiotherapy;
use App\Models\Gynaecology;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Str;

use Hash;
use Auth;
use Mail;
use DB;



class DoctorController extends Controller
{
    use SMSTrait;

    public function __construct(){
        if (!\Auth::user()){
           return view('pages.doctor.login');
        }
    }

    public function pageLogin(){
        return view('pages.doctor.login');
    }
    public function pageOtp(){
        return view('pages.doctor.otp');
    }
    public function pageForgot(){
        return view('pages.doctor.forgot_password');
    }
    public function pageReset($email,$token){
        $reset_email = base64_decode($email);
        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $reset_email,
                              'token' => $token
                            ])
                            ->first();

        if(!$updatePassword){
            return redirect()->route('doctor.login')->with('error', 'Invalid Request!');
        }
        else{
            return view('pages.doctor.reset_password', ['email' => $email,'token' => $token]);
        }
    }
    public function resetAction(Request $request)
    {
        $request->validate([
            //'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $reset_email = base64_decode($request->reset_email);
        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $reset_email,
                              'token' => $request->reset_token
                            ])
                            ->first();

        if(!$updatePassword){
            return redirect()->back()->with('error', 'Invalid Request!');
        }

        $user = User::where('email', $reset_email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $reset_email])->delete();

        return redirect()->route('doctor.login')->with('success', 'Your password has been changed!');

    }
    public function forgotAction(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
          ]);

          $checkEmailId = User::where('email',$request->email)->first();

        if($checkEmailId)
        {
        $mailID = $request->email;
        $user_email = base64_encode($mailID);
        $reset_url = route('doctor.reset',['user_email'=>$user_email,'token'=>$token]);
        $site_url  = route('doctor.login');
        $data = [
            'reset_url' => $reset_url,
            'site_url' => $site_url
        ];
    }

        Mail::send('pages.doctor.mail', ["data1"=>$data], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
            $message->from('svijayalakshmi17@gmail.com','BABYAMA-TEAM');

        });

        return redirect()->back()->with('success', 'We have e-mailed your password reset link!');
    }
    public function forgotActionold(Request $request){
       $rules = [
            'email' => 'required|email',
        ];

        $validated = $request->validate($rules);
        $checkEmailId = User::where('email',$request->email)->first();

        if($checkEmailId)
        {
        $uname = $checkEmailId->name;
        $name = array('name'=>$uname);
        $mailID = $request->email;
        $token = base64_encode($mailID);
        $uid = $checkEmailId->id;
        $reset_url = route('doctor.reset',['userid'=>$uid,'user_email'=>$token]);
        $site_url  = route('doctor.login');
        $sub = "Here’s the link to reset your password";
        $data = [
            'reset_url' => $reset_url,
            'site_url' => $site_url
        ];
        $mailSent = Mail::send('pages.doctor.mail', ["data1"=>$data], function($message) use($mailID, $sub) {
            $message->to($mailID)->subject($sub);
            $message->from('svijayalakshmi17@gmail.com','BABYAMA-ADMIN');
        });

        if($mailSent)
        {

        }
        else
        {
            return redirect()->back()->with('error','Email not Sent');
        }

        }
        else
        {
            return redirect()->back()->with('error','Email ID not match');
        }

    }

    public function index(){

        // $data = Appoinment::get();
        $doc_id = helperGetAuthUser('id');
         // $today = Carbon::today();
         $today = date('Y-m-d');
        $data = Appoinment::where('appoinment_date',$today)->where('doctor_id',$doc_id)->orderBy('appoinment_session', 'DESC')->get();

        return view('pages.doctor.index', compact('data'));
    }

    public function loginAction(Request $request){
        /*$validated = $request->validate([
            'mobile' => 'required|numeric|min:10'
        ],
        [
            'mobile.min' => 'Enter 10 digit mobile number'
        ]);
*/

       $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validated = $request->validate($rules);

        $userdata = $request->only('email', 'password');

        if (Auth::attempt($userdata)) {
            $roles = Auth::user()->getRoleNames()->toArray();
            //print_r($roles); exit;
            if($roles && !in_array('doctor',$roles)){
                Auth::guard('web')->logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
              return redirect()->back()->with('error','Oops! you does not have the proper permission');
            }else{
                return redirect()->route('doctor.home')->with('success', 'Welcome Back Dear Doctor! ');
            }


            // return redirect()->intended('front.page.customer.profile')
                        // ->withSuccess('You have Successfully loggedin');
        }else{
            return redirect()->back()->with('error','Oops! You have entered invalid credentials,');
        }




        // Check Doctor is there - OY PHONE OTP

        // $userInfo = UserInfo::where('phone',$request->mobile)->first();

        // if(!$userInfo){
        //      return redirect()->back()->with('error', 'Your mobile number not registers with as kindly contact the administrator');
        // }else{
        //     $getUser = $userInfo->user;
        //     $getUserRole = $getUser->roles->pluck("name")->first();
        //     if($getUserRole!='doctor'){
        //         return redirect()->back()->with('error', 'You are not a Doctor, Kindly chek with administrator');
        //     }else{

        //         /*Send OTP*/
        //         $otp = helperGenerateOTP();

        //         // $this->sendSMS($userInfo->phone,$otp);

        //         helperSetSystemSession('auth_doc_id',$getUser->id);
        //         // return view('pages.doctor.otp');
        //         // return redirect()->route('doctor.otp')->with('success', 'The OTP sent Successfully to Your Mobile Number');
        //         return redirect()->route('doctor.otp')->with('success', 'The OTP sent Successfully to Your Mobile Number OTP IS : '.$otp);
        //     }

        // }


    }

    public function otpAction(Request $request){

        $validated = $request->validate([
            'otp' => 'required|numeric|min:4'
        ],
        [
            'otp.min' => 'Enter 4 digit otp number'
        ]);

        $otp = $request->otp;
        $user_otp = helperGetSystemSession('user_otp');
        $auth_doc_id = helperGetSystemSession('auth_doc_id');

        if($user_otp!=$otp){

            return redirect()->route('doctor.otp')->with('error', 'Oops! Invalid OTP, Try again');
        }else{

            $getDocUser=User::find($auth_doc_id);
            \Auth::login($getDocUser);
             return redirect()->route('doctor.home')->with('success', 'Welcome Back Dear Doctor! ');
        }
    }
    public function GetAppointments(){

        $doc_id = helperGetAuthUser('id');
        $today  = Carbon::today()->format('Y-m-d');
        $past   = Appoinment::where('appoinment_date','<',$today)->where('doctor_id',$doc_id)->where('status','completed')->orderBy('appoinment_date', 'DESC')->get();

        $pastArray=[];
         foreach ($past as $key => $data) {
            $date = Carbon::createFromFormat('Y-m-d', $data->appoinment_date)->format('F Y');
            // dd($date);
          $pastArray[$date][]=$data;
         }

        $upcomming = Appoinment::where('appoinment_date','>=',$today)->where('doctor_id',$doc_id)->where('status','assigned')->orderBy('appoinment_date', 'ASC')->get();
        $upcommingArray=[];
         foreach ($upcomming as $key => $data) {
            $date = Carbon::createFromFormat('Y-m-d', $data->appoinment_date)->format('F Y');
            $upcommingArray[$date][]=$data;
         }
        return view('pages.doctor.appoinments', compact('upcomming','past','upcommingArray','pastArray'));
    }

    public function GetPatient(Request $request, Appoinment $appoinment){

        $user = $appoinment->user;

       // dd($user);

        return view('pages.doctor.patient.index', compact('appoinment','user'));
    }

    public function GetPatientDetail(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;

        return view('pages.doctor.patient.detail', compact('appoinment','user','patient'));
    }

    public function GetPatientVisits(Request $request, Patient $patient){

        $user = $patient->user;

        $today = Carbon::today();
        $past = Appoinment::where('appoinment_date','<',$today)->where('user_id',$user->id)->orderBy('appoinment_session', 'DESC')->get();

        $pastArray=[];
         foreach ($past as $key => $data) {
            $date = Carbon::createFromFormat('Y-m-d', $data->appoinment_date)->format('F Y');
            // dd($date);
          $pastArray[$date][]=$data;
         }


         // dd($pastArray);
        return view('pages.doctor.patient.previous_visiting', compact('user','patient','pastArray'));
    }


    public function GetPatientPediatricForm(Request $request, Appoinment $appoinment, Patient $patient){

        $user    = $patient->user;
        //$getdata = ClinicalNotes::where('patient_id',$patient->id)
        $getdata = Prescription::where('patient_id',$patient->id)
        ->where('appointment_id',$appoinment->id)
        ->orderBy('id', 'DESC')->first();

        $get_ap_status= Appoinment::where('id',$appoinment->id)->first();
        $app_status = $get_ap_status->status;


         return view('pages.doctor.patient.pediatric', compact('user','patient','getdata','appoinment','app_status'));
    }

    public function PostPatientPediatricForm(Request $request, Patient $patient){

        $data = $request->except('_token','app_status','appointment_id');

        if($request->app_status == 'assigned') {

        $formSave= Prescription::where(['appointment_id' => $request->appointment_id,'patient_id'=>$patient->id])->first();

        if(!$formSave){
          $formSave = new Prescription();
        }
        $formSave->patient_id=$patient->id;
        $formSave->appointment_id=$request->appointment_id;
        $formSave->pediatric = json_encode($data);
        $formSave->save();


        return redirect()->back()->with('success', 'Pediatric Form Saved Successfuly');
        }
        else
        {
            return redirect()->back()->with('error', 'Pediatric Form Not Save');

        }
    }

    public function GetPatientVaccinationForm(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
        $getFormAnswers = PatientVaccinationForm::where('patient_id',$patient->id)->first();

         return view('pages.doctor.patient.vaccination', compact('user','patient','getFormAnswers','appoinment'));
    }

    public function PostPatientVaccinationForm(Request $request, Patient $patient){

        $data = $request->except('_token');
        // dd($data);
        $formSave = PatientVaccinationForm::where('patient_id',$patient->id)->first();

        if(!$formSave){

          $formSave = new PatientVaccinationForm();
        }

        $formSave->patient_id=$patient->id;
        $formSave->answer = json_encode($data);

        $formSave->save();

        return redirect()->back()->with('success', 'Vaccination Form Saved Successfuly');

    }

    public function GetPatientDentalForm(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
        $getdata = Prescription::where('patient_id',$patient->id)
        ->where('appointment_id',$appoinment->id)
        ->orderBy('id', 'DESC')->first();
       // print_r($getdata); exit;
        $get_ap_status= Appoinment::where('id',$appoinment->id)->first();
        $app_status = $get_ap_status->status;

         return view('pages.doctor.patient.dental', compact('user','patient','appoinment','app_status','getdata'));
    }

    public function PostPatientDentalForm(Request $request, Patient $patient){

        $data = $request->except('_token','app_status','appointment_id');
        $procedure = [];
        foreach($data['advice'] as $key => $val){
            $procedure[$key]['advice'] = $val;
            $procedure[$key]['followUpDays'] =$data['followUpDays'][$key];
            $procedure[$key]['visited_date'] =$data['visited_date'][$key];
        }
        $data['procedure'] = $procedure;
        $formSave= Prescription::where(['appointment_id' => $request->appointment_id,'patient_id'=>$patient->id])->first();
        if($request->app_status == 'assigned') {
            if(!$formSave){
                $formSave = new Prescription();
            }
        $formSave->patient_id=$patient->id;
        $formSave->appointment_id=$request->appointment_id;
        $formSave->dental = json_encode($data);
        $formSave->save();
        return redirect()->back()->with('success', 'Dental Form Saved Successfuly');
        }
        else
        {
            return redirect()->back()->with('error', 'Dental Form Not Save');
        }

    }

    public function GetPrescriptionDetail(Request $request, Appoinment $appoinment,Patient $patient,$id=null)
    {

        $user = $patient->user;

        if(!$id){
             $data= new Prescription();
        }else{
            $data = Prescription::find($id);
        }
        return view('pages.doctor.patient.prescription', compact('user','patient','appoinment','data'));
        // dd($user);
    }

    public function GetPrescriptionDetailPlain(Request $request, Appoinment $appoinment,Patient $patient)
    {
        $user = $patient->user;
        $data = Prescription::firstOrCreate(['appointment_id' => $appoinment->id]);
        $getPrescriptions= Prescription::where('patient_id',$patient->user_id)->get();
        $getFormAnswers = ClinicalNotes::where('patient_id',$patient->id)->first();
        return view('pages.doctor.patient.prescription-plain', compact('user','patient','appoinment','data' ,'getPrescriptions','getFormAnswers'));
    }
     public function GetPrescriptionDetailAll(Request $request, Appoinment $appoinment,Patient $patient)
    {
        $user = $patient->user;
        $data=[];
        $getPrescriptions= Prescription::where(['appointment_id' => $appoinment->id,'patient_id'=>$patient->id])->get();
        $get= Prescription::where(['appointment_id' => $appoinment->id,'patient_id'=>$patient->id])->first();
        return view('pages.doctor.patient.prescription-plain', compact('user','patient','appoinment','data' ,'getPrescriptions','get'));
    }

    /*
    public function AddPrescriptionDetail(Request $request, Appoinment $appoinment,Patient $patient,$id=null)
    {

        $user = $patient->user;
        if($id){
            $data =  new Prescription();
        }else{
            $data = Prescription::find($id);
        }

        // $getPrescriptions= Prescription::where('patient_id',$patient->user_id)->get();

        return view('pages.doctor.patient.prescription', compact('user','patient','appoinment','data'));
        // dd($user);
    }
    */

    public function AddPrescriptionDetail(Request $request, Appoinment $appoinment,Patient $patient)
    {
        $id    = isset($request->id) ? $request->id : '';
        $apid  = $appoinment->id;
        $pid   = $patient->id;
        $type  = $request->type;
        $user = $patient->user;
        $get = [];

        $data = Prescription::where(['appointment_id'=>$apid,'patient_id'=>$pid])->first();
        $dataid    = isset($data->id) ? $data->id : '';
        if($dataid){
            $medicine = PrescriptionMedicine::where(['type'=>'general','prescription_id'=>$dataid])->get();
        }
        else{
            $medicine = '';
        }

        return view('pages.doctor.patient.clinical_notes_add', compact('user','patient','appoinment','get','medicine','data'));
        // dd($user);
    }



    public function PostPrescriptionDetail(Request $request, Appoinment $appoinment,Patient $patient)
    {

        $user = $patient->user;
        $data = Prescription::where('appointment_id',$appoinment->id)->first();

        if($request->id){
            $data=  Prescription::find($request->id);
        }else{
            $data= new Prescription();
            $data->patient_id=$patient->id;
            $data->appointment_id=$appoinment->id;
        }

        // $data->patient_id=$patient->id;
        if(($request->chief_complaint!='') || ($request->clinical_findings!='')
            || ($request->diagnosis!='') || ($request->treatments!='')
        || ($request->follow_up_days!=''))
        {
                $data->chief_complaint=$request->chief_complaint;
                $data->clinical_findings=$request->clinical_findings;
                $data->diagnosis=$request->diagnosis;
                $data->treatments=$request->treatments;
                $data->follow_up_days=$request->follow_up_days;
                $data->save();
               // echo $request->type;
                if($request->type == 'paediatric')
                {
                    //Check today paediatric record
                    $chk  = PatientPediatricForm::where('patient_id',$patient->id)
                    ->whereDate('created_at', Carbon::today())->first();

                    if(!$chk){
                        // Today not found paediatric record fetch and duplicate the new record
                        $get = PatientPediatricForm::where('patient_id',$patient->id)
                        ->orderBy('id', 'DESC')->first();

                        $get_pid = $get->id;
                        $post = PatientPediatricForm::find($get_pid);
                        $newPost = $post->replicate();
                        $newPost->push();
                        $nid = $newPost->id;
                        // Update prescription id
                        $updateform = PatientPediatricForm::where('id', $nid)->first();
                        $updateform->pediatric_form_id = $data->id;
                        $updateform->save();
                    }
                    else
                    {
                        // Update prescription id
                        $chk->pediatric_form_id = $data->id;
                        $chk->save();
                    }
                }

        return redirect()->route('doctor.appointment.patient.prescription.view',['appoinment'=>$appoinment->id,'patient'=>$patient->id,'id'=>$data->id])->with('success', 'Details Saved Successfuly');
        }
        else{
             return redirect()->back()->with('error','*At least one field is required');
        }
        // return redirect()->back()->with('success', 'Details Saved Successfuly');
    }
    public function editPrescriptionDetail(Request $request, Appoinment $appoinment,Patient $patient)
    {
        $id  = $request->id;
        $apid = $appoinment->id;
        $pid = $patient->id;
        $type  = $request->type;

        $user = $patient->user;
        $get = [];
        if($type=='pediatric'){
            $data = Prescription::where(['id'=>$id,'appointment_id'=>$apid,'patient_id'=>$pid])->first();
            $medicine = PrescriptionMedicine::where(['type'=>$type,'prescription_id'=>$data->id])->get();
            $get['value'] = isset($data->pediatric) ? json_decode($data->pediatric) : [];
            $get['type'] = 'pediatric';
        }
        else if($type=='dental'){
            $data = Prescription::where(['id'=>$id,'appointment_id'=>$apid,'patient_id'=>$pid])->first();
            $medicine = PrescriptionMedicine::where(['type'=>$type,'prescription_id'=>$data->id])->get();
            $get['value'] = isset($data->dental) ? json_decode($data->dental) : [];
            $get['type'] = 'dental';
        }
        else if($type=='gynaecology'){
            $data = Prescription::where(['id'=>$id,'appointment_id'=>$apid,'patient_id'=>$pid])->first();
            $medicine = PrescriptionMedicine::where(['type'=>$type,'prescription_id'=>$data->id])->get();
            $get['value'] = isset($data->gynaecology) ? json_decode($data->gynaecology) : [];
            $get['type'] = 'gynaecology';
        }
        else if($type=='physiotherapy'){
            $data = Prescription::where(['id'=>$id,'appointment_id'=>$apid,'patient_id'=>$pid])->first();
            $medicine = PrescriptionMedicine::where(['type'=>$type,'prescription_id'=>$data->id])->get();
            $get['value'] = isset($data->physiotherapy) ? json_decode($data->physiotherapy) : [];
            $get['type'] = 'physiotherapy';
        }
        else if($type=='women_wellness'){
            $data = Prescription::where(['id'=>$id,'appointment_id'=>$apid,'patient_id'=>$pid])->first();
            $medicine = PrescriptionMedicine::where(['type'=>$type,'prescription_id'=>$data->id])->get();
            $get['value'] = isset($data->women_wellness) ? json_decode($data->women_wellness) : [];
            $get['type'] = 'women_wellness';
        }
        else {
            $data = Prescription::where(['id'=>$id,'appointment_id'=>$apid,'patient_id'=>$pid])->first();
            $medicine = PrescriptionMedicine::where(['type'=>'general','prescription_id'=>$data->id])->get();
            $get['value'] = isset($data->general) ? json_decode($data->general) : [];
            $get['type'] = 'general';
        }


        return view('pages.doctor.patient.prescription', compact('user','patient','appoinment','get','data','medicine'));
        // dd($user);
    }
    public function addClinicalNoteDetail(Request $request, Appoinment $appoinment,Patient $patient)
    {
        $id     = isset($request->id) ? $request->id : '';
        $type   = $request->prescription_type;
        $user   = $patient->user;
        $get    = [];

        if($type=='pediatric'){
            $reqdata = [
                'pediatric->date' => $request->prescription_date,
                'pediatric->chief_complaints' => $request->chief_complaints,
                'pediatric->h_o_pi' =>$request->h_o_pi,
                'pediatric->diagnosis' =>$request->diagnosis,
                'pediatric->management' =>$request->management,
                'pediatric->follow_up_advice' =>$request->follow_up_advice
            ];

            $formtype='pediatric';
        }
        else if($type=='dental'){
            $reqdata = [
                'dental->date' => $request->prescription_date,
                'dental->chief_complaints' => $request->chief_complaints ,
                'dental->h_o_presenting_illness' =>$request->h_o_presenting_illness,
                'dental->medical_history' =>$request->medical_history,
                'dental->dental_diagnosis' =>$request->dental_diagnosis
            ];
            $formtype='dental';
        }
        else if($type=='gynaecology'){
            $reqdata = [
                'gynaecology->date' => $request->prescription_date,
                'gynaecology->gyn_chief_complaints' => $request->gyn_chief_complaints,
                'gynaecology->gyn_history_present_illness' =>$request->gyn_history_present_illness,
                'gynaecology->gyn_followup' =>$request->gyn_followup,
                'gynaecology->gyn_management' =>$request->gyn_management,
                'gynaecology->gyn_diagnosis' =>$request->gyn_diagnosis
            ];
            $formtype='gynaecology';
        }
        else if($type=='physiotherapy'){
            $reqdata = [
                'physiotherapy->date' => $request->prescription_date,
                'physiotherapy->sb_impairment' => $request->sb_impairment,
                'physiotherapy->sb_activities' =>$request->sb_activities,
                'physiotherapy->sb_participation' =>$request->sb_participation,
                'physiotherapy->sb_environment' =>$request->sb_environment,
                'physiotherapy->sb_general_observation' =>$request->sb_general_observation
            ];
            $formtype='physiotherapy';
        }
        else if($type=='women_wellness'){
            $reqdata = [
                'women_wellness->date' => $request->prescription_date,
                'women_wellness->women_wellness_chief_complaints' => $request->women_wellness_chief_complaints,
                'women_wellness->women_wellness_past_medical_history' =>$request->women_wellness_past_medical_history,
                'women_wellness->women_wellness_diagnosis' =>$request->women_wellness_diagnosis,
                'women_wellness->sb_environment' =>$request->sb_environment,
                'women_wellness->sb_general_observation' =>$request->sb_general_observation
            ];
            $formtype='women_wellness';
        }
        else{
            $reqdata = [
                'general->date' => $request->prescription_date,
                'general->chief_complaints' => $request->chief_complaints,
                'general->clinical_finding' =>$request->clinical_finding,
                'general->diagnosis' =>$request->diagnosis,
                'general->treatment' =>$request->treatment,
                'general->follow_up_advice' =>$request->follow_up_advice
            ];
            $formtype='general';
        }

       // dd($request);
        $formSave= Prescription::where(['appointment_id' => $appoinment->id,'patient_id'=>$patient->id])->first();

        if(!$formSave){
            $formSave = new Prescription();
            $p_id= $formSave->id;
          }
        else{
            $data = Prescription::where('id',$formSave->id)->first();
        }

        $form_type     = isset($data[$formtype]) ? $data[$formtype] : '';

         if($form_type!='')
            {
                $update = DB::table('prescriptions')
                ->where('id',$id)
                ->update($reqdata);
                $p_id= $id;
            }
            else{

                $data1 = $request->except('_token','prescription_type');
                $formSave->patient_id=$patient->id;
                $formSave->appointment_id=$appoinment->id;
                $formSave->$formtype = json_encode($data1);
                $formSave->save();
                $p_id= $formSave->id;

            }

        if($p_id!='')
        {
            $medicine = PrescriptionMedicine::where(['type'=>$formtype,'prescription_id'=>$p_id])->get();
        }
        else{
            $medicine = '';
        }
        $get['value'] = isset($data->$formtype) ? json_decode($data->$formtype) : [];
        $get['type'] = $formtype;

        return redirect()->back()->with('success', 'Details Saved Successfuly');

    }
    public function editPostPrescriptionDetail(Request $request, Appoinment $appoinment,Patient $patient)
    {
         $id     = $request->id;
        $type   = $request->type;
        $user   = $patient->user;
        $get    = [];

        if($type=='pediatric'){
            $reqdata = [
                'pediatric->date' => $request->prescription_date,
                'pediatric->chief_complaints' => $request->chief_complaints,
                'pediatric->h_o_pi' =>$request->h_o_pi,
                'pediatric->diagnosis' =>$request->diagnosis,
                'pediatric->management' =>$request->management,
                'pediatric->follow_up_advice' =>$request->follow_up_advice
            ];

            $formtype='pediatric';
        }
        else if($type=='dental'){
            $reqdata = [
                'dental->date' => $request->prescription_date,
                'dental->chief_complaints' => $request->chief_complaints ,
                'dental->h_o_presenting_illness' =>$request->h_o_presenting_illness,
                'dental->medical_history' =>$request->medical_history,
                'dental->dental_diagnosis' =>$request->dental_diagnosis
            ];
            $formtype='dental';
        }
        else if($type=='gynaecology'){
            $reqdata = [
                'gynaecology->date' => $request->prescription_date,
                'gynaecology->gyn_chief_complaints' => $request->gyn_chief_complaints,
                'gynaecology->gyn_history_present_illness' =>$request->gyn_history_present_illness,
                'gynaecology->gyn_followup' =>$request->gyn_followup,
                'gynaecology->gyn_management' =>$request->gyn_management,
                'gynaecology->gyn_diagnosis' =>$request->gyn_diagnosis
            ];
            $formtype='gynaecology';
        }
        else if($type=='physiotherapy'){
            $reqdata = [
                'physiotherapy->date' => $request->prescription_date,
                'physiotherapy->sb_impairment' => $request->sb_impairment,
                'physiotherapy->sb_activities' =>$request->sb_activities,
                'physiotherapy->sb_participation' =>$request->sb_participation,
                'physiotherapy->sb_environment' =>$request->sb_environment,
                'physiotherapy->sb_general_observation' =>$request->sb_general_observation
            ];
            $formtype='physiotherapy';
        }
        else if($type=='women_wellness'){
            $reqdata = [
                'women_wellness->date' => $request->prescription_date,
                'women_wellness->women_wellness_chief_complaints' => $request->women_wellness_chief_complaints,
                'women_wellness->women_wellness_past_medical_history' =>$request->women_wellness_past_medical_history,
                'women_wellness->women_wellness_diagnosis' =>$request->women_wellness_diagnosis,
                'women_wellness->sb_environment' =>$request->sb_environment,
                'women_wellness->sb_general_observation' =>$request->sb_general_observation
            ];
            $formtype='women_wellness';
        }
        else{
            $reqdata = [
                'general->date' => $request->prescription_date,
                'general->chief_complaints' => $request->chief_complaints,
                'general->clinical_finding' =>$request->clinical_finding,
                'general->diagnosis' =>$request->diagnosis,
                'general->treatment' =>$request->treatment,
                'general->follow_up_advice' =>$request->follow_up_advice
            ];
            $formtype='general';
        }

        $data = Prescription::where('id',$id)->first();
        // print_r($data['general']);
        // echo $formtype;
        // echo $data[$formtype];
        // echo $data->$formtype; exit;

        if($data[$formtype]!='')
        {
            $update = DB::table('prescriptions')
            ->where('id',$id)
            ->update($reqdata);
        }
        else{
            $reqdata = [
                'date' => $request->prescription_date,
                'chief_complaints' => $request->chief_complaints,
                'clinical_finding' =>$request->clinical_finding,
                'diagnosis' =>$request->diagnosis,
                'treatment' =>$request->treatment,
                'follow_up_advice' =>$request->follow_up_advice
            ];
            $data->$formtype = json_encode($reqdata);
            $data->save();
        }


        $medicine = PrescriptionMedicine::where(['type'=>$formtype,'prescription_id'=>$data->id])->get();
        $get['value'] = isset($data->$formtype) ? json_decode($data->$formtype) : [];
        $get['type'] = $formtype;

        return redirect()->back()->with('success', 'Details Saved Successfuly');

    }
    public function GetMedicineDetail(Request $request, Appoinment $appoinment,Patient $patient,$pr_id)
    {

        $user = $patient->user;
        $type  = $request->type;

        // $data = Prescription::where('appointment_id',$appoinment->id)->first();
        $data = Prescription::find($pr_id);
        if(!$data){
            $data= new Prescription();
        }

        // $medicines = Medicine::query();
        $query = Medicine::query();

        $s = $request->search;

        if(isset($request->search)){

                $query = $query->where('name','LIKE','%'.$s.'%')
                        ->orWhere('type', 'like', '%' . $s . '%')
                        ->orWhere('dosage', 'like', '%' . $s . '%');
        }

         $medicines = $query->orderBy('name','asc')->get();

         $pres = PrescriptionMedicine::where(['type'=>$type,'prescription_id'=>$pr_id])->get();


         //$pres = PrescriptionMedicine::where('prescription_id',$pr_id)->get();

        return view('pages.doctor.patient.medicine', compact('user','patient','appoinment','data','medicines','pres','type'));
        // dd($user);
    }

    public function PostMedicineDetail(Request $request, Appoinment $appoinment,Patient $patient){

        // dd($request);
       $user = $patient->user;
       if($request->pr_id){
            $data = Prescription::find($request->pr_id);
        }else{
             $data= new Prescription();
        }

        $pr_timing_when = isset($request->timing_when) ? implode(',',$request->timing_when) : '';
        $pr_timing_how = isset($request->timing_how) ? implode(',',$request->timing_how) : '';

        //$pr_timing_how = $request->timing_how;
        /*if($request->pr_add_edit == 'add'){*/
                $s_medicine = ($request->id) ? PrescriptionMedicine::find($request->id) : new PrescriptionMedicine;
                $s_medicine->prescription_name = ($request->prescription_name) ? $request->prescription_name : '' ;
                $s_medicine->prescription_id = $data->id;
                $s_medicine->user_id = $user->id;
                $s_medicine->type = $request->prescription_type;
                $s_medicine->medicine_id = ($request->medicine_id) ? $request->medicine_id : 'null' ;
                $s_medicine->dosage = $request->dosage;
                $s_medicine->total_qty = $request->total_qty;
                $s_medicine->intake_qty = $request->intake_qty;
                $s_medicine->timing_when = $pr_timing_when;
                $s_medicine->timing_how = $pr_timing_how;
                $s_medicine->notes = $request->notes;
                $s_medicine->duration = $request->tab_count_days;
                $s_medicine->save();

        /*}*/
        return redirect()->back()->with('success', 'Details Saved Successfuly');
    }


    public function SearchMedicine(Request $request){

        $query = Medicine::query();
        $s = $request->search;

        if(isset($request->search)){

                $query = $query->orWhere('name','LIKE','%'.$s.'%')
                        ->orWhere('type', 'like', '%' . $s . '%')
                        ->orWhere('dosage', 'like', '%' . $s . '%');
        }
        $medicines = $query->orderBy('name','asc')->get();

        $response =[];

        $response['success'] = true;
        $response['data'] = $medicines;

        return response($response,200);

    }
    public function EditMedicine(Request $request){

        $query =  PrescriptionMedicine::where('id', $request->edit)->first();

        $response =[];

        $response['success'] = true;
        $response['data'] = $query;

        return response($response,200);

    }
     public function DeleteMedicine(Request $request){

        $query =  PrescriptionMedicine::where('id', $request->delid)->delete();

        $response =[];

        $response['success'] = true;
        $response['data'] = $query;

        return response($response,200);

       // return  redirect()->response($response,200);

    }

    public function DeleteReport(Request $request)
    {
        $query = InvestigationReports::where('id', $request->delid)->delete();

        if (!$query) {
            $response = [
                'success' => false,
                'message' => 'Failed to delete report.'
            ];
            return response()->json($response, 400);
        }

        $response = [
            'success' => true,
            'message' => 'Report deleted successfully.'
        ];

        return response()->json($response, 200);

    }


    // public function DeleteReport(Request $request){

    //     $query =  InvestigationReports::where('id', $request->delid)->delete();

    //    // $get_reports = InvestigationReports::where(['patient_id' => $patientid,'doctor_id'=>$doc_id])->orderBy('id', 'DESC') ->get();


    //     $response =[];

    //     $response['success'] = true;
    //     $response['data'] = $query;

    //     return response($response,200);

    // }

    public function listDoctor(){
        return view('pages.admin.user.doctor.list');
    }

    /*Admin user */
    public function addDoctor(User $doctor){
        // $name = Route::currentRouteName();
        $role = "doctor";
        $data = isset($doctor->id) ? $doctor : new User;

        return view('pages.admin.user.doctor.form',compact('data','role'));
    }

    public function storeDoctor(Request $request){

        $user = User::firstOrNew(['id' =>  $request->id]);
        $user_info = UserInfo::firstOrNew(['user_id' => $request->id]);

          $validatedData = $request->validate([
                'first_name' => 'required',
                // 'last_name' => 'required',
                'email' => 'required|email|unique:users,email,'.$request->id,
                'phone' => 'required|numeric|digits:10|unique:user_infos,phone,'.$user_info->id,
            ]);

                    if ($request->hasFile('avatar')) {
                        $avatar = $request->file('avatar');
                        $avatarName = time() . '.' . $avatar->getClientOriginalExtension();
                        $avatarPath = $avatar->storeAs('avatars', $avatarName, 'public');

                        // Save avatar path in user_info
                         \Log::info('Avatar Path: ' . $avatarPath);
                        $user_info->avatar = $avatarPath;
                    }

       // $data = isset($request->id) ? User::find($request->id) : new User;

        $this->saveUser($user,$user_info,$request);

        $getUserCRUDRedirect = getUserCRUDRedirect();
        return redirect()->route($getUserCRUDRedirect)->with('success','Doctor Updated Successfully');

        // return view('pages.admin.user.admin.list',compact('data'));
    }

    /*User Save Logic*/

    public function saveUser($user,$user_info, $request){

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;

        if($request->password){
            $user->password = Hash::make($request->password);
        }

        $user->save();

        if(count($user->roles) == 0){
            // $user->assignUserRole($user,$request->role);
            $user->assignRole($request->role);
        }

        $user_info->user_id = $user->id;
        $user_info->phone = $request->phone;
        // $user_info->specialist_type = ($request->specialist_type) ? json_encode($request->specialist_type) : json_encode([]);
        if($request->specialist_type){

        $user_info->specialist_type = $request->specialist_type;
        }
        // $user_info->specialist_type = ($this->user_role == 'doctor') ? json_encode($request->specialist_type) : null;

        if($request->degree){
            $user_info->degree = $request->degree;
        }
        if($request->reg_no){
            $user_info->reg_no = $request->reg_no;
        }
        $user_info->save();

        if($user){
            return true;
        }else{
            return false;
        }
    }

    public function deleteDoctor(User $doctor){

        $getUserCRUDRedirect = getUserCRUDRedirect();

        if($doctor){
            $doctor->delete();
             return redirect()->route($getUserCRUDRedirect)->with('success','User Deleted Successfully');
        }else{
             return redirect()->route($getUserCRUDRedirect)->with('success','Oops Unable to Delete user');
        }
    }

    public function printPrescriptionDetail(Appoinment $appoinment)
    {
        $data = Prescription::where('appointment_id',$appoinment->id)->first();
        return view('pages.doctor.patient.printPDF',compact('data'));
    }

    // VG START
    public function GetReports(Request $request, Appoinment $appoinment,Patient $patient)
    {
       // $patientid = $request->pid;
        $patientid = $patient->id;
        $doc_id    = helperGetAuthUser('id');
        $user = $patient->user;

        $get_reports = InvestigationReports::where(['patient_id' => $patientid,'doctor_id'=>$doc_id])->orderBy('id', 'DESC') ->get();

        return view('pages.doctor.patient.investigation_reports', compact('get_reports','patientid','appoinment','user'));
    }

    public function PostReportDetail(Request $request)
    {

        $validatedData = $request->validate([
        'report_name'  => 'required',
        'report_type'  => 'required',
        'report_date'  => 'required',
        'report_image' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
        ]);

        $name = time().'.'.$request->report_image->extension();
        $destinationPath = 'patient_reports';
        $request->report_image->move($destinationPath, $name);

        if($validatedData)
        {
            $rep = new InvestigationReports;
            $doc_id = helperGetAuthUser('id');

            $rep->patient_id    = $request->patientid;
            $rep->doctor_id     = $doc_id;
            $rep->report_name   = $request->report_name;
            $rep->report_type   = $request->report_type;
            $rep->report_date   = $request->report_date;
            $rep->report_path   = $destinationPath."/".$name;
            $ins = $rep->save();
           // return redirect()->route('doctor.patient.reports',$request->patientid)->with('success', 'Reports Added Successfully! ');
           return redirect()->back()->with('success', 'Reports Saved Successfuly');

        }
    }
    public function GetCaseSummery(Request $request, Appoinment $appoinment, Patient $patient){

       $user = $appoinment->user;
        return view('pages.doctor.patient.index-case-summery', compact('appoinment','user','patient'));
    }
    public function GetPaediatricsCaseSummery(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $appoinment->user;
        // $apid = $appoinment->id;
        // $pid = $patient->id;
        // $getFormAnswers = Prescription::where(['appointment_id'=>$apid,'patient_id'=>$pid])->orderBy('id', 'DESC')->get();
        $getFormAnswers = Prescription::where('patient_id',$patient->id)->orderBy('id', 'DESC')->get();


       return view('pages.doctor.patient.paediatrics-case-summery', compact('appoinment','user','getFormAnswers','patient'));
    }

    public function GetDentalCaseSummery(Request $request, Appoinment $appoinment, Patient $patient){
       $user = $appoinment->user;
       $getFormAnswers = Prescription::where('patient_id',$patient->id)->orderBy('id', 'DESC')->get();
    //    $apid = $appoinment->id;
    //     $pid = $patient->id;
    //     $getFormAnswers = Prescription::where(['appointment_id'=>$apid,'patient_id'=>$pid])->orderBy('id', 'DESC')->get();

        return view('pages.doctor.patient.dental-case-summery', compact('appoinment','user','getFormAnswers'));
    }
    public function GetGynaecologyCaseSummery(Request $request, Appoinment $appoinment, Patient $patient){
        $user = $appoinment->user;
        $getFormAnswers = Prescription::where('patient_id',$patient->id)->orderBy('id', 'DESC')->get();
        // $apid = $appoinment->id;
        // $pid = $patient->id;
        // $getFormAnswers = Prescription::where(['appointment_id'=>$apid,'patient_id'=>$pid])->orderBy('id', 'DESC')->get();
         return view('pages.doctor.patient.gynaecology-case-summery', compact('appoinment','user','getFormAnswers'));
     }
    public function GetPhysiotherapyCaseSummery(Request $request, Appoinment $appoinment, Patient $patient){
        $user = $appoinment->user;
        $getFormAnswers = Prescription::where('patient_id',$patient->id)->orderBy('id', 'DESC')->get();
        // $apid = $appoinment->id;
        // $pid = $patient->id;
        // $getFormAnswers = Prescription::where(['appointment_id'=>$apid,'patient_id'=>$pid])->orderBy('id', 'DESC')->get();
        //
        return view('pages.doctor.patient.physiotherapy-case-summery', compact('appoinment','user','getFormAnswers'));
     }
    public function GetWomenWellnessCaseSummery(Request $request, Appoinment $appoinment, Patient $patient){
        $user = $appoinment->user;
        $getFormAnswers = Prescription::where('patient_id',$patient->id)->orderBy('id', 'DESC')->get();
        return view('pages.doctor.patient.women-wellness-case-summery', compact('appoinment','user','getFormAnswers'));
     }
    public function AddClinicalNotesDetail(Request $request, Appoinment $appoinment, Patient $patient,$id=null)
    {
    $user = $patient->user;
    $data= Prescription::where(['appointment_id' => $appoinment->id,'patient_id'=>$patient->id])->first();

    return view('pages.doctor.patient.clinical_notes_add', compact('user','patient','appoinment','data'));
    }
    public function PostClinicalNotesForm(Request $request, Patient $patient){

        $data = $request->except('_token');
        $formSave = new ClinicalNotes();
        $formSave->patient_id=$patient->id;
        $formSave->answer = json_encode($data);
        $formSave->save();
        return redirect()->back()->with('success', 'Clinical Notes Saved Successfuly');
    }
    /* public function GetPrescriptionDetailAll(Request $request, Appoinment $appoinment,Patient $patient)
    {

        $user = $patient->user;
        $data=ClinicalNotes::where('patient_id',$patient->id)->get();
        return view('pages.doctor.patient.prescription-plain', compact('user','patient','appoinment','data'));
        // dd($user);
    }*/

    public function GetAnthropometryGrowthChart(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
        $patientid = $request->patient;
        $pid = $patientid->id;
        $getchart = AnthropometryGrowthCharts::where('patient_id',$pid)->get();

        return view('pages.doctor.patient.anthropometry-growth-chart', compact('user','appoinment','patientid','getchart','pid'));
    }
    public function GetWomenWellnessForm(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
        $getdata = Prescription::where('patient_id',$patient->id)
        ->where('appointment_id',$appoinment->id)
        ->orderBy('id', 'DESC')->first();
        // print_r($getdata); exit;
        $get_ap_status= Appoinment::where('id',$appoinment->id)->first();
        $app_status = $get_ap_status->status;
        return view('pages.doctor.patient.women-wellness',compact('user','patient','appoinment','app_status','getdata'));
    }
    public function PostWomenWellnessForm(Request $request, Appoinment $appoinment, Patient $patient){

        $data = $request->except('_token','app_status','appointment_id');

        if($request->app_status == 'assigned') {

        $formSave= Prescription::where(['appointment_id' => $request->appointment_id,'patient_id'=>$patient->id])->first();

        if(!$formSave){
          $formSave = new Prescription();
        }
        $formSave->patient_id=$patient->id;
        $formSave->appointment_id=$request->appointment_id;
        $formSave->women_wellness = json_encode($data);
        $formSave->save();

        return redirect()->back()->with('success', 'Women Wellness Form Saved Successfuly');
        }
        else
        {
            return redirect()->back()->with('error', 'Women Wellness Form Not Save');

        }

    }

    public function GetPhysiotherapyForm(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
        $getdata = Prescription::where('patient_id',$patient->id)
        ->where('appointment_id',$appoinment->id)
        ->orderBy('id', 'DESC')->first();
        // print_r($getdata); exit;
        $get_ap_status= Appoinment::where('id',$appoinment->id)->first();
        $app_status = $get_ap_status->status;
        return view('pages.doctor.patient.physiotherapy', compact('user','patient','appoinment','app_status','getdata'));
    }
    public function PostPhysiotherapyForm(Request $request, Patient $patient){

        $data = $request->except('_token','app_status','appointment_id');

        if($request->app_status == 'assigned') {

        $formSave= Prescription::where(['appointment_id' => $request->appointment_id,'patient_id'=>$patient->id])->first();

        if(!$formSave){
          $formSave = new Prescription();
        }
        $formSave->patient_id=$patient->id;
        $formSave->appointment_id=$request->appointment_id;
        $formSave->physiotherapy = json_encode($data);
        $formSave->save();

        return redirect()->back()->with('success', 'Physiotherapy Form Saved Successfuly');
        }
        else
        {
            return redirect()->back()->with('error', 'Physiotherapy Form Not Save');

        }

    }

    public function GetGynaecologyCaseRecordForm(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
        $getdata = Prescription::where('patient_id',$patient->id)
        ->where('appointment_id',$appoinment->id)
        ->orderBy('id', 'DESC')->first();
        $get_ap_status= Appoinment::where('id',$appoinment->id)->first();
        $app_status = $get_ap_status->status;

        //print_r($getdata); exit;
        return view('pages.doctor.patient.gynaecology-case-record', compact('user','patient','appoinment','app_status','getdata'));
}
    public function PostGynaecologyCaseRecordForm(Request $request, Patient $patient){

        $data = $request->except('_token','app_status','appointment_id');

        if($request->app_status == 'assigned') {

        $formSave= Prescription::where(['appointment_id' => $request->appointment_id,'patient_id'=>$patient->id])->first();

        if(!$formSave){
          $formSave = new Prescription();
        }
        $formSave->patient_id=$patient->id;
        $formSave->appointment_id=$request->appointment_id;
        $formSave->gynaecology = json_encode($data);
        $formSave->save();

        return redirect()->back()->with('success', 'Gynaecology Form Saved Successfuly');
        }
        else
        {
            return redirect()->back()->with('error', 'Gynaecology Form Not Save');

        }

    }
    public function GetOtherServices(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
        $getdata = Prescription::where('patient_id',$patient->id)
        ->where('appointment_id',$appoinment->id)
        ->orderBy('id', 'DESC')->first();
        $get_ap_status= Appoinment::where('id',$appoinment->id)->first();
        $app_status = $get_ap_status->status;

        return view('pages.doctor.patient.other-services', compact('user','patient','appoinment','app_status','getdata'));
    }
    public function PostPatientOtherServiceForm(Request $request, Patient $patient){

        $data = $request->except('_token','app_status','appointment_id');

        if($request->app_status == 'assigned') {

        $formSave= Prescription::where(['appointment_id' => $request->appointment_id,'patient_id'=>$patient->id])->first();

        if(!$formSave){
          $formSave = new Prescription();
        }
        $formSave->patient_id=$patient->id;
        $formSave->appointment_id=$request->appointment_id;
        $formSave->other_services = $request->other_services;
        $formSave->save();

        return redirect()->back()->with('success', 'Notes Saved Successfuly');
        }
        else
        {
            return redirect()->back()->with('error', 'Notes Not Save');

        }

    }

    public function PostGrowthChart(Request $request)
    {

        $validatedData = $request->validate([
        'weight'  => 'required',
        'height'  => 'required',
        ]);

         if($validatedData)
        {
            $rep = new AnthropometryGrowthCharts;
            $doc_id = helperGetAuthUser('id');

            $rep->patient_id            = $request->patientid;
            $rep->doctor_id             = $doc_id;
            $rep->chart_update_date     = $request->update_chart_date;
            $rep->weight                = $request->weight;
            $rep->height                = $request->height;
            $rep->head_circumference    = $request->head_circum;

            $ins = $rep->save();
        return redirect()->back()->with('success', 'Charts Data Saved Successfuly');
        }
    }

    public function SearchReport(Request $request ,Patient $patient)
    {

        $output="";
       // $query = InvestigationReports::query();

        $patientid = $request->pid;
        $doc_id    = helperGetAuthUser('id');
       // $get_reports = InvestigationReports::where(['patient_id' => $patientid,'doctor_id'=>$doc_id])->get();

        $query = InvestigationReports::where(['patient_id' => $patientid,'doctor_id'=>$doc_id]);


            if(isset($request->search) && isset($request->type)){

                if($request->search=='asc' && $request->type=='name')
                {
                    $reports = $query->orderBy('report_name','asc')->get();
                }
                else if($request->search=='asc' && $request->type=='date')
                {
                    $reports = $query->orderBy('report_date','asc')->get();
                }
                else if($request->search=='desc' && $request->type=='name')
                {
                    $reports = $query->orderBy('report_name','desc')->get();
                }
                else if($request->search=='desc' && $request->type=='date')
                {
                    $reports = $query->orderBy('report_date','desc')->get();
                }
                else
                {
                    $s = $request->search;
                    $query = $query->orWhere('report_name','LIKE','%'.$s.'%')
                            ->orWhere('report_date', 'like', '%' . $s . '%');
                    $reports = $query->orderBy('id','desc')->get();
                }

            }


        if($reports)
        {
            $i = 1;
        foreach ($reports as $key => $rep) {
            $output.= ' <div class="col-6 col-md-4 col-lg-3 p-3" >
            <div class="report"><div class="report-thumbnail p-3">
                    <span class="trigger-close">x</span>
                    <span class="trigger-modal">View</span>
                    <button type="button" class="trigger-modal border-0 outline-none"
                    data-bs-toggle="modal" data-bs-target="#reportenlarge">
                    View
                </button>
                    <img src='.url($rep->report_path).' alt='.$rep->report_name.'>
                </div>
                <div class="report-info p-3">
                    <p class="r-name mb-1">'.$rep->report_name.'</p>
                    <p class="text-muted r-date mb-0">'.helperParseDate($rep->report_date, 'Y-m-d', 'd M
                        Y').'</p>
                </div></div></div>';

        $i++;
        }

        $response =[];

            $response['success'] = true;
            $response['data'] = $output;

            return response($response,200);
        }
    }

    public function editReport(Request $request ,Patient $patient)
    {
        $output    =    "";
        $patientid =    $request->pid;
        $doc_id    =    helperGetAuthUser('id');
        $query     =    InvestigationReports::where('id',$request->p_id)->first();

        $response =[];
        $response['success'] = true;
        $response['data'] = $query;
        return response($response,200);

    }

    public function updateReport(Request $request, Appoinment $appoinment,Patient $patient)
    {
        $validatedData = $request->validate([
            'reportName'  => 'required',
            'reportType'  => 'required',
            'reportDate'  => 'required',
            'reportImage' => 'required|mimes:jpeg,png,jpg,zip,pdf|max:2048',
            ]);


        $name = time().'.'.$request->reportImage->extension();
        $destinationPath = 'patient_reports';
        $request->reportImage->move($destinationPath, $name);

        $rep = InvestigationReports::find($request->reportId);

        $rep->report_name   = $request->reportName;
        $rep->report_type   = $request->reportType;
        $rep->report_date   = $request->reportDate;

        $rep->report_path   = $destinationPath."/".$name;
        $ins = $rep->save();



        return redirect()->back()->with('success', 'Report Form Saved Successfuly');



    }
}