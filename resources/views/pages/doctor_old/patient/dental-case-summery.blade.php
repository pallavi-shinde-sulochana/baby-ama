@extends('base.doctor-dashboard')
@section('doctor-content')


@php
$appointment= $appoinment;
$getdata = isset($getFormAnswers->dental) ? json_decode($getFormAnswers->dental) : [];
@endphp


<section class="doctor-patinet-appointment pt-5">
    <h2 class="text-center mb-5">Dental case summary</h2>
    {{-- Common Patient Profile Start --}}
@include('pages.doctor.patient.common-patient-profile')
{{-- Common Patient Profile Start --}}
    <div class="content">
        <div class="summary mb-2">
            <p class="question">CHEIF COMPLAINTS :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->chief_complaints) ? $getdata->chief_complaints : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">H/O PRESENTING ILLNESS :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->h_o_presenting_illness) ? $getdata->h_o_presenting_illness : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">DIAGNOSIS :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->dental_diagnosis) ? $getdata->dental_diagnosis : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">MEDICAL HISTORY :</p>
            <p class="answer border-0">
               @php
                echo isset($getdata->medical_history) ? $getdata->medical_history : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question"> INVESTIGATION :</p>
            <p class="answer border-0">
                @php
                    echo isset($getdata->dental_investigation) ? $getdata->dental_investigation : '-Nil-';
                @endphp
            </p>
        </div>
    </div>
</section>
<style>
    .summary {
        max-width: 600px;

    }

    .summary .question {
        color: #8A4FBA;
        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
    }

    .summary .answer {
        border-radius: 5px;
        border: 1px solid #E8DCF1;
        background: #FFF;
        color: #808080;
        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
        padding: 20px;
    }
</style>
@endsection
