@extends('base.doctor-dashboard')
@section('doctor-content')
@php
$appointment = $appoinment;
$get = isset($getdata->gynaecology) ? json_decode($getdata->gynaecology) : [];
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
                    <h2 class="mb-0">Gynaecology Case Record</h2>
                </div>
            </div>
        </div>
        {{-- Common Patient Profile Start --}}
        @include('pages.doctor.patient.common-patient-profile')
        {{-- Common Patient Profile Start --}}
        <form action="{{ route('doctor.patient.gynaecology_case_record.post', $patient->id) }}" method="POST">
            @csrf
            <input type="hidden" name="app_status" value="{{ $app_status }}">
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
            <div class="row py-5 my-5 mx-0 pediatric-form-fields ">
                <div id="gyn_chief_complaints" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_chief_complaints"
                        class="form-label">CHIEF COMPLAINTS : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_chief_complaints" name="gyn_chief_complaints"><?php if(isset($get->gyn_chief_complaints)) { echo $get->gyn_chief_complaints; } ?></textarea>
                </div>
                <div id="gyn_history_present_illness" class="col-12 col-lg-8 col-xl-7 "> <label
                        for="gyn_history_present_illness" class="form-label">HISTORY OF PRESENT ILLNESS : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_history_present_illness"
                        name="gyn_history_present_illness"><?php if(isset($get->gyn_history_present_illness)) { echo $get->gyn_history_present_illness; } ?>
                    </textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_obstetric_history"
                        class="mt-5 pt-5 mb-4">OBSTETRIC HISTORY : </label></div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="gyn_year_of_marriage" class="form-label">Year Of
                            Marriage </label> <input type="text" class="form-field" id="gyn_year_of_marriage"
                            name="gyn_year_of_marriage" value="<?php if (isset($get->gyn_year_of_marriage)) { echo $get->gyn_year_of_marriage;} ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="gyn_obstetric_score" class="form-label">Obstetric Score
                            </label> <input type="text" class="form-field" id="gyn_obstetric_score"
                            name="gyn_obstetric_score" value="<?php if (isset($get->gyn_obstetric_score)) { echo $get->gyn_obstetric_score;} ?>"><span class="ps-2"> </span></div>
                </div>

                <div id="gyn_menstrual_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_menstrual_history"
                        class="form-label">Menstrual History : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_menstrual_history" name="gyn_menstrual_history"><?php if (isset($get->gyn_menstrual_history)) { echo $get->gyn_menstrual_history;} ?></textarea>
                </div>

                <div id="gyn_contraceptive_history" class="col-12 col-lg-8 col-xl-7 "> <label
                        for="gyn_contraceptive_history" class="form-label">Contraceptive History : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_contraceptive_history" name="gyn_contraceptive_history"><?php if (isset($get->gyn_contraceptive_history)) { echo $get->gyn_contraceptive_history;} ?></textarea>
                </div>

                <div id="gyn_past_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_past_history"
                        class="form-label">Past History : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_past_history" name="gyn_past_history"><?php if (isset($get->gyn_past_history)) { echo $get->gyn_past_history;} ?></textarea>
                </div>

                <div id="gyn_family_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_family_history"
                        class="form-label">Family History : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_family_history" name="gyn_family_history"><?php if (isset($get->gyn_family_history)) { echo $get->gyn_family_history;} ?></textarea>
                </div>

                <div id="gyn_personal_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_personal_history"
                        class="form-label">Personal History : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_personal_history" name="gyn_personal_history"><?php if (isset($get->gyn_personal_history)) { echo $get->gyn_personal_history;} ?></textarea>
                </div>

                <div id="gyn_treatment_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_treatment_history"
                        class="form-label">Treatment History : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_treatment_history" name="gyn_treatment_history"><?php if (isset($get->gyn_treatment_history)) { echo $get->gyn_treatment_history;} ?></textarea>
                </div>

                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_physical_examination"
                        class="mt-5 pt-5 mb-4">PHYSICAL EXAMINATION : </label></div>

                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_general_examination"
                        class="mt-5 pt-5 mb-4">GENERAL EXAMINATION : </label></div>

                <div id="" class="col-12 col-lg-6 ">
                    <div class="field-with-suffix my-5"> <label for="gyn_height" class="form-label">Height</label>
                        <input type="text" class="form-field" id="gyn_height" name="gyn_height" value="<?php if (isset($get->gyn_height)) { echo $get->gyn_height;} ?>"><span
                            class="ps-2"> </span></div>
                </div>

                <div id="" class="col-12 col-lg-6">
                    <div class="field-with-suffix my-5"> <label for="gyn_weight" class="form-label">Weight</label>
                        <input type="text" class="form-field" id="gyn_weight" name="gyn_weight" value="<?php if (isset($get->gyn_weight)) { echo $get->gyn_weight;} ?>"><span
                            class="ps-2"> </span></div>
                </div>

                <div id="" class="col-12 col-lg-8 col-lg-7 "> <label for="gyn_vitals_label"
                        class="mt-5 py-5">Vitals </label></div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_pr" class="form-label">PR</label>
                        <input type="text" class="form-field" id="gyn_vitals_pr" name="gyn_vitals_pr"
                            value="<?php if (isset($get->gyn_vitals_pr)) { echo $get->gyn_vitals_pr;} ?>"><span class="ps-2"> bpm</span></div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_pb" class="form-label">PB </label>
                        <input type="text" class="form-field" id="gyn_vitals_pb" name="gyn_vitals_pb"
                            value="<?php if (isset($get->gyn_vitals_pb)) { echo $get->gyn_vitals_pb;} ?>"><span class="ps-2"> mm Hg</span></div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_rr" class="form-label">RR </label>
                        <input type="text" class="form-field" id="gyn_vitals_rr" name="gyn_vitals_rr"
                            value="<?php if (isset($get->gyn_vitals_rr)) { echo $get->gyn_vitals_rr;} ?>"><span class="ps-2"> pm</span></div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_spo2" class="form-label">SPO2 </label>
                        <input type="text" class="form-field" id="gyn_vitals_spo2" name="gyn_vitals_spo2"
                            value="<?php if (isset($get->gyn_vitals_spo2)) { echo $get->gyn_vitals_spo2;} ?>"><span class="ps-2"> %</span></div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_temp" class="form-label">Temp</label>
                        <input type="text" class="form-field" id="gyn_vitals_temp" name="gyn_vitals_temp"
                            value="<?php if (isset($get->gyn_vitals_temp)) { echo $get->gyn_vitals_temp;} ?>"><span class="ps-2"> ℉</span></div>
                </div>

                <div id="" class="col-12 col-lg-8 col-lg-7 "> <label for="gyn_thyroid_exam_label"
                        class="mt-5 py-5">THYROID EXAMINATION </label></div>

                <div id="" class="col-12 col-lg-8 col-lg-7 "> <label for="gyn_breast_exam_label"
                        class="mt-5 py-5">Breast Examination </label></div>

                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="gyn_cvs" class="form-label">CVS</label> <input
                            type="text" class="form-field" id="gyn_cvs" name="gyn_cvs" value="<?php if (isset($get->gyn_cvs)) { echo $get->gyn_cvs;} ?>"><span
                            class="ps-2"> </span></div>
                </div>

                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="gyn_rs" class="form-label">RS</label> <input
                            type="text" class="form-field" id="gyn_rs" name="gyn_rs" value="<?php if (isset($get->gyn_rs)) { echo $get->gyn_rs;} ?>"><span
                            class="ps-2"> </span></div>
                </div>

                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix my-5"> <label for="gyn_pa" class="form-label">P/A</label> <input
                            type="text" class="form-field" id="gyn_pa" name="gyn_pa" value="<?php if (isset($get->gyn_pa)) { echo $get->gyn_pa;} ?>"><span
                            class="ps-2"> </span></div>
                </div>

                <div id="gyn_obstertric_exam" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_obstertric_exam"
                        class="form-label">Obstertric Examination : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_obstertric_exam" name="gyn_obstertric_exam"><?php if (isset($get->gyn_obstertric_exam)) { echo $get->gyn_obstertric_exam;} ?></textarea>
                </div>

                <div id="gyn_pelvic_exam" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_pelvic_exam"
                        class="form-label">Pelvic Examination : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_pelvic_exam" name="gyn_pelvic_exam"><?php if (isset($get->gyn_pelvic_exam)) { echo $get->gyn_pelvic_exam;} ?></textarea>
                </div>

                <div id="gyn_diagnosis" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_diagnosis"
                        class="form-label">Diagnosis : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_diagnosis" name="gyn_diagnosis"><?php if (isset($get->gyn_diagnosis)) { echo $get->gyn_diagnosis;} ?></textarea>
                </div>

                <div id="gyn_management" class="col-12 col-lg-8 col-xl-7 ">
                     <label for="gyn_management"
                        class="form-label">Management : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_management" name="gyn_management"><?php if (isset($get->gyn_management)) { echo $get->gyn_management;} ?></textarea>
                </div>
                <div class="col-12 col-lg-4 col-xl-5">
                    <div class="d-flex justify-content-start align-items-center gap-4 my-5 pt-1">
                        <?php if(isset($getdata->id)) { ?>
                        <a class="baby-primary-btn mt-3"
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

                <div id="gyn_followup" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_followup"
                        class="form-label">Follow-Up Days : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_followup" name="gyn_followup"><?php if (isset($get->gyn_followup)) { echo $get->gyn_followup;} ?></textarea>
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
