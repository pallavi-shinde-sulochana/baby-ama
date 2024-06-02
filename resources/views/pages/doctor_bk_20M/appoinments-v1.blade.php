@extends('base.doctor-dashboard')
@section('doctor-content')

 
<section class="doctor-all-appointment pt-5">
     
  <ul class="nav nav-tabs border-0 justify-content-center" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="btn nav-link active border-0" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Upcoming</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="btn nav-link border-0" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Past</button>
    </li>
     
  </ul> 
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
       {{-- Upcomming --}}
       @forelse($upcommingArray as $key => $appointments)
        <h5 class="">{{$key}}</h5>
          @foreach($appointments as $key => $appointment)
          <div class="row p-5 m-5 doctor-patinet-border">
             <div class="col-sm-3 col-md-3 col-lg-3">
               {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}

               <div class="date-back-drop">
                 
               <h1>{{helperParseDate($appointment->appoinment_date,'Y-m-d','d')}}</h1>
               <h3>{{helperParseDate($appointment->appoinment_date,'Y-m-d','D')}}</h3>
               </div>
             </div>
             <div class="col-sm-5 col-md-5 col-lg-5">
                <h2> <span class="fw-normal"> Patient Name:</span> {{$appointment->first_name}} </h2>
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
               <a class="link" href="{{route('doctor.appointment.patient',$appointment->id)}}">View Details ></a>
             </div>
          </div>
          @endforeach
        @empty
        <p class="text-center h5 mt-5 pt-5 text-danger fw-normal">No record(s) available</p>
        @endforelse
       {{-- Upcomming --}}
    </div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      {{-- Past --}}
      @forelse($pastArray as $key => $appointments)
          <h5 class="">{{$key}}</h5>
          @foreach($appointments as $key => $appointment)
          <div class="row p-5 m-5 doctor-patinet-border">
             <div class="col-sm-3 col-md-3 col-lg-3">
               {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}

               <div class="date-back-drop">
                 
               <h1>{{helperParseDate($appointment->appoinment_date,'Y-m-d','d')}}</h1>
               <h3>{{helperParseDate($appointment->appoinment_date,'Y-m-d','D')}}</h3>
               </div>
             </div>
             <div class="col-sm-5 col-md-5 col-lg-5">
                <h2> <span class="fw-normal"> Patient Name:</span> {{$appointment->first_name}} </h2>
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
               <a class="link" href="{{route('doctor.appointment.patient',$appointment->id)}}">View Details ></a>
             </div>
          </div>
          @endforeach
        @empty
        <p class="text-center h5 mt-5 pt-5 text-danger fw-normal">No record(s) available</p>
        @endforelse
      {{-- Past --}}
    </div>
     
  </div>

  

</section>
@endsection