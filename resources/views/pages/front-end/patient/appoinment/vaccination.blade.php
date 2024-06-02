@extends('base.patient-dashboard')
@section('doctor-content')
@php

$getForm = config('pediatric-form.fields');
$getForm =json_decode(json_encode($getForm)) ;
$getFields = isset($getForm[0]->fields) ? $getForm[0]->fields : [];
$getFormAnswersData = isset($getFormAnswers->answer) ? json_decode($getFormAnswers->answer) : [];
$getVaccination = isset($getForm[0]->vaccination) ? $getForm[0]->vaccination : [];

@endphp
<section class="doctor-patinet-appointment pt-5">
    <div class="row">
        <div class="col-md-2">
            <a href="{{route('patient.appointments.all')}}">
                <img src="{{asset('front-end/assets/img/form-close.png')}}">
            </a>
        </div>
        <div class="col-md-8 text-center">
            <h2 class="p-0">Vaccination Report</h2>
        </div>
        <div class="col-md-2">
            {{-- <button type="submit" class="btn p-1 ">
        <img src="{{asset('front-end/assets/img/charm_tick.png')}}">
            </button> --}}
        </div>
    </div>
    <div class="row p-5 m-5 pediatric-form-fields table-responsive">


        {{-- Vaccination --}}

        <table class="table table-bordered pediatric-form-fields-tables">
            <thead>
                <tr class="border">
                    @foreach($getVaccination->columns as $column)
                    <th scope="col" class="text-center">{!!$column!!}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach($getVaccination->rows as $row)

                @php
                $mapKey =$row->name;
                $mapKey2 =$row->name2;
                $thisValue=isset($getFormAnswersData->$mapKey) ? $getFormAnswersData->$mapKey : [];
                $thisValue2=isset($getFormAnswersData->$mapKey2) ? $getFormAnswersData->$mapKey2 : '';


                $row->value = $thisValue;
                @endphp
                <tr>
                    <td>{{$row->label}}</td>
                    <td>
                        @foreach($row->options as $option)


                        <div class="checkbox-list p-3">
                            @php
                            $isChecked = (in_array($option,$row->value)) ? 'checked' : '';
                            // $isChecked='';
                            @endphp
                            <label class="checkbox">
                                <input type="checkbox" disabled name="{{$row->name.'[]'}}" value="{{$option}}"
                                    {{$isChecked}} />
                                <span>&emsp;{{$option}}</span>

                            </label>
                        </div>

                        @endforeach
                    </td>
                    <td class="text-center">
                        <input type="date" readonly class="form-control w-200px" name="{{$row->name2}}"
                            value="{{$thisValue2}}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Vaccination --}}
    </div>
</section>
@endsection