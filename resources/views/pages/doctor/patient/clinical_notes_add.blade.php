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
                    <a href="{{ route('doctor.appointment.patient', $id) }}" class="position-absolute top-0 start-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            fill="none">
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
            if (isset($get['type'])) {
                $typ = $get['type'];
            } else {
                $typ = '';
            }
            ?>
            {{-- <form
                action="{{ route('doctor.patient.clinical_notes.post', ['patient' => $user->patient->id]) }}"
                method="POST"> --}}
                <form
                action="{{ route('doctor.patient.clinical_notes.post', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id, 'type' => $typ]) }}"
                method="POST">
                @csrf
                <div class="head baby-shadow py-3 px-5 mb-4">
                    <div class="row px-5 py-4 align-items-center">
                        <div class="col-12 col-md-2">
                            <div class="patient-img d-flex justify-content-center align-items-center mx-auto">
                                <p class="name mb-0">
                                    {{ ucfirst(substr($user->first_name, 0, 1)) . ucfirst(substr($user->last_name, 0, 1)) }}
                                </p>
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
                                    <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Age</span><span
                                            class="val">{{ $user->patient->age }}</span></p>
                                @endif

                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="patient-info">
                                @if ($appoinment->doctor)
                                    <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Doctor
                                        </span><span
                                            class="val">{{ $appoinment->doctor->first_name .
                                                '
                                                                                                                                                                ' .
                                                $appoinment->doctor->last_name }}</span>
                                    </p>
                                @endif

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

                    </div>
                </div>
                <div class="row pediatric-form-fields prescriptionForm table-responsive">
                    <div class="col-md-8">

                        @if (isset($data->id))
                            <input type="hidden" name="id" value="{{ $data->id }}">
                        @endif
                        <div class="row p-2">
                            @php
                                // $type = $get['type'];
                                // $value = $get['value'];
                            @endphp

                            <div class="col-12 col-md-10 pb-5">
                                <div class="prescription-field-area mb-5">
                                    <label for="date">Date</label>
                                    <input class="form-control" type="date" id="date"
                                        name="date" value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="prescription-field-area mb-5">
                                    <label for="prescription_type">Type</label>
                                    <select id="prescription_type" name="prescription_type" class="form-select"
                                        aria-label="select type">
                                        <option value="general" selected>General</option>
                                        <option value="pediatric">Pediatric</option>
                                        <option value="dental">Dental</option>
                                        <option value="gynaecology">Gynaecology</option>
                                        <option value="physiotherapy">Physiotherapy</option>
                                        <option value="women_wellness">Women Wellness</option>
                                    </select>
                                </div>
                                <div class="element-wrapper" id="element-wrapper">
                                    <div class="genral-elements">
                                        <div class="prescription-field-area mb-4"> <label for="chief_complaints">Chief
                                                Complaints </label>
                                            <textarea class="form-control " name="chief_complaints" id="chief_complaints"></textarea>
                                        </div>
                                        <div class="prescription-field-area mb-4"> <label for="clinical_finding">Clinical
                                                Finding</label>
                                            <textarea class="form-control " name="clinical_finding" id="clinical_finding"></textarea>
                                        </div>
                                        <div class="prescription-field-area mb-4"> <label for="Daignosis">Diagnosis</label>
                                            <textarea class="form-control " name="diagnosis" id="diagnosis"></textarea>
                                        </div>
                                        <div class="prescription-field-area mb-4"> <label for="treatment">Treatment</label>
                                            <textarea class="form-control" name="treatment" id="treatment"></textarea>
                                        </div>
                                        <div class="prescription-field-area mb-4"> <label for="follow_up_advice">Follow Up
                                                Advice</label>
                                            <textarea class="form-control" name="follow_up_advice" id="follow_up_advice"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- Add Prescription Button  -->

                                <div class="py-3">
                                    @if (isset($data->id))
                                        <a class="baby-primary-btn"
                                            href="{{ route('doctor.appointment.patient.prescription.medicine', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id, 'pr_id' => $data->id, 'type' => 'general']) }}">+
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
                    @if (isset($medicine) && $medicine != '')
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
                                                    <th scope="col" class="bg-color-v1 text-center">RELATION TO FOOD
                                                    </th>
                                                    <th scope="col" class="bg-color-v1 text-center">FOLLOW UP’S
                                                        DAYS</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php $inc=0; @endphp
                                                @foreach ($medicine as $p_medicine)
                                                    @php
                                                        $inc++;
                                                        $frame_data = [
                                                            'id' => $p_medicine->id,
                                                            'medicine_id' => $p_medicine->medicine_id,
                                                            'total_qty' => $p_medicine->total_qty,
                                                            'intake_qty' => $p_medicine->intake_qty,
                                                            'timing_when' => $p_medicine->timing_when,
                                                            'timing_how' => $p_medicine->timing_how,
                                                            'duration' => $p_medicine->duration,
                                                        ];
                                                        $medicine_details = getMedcineDetail($p_medicine->medicine_id);
                                                        $list_name   = (isset($medicine_details->name)) ? ($medicine_details->name) : ucfirst($p_medicine->prescription_name);

                                                    @endphp

                                                    <tr>
                                                        <th scope="row" class="text-center">{{ $inc }}</th>
                                                        <td><b>{{ $list_name }}</b></td>
                                                        <td class="text-center">
                                                            {{ $p_medicine->intake_qty . ' ' . $p_medicine->dosage }}
                                                        </td>
                                                        <td class="text-center">{{ $p_medicine->timing_when }}</td>
                                                        <td class="text-center">{{ $p_medicine->timing_how }}</td>
                                                        <td class="text-center">{{ $p_medicine->duration }}</td>
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
                            <a type="button" href="{{ route('doctor.appointments') }}"
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
<script type="text/javascript">
    $(document).ready(function($) {
        function appendElementOnChange(typeVal) {
            console.log(typeVal);
            var eleWrap = $('#element-wrapper');
            if (typeVal == "general") {
                eleWrap.children().fadeOut(300, function() {
                    $(this).remove();
                    eleWrap.append(
                        '<div class="genral-elements" style="display: none;"><div class="prescription-field-area mb-4"><label for="chief_complaints">Chief Complaints </label> <textarea class="form-control " name="chief_complaints" id="chief_complaints"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="clinical_finding">Clinical Finding</label> <textarea class="form-control " name="clinical_finding" id="clinical_finding"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="Daignosis">Diagnosis</label> <textarea class="form-control " name="diagnosis" id="diagnosis"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="treatment">Treatment</label> <textarea class="form-control" name="treatment" id="treatment"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="follow_up_advice">Follow Up Advice</label> <textarea class="form-control" name="follow_up_advice" id="follow_up_advice"></textarea> </div> </div>'
                    ).children().fadeIn(300);
                });
            } else if (typeVal == "pediatric") {
                eleWrap.children().fadeOut(300, function() {
                    $(this).remove();
                    eleWrap.append(
                        '<div class="pediatric-elements"> <div class="prescription-field-area mb-4"> <label for="chief_complaints">Chief Complaints </label> <textarea class="form-control " name="chief_complaints" id="chief_complaints"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="h_o_pi">History Of Presenting Illness</label> <textarea class="form-control " name="h_o_pi" id="h_o_pi"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="diagnosis">Diagnosis</label> <textarea class="form-control " name="diagnosis" id="diagnosis"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="management">Management</label> <textarea class="form-control" name="management" id="management"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="follow_up_advice">Follow Up Advice</label> <textarea class="form-control" name="follow_up_advice" id="follow_up_advice"></textarea> </div> </div>'
                    ).children().fadeIn(300);
                });
            } else if (typeVal == "dental") {
                eleWrap.children().fadeOut(300, function() {
                    $(this).remove();
                    eleWrap.append(
                        '<div class="dental-elements"> <div class="prescription-field-area mb-4"> <label for="chief_complaints">Chief Complaints </label> <textarea class="form-control " name="chief_complaints" id="chief_complaints"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="h_o_presenting_illness">History Of Presenting Illness</label> <textarea class="form-control " name="h_o_presenting_illness" id="h_o_presenting_illness"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="medical_history">Medical History</label> <textarea class="form-control" name="medical_history" id="medical_history"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="dental_diagnosis">Diagnosis</label> <textarea class="form-control " name="dental_diagnosis" id="dental_diagnosis"></textarea> </div> </div>'
                    ).children().fadeIn(300);
                });
            } else if (typeVal == "gynaecology") {
                eleWrap.children().fadeOut(300, function() {
                    $(this).remove();
                    eleWrap.append(
                        '<div class="gynaecology-elements" style="display: none;"><div class="prescription-field-area mb-4"><label for="gyn_chief_complaints">Chief Complaints </label> <textarea class="form-control " name="gyn_chief_complaints" id="gyn_chief_complaints"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="gyn_history_present_illness">History Of Presenting Illness</label> <textarea class="form-control " name="gyn_history_present_illness" id="gyn_history_present_illness"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="gyn_diagnosis">Diagnosis</label> <textarea class="form-control " name="gyn_diagnosis" id="gyn_diagnosis"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="gyn_management">Management</label> <textarea class="form-control" name="gyn_management" id="gyn_management"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="gyn_followup">Follow Up Advice</label> <textarea class="form-control" name="gyn_followup" id="gyn_followup"></textarea> </div> </div>'
                    ).children().fadeIn(300);
                });
            }
            else if (typeVal == "physiotherapy") {
                eleWrap.children().fadeOut(300, function() {
                    $(this).remove();
                    eleWrap.append(
                        '<div class="physiotherapy-elements" style="display: none;"><div class="prescription-field-area mb-4"><label for="sb_impairment">Impairment </label> <textarea class="form-control" name="sb_impairment" id="sb_impairment"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="sb_activities">Activities</label> <textarea class="form-control" name="sb_activities" id="sb_activities"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="sb_participation">Participation</label> <textarea class="form-control" name="sb_participation" id="sb_participation"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="sb_environment">Environment</label> <textarea class="form-control" name="sb_environment" id="sb_environment"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="sb_general_observation">General Observation</label> <textarea class="form-control" name="sb_general_observation" id="sb_general_observation"></textarea> </div> </div>'
                    ).children().fadeIn(300);
                });
            }
            else if (typeVal == "women_wellness") {
                eleWrap.children().fadeOut(300, function() {
                    $(this).remove();
                    eleWrap.append(
                        '<div class="women_wellness-elements"> <div class="prescription-field-area mb-4"> <label for="women_wellness_chief_complaints">Chief Complaints </label> <textarea class="form-control " name="women_wellness_chief_complaints" id="women_wellness_chief_complaints"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="women_wellness_past_medical_history">Past Medical History</label> <textarea class="form-control " name="women_wellness_past_medical_history" id="women_wellness_past_medical_history"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="women_wellness_diagnosis">Diagnosis</label> <textarea class="form-control" name="women_wellness_diagnosis" id="women_wellness_diagnosis"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="women_wellness_management">Management</label> <textarea class="form-control " name="women_wellness_management" id="women_wellness_management"></textarea> </div> </div>'
                    ).children().fadeIn(300);
                });
            }
            else {
                eleWrap.children().fadeOut(300, function() {
                    $(this).remove();
                    eleWrap.append(
                        '<div class="genral-elements" style="display: none;"><div class="prescription-field-area mb-4"><label for="chief_complaints">Chief Complaints </label> <textarea class="form-control " name="chief_complaints" id="chief_complaints"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="clinical_finding">Clinical Finding</label> <textarea class="form-control " name="clinical_finding" id="clinical_finding"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="Daignosis">Diagnosis</label> <textarea class="form-control " name="diagnosis" id="diagnosis"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="treatment">Treatment</label> <textarea class="form-control" name="treatment" id="treatment"></textarea> </div> <div class="prescription-field-area mb-4"> <label for="follow_up_advice">Follow Up Advice</label> <textarea class="form-control" name="follow_up_advice" id="follow_up_advice"></textarea> </div> </div>'
                    ).children().fadeIn(300);
                });
            }
        }

        $('#prescription_type').change(function() {
            var typeVal = $(this).val();
            appendElementOnChange(typeVal);
        });
    });
</script>
