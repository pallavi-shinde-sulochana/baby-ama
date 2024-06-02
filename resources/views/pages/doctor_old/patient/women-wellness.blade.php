@extends('base.doctor-dashboard')
@section('doctor-content')
@php
$appointment = $appoinment;
$get = isset($getdata->women_wellness) ? json_decode($getdata->women_wellness) : [];
@endphp
    <section class="doctor-patinet-appointment pt-5">
        <div class="header mb-5">
            <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
                <div class="col-1 position-absolute">
                    <a href="{{ URL::previous() }}">
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
                    <h2 class="mb-0">Women Wellness</h2>
                </div>
            </div>
        </div>
        {{-- Common Patient Profile Start --}}
        @include('pages.doctor.patient.common-patient-profile')
        {{-- Common Patient Profile Start --}}
        <form action="{{ route('doctor.patient.women_wellness.post', $patient->id) }}" method="POST">
            @csrf

            <input type="hidden" name="app_status" value="{{ $app_status }}">
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
            <div class="row py-5 my-5 mx-0 pediatric-form-fields ">


                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="women_wellness_doa"
                        class="form-label">DATE OF ASSESSMENT  </label>
                    <textarea rows="" class="form-control" id="women_wellness_doa" name="women_wellness_doa"><?php if (isset($get->women_wellness_doa)) { echo $get->women_wellness_doa;} ?></textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="women_wellness_chief_complaints"
                        class="form-label">CHIEF COMPLAINTS  </label>
                    <textarea rows="" class="form-control" id="women_wellness_chief_complaints"
                        name="women_wellness_chief_complaints"><?php if (isset($get->women_wellness_chief_complaints)) { echo $get->women_wellness_chief_complaints;} ?></textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="women_wellness_past_medical_history"
                        class="form-label">PAST MEDICAL HISTORY  </label>
                    <textarea rows="" class="form-control" id="women_wellness_past_medical_history"
                        name="women_wellness_past_medical_history"><?php if (isset($get->women_wellness_past_medical_history)) { echo $get->women_wellness_past_medical_history;} ?></textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="women_wellness_personal_history"
                        class="form-label">PERSONAL HISTORY  </label>
                    <textarea rows="" class="form-control" id="women_wellness_personal_history"
                        name="women_wellness_personal_history"><?php if (isset($get->women_wellness_personal_history)) { echo $get->women_wellness_personal_history;} ?></textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="women_wellness_treatment_history"
                        class="form-label">TREATMENT HISTORY  </label>
                    <textarea rows="" class="form-control " id="women_wellness_treatment_history"
                        name="women_wellness_treatment_history"><?php if (isset($get->women_wellness_treatment_history)) { echo $get->women_wellness_treatment_history;} ?></textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="vital_signs_label"
                        class="mt-5 pt-5 mb-4">VITAL SIGNS </label></div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="women_wellness_hr" class="form-label">HR  </label>
                        <input type="text" class="form-field" id="women_wellness_hr" name="women_wellness_hr"
                            value="<?php if (isset($get->women_wellness_hr)) { echo $get->women_wellness_hr;} ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="women_wellness_bp" class="form-label">BP  </label>
                        <input type="text" class="form-field" id="women_wellness_bp" name="women_wellness_bp"
                            value="<?php if (isset($get->women_wellness_bp)) { echo $get->women_wellness_bp;} ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="women_wellness_rr" class="form-label">RR  </label>
                        <input type="text" class="form-field" id="women_wellness_rr" name="women_wellness_rr"
                            value="<?php if (isset($get->women_wellness_rr)) { echo $get->women_wellness_rr;} ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="women_wellness_temp" class="form-label">TEMP  </label>
                        <input type="text" class="form-field" id="women_wellness_temp" name="women_wellness_temp"
                            value="<?php if (isset($get->women_wellness_temp)) { echo $get->women_wellness_temp;} ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="women_wellness_spo2" class="form-label">SPO2
                        </label> <input type="text" class="form-field" id="women_wellness_spo2"
                            name="women_wellness_spo2" value="<?php if (isset($get->women_wellness_spo2)) { echo $get->women_wellness_spo2;} ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="objective_label"
                        class="mt-5 pt-5 mb-4">OBJECTIVE </label></div>
                        <div class="col-md-9 p-2">  <label for="women_wellness_observation_built"
                            class="form-label">ON OBSERVATION BUILT  </label> <textarea rows="" class="form-control"
                            id="women_wellness_observation_built" name="women_wellness_observation_built"><?php if (isset($get->women_wellness_observation_built)) { echo $get->women_wellness_observation_built;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"> <label for="women_wellness_posture" class="form-label">POSTURE
                        </label> <textarea rows="" class="form-control" id="women_wellness_posture"
                            name="women_wellness_posture" ><?php if (isset($get->women_wellness_posture)) { echo $get->women_wellness_posture;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="women_wellness_gait" class="form-label">GAIT
                        </label> <textarea rows="" class="form-control" id="women_wellness_gait"
                            name="women_wellness_gait" ><?php if (isset($get->women_wellness_gait)) { echo $get->women_wellness_gait;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"> <label for="women_wellness_muscle_wasting"
                            class="form-label">MUSCLE WASTING  </label> <textarea rows="" class="form-control"
                            id="women_wellness_muscle_wasting" name="women_wellness_muscle_wasting" ><?php if (isset($get->women_wellness_muscle_wasting)) { echo $get->women_wellness_muscle_wasting;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"> <label for="women_wellness_others" class="form-label">OTHERS
                        </label> <textarea rows=""  class="form-control" id="women_wellness_others"
                            name="women_wellness_others"><?php if (isset($get->women_wellness_others)) { echo $get->women_wellness_others;} ?></textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="on_examination"
                        class="mt-5 pt-5 mb-4">ON EXAMINATION </label></div>
                        <div class="col-md-9 p-2"> <label for="women_wellness_muscle_exam"
                            class="form-label">MUSCULOSKELETAL EXAMINATION  </label> <textarea rows=""
                            class="form-control" id="women_wellness_muscle_exam" name="women_wellness_muscle_exam"
                            ><?php if (isset($get->chief_complaints)) { echo $get->chief_complaints;} ?></textarea>
                    </div>
                <div class="col-md-9 p-2"><label for="women_wellness_neuro_exam"
                            class="form-label">NEUROLOGICAL EXAMINATION  </label> <textarea rows=""
                            class="form-control" id="women_wellness_neuro_exam" name="women_wellness_neuro_exam"
                            ><?php if (isset($get->women_wellness_neuro_exam)) { echo $get->women_wellness_neuro_exam;} ?></textarea>
                </div>
                <div class="col-md-9 p-2">
                     <label for="women_wellness_bladder_bowel_exam"
                            class="form-label">BLADDER &amp; BOWEL EXAMINATION  </label> <textarea rows=""
                            class="form-control" id="women_wellness_bladder_bowel_exam"
                            name="women_wellness_bladder_bowel_exam" ><?php if (isset($get->women_wellness_bladder_bowel_exam)) { echo $get->women_wellness_bladder_bowel_exam;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"> <label for="women_wellness_other_system_exam"
                            class="form-label">OTHER SYSTEM EXAMINATION  </label> <textarea rows=""
                            class="form-control" id="women_wellness_other_system_exam"
                            name="women_wellness_other_system_exam" ><?php if (isset($get->women_wellness_other_system_exam)) { echo $get->women_wellness_other_system_exam;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="women_wellness_onvestogatopms"
                            class="form-label">ONVESTOGATOPMS OF ANY  </label> <textarea rows="" class="form-control"
                            id="women_wellness_onvestogatopms" name="women_wellness_onvestogatopms" ><?php if (isset($get->women_wellness_onvestogatopms)) { echo $get->women_wellness_onvestogatopms;} ?></textarea>
                </div>
                <div class="col-md-9 p-2">
                    <label for="women_wellness_assessed_by" class="form-label">ASSESSED BY </label> <textarea rows=""  class="form-control"
                id="women_wellness_assessed_by" name="women_wellness_assessed_by" ><?php if (isset($get->women_wellness_assessed_by)) { echo $get->women_wellness_assessed_by;} ?></textarea>
            </div>
            <div class="col-12 col-md-3 col-lg-4 col-xl-5">
                <div class="d-flex justify-content-start align-items-center gap-4 my-5">
                    <?php if(isset($getdata->id)) { ?>
                    <a class="baby-primary-btn"
                        href="{{ route('doctor.appointment.patient.prescription.medicine', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id, 'pr_id' => $getdata->id]) }}">+
                        Add Prescriptions</a>
                        <?php } else { ?>
                            <div class="tooltip1">

             <a class="baby-primary-btn" href="#">+  Add Prescriptions</a>
                            <span class="tooltip_text">Please update the paediatric case record form</span>
                            </div>
                            <?php } ?>
                </div>
            </div>
            </div>
            <div class="d-flex justify-content-start align-items-center gap-4 mb-5">

                <a type="button" href="{{ route('doctor.appointments') }}"
                    class="baby-secondary-btn border-1 text-center" data-bs-dismiss="modal">Cancel</a>

                    <?php if ($app_status=='assigned') { ?>
                        <button type="submit" class="baby-primary-btn">Save</button>
                        <?php } ?>
            </div>

        </form>


    </section>
@endsection
