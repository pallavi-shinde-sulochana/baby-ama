@php

// Example from documentation
$docRoute = Route::currentRouteName();


$docHome= ($docRoute=='doctor.home') ? 'active' : '';
$docAppoinments= ($docRoute=='doctor.appointments') ? 'active' : '';
$docProfile= ($docRoute=='doctor.profile') ? 'active' : '';
$docHelp= ($docRoute=='doctor.help') ? 'active' : '';

// dd($docRoute);
@endphp


<div id="sidebar-wrapper">
  <div class="sidebar-close-wrapper text-end pt-4">
    <span class="navbar-toggler sidebar-toggle" type="button">
      <i class="fas fa-times h3 text-dark"></i>
    </span>

  </div>
  <div class="sidebar-user-logo py-5">
    <div class="row align-items-center p-5">
      <div class="col-8">
        {{-- <img src="{{asset('media/avatars/150-13.jpg')}}" class="w-100 ps-2 rounded-circle"> --}}
        <h2 class="h3 m-0">{{helperGetAuthUser('first_name')}}</h2>
        <p class="m-0">UMR: {{helperGetAuthPatient('umr_no')}}</p>
      </div>
      <div class="col-4">
        {{-- <p class="m-0">{{helperGetAuthUserSpecialization()}}</p> --}}
      </div>
    </div>
    <hr>
  </div>
  <div class="sidebar-inner-wrapper">
    <div class="sidebar-nav-section">
      <ul class="sidebar-nav">
        <li>
          <a href="{{route('patient.home')}}" class="sidebar-link {{$docHome}}">Home</a>
        </li>
        <li class=" {{$docAppoinments}}">
          <a href="{{route('patient.appointments.all')}}" class="sidebar-link">Appointments</a>
        </li>
        <!-- <li> 
          <a href="#" class="sidebar-link {{$docProfile}}">Profile</a>
        </li>
        <li> 
          <a href="#" class="sidebar-link {{$docHelp}}">Help</a>
        </li> -->
      </ul>
      <ul class="sidebar-nav" style="position:absolute;bottom: 25%;">
        <li>

          <a href="{{route('logout')}}" class="sidebar-logout-link text-danger">Log out</a>

        </li>
      </ul>
    </div>
    <div class="sidebar-logout">
      <ul class="sidebar-nav">

      </ul>
    </div>
  </div>
</div>