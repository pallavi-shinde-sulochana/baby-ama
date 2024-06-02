@extends('base.patient-dashboard')
@section('doctor-content')
@php

@endphp

<a href="{{route('patient.appointments.all')}}">
    <img src="{{asset('front-end/assets/img/goBack.png')}}">
</a>
 
<section class="doctor-patinet-appointment pt-5">
     
  <h2 class="text-center">Patient Profile</h2>
  <div class="card">
    
    <div class="row p-5 m-5 doctor-patinet-border text-center ">
       <div class="col-sm-3 col-md-2 col-lg-2">
         <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}">
       </div>
       <div class="col-sm-5 col-md-5 col-lg-5">
          <h2>{{$user->first_name}} </h2>
          @if($user->patient)
          <h6 class="doctor-patinet-app-list-color">UMR NO. {{$user->patient->umr_no}}</h6>
          @endif
       </div>
       <div class="row">
         <hr>
       </div>
       <div class="col-12 col-sm-4 col-md-4 col-lg-4 row ">
         <div class="col-4">
           <label for="" class="color-light-grey">Gender</label>
           <h5 class="fw-bold">{{$user->patient->gender}}</h5>
         </div>
         <div class="col-3">
           <label for="" class="color-light-grey">Age</label>
           <h5 class="fw-bold">{{$user->patient->age}}</h5>
         </div>
         <div class="col-5">
           <label for="" class="color-light-grey">Blood Group</label>
           <h5 class="fw-bold">{{$user->patient->blood_group}}</h5>
         </div>
        {{-- @if(isset($user->patient->id))
         <a class="link doctor-color-main doctor-font-bold" href="{{route('doctor.appointment.patient.details',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Basic Details ></a>
         @endif --}}
       </div>
    </div>
  </div>

  <div class="row p-5 m-5 text-center"> 
    <h3 class="doctor-color-main">
      <a href="" class="doctor-color-main">Basic health reports ></a>
    </h3>
  </div>
  <div class="row">
  	<div class="col-md-3"></div>
  	<div class="col-md-6">
      @if(isset($user->patient->id))
  		<div class="row ">
  			<div class="col-6 col-md-6 ">
        <a target="_blank" href="{{route('patient.vaccination',$user->patient->id)}}" class="fw-bold">
           <div class="row">
            <div class="col-4"><img src="{{asset('front-end/assets/img/Injection.png')}}" alt="" class=""></div>
            <div class="col-8">
              
             <span style="color:#221730">Vaccination <br> Report</span>

            </div>
          </div>
        </a>
  			</div>
  			<div class="col-6 col-md-6">
          
           <a href="{{route('appointment.patient.prescription',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">
            <div class="row">
            <div class="col-4"><img src="{{asset('front-end/assets/img/Capsule & Pill.png')}}" alt="" class=""></div>
            <div class="col-8">
              
             <span style="color:#221730">Drugs & Prescription</span>

            </div>
          </div>
  				 </a>
  			</div>
       {{--  <div class="col-md-6">
          <h1>&emsp;</h1>
           <a href="{{route('doctor.patient.pediatric',$user->patient->id)}}">Paediatric Report</a>
          <h1>&emsp;</h1>
        </div>
        <div class="col-md-6">
          <h1>&emsp;</h1>
           <a href="{{route('doctor.patient.dental',$user->patient->id)}}">Dentistry Report</a>
          <h1>&emsp;</h1>
        </div> --}}
  		</div>
      @endif
  	</div>
  	<div class="col-md-3"></div>
  </div>
</section>
<style>
  header{
    display: none!important;
  }
</style>
@endsection

