@extends('base.doctor-dashboard')
@section('doctor-content')


@php
$appointment= $appoinment;
$getdata = isset($getFormAnswers->physiotherapy) ? json_decode($getFormAnswers->physiotherapy) : [];
@endphp


<section class="doctor-patinet-appointment pt-5">
    <h2 class="text-center mb-5">Physiotherapy Case Summary</h2>
    {{-- Common Patient Profile Start --}}
@include('pages.doctor.patient.common-patient-profile')
{{-- Common Patient Profile Start --}}
    <div class="content">
        <div class="summary mb-2">
            <p class="question">IMPAIRMENT :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->sb_impairment) ? $getdata->sb_impairment : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">ACTIVITIES  :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->sb_activities) ? $getdata->sb_activities : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">PARTICIPATION :</p>
            <p class="answer border-0">
                @php
                echo isset($getdata->sb_participation) ? $getdata->sb_participation : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question">ENVIRONMENT :</p>
            <p class="answer border-0">
               @php
                echo isset($getdata->sb_environment) ? $getdata->sb_environment : '-Nil-';
                @endphp
            </p>
        </div>
        <div class="summary mb-2">
            <p class="question"> GENERAL OBSERVATION :</p>
            <p class="answer border-0">
                @php
                    echo isset($getdata->sb_general_observation) ? $getdata->sb_general_observation : '-Nil-';
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
