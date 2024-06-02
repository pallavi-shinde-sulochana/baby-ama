@extends('base.doctor-dashboard')
@section('doctor-content')
@php

$getForm = config('pediatric-form.fields');
$appointment= $appoinment;
$getForm =json_decode(json_encode($getForm)) ;
$getFields = isset($getForm[0]->clinical_notes) ? $getForm[0]->clinical_notes : [];
$getFormAnswersData = isset($getFormAnswers->answer) ? json_decode($getFormAnswers->answer) : [];
@endphp
 
<section class="doctor-patinet-appointment pt-5">
     
  <h2 class="text-center mb-5">Clinical Notes</h2>
   <div class="head baby-shadow py-3 px-5">
        <div class="row px-5 py-4 align-items-center">
            <div class="col-12 col-md-2">
                <div class="patient-img d-flex justify-content-center align-items-center mx-auto">
                    <p class="name mb-0">
                        {{ucfirst(substr($user->first_name, 0,1)).ucfirst(substr($user->last_name, 0,1))}}</p>
                    {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="patient-info">
                    <p class="name">{{$user->first_name.' '.$user->last_name}} </p>
                    @if($user->patient)
                    <p class="doctor-patinet-app-list-color"><span class="fw-normal label">UMR NO</span><span class="val">{{$user->patient->umr_no}}</span></p>
                    @endif
                    @if($appointment->specialists)
                    <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Department</span><span class="val">{{$appointment->specialists}}</span></p>
                    @endif
                    @if($appointment->doctor)
                    <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Doctor</span>
                        <span class="val">{{$appointment->doctor->first_name.' '.$appointment->doctor->last_name}}</span></p>
                    @endif
                    <p class="doctor-patinet-app-list-color">
                        <span class="fw-normal label">Status</span>
                        <span class="val">
                            @if($appointment->status==-1)
                            {{'Declined' }}
                            @elseif($appointment->status==0 && $appointment->doctor_id)
                            {{'Assigned' }}
                            @else
                            {{'Awaiting' }}
                            @endif
                        </span>
                    </p>
                    @if($appointment->appoinment_session)
                    <p class="doctor-patinet-app-list-color">
                        <span class="fw-normal label">Session</span>
                        <span class="val">
                            {{$appointment->appoinment_session }}
                        </span>
                    </p>
                    @endif
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div>
                    @if(isset($user->patient->id))
                    <a class="link doctor-color-main doctor-font-bold btn-outline-primary"
                        href="{{route('doctor.appointment.patient.details',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Basic
                        Details</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
  
    <form action="{{route('doctor.patient.clinical_notes.post',$patient->id)}}" method="POST">
    @csrf
  <div class="row p-5 m-5 pediatric-form-fields  dental-form"> 
      
    {{-- Normal form data --}}

      @foreach($getFields as $key => $value)
       @php 
        $mapKey =$value->name;
        $thisValue=isset($getFormAnswersData->$mapKey) ? $getFormAnswersData->$mapKey : '';
        $value->value=$thisValue;

        if(isset($value->name2)){
            $mapKey2 =$value->name2;
          $thisValue2=isset($getFormAnswersData->$mapKey2) ? $getFormAnswersData->$mapKey2 : '';
          $value->value2=$thisValue2;
        }
        if(isset($value->yes_name)){
            $mapKey3 =$value->yes_name;
          $thisValue3=isset($getFormAnswersData->$mapKey3) ? $getFormAnswersData->$mapKey3 : '';
          $value->value_yes=$thisValue3;
        }


       @endphp
      <div class="col-md-9 p-2">
        {!!helperGenerteHtmlDentalForm($value)!!}
      </div>
      @endforeach  

      
  </div>
  <div class="row mb-5">
    <div class="col-md-3">
      <a class="btn btn-secondary btn-cancel" href="{{route('doctor.appointments')}}">Cancel</a>
    </div>
    <div class="col-md-3">
     <button type="submit" class="btn btn-info">Save</button>
    </div>
  </div>

  </form>
</section>
@endsection