@extends('base.doctor-dashboard')
@section('doctor-content')


@php
$appointment= $appoinment;
$getdata = isset($getFormAnswers->gynaecology) ? json_decode($getFormAnswers->gynaecology) : [];
@endphp


<section class="doctor-patinet-appointment pt-5">
    <h2 class="text-center mb-5">Gynaecology case summary</h2>
    {{-- Common Patient Profile Start --}}
@include('pages.doctor.patient.common-patient-profile')
{{-- Common Patient Profile Start --}}
    <div class="content">
        <div class="summary mb-2">
            <p class="question">CHEIF COMPLAINTS :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->gyn_chief_complaints) ? $getdata->gyn_chief_complaints : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">HISTORY OF PRESENT ILLNESS  :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->gyn_history_present_illness) ? $getdata->gyn_history_present_illness : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">DIAGNOSIS :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->gyn_diagnosis) ? $getdata->gyn_diagnosis : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">Management :</p>
            <p class="answer border-0">
               @php
                echo isset($getdata->gyn_management) ? $getdata->gyn_management : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question"> Follow-Up Days :</p>
            <p class="answer border-0">
                @php
                    echo isset($getdata->gyn_followup) ? $getdata->gyn_followup : '-Nil-';
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
