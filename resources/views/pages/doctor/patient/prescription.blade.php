@extends('base.doctor-dashboard')
@section('doctor-content')
@php
$appointment = $appoinment;
$id = $appointment->id;
@endphp
<section class="doctor-patinet-appointment pt-5">
    <div class="header ">
        <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
            <div class="col-1 position-relative py-5">
                <a href="{{route('doctor.appointment.patient',$id)}}" class="position-absolute top-0 start-0">
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
          <?php
          if(isset($get['type']))
           {
            $typ = $get['type'];
           }
           else
           { $typ =''; }
           ?>

        <form
            action="{{route('doctor.appointment.prescription.edit.post',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'type' => $typ])}}"     method="POST">
            @csrf

            <input type="hidden" name="type" value="{{ isset($get['type']) ? $get['type'] : '' }}">

            <div class="head baby-shadow py-3 px-5 mb-4">
                <div class="row px-5 py-4 align-items-center">
                    <div class="col-12 col-md-2">
                        <div class="patient-img d-flex justify-content-center align-items-center mx-auto">
                            <p class="name mb-0">
                                {{ ucfirst(substr($user->first_name, 0, 1)) . ucfirst(substr($user->last_name, 0, 1)) }}
                            </p>
                            {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="patient-info">
                            <p class="name mb-3">{{ $user->first_name . ' ' . $user->last_name }}</p>
                            @if ($user->patient)
                                <p class="doctor-patinet-app-list-color"><span class="fw-normal label">UMR
                                        NO</span><span class="val">{{ $user->patient->umr_no }}</span>
                                </p>
                                <p class="doctor-patinet-app-list-color"><span
                                        class="fw-normal label">Gender</span><span
                                        class="val">{{ $user->patient->gender }}</span></p>
                                <p class="doctor-patinet-app-list-color"><span
                                        class="fw-normal label">Age</span><span
                                        class="val">{{ $user->patient->age }}</span></p>
                            @endif

                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="patient-info">
                            @if ($appoinment->doctor)
                                <p class="doctor-patinet-app-list-color"><span
                                        class="fw-normal label">Doctor </span><span
                                        class="val">{{ $appoinment->doctor->first_name .
                                            '
                                                                        ' .
                                            $appoinment->doctor->last_name }}</span>
                                </p>
                            @endif
                              {{-- @if (isset($appointment->appoinment_date))
                                <p class="doctor-patinet-app-list-color"><span
                                        class="fw-normal label">Date</span><span class="val">
                                        {{ $appointment->appoinment_date }}</span></p>
                            @endif --}}
                            @if ($appointment->appoinment_session)
                                <p class="doctor-patinet-app-list-color"><span
                                        class="fw-normal label">Session</span><span class="val">
                                        {{ $appointment->appoinment_session }}</span></p>
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
                        <?php
                        $type = $get['type'];
                        $value = $get['value'];

                        // Pediatric
                        if($type == 'pediatric') { ?>
                         <div class="col-12 col-md-10 pb-5" >
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_date">Date</label>
                                <input class="form-control" type="date" id="prescription_date" name="prescription_date" value="{{isset($value->date) ? date('Y-m-d', strtotime($value->date)) : old('prescription_date')}}">
                            </div>
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_type">Type</label>
                                <input class="form-control" type="text" id="prescription_type" name="prescription_type" value="<?php echo ucfirst($type); ?>" readonly style="cursor: not-allowed">
                            </div>
                            <!-- Chief Complaint -->
                            <div class="prescription-field-area mb-4">
                                <label for="chief_complaints">Chief Complaints </label>
                                <textarea class="form-control " name="chief_complaints"
                                    id="chief_complaints">{{isset($value->chief_complaints) ? $value->chief_complaints : old('chief_complaints')}}</textarea>
                                @if($errors->has('chief_complaints'))
                                <span class="text-danger error">{{ $errors->first('chief_complaints') }}</span>
                                @endif
                            </div>
                            <!-- History Of Presenting Illness -->
                            <div class="prescription-field-area mb-4">
                                <label for="h_o_pi">History Of Presenting Illness</label>
                                <textarea class="form-control " name="h_o_pi"
                                    id="h_o_pi">{{isset($value->h_o_pi) ? $value->h_o_pi : old('h_o_pi')}}</textarea>
                                @if($errors->has('h_o_pi'))
                                <span class="text-danger error">{{ $errors->first('h_o_pi') }}</span>
                                @endif
                            </div>
                            <!-- Diagnosis -->
                            <div class="prescription-field-area mb-4">
                                <label for="Daignosis">Diagnosis</label>
                                <textarea class="form-control " name="diagnosis"
                                    id="diagnosis">{{isset($value->diagnosis) ? $value->diagnosis : old('diagnosis')}}</textarea>
                                @if($errors->has('diagnosis'))
                                <span class="text-danger error">{{ $errors->first('diagnosis') }}</span>
                                @endif
                            </div>
                            <!-- Management -->
                            <div class="prescription-field-area mb-4">
                                <label for="management">Management</label>

                                <textarea class="form-control" name="management"
                                    id="management">{{isset($value->management) ? $value->management : old('management')}}</textarea>
                                @if($errors->has('management'))
                                <span class="text-danger error">{{ $errors->first('management') }}</span>
                                @endif
                            </div>
                            <div class="prescription-field-area mb-4">
                                <label for="follow_up_advice">Follow Up Advice</label>

                                <textarea class="form-control" name="follow_up_advice"
                                    id="follow_up_advice">{{isset($value->follow_up_advice) ? $value->follow_up_advice : old('follow_up_advice')}}</textarea>
                                @if($errors->has('follow_up_advice'))
                                <span class="text-danger error">{{ $errors->first('follow_up_advice') }}</span>
                                @endif
                            </div>
                            <!-- Add Prescription Button  -->

                            <div class="py-3">
                                @if(isset($data->id))
                                <a class="baby-primary-btn"
                                    href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'pr_id'=>$data->id,'type' => 'pediatric'])}}">+
                                    Add Prescriptions</a>
                                @else
                                <a class="baby-primary-btn disabled-link" href="#">+
                                    Add Prescriptions</a>
                                <span class="btn-info-bar">Save this Notes Information to Add Medicine</span>
                                @endif
                            </div>
                        </div>

                        <?php }
                        // Dental
                        else if($type == 'dental') { ?>
                         <div class="col-12 col-md-10 pb-5" >
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_date">Date</label>
                                <input class="form-control" type="date" id="prescription_date" name="prescription_date" value="{{isset($value->date) ? date('Y-m-d', strtotime($value->date)) : old('prescription_date')}}">
                            </div>
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_type">Type</label>
                                <input class="form-control" type="text" id="prescription_type" name="prescription_type" value="<?php echo ucfirst($type); ?>" readonly style="cursor: not-allowed">
                            </div>


                            <!-- Chief Complaint -->
                            <div class="prescription-field-area mb-4">
                                <label for="chief_complaints">Chief Complaints </label>
                                <textarea class="form-control " name="chief_complaints"
                                    id="chief_complaints">{{isset($value->chief_complaints) ? $value->chief_complaints : old('chief_complaints')}}</textarea>
                                @if($errors->has('chief_complaints'))
                                <span class="text-danger error">{{ $errors->first('chief_complaints') }}</span>
                                @endif
                            </div>
                            <!-- History Of Presenting Illness -->
                            <div class="prescription-field-area mb-4">
                                <label for="h_o_pi">History Of Presenting Illness</label>
                                <textarea class="form-control " name="h_o_presenting_illness"
                                    id="h_o_presenting_illness">{{isset($value->h_o_presenting_illness) ? $value->h_o_presenting_illness : old('h_o_presenting_illness')}}</textarea>
                                @if($errors->has('h_o_presenting_illness'))
                                <span class="text-danger error">{{ $errors->first('h_o_presenting_illness') }}</span>
                                @endif
                            </div>
                             <!-- Medical History -->
                             <div class="prescription-field-area mb-4">
                                <label for="medical_history">Medical History</label>

                                <textarea class="form-control" name="medical_history"
                                    id="medical_history">{{isset($value->medical_history) ? $value->medical_history : old('medical_history')}}</textarea>
                                @if($errors->has('medical_history'))
                                <span class="text-danger error">{{ $errors->first('medical_history') }}</span>
                                @endif
                            </div>
                            <!-- Diagnosis -->
                            <div class="prescription-field-area mb-4">
                                <label for="gyn_diagnosis">Diagnosis</label>
                                <textarea class="form-control " name="dental_diagnosis"
                                    id="dental_diagnosis">{{isset($value->dental_diagnosis) ? $value->dental_diagnosis : old('dental_diagnosis')}}</textarea>
                                @if($errors->has('diagnosis'))
                                <span class="text-danger error">{{ $errors->first('dental_diagnosis') }}</span>
                                @endif
                            </div>
                            <!-- Add Prescription Button  -->

                            <div class="py-3">
                                @if(isset($data->id))
                                <a class="baby-primary-btn"
                                    href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'pr_id'=>$data->id,'type' => 'dental'])}}">+
                                    Add Prescriptions</a>
                                @else
                                <a class="baby-primary-btn disabled-link" href="#">+
                                    Add Prescriptions</a>
                                <span class="btn-info-bar">Save this Notes Information to Add Medicine</span>
                                @endif
                            </div>
                        </div>
                        <?php }  // Gynaecology
                          else if($type == 'gynaecology') { ?>
                         <div class="col-12 col-md-10 pb-5" >
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_date">Date</label>
                                <input class="form-control" type="date" id="prescription_date" name="prescription_date" value="{{isset($value->date) ? date('Y-m-d', strtotime($value->date)) : old('prescription_date')}}">
                            </div>
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_type">Type</label>
                                <input class="form-control" type="text" id="prescription_type" name="prescription_type" value="<?php echo ucfirst($type); ?>" readonly style="cursor: not-allowed">
                            </div>

                            <!-- Chief Complaint -->
                            <div class="prescription-field-area mb-4">
                                <label for="gyn_chief_complaints">Chief Complaints </label>
                                <textarea class="form-control " name="gyn_chief_complaints"
                                    id="gyn_chief_complaints">{{isset($value->gyn_chief_complaints) ? $value->gyn_chief_complaints : old('gyn_chief_complaints')}}</textarea>
                                @if($errors->has('gyn_chief_complaints'))
                                <span class="text-danger error">{{ $errors->first('gyn_chief_complaints') }}</span>
                                @endif
                            </div>
                            <!-- History Of Presenting Illness -->
                            <div class="prescription-field-area mb-4">
                                <label for="h_o_pi">History Of Presenting Illness</label>
                                <textarea class="form-control " name="gyn_history_present_illness"
                                    id="gyn_history_present_illness">{{isset($value->gyn_history_present_illness) ? $value->gyn_history_present_illness : old('gyn_history_present_illness')}}</textarea>
                                @if($errors->has('gyn_history_present_illness'))
                                <span class="text-danger error">{{ $errors->first('gyn_history_present_illness') }}</span>
                                @endif
                            </div>
                            <!-- Diagnosis -->
                            <div class="prescription-field-area mb-4">
                                <label for="gyn_diagnosis">Diagnosis</label>
                                <textarea class="form-control " name="gyn_diagnosis"
                                    id="gyn_diagnosis">{{isset($value->gyn_diagnosis) ? $value->gyn_diagnosis : old('gyn_diagnosis')}}</textarea>
                                @if($errors->has('diagnosis'))
                                <span class="text-danger error">{{ $errors->first('gyn_diagnosis') }}</span>
                                @endif
                            </div>
                              <!-- Management -->
                              <div class="prescription-field-area mb-4">
                                <label for="gyn_management">Management</label>

                                <textarea class="form-control" name="gyn_management"
                                    id="gyn_management">{{isset($value->gyn_management) ? $value->gyn_management : old('gyn_management')}}</textarea>
                                @if($errors->has('gyn_management'))
                                <span class="text-danger error">{{ $errors->first('gyn_management') }}</span>
                                @endif
                            </div>
                              <!--Follow Up Advice -->
                              <div class="prescription-field-area mb-4">
                                <label for="gyn_followup">Follow Up Advice</label>

                                <textarea class="form-control" name="gyn_followup"
                                    id="gyn_followup">{{isset($value->gyn_followup) ? $value->gyn_followup : old('gyn_followup')}}</textarea>
                                @if($errors->has('gyn_followup'))
                                <span class="text-danger error">{{ $errors->first('gyn_followup') }}</span>
                                @endif
                            </div>
                            <!-- Add Prescription Button  -->

                            <div class="py-3">
                                @if(isset($data->id))
                                <a class="baby-primary-btn"
                                    href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'pr_id'=>$data->id,'type' => 'gynaecology'])}}">+
                                    Add Prescriptions</a>
                                @else
                                <a class="baby-primary-btn disabled-link" href="#">+
                                    Add Prescriptions</a>
                                <span class="btn-info-bar">Save this Notes Information to Add Medicine</span>
                                @endif
                            </div>
                        </div>
                        <?php }
                        // Physiotherapy
                          else if($type == 'physiotherapy') { ?>
                         <div class="col-12 col-md-10 pb-5" >
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_date">Date</label>
                                <input class="form-control" type="date" id="prescription_date" name="prescription_date" value="{{isset($value->date) ? date('Y-m-d', strtotime($value->date)) : old('prescription_date')}}">
                            </div>
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_type">Type</label>
                                <input class="form-control" type="text" id="prescription_type" name="prescription_type" value="<?php echo ucfirst($type); ?>" readonly style="cursor: not-allowed">
                            </div>

                            <!--Impairment -->
                            <div class="prescription-field-area mb-4">
                                <label for="sb_impairment">Impairment </label>
                                <textarea class="form-control " name="sb_impairment"
                                    id="sb_impairment">{{isset($value->sb_impairment) ? $value->sb_impairment : old('sb_impairment')}}</textarea>
                                @if($errors->has('sb_impairment'))
                                <span class="text-danger error">{{ $errors->first('sb_impairment') }}</span>
                                @endif
                            </div>
                            <!-- Activities -->
                            <div class="prescription-field-area mb-4">
                                <label for="sb_activities">Activities</label>
                                <textarea class="form-control " name="sb_activities"
                                    id="sb_activities">{{isset($value->sb_activities) ? $value->sb_activities : old('sb_activities')}}</textarea>
                                @if($errors->has('sb_activities'))
                                <span class="text-danger error">{{ $errors->first('sb_activities') }}</span>
                                @endif
                            </div>
                            <!-- Participation -->
                            <div class="prescription-field-area mb-4">
                                <label for="sb_participation">Participation</label>
                                <textarea class="form-control " name="sb_participation"
                                    id="sb_participation">{{isset($value->sb_participation) ? $value->sb_participation : old('sb_participation')}}</textarea>
                                @if($errors->has('diagnosis'))
                                <span class="text-danger error">{{ $errors->first('sb_participation') }}</span>
                                @endif
                            </div>
                              <!-- Environment -->
                              <div class="prescription-field-area mb-4">
                                <label for="sb_environment">Environment</label>

                                <textarea class="form-control" name="sb_environment"
                                    id="sb_environment">{{isset($value->sb_environment) ? $value->sb_environment : old('sb_environment')}}</textarea>
                                @if($errors->has('sb_environment'))
                                <span class="text-danger error">{{ $errors->first('sb_environment') }}</span>
                                @endif
                            </div>
                              <!-- General Observation -->
                              <div class="prescription-field-area mb-4">
                                <label for="gyn_followup">General Observation
                                </label>

                                <textarea class="form-control" name="sb_general_observation"
                                    id="sb_general_observation">{{isset($value->sb_general_observation) ? $value->sb_general_observation : old('sb_general_observation')}}</textarea>
                                @if($errors->has('sb_general_observation'))
                                <span class="text-danger error">{{ $errors->first('sb_general_observation') }}</span>
                                @endif
                            </div>
                            <!-- Add Prescription Button  -->

                            <div class="py-3">
                                @if(isset($data->id))
                                <a class="baby-primary-btn"
                                    href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'pr_id'=>$data->id,'type' => 'physiotherapy'])}}">+                                   Add Prescriptions</a>
                                @else
                                <a class="baby-primary-btn disabled-link" href="#">+
                                    Add Prescriptions</a>
                                <span class="btn-info-bar">Save this Notes Information to Add Medicine</span>
                                @endif
                            </div>
                        </div>
                        <?php }
                        // Women Wellness
                        else if($type == 'women_wellness') { ?>
                         <div class="col-12 col-md-10 pb-5" >
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_date">Date</label>
                                <input class="form-control" type="date" id="prescription_date" name="prescription_date" value="{{isset($value->date) ? date('Y-m-d', strtotime($value->date)) : old('prescription_date')}}">
                            </div>
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_type">Type</label>
                                <input class="form-control" type="text" id="prescription_type" name="prescription_type" value="Women Wellness" readonly style="cursor: not-allowed">
                            </div>

                            <!--Chief Complaints -->
                            <div class="prescription-field-area mb-4">
                                <label for="women_wellness_chief_complaints">Chief Complaints </label>
                                <textarea class="form-control " name="women_wellness_chief_complaints"
                                    id="women_wellness_chief_complaints">{{isset($value->women_wellness_chief_complaints) ? $value->women_wellness_chief_complaints : old('women_wellness_chief_complaints')}}</textarea>
                                @if($errors->has('women_wellness_chief_complaints'))
                                <span class="text-danger error">{{ $errors->first('women_wellness_chief_complaints') }}</span>
                                @endif
                            </div>
                            <!-- Past Medical History -->
                            <div class="prescription-field-area mb-4">
                                <label for="women_wellness_past_medical_history">Past Medical History</label>
                                <textarea class="form-control " name="women_wellness_past_medical_history"
                                    id="women_wellness_past_medical_history">{{isset($value->women_wellness_past_medical_history) ? $value->women_wellness_past_medical_history : old('women_wellness_past_medical_history')}}</textarea>
                                @if($errors->has('women_wellness_past_medical_history'))
                                <span class="text-danger error">{{ $errors->first('women_wellness_past_medical_history') }}</span>
                                @endif
                            </div>
                            <!-- Diagnosis -->
                            <div class="prescription-field-area mb-4">
                                <label for="women_wellness_diagnosis">Diagnosis</label>
                                <textarea class="form-control " name="women_wellness_diagnosis"
                                    id="women_wellness_diagnosis">{{isset($value->women_wellness_diagnosis) ? $value->women_wellness_diagnosis : old('women_wellness_diagnosis')}}</textarea>
                                @if($errors->has('women_wellness_diagnosis'))
                                <span class="text-danger error">{{ $errors->first('women_wellness_diagnosis') }}</span>
                                @endif
                            </div>
                              <!-- Management -->
                              <div class="prescription-field-area mb-4">
                                <label for="women_wellness_management">Management</label>

                                <textarea class="form-control" name="women_wellness_management"
                                    id="women_wellness_management">{{isset($value->women_wellness_management) ? $value->women_wellness_management : old('women_wellness_management')}}</textarea>
                                @if($errors->has('women_wellness_management'))
                                <span class="text-danger error">{{ $errors->first('women_wellness_management') }}</span>
                                @endif
                            </div>

                            <!-- Add Prescription Button  -->

                            <div class="py-3">
                                @if(isset($data->id))
                                <a class="baby-primary-btn"
                                    href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'pr_id'=>$data->id,'type' => 'women_wellness'])}}">+
                                    Add Prescriptions</a>
                                @else
                                <a class="baby-primary-btn disabled-link" href="#">+
                                    Add Prescriptions</a>
                                <span class="btn-info-bar">Save this Notes Information to Add Medicine</span>
                                @endif
                            </div>
                        </div>
                        <?php }
                        else {?>
                          <div class="col-12 col-md-10 pb-5" >
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_date">Date</label>
                                <input class="form-control" type="date" id="prescription_date" name="prescription_date" value="{{isset($value->date) ? date('Y-m-d', strtotime($value->date)) : date('Y-m-d')}}">
                            </div>
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_type">Type</label>
                                <input class="form-control" type="text" id="prescription_type" name="prescription_type" value="<?php echo ucfirst($type); ?>" readonly style="cursor: not-allowed">
                            </div>
                            <div class="prescription-field-area mb-5">
                                <label for="prescription_type">Type</label>
                            <select id="prescription_type" name="prescription_type" class="form-select" aria-label="select type"
                            required>
                            <option value="">Select Type</option>
                            <option value="pediatric" {{ ($type == 'pediatric') ? 'selected' : '' }}>Pediatric</option>
                            <option value="dental" {{ ($type == 'dental') ? 'selected' : '' }}>Dental</option>
                            <option value="gynaecology" {{ ($type == 'gynaecology') ? 'selected' : '' }}>Gynaecology</option>
                            <option value="physiotherapy" {{ ($type == 'physiotherapy') ? 'selected' : '' }}>Physiotherapy</option>
                            <option value="women_wellness" {{ ($type == 'women_wellness') ? 'selected' : '' }}>Women Wellness</option>
                            <option value="general" {{ ($type == 'general') ? 'selected' : '' }}>General</option>
                        </select>
                    </div>
                            <!-- Chief Complaint -->
                            <div class="prescription-field-area mb-4">
                                <label for="chief_complaints">Chief Complaints </label>
                                <textarea class="form-control " name="chief_complaints"
                                    id="chief_complaints">{{isset($value->chief_complaints) ? $value->chief_complaints : old('chief_complaints')}}</textarea>
                                @if($errors->has('chief_complaints'))
                                <span class="text-danger error">{{ $errors->first('chief_complaints') }}</span>
                                @endif
                            </div>
                            <!-- Clinical Finding -->
                            <div class="prescription-field-area mb-4">
                                <label for="clinical_finding">Clinical Finding</label>
                                <textarea class="form-control " name="clinical_finding"
                                    id="clinical_finding">{{isset($value->clinical_finding) ? $value->clinical_finding : old('clinical_finding')}}</textarea>
                                @if($errors->has('clinical_finding'))
                                <span class="text-danger error">{{ $errors->first('clinical_finding') }}</span>
                                @endif
                            </div>
                            <!-- Diagnosis -->
                            <div class="prescription-field-area mb-4">
                                <label for="Daignosis">Diagnosis</label>
                                <textarea class="form-control " name="diagnosis"
                                    id="diagnosis">{{isset($value->diagnosis) ? $value->diagnosis : old('diagnosis')}}</textarea>
                                @if($errors->has('diagnosis'))
                                <span class="text-danger error">{{ $errors->first('diagnosis') }}</span>
                                @endif
                            </div>
                            <!-- Treatment -->
                            <div class="prescription-field-area mb-4">
                                <label for="treatment">Treatment</label>
                                <textarea class="form-control" name="treatment"
                                    id="treatment">{{isset($value->treatment) ? $value->treatment : old('treatment')}}</textarea>
                                @if($errors->has('treatment'))
                                <span class="text-danger error">{{ $errors->first('treatment') }}</span>
                                @endif
                            </div>
                            <div class="prescription-field-area mb-4">
                                <label for="follow_up_advice">Follow Up Advice</label>

                                <textarea class="form-control" name="follow_up_advice"
                                    id="follow_up_advice">{{isset($value->follow_up_advice) ? $value->follow_up_advice : old('follow_up_advice')}}</textarea>
                                @if($errors->has('follow_up_advice'))
                                <span class="text-danger error">{{ $errors->first('follow_up_advice') }}</span>
                                @endif
                            </div>
                            <!-- Add Prescription Button  -->

                            <div class="py-3">
                                @if(isset($data->id))
                                <a class="baby-primary-btn"
                                    href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'pr_id'=>$data->id,'type' => 'general'])}}">+
                                    Add Prescriptions</a>
                                @else
                                <a class="baby-primary-btn disabled-link" href="#">+
                                    Add Prescriptions</a>
                                <span class="btn-info-bar">Save this Notes Information to Add Medicine</span>
                                @endif
                            </div>
                        </div>
                        <?php } ?>

                    </div>
                </div>
                @if(isset($medicine) && ($medicine!=''))

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-12">
                        <div class="prescription-table py-3">
                            <h3 class="">Drug and Prescription</h3>
                            <div class="table-responsive py-3">
                                <table class="table">
                                    <thead class="table-light bg-color-v1">add-new-prescription-btn
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
                                        @foreach($medicine as $p_medicine)
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
                                        $list_name   = (isset($medicine_details->name)) ? ($medicine_details->name) : ucfirst($p_medicine->prescription_name);

                                        @endphp

                                        <tr>
                                            <th scope="row" class="text-center">{{$inc}}</th>
                                            <td><b>{{ $list_name }}</b></td>
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

                    </div>
                </div>
                @endif

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
