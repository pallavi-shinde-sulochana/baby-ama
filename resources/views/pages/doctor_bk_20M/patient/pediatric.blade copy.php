@extends('base.doctor-dashboard')
@section('doctor-content')
@php

$getForm = config('pediatric-form.fields');
$appointment= $appoinment;


// $getForm = (object) $getForm;
$getForm =json_decode(json_encode($getForm)) ;

$getFields1 = isset($getForm[0]->fields1) ? $getForm[0]->fields1 : [];
$getFields2 = isset($getForm[0]->fields2) ? $getForm[0]->fields2 : [];

$getFormAnswersData = isset($getFormAnswers->answer) ? json_decode($getFormAnswers->answer) : [];

$getTables = isset($getForm[0]->tables) ? $getForm[0]->tables : [];

// dd($getVaccination);
@endphp

<section class="doctor-patinet-appointment pt-5">
    <div class="header ">
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
                <h2 class="mb-0">Paediatrics Case Record</h2>
            </div>
        </div>
    </div>
    <div class="head baby-shadow py-3 px-5" style="margin-top:50px;">
        <div class="row px-5 py-4 align-items-center">
            <div class="col-12 col-md-5 col-lg-3 col-xl-2">
                <div class="patient-img d-flex justify-content-center align-items-center mx-auto">
                    <p class="name mb-0">
                        {{ucfirst(substr($user->first_name, 0,1)).ucfirst(substr($user->last_name, 0,1))}}</p>
                    {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}
                </div>
            </div>
            <div class="col-12 col-md-7 col-lg-5 col-xl-6">
                <div class="patient-info">
                    <p class="name">{{$user->first_name.' '.$user->last_name}} </p>
                    @if($user->patient)
                    <p class="doctor-patinet-app-list-color">UMR NO. {{$user->patient->umr_no}}</p>
                    @endif
                    @if($appointment->specialists)
                    <p class="doctor-patinet-app-list-color"><span class="fw-normal"> Department:
                        </span>{{$appointment->specialists}}</p>
                    @endif
                    @if($appointment->doctor)
                    <p class="doctor-patinet-app-list-color"><span class="fw-normal"> Doctor:
                        </span>{{$appointment->doctor->first_name.' '.$appointment->doctor->last_name}}</p>
                    @endif
                    <p class="doctor-patinet-app-list-color">
                        <span class="fw-normal"> Status: </span>
                        <b>
                            @if($appointment->status==-1)
                            {{'Declined' }}
                            @elseif($appointment->status==0 && $appointment->doctor_id)
                            {{'Assigned' }}
                            @else
                            {{'Awaiting' }}
                            @endif
                        </b>
                    </p>
                    @if($appointment->appoinment_session)
                    <p class="doctor-patinet-app-list-color">
                        <span class="fw-normal"> Session: </span>
                        <b>
                            {{$appointment->appoinment_session }}
                        </b>
                    </p>
                    @endif
                </div>
            </div>
            <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                <div class="text-center">
                    @if(isset($user->patient->id))
                    <a class="link doctor-color-main doctor-font-bold btn-outline-primary"
                        href="{{route('doctor.appointment.patient.details',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Basic
                        Details</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <form action="{{route('doctor.patient.pediatric.post',$patient->id)}}" method="POST">
        @csrf
        <div class="row py-5 my-5 mx-0 pediatric-form-fields ">

            {{-- Normal form data - Fields1 --}}

            @foreach($getFields1 as $key => $value)
            @php
            $mapKey =$value->name;
            $thisValue=isset($getFormAnswersData->$mapKey) ? $getFormAnswersData->$mapKey : '';
            $value->value=$thisValue;

            @endphp
            <div class="col-md-7 p-5">
                {!!helperGenerteHtml($value)!!}
            </div>
            @endforeach

            {{-- Tabels --}}

            @foreach($getTables as $key => $table)

            <p class="pt-5 pb-5 color-primary ">{{$table->title}}</p>

            @php
            // $mapKey =$value->name;
            // $thisValue=isset($getFormAnswersData->$mapKey) ? $getFormAnswersData->$mapKey : '';
            // // dd($getFormAnswersData->$mapKey);
            // $value->value=$thisValue;

            @endphp
            {{-- <div class="col-md-7 p-5">
        {!!helperGenerteHtml($value)!!}
      </div> --}}
            <table class="table table-bordered pediatric-form-fields-tables">
                <thead>
                    <tr class="border">
                        @foreach($table->columns as $column)
                        {{-- <th scope="col">Gross Motor</th>
            <th scope="col">Attained</th>
            <th scope="col">Exprected</th> --}}
                        <th scope="col" class="text-center">{!!$column!!}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach($table->rows as $row)
                    @php
                    $mapKey =$row->name;
                    $mapKey2 =$row->name2;
                    $thisValue=isset($getFormAnswersData->$mapKey) ? 'checked' : '';
                    $thisValue2=isset($getFormAnswersData->$mapKey2) ? $getFormAnswersData->$mapKey2 : '';
                    @endphp
                    <tr>
                        <td>{{$row->label}}</td>
                        <td class="text-center ">

                            <input type="checkbox" {{$thisValue}} name="{{$row->name}}">

                        </td>
                        <td class="text-center">{{$row->label2}}</td>
                        <td class="text-center">
                            @if($row->name2)
                            <input type="text" class="form-control-food w-50px" name="{{$row->name2}}"
                                value="{{$thisValue2}}"> %
                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
            @endforeach

            @foreach($getFields2 as $key1 => $value1)
            @php
            $mapKey1 =$value1->name;
            $thisvalue1=isset($getFormAnswersData->$mapKey1) ? $getFormAnswersData->$mapKey1 : '';
            $value1->value=$thisvalue1;

            @endphp
            <div class="col-md-7 p-5">
                {!!helperGenerteHtml($value1)!!}
            </div>
            @endforeach

        </div>
        <div class="row">
            <div class="col-md-3 col-3">
                <a class="btn btn-info btn-cancel" href="{{route('doctor.appointments')}}">Cancel</a>
            </div>
            <div class="col-md-3 col-3">

                <button type="submit" class="btn btn-info">Save</button>
            </div>
        </div>

    </form>
</section>
@endsection