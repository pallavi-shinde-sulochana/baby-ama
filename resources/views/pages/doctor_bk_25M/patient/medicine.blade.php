@extends('base.doctor-dashboard')
@section('doctor-content')
    @php

        // dd($data->prescriptionMedicine);
    @endphp

    <style type="text/css">
        .error-div {
            color: red;
            /* border: 1px solid red;*/

        }

        .error-input {
            border: 1px solid red !important;
        }
    </style>

    <section class="doctor-patinet-appointment pt-5">
        <!-- New  -->
        <!-- Header  -->
        <div class="header ">
            <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
                <div class="col-1 position-absolute">
                    {{-- <a href="{{route('doctor.appointment.patient.details',$patient->id)}}"> --}}
                    {{-- <a href="{{route('doctor.appointment.patient',$appoinment->id)}}"> --}}
                    <a href="{{  url()->previous() }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                            fill="none">
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
                            @foreach ($medicines as $medicine)
                                @php
                                    $getType = $medicine->dosage ? ' (' . $medicine->dosage . ')' : '';
                                    $fullName = helperFormatMedicinePrefix($medicine->type) . ' ' . $medicine->name . $getType;
                                @endphp

                                <div class="med-item" data-bs-toggle="modal"
                                    data-bs-target="#MedPopModal{{ $medicine->id }}">
                                    <div class="medicine">
                                        <span
                                            class="m-type pe-1 text-capitalize">({{ helperFormatMedicinePrefix($medicine->type) }})</span>
                                        <span class="m-name">{{ $medicine->name }} </span>
                                        <span class="m-name ms-1">
                                            @if ($medicine->dosage)
                                                {{ '(' . $medicine->dosage . ')' }}
                                            @endif
                                        </span>
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
                            <div class="table-responsive py-3 w-5" id="mydiv">
                                <table class="table">
                                    <thead class="table-light bg-color-v1">
                                        <tr>
                                            <th scope="col" class="text-center">S.No</th>
                                            <th scope="col" class="bg-color-v1">MEDICINE</th>
                                            <th scope="col" class="bg-color-v1 text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $i=1; @endphp
                                        @foreach ($pres as $list_pres)
                                            @php
                                                $list_medicine = App\Models\Medicine::find($list_pres->medicine_id);
                                                $getType = $list_medicine->dosage ? ' (' . $list_medicine->dosage . ')' : '';
                                                $fullName =
                                                    helperFormatMedicinePrefix($list_medicine->type) .
                                                    '
                                    ' .
                                                    $list_medicine->name .
                                                    $getType;
                                            @endphp
                                            <tr>
                                                <th scope="row" class="text-center">{{ $i }}</th>
                                                <td class="">({{ helperFormatMedicinePrefix($list_medicine->type) }})
                                                    {{ $list_medicine->name }}
                                                    @if ($list_medicine->dosage)
                                                        {{ '(' . $list_medicine->dosage . ')' }}
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <div class="d-flex">
                                                        <div class="w-50 d-flex justify-content-center align-items-center">
                    <button class="action-btn" data-bs-toggle="modal" data-bs-target="#EditMedPopModal<?php echo $list_pres->id; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
                        <path d="M10.9921 2.49662C11.1496 2.33917 11.3365 2.21428 11.5422 2.12907C11.7479 2.04386 11.9684 2 12.1911 2C12.4138 2 12.6342 2.04386 12.84 2.12907C13.0457 2.21428 13.2326 2.33917 13.39 2.49662C13.5475 2.65407 13.6724 2.84099 13.7576 3.04671C13.8428 3.25242 13.8867 3.47291 13.8867 3.69557C13.8867 3.91824 13.8428 4.13873 13.7576 4.34444C13.6724 4.55016 13.5475 4.73708 13.39 4.89453L5.29712 12.9875L2 13.8867L2.89921 10.5895L10.9921 2.49662Z"
                                                                        stroke="#667085" stroke-width="1.11111"
                                                                        stroke-linecap="round" stroke-linejoin="round" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                        <div class="w-50 d-flex justify-content-center align-items-center">
                                                            <button class="action-btn"
                                                                onclick="deleteMedicine('<?php echo $list_pres->id; ?>');">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                    height="20" viewBox="0 0 16 16" fill="none">
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
                                            @php $i++; @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- medicine table  -->
            <!-- medicine properties modal  -->
            @foreach ($medicines as $medicine1)
                @php
                    $getType = $medicine1->dosage ? ' (' . $medicine1->dosage . ')' : '';
                    $fullName = helperFormatMedicinePrefix($medicine1->type) . ' ' . $medicine1->name . $getType;
                @endphp
                <form
                    action="{{ route('doctor.appointment.patient.prescription.medicine.post', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="pr_id" id="pr_id" value="{{ $data->id }}">
                    <input type="hidden" name="pr_add_edit" id="pr_add_edit" value="add">
                    <input type="hidden" name="medicine_id" id="medicine_id" value="{{ $medicine1->id }}">
                    <input type="hidden" name="prescription_type" id="prescription_type" value="{{ $type }}">

                    <div class="col-12">
                        <div class="modal fade med-data-modal" id="MedPopModal{{ $medicine1->id }}" tabindex="-1"
                            aria-labelledby="MedPopModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-4">
                                        <h3 class="modal-title fs-5 text-center med-name w-100" id=" MedPopModalLabel">
                                            <span
                                                class="me-2">({{ helperFormatMedicinePrefix($medicine1->type) }})</span>
                                            {{ $medicine1->name }}
                                            <span class="ms-2">({{ $medicine1->dosage }})</span>
                                        </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <!-- Dosage -->
                                            <div class="row mx-0 mb-4 align-items-center">
                                                <div class="col-4 med-prop position-relative">
                                                    Dosage
                                                </div>
                                                <div class="col-8">
                                                    <div class="row justify-content-between align-items-center mx-0">
                                                        <div class="col-6 form-fl px-1">

                                                            <input type="number" class="form-control rounded-0"
                                                                placeholder="0" id="intake_dosage_{{ $medicine1->id }}"
                                                                name="intake_qty" value=""
                                                                onchange="dosage_incnt(this.value,'{{ $medicine1->id }}')"
                                                                step="0.01" min="0.01" required>
                                                        </div>
                                                        <div class="col-6 form-fl px-1">
                                                            {{-- <input type="text" class="form-control rounded-0"
                                                                placeholder="Tab" id="insReportName" name="tab_name"
                                                                value="" disabled> --}}
                                                            <select class="form-control rounded-0" name="dosage"
                                                                id="dosage_{{ $medicine1->id }}"
                                                                onchange="dosagein(this.value,'{{ $medicine1->id }}')">
                                                                <option value="Tablet">Tablet</option>
                                                                <option value="Ml"> ML</option>
                                                                 <option value="Drop"> Drop</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Timing -->
                                            <div class="row mx-0 mb-4 align-items-center">
                                                <div class="col-4 med-prop position-relative"
                                                    id="timing_chkbox_{{ $medicine1->id }}">
                                                    Timing
                                                </div>
                                                <div class="col-8">
                                                    <div class="row mx-0" id="add_chkbox_{{ $medicine1->id }}">
                                                        <div class="col-4 px-1">
                                                            <div class="select-chk">
                                                                <input type="checkbox" id="TMorning_{{ $medicine1->id }}"
                                                                    name="timing_when[]" value="Morning"
                                                                    class="add_chkbox_{{ $medicine1->id }}"
                                                                    onClick="chkcnt({{ $medicine1->id }})">
                                                                <label for="TMorning">Morning</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 px-1">
                                                            <div class="select-chk">
                                                                <input type="checkbox"
                                                                    id="Tafternoon_{{ $medicine1->id }}"
                                                                    name="timing_when[]" value="Noon"
                                                                    class="add_chkbox_{{ $medicine1->id }}"
                                                                    onClick="chkcnt({{ $medicine1->id }})">
                                                                <label for="Tafternoon">Noon</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 px-1">
                                                            <div class="select-chk">
                                                                <input type="checkbox" id="Tevening_{{ $medicine1->id }}"
                                                                    name="timing_when[]" value="Night"
                                                                    class="add_chkbox_{{ $medicine1->id }}"
                                                                    onClick="chkcnt({{ $medicine1->id }})">
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
                                                                <input type="radio" id="timing_how" name="timing_how[]"
                                                                    value="beforefood">
                                                                <label for="bfood">Before Food</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 px-1">
                                                            <div class="select-chk">
                                                                <input type="radio" id="timing_how" name="timing_how[]"
                                                                    value="afterfood" checked>
                                                                <label for="food">After Food</label>
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
                                                        <div class="col-6 px-1 form-fl">
                                                            <!--   <input type="number" class="form-control rounded-0" placeholder="0"
                                                                    id="followUpDays" name="tab_count_days" value="" step="1" min="0"
                                                                    oninput="validity.valid||(value='');" onKeyup="followUpDays(this.value)">
                                                      -->
                                                            <input type="number" class="form-control rounded-0"
                                                                placeholder="0" id="totaldays_{{ $medicine1->id }}"
                                                                name="tab_count_days" step="1" min="1" pattern="[0-9]" onkeypress="return !(event.charCode == 46)"
                                                                onchange="followUpDays(this.value,'{{ $medicine1->id }}')"
                                                                required>
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
                                                            <span class="me-2"
                                                                id="total_cnt_{{ $medicine1->id }}">0</span>
                                                            <span id="total_dg_{{ $medicine1->id }}"></span>
                                                            <input type="hidden" name="total_qty"
                                                                id="total_qty_{{ $medicine1->id }}" value="5">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mx-0 mb-4 align-items-center">
                                                <div class="col-4 med-prop position-relative">
                                                    Notes
                                                </div>
                                                <div class="col-8">
                                                    <div class="row mx-0 align-items-center">
                                                        <div class="col-6 px-1 form-fld">
                                                            <textarea rows="" class="form-control mb-5 pb-5" id="notes_{{ $medicine1->id }}" name="notes"><?php if(isset($getdata->notes)) { echo $getdata->notes; } ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="baby-secondary-btn border-1"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="baby-primary-btn border-1"
                                            id="btn_{{ $medicine1->id }}"
                                            onClick="valthis({{ $medicine1->id }})">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
            <!-- medicine property modal -->

            <!-- Start Edit Medicine Modal -VG -->
            @foreach ($pres as $list_pres1)
                @php
                    $list_medicine1 = App\Models\Medicine::find($list_pres1->medicine_id);
                    $getType = $list_medicine1->dosage ? ' (' . $list_medicine1->dosage . ')' : '';
                    $fullName = helperFormatMedicinePrefix($list_medicine1->type) . '' . $list_medicine1->name . $getType;

                    $row_values = explode(',', $list_pres1->timing_when);

                @endphp

                <form
                    action="{{ route('doctor.appointment.patient.prescription.medicine.post', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="pr_id" id="pr_id" value="{{ $data->id }}">
                    <input type="hidden" name="pr_add_edit" id="pr_add_edit" value="update">
                    <input type="hidden" name="medicine_id" id="medicine_id" value="{{ $list_pres1->medicine_id }}">
                    <input type="hidden" name="id" id="edit_id" value="{{ $list_pres1->id }}">
                    <input type="hidden" name="prescription_type" id="prescription_type" value="{{ $type }}">

                    <div class="col-12">
                    <div class="modal fade med-data-modal" id="EditMedPopModal{{ $list_pres1->id }}" tabindex="-1"
                            aria-labelledby="MedPopModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-4">
                                        <h3 class="modal-title fs-5 text-center med-name w-100" id=" MedPopModalLabel">
                                            <span
                                                class="me-2">({{ helperFormatMedicinePrefix($list_medicine1->type) }})</span>
                                            {{ $list_medicine1->name }}
                                            <span class="ms-2">({{ $medicine1->dosage }})</span>
                                        </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="">
                                            <!-- Dosage -->
                                            <div class="row mx-0 mb-4 align-items-center">
                                                <div class="col-4 med-prop position-relative">Dosage</div>
                                                <div class="col-8">
                                                    <div class="row justify-content-between align-items-center mx-0">
                                                        <div class="col-6 form-fl px-1">
                                                            <input type="number" class="form-control rounded-0"
                                                                placeholder="0" id="intake_dosage_{{ $list_pres1->id }}"
                                                                name="intake_qty" value="{{ $list_pres1->intake_qty }}"
                                                                onchange="dosage_incnt(this.value,'{{ $list_pres1->id }}')"
                                                                step="0.01" min="0.01">
                                                        </div>
                                                        <div class="col-5 form-fl px-1">
                                                            <!-- <input type="text" class="form-control rounded-0" placeholder="Tab"
                                                                    id="insReportName" name="tab_name" value="" disabled> -->
                                                            <select class="form-control rounded-0" name="dosage"
                                                                id="dosage_{{ $list_pres1->id }}"
                                                                onchange="dosagein(this.value,'{{ $list_pres1->id }}')">
                                                                <option value="Tablet">Tablet</option>
                                                                <option value="Ml">ML</option>
                                                                <option value="Drop">Drop</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Timing -->

                                            <div class="row mx-0 mb-4 align-items-center">
                                                <div class="col-4 med-prop position-relative"
                                                    id="timing_chkbox_{{ $list_pres1->id }}">
                                                    Timing
                                                </div>

                                                <div class="col-8">
                                                    <div class="row mx-0" id="edit_chkbox_{{ $list_pres1->id }}">
                                                        <div class="col-4 px-1">
                                                            <div class="select-chk">
                                                                <input type="checkbox"
                                                                    id="TMorning_{{ $list_pres1->id }}"
                                                                    name="timing_when[]" value="Morning"
                                                                    <?php echo in_array('Morning', $row_values) ? 'checked' : ''; ?>
                                                                    class="edit_chkbox_{{ $list_pres1->id }}"
                                                                    onClick="chkcnt({{ $list_pres1->id }})">
                                                                <label for="TMorning">Morning</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 px-1">
                                                            <div class="select-chk">
                                                                <input type="checkbox"
                                                                    id="Tafternoon_{{ $list_pres1->id }}"
                                                                    name="timing_when[]" value="Noon"
                                                                    <?php echo in_array('Noon', $row_values) ? 'checked' : ''; ?>
                                                                    class="edit_chkbox_{{ $list_pres1->id }}"
                                                                    onClick="chkcnt({{ $list_pres1->id }})">
                                                                <label for="Tafternoon">Noon</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-4 px-1">
                                                            <div class="select-chk">
                                                                <input type="checkbox"
                                                                    id="Tevening_{{ $list_pres1->id }}"
                                                                    name="timing_when[]" value="Night"
                                                                    <?php echo in_array('Night', $row_values) ? 'checked' : ''; ?>
                                                                    class="edit_chkbox_{{ $list_pres1->id }}"
                                                                    onClick="chkcnt({{ $list_pres1->id }})">
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
                                                                <input type="radio" id="timing_how" name="timing_how[]"
                                                                    value="beforefood"
                                                                    {{ $list_pres1->timing_how == 'beforefood' ? 'checked' : '' }}>
                                                                <label for="bfood">Before Food</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6 px-1">
                                                            <div class="select-chk">
                                                                <input type="radio" id="timing_how" name="timing_how[]"
                                                                    value="afterfood"
                                                                    {{ $list_pres1->timing_how == 'afterfood' ? 'checked' : '' }}>
                                                                <label for="food">After Food</label>
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
                                                        <div class="col-6 px-1 form-fl">
                                                            <!--   <input type="number" class="form-control rounded-0" placeholder="0"
                                                                    id="followUpDays" name="tab_count_days" value="" step="1" min="0"
                                                                    oninput="validity.valid||(value='');" onKeyup="followUpDays(this.value)">
                                                      -->
                                                            <input type="number" class="form-control rounded-0"
                                                                placeholder="0" id="totaldays_{{ $list_pres1->id }}"
                                                                name="tab_count_days" step="1" min="1" pattern="[0-9]" onkeypress="return !(event.charCode == 46)"
                                                                onchange="followUpDays(this.value,'{{ $list_pres1->id }}')"
                                                                value="{{ $list_pres1->duration }}">
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
                                                            <span class="me-2"
                                                                id="total_cnt_{{ $list_pres1->id }}">{{ $list_pres1->total_qty }}</span>
                                                            <span
                                                                id="total_dg_{{ $list_pres1->id }}">{{ $list_pres1->dosage }}</span>
                                                            <input type="hidden" name="total_qty"
                                                                id="total_qty_{{ $list_pres1->id }}" value="5">

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row mx-0 mb-4 align-items-center">
                                                <div class="col-4 med-prop position-relative">
                                                    Notes
                                                </div>
                                                <div class="col-8">
                                                    <div class="row mx-0 align-items-center">
                                                        <div class="col-6 px-1 form-fld">
                                                            <textarea rows="" class="form-control mb-5 pb-5" id="notes_{{ $list_pres1->id }}" name="notes"><?php if(isset($list_pres1->notes)) { echo $list_pres1->notes; } ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer border-0">
                                        <button type="button" class="baby-secondary-btn border-1"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="button" class="baby-primary-btn border-1"
                                            id="edit_btn_{{ $list_pres1->id }}"
                                            onClick="update_valthis({{ $list_pres1->id }})">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach

        </div>
        <!-- New -->

    </section>
    <!-- Modal -->
@endsection
<script type="text/javascript">
    function chkcnt(id) {
        var days = $("#totaldays_" + id).val();
        var dosage = $("#dosage_" + id).val();
        var in_dosage = $("#intake_dosage_" + id).val();

        var noon = $("#Tafternoon_" + id).is(":checked");
        var mrng = $("#TMorning_" + id).is(":checked");
        var evng = $("#Tevening_" + id).is(":checked");
        var m_val = n_val = e_val = 0;

        if (noon) {
            n_val = 1;
        }
        if (mrng) {
            m_val = 1;
        }
        if (evng) {
            e_val = 1;
        }

        var total = in_dosage * days * (m_val + n_val + e_val);

        $("#total_qty_" + id).val(total);

        /*if (dosage != 'Ml') {*/
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);
        /*if } else {
            $("#total_cnt_" + id).text('-');
            $("#total_dg_" + id).text('');
        }*/
    }

    function followUpDays(days, id) {
        var days = days;
        var dosage = $("#dosage_" + id).val();
        var in_dosage = $("#intake_dosage_" + id).val();
        var noon = $("#Tafternoon_" + id).is(":checked");
        var mrng = $("#TMorning_" + id).is(":checked");
        var evng = $("#Tevening_" + id).is(":checked");
        var m_val = n_val = e_val = 0;

        if (noon) {
            n_val = 1;
        }
        if (mrng) {
            m_val = 1;
        }
        if (evng) {
            e_val = 1;
        }

        var total = in_dosage * days * (m_val + n_val + e_val);

        $("#total_qty_" + id).val(total);

        /*if (dosage != 'Ml') {*/
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);
        /*} else {
            $("#total_cnt_" + id).text('-');
            $("#total_dg_" + id).text('');
        }*/
    }

    function dosage_incnt(intake, id) {
        var in_dosage = intake;
        var dosage = $("#dosage_" + id).val();
        var days = $("#totaldays_" + id).val();
        var noon = $("#Tafternoon_" + id).is(":checked");
        var mrng = $("#TMorning_" + id).is(":checked");
        var evng = $("#Tevening_" + id).is(":checked");
        var m_val = n_val = e_val = 0;

        if (noon) {
            n_val = 1;
        }
        if (mrng) {
            m_val = 1;
        }
        if (evng) {
            e_val = 1;
        }

        var total = in_dosage * days * (m_val + n_val + e_val);


        $("#total_qty_" + id).val(total);

        /*if (dosage != 'Ml') {*/
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);
        /*} else {
            $("#total_cnt_" + id).text('-');
            $("#total_dg_" + id).text('');
        }*/
    }

    function dosagein(dos, id) {
        var dosage = dos;
        var in_dosage = $("#intake_dosage_" + id).val();
        var days = $("#totaldays_" + id).val();

        var noon = $("#Tafternoon_" + id).is(":checked");
        var mrng = $("#TMorning_" + id).is(":checked");
        var evng = $("#Tevening_" + id).is(":checked");
        var m_val = n_val = e_val = 0;

        if (noon) {
            n_val = 1;
        }
        if (mrng) {
            m_val = 1;
        }
        if (evng) {
            e_val = 1;
        }

        var total = in_dosage * days * (m_val + n_val + e_val);


        $("#total_qty_" + id).val(total);

        /*if (dosage != 'Ml') {*/
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);
        /*}
        else {
            $("#total_cnt_" + id).text('-');
            $("#total_dg_" + id).text('');
        }*/
    }
</script>
<script type="text/javascript">
    window.addEventListener("DOMContentLoaded", (event) => {

        jQuery("input[name=intake_qty]").on('click', function() {
            jQuery("input[name=intake_qty]").prop('checked', false)
            var $box = jQuery(this);
            $box.prop("checked", true);

        });
        // openDosageModel();
    });

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
        var actionUrl = "{{ route('doctor.search.medicine') }}" + "?search=" + search;

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
                        " type='button' onclick='addMedicineToList(" + itemData.id + "," +
                        name +
                        ")' class='btn btn-medicine-tag'>" + itemData.name + getDose +
                        "</button>");
                })
            }
        });


    }


    function editMedicine(id) {
        var editid = id;
        var actionUrl = "{{ route('doctor.edit.medicine') }}" + "?edit=" + editid;

        jQuery.ajax({
            url: actionUrl,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                var data = res.data;
                var chk = (data.timing_when).split(',');

                console.log(data);
                console.log(chk[0]);
                if (data.total_qty > 1) {
                    var dos = data.dosage + 's';
                } else {
                    var dos = data.dosage;
                }

                if (data.timing_when == "Morning,Noon") {
                    $("#edit_TMorning").attr("checked", "checked");
                    $("#edit_Tafternoon").attr("checked", "checked");

                }

                if (data.timing_how == "beforefood") {
                    $("#edit_timing_how_bf").attr("checked", "checked");
                    $("#edit_timing_how_af").removeAttr('checked');
                } else if (data.timing_how == "afterfood") {
                    //if(data.timing_how == 'afterfood')
                    $("#edit_timing_how_af").attr("checked", "checked");
                    $("#edit_timing_how_bf").removeAttr('checked');
                }

                $("#edit_id").val(data.id);
                $("#edit_pr_id").val(data.prescription_id);
                $("#edit_medicine_id").val(data.medicine_id);
                $("#edit_intake_dosage").val(data.intake_qty);
                $("#edit_dosage").val(data.dosage).change();
                $("#edit_total_qty").val(data.total_qty);
                $("#edit_totaldays").val(data.duration);

                $("#edit_total_cnt").text(data.total_qty);
                $("#edit_total_dg").text(dos);


                // jQuery("#EditMedPopModal").prop("id", 'EditMedPopModal'+data.id);
                /*                console.log(res);
                console.log(jQuery("#EditMedPopModal").attr("id", 'EditMedPopModal'+data.id));*/

            }
        });
    }

    function deleteMedicine(id) {
        var delid = id;
        var actionUrl = "{{ route('doctor.delete.medicine') }}" + "?delid=" + delid;
        if (confirm('Are you sure to delete this record ?')) {
            jQuery.ajax({
                url: actionUrl,
                type: 'GET',
                dataType: 'json', // added data type
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    //alert("Record deleted successfully");
                    $("#mydiv").load(location.href + " #mydiv");
                }
            });
        }
    }

    function valthis(id) {
        var intake_dosage = document.getElementById('intake_dosage_' + id).value;
        var totaldays = document.getElementById('totaldays_' + id).value;
        var checkBoxes = document.getElementsByClassName('add_chkbox_' + id);
        var isChecked = false;
        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                isChecked = true;
            };
        };
        // alert(checkBoxes[i].checked);

        var error = 0;
        if (intake_dosage == '') {
            $("#intake_dosage_" + id).attr("class", "form-control rounded-0 error-input");
            error = 0;
        } else {
            $("#intake_dosage_" + id).attr("class", "form-control rounded-0");
            error = 1;
        }
        if (totaldays == '') {
            $("#totaldays_" + id).attr("class", "form-control rounded-0 error-input");
            error = 0;
        } else {
            $("#totaldays_" + id).attr("class", "form-control rounded-0");
            error = 1;
        }
        if (isChecked) {
            //$("#timing_chkbox_"+id).attr("class", "col-4 med-prop position-relative error-div");
            $("#add_chkbox_" + id).attr("class", "row mx-0");
            error = 1;

        } else {
            //$("#timing_chkbox_"+id).attr("class", "col-4 med-prop position-relative");
            $("#add_chkbox_" + id).attr("class", "row mx-0 error-input");
            error = 0;

        }
        if (error == 1) {
            var x = document.getElementById("btn_" + id).type = "submit";
        }
        /* if (!isChecked) {
               var x = document.getElementById("btn_"+id).type = "submit";
             } else {
             $("#timing_chkbox_"+id).attr("class", "row mx-0 mb-4 align-items-center error-div");
                 //alert( 'Please, check at least one checkbox!' );
             }  */
    }

    function update_valthis(id) {
        var intake_dosage = document.getElementById('intake_dosage_' + id).value;
        var totaldays = document.getElementById('totaldays_' + id).value;
        var checkBoxes = document.getElementsByClassName('edit_chkbox_' + id);
        var isChecked = false;

        for (var i = 0; i < checkBoxes.length; i++) {
            if (checkBoxes[i].checked) {
                isChecked = true;
            };
        };
        var error = 0;
        if (intake_dosage == '') {
            $("#intake_dosage_" + id).attr("class", "form-control rounded-0 error-input");
            error = 0;
        } else {
            $("#intake_dosage_" + id).attr("class", "form-control rounded-0");
            error = 1;
        }
        if (totaldays == '') {
            $("#totaldays_" + id).attr("class", "form-control rounded-0 error-input");
            error = 0;
        } else {
            $("#totaldays_" + id).attr("class", "form-control rounded-0");
            error = 1;
        }
        if (isChecked) {
            $("#edit_chkbox_" + id).attr("class", "row mx-0");
            error = 1;
        } else {
            $("#edit_chkbox_" + id).attr("class", "row mx-0 error-input");
            error = 0;
        }
        if (error == 1) {
            var x = document.getElementById("edit_btn_" + id).type = "submit";
        }

    }
</script>
