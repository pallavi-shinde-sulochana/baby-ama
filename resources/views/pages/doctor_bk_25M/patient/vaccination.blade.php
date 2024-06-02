@extends('base.doctor-dashboard')
@section('doctor-content')
    @php
        $appointment= $appoinment;
        $id = $appointment->id;
        $getForm = config('pediatric-form.fields');
        $getForm = json_decode(json_encode($getForm));
        $getFields = isset($getForm[0]->fields) ? $getForm[0]->fields : [];
        $getFormAnswersData = isset($getFormAnswers->answer) ? json_decode($getFormAnswers->answer) : [];
        $getVaccination = isset($getForm[0]->vaccination) ? $getForm[0]->vaccination : [];

    @endphp

    <section class="doctor-patinet-appointment pt-5" style="margin-top: 35px;">

        <form action="{{ route('doctor.patient.vaccination.post', $patient->id) }}" class="mt-5" method="POST">
            @csrf
            <div class="row header px-5">
                <div class="col-md-2">
                    {{-- <a href="{{route('doctor.appointment.patient.details',$patient->id)}}"> --}}
                    {{-- <a href="{{route('doctor.appointments')}}"> --}}
                        <a href="{{route('doctor.appointment.patient',$id)}}">
                            <img src="{{ asset('front-end/assets/img/form-close.png') }}">
                    </a>
                </div>
                <div class="col-md-8 text-center">
                    <h2 class="p-0 mb-0">Vaccination Report</h2>
                </div>
                <div class="col-md-2">

                    <button type="submit" class="btn p-1 float-end">

                        <img src="{{ asset('front-end/assets/img/charm_tick.png') }}">
                    </button>
                </div>
            </div>
            <div class="mt-5 pt-5 pediatric-form-field table-responsive mt-5 pt-5">
                {{-- Vaccination --}}
                <table class="table table-hover table-stripe align-middle table-bordered pediatric-form-fields-table">
                    <thead>
                        <tr class="border">
                            @foreach ($getVaccination->columns as $column)
                                <th scope="col" class="text-center"><b>{!! $column !!}</b></th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($getVaccination->rows as $key => $row)
                            @php
                                $mapKey = $row->name;
                                $mapKey2 = $row->name2;
                                $mapKey3 = $row->name3;
                                $mapKey4 = $row->name4;
                                $thisValue = isset($getFormAnswersData->$mapKey) ? $getFormAnswersData->$mapKey : [];
                                $thisValue2 = isset($getFormAnswersData->$mapKey2) ? $getFormAnswersData->$mapKey2 : '';
                                $thisValue3 = isset($getFormAnswersData->$mapKey3) ? $getFormAnswersData->$mapKey3 : '';

                                $row->value = $thisValue;
                            @endphp
                            <tr class="border">
                                @if (!empty($row->label))
                                <td <?php if($key == 9){echo 'rowspan="2"';} ?> class="text-center"><b>{{ $row->label }}</b></td>
                                @endif
                                <td>
                                    @foreach ($row->options as $option)
                                        <div class="checkbox-list p-3">
                                            @php
                                                $isChecked = in_array($option, $row->value) ? 'checked' : '';
                                                // $isChecked='';
                                            @endphp
                                            <label class="checkbox doctor-color-black">
                                                <input type="checkbox" name="{{ $row->name . '[]' }}"
                                                    value="{{ $option }}" {{ $isChecked }} />
                                                <span>{{ $option }}</span>

                                            </label>
                                        </div>
                                    @endforeach
                                </td>
                                <td class="text-center">
                                    <div>
                                        <input type="date" class="mx-auto form-control" name="{{ $row->name2 }}"
                                            value="{{ $thisValue2 }}">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div>
                                        <input type="date" class="mx-auto form-control" name="{{ $row->name3 }}"
                                            value="{{ $thisValue3 }}">
                                    </div>
                                </td>
                                <td class="text-center">
                                    <div class="h-100 w-100 pe-2">
                                        <textarea class="w-100 h-100" name="{{ $row->name4 }}" rows="7" id="{{ $row->name4 }}">{{ $thisValue3 }}</textarea>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- Vaccination --}}
            <div> <label for="notes" class="form-label">NOTES : </label>
                <textarea rows="" class="form-control" id="notes" name="notes"><?php if (isset($getFormAnswersData->notes)) {
                    echo $getFormAnswersData->notes;
                } ?></textarea>
            </div>
        </form>
    </section>
@endsection
