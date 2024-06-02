@extends('base.doctor-dashboard')
@section('doctor-content')
@php

// dd($data->prescriptionMedicine);
@endphp

<section class="doctor-patinet-appointment pt-5">
    <!-- New  -->
    <!-- Header  -->
    <div class="header ">
        <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
            <div class="col-1 position-absolute">
                {{-- <a href="{{route('doctor.appointment.patient.details',$patient->id)}}"> --}}
                {{-- <a href="{{route('doctor.appointment.patient',$appoinment->id)}}"> --}}
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
                <h2 class="mb-0">Prescription details</h2>
            </div>
        </div>
    </div>
    <!-- Header  -->
    <div class="row" style="margin-top:50px;">
        <!-- search  -->
        <div class="col-12 col-md-7">
            <h2 class="h3 fw-medium mb-5">Drug and Prescription</h2>
            <div class="med-search-container py-4">
                <form method="GET" id="searchForm">
                    <div class="med-search">
                        <div class="search-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                fill="none">
                                <path
                                    d="M13.6667 13.6667L10.676 10.6707M12.3333 6.66667C12.3333 8.16956 11.7363 9.6109 10.6736 10.6736C9.6109 11.7363 8.16956 12.3333 6.66667 12.3333C5.16377 12.3333 3.72243 11.7363 2.65973 10.6736C1.59702 9.6109 1 8.16956 1 6.66667C1 5.16377 1.59702 3.72243 2.65973 2.65973C3.72243 1.59702 5.16377 1 6.66667 1C8.16956 1 9.6109 1.59702 10.6736 2.65973C11.7363 3.72243 12.3333 5.16377 12.3333 6.66667Z"
                                    stroke="#7B7A7C" stroke-linecap="round" />
                            </svg>
                        </div>
                        <div class="search-field-wrap">
                            <input type="search" name="search" placeholder="search medicine" id="filterMedicine"
                                class="form-control" />

                            <!-- <input type="search" name="search" placeholder="search medicine" id="search" class="form-control w-100" /> -->
                        </div>
                    </div>
                </form>
                <div class="med-search-result py-4 mt-4">

                    <div class="med-items">
                        @foreach($medicines as $medicine)
                        @php
                        $getType =($medicine->dosage) ? ' ('.$medicine->dosage.')' : '';
                        $fullName =helperFormatMedicinePrefix($medicine->type).' '.$medicine->name.$getType
                        @endphp
                        <div class="med-item" data-bs-toggle="modal" data-bs-target="#MedPopModal">
                            <div class="medicine">
                                <span
                                    class="m-type pe-1 text-capitalize">({{helperFormatMedicinePrefix($medicine->type)}})</span>
                                <span class="m-name">{{$medicine->name}} </span>
                                <span class="m-name ms-1">@if($medicine->dosage)
                                    {{'('.$medicine->dosage.')'}} @endif</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>
        <!-- search  -->
        <!-- medicine table  -->
        <div class="col-12">
            <div class="prescription-table py-3">
                <h3 class="mb-5">Drug and Prescription</h3>
                <div class="row mx-0">
                    <div class="col-12 col-md-7 px-0">
                        <div class="table-responsive py-3 w-5">
                            <table class="table">
                                <thead class="table-light bg-color-v1">
                                    <tr>
                                        <th scope="col" class="text-center">S.No</th>
                                        <th scope="col" class="bg-color-v1">MEDICINE</th>
                                        <th scope="col" class="bg-color-v1 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center">01</th>
                                        <td class="">Cossipoeia</td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <div class="w-50 d-flex justify-content-center align-items-center">
                                                    <button class="action-btn" data-bs-toggle="modal"
                                                        data-bs-target="#MedPopModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            viewBox="0 0 16 16" fill="none">
                                                            <path
                                                                d="M10.9921 2.49662C11.1496 2.33917 11.3365 2.21428 11.5422 2.12907C11.7479 2.04386 11.9684 2 12.1911 2C12.4138 2 12.6342 2.04386 12.84 2.12907C13.0457 2.21428 13.2326 2.33917 13.39 2.49662C13.5475 2.65407 13.6724 2.84099 13.7576 3.04671C13.8428 3.25242 13.8867 3.47291 13.8867 3.69557C13.8867 3.91824 13.8428 4.13873 13.7576 4.34444C13.6724 4.55016 13.5475 4.73708 13.39 4.89453L5.29712 12.9875L2 13.8867L2.89921 10.5895L10.9921 2.49662Z"
                                                                stroke="#667085" stroke-width="1.11111"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </div>
                                                <div class="w-50 d-flex justify-content-center align-items-center">
                                                    <button class="action-btn">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                            viewBox="0 0 16 16" fill="none">
                                                            <path
                                                                d="M2.66675 4.48933H3.91141M3.91141 4.48933H13.8687M3.91141 4.48933V13.202C3.91141 13.5321 4.04255 13.8487 4.27597 14.0821C4.50939 14.3155 4.82598 14.4467 5.15608 14.4467H11.3794C11.7095 14.4467 12.0261 14.3155 12.2595 14.0821C12.4929 13.8487 12.6241 13.5321 12.6241 13.202V4.48933H3.91141ZM5.77841 4.48933V3.24467C5.77841 2.91456 5.90955 2.59797 6.14297 2.36455C6.37639 2.13113 6.69297 2 7.02308 2H9.51241C9.84252 2 10.1591 2.13113 10.3925 2.36455C10.6259 2.59797 10.7571 2.91456 10.7571 3.24467V4.48933M7.02308 7.601V11.335M9.51241 7.601V11.335"
                                                                stroke="#FF505B" stroke-width="1.11111"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- medicine table  -->
        <!-- medicine property modal  -->
        <div class="col-12">
            <div class="modal fade med-data-modal" id="MedPopModal" tabindex="-1" aria-labelledby="MedPopModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header py-4">
                            <h3 class="modal-title fs-5 text-center med-name w-100" id=" MedPopModalLabel"><span
                                    class="me-2">(Tab)</span>Tylenol
                            </h3>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="">
                                <!-- Dosage -->
                                <div class="row mx-0 mb-4 align-items-center">
                                    <div class="col-4 med-prop position-relative">
                                        Dosage
                                    </div>
                                    <div class="col-8">
                                        <div class="row mx-0">
                                            <div class="col-6 form-fld px-1">
                                                <input type="number" class="form-control rounded-0" placeholder="0"
                                                    id="insReportName" name="tab-_count" value="" step="1" min="0"
                                                    oninput="validity.valid||(value='');">
                                            </div>
                                            <div class="col-6 form-fld px-1">
                                                <input type="text" class="form-control rounded-0" placeholder="Tab"
                                                    id="insReportName" name="tab_name" value="" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Timing -->
                                <div class="row mx-0 mb-4 align-items-center">
                                    <div class="col-4 med-prop position-relative">
                                        Timing
                                    </div>
                                    <div class="col-8">
                                        <div class="row mx-0">
                                            <div class="col-4 px-1">
                                                <div class="select-chk">
                                                    <input type="checkbox" id="TMorning" name="morning" value="Morning">
                                                    <label for="TMorning">Morning</label>
                                                </div>
                                            </div>
                                            <div class="col-4 px-1">
                                                <div class="select-chk">
                                                    <input type="checkbox" id="Tafternoon" name="afternoon"
                                                        value="Noon">
                                                    <label for="Tafternoon">Noon</label>
                                                </div>
                                            </div>
                                            <div class="col-4 px-1">
                                                <div class="select-chk">
                                                    <input type="checkbox" id="Tevening" name="evening" value="Night">
                                                    <label for="Tevening">Night</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  Relation to food -->
                                <div class="row mx-0 mb-4 align-items-center">
                                    <div class="col-4 med-prop position-relative">
                                        Relation to food
                                    </div>
                                    <div class="col-8">
                                        <div class="row mx-0">
                                            <div class="col-6 px-1">
                                                <div class="select-chk">
                                                    <input type="checkbox" id="Afood" name="beforefood"
                                                        value="beforefood">
                                                    <label for="Afood">Morning</label>
                                                </div>
                                            </div>
                                            <div class="col-6 px-1">
                                                <div class="select-chk">
                                                    <input type="checkbox" id="Bfood" name="afterfood"
                                                        value="afterfood">
                                                    <label for="Bfood">After Food</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  Follow-up days -->
                                <div class="row mx-0 mb-4 align-items-center">
                                    <div class="col-4 med-prop position-relative">
                                        Follow-up days
                                    </div>
                                    <div class="col-8">
                                        <div class="row mx-0 align-items-center">
                                            <div class="col-6 px-1 form-fld">
                                                <input type="number" class="form-control rounded-0" placeholder="0"
                                                    id="FollowUpDays" name="tab-_count_days" value="" step="1" min="0"
                                                    oninput="validity.valid||(value='');">
                                            </div>
                                            <div class="col-6 px-1">
                                                <label for="FollowUpDays">Days</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--  Total Count days -->
                                <div class="row mx-0 mb-4 align-items-center">
                                    <div class="col-4 med-prop position-relative">
                                        Total count
                                    </div>
                                    <div class="col-8">
                                        <div class="row mx-0 align-items-center">
                                            <div class="col-6 px-1 form-fld">
                                                <span class="me-2">5</span>
                                                <span>Tablets</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="baby-secondary-btn border-1"
                                data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="baby-primary-btn border-1">Add</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- medicine property modal -->


    </div>
    <!-- New -->



    <div class="row p-5 m-5 pediatric-form-fields prescriptionForm table-responsive">
        <div class="col-md-12">
            <span class="text-" style="color:#fd7e14">NOTE: Make sure you saved all details of each Medicine</span>
        </div>
        <div class="col-md-8">
            <div class="row pt-5 pb-5">
                <h3>
                    Medicine
                </h3>
                <form method="GET" id="searchFormNew">
                    <div class="col-md-8">
                        <div class="input-group">
                            <div class="form-outline">
                                <input type="search" name="search" placeholder="search medicine" id="search"
                                    class="form-control" />
                            </div>
                            <button onclick="searchMedicine()" type="button" class="btn-sm btn-info">
                                <i class="fas fa-search"></i>
                            </button>
                            <label class="pt-3">TIPS: you can search based on medicine types such as
                                tablet,syrup,drops</label>

                            <a href="https://youtu.be/N-Q98zHEwtU" target="_blank">Check how to video here <i
                                    class="fa fa-question-circle" aria-hidden="true"></i></a>

                            {{-- <label class="pt-3 text-danger">NOTE: First you need to select the medicines and then save after save
                you can add the Quantity and other informations </label> --}}
                            {{-- <a class="btn"
                href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Clear
                            Search</a> --}}
                        </div>
                    </div>
                </form>

            </div>

            <form
                action="{{route('doctor.appointment.patient.prescription.medicine.post',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}"
                method="POST">
                @csrf
                <input type="hidden" name="pr_id" id="pr_id" value="{{$data->id}}">
                <input type="hidden" name="deleted_prescription_medicines" id="deleted_prescription_medicines"
                    value="[]">
                <div class="row">
                    <h3>Selected Medicine <i class="fa fa-question-circle" aria-hidden="true" data-bs-toggle="tooltip"
                            data-bs-html="true"
                            title="1) If selected medicine show this mark <i class='fa fa-check-circle text-danger' aria-hidden='true'></i> not yet saved all the details , <br>2) if it shows this mark <i class='fa fa-check-circle text-success' aria-hidden='true'></i>  means all details are saved for that medicine <br> 3) To add / alter medicine details like intake quantity etc click this icon <i class='fas fa-cog text-dark'></i> <br> 4) To remove / delete medicine click this icon <i class='fas fa-trash text-danger'></i>"></i>
                    </h3>

                    <div class="col-md-12" id="choosenMedicine">
                        @php $selectedMed=[]; @endphp
                        @foreach($data->prescriptionMedicine as $p_medicine)
                        @php
                        $frame_data = array(
                        'id' => $p_medicine->id,
                        'medicine_id' => $p_medicine->medicine_id,
                        'total_qty' => $p_medicine->total_qty,
                        'intake_qty' => $p_medicine->intake_qty,
                        'timing_when' => $p_medicine->timing_when,
                        'timing_how' => $p_medicine->timing_how,
                        'duration' => $p_medicine->duration,
                        'dosage' => $p_medicine->dosage,
                        );
                        $selectedMed[]=$p_medicine->id;
                        $medicine_details = getMedcineDetail($p_medicine->medicine_id);
                        $getType =($medicine_details->dosage) ? ' ('.$medicine_details->dosage.')' : '';
                        $fullName =helperFormatMedicinePrefix($medicine_details->type).'
                        '.$medicine_details->name.$getType
                        @endphp
                        <div class="row selected-medicine-wrapper">
                            <textarea name="choosenMedicine[]" class="d-none">{{json_encode($frame_data)}}</textarea>
                            <div class="col-md-12 m-1 p-3 rounded border border-dark">
                                <div class="row">
                                    {{-- {{json_encode($p_medicine)}} --}}
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class="selected-medicine-wrapper">{{$fullName}}</span>
                                        <div class="btn-wrapper">
                                            <span class="me-2 btn p-0" onclick="editSelectedMedician(this)"
                                                data-name="{{$fullName}}">
                                                <i class="fas fa-edit text-dark"></i>
                                            </span>&nbsp;
                                            <span class="btn p-0" onclick="removeSelectedMedician(this)"
                                                data-name="{{$fullName}}">
                                                <i class="fas fa-trash text-danger"></i>
                                            </span> &emsp;
                                            @if($p_medicine->total_qty && $p_medicine->intake_qty &&
                                            $p_medicine->timing_when && $p_medicine->timing_how &&
                                            $p_medicine->duration)
                                            <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                                            @else
                                            <i class="fa fa-check-circle text-danger" aria-hidden="true"></i>
                                            @endif
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>


                        @endforeach
                    </div>
                </div>
                <div class="row pt-5 pb-5">
                    <div class="col-md-12" id="MedicineButtons">
                        <hr>
                        <h2>Select the Medicines</h2>
                        @foreach($medicines as $medicine)
                        @php
                        $getType =($medicine->dosage) ? ' ('.$medicine->dosage.')' : '';
                        $fullName =helperFormatMedicinePrefix($medicine->type).' '.$medicine->name.$getType
                        @endphp
                        <button type="button" class="btn btn-medicine-tag " id="{{$medicine->id}}"
                            data-name="{{$medicine->name}}" data-details="{{json_encode($medicine)}}"
                            onclick="addMedicineToList(this.id,'{{$fullName}}')">
                            <span>{{helperFormatMedicinePrefix($medicine->type)}}</span>
                            {{$medicine->name}} @if($medicine->dosage) {{'('.$medicine->dosage.')'}} @endif
                        </button>
                        @endforeach
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3 col-3">
                        <a class="btn btn-info btn-cancel"
                            href="{{  route('doctor.appointment.patient.prescription.view',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id,'id'=>$data->id]) }}">Back</a>
                    </div>
                    <div class="col-md-3 col-3">

                        <button type="submit" class="btn btn-info">Save</button>
                    </div>
                </div>

        </div>
    </div>


    </form>
</section>
<!-- Modal -->
<div class="modal fade d-none" id="dosageModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dosageModelTitle">

                </h5>
                <span class="modal-title" id="dosageModelSubTitle">

                </span>
                {{-- <button onclick="closeDosageModel()" type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button> --}}
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <!-- Quantity -->
                    <h4>Quantity</h4>
                    <div class="col-md-12">
                        <input type="number" name="total_qty" id="total_qty" class="form-control w-200px" value="">

                    </div>
                    <div class="col-md-12 mt-5 row">
                        <div class="col-md-3 col-sm-3 col-3">
                            <h4 class="mt-5">Dosage</h4>

                        </div>
                        <div class="col-md-3 col-sm-3 col-3">
                            <input type="number" name="intake_qty" id="intake_qty" class="form-control" value="">
                        </div>
                        <div class="col-md-4 col-sm-4 col-5">
                            <select class="form-control" name="dosage" id="dosage">
                                <option value="Tablet">Tablet</option>
                                <option value="Ml"> Ml</option>
                            </select>
                        </div>

                        <!-- 1/3 -->
                        {{-- <input type="radio" name="intake_qty" id="intake_1_3" class="d-none medician-check-inp" value="1/3">
            <label class="medician-check-label" for="intake_1_3">1/3</label>

            <!-- 1/2 -->
            <input type="radio" name="intake_qty" id="intake_1_2" class="d-none medician-check-inp" value="1/2">
            <label class="medician-check-label" for="intake_1_2">1/2</label>

            <!-- 3/4 -->
            <input type="radio" name="intake_qty" id="intake_3_4" class="d-none medician-check-inp" value="3/4">
            <label class="medician-check-label" for="intake_3_4">3/4</label>

            <!-- 1 -->
            <input type="radio" name="intake_qty" id="intake_1" class="d-none medician-check-inp" value="1">
            <label class="medician-check-label" for="intake_1">1</label>

            <!-- 1 1/2 -->
            <input type="radio" name="intake_qty" id="intake_1__1_2" class="d-none medician-check-inp" value="1 1/2">
            <label class="medician-check-label" for="intake_1__1_2">1 1/2</label>

            <!-- 2 -->
            <input type="radio" name="intake_qty" id="intake_2" class="d-none medician-check-inp" value="2">
            <label class="medician-check-label" for="intake_2">2</label>

            <!-- 2 1/2 -->
            <input type="radio" name="intake_qty" id="intake_2__1_2" class="d-none medician-check-inp" value="2 1/2">
            <label class="medician-check-label" for="intake_2__1_2">2 1/2</label>

            <!-- 3 -->
            <input type="radio" name="intake_qty" id="intake_3" class="d-none medician-check-inp" value="3">
            <label class="medician-check-label" for="intake_3">3</label>

            <!-- 3 1/2 -->
            <input type="radio" name="intake_qty" id="intake_3__1/2" class="d-none medician-check-inp" value="3 1/2">
            <label class="medician-check-label" for="intake_3__1/2">3 1/2</label>
            <br><br>
            <input type="radio" name="intake_qty" id="intake_1_ml" class="d-none medician-check-inp" value="1 ml">
            <label class="medician-check-label" for="intake_1_ml">1 ML</label>
            <input type="radio" name="intake_qty" id="intake_2_5_ml" class="d-none medician-check-inp" value="2.5 ml">
            <label class="medician-check-label" for="intake_2_5_ml">2.5 ML</label>
            <input type="radio" name="intake_qty" id="intake_5_ml" class="d-none medician-check-inp" value="5 ml">
            <label class="medician-check-label" for="intake_5_ml">5 ML</label>
            <label class="medician-check-label" for="intake_10_ml">10 ML</label>
            <input type="radio" name="intake_qty" id="intake_10_ml" class="d-none medician-check-inp" value="10 ml">
            <label class="medician-check-label" for="intake_10_ml">10 ML</label> --}}

                        {{-- <label class="checkbox "><input type="checkbox" name="intake_qty" value="1/2" />1/2</label>
            <label class="checkbox "><input type="checkbox" name="intake_qty" value="3/4" />3/4</label>
            <label class="checkbox "><input type="checkbox" name="intake_qty" value="1" />1</label>
            <label class="checkbox "><input type="checkbox" name="intake_qty" value="1 1/2" />1 1/2</label>
            <label class="checkbox "><input type="checkbox" name="intake_qty" value="2" />2</label>
            <label class="checkbox "><input type="checkbox" name="intake_qty" value="2 1/2" />2 1/2</label>
            <label class="checkbox "><input type="checkbox" name="intake_qty" value="3" />3</label>
            <label class="checkbox "><input type="checkbox" name="intake_qty" value="3 1/2" />3 1/2</label> --}}
                    </div>

                    <!-- Timing -->
                    <div class="row mt-5">
                        <div class="col-md-4 col-sm-4 col-4">
                            <h4 class="mt-5">Timing</h4>
                        </div>
                        <div class="col-md-8 col-sm-8 col-8">
                            <!-- Timing When -->
                            <div class="col-md-12">
                                <!-- 4h -->
                                <input type="radio" name="timing_when" id="t_when_4h" class="d-none medician-check-inp"
                                    value="Morning">
                                <label class="medician-check-label" for="t_when_4h">Morning</label>

                                <!-- 6h -->
                                <input type="radio" name="timing_when" id="t_when_6h" class="d-none medician-check-inp"
                                    value="Noon">
                                <label class="medician-check-label" for="t_when_6h">Noon</label>

                                <!-- 8h -->
                                <input type="radio" name="timing_when" id="t_when_8h" class="d-none medician-check-inp"
                                    value="Night">
                                <label class="medician-check-label" for="t_when_8h">Night</label>
                                <br><br>
                                <input type="radio" name="timing_when" id="t_when_mh" class="d-none medician-check-inp"
                                    value="Morning & Night">
                                <label class="medician-check-label" for="t_when_mh">Morning & Night</label>

                                {{-- <!-- 12h -->
                <input type="radio" name="timing_when" id="t_when_12h" class="d-none medician-check-inp" value="12h">
                <label class="medician-check-label" for="t_when_12h">12h</label>

                <!-- 48h -->
                <input type="radio" name="timing_when" id="t_when_48h" class="d-none medician-check-inp" value="48h">
                <label class="medician-check-label" for="t_when_48h">48h</label>

                <!-- once -->
                <input type="radio" name="timing_when" id="t_when_once" class="d-none medician-check-inp" value="once">
                <label class="medician-check-label" for="t_when_once">Once</label>

                <!-- twice -->
                <input type="radio" name="timing_when" id="t_when_twice" class="d-none medician-check-inp"
                  value="twice">
                <label class="medician-check-label" for="t_when_twice">Twice</label>

                <!-- thrice -->
                <input type="radio" name="timing_when" id="t_when_thrice" class="d-none medician-check-inp"
                  value="thrice">
                <label class="medician-check-label" for="t_when_thrice">Thrice</label>

                <!-- 4 times -->
                <input type="radio" name="timing_when" id="t_when_4_times" class="d-none medician-check-inp"
                  value="4 times">
                <label class="medician-check-label" for="t_when_4_times">4 times</label>

                <!-- 5 times -->
                <input type="radio" name="timing_when" id="t_when_5_times" class="d-none medician-check-inp"
                  value="5 times">
                <label class="medician-check-label" for="t_when_5_times">5 times</label> --}}
                            </div>
                        </div>
                    </div>



                    <!-- Timing How -->
                    <div class="col-md-12 mt-5">
                        <div class="row">
                            <div class="col-md-6 col-sm-6 col-6">
                                <h4 class="mt-5">Relation to food</h4>
                            </div>
                            <div class="col-md-6 col-sm-6 col-6">

                                <!-- 6h -->
                                <input type="radio" name="timing_how" id="timing_how_before_food"
                                    class="d-none medician-check-inp" value="Before Food">
                                <label class="medician-check-label" for="timing_how_before_food"> Before Food</label>

                                <!-- 8h -->
                                <input type="radio" name="timing_how" id="timing_how_after_food"
                                    class="d-none medician-check-inp" value="After food">
                                <label class="medician-check-label" for="timing_how_after_food"> After food</label>

                            </div>


                        </div>
                    </div>


                    <div class="col-md-12 row">
                        <div class="col-md-6 col-sm-6 col-6">
                            <!-- Duration -->
                            <h4 class="mt-5">Follow-up days</h4>

                        </div>
                        <div class="col-md-6 col-sm-6 col-6">
                            <select class="form-control" name="duration" id="duration">
                                <option value="1 Day">1 Day</option>
                                <option value="2 Days">2 Days</option>
                                <option value="3 Days">3 Days</option>
                                <option value="4 Days">4 Days</option>
                                <option value="5 Days">5 Days</option>
                                <option value="7 Days">1 Week</option>
                                <option value="10 Days">10 Days</option>
                                <option value="14 Days">2 Weeks</option>
                                <option value="12 Days">12 Days</option>
                                <option value="21 Days">3 Weeks</option>
                                <option value="30 Days">30 Days</option>
                            </select>
                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" id="save_medician_details">Close</button>
            </div>
        </div>
    </div>
</div>

@endsection


<script type="text/javascript">
window.addEventListener("DOMContentLoaded", (event) => {

    jQuery("input[name=intake_qty]").on('click', function() {
        jQuery("input[name=intake_qty]").prop('checked', false)
        var $box = jQuery(this);
        $box.prop("checked", true);

    });
    // openDosageModel();
});
// window.addEventListener('load', function () {
//    jQuery(".dosageitems").click(function () {
//      openDosageModel();
//   });
// })

// jQuery(".dosageitems").click(function () {
//    openDosageModel();
// });

function openDosageModel() {

    jQuery('#dosageModel').removeClass('d-none');
    jQuery('#dosageModel').modal('show');

}

function closeDosageModel() {
    jQuery('#dosageModel').modal('hide');

    toastr.warning('The data not yet saved, once you finished kindly scroll down and hit save!');

}

function searchMedicine() {

    var search = jQuery("#search").val();
    // var form = $(this);
    var actionUrl = "{{route('doctor.search.medicine')}}" + "?search=" + search;

    jQuery.ajax({
        url: actionUrl,
        type: 'GET',
        dataType: 'json', // added data type
        success: function(res) {
            jQuery('#MedicineButtons').html('');
            jQuery('#MedicineButtons').append('<hr>');
            jQuery('#MedicineButtons').append('<h2>Select the Medicines</h3>');
            jQuery.each(res.data, function(index, itemData) {
                var getDose = (itemData.dosage) ? '(' + itemData.dosage + ')' : '';
                var name = '"' + itemData.name + '"';
                jQuery("#MedicineButtons").append("<button id=" + itemData.id +
                    " type='button' onclick='addMedicineToList(" + itemData.id + "," + name +
                    ")' class='btn btn-medicine-tag'>" + itemData.name + getDose + "</button>");
            })
        }
    });


}



function addMedicineToList(id, name) {
    // jQuery("#choosenMedicineTable tbody").append("<tr id="+id+">" +
    //       "<td>" +name+"</td>"+
    //       "<td><a href='#'>Remove</a></td>" +
    //       "</tr>");
    // console.log(getMedicineToListRenderHtml(id,name));
    // .prescriptionForm
    jQuery('.prescriptionForm #' + id).addClass('medicine-selected');
    jQuery("#choosenMedicine").append(getMedicineToListRenderHtml(id, name));

    // jQuery("#choosenMedicine").append("<input type='hidden' name='choosenMedicine[]' class='form-control' value='"+id+"'><lable class='form-label dosageitems'>"+name+"</label>&emsp;<a href='#' onclick='openDosageModel()'>+ Add Dosage</a><br>");

    toastr.success(name + " Selectd Successfuly")
}

function getMedicineToListRenderHtml(id, name) {
    let html = '';
    if (id && name) {
        let frameData = {
            id: null,
            medicine_id: id,
            total_qty: null,
            intake_qty: null,
            timing_when: null,
            timing_how: null,
            duration: null,
            dosage: null
        };
        html = `
      <div class="row selected-medicine-wrapper">
        <textarea name="choosenMedicine[]" class="d-none">${JSON.stringify(frameData)}</textarea>
        <div class="col-md-12 m-1 p-3 rounded border border-dark">
          <div class="row">
            <div class="col-12 d-flex justify-content-between">
              <span class="selected-medicine-wrapper">${name}</span>
              <div class="btn-wrapper">
                <span class="me-2 btn p-0" data-name="${name}" onclick="editSelectedMedician(this)">
                  <i class="fas fa-cog text-dark"></i>
                </span>
                <span class="btn p-0" data-id="${id}" onclick="removeSelectedMedician(this)">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      `;
    }
    return html;
}

function editSelectedMedician(btn) {
    var tabName = $(btn).data("name");
    if (tabName) {
        $('#dosageModelTitle').text(tabName);
    } else {
        $('#dosageModelTitle').text('');
    }
    let textarea = $(btn).parents('.selected-medicine-wrapper').find('textarea[name="choosenMedicine[]"]');
    let data = JSON.parse($(btn).parents('.selected-medicine-wrapper').find('textarea[name="choosenMedicine[]"]')
        .val());
    let save_btn = document.getElementById('save_medician_details');
    let save_duration = document.getElementById('duration');

    // Setting Values
    for (let i in data) {
        if (i === 'medicine_id' || i === 'id') continue;
        if (i === 'total_qty') {
            $(`[name="${i}"]`).val(data[i]);
        } else if (i === 'intake_qty') {
            $(`[name="${i}"]`).val(data[i]);
        } else if (i === 'duration') {
            $(`select[name="${i}"]`).val(`${data[i]}`).change();
        } else {
            $(`[name="${i}"]`).prop('checked', false)
            $(`[name="${i}"][value="${data[i]}"]`).prop('checked', true).change();
        }
    }

    openDosageModel();

    save_btn.onclick = function() {
        // Getting Values
        for (let i in data) {

            let value = null;
            if (i === 'medicine_id' || i === 'id') continue;
            if (i === 'total_qty') {
                // value = $(`[name="${i}"]`).val();
                var getDu = jQuery('#duration').val();
                var getIn = jQuery('#intake_qty').val();
                getDu = parseInt(getDu);

                value = getDu * getIn
            } else if (i === 'intake_qty') {
                value = $(`[name="${i}"]`).val();
            } else {
                value = $(`[name="${i}"]:checked`).val();
                if (value == null) {
                    value = $(`select[name="${i}"]`).val();
                }
            }
            data[i] = (value) ? value : null;
        }

        /*Create QTY*/
        // console.log(data);
        // $('#total_qty').val(getDu);
        $(textarea).text(JSON.stringify(data));
        closeDosageModel();
    }
    /*Dosage*/
    $("#duration").change(function() {
       
        var val = this.value;
        var getDu = jQuery('#duration').val();
        var getIn = jQuery('#intake_qty').val();
        var getDo = jQuery('#dosage').val();
        getDu = parseInt(getDu);
        value = getDu * getIn
        if (getDo == 'Tablet' && value) {
            jQuery('#total_qty').val(value)
        } else {
            // alert('You choosed dosage as non tablet to please check the quantity')
            jQuery('#total_qty').val(1)
        }
    });

}

function removeSelectedMedician(btn) {
    var getDelId = jQuery(btn).data("id");
    // console.log(getDelId);
    jQuery('.prescriptionForm #' + getDelId).removeClass('medicine-selected');
    if (confirm('Are you sure you want to delete this itme ?')) {
        let data = JSON.parse($(btn).parents('.selected-medicine-wrapper').find('textarea').val());
        if (data['id']) {

            let deleted_inp_ids = JSON.parse($('#deleted_prescription_medicines').val());
            deleted_inp_ids.push(data['id']);
            $('#deleted_prescription_medicines').val(JSON.stringify(deleted_inp_ids));
            // var getDelId =jQuery(btn).data("id");
            // console.log(getDelId);
            // jQuery('.prescriptionForm #'+getDelId).removeClass('medicine-selected');

        }
        $(btn).parents('.selected-medicine-wrapper').remove();

    }
}
</script>