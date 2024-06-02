@extends('base.doctor-dashboard')
@section('doctor-content')
@php

$getForm = config('pediatric-form.fields');

// $getForm = (object) $getForm;
$getForm =json_decode(json_encode($getForm)) ;

$getFields = isset($getForm[0]->fields) ? $getForm[0]->fields : [];

$getFormAnswersData = isset($getFormAnswers->answer) ? json_decode($getFormAnswers->answer) : [];

$getVaccination = isset($getForm[0]->vaccination) ? $getForm[0]->vaccination : [];

// dd($patient);
@endphp

<section class="doctor-patinet-appointment pt-5">

  <form action="{{route('doctor.patient.vaccination.post',$patient->id)}}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-2">
        {{-- <a href="{{route('doctor.appointment.patient.details',$patient->id)}}"> --}}
          {{-- <a href="{{route('doctor.appointments')}}"> --}}
            <a href="{{URL::previous()}}">
              <img src="{{asset('front-end/assets/img/form-close.png')}}">
            </a>
      </div>
      <div class="col-md-8 text-center">
        <h2 class="p-0">Vaccination Report</h2>
      </div>
      <div class="col-md-2">

        <button type="submit" class="btn p-1 ">

          <img src="{{asset('front-end/assets/img/charm_tick.png')}}">
        </button>
      </div>
    </div>
    <div class="row p-5 m-5 pediatric-form-field table-responsive">


      {{-- Vaccination --}}

      <table class="table table-hover table-stripe align-middle table-bordered pediatric-form-fields-table">
        <thead>
          <tr class="border">
            @foreach($getVaccination->columns as $column)
            <th scope="col" class="text-center"><b>{!!$column!!}</b></th>
            @endforeach
          </tr>
        </thead>
        <tbody>
          @foreach($getVaccination->rows as $row)

          @php
          $mapKey =$row->name;
          $mapKey2 =$row->name2;
          $mapKey3 =$row->name3;
          $thisValue=isset($getFormAnswersData->$mapKey) ? $getFormAnswersData->$mapKey : [];
          $thisValue2=isset($getFormAnswersData->$mapKey2) ? $getFormAnswersData->$mapKey2 : '';
          $thisValue3=isset($getFormAnswersData->$mapKey3) ? $getFormAnswersData->$mapKey3 : '';


          $row->value = $thisValue;
          @endphp
         <tr class="border">
            <td class="text-center"><b>{{$row->label}}</b></td>
            <td>
              @foreach($row->options as $option)


              <div class="checkbox-list p-3">
                @php
                $isChecked = (in_array($option,$row->value)) ? 'checked' : '';
                // $isChecked='';
                @endphp
                <label class="checkbox doctor-color-black">
                  <input type="checkbox" name="{{$row->name.'[]'}}" value="{{$option}}" {{$isChecked}} />
                  <span>{{$option}}</span>

                </label>
              </div>

              @endforeach
            </td>
            <td class="text-center">
              <div>
              <input type="date" class="mx-auto form-control" name="{{$row->name2}}" value="{{$thisValue2}}">
            </div>
            </td>
            <td class="text-center">
              <div>
                <input type="date" class="mx-auto form-control" name="{{$row->name3}}" value="{{$thisValue3}}">
              </div>
              </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{-- Vaccination --}}
    </div>
    <div class="row">
      <div class="col-md-3">
      </div>
      <div class="col-md-3">


      </div>
    </div>

  </form>
</section>
@endsection
