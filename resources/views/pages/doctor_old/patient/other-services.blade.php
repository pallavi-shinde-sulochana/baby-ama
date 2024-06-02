@extends('base.doctor-dashboard')
@section('doctor-content')
    @php

        $getForm = config('pediatric-form.fields');
        $appointment = $appoinment;

        // $getForm = (object) $getForm;
        $getForm = json_decode(json_encode($getForm));

        $getFields = isset($getForm[0]->dental) ? $getForm[0]->dental : [];

        $getFormAnswersData = isset($getFormAnswers->answer) ? json_decode($getFormAnswers->answer) : [];

        $adv = isset($getFormAnswersData->procedure) ? $getFormAnswersData->procedure : [];

        $getTables = isset($getForm[0]->dental_tables) ? $getForm[0]->dental_tables : [];

        //dd($getTables);

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
                    <h2 class="mb-0">Other Services</h2>
                </div>
            </div>
        </div>
         {{-- Common Patient Profile Start --}}
 @include('pages.doctor.patient.common-patient-profile')
 {{-- Common Patient Profile Start --}}

    </section>
@endsection
