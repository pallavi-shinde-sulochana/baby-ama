@extends('base.doctor-dashboard')
@section('doctor-content')
@php
$appointment = $appoinment;
$get = isset($getdata->physiotherapy) ? json_decode($getdata->physiotherapy) : [];
@endphp
<style>
   .physiotherpahy-form .field-with-suffix .form-label{
        min-width: 250px;
    }
</style>
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
                    <h2 class="mb-0">Paediatric Physiotherapy</h2>
                </div>
            </div>
        </div>
        {{-- Common Patient Profile Start --}}
        @include('pages.doctor.patient.common-patient-profile')
        {{-- Common Patient Profile Start --}}
        <form action="{{ route('doctor.patient.physiotherapy.post', $patient->id) }}" method="POST">
            @csrf
            <input type="hidden" name="app_status" value="{{ $app_status }}">
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
            <div class="row py-5 my-5 mx-0 pediatric-form-fields physiotherpahy-form">
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="subjective_assessment"
                        class="mt-5 pt-5 mb-4">SUBJECTIVE ASSESSMENT :</label></div>
                        <div class="col-md-9 p-2">
                            <label for="sb_impairment" class="form-label">IMPAIRMENT</label>
                        <textarea  class="form-control " id="sb_impairment" name="sb_impairment"><?php if (isset($get->sb_impairment)) { echo $get->sb_impairment;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"> <label for="sb_activities" class="form-label">ACTIVITIES</label>
                    <textarea  class="form-control " id="sb_activities" name="sb_activities"><?php if (isset($get->sb_activities)) { echo $get->sb_activities;} ?></textarea>
                </div>
                <div class="col-md-9 p-2">
                     <label for="sb_participation" class="form-label">PARTICIPATION</label>
                        <textarea  class="form-control " id="sb_participation" name="sb_participation"><?php if (isset($get->sb_participation)) { echo $get->sb_participation;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="sb_environment" class="form-label">ENVIRONMENT
                        </label>  <textarea  class="form-control " id="sb_environment" name="sb_environment"><?php if (isset($get->sb_environment)) { echo $get->sb_environment;} ?></textarea>
                    </div>
                <div class="col-md-9 p-2"><label for="sb_general_observation" class="form-label">GENERAL
                            OBSERVATION</label>
                  <textarea  class="form-control " id="sb_general_observation" name="sb_general_observation"><?php if (isset($get->sb_general_observation)) { echo $get->sb_general_observation;} ?></textarea>
                        </div>
                        <div class="col-md-9 p-2"> <label for="objective_assessment"
                        class="mt-5 pt-5 mb-4">OBJECTIVE ASSESSMENT :</label></div>
                <div class="col-md-9 p-2"><label for="ob_activities" class="form-label">ACTIVITIES</label>
                    <textarea  class="form-control " id="ob_activities" name="ob_activities"><?php if (isset($get->ob_activities)) { echo $get->ob_activities;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="ob_attention" class="form-label">ATTENTION</label>
                    <textarea  class="form-control " id="ob_attention" name="ob_attention"><?php if (isset($get->ob_attention)) { echo $get->ob_attention;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="ob_logical_reasoning" class="form-label">LOGICAL
                            REASONING</label> <textarea  class="form-control " id="ob_logical_reasoning" name="ob_logical_reasoning"><?php if (isset($get->ob_logical_reasoning)) { echo $get->ob_logical_reasoning;} ?></textarea>
             </div>
                <div class="col-md-9 p-2"><label for="ob_memory" class="form-label">MEMORY</label>
                    <textarea  class="form-control " id="ob_memory" name="ob_memory"><?php if (isset($get->ob_memory)) { echo $get->ob_memory;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="ob_learning" class="form-label">LEARNING</label>
                    <textarea  class="form-control " id="ob_learning" name="ob_learning"><?php if (isset($get->ob_learning)) { echo $get->ob_learning;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_learning" class="form-label">CALCULATION</label>
                    <textarea  class="form-control " id="other_learning" name="other_learning"><?php if (isset($get->other_learning)) { echo $get->other_learning;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_posture" class="form-label">POSTURE</label>
                    <textarea  class="form-control " id="other_posture" name="other_posture"><?php if (isset($get->other_posture)) { echo $get->other_posture;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_balance_coorination" class="form-label">BALANCE &amp; CO-ORDINATION</label>
                    <textarea  class="form-control " id="other_balance_coorination" name="other_balance_coorination"><?php if (isset($get->other_balance_coorination)) { echo $get->other_balance_coorination;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_range_of_motion" class="form-label">RANGE OF MOTION</label>
                    <textarea  class="form-control " id="other_range_of_motion" name="other_range_of_motion"><?php if (isset($get->other_range_of_motion)) { echo $get->other_range_of_motion;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_gait" class="form-label">GAIT</label>
                    <textarea  class="form-control " id="other_gait" name="other_gait"><?php if (isset($get->other_gait)) { echo $get->other_gait;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_associated_problems" class="form-label">ASSOCIATED PROBLEMS</label>
                  <textarea  class="form-control " id="other_associated_problems" name="other_associated_problems"><?php if (isset($get->other_associated_problems)) { echo $get->other_associated_problems;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_provisional_diagnaosis" class="form-label">PROVISIONAL DIAGNOSIS</label>
                <textarea  class="form-control " id="other_provisional_diagnaosis" name="other_provisional_diagnaosis"><?php if (isset($get->other_provisional_diagnaosis)) { echo $get->other_provisional_diagnaosis;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="other_physiotheraphy_diagnaosis" class="form-label">PHYSIOTHERAPHY DIAGNOSIS</label>
                    <textarea  class="form-control " id="other_provisional_diagnaosis" name="other_provisional_diagnaosis"><?php if (isset($get->other_provisional_diagnaosis)) { echo $get->other_provisional_diagnaosis;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="phys_notes" class="form-label">NOTES</label>
                    <textarea  class="form-control " id="phys_notes" name="phys_notes"><?php if (isset($get->phys_notes)) { echo $get->phys_notes;} ?></textarea>
                </div>
                <div class="col-md-9 p-2"><label for="phys_assessed_by" class="form-label">ASSESSED BY </label>
                    <textarea  class="form-control " id="phys_assessed_by" name="phys_assessed_by"><?php if (isset($get->phys_assessed_by)) { echo $get->phys_assessed_by;} ?></textarea>
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