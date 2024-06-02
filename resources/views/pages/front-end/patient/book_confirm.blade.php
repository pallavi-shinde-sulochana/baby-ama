@extends('base.patient-dashboard')
@section('doctor-content')
@php
    $today = date('Y-m-d');
    $date_limit = 7;
@endphp
<div class="card doctor- " style="border-radius: 20px;border: 1px solid;">
  <div class="card-body ">
    <div class="row py-5">
        <div class="col-12 text-center">
            <img src="{{asset('front-end/assets/img/web-book-success.png')}}" class="web-book-success-img">
        </div> 
        <div class="col-12 mt-3">
            <h2 class="h1 text-center">Appointment Confirmed</h2>
            <p class="m-0 mt-2 text-center">
               Appointment Confirmed You successfully Booked an appointment on 
                 {{$appoinment->appoinment_date}} in the {{$appoinment->appoinment_session}}.
            </p>
        </div>
        <div class="col-12 mt-3 row text-center">
            <div class="col-6">
                
                <a href="{{route('patient.appointments.all')}}" class="btn patinet-book-plain">Close</a>
            </div>
            <div class="col-6">
                <a href="{{route('patient.appointments.all')}}" class="btn patinet-book">View now</a>
            </div>
        </div>
    </div>
</div>

 
@endsection