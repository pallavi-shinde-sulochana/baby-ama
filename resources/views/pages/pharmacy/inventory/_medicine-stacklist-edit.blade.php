<!-- Edit Medicine -->
@foreach ($medicines as $key1 => $getmed)
<div class="modal fade modal-edit-medicine" id="MedProperties_{{ $getmed->id }}" data-bs-backdrop="static"
    data-bs-keyboard="false" tabindex="-1" aria-labelledby="MedPropertiesLabel_{{ $getmed->id }}" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MedPropertiesLabel_{{ $getmed->id }}">Update {{ $getmed->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="pharmacy medicine-stacklist baby-border">
                    <div class="row mx-0 align-items-center justify-content-between">
                        <form action="{{ route('pharmacy.inventory.addmedicine.post') }}" method="POST">
                            @csrf
                            <input type="hidden" id="edit_med_id_{{ $getmed->id }}" name="medId"
                                value="{{ $getmed->id }}">
                            <div class="medicine-list px-0 col-12">
                                <div class="row mx-0">
                                    <div id="item_name" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="item_name" class="form-label">Item Name:
                                                <span class="cls_mandatory">*</span></label>
                                            <input type="text" class="form-field w-100" placeholder="Name"
                                                id="edit_item_name_{{ $getmed->id }}" name="item_name"
                                                value="{{ $getmed->name }}"><span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="item_code" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="item_code" class="form-label">Item Code:
                                                <span class="cls_mandatory">*</span></label>
                                            <input type="text" class="form-field w-100" placeholder="Item Code"
                                                id="edit_item_code_{{ $getmed->id }}" name="item_code"
                                                value="{{ $getmed->item_code }}"><span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="item_type" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="item_type" class="form-label">Item Type:
                                                <span class="cls_mandatory">*</span></label>
                                            <select class="form-field w-100" name="item_type"
                                                id="edit_item_type_{{ $getmed->id }}">
                                                <option value="">Select type</option>
                                                <option value="tablet" {{ $getmed->type == 'tablet' ?
                                                    'selected' : '' }}>
                                                    Tablet</option>
                                                <option value="syrup" {{ $getmed->type == 'syrup' ?
                                                    'selected' : '' }}>
                                                    Syrup</option>
                                                <option value="drops" {{ $getmed->type == 'drops' ?
                                                    'selected' : '' }}>
                                                    Drops</option>
                                                <option value="others" {{ $getmed->type == 'others' ?
                                                    'selected' : '' }}>
                                                    Others</option>
                                            </select>
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="suppliers" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="suppliers" class="form-label">Suppliers:</label>
                                            <input type="text" class="form-field w-100" placeholder="Suppliers"
                                                id="edit_suppliers_{{ $getmed->id }}" name="suppliers"
                                                value="{{ $getmed->suppliers }}"><span class="ps-2"></span>
                                        </div>
                                    </div>

                                    <div id="hsn_code" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="hsn_code" class="form-label">HSN
                                                Code:</label>
                                            <input type="text" class="form-field w-100" placeholder="hsn_code"
                                                id="edit_hsn_code_{{ $getmed->id }}" name="hsn_code"
                                                value="{{ $getmed->hsn_code }}"><span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="bar_code" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="bar_code" class="form-label">Bar
                                                Code:</label>
                                            <input type="text" class="form-field w-100" placeholder="Bar Code"
                                                id="edit_bar_code_{{ $getmed->id }}" name="bar_code"
                                                value="{{ $getmed->bar_code }}"><span class="ps-2"></span>
                                        </div>
                                    </div>

                                    <div id="buying_unit" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="buying_unit" class="form-label">Buying
                                                Unit:</label>
                                            <input type="number" class="form-field w-100" step="0.01" min="0"
                                                placeholder="100.00" id="edit_buying_unit_{{ $getmed->id }}"
                                                name="buying_unit" value="{{ $getmed->buying_unit }}"><span
                                                class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="buying_price" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="buying_price" class="form-label">Buying
                                                Price:</label>
                                            <input type="number" class="form-field w-100" step="0.01" min="0"
                                                placeholder="100.00" id="edit_buying_price_{{ $getmed->id }}"
                                                name="buying_price" value="{{ $getmed->buying_price }}"><span
                                                class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="buying_tax" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="buying_tax" class="form-label">Buying
                                                Tax:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_buying_tax_{{ $getmed->id }}" name="buying_tax"
                                                value="{{ $getmed->buying_tax }}" placeholder="Buying Tax">
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>

                                    <div id="selling_unit" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="selling_unit" class="form-label">Selling
                                                Unit: <span class="cls_mandatory">*</span></label>
                                            <input type="number" class="form-field w-100" step="0.01" min="0"
                                                placeholder="100.00" id="edit_selling_unit_{{ $getmed->id }}"
                                                name="selling_unit" value="{{ $getmed->selling_unit }}"><span
                                                class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="selling_price" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="selling_price" class="form-label">Selling
                                                Price: <span class="cls_mandatory">*</span></label>
                                            <input type="number" class="form-field w-100" step="0.01" min="0"
                                                placeholder="100.00" id="edit_selling_price_{{ $getmed->id }}"
                                                name="selling_price" value="{{ $getmed->selling_price }}"><span
                                                class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="selling_tax" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="selling_tax" class="form-label">Selling
                                                Tax:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_selling_tax_{{ $getmed->id }}" name="selling_tax"
                                                value="{{ $getmed->selling_tax }}" placeholder="Selling Tax">
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>

                                    <div id="shelf_no" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="shelf_no" class="form-label">Shelf
                                                No:</label>
                                            <input type="text" class="form-field w-100" placeholder="A51"
                                                id="edit_shelf_no_{{ $getmed->id }}" name="shelf_no"
                                                value="{{ $getmed->self_no }}"><span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="batch_no" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="batch_no" class="form-label">Batch
                                                No:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_batch_no_{{ $getmed->id }}" name="batch_no"
                                                value="{{ $getmed->batch_no }}" placeholder="Batch No"><span
                                                class="ps-2"></span>
                                        </div>
                                    </div>



                                    <div id="item_exp_date" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="item_exp_date" class="form-label">Expiry
                                                Date:</label>
                                            <input type="date" class="form-field w-100"
                                                id="edit_item_exp_date_{{ $getmed->id }}" name="item_exp_date"
                                                value="{{ date('Y-m-d', strtotime($getmed->expiry_date)) }}"><span
                                                class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="re_order_level" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="re_order_level" class="form-label">Re
                                                order level:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_re_order_level_{{ $getmed->id }}" placeholder="Re Order Level"
                                                name="re_order_level" value="{{ $getmed->re_order_level }}">
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="package" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="package" class="form-label">Package:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_package_{{ $getmed->id }}" placeholder="Package" name="package"
                                                value="{{ $getmed->package }}">
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="unit_ratio" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="unit_ratio" class="form-label">Unit
                                                Ratio:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_unit_ratio_{{ $getmed->id }}" placeholder="Unit Ratio"
                                                name="unit_ratio" value="{{ $getmed->unit_ratio }}">
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>
                                    <div id="item_dosage" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="item_dosage" class="form-label">Dosage of
                                                The Medicine:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_item_dosage_{{ $getmed->id }}" placeholder="ex: 60 ML"
                                                name="item_dosage" value="{{ $getmed->dosage }}">
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>

                                    <div id="opening_stock" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="opening_stock" class="form-label">Opening
                                                Stock:</label>
                                            <input type="text" class="form-field w-100"
                                                id="edit_opening_stock_{{ $getmed->id }}" placeholder="Opening Stock"
                                                name="opening_stock" value="{{ $getmed->open_stock }}">
                                            <span class="ps-2"></span>
                                        </div>
                                    </div>

                                    <div id="accessed_by" class="col-12 col-md-6 col-lg-4">
                                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                            <label for="accessed_by" class="form-label">Accessed By:
                                                <span class="cls_mandatory">*</span></label>
                                            <select class="form-field w-100" name="accessed_by"
                                                id="edit_accessed_by_{{ $getmed->id }}">
                                                <option value="doctor" {{ $getmed->accessed_by ==
                                                    'doctor' ? 'selected' : '' }}>
                                                    Doctor</option>
                                                <option value="pharmacy" {{ $getmed->accessed_by ==
                                                    'pharmacy' ? 'selected' : '' }}>
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
                                        onClick="edit_medicines({{ $getmed->id }})"
                                        id="edit_btn_{{ $getmed->id }}">Update</button>

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