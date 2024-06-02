@extends('base.patient-dashboard')
@section('doctor-content')
@php

 // dd($patient);
@endphp
 
<section class="doctor-patinet-appointment pt-5">
  
  {{-- <form action="{{route('doctor.appointment.prescription.post',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}" method="POST">
    @csrf --}}
    <div class="row">
      <div class="col-md-2">
        {{-- <a href="{{route('doctor.appointment.patient.details',$patient->id)}}"> --}}
        <a href="{{route('patient.appointment.patient',$appoinment->id)}}">
        {{-- <a href="{{URL::previous()}}"> --}}
          <img src="{{asset('front-end/assets/img/goBack.png')}}">
        </a>
      </div>
      <div class="col-md-8 text-center">
          <h2 class="p-0">Appointment details</h2>
      </div>
      <div class="col-md-2">
        
          {{--  <button type="submit"   class="btn p-1 ">
             
             <img src="{{asset('front-end/assets/img/charm_tick.png')}}">
           </button> --}}
      </div>
    </div>
  <div class="row pt-5 mt-5 pediatric-form-fields prescriptionForm table-responsive"> 
     <div class="col-md-8">

      <h3>Duty doctor</h3>
       <div class="row pt-2 pb-5">
         <div class="col-md-2">
            <img src="{{asset('front-end/assets/img/DoctorPlaceholder.png')}}">
         </div>
         <div class="col-md-9">
          @if(isset($appoinment->doctor->first_name))
           <h6>Dr. {{$appoinment->doctor->first_name .' '.$appoinment->doctor->last_name}} </h6>
           @endif
           <span>{{$appoinment->specialists}}</span>
         </div>
       </div>
       
      <div class="row p-2">
        <div class="col-md-12 pb-5">
          <label for="Daignosis" class="form-label doctor-color-black">
            <img src="{{asset('front-end/assets/img/Stethoscope-min.png')}}">&nbsp;Diagnosis  </label>
        
          <textarea class="form-control " readonly name="diagnosis" id="diagnosis"   rows="5">{{isset($data->diagnosis) ? $data->diagnosis : old('diagnosis')}}</textarea>
           
        </div>
        <div class="col-md-12 pb-5">
          <label for="advice" class="form-label doctor-color-black">
            <img src="{{asset('front-end/assets/img/Medical-Record-min.png')}}">&nbsp;Follow up advice  </label>
        
          <textarea class="form-control" readonly name="advice" id="advice"   rows="5">{{isset($data->advice) ? $data->advice : old('advice')}}</textarea>
        </div>
        <div class="col-md-12 pb-5">
          <label for="advice" class="form-label doctor-color-black">
            <img src="{{asset('front-end/assets/img/Pharmacy.png')}}">&nbsp;Prescription  </label> &emsp;
        
            @if($data->prescriptionMedicine)
             @foreach($data->prescriptionMedicine as $p_medicine)
              @php
                $frame_data = array(
                  'id' => $p_medicine->id,
                  'medicine_id' => $p_medicine->medicine_id,
                  'total_qty' => $p_medicine->total_qty,
                  'intake_qty' => $p_medicine->intake_qty,
                  'timing_when' => $p_medicine->timing_when,
                  'timing_how' => $p_medicine->timing_how,
                  'duration' => $p_medicine->duration,
                );
                $medicine_details = getMedcineDetail($p_medicine->medicine_id);
              @endphp

                <div class="row pb-4 pt-4">
                  <div class="col-3 col-md-3">
                    <img class="w-100" src="{{asset('front-end/assets/img/tabletPlaceholder.png')}}">
                  </div>
                  <div class="col-9 col-md-9">
                    <h4>{{$medicine_details->name}}</h4>
                    <span>Qty:<b>{{$p_medicine->total_qty}}</b></span>
                    <span>Intake:<b>{{$p_medicine->intake_qty}}</b></span>
                    <span>When:<b>{{$p_medicine->timing_when}}</b></span>
                    <span>How:<b>{{$p_medicine->timing_how}}</b></span>
                    <span>Duration:<b>{{$p_medicine->duration}}</b></span>
                  </div>
                </div>
              @endforeach
              
            @endif
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 col-3">
          <a class="btn btn-info btn-cancel" href="{{route('patient.appointment.patient',$appoinment->id)}}">Back</a>
        </div>
        
      </div>

     </div>
  </div>
 

</section>
@endsection