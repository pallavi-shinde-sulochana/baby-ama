@extends('base.patient-dashboard')
@section('doctor-content')
<section class="patient-all-appointment pt-5">

  <ul class="nav nav-tabs border-0 justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="btn nav-link active border-0 w-80" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
        type="button" role="tab" aria-controls="home" aria-selected="true">Upcoming</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="btn nav-link border-0 w-80" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile"
        type="button" role="tab" aria-controls="profile" aria-selected="false">Past Visits</button>
    </li>
  </ul>
  <div class="tab-content pt-5 mt-5" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      {{-- Upcomming --}}
      @foreach($upcommingArray as $key => $appointments)
      <h5 class="">{{$key}}</h5>
      @foreach($appointments as $key => $appointment)
      <div class="row p-5 m-5 doctor-patinet-border">
        <div class="col-4 col-sm-3 col-md-3 col-lg-3">
          {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}
          <a href="{{route('patient.appointment.patient',$appointment->id)}}">
            <div class="date-back-drop h-100">
              <span class="d-block h1">{{helperParseDate($appointment->appoinment_date,'Y-m-d','d')}}</span>
              <span class="d-block h3">{{helperParseDate($appointment->appoinment_date,'Y-m-d','D')}}</span>
            </div>
          </a>
        </div>
        <div class="col-8 col-sm-5 col-md-5 col-lg-5 ">
          <a href="{{route('patient.appointment.patient',$appointment->id)}}">

            <h2>{{$appointment->first_name.' '.$appointment->last_name}} </h2>
            {{-- <h6 class="doctor-patinet-app-list-color">{{$appointment->specialists}}</h6>
            <p><img src="{{asset('media/icons/duotone/Home/Timer.svg')}}">&emsp;{{$appointment->appoinment_session}}</p>
            <h2> <span class="fw-normal"> Patient Name:</span> {{$appointment->first_name}} </h2> --}}
            @if($appointment->specialists)
            <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Department:
              </span>{{$appointment->specialists}}</h6>
            @endif

            @if($appointment->doctor)
            <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Doctor:
              </span>{{$appointment->doctor->first_name.' '.$appointment->doctor->last_name}}</h6>
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
              <span class="fw-normal"> Session: </span><img src="{{asset('media/icons/duotone/Home/Timer.svg')}}">
              <b>
                {{$appointment->appoinment_session }}
              </b>
            </h6>
            @endif

          </a>
        </div>
        {{-- <div class="col-4 col-sm-4 col-md-4 col-lg-4">
          <h2></h2>
          <h6>&nbsp;</h6>
          <a class="link" href="{{route('doctor.appointment.patient',$appointment->id)}}">View Details ></a>
        </div> --}}
      </div>
      @endforeach
      @endforeach
      {{-- Upcomming --}}
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      {{-- Past --}}
      @foreach($pastArray as $key => $appointments)
      <h5 class="">{{$key}}</h5>
      @foreach($appointments as $key => $appointment)
      <div class="row p-5 m-5 doctor-patinet-border">
        <div class="col-4 col-sm-3 col-md-3 col-lg-3">
          <a href="{{route('patient.appointment.patient',$appointment->id)}}">
            {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}

            <div class="date-back-drop h-100">

              <span class="d-block h1">{{helperParseDate($appointment->appoinment_date,'Y-m-d','d')}}</span>
              <span class="d-block h1">{{helperParseDate($appointment->appoinment_date,'Y-m-d','D')}}</span>
            </div>
          </a>
        </div>
        <div class="col-8 col-sm-5 col-md-5 col-lg-5 ">
          <a href="{{route('patient.appointment.patient',$appointment->id)}}">
            <h2>{{$appointment->first_name}} </h2>
            {{-- <h6 class="doctor-patinet-app-list-color">{{$appointment->specialists}}</h6>
            <p><img src="{{asset('media/icons/duotone/Home/Timer.svg')}}">&emsp;{{$appointment->appoinment_session}}</p>
            --}}

            @if($appointment->specialists)
            <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Department:
              </span>{{$appointment->specialists}}</h6>
            @endif

            @if($appointment->doctor)
            <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Doctor:
              </span>{{$appointment->doctor->first_name.' '.$appointment->doctor->last_name}}</h6>
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
              <span class="fw-normal"> Session: </span><img src="{{asset('media/icons/duotone/Home/Timer.svg')}}">
              <b>
                {{$appointment->appoinment_session }}
              </b>
            </h6>
            @endif

          </a>
        </div>
        {{-- <div class="col-4 col-sm-4 col-md-4 col-lg-4">
          <h2></h2>
          <h6>&nbsp;</h6>
          <a class="link" href="{{route('doctor.appointment.patient',$appointment->id)}}">View Details ></a>
        </div> --}}
      </div>
      @endforeach
      @endforeach
      {{-- Past --}}
    </div>

  </div>



</section>

@endsection