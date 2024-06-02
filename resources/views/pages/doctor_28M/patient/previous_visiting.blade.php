@extends('base.doctor-dashboard')
@section('doctor-content')
@php

@endphp

<section class="doctor-patinet-appointment doctor-all-appointment pt-5">

<div class="header">
        <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
            <div class="col-1 position-absolute">
                <a href="{{ URL::previous() }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path
                            d="M12.7599 25.0934C12.5066 25.0934 12.2533 25 12.0533 24.8L3.95992 16.7067C3.57326 16.32 3.57326 15.68 3.95992 15.2934L12.0533 7.20003C12.4399 6.81337 13.0799 6.81337 13.4666 7.20003C13.8533 7.5867 13.8533 8.2267 13.4666 8.61337L6.07992 16L13.4666 23.3867C13.8533 23.7734 13.8533 24.4134 13.4666 24.8C13.2799 25 13.0133 25.0934 12.7599 25.0934Z"
                            fill="#344054" />
                        <path
                            d="M27.3336 17H4.89355C4.34689 17 3.89355 16.5467 3.89355 16C3.89355 15.4533 4.34689 15 4.89355 15H27.3336C27.8802 15 28.3336 15.4533 28.3336 16C28.3336 16.5467 27.8802 17 27.3336 17Z"
                            fill="#344054" />
                    </svg>
                </a>
            </div>
            <div class="col-11 text-center">
                <h2 class="mb-0">Patient Profile</h2>
            </div>
        </div>
    </div>
    <div class="py-5 mb-5"><div class="py-4"></div></div>
  @forelse($pastArray as $key => $appointments)
  <h5 class="">{{$key}}</h5>
  @foreach($appointments as $key => $appointment)
  <div class="row p-5 m-5 doctor-patinet-border">
    <div class="col-sm-3 col-md-3 col-lg-3">
      {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}

      <div class="date-back-drop h-100">

        <span class="d-block h1">{{helperParseDate($appointment->appoinment_date,'Y-m-d','d')}}</span>
        <span class="d-block h3">{{helperParseDate($appointment->appoinment_date,'Y-m-d','D')}}</span>
      </div>
    </div>
    <div class="col-sm-5 col-md-5 col-lg-5">
      <h2>{{$appointment->first_name}} </h2>
      <h6 class="doctor-patinet-app-list-color">{{$appointment->specialists}}</h6>

    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
      <h2></h2>
      <h6>&nbsp;</h6>
      <a class="link doctor-color-main doctor-font-bold"
        href="{{route('doctor.appointment.patient',$appointment->id)}}">View Details ></a>
    </div>
  </div>
  @endforeach
  @empty
  <p class="text-center text-danger h5 fw-normal my-5 py-5">No record(s) available</p>
  @endforelse

  <div class="row">
    <div class="text-center">
      <a class="baby-primary-btn" href="{{ url()->previous() }}"> Back</a>
    </div>
  </div>
</section>


@endsection