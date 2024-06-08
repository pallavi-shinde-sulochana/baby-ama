@extends('base.doctor-dashboard')
@section('doctor-content')
    @php
        $appointment = $appoinment;
        $get = isset($getdata->gynaecology) ? json_decode($getdata->gynaecology) : [];
        $id = $appointment->id;

    @endphp

    <section class="doctor-patinet-appointment pt-5">
        <div class="header mb-5">
            <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
                <div class="col-1 position-absolute">
                    <a href="{{route('doctor.appointment.patient',$id)}}">
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
            <input type="hidden" name="date" value="{{ date('Y-m-d H:i:s') }}">

            <div class="row py-5 my-5 mx-0 pediatric-form-fields ">
                <div id="gyn_chief_complaints" class="col-12 col-lg-7 "> <label for="gyn_chief_complaints"
                        class="form-label">CHIEF COMPLAINTS : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_chief_complaints" name="gyn_chief_complaints"><?php if (isset($get->gyn_chief_complaints)) {
                        echo $get->gyn_chief_complaints;
                    } ?></textarea>
                </div>
                <div class="col-12 col-lg-5">
                    <div class="field-with-suffix mb-5">
                        <label style="min-width:100px;" for="gyn_edc" class="form-label ">EDC</label>
                        <input type="text" class="form-field" id="gyn_edc" name="gyn_edc" value="<?php if (isset($get->gyn_edc)) {
                            echo $get->gyn_edc;
                        } ?>">
                    </div>
                    <div class="field-with-suffix mb-5">
                        <label style="min-width:100px;" for="gyn_scan_edc" class="form-label ">SCAN EDC</label>
                        <input type="text" class="form-field" id="gyn_scan_edc" name="gyn_scan_edc"
                            value="<?php if (isset($get->gyn_scan_edc)) {
                                echo $get->gyn_scan_edc;
                            } ?>">
                    </div>
                </div>

                <div id="gyn_history_present_illness" class="col-12 col-lg-8 col-xl-7 "> <label
                        for="gyn_history_present_illness" class="form-label">HISTORY OF PRESENT ILLNESS : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_history_present_illness"
                        name="gyn_history_present_illness"><?php if (isset($get->gyn_history_present_illness)) {
                            echo $get->gyn_history_present_illness;
                        } ?>
                    </textarea>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_obstetric_history"
                        class="mt-5 pt-5 mb-4">OBSTETRIC HISTORY : </label></div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="gyn_year_of_marriage" class="form-label">Year Of
                            Marriage </label> <input type="text" class="form-field" id="gyn_year_of_marriage"
                            name="gyn_year_of_marriage" value="<?php if (isset($get->gyn_year_of_marriage)) {
                                echo $get->gyn_year_of_marriage;
                            } ?>"><span class="ps-2"> </span></div>
                </div>
                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <div class="field-with-suffix mb-5"> <label for="gyn_obstetric_score" class="form-label">Obstetric Score
                        </label> <input type="text" class="form-field" id="gyn_obstetric_score"
                            name="gyn_obstetric_score" value="<?php if (isset($get->gyn_obstetric_score)) {
                                echo $get->gyn_obstetric_score;
                            } ?>"><span class="ps-2"> </span></div>
                </div>


                <div id="gyn_menstrual_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_menstrual_history"
                        class="form-label">Menstrual History : </label>
                    <!-- lmp CHANGE-->
                    <div id="" class="col-12 col-lg-8 col-xl-7 pt-3">
                        <div class="field-with-suffix mb-5"> <label for="gyn_obstetric_score" class="form-label">LMP
                            </label> <input type="text" class="form-field" id="gyn_obstetric_score"
                                name="gyn_obstetric_score" value="<?php if (isset($get->gyn_obstetric_score)) {
                                    echo $get->gyn_obstetric_score;
                                } ?>"><span class="ps-2"> </span></div>
                    </div>

                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_menstrual_history" name="gyn_menstrual_history"><?php if (isset($get->gyn_menstrual_history)) {
                        echo $get->gyn_menstrual_history;
                    } ?></textarea>
                </div>

                <div id="gyn_contraceptive_history" class="col-12 col-lg-8 col-xl-7 "> <label
                        for="gyn_contraceptive_history" class="form-label">Contraceptive History : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_contraceptive_history"
                        name="gyn_contraceptive_history"><?php if (isset($get->gyn_contraceptive_history)) {
                            echo $get->gyn_contraceptive_history;
                        } ?></textarea>
                </div>

                <div id="gyn_past_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_past_history"
                        class="form-label">PAST MEDICAL & SURGICAL HISTORY : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_past_history" name="gyn_past_history"><?php if (isset($get->gyn_past_history)) {
                        echo $get->gyn_past_history;
                    } ?></textarea>
                </div>

                <div id="gyn_family_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_family_history"
                        class="form-label">FAMILY HISTORY : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_family_history" name="gyn_family_history"><?php if (isset($get->gyn_family_history)) {
                        echo $get->gyn_family_history;
                    } ?></textarea>
                </div>

                <div id="gyn_personal_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_personal_history"
                        class="form-label">PERSONAL HISTORY : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_personal_history" name="gyn_personal_history"><?php if (isset($get->gyn_personal_history)) {
                        echo $get->gyn_personal_history;
                    } ?></textarea>
                </div>

                <div id="gyn_treatment_history" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_treatment_history"
                        class="form-label">TREATMENT HISTORY : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_treatment_history" name="gyn_treatment_history"><?php if (isset($get->gyn_treatment_history)) {
                        echo $get->gyn_treatment_history;
                    } ?></textarea>
                </div>

                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_physical_examination"
                        class="mt-5 pt-5 mb-4">PHYSICAL EXAMINATION : </label></div>

                <div id="" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_general_examination"
                        class="mt-5 pt-5 mb-4">GENERAL EXAMINATION : </label></div>

                <div id="" class="col-12 col-lg-6 ">
                    <div class="field-with-suffix my-5"> <label for="gyn_height" class="form-label">Height</label>
                        <input type="text" class="form-field" id="gyn_height" name="gyn_height"
                            value="<?php if (isset($get->gyn_height)) {
                                echo $get->gyn_height;
                            } ?>"><span class="ps-2">cm </span>
                    </div>
                </div>

                <div id="" class="col-12 col-lg-6">
                    <div class="field-with-suffix my-5"> <label for="gyn_weight" class="form-label">Weight</label>
                        <input type="text" class="form-field" id="gyn_weight" name="gyn_weight"
                            value="<?php if (isset($get->gyn_weight)) {
                                echo $get->gyn_weight;
                            } ?>"><span class="ps-2">kg </span>
                    </div>
                </div>

                <div id="" class="col-12 col-lg-8 col-lg-7 "> <label for="gyn_vitals_label"
                        class="mt-5 py-5">VITALS </label></div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_pr" class="form-label">PR</label>
                        <input type="text" class="form-field" id="gyn_vitals_pr" name="gyn_vitals_pr"
                            value="<?php if (isset($get->gyn_vitals_pr)) {
                                echo $get->gyn_vitals_pr;
                            } ?>"><span class="ps-2"> bpm</span>
                    </div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_pb" class="form-label">BP </label>
                        <input type="text" class="form-field" id="gyn_vitals_pb" name="gyn_vitals_pb"
                            value="<?php if (isset($get->gyn_vitals_pb)) {
                                echo $get->gyn_vitals_pb;
                            } ?>"><span class="ps-2"> mm Hg</span>
                    </div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_rr" class="form-label">RR </label>
                        <input type="text" class="form-field" id="gyn_vitals_rr" name="gyn_vitals_rr"
                            value="<?php if (isset($get->gyn_vitals_rr)) {
                                echo $get->gyn_vitals_rr;
                            } ?>"><span class="ps-2"> /min</span>
                    </div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_spo2" class="form-label">SPO2 </label>
                        <input type="text" class="form-field" id="gyn_vitals_spo2" name="gyn_vitals_spo2"
                            value="<?php if (isset($get->gyn_vitals_spo2)) {
                                echo $get->gyn_vitals_spo2;
                            } ?>"><span class="ps-2"> %</span>
                    </div>
                </div>

                <div id="" class="col-12">
                    <div class="field-with-suffix mb-5"> <label for="gyn_vitals_temp" class="form-label">Temp</label>
                        <input type="text" class="form-field" id="gyn_vitals_temp" name="gyn_vitals_temp"
                            value="<?php if (isset($get->gyn_vitals_temp)) {
                                echo $get->gyn_vitals_temp;
                            } ?>"><span class="ps-2"> ℉</span>
                    </div>
                </div>

                <div id="" class="col-12 col-lg-8 col-lg-7 "> <label for="gyn_thyroid_exam_label"
                        class="mt-5 py-5">Thyroid Examination:</label></div>

                <div id="" class="col-12 col-lg-8 col-lg-7 "> <label for="gyn_breast_exam_label"
                        class="mt-5 py-5">Breast Examination </label></div>

                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="gyn_cvs" class="form-label">CVS :</label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_cvs" name="gyn_cvs"><?php if (isset($get->gyn_cvs)) {
                        echo $get->gyn_cvs;
                    } ?></textarea>

                </div>

                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="gyn_rs" class="form-label">RS :</label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_rs" name="gyn_rs"><?php if (isset($get->gyn_rs)) {
                        echo $get->gyn_rs;
                    } ?></textarea>

                </div>

                <div id="" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="gyn_pa" class="form-label">P/A : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_pa" name="gyn_pa"><?php if (isset($get->gyn_pa)) {
                        echo $get->gyn_pa;
                    } ?></textarea>

                </div>

                <div id="gyn_obstertric_exam" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_obstertric_exam"
                        class="form-label">Obstertric Examination : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_obstertric_exam" name="gyn_obstertric_exam"><?php if (isset($get->gyn_obstertric_exam)) {
                        echo $get->gyn_obstertric_exam;
                    } ?></textarea>
                </div>

                <div id="gyn_pelvic_exam" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_pelvic_exam"
                        class="form-label">Pelvic Examination : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_pelvic_exam" name="gyn_pelvic_exam"><?php if (isset($get->gyn_pelvic_exam)) {
                        echo $get->gyn_pelvic_exam;
                    } ?></textarea>
                </div>

                <div id="gyn_diagnosis" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_diagnosis"
                        class="form-label">DIAGNOSIS : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_diagnosis" name="gyn_diagnosis"><?php if (isset($get->gyn_diagnosis)) {
                        echo $get->gyn_diagnosis;
                    } ?></textarea>
                </div>

                <div id="gyn_management" class="col-12 col-lg-8 col-xl-7 ">
                    <label for="gyn_management" class="form-label">MANAGEMENT : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_management" name="gyn_management"><?php if (isset($get->gyn_management)) {
                        echo $get->gyn_management;
                    } ?></textarea>
                </div>
                <div class="col-12 col-lg-4 col-xl-5">
                    <div class="d-flex justify-content-start align-items-center gap-4 my-5 pt-1">
                        <?php if(isset($getdata->id)) { ?>
                        <a class="baby-primary-btn mt-3"
                            href="{{ route('doctor.appointment.patient.prescription.medicine', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id, 'pr_id' => $getdata->id, 'type' => 'gynaecology']) }}">+
                            Add Prescriptions</a>
                        <?php } else { ?>
                        <div class="tooltip1">

                            <a class="baby-primary-btn" href="#">+ Add Prescriptions</a>
                            <span class="tooltip_text">Please update the paediatric case record form</span>
                        </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-12">
                    <div class="prescription-table py-3">
                        <h3 class="mb-5">Drug and Prescription</h3>
                        <div class="row mx-0">
                            <div class="col-12 col-md-7 px-0">
                                <div class="table-responsive py-3 w-5" id="mydiv">
                                    <table class="table">
                                        <thead class="table-light bg-color-v1">
                                            <tr>
                                                <th scope="col" class="text-center">S.No</th>
                                                <th scope="col" class="bg-color-v1">MEDICINE</th>
                                                <th scope="col" class="bg-color-v1 text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i=1; @endphp
                                            @foreach ($pres as $list_pres)
                                                @php
                                                    $list_medicine = App\Models\Medicine::find($list_pres->medicine_id);
    
                                                    $list_type   = (isset($list_medicine->type)) ? helperFormatMedicinePrefix($list_medicine->type) : '';
                                                    $list_name   = (isset($list_medicine->name)) ? ($list_medicine->name) : ucfirst($list_pres->prescription_name);
                                                    $list_dosage = (isset($list_medicine->dosage)) ? ($list_medicine->dosage) : '';
    
                                                @endphp
                                                <tr>
                                                    <th scope="row" class="text-center">{{ $i }}</th>
                                                    <td class=""> @if ($list_type)
                                                        {{ '(' . $list_type . ')' }}
                                                         @endif
                                                        {{ ($list_name) }}
                                                        @if ($list_dosage)
                                                            {{ '(' . $list_dosage . ')' }}
                                                        @endif
                                                    </td>
                                                    <td class="text-center">
                                                        <div class="d-flex">
                                                            <div class="w-50 d-flex justify-content-center align-items-center">
                                                                <button class="action-btn" data-bs-toggle="modal"
                                                                    data-bs-target="#EditMedPopModal<?php echo $list_pres->id; ?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" viewBox="0 0 16 16" fill="none">
                                                                        <path
                                                                            d="M10.9921 2.49662C11.1496 2.33917 11.3365 2.21428 11.5422 2.12907C11.7479 2.04386 11.9684 2 12.1911 2C12.4138 2 12.6342 2.04386 12.84 2.12907C13.0457 2.21428 13.2326 2.33917 13.39 2.49662C13.5475 2.65407 13.6724 2.84099 13.7576 3.04671C13.8428 3.25242 13.8867 3.47291 13.8867 3.69557C13.8867 3.91824 13.8428 4.13873 13.7576 4.34444C13.6724 4.55016 13.5475 4.73708 13.39 4.89453L5.29712 12.9875L2 13.8867L2.89921 10.5895L10.9921 2.49662Z"
                                                                            stroke="#667085" stroke-width="1.11111"
                                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                            <div class="w-50 d-flex justify-content-center align-items-center">
                                                                <button class="action-btn"
                                                                    onclick="deleteMedicine('<?php echo $list_pres->id; ?>');">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                        height="20" viewBox="0 0 16 16" fill="none">
                                                                        <path
                                                                            d="M2.66675 4.48933H3.91141M3.91141 4.48933H13.8687M3.91141 4.48933V13.202C3.91141 13.5321 4.04255 13.8487 4.27597 14.0821C4.50939 14.3155 4.82598 14.4467 5.15608 14.4467H11.3794C11.7095 14.4467 12.0261 14.3155 12.2595 14.0821C12.4929 13.8487 12.6241 13.5321 12.6241 13.202V4.48933H3.91141ZM5.77841 4.48933V3.24467C5.77841 2.91456 5.90955 2.59797 6.14297 2.36455C6.37639 2.13113 6.69297 2 7.02308 2H9.51241C9.84252 2 10.1591 2.13113 10.3925 2.36455C10.6259 2.59797 10.7571 2.91456 10.7571 3.24467V4.48933M7.02308 7.601V11.335M9.51241 7.601V11.335"
                                                                            stroke="#FF505B" stroke-width="1.11111"
                                                                            stroke-linecap="round" stroke-linejoin="round" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                @php $i++; @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="gyn_followup" class="col-12 col-lg-8 col-xl-7 "> <label for="gyn_followup"
                        class="form-label">FOLLOW-UP ADVICE : </label>
                    <textarea rows="" class="form-control mb-5 pb-5" id="gyn_followup" name="gyn_followup"><?php if (isset($get->gyn_followup)) {
                        echo $get->gyn_followup;
                    } ?></textarea>
                </div>

            </div>

            <div class="d-flex justify-content-start align-items-center gap-4 mb-5">

                <a type="button" href="{{ route('doctor.appointments') }}"
                    class="baby-secondary-btn border-1 text-center" data-bs-dismiss="modal">Cancel</a>

                {{-- <?php if ($app_status=='assigned') { ?> --}}
                <button type="submit" class="baby-primary-btn">Save</button>
                {{-- <?php } ?> --}}
            </div>
        </form>

    </section>
@endsection
