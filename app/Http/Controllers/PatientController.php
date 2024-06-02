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

class PatientController extends Controller
{
     use SMSTrait;

    public function __construct(){
        if (!\Auth::user()){
           return view('pages.front-end.patient.login');
        }
    }

     public function pageLogin(){
        return view('pages.front-end.patient.login');
    }
    public function pageOtp(){
        return view('pages.front-end.patient.otp');
    }
    public function bookAppoinment($doctor=0){
        return view('pages.front-end.patient.book',compact('doctor'));
    }
    public function index(Request $req){

        $data = Appoinment::get();

        // $doctors  = User::whereHas('roles', function($q){
        //                 $q->where('name', 'doctor');
        //                 }
        //             );;


        /*20 - 04 - 2022 Start*/
        // $types = (env('BABY_SPECIALIZATION')) ? explode(',',env('BABY_SPECIALIZATION')) : [];

        // $typesArray=[];

        // foreach ($types as $key => $type) {

        //     $doctor = UserInfo::where('specialist_type','like','%'.$type.'%')->get();
        //     $typesArray[$type]=$doctor;
        // }
        /*20 - 04 - 2022 End*/

        // $doc = User::with("roles")->whereHas("roles", function($q) {
        //         $q->whereIn("name", ['doctor']);
        //     })->get();
        // dd($doc);
        $doctor_type="all";
        if($req->doctor_type) $doctor_type = $req->doctor_type;

        $doctors_ids =  User::with("roles")->whereHas("roles", function($q) {
                        $q->whereIn("name", ['doctor']);
                    })->pluck('id')->toArray();
        $types = getDoctorSpecialistType();
        $typesArray=[];
        $all_doctors = UserInfo::whereIn('user_id',$doctors_ids)->get();
        $typesArray['all'] = $all_doctors;

        /*foreach($types as $type_key => $type){
            $doctor = UserInfo::whereIn('user_id',$doctors_ids)->whereJsonContains('specialist_type',$type_key)->get();
            $typesArray[$type_key]=$doctor;
        }*/


        if($req->doctor_type){
            $all_doctors = UserInfo::whereIn('user_id',$doctors_ids)->where('specialist_type','like',$req->doctor_type)->get();
        }

        if($req->doctor_type=='all'){
            $all_doctors = UserInfo::whereIn('user_id',$doctors_ids)->get();
        }

        $getSpecialists = UserInfo::get()->pluck('specialist_type')->toArray();
         $getSpecialists = array_unique($getSpecialists);
         $getSpecialists[]='all';

      /*  foreach ($doctors as $key => $doctor) {
            // echo json_encode($doctor);
           $specialist_type =$doctor->info->specialist_type;
           $specialist_type = json_decode($specialist_type);


           // print_r($types);
           // echo '<br>';
           // print_r($specialist_type);
           $commonData  =array_uintersect($types, $specialist_type, "strcasecmp");
           // print_r($commonData);

            if($commonData){


                $typesArray[$specialist_type][]=$doctor;
            }
        }*/
         

         // dd($typesArray);
        return view('pages.front-end.patient.index', compact('data','typesArray','doctor_type','getSpecialists','all_doctors'));
    }

    public function bookAppoinmentPost(Request $request){


            $booking = new Appoinment();

            $booking->first_name = helperGetAuthPatient('first_name');
            $booking->last_name = helperGetAuthPatient('last_name');
            $mobile = helperGetAuthPatient('father_phone');

            
            $booking->user_id= helperGetAuthPatient('user_id');
            $booking->doctor_id=$request->doctor_id;
            $booking->father_phone=$mobile;
            $booking->phone=$mobile;
            // $booking->specialists = $this->specialist;
            $booking->appoinment_date = $request->bookingDate;
            $booking->appoinment_session = $request->bookingTime;
            $booking->description = $request->description;
            // $booking->otp = $this->otp;

            $booking->save();


            return redirect()->route('patient.appointment.confirm',$booking->id);

            
    }

    public function apoinmentConfirm(Appoinment $appoinment){
         return view('pages.front-end.patient.book_confirm',compact('appoinment'));
    }

    public function loginAction(Request $request){
        $validated = $request->validate([
            'mobile' => 'required|numeric|min:10'
        ],
        [
            'mobile.min' => 'Enter 10 digit mobile number'
        ]);

            
        // Check Doctor is there 

        // $userInfo = UserInfo::where('phone',$request->mobile)->first();
        
        $userInfo = Patient::where('father_phone',$request->mobile)->orWhere('mother_phone',$request->mobile)->first();
        // dd($userInfo);
        if(!$userInfo){
             return redirect()->back()->with('error', 'You are not a registered user. Kindly Book Your slot and then try login');   
        }else{
            $getUser = $userInfo->user;
            $getUserRole = $getUser->roles->pluck("name")->toArray();

            // if($getUserRole!='patient'){
            if(!in_array('patient',$getUserRole)){
                return redirect()->back()->with('error', 'You are not a Patient, Kindly chek with administrator'); 
            }else{
            // dd($getUserRole);

                /*Send OTP*/
                $otp = helperGenerateOTP();
                
                $this->sendSMS($userInfo->phone,$otp);

                helperSetSystemSession('auth_patient_id',$getUser->id);
                // return view('pages.doctor.otp');
                // return redirect()->route('doctor.otp')->with('success', 'The OTP sent Successfully to Your Mobile Number');
                return redirect()->route('patient.otp')->with('success', 'The OTP sent Successfully to Your Mobile Number  , OTP is: '.$otp);
            }
             
        }


    }

    public function getAllAppoinments(Request $request){


        $getuserID = helperGetAuthUser('id');
        $today = Carbon::today();
        $past = Appoinment::where('appoinment_date','<',$today)->where('user_id',$getuserID)->orderBy('appoinment_session', 'DESC')->get();

        $pastArray=[];
         foreach ($past as $key => $data) {
            $date = Carbon::createFromFormat('Y-m-d', $data->appoinment_date)->format('F Y');
            // dd($date);
          $pastArray[$date][]=$data;
         }

        
        $upcomming = Appoinment::where('appoinment_date','>=',$today)->where('user_id',$getuserID)->orderBy('appoinment_session', 'DESC')->get();
        $upcommingArray=[];
         foreach ($upcomming as $key => $data) {
            $date = Carbon::createFromFormat('Y-m-d', $data->appoinment_date)->format('F Y');
            // dd($date);
          $upcommingArray[$date][]=$data;
         }
        // dd($data);
        return view('pages.front-end.patient.appoinments', compact('upcomming','past','upcommingArray','pastArray'));
    }


    public function GetPatient(Request $request, Appoinment $appoinment){

        $user = $appoinment->user;
     
        return view('pages.front-end.patient.appoinment.index', compact('appoinment','user'));
    }

    public function GetPatientDetails(Request $request, Appoinment $appoinment){

        $user = $appoinment->user;
        $patient = $appoinment->user->patient;
     
        return view('pages.front-end.patient.appoinment.detail', compact('appoinment','user','patient'));
    }

    public function GetPatientDetail(Request $request, Appoinment $appoinment, Patient $patient){

        $user = $patient->user;
  
        return view('pages.front-end.patient.appoinment.detail', compact('appoinment','user','patient'));
    }

    public function GetPatientVaccinationForm(Request $request, Patient $patient){
         
        $user = $patient->user;
        $getFormAnswers = PatientVaccinationForm::where('patient_id',$patient->id)->first();
 
         return view('pages.front-end.patient.appoinment.vaccination', compact('user','patient','getFormAnswers'));
    }

     public function GetPrescriptionDetail(Request $request, Appoinment $appoinment,Patient $patient)
    {
        
        $user = $patient->user;
        $data = Prescription::where('appointment_id',$appoinment->id)->first();

        if(!$data){
            $data= new Prescription();
        }


        return view('pages.front-end.patient.appoinment.prescription', compact('user','patient','appoinment','data'));
        // dd($user);
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
        $auth_patient_id = helperGetSystemSession('auth_patient_id');

        if($user_otp!=$otp){

            return redirect()->route('patient.otp')->with('error', 'Oops! Invalid OTP, Try again');
        }else{
            $patient_phone_no = Patient::where('user_id','=',$auth_patient_id)->first();
            $patient_phone_no = ($patient_phone_no->father_phone) ? $patient_phone_no->father_phone : $patient_phone_no->mother_phone;
            $users = Patient::where('father_phone',$patient_phone_no)->orWhere('mother_phone',$patient_phone_no)->pluck('user_id')->toArray();

            if(count($users) > 1){  
                helperSetSystemSession('phone_number',$patient_phone_no);
                return redirect()->route('patient.select.user',['phone' => $patient_phone_no]);
            }else{
                $getDocUser=User::find($auth_patient_id);
                \Auth::login($getDocUser);
                // return redirect()->route('patient.home')->with('success', 'Welcome Back! ');
                return redirect()->route('patient.home');;
            }
        }
    }


    public function selectUser($phone = null,Request $req){
        $users = Patient::where('father_phone',$phone)->orWhere('mother_phone',$phone)->get();
        $session_number = helperGetSystemSession('phone_number');
        if($users && $session_number === $phone){
            return view('pages.front-end.patient.select-user',compact('users'));
        }
        return "Invalid user";
    }

    public function selectedUserLogin(Request $req){
        $user_id = $req->selected_user;
        $patient=User::find($user_id);
        \Auth::login($patient);
        // return redirect()->route('patient.home')->with('success', 'Welcome Back! ');
        return redirect()->route('patient.home');
    }
        

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
