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
                    <h2 class="mb-0">Anthropometry and Growth Chart</h2>
                </div>
            </div>
        </div>
{{-- Common Patient Profile Start --}}
@include('pages.doctor.patient.common-patient-profile')
{{-- Common Patient Profile Start --}}
        <div class="pt-5">
            <div class="py-5 my-5">
                <!-- Button trigger modal -->
                <button type="button" class="baby-primary-btn px-5" data-bs-toggle="modal"
                    data-bs-target="#anthropomentryModal">
                    Add Chart <span class="ps-4"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                            viewBox="0 0 20 20" fill="none">
                            <path
                                d="M14.4882 1.74493C14.7244 1.50876 15.0048 1.32142 15.3133 1.1936C15.6219 1.06579 15.9526 1 16.2866 1C16.6206 1 16.9514 1.06579 17.2599 1.1936C17.5685 1.32142 17.8489 1.50876 18.0851 1.74493C18.3212 1.98111 18.5086 2.26148 18.6364 2.57006C18.7642 2.87863 18.83 3.20936 18.83 3.54336C18.83 3.87736 18.7642 4.20809 18.6364 4.51666C18.5086 4.82524 18.3212 5.10562 18.0851 5.34179L5.94568 17.4812L1 18.83L2.34882 13.8843L14.4882 1.74493Z"
                                stroke="white" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
                        </svg></span>
                </button>

                <!-- Modal -->
                <form action="{{route('doctor.patient.growthchart.post',$pid)}}" method="POST"
                enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="anthropomentryModal" tabindex="-1" aria-labelledby="anthropomentryModalProp"
                    aria-hidden="true">
                    <input type="hidden" name="patientid" value="{{ $pid }}">

                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content baby-shadow ">
                            <div class="modal-heade baby-shadow  d-flex justify-content-center py-5">
                                <h3 class="fw-normal modal-title color-primary" id="anthropomentryModalProp">Enter Details
                                </h3>
                                <button type="button" class="btn-close d-none" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body px-5">
                                <div class="px-5">
                                    <div class="field-with-suffix my-5"> <label for="pa_dated"
                                            class="form-label">Date</label> <span class="px-2">:</span><input
                                            type="date" class="form-field" id="pa_dated" name="update_chart_date"
                                            value="{{ old('update_chart_date') }}"><span class="ps-2"></span>
                                            @error('update_chart_date')
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                                    </div>

                                    <div class="field-with-suffix my-5"> <label for="pa_weight"
                                            class="form-label">Weight</label> <span class="px-2">:</span><input
                                            type="text" class="form-field" id="pa_weight" name="weight"
                                            value="{{ old('weight') }}" @error('weight') {{ 'error' }} @enderror ><span class="ps-2"> in KG</span>
                                    </div>
                                    <div class="field-with-suffix my-5"> <label for="pa_height"
                                            class="form-label">Height</label> <span class="px-2">:</span><input
                                            type="text" class="form-field" id="pa_height" name="height"
                                            value="{{ old('height') }}" @error('height') {{ 'error' }} @enderror><span class="ps-2"> in CM</span>
                                    </div>
                                    <div class="field-with-suffix my-5"> <label for="paHeadCircum" class="form-label">Head
                                            <br>Circumference</label> <span class="px-2">:</span><input type="text"
                                            class="form-field" id="paHeadCircum" name="head_circum" value="{{ old('head_circum') }}"><span
                                            class="ps-2" @error('head_circum') {{ 'error' }} @enderror> in CM</span>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" class="baby-secondary-btn border-1 text-center"
                                    data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="baby-primary-btn">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="pt-5">
            <div class="mt-5 baby-shadow p-5">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link px-5 active" id="nav-graph-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-graph" type="button" role="tab" aria-controls="nav-graph"
                            aria-selected="true">Graph View</button>
                        <button class="nav-link px-5" id="nav-table-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-table" type="button" role="tab" aria-controls="nav-table"
                            aria-selected="false">Table View</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-graph" role="tabpanel"
                        aria-labelledby="nav-graph-tab" tabindex="0">
                        <div class="antro-graph">
                            <div class="py-5 mt-5">
                                <img class="w-100 object-fit-contain mb-5" src="{{ asset('images/ag-b.jpg') }}"
                                    alt="For Boys">
                            </div>
                            <div class="py-5 mt-5">
                                <img class="w-100 object-fit-contain" src="{{ asset('images/ag-g.jpg') }}"
                                    alt="For Girls">
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-table" role="tabpanel" aria-labelledby="nav-table-tab"
                        tabindex="0">
                        <div class="antro-table row mx-0 justify-content-center">
                            <div class="col-12 col-md-10 col-lg-7 py-5">
                                <div class="table-responsive py-5">
                                    <table class="table table-hover table-bordered  mt-5">
                                        <thead class="table-light bg-color-v1">
                                            <tr>
                                                <th scope="col" class="text-center">S.No</th>
                                                <th scope="col" class="bg-color-v1 text-center">DATE</th>
                                                <th scope="col" class="bg-color-v1 text-center">WEIGHT</th>
                                                <th scope="col" class="bg-color-v1 text-center">HEIGHT</th>
                                                <th scope="col" class="bg-color-v1 text-center">HEAD CIRCUMFERENCE</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach ($getchart as $key => $chart)

                                            <tr>
                                                <td class="text-center">{{ $i }}</td>
                                                <td class="text-center">{{ $chart->chart_update_date }}</td>
                                                <td class="text-center">{{ $chart->weight }} KG</td>
                                                <td class="text-center">{{ $chart->height }} CM</td>
                                                <td class="text-center">{{ $chart->head_circumference }} CM</td>

                                            </tr>

                                            @php $i++; @endphp
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
