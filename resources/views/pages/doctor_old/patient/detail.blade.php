@extends('base.doctor-dashboard')
@section('doctor-content')
@php
  $appointment= $appoinment;
@endphp

<section class="doctor-patinet-appointment pt-5">

  <h2 class="text-center">Patient Profile</h2>
  <div class="card">

  <div class="row p-5 m-5   ">
     <div class="col-sm-3 col-md-2 col-lg-2">
       <img class="w-80" src="{{helperAssetUrl('assets/img/patinet-placeholder-v1.png')}}">
     </div>
     <div class="col-sm-5 col-md-5 col-lg-5">
        <h2>{{ ucfirst($user->first_name).' '.ucfirst($user->last_name)}}  </h2>
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
       {{-- <a class="link doctor-color-main doctor-font-bold" href="{{route('doctor.appointment.patient.detail',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Basic Details ></a> --}}
     </div>
  </div>
   <div class="row p-5">
      <div class="  text-centre">
        {{-- <a target="_blank" class="btn btn-info" href="{{route('doctor.patient.appointment.details',$patient->id)}}">Appointment Details</a> --}}
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
      <label for="dob" class="form-label doctor-color-main">DOB </label>
      <p class="doctor-color-black ">{{$patient->d_o_b}} ({{$patient->age}}) </p>
    </div>
  </div>
  <div class="row p-2">
    <div class="col-md-5">
      <label for="father_name" class="form-label doctor-color-main">Mother's name </label>
      <p class="doctor-color-black ">{{$patient->mother_name}}</p>
    </div>
    <div class="col-md-5">
      <label for="dob" class="form-label doctor-color-main">Gender </label>
      <p class="doctor-color-black ">{{ucfirst($patient->gender)}}  </p>
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
          <label for="dob" class="form-label doctor-color-main">Father Number </label>
          <p class="doctor-color-black ">{{$patient->father_phone}}</p>
        </div>
        <div class="col-md-12">
           <label for="dob" class="form-label doctor-color-main">Mother Number </label>
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
        <a target="_blank" class="btn btn-info" href="{{route('doctor.patient.visits',$patient->id)}}">View All Past Visits</a>
      </div>
    </div>
</section>


@endsection
