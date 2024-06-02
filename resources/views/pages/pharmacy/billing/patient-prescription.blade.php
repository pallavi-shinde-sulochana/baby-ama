@extends('base.pharmacy-dashboard')
@section('pharmacy-content')
    <style type="text/css">
        .error-div {
            color: red;
        }
        .error-input {
            border: 1px solid red !important;
        }
    </style>
    <div class="pharmacy medicine-stacklist baby-border p-5" style="margin-top: 50px;">
        {{-- head --}}
        <div class="row mx-0 align-items-center justify-content-between py-4">
            {{-- <h1>Single User Details</h1> --}}

            {{-- <a href="{{ route('pharmacy.billing.patient.invoice','20') }}"
                                class="ps-0 inline-block sidebar-link">Get Invoice</a> --}}
            <div class="head baby-shadow py-3 px-5">
                <div class="row px-5 py-4 align-items-center justify-content-between">
                    <div class="col-12 col-md-5 col-lg-3 col-xl-2">
                        <div class="patient-img d-flex justify-content-center align-items-center mx-auto">
                            @php
                                $f = substr($user->first_name,0,1);
                                $l = substr($user->last_name,0,1);
                            @endphp
                            <p class="name mb-0">
                            {{  strtoupper($f.$l) }}
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-7 col-lg-5 col-xl-6">
                        <div class="patient-info">
                            <p class="name"><b>{{ ucfirst($user->first_name)." ".ucfirst($user->last_name) }}</b> </p>
                            <p class="doctor-patinet-app-list-color">UMR NO. {{ $user->umr_no  }}</p>
                            <p class="doctor-patinet-app-list-color"><span class="fw-normal"> Age: </span> {{ $user->age  }}</p>
                            <p class="doctor-patinet-app-list-color">
                                <span class="fw-normal"> Blood Group: </span> {{ isset($user->blood_group) ?  $user->blood_group : "Not Mentioned"  }}
                            </p>
                            <p class="doctor-patinet-app-list-color">
                                <span class="fw-normal"> O/P No: </span> {{ $user->op_no  }}
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-lg-4 mt-4 mt-lg-0">
                        <div class="text-center">
                            <a class="pharma-btn primary"
                                href="{{ route('pharmacy.billing.patient.invoice', ['prid'=>$prescription_id, 'userid'=>$user->user_id]) }}" contenteditable="false"
                                style="cursor: pointer;">Get Invoice</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-0">
            <div class="col-12 col-md-11 col-lg-10  baby-border p-3 rounded-1  mb-3">
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 col-sm-4 col-md-6 col-lg-6 ">
                        <h4 class="text-baby-v2 font-medium mb-md-0">Drug and Prescription </h4>
                    </div>
                    <div class="col-12 col-sm-8 col-md-9 col-lg-6 text-end">
                        <a class="baby-primary-btn" data-bs-toggle="modal" data-bs-target="#pharmaAddMed"
                            href="http://babyama.test/doctor/appointment/26/patient/202/medicine/40">+
                            Add/Modify Prescriptions</a>
                    </div>
                </div>
            </div>
        </div>
        {{-- precriptions --}}
        <div class="row mx-0 ">

            <div class="medicine-list px-0 col-12 col-md-11 col-lg-10">
                <div class="prescription-table baby-border border-bottom-0 my-3 rounded-1">
                    <div class="table-responsive ">
                        <table class="table mb-0">
                            <thead class="table-light bg-color-v1">
                                <tr>
                                    <th scope="col" class="text-center">S.No</th>
                                    <th scope="col" class="bg-color-v1 p-name">MEDICINE</th>
                                    <th scope="col" class="bg-color-v1 text-center">DOSAGE</th>
                                    <th scope="col" class="bg-color-v1 text-center">TIMING</th>
                                    <th scope="col" class="bg-color-v1 text-center ">RELATION TO FOOD</th>
                                    <th scope="col" class="bg-color-v1 text-center">FOLLOW UP DAYS</th>
                                    <th scope="col" class="bg-color-v1 text-center">QTY</th>
                                   {{-- 
                                   <th scope="col" class="bg-color-v1 text-center">PRESCRIPTION BY</th>
                                   --}} 
                                </tr>
                            </thead>
                            <tbody>
                            @php $i = 1; @endphp
                            @foreach($listpm as $key => $val)
                            @php
                            $list_med = App\Models\Medicine::find($val->medicine_id);
                            @endphp
                                <tr>
                                    <th scope="row" class="text-center">{{ $i }}</th>
                                    <td class="text-center">{{ $list_med->name }}</td>
                                    <td class="text-center">{{$val->intake_qty.' '.$val->dosage}}</td>
                                    <td class="text-center">{{$val->timing_when}}</td>
                                    <td class="text-center">{{$val->timing_how}}</td>
                                    <td class="text-center">{{$val->duration}} </td>
                                    <td class="text-center">{{$val->total_qty}}</td>
                                   {{-- <td class="text-center">{{ ($val->prescription_by == '1') ? "Doctor" : "Pharmacy" }}</td> --}}
                                </tr>
                            @php $i++; @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
            <div class="row mx-0 py-3 align-items-center">

                <div class="col-12 d-flex gap-2 align-items-center">
                    <a href="{{ route('pharmacy.billing.prescription.list') }}" class="baby-btn-v1">Back</a>
                </div>
            </div>
            <!-- Add/Modify Search Medicine -->
            <div class="modal fade" id="pharmaAddMed" tabindex="-1" aria-labelledby="pharmaAddMedLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="pharmaAddMedLabel">Add / Modify Medicine</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row mx-0 justify-content-between">
                                <div class="col-12 col-md-5">
                                    <div class="med-search-container py-4">
                                        <form method="GET" id="searchForm">
                                            <div class="med-search">
                                                <div class="search-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                        viewBox="0 0 15 15" fill="none">
                                                        <path
                                                            d="M13.6667 13.6667L10.676 10.6707M12.3333 6.66667C12.3333 8.16956 11.7363 9.6109 10.6736 10.6736C9.6109 11.7363 8.16956 12.3333 6.66667 12.3333C5.16377 12.3333 3.72243 11.7363 2.65973 10.6736C1.59702 9.6109 1 8.16956 1 6.66667C1 5.16377 1.59702 3.72243 2.65973 2.65973C3.72243 1.59702 5.16377 1 6.66667 1C8.16956 1 9.6109 1.59702 10.6736 2.65973C11.7363 3.72243 12.3333 5.16377 12.3333 6.66667Z"
                                                            stroke="#7B7A7C" stroke-linecap="round"></path>
                                                    </svg>
                                                </div>
                                                <div class="search-field-wrap">
                                                    <input type="search" name="search" placeholder="search medicine"
                                                        id="filterMedicine" class="form-control">

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
                                <div class="col-12 col-lg-6">
                                    <div class="prescription-table py-3">
                                        <h3 class="mb-5">Drug and Prescription</h3>
                                        <div class="table-responsive py-3 w-5" id="mydiv">
                                            <table class="table">
                                                <thead class="table-light bg-color-v1">
                                                    <tr>
                                                        <th scope="col" class="text-center">S.No</th>
                                                        <th scope="col" class="bg-color-v1">MEDICINE</th>
                                                        <th scope="col" class="bg-color-v1 text-center">Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                            @php $i = 1; @endphp
                            @foreach($pharmacy as $phkey => $phval)
                            @php
                            $phlist = App\Models\Medicine::find($phval->medicine_id);
                            @endphp

                                <tr>
                                <th scope="row" class="text-center">{{ $i }}</th>
                                <td class="text-center">({{ helperFormatMedicinePrefix($phlist->type) }})
                                {{ $phlist->name }}
                                </td>
                                <td class="text-center">
                            <div class="d-flex">
                            <div class="w-50 d-flex justify-content-center align-items-center">
                            <button class="action-btn" data-bs-toggle="modal" data-bs-target="#EditMedPopModal<?php echo $phval->id; ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 16 16" fill="none">
                            <path d="M10.9921 2.49662C11.1496 2.33917 11.3365 2.21428 11.5422 2.12907C11.7479 2.04386 11.9684 2 12.1911 2C12.4138 2 12.6342 2.04386 12.84 2.12907C13.0457 2.21428 13.2326 2.33917 13.39 2.49662C13.5475 2.65407 13.6724 2.84099 13.7576 3.04671C13.8428 3.25242 13.8867 3.47291 13.8867 3.69557C13.8867 3.91824 13.8428 4.13873 13.7576 4.34444C13.6724 4.55016 13.5475 4.73708 13.39 4.89453L5.29712 12.9875L2 13.8867L2.89921 10.5895L10.9921 2.49662Z"  stroke="#667085" stroke-width="1.11111"
                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                                        </svg>
                                                                    </button>
                                                                </div>
                            <div class="w-50 d-flex justify-content-center align-items-center">
                            <button class="action-btn" onclick="delete_medicine('<?php echo $phval->id; ?>');">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                            viewBox="0 0 16 16" fill="none">
                            <path d="M2.66675 4.48933H3.91141M3.91141 4.48933H13.8687M3.91141 4.48933V13.202C3.91141 13.5321 4.04255 13.8487 4.27597 14.0821C4.50939 14.3155 4.82598 14.4467 5.15608 14.4467H11.3794C11.7095 14.4467 12.0261 14.3155 12.2595 14.0821C12.4929 13.8487 12.6241 13.5321 12.6241 13.202V4.48933H3.91141ZM5.77841 4.48933V3.24467C5.77841 2.91456 5.90955 2.59797 6.14297 2.36455C6.37639 2.13113 6.69297 2 7.02308 2H9.51241C9.84252 2 10.1591 2.13113 10.3925 2.36455C10.6259 2.59797 10.7571 2.91456 10.7571 3.24467V4.48933M7.02308 7.601V11.335M9.51241 7.601V11.335"
                            stroke="#FF505B" stroke-width="1.11111"
                            stroke-linecap="round" stroke-linejoin="round"></path>
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
                        <div class="modal-footer">
                            <button type="button" class="baby-secondary-btn border-1"
                                data-bs-dismiss="modal">Close</button>
<!--                             <button type="button" class="baby-primary-btn border-1">Save changes</button>
 -->                        </div>
                    </div>
                </div>
            </div>

   <!-- medicine properties modal  -->
            @foreach ($medicines as $medicine1)
                @php
                    $getType = $medicine1->dosage ? ' (' . $medicine1->dosage . ')' : '';
                    $fullName = helperFormatMedicinePrefix($medicine1->type) . ' ' . $medicine1->name . $getType;
                @endphp
<form action="{{ route('pharmacy.billing.prescription.medicine.post', ['prid' => $prescription_id ]) }}"
                    method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">
                    <input type="hidden" name="pr_add_edit" id="pr_add_edit" value="add">
                    <input type="hidden" name="medicine_id" id="medicine_id" value="{{ $medicine1->id }}">

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
            @foreach ($pharmacy as $list_pres1)
                @php
                    $list_medicine1 = App\Models\Medicine::find($list_pres1->medicine_id);
                    $getType = $list_medicine1->dosage ? ' (' . $list_medicine1->dosage . ')' : '';
                    $fullName = helperFormatMedicinePrefix($list_medicine1->type) . '' . $list_medicine1->name . $getType;

                    $row_values = explode(',', $list_pres1->timing_when);

                @endphp

               <form action="{{ route('pharmacy.billing.prescription.medicine.post', ['prid' => $prescription_id ]) }}" method="POST">
                    @csrf
                    <input type="hidden" name="user_id" id="user_id" value="{{ $user->user_id }}">
                    <input type="hidden" name="pr_add_edit" id="pr_add_edit" value="update">
                    <input type="hidden" name="medicine_id" id="medicine_id" value="{{ $list_pres1->medicine_id }}">
                    <input type="hidden" name="id" id="edit_id" value="{{ $list_pres1->id }}">
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
    </div>
@endsection

<script type="text/javascript">
     function delete_medicine(id) {
        var delid = id;
        var actionUrl = "{{ route('pharmacy.billing.delete.medicine') }}" + "?remid=" + delid;
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
            }
        });
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
            $("#add_chkbox_" + id).attr("class", "row mx-0");
            error = 1;
        } else {
            $("#add_chkbox_" + id).attr("class", "row mx-0 error-input");
            error = 0;
        }
        if (error == 1) {
            var x = document.getElementById("btn_" + id).type = "submit";
        }
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
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);

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
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);

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
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);

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
        $("#total_cnt_" + id).text(total);
        if (total > 1)
            $("#total_dg_" + id).text(dosage + 's');
        else
            $("#total_dg_" + id).text(dosage);

    }
</script>
