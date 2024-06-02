@extends('base.doctor-dashboard')
@section('doctor-content')
    @php
        $appointment = $appoinment;
    @endphp
    <style>
        .prescription-table .table tr {
            border: 1px solid #EAECF0 !important;
        }
    </style>
    <div class="header ">
        <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
            <div class="col-1 position-absolute">
                <a href="{{ route('doctor.appointment.patient', $appointment->id) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                        <path
                            d="M12.7599 25.0934C12.5066 25.0934 12.2533 25 12.0533 24.8L3.95992 16.7067C3.57326 16.32 3.57326 15.68 3.95992 15.2934L12.0533 7.20003C12.4399 6.81337 13.0799 6.81337 13.4666 7.20003C13.8533 7.5867 13.8533 8.2267 13.4666 8.61337L6.07992 16L13.4666 23.3867C13.8533 23.7734 13.8533 24.4134 13.4666 24.8C13.2799 25 13.0133 25.0934 12.7599 25.0934Z"
                            fill="#344054"></path>
                        <path
                            d="M27.3336 17H4.89355C4.34689 17 3.89355 16.5467 3.89355 16C3.89355 15.4533 4.34689 15 4.89355 15H27.3336C27.8802 15 28.3336 15.4533 28.3336 16C28.3336 16.5467 27.8802 17 27.3336 17Z"
                            fill="#344054"></path>
                    </svg>
                </a>
            </div>
            <div class="col-11 text-center">

                <h2 class="mb-0">Clinical Note</h2>
            </div>
        </div>
    </div>
    <div class="page-content " style="padding-top:60px;">
        <div class="add-new-prescription-btn">
            <a class="baby-add-new-btn"
                href="{{ route('doctor.appointment.patient.prescription.add', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id,'type' => 'general']) }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <path
                        d="M18.334 21.6654H8.33398V18.332H18.334V8.33203H21.6673V18.332H31.6673V21.6654H21.6673V31.6654H18.334V21.6654Z"
                        fill="white" />
                </svg>
            </a>
        </div>
        <section class="clinical-notes py-4">
            <!-- <div x-data="{ open: false }">
                <button @click="open = true">Expand</button>

                <span x-show="open">
                    Content...
                </span>
            </div> -->
            <!-- Single Clinical Note -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="sort-medicine col position-fixed" style="top:80px; right:40px;z-index:110;">
                        <div class="btn-group float-end">
                            <button type="button" class="baby-secondary-btn border-1 dropdown-toggle"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="pe-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path d="M5 10H15M2.5 5H17.5M7.5 15H12.5" stroke="#344054" stroke-width="1.67"
                                            stroke-linecap="round" stroke-linejoin="round">
                                        </path>
                                    </svg></span>
                                Sort by
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#" >Name A to Z</a></li>
                                <li><a class="dropdown-item" href="#" >Name Z to A</a></li>
                                <li><a class="dropdown-item" href="#" >Date Oldest to Newest</a></li>
                                <li><a class="dropdown-item" href="#" >Date Newest to Oldest</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @if (!$getPrescriptions->isEmpty())
                @foreach ($getPrescriptions as $ps)
                    @php
                        $appointment = $ps->appointment;
                    @endphp
                    <div class="clinical-note baby-border mb-5">
                        <div class="row px-5 py-4 align-items-center justify-content-between mb-4">
                            <div class="col-6 px-0">
                                <p class="mb-0 date h6"></p>
                            </div>
                            <?php if($appointment->status == 'assigned') { ?>
                            <div class="col-6 px-0">
                                <a class="baby-secondary-btn border-1 text-center p-2 float-end"
                                    href="{{ route('doctor.appointment.patient.prescription.edit', ['appoinment' => $ps->appointment_id, 'patient' => $ps->patient_id, 'id' => $ps->id]) }}">Edit
                                </a>
                                {{-- <div class="col-6 px-0"><button type="button" class="baby-secondary-btn border-1 text-center p-2 float-end">Edit</button></div> --}}
                                <?php } ?>
                            </div>
                            <p class="mb-4 date">{{ $appointment->appoinment_date }}</p>
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
                                            {{-- @if ($appoinment->specialists)
                            <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Specialist </span><span class="val">{{$appoinment->specialists}}</span></p>
                            @endif --}}
                                            @if (isset($appointment->appoinment_date))
                                                <p class="doctor-patinet-app-list-color"><span
                                                        class="fw-normal label">Date</span><span class="val">
                                                        {{ $appointment->appoinment_date }}</span></p>
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

                            <div class="notes py-2">
                                <div class="summary mb-2">
                                    <p class="question">Chief Complaint</p>
                                    <p class="answer border-0">
                                        @php echo isset($ps->chief_complaint) ? $ps->chief_complaint : '-Nil-'; @endphp
                                    </p>
                                </div>
                                <div class="summary mb-2">
                                    <p class="question">Clinical Findings</p>
                                    <p class="answer border-0">
                                        @php echo isset($ps->clinical_findings) ? $ps->clinical_findings : '-Nil-'; @endphp
                                    </p>
                                </div>
                                <div class="summary mb-2">
                                    <p class="question">Diagnosis</p>
                                    <p class="answer border-0">
                                        @php echo isset($ps->diagnosis) ? $ps->diagnosis : '-Nil-'; @endphp
                                    </p>
                                </div>
                                <div class="summary mb-2">
                                    <p class="question">Treatment</p>
                                    <p class="answer border-0">
                                        @php echo isset($ps->treatment) ? $ps->treatment : '-Nil-'; @endphp
                                    </p>
                                </div>
                                <div class="summary mb-2">
                                    <p class="question">Follow up Advice</p>
                                    <p class="answer border-0">
                                        @php echo isset($ps->follow_up_advice) ? $ps->follow_up_advice : '-Nil-'; @endphp
                                    </p>
                                </div>
                                @if (isset($ps->prescriptionMedicine))
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
                                                        <th scope="col" class="bg-color-v1 text-center">RELATION TO
                                                            FOOD</th>
                                                        <th scope="col" class="bg-color-v1 text-center">FOLLOW UP’S
                                                            DAYS</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php $inc=0; @endphp
                                                    @foreach ($ps->prescriptionMedicine as $p_medicine)
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
                                                            $medicine_details = getMedcineDetail(
                                                                $p_medicine->medicine_id,
                                                            );
                                                        @endphp
                                                        <tr>
                                                            <td class="text-center">{{ $inc }}</td>
                                                            <td><b>{{ $medicine_details->name }}</b></td>
                                                            <td class="text-center">
                                                                {{ $p_medicine->intake_qty . ' ' . $p_medicine->dosage }}</td>
                                                            <td class="text-center">{{ $p_medicine->timing_when }}</td>
                                                            <td class="text-center">{{ $p_medicine->timing_how }}</td>
                                                            <td class="text-center">{{ $p_medicine->duration }}</td>
                                                        </tr>
                                                    @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                @endforeach
            @else
                <p class="text-center h5 mt-5 pt-5 text-danger fw-normal">No record(s) available</p>
            @endif
        </section>


    </div>
@endsection
