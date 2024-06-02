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
    {{--href="{{ route('doctor.appointment.patient.prescription.add', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id, 'id' => $get->id, 'type' => 'general']) }}">  --}}
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40" fill="none">
                    <path
                        d="M18.334 21.6654H8.33398V18.332H18.334V8.33203H21.6673V18.332H31.6673V21.6654H21.6673V31.6654H18.334V21.6654Z"
                        fill="white" />
                </svg>
            </a>
        </div>



    </div>
@endsection
