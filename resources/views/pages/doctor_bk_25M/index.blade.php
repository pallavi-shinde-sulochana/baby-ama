@extends('base.doctor-dashboard')
@section('doctor-content')
<div class="my-5 pt-5">
{{-- <p class="h1">Welcome back!</p> --}}

</div>
<div class="card doctor-home mb-5">
  <div class="card-body p-0">
    <div class="row justify-content-between mx-0">
      <div class="col-md-6 col-lg-7 p-4 p-md-5">
        <div class="p-md-5">
        <h2 class="color-white mb-4">Welcome to Babyama</h2>
        {{-- Lorem ipsum dolor sit amet, consectetur adipiscing elit. At non faucibus lacinia sollicitudin nec. Natoque
        euismod ornare iaculis metus sagittis mattis tempor elementum. Mus congue suspendisse. --}}
        <p class="h3">{{helperGetAuthUser('first_name')}}</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-3">
        <div class="text-center">
          <img class="doctor-home-baby" src="{{helperAssetUrl('assets/img/pigu logo-01-only.png')}}">
        </div>
      </div>
    </div>
  </div>
</div>
{{-- <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will
  appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small
  screens,
  the page content will be pushed off canvas.</p>
<p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
<a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> --}}

<section class="doctor-today-appointment pt-5">
  <h2>Today’s Appointment(s)</h2>


  @if(!isset($data[0]))
  <div class="row p-5 my-5 doctor-patinet-border">
    <p>No Appointment's assigned for today</p>
  </div>
  @endif

  @foreach($data as $key => $appointment)

  <div class="row p-5 m-5 doctor-patinet-border">
    <div class="col-sm-3 col-md-3 col-lg-3">
      <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}">
    </div>
    <div class="col-sm-5 col-md-5 col-lg-5">
      <h2>{{$appointment->first_name}} </h2>
      {{-- <h6 class="doctor-patinet-app-list-color">{{$appointment->specialists}}</h6> --}}
      <h6 class="doctor-patinet-app-list-color">
        <img src="{{asset('media/icons/duotone/Home/Clock.svg')}}">
        {{$appointment->appoinment_session}}
      </h6>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
      <h2></h2>
      <h6>&nbsp;</h6>
      <a class="link" href="{{route('doctor.appointment.patient',$appointment->id)}}">View Details ></a>
    </div>
  </div>

  @endforeach

</section>
@endsection
