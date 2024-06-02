@extends('base.doctor-dashboard')
@section('doctor-content')
@php
  $appointment= $appoinment;
@endphp
 
<section class="doctor-patinet-appointment pt-5">
     
  <h2 class="text-center">Patient Profile</h2>
  <div class="card">
    
  <div class="row p-5 m-5 doctor-patinet-border ">
     <div class="col-sm-3 col-md-2 col-lg-2">
       <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}">
     </div>
     <div class="col-sm-5 col-md-5 col-lg-5">
        <h2>{{$user->first_name.' '.$user->last_name}} </h2>
        @if($user->patient)
        <h6 class="doctor-patinet-app-list-color">UMR NO. {{$user->patient->umr_no}}</h6>
        @endif
         
                @if($appointment->specialists)
                <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Department: </span>{{$appointment->specialists}}</h6>
                @endif

                @if($appointment->doctor)
                <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Doctor: </span>{{$appointment->doctor->first_name.' '.$appointment->doctor->last_name}}</h6>
                @endif


                <h6 class="doctor-patinet-app-list-color">
                  <span class="fw-normal"> Status: </span>
                  <b>
                    @if($appointment->status==-1)
                      {{'Declined' }}
                    @elseif($appointment->status==0 && $appointment->doctor_id)
                       {{'Assigned' }}
                    @else
                      {{'Awaiting' }}
                    @endif
                  </b>
                </h6>
                @if($appointment->appoinment_session)
                <h6 class="doctor-patinet-app-list-color">
                  <span class="fw-normal"> Session: </span>
                  <b>
                     {{$appointment->appoinment_session }}
                  </b>
                </h6>
                @endif
     </div>
     <div class="col-sm-4 col-md-4 col-lg-4">
      <h2></h2>
      <h6>&nbsp;</h6>
      @if(isset($user->patient->id))
       <a class="link doctor-color-main doctor-font-bold" href="{{route('doctor.appointment.patient.details',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Basic Details ></a>
       @endif
     </div>
  </div>
  </div>

  <div class="row p-5 m-5 text-center"> 
    <h3 class="doctor-color-main">Previous Visit ></h3>
  </div>
  <div class="row doctor-main-four">
  	<div class="col-md-3"></div>
  	<div class="col-md-6">
      @if(isset($user->patient->id))
  		<div class="row ">
  			<div class="col-md-6">
  				 <a target="_self" href="{{route('doctor.patient.vaccination',$user->patient->id)}}" >
            
            <div class="row">
              <div class="col-3">
                <img src="{{asset('front-end/assets/img/Injection.png')}}" alt="" class="w-100">
              </div>
              <div class="col-8">
                
               <span >Vaccination <br> Report</span>

              </div>
            </div>    
           </a>
  			</div>
  			<div class="col-md-6">
           <a href="{{route('doctor.appointment.patient.prescription',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">
             
            <div class="row">
                <div class="col-3"><img src="{{asset('front-end/assets/img/Capsule & Pill.png')}}" alt="" class="w-100"></div>
                <div class="col-8">
                  
                 <span >Drugs & <br> Prescription</span>

                </div>
            </div>
           </a>
  			</div>
        <div class="col-md-12">
          <br>
          <br>
        </div>
        <div class="col-md-6">
           <a href="{{route('doctor.patient.pediatric',$user->patient->id)}}">
           <div class="row">
                <div class="col-3">
                  <img src="{{asset('front-end/assets/img/HeartRate.png')}}" alt="" class="w-100">
                </div>
                <div class="col-8">
                  
                 <span > Paediatric <br> Report</span>

                </div>
            </div>
          </a>
        </div>
        <div class="col-md-6">
           <a href="{{route('doctor.patient.dental',$user->patient->id)}}">
            <div class="row">
                <div class="col-3">
                  <img src="{{asset('front-end/assets/img/Tooth.png')}}" alt="" class="w-100">
                </div>
                <div class="col-8">
                  
                 <span > Dentistry <br> Report</span>

                </div>
            </div>
           </a>
        </div>
  		</div>
      @endif
  	</div>
  	<div class="col-md-3"></div>
  </div>
</section>
@endsection