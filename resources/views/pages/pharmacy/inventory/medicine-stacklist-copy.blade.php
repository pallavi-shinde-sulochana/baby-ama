@extends('base.pharmacy-dashboard')
@section('pharmacy-content')
    <style type="text/css">
        .cls_mandatory {
            color: red;
        }

        .error-input {
            border: 1px solid red !important;
        }
    </style>
    <div class="pharmacy medicine-stacklist pt-5" style="margin-top: 50px;">
        <h2 class="h2 text-primary mb-4">Inventory</h2>
        <div class="row mx-0 align-items-center justify-content-between">
            <div class="col-12 col-sm-4 col-md-3 col-lg-3 px-0">
                <h3 class="text-baby-v2 font-medium mb-md-0">Medicine List</h3>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-lg-6">
                <div class="row mx-0">
                    <div class="med-search-container col-8 col-md-8">
                        <form method="GET" id="searchForm">
                            <div class="med-search rounded-2">
                                <div class="search-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                        viewBox="0 0 15 15" fill="none">
                                        <path
                                            d="M13.6667 13.6667L10.676 10.6707M12.3333 6.66667C12.3333 8.16956 11.7363 9.6109 10.6736 10.6736C9.6109 11.7363 8.16956 12.3333 6.66667 12.3333C5.16377 12.3333 3.72243 11.7363 2.65973 10.6736C1.59702 9.6109 1 8.16956 1 6.66667C1 5.16377 1.59702 3.72243 2.65973 2.65973C3.72243 1.59702 5.16377 1 6.66667 1C8.16956 1 9.6109 1.59702 10.6736 2.65973C11.7363 3.72243 12.3333 5.16377 12.3333 6.66667Z"
                                            stroke="#7B7A7C" stroke-linecap="round"></path>
                                    </svg>
                                </div>
                                <div class="search-field-wrap w-100">
                                    <input type="search" name="search" placeholder="Search by name, item code"
                                        id="filterpharmaMedicine" class="form-control" onKeyup="medicinelist(this.value)">

                                    {{-- <input type="search" name="search" placeholder="Search by name, item code"
                                        id="filterpharmaMedicine" class="form-control"> --}}

                                    <!-- <input type="search" name="search" placeholder="search medicine" id="search" class="form-control w-100" /> -->
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="sort-medicine col-4 col-md-4">
                        <div class="dropdown">
                            <button class="dropdown-toggle sort-btn baby-btn-v1 rounded-2 w-100" type="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="pe-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 20 20" fill="none">
                                        <path d="M5 10H15M2.5 5H17.5M7.5 15H12.5" stroke="#344054" stroke-width="1.67"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg></span>
                                Sort
                            </button>
                            <ul class="dropdown-menu dropdown-menu-light">
                                <li><a class="dropdown-item active" href="#" onclick="medicinelist('asc')">Item Name
                                        A-Z</a></li>
                                <li><a class="dropdown-item" href="#" onclick="medicinelist('desc')">Item Name Z-A</a>
                                </li>
                                <!-- <li><a class="dropdown-item" href="#">Something else here</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Separated link</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
            <div class="medicine-list px-0">
                <div class="prescription-table py-3">
                    <div class="table-responsive py-3">
                        <table class="table">
                            <thead class="table-light bg-color-v1">
                                <tr>
                                    <th scope="col" class="text-center">S.No</th>
                                    <th scope="col" class="bg-color-v1 text-center">Item Name</th>
                                    <th scope="col" class="bg-color-v1 text-center">Item code</th>
                                    <th scope="col" class="bg-color-v1 text-center">Type</th>
                                    <th scope="col" class="bg-color-v1 text-center">Shelf No.</th>
                                    <th scope="col" class="bg-color-v1 text-center">HSN Code</th>
                                     <th scope="col" class="bg-color-v1 text-center">Total Stock</th>
                                    <th scope="col" class="bg-color-v1 text-center">Batch No. & Expire date</th>
                                     <th scope="col" class="bg-color-v1 text-center">Available stock</th>
                                    <th scope="col" class="bg-color-v1 text-center">Retail Price</th>
                                    <th scope="col" class="bg-color-v1 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $i = 1; @endphp

                                @foreach ($medicines as $key => $getmed)
                                    <tr>
                                        <th scope="row" class="text-center">{{ $i }}</th>
                                        <td class="text-center">{{ ucfirst($getmed->name) }}</td>
                                        <td class="text-center">{{ $getmed->item_code }}</td>
                                        <td class="text-center">{{ ucfirst($getmed->type) }}</td>
                                        <td class="text-center">{{ $getmed->self_no }}</td>
                                        <td class="text-center">{{ $getmed->hsn_code }}</td>
                                        @php
                                        $sell = App\Models\PrescriptionMedicine::where('medicine_id' , $getmed->id)->get()->sum('total_qty');
                                        $total_stock = $getmed->buying_unit * $getmed->unit_ratio;
                                        $available_stock = $total_stock - $sell;
                                        $re_order_level = $getmed->re_order_level;

                                        if($available_stock <= 0)
                                        {
                                            $available_stock = 0;
                                            $clr = 'color:#FF0000';
                                        }
                                        else if($available_stock <= $re_order_level )
                                        {
                                            $available_stock = $available_stock;
                                            $clr = 'color:#D2BD00';
                                        }
                                        else{
                                            $available_stock = $available_stock;
                                            $clr = 'color:green';
                                        }


                                    @endphp
                                    <td class="text-center">{{ $total_stock }}</td>
                                        @if ($getmed->batch_no != '' && $getmed->expiry_date != '')
                                            <td class="text-center">{{ $getmed->batch_no }} &
                                                {{ $getmed->expiry_date != '' ? date('d/m/y', strtotime($getmed->expiry_date)) : 'Nil' }}
                                            </td>
                                        @elseif($getmed->batch_no != '' || $getmed->expiry_date != '')
                                            <td class="text-center">
                                                {{ $getmed->batch_no != '' ? $getmed->batch_no : 'Nil' }} &
                                                {{ $getmed->expiry_date != '' ? date('d/m/y', strtotime($getmed->expiry_date)) : 'Nil' }}
                                            </td>
                                        @else
                                            <td class="text-center"> Nil </td>
                                        @endif
                                        <td class="text-center" style="{{ $clr; }}">{{ $available_stock }}</td>
                                        <td class="text-center"><span>&#8377;</span>
                                            {{ $getmed->selling_price != '' ? $getmed->selling_price : '0' }}</td>
                                        <!--  <td class="text-center">300</td> -->
                                        <td class="text-center">
                                            <button type="button" class="btn border-0 edit-icon" data-bs-toggle="modal"
                                                data-bs-target="#MedProperties_{{ $getmed->id }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="18"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path
                                                        d="M16.9882 3.74493C17.2244 3.50876 17.5048 3.32142 17.8133 3.1936C18.1219 3.06579 18.4526 3 18.7866 3C19.1206 3 19.4514 3.06579 19.7599 3.1936C20.0685 3.32142 20.3489 3.50876 20.5851 3.74493C20.8212 3.98111 21.0086 4.26148 21.1364 4.57006C21.2642 4.87863 21.33 5.20936 21.33 5.54336C21.33 5.87736 21.2642 6.20809 21.1364 6.51666C21.0086 6.82524 20.8212 7.10562 20.5851 7.34179L8.44568 19.4812L3.5 20.83L4.84882 15.8843L16.9882 3.74493Z"
                                                        stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </td>
                                    </tr>
                                    @php $i++; @endphp
                                @endforeach
                            </tbody>
                        </table>

                    </div>

                    {{ $medicines->links('pagination::v1') }}

                    <!-- <div class="row mx-0 py-3 align-items-center">
                                <div class="col-5">
                                    Page 1 of 10
                                </div>
                                <div class="col-7 d-flex gap-2 align-items-center justify-content-end">
                                    <button type="button" class="baby-btn-v1">Prev</button>
                                    <button type="button" class="baby-btn-v1">Next</button>
                                </div>
                            </div>
                        </div> -->





                    <!-- Edit Medicine -->
                    @foreach ($medicines as $key1 => $getmed1)
                        <div class="modal fade modal-edit-medicine" id="MedProperties_{{ $getmed1->id }}"
                            data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-labelledby="MedPropertiesLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="MedPropertiesLabel">Update {{ $getmed1->name }}</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="pharmacy medicine-stacklist baby-border">
                                            <div class="row mx-0 align-items-center justify-content-between">
                                                <form action="{{ route('pharmacy.inventory.addmedicine.post') }}"
                                                    method="POST">
                                                    @csrf
                                                    <input type="hidden" id="edit_med_id_{{ $getmed1->id }}"
                                                        name="medId" value="{{ $getmed1->id }}">
                                                    <div class="medicine-list px-0 col-12">
                                                        <div class="row mx-0">
                                                            <div id="item_name" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="item_name" class="form-label">Item Name:
                                                                        <span class="cls_mandatory">*</span></label>
                                                                    <input type="text" class="form-field w-100"
                                                                        placeholder="Name"
                                                                        id="edit_item_name_{{ $getmed1->id }}"
                                                                        name="item_name"
                                                                        value="{{ $getmed1->name }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="item_code" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="item_code" class="form-label">Item Code:
                                                                        <span class="cls_mandatory">*</span></label>
                                                                    <input type="text" class="form-field w-100"
                                                                        placeholder="Item Code"
                                                                        id="edit_item_code_{{ $getmed1->id }}"
                                                                        name="item_code"
                                                                        value="{{ $getmed1->item_code }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="item_type" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="item_type" class="form-label">Item Type:
                                                                        <span class="cls_mandatory">*</span></label>
                                                                    <select class="form-field w-100" name="item_type"
                                                                        id="edit_item_type_{{ $getmed1->id }}">
                                                                        <option value="">Select type</option>
                                                                        <option value="tablet"
                                                                            {{ $getmed1->type == 'tablet' ? 'selected' : '' }}>
                                                                            Tablet</option>
                                                                        <option value="syrup"
                                                                            {{ $getmed1->type == 'syrup' ? 'selected' : '' }}>
                                                                            Syrup</option>
                                                                        <option value="drops"
                                                                            {{ $getmed1->type == 'drops' ? 'selected' : '' }}>
                                                                            Drops</option>
                                                                            <option value="others"
                                                                            {{ $getmed1->type == 'others' ? 'selected' : '' }}>
                                                                            Others</option>
                                                                    </select>
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="suppliers" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="suppliers"
                                                                        class="form-label">Suppliers:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        placeholder="Suppliers"
                                                                        id="edit_suppliers_{{ $getmed1->id }}"
                                                                        name="suppliers"
                                                                        value="{{ $getmed1->suppliers }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>

                                                            <div id="hsn_code" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="hsn_code" class="form-label">HSN
                                                                        Code:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        placeholder="hsn_code"
                                                                        id="edit_hsn_code_{{ $getmed1->id }}"
                                                                        name="hsn_code"
                                                                        value="{{ $getmed1->hsn_code }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="bar_code" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="bar_code" class="form-label">Bar
                                                                        Code:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        placeholder="Bar Code"
                                                                        id="edit_bar_code_{{ $getmed1->id }}"
                                                                        name="bar_code"
                                                                        value="{{ $getmed1->bar_code }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>

                                                            <div id="buying_unit" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="buying_unit" class="form-label">Buying
                                                                        Unit:</label>
                                                                    <input type="number" class="form-field w-100"
                                                                        step="0.01" min="0"
                                                                        placeholder="100.00"
                                                                        id="edit_buying_unit_{{ $getmed1->id }}"
                                                                        name="buying_unit"
                                                                        value="{{ $getmed1->buying_unit }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="buying_price" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="buying_price" class="form-label">Buying
                                                                        Price:</label>
                                                                    <input type="number" class="form-field w-100"
                                                                        step="0.01" min="0"
                                                                        placeholder="100.00"
                                                                        id="edit_buying_price_{{ $getmed1->id }}"
                                                                        name="buying_price"
                                                                        value="{{ $getmed1->buying_price }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="buying_tax" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="buying_tax" class="form-label">Buying
                                                                        Tax:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_buying_tax_{{ $getmed1->id }}"
                                                                        name="buying_tax"
                                                                        value="{{ $getmed1->buying_tax }}"
                                                                        placeholder="Buying Tax">
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>

                                                            <div id="selling_unit" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="selling_unit" class="form-label">Selling
                                                                        Unit: <span class="cls_mandatory">*</span></label>
                                                                    <input type="number" class="form-field w-100"
                                                                        step="0.01" min="0"
                                                                        placeholder="100.00"
                                                                        id="edit_selling_unit_{{ $getmed1->id }}"
                                                                        name="selling_unit"
                                                                        value="{{ $getmed1->selling_unit }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="selling_price" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="selling_price" class="form-label">Selling
                                                                        Price: <span class="cls_mandatory">*</span></label>
                                                                    <input type="number" class="form-field w-100"
                                                                        step="0.01" min="0"
                                                                        placeholder="100.00"
                                                                        id="edit_selling_price_{{ $getmed1->id }}"
                                                                        name="selling_price"
                                                                        value="{{ $getmed1->selling_price }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="selling_tax" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="selling_tax" class="form-label">Selling
                                                                        Tax:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_selling_tax_{{ $getmed1->id }}"
                                                                        name="selling_tax"
                                                                        value="{{ $getmed1->selling_tax }}"
                                                                        placeholder="Selling Tax">
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>

                                                            <div id="shelf_no" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="shelf_no" class="form-label">Shelf
                                                                        No:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        placeholder="A51"
                                                                        id="edit_shelf_no_{{ $getmed1->id }}"
                                                                        name="shelf_no"
                                                                        value="{{ $getmed1->self_no }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="batch_no" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="batch_no" class="form-label">Batch
                                                                        No:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_batch_no_{{ $getmed1->id }}"
                                                                        name="batch_no" value="{{ $getmed1->batch_no }}"
                                                                        placeholder="Batch No"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>



                                                            <div id="item_exp_date" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="item_exp_date" class="form-label">Expiry
                                                                        Date:</label>
                                                                    <input type="date" class="form-field w-100"
                                                                        id="edit_item_exp_date_{{ $getmed1->id }}"
                                                                        name="item_exp_date"
                                                                        value="{{ date('Y-m-d', strtotime($getmed1->expiry_date)) }}"><span
                                                                        class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="re_order_level" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="re_order_level" class="form-label">Re
                                                                        order level:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_re_order_level_{{ $getmed1->id }}"
                                                                        placeholder="Re Order Level" name="re_order_level"
                                                                        value="{{ $getmed1->re_order_level }}">
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="package" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="package"
                                                                        class="form-label">Package:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_package_{{ $getmed1->id }}"
                                                                        placeholder="Package" name="package"
                                                                        value="{{ $getmed1->package }}">
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="unit_ratio" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="unit_ratio" class="form-label">Unit
                                                                        Ratio:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_unit_ratio_{{ $getmed1->id }}"
                                                                        placeholder="Unit Ratio" name="unit_ratio"
                                                                        value="{{ $getmed1->unit_ratio }}">
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>
                                                            <div id="item_dosage" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="item_dosage" class="form-label">Dosage of
                                                                        The Medicine:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_item_dosage_{{ $getmed1->id }}"
                                                                        placeholder="ex: 60 ML" name="item_dosage"
                                                                        value="{{ $getmed1->dosage }}">
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>

                                                            <div id="opening_stock" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="opening_stock" class="form-label">Opening
                                                                        Stock:</label>
                                                                    <input type="text" class="form-field w-100"
                                                                        id="edit_opening_stock_{{ $getmed1->id }}"
                                                                        placeholder="Opening Stock" name="opening_stock"
                                                                        value="{{ $getmed1->open_stock }}">
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>

                                                            <div id="accessed_by" class="col-12 col-md-6 col-lg-4">
                                                                <div
                                                                    class="style-one py-5 flex-column justify-conent-start align-items-start">
                                                                    <label for="accessed_by" class="form-label">Accessed By:
                                                                        <span class="cls_mandatory">*</span></label>
                                                                    <select class="form-field w-100" name="accessed_by"
                                                                        id="edit_accessed_by_{{ $getmed1->id }}">
                                                                        <option value="doctor"
                                                                            {{ $getmed1->accessed_by == 'doctor' ? 'selected' : '' }}>
                                                                            Doctor</option>
                                                                        <option value="pharmacy"
                                                                            {{ $getmed1->accessed_by == 'pharmacy' ? 'selected' : '' }}>
                                                                            Pharmacy</option>
                                                                    </select>
                                                                    <span class="ps-2"></span>
                                                                </div>
                                                            </div>



                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="baby-secondary-btn border-1"
                                                                data-bs-dismiss="modal">Close</button>
                                                            <button type="button" class="baby-primary-btn"
                                                                onClick="edit_medicines({{ $getmed1->id }})"
                                                                id="edit_btn_{{ $getmed1->id }}">Update</button>

                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Edit Medicine -->




                </div>
            </div>
        </div>
    @endsection
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
        function edit_medicines(id) {
            var item_name = document.getElementById('edit_item_name_' + id).value;
            var item_code = document.getElementById('edit_item_code_' + id).value;
            var item_type = document.getElementById('edit_item_type_' + id).value;
            var selling_price = document.getElementById('edit_selling_price_' + id).value;
            var selling_tax = document.getElementById('edit_selling_tax_' + id).value;

            var err1 = err2 = err3 = err4 = err5 = 0;

            if (item_name == '') {
                $("#edit_item_name_" + id).attr("class", "form-field w-100 error-input");
                err1 = 0;
            } else {
                $("#edit_item_name_" + id).attr("class", "form-field w-100");
                err1 = 1;
            }

            if (item_code == '') {
                $("#edit_item_code_" + id).attr("class", "form-field w-100 error-input");
                err2 = 0;
            } else {
                $("#edit_item_code_" + id).attr("class", "form-field w-100");
                err2 = 1;
            }

            if (item_type == '') {
                $("#edit_item_type_" + id).attr("class", "form-field w-100 error-input");
                err3 = 0;
            } else {
                $("#edit_item_type_" + id).attr("class", "form-field w-100");
                err3 = 1;
            }

            if (selling_price == '') {
                $("#edit_selling_price_" + id).attr("class", "form-field w-100 error-input");
                err4 = 0;
            } else {
                $("#edit_selling_price_" + id).attr("class", "form-field w-100");
                err4 = 1;
            }

            if (selling_tax == '') {
                $("#edit_selling_tax_" + id).attr("class", "form-field w-100 error-input");
                err5 = 0;
            } else {
                $("#edit_selling_tax_" + id).attr("class", "form-field w-100");
                err5 = 1;
            }

            if (err1 == 1 && err2 == 1 && err3 == 1 && err4 == 1 && err5 == 1) {
                var x = document.getElementById("edit_btn_" + id).type = "submit";
            }

        }


        function medicinelist(searchValue) {
            var actionUrl = "{{ route('pharmacy.inventory.search.medicine') }}";
            $.ajax({
                url: actionUrl,
                method: 'GET',
                dataType: 'json',
                data: {
                    search: searchValue
                },
                success: function(response) {
                    //updateMedItems(response.data);
                    //console.log(response.data);

                    $('tbody').html(response.data);
                },
                error: function(error) {
                    // console.error('Error fetching data:', error);
                }
            });
        }

        function performMedicineSearch(searchValue) {
            var actionUrl = "{{ route('pharmacy.inventory.search.medicine') }}";
            $.ajax({
                url: actionUrl,
                method: 'GET',
                dataType: 'json',
                data: {
                    search: searchValue
                },
                success: function(response) {
                    // updateMedItems(response.data);
                    $('tbody').html(response.data);

                },
                error: function(error) {
                    // console.error('Error fetching data:', error);
                }
            });
        }



        function debounce(func, wait) {
            let timeout;
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout);
                    func(...args);
                };
                clearTimeout(timeout);
                timeout = setTimeout(later, wait);
            };
        }

        const delayedSearch = debounce(function(searchValue) {
            if (searchValue.trim() !== '') {
                performMedicineSearch(searchValue.toLowerCase().trim());
            } else {
                performMedicineSearch(searchValue);
            }
        }, 200);


        $(document).ready(function() {
          $('#filterpharmaMedicine').on('input', function() {
            var searchValue = $(this).val();
            delayedSearch(searchValue);
            // e.preventDefault();
          });
        });
      </script>
