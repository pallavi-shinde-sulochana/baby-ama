@extends('base.patient-dashboard')
@section('doctor-content')
@php

@endphp
 
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
</section>

<section class="doctor-patinet-details p-5 ">
  <div class="row p-2">
    <div class="col-md-5">
      <label for="father_name" class="form-label doctor-color-main">Father's name </label>
      <p class="doctor-color-black ">{{$patient->father_name}}</p>
    </div>
    <div class="col-md-5">
      <label for="father_name" class="form-label doctor-color-main">Mother's name </label>
      <p class="doctor-color-black ">{{$patient->mother_name}}</p>
    </div>
   
  </div>
  <div class="row p-2">
     <div class="col-md-5">
      <label for="dob" class="form-label doctor-color-main">DOB </label>
      <p class="doctor-color-black ">{{$patient->d_o_b}}</p>
    </div>
  </div>
  <div class="row p-2">
    <div class="col-md-5">
       <label for="dob" class="form-label doctor-color-main">Address </label>
      <p class="doctor-color-black ">{{$patient->address}}</p>
    </div>
    <div class="col-md-5">
      <label for="dob" class="form-label doctor-color-main">Blood Group </label>
      <p class="doctor-color-black ">{{$patient->blood_group}}</p>
    </div>
  </div>
  <div class="row p-2">
    <div class="col-md-5">
      <h3>Contact detail</h3>
      <div class="row pt-5">
        <div class="col-md-12">
          <label for="dob" class="form-label doctor-color-main">Contact Number </label>
          <p class="doctor-color-black ">{{$patient->father_phone}}</p>
        </div>
        <div class="col-md-12">
           <label for="dob" class="form-label doctor-color-main">Alternative Number </label>
          <p class="doctor-color-black ">{{$patient->mother_phone}}</p>
        </div>
        <div class="col-md-12">
           <label for="dob" class="form-label doctor-color-main">Email </label>
          <p class="doctor-color-black ">{{$patient->email}}</p>
        </div>
      </div>
    </div>
    <div class="col-md-5">
      <h3>Medical detail</h3>
      <div class="row pt-5">
        <div class="col-md-12">
          <label for="dob" class="form-label doctor-color-main">Weight </label>
          <p class="doctor-color-black ">{{$patient->weight}} <b>Kgs</b></p>
        </div>
        <div class="col-md-12">
           <label for="dob" class="form-label doctor-color-main">Height </label>
          <p class="doctor-color-black ">{{$patient->height}} <b>CM</b></p>
        </div>
      </div>
    </div>

    <div class="row p-5">
      <div class="  text-centre">
        <a  class="btn btn-secondary" href="{{route('patient.appointment.patient',$appoinment->id)}}">Back</a>
      </div>
    </div>
</section>

 
@endsection