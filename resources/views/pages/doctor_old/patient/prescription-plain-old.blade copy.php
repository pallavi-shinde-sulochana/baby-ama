@extends('base.doctor-dashboard')
@section('doctor-content')
@php

 // dd($patient);
@endphp
       {{-- <div class="col-md-12 text-center">
          <h2 class="p-0">Clinical Notes</h2>
      </div> --}}

      <div class="row">
      <div class="col-md-2">
         
        <a href="{{route('doctor.appointments')}}">
          <img src="{{asset('front-end/assets/img/goBack.png')}}">
        </a>
      </div>
      <div class="col-md-8 text-center">
          <h2 class="p-0">Clinical Notes</h2>
      </div>
      <div class="col-md-2">
        
          
      </div>
    </div>
<div class="addNotesSection">
  <a href="{{route('doctor.appointment.patient.prescription.add',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}"><i class="fa fa-plus-circle fa-stack-2x"></i></a>
</div>
<section class="doctor-patinet-appointment pt-5">
 @foreach($getPrescriptions as $ps)

     @php
         $appointment= $ps->appointment;

         // $data = $ps->
         // $data = $ps->prescriptionMedicine;
         
     @endphp
  {{-- {{json_encode($ps)}} --}}
      <div class="row">
     <b> {{$appointment->appoinment_date}}</b><br><br>
         <div class="col-md-12 row" style="border-radius:10px;border:1px solid #EAECF0;padding: 15px;">
             <div class="col-md-2 col-sm-2">
                 <div class="backdrop-patient">
                    <h3> {{ucfirst(substr($user->first_name, 0,1)).ucfirst(substr($user->last_name, 0,1))}}</h3>
                 </div>     
             </div>
              <div class="col-md-6 col-sm-6 ">
                 <h2>{{$user->first_name.' '.$user->last_name}} </h2>
                 @if($user->patient)
                 <h6 class="doctor-patinet-app-list-color">UMR NO: {{$user->patient->umr_no}}</h6>
                 <h6 class="doctor-patinet-app-list-color">Gender: {{$user->patient->gender}}</h6>
                 <h6 class="doctor-patinet-app-list-color">Age &emsp;: {{$user->patient->age}}</h6>
                 @endif
                 
             </div>
             <div class="col-md-4 col-sm-4 ">
               {{-- <h2>&emsp;</h2> --}}
                @if($appoinment->doctor)
                   <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Doctor: </span>{{$appoinment->doctor->first_name.' '.$appoinment->doctor->last_name}}</h6>
                 @endif
                 @if($appoinment->specialists)
                   <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Specialist: </span>{{$appoinment->specialists}}</h6>
                 @endif

                 @if(isset($appointment->appoinment_date))
                   <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Date: </span>{{$appointment->appoinment_date;}}</h6>
                 @endif
                 @if($appointment->appoinment_session)
                  <h6 class="doctor-patinet-app-list-color"><span class="fw-normal"> Session: </span>{{$appointment->appoinment_session}}</h6>
                 @endif
             </div>

         </div>
         <div class="col-md-12 col-sm-12 col-12 pt-5">
            <div class="row p-5">
               <label for="Daignosis" class="">Chief Complaint</label>
               <b>{{$ps->complaint}}</b>
            </div>
             <div class="row p-5">
               <label for="Diagnosis" class="">Diagnosis</label>
               <b>{{$ps->diagnosis}}</b>
            </div>
             <div class="row p-5">
               <label for="Daignosis" class="">Treatment</label>
               <b>{{$ps->advice}}</b>
            </div>
         </div>
         <div class="col-md-12 col-sm-12 col-12">
             @if(isset($ps->prescriptionMedicine))
               <table class="table medicineLIstTable">
                 <tr>
                   <th>SNO</th>
                   <th>MEDICINE</th>
                   <th>DOSAGE</th>
                   <th>TIMING</th>
                   <th>RELATION TO FOOD</th>
                   <th>FOLLOW UP DAYS</th>
                 </tr>
               @php $inc=0; @endphp
                @foreach($ps->prescriptionMedicine as $p_medicine)
                 @php
                  $inc++;
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
                 <tr>
                   <td>{{$inc}}</td>
                   <td><b>{{$medicine_details->name}}</b></td>
                   <td>{{$p_medicine->intake_qty.' '.$p_medicine->dosage}}</td>
                   <td>{{$p_medicine->timing_when}}</td>
                   <td>{{$p_medicine->timing_how}}</td>
                   <td>{{$p_medicine->duration}}</td>
                 </tr>
                 @endforeach
                 </table>
               @endif
           </div>
      </div>
      <hr>
 @endforeach
</section>
@endsection