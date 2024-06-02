@extends('base.doctor-dashboard')
@section('doctor-content')
@php

// dd($patient);
@endphp
<section class="doctor-patinet-appointment pt-5">
    <div class="header ">
        <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
            <div class="col-1 position-relative py-5">
                <a href="{{ URL::previous() }}" class="position-absolute top-0 start-0">
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
                <h2 class="mb-0">Clinical Notes</h2>
            </div>
        </div>
    </div>
    <div class="prescrioption-form" style="margin-top:50px">
        <form
            action="{{route('doctor.appointment.prescription.post',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}"
            method="POST">
            @csrf

            <input type="hidden" name="type" value="{{ isset($type) ? $type : '' }}">

            <div class="head baby-shadow py-3 px-5 mb-4">
                <div class="row px-5 py-4 align-items-center">
                    <div class="col-12 col-md-2">
                        <div class="patient-img d-flex justify-content-center align-items-center mx-auto">
                            <p class="name mb-0">
                                {{ucfirst(substr($user->first_name, 0,1)).ucfirst(substr($user->last_name, 0,1))}}</p>

                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="patient-info">
                            <p class="name mb-3">{{$user->first_name.' '.$user->last_name}}</p>
                            @if($user->patient)
                            <p class="doctor-patinet-app-list-color">UMR NO: {{$user->patient->umr_no}}</p>
                            <p class="doctor-patinet-app-list-color">Gender: {{$user->patient->gender}}</p>
                            <p class="doctor-patinet-app-list-color">DOB : {{$user->patient->d_o_b}} ( {{$user->patient->age}} )</p>
                            @endif
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="patient-info">
                            @if($appoinment->doctor)
                            <p class="doctor-patinet-app-list-color">Doctor :
                                {{$appoinment->doctor->first_name.' '.$appoinment->doctor->last_name}}</p>
                            @endif
                            @if($appoinment->specialists)
                            <p class="doctor-patinet-app-list-color">Specialist : {{$appoinment->specialists}}</p>
                            @endif
                            @if(isset($data->created_at))
                            <p class="doctor-patinet-app-list-color">Date : {{$data->created_at->format('d.m.Y')}}</p>
                            @else
                            <p class="doctor-patinet-app-list-color">Session : {{date('d.m.Y')}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">


                <div class="col-md-2">

                    {{-- <button type="submit" class="btn p-1 ">

                        <img src="{{asset('front-end/assets/img/charm_tick.png')}}">
                    </button> --}}
                </div>
            </div>
            <div class="row pediatric-form-fields prescriptionForm table-responsive">
                <div class="col-md-8">

                    {{-- <h3>Duty doctor</h3>
                    <div class="row pt-2 pb-5">
                        <div class="col-md-2">
                            <img src="{{asset('media/avatars/blank.png')}}" class="w-100">
                        </div>
                        <div class="col-md-9">
                            <h6>Dr. {{helperGetAuthUser('first_name')}} </h6>
                            <span>{{helperGetAuthUserSpecialization()}}</span>
                        </div>
                    </div> --}}
                    @if(isset($data->id))
                    <input type="hidden" name="id" value="{{$data->id}}">
                    @endif
                    <div class="row p-2">

                        <div class="col-12 col-md-10 pb-5">
                            <!-- Chief Complaint -->
                            <div class="prescription-field-area mb-4">
                                <label for="chief_complaint">Chief Complaint</label>
                                <textarea class="form-control " name="chief_complaint"
                                    id="chief_complaint">{{isset($data->chief_complaint) ? $data->chief_complaint : old('chief_complaint')}}</textarea>
                                @if($errors->has('chief_complaint'))
                                <span class="text-danger error">{{ $errors->first('chief_complaint') }}</span>
                                @endif
                            </div>
                            <!-- Clinical Findings -->
                            <div class="prescription-field-area mb-4">
                                <label for="clinical_findings">Clinical Findings</label>
                                <textarea class="form-control " name="clinical_findings"
                                    id="clinical_findings">{{isset($data->clinical_findings) ? $data->clinical_findings : old('clinical_findings')}}</textarea>
                                @if($errors->has('clinical_findings'))
                                <span class="text-danger error">{{ $errors->first('clinical_findings') }}</span>
                                @endif
                            </div>
                            <!-- Diagnosis -->
                            <div class="prescription-field-area mb-4">
                                <label for="Daignosis">Diagnosis</label>
                                <textarea class="form-control " name="diagnosis"
                                    id="diagnosis">{{isset($data->diagnosis) ? $data->diagnosis : old('diagnosis')}}</textarea>
                                @if($errors->has('diagnosis'))
                                <span class="text-danger error">{{ $errors->first('diagnosis') }}</span>
                                @endif
                            </div>
                            <!-- Treatment -->
                            <div class="prescription-field-area mb-4">
                                <label for="treatments">Treatments</label>

                                <textarea class="form-control" name="treatments"
                                    id="treatments">{{isset($data->treatments) ? $data->treatments : old('treatments')}}</textarea>
                                @if($errors->has('treatments'))
                                <span class="text-danger error">{{ $errors->first('treatments') }}</span>
                                @endif
                            </div>
                            <!-- Followup Days -->
                            <div class="prescription-field-area mb-4">
                                <label for="follow_up_days">Follow Up Days</label>
                                <input style="width:12rem;" class="form-control" type="date" id="follow_up_days"
                                    name="follow_up_days"
                                    value="{{isset($data->follow_up_days) ? $data->follow_up_days : old('follow_up_days')}}">
                                @if($errors->has('follow_up_days'))
                                <span class="text-danger error">{{ $errors->first('follow_up_days') }}</span>
                                @endif
                            </div>
                            <!-- Add Prescription Button  -->

                            <div class="py-3">
                                @if(isset($data->id))
                                <a class="baby-primary-btn"
                                    href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'pr_id'=>$data->id])}}">+
                                    Add Prescriptions</a>
                                @else
                                <a class="baby-primary-btn disabled-link" href="#">+
                                    Add Prescriptions</a>
                                <span class="btn-info-bar">Save this Notes Information to Add Medicine</span>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
                @if(isset($data->prescriptionMedicine))

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="prescription-table py-3">
                            <h3 class="">Drug and Prescription</h3>
                            <div class="table-responsive py-3">
                                <table class="table">
                                    <thead class="table-light bg-color-v1">
                                        <tr>
                                            <th scope="col" class="text-center">S.No</th>
                                            <th scope="col" class="bg-color-v1 text-center">MEDICINE</th>
                                            <th scope="col" class="bg-color-v1 text-center">DOSAGE</th>
                                            <th scope="col" class="bg-color-v1 text-center">TIMING</th>
                                            <th scope="col" class="bg-color-v1 text-center">RELATION TO FOOD</th>
                                            <th scope="col" class="bg-color-v1 text-center">FOLLOW UP’S
                                                DAYS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $inc=0; @endphp
                                        @foreach($data->prescriptionMedicine as $p_medicine)
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
                                            <th scope="row" class="text-center">{{$inc}}</th>
                                            <td class="text-center">{{$medicine_details->name}}</td>
                                            <td class="text-center">{{$p_medicine->intake_qty.' '.$p_medicine->dosage}}
                                            </td>
                                            <td class="text-center">{{$p_medicine->timing_when}}</td>
                                            <td class="text-center">{{$p_medicine->timing_how}}</td>
                                            <td class="text-center">{{$p_medicine->duration}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- @if(isset($data->prescriptionMedicine))
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
                @foreach($data->prescriptionMedicine as $p_medicine)
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

                {{-- <div class="row pb-4 pt-4">
                                <div class="col-md-3">
                                    <img class="w-10" src="{{asset('front-end/assets/img/tabletPlaceholder.png')}}">
        </div>
        <div class="col-md-9">
            <h4>{{$medicine_details->name}}</h4>
            <span>Qty:<b>{{$p_medicine->total_qty}}</b></span>
            <span>Intake:<b>{{$p_medicine->intake_qty}}</b></span>
            <span>When:<b>{{$p_medicine->timing_when}}</b></span>
            <span>How:<b>{{$p_medicine->timing_how}}</b></span>
            <span>Duration:<b>{{$p_medicine->duration}}</b></span>
        </div>
    </div> --}}
    @endforeach
    </table>
    @endif -->
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12 p-5">
                        {{-- <a class="btn btn-sm btn-danger" target="_blank"
                            href="{{route('doctor.print.appointment.prescription',$appoinment->id)}}">
                            Print Prescription</a> --}}
                    </div>
                </div>
                <div class="d-flex gap-3">
                    <div class="">
                        <a type="button" href="{{route('doctor.appointments')}}"
                            class="baby-secondary-btn border-1 text-center">Cancel</a>
                    </div>
                    <div class="">
                        <button type="submit" class="baby-primary-btn">Save</button>
                    </div>
                </div>
        </form>
    </div>
</section>
@endsection
