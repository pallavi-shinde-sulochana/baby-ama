@extends('base.pharmacy-dashboard')
@section('pharmacy-content')
<style type="text/css">
.cls_mandatory{
        color: red;
}
 .error-input {
            border: 1px solid red !important;
        }

</style>
    <div class="pharmacy medicine-stacklist baby-border p-5" style="margin-top: 50px;">
        <div class="row mx-0 align-items-center justify-content-between p-4">
 <form action="{{ route('pharmacy.inventory.addmedicine.post') }}" method="POST">
                    @csrf
<input type="hidden" id="add_med_id" name="med_id" value="0">

                <div class="medicine-list px-0 col-12">
                    <h2 class="h4 text-primary mb-4 fw-normal px-0 px-md-5">Add New Items</h2>
                    <div class="row mx-0">
                        <div id="item_name" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="item_name" class="form-label">Item Name: <span class="cls_mandatory">*</span></label>
                                <input type="text" class="form-field w-100" placeholder="Name" id="add_item_name"
                                    name="item_name" value=""><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="item_code" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="item_code" class="form-label">Item
                                    Code: <span class="cls_mandatory">*</span> </label>
<input type="text" class="form-field w-100" id="add_item_code" name="item_code"
                                    value="" placeholder="Item code"><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="item_type" class="col-12 col-md-6 col-lg-4">
        <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label for="item_type" class="form-label" >Item Type: <span class="cls_mandatory">*</span></label>
                <select class="form-field w-100" name="item_type" id="add_item_type">
                                    <option value="">Select type</option>
                                    <option value="tablet">Tablet</option>
                                    <option value="syrup">Syrup</option>
                                    <option value="drops">Drops</option>
                                    <option value="others">Others</option>
                                </select>
                                <span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="suppliers" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                                <label for="suppliers" class="form-label">Suppliers:</label>
                                <input type="text" class="form-field w-100" id="suppliers" placeholder="supplier details"
                                    name="suppliers" value=""><span class="ps-2"></span>
                            </div>
                        </div>



                        <div id="hsn_code" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="hsn_code" class="form-label">HSN Code:</label>
                                <input type="text" class="form-field w-100" id="hsn_code" name="hsn_code" value=""
                                    placeholder="HSN code"><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="bar_code" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="bar_code" class="form-label">Bar Code:</label>
                                <input type="text" class="form-field w-100" id="bar_code" name="bar_code" value=""
                                    placeholder="Bar code"><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="buying_unit" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="buying_unit" class="form-label">Buying
                                    Unit:</label>
                                <input type="number" class="form-field w-100" step="1" min="1"
                                    placeholder="100" id="buying_unit" name="buying_unit" value=""><span
                                    class="ps-2"></span>
                            </div>
                        </div>
                        <div id="buying_price" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="buying_price" class="form-label">Buying
                                    Price:</label>
                                <input type="number" class="form-field w-100" step="0.01" min="0"
                                    placeholder="100.00" id="buying_price" name="buying_price" value=""><span
                                    class="ps-2"></span>
                            </div>
                        </div>
                        <div id="buying_tax" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="buying_tax" class="form-label">Buying
                                    Tax:</label>
                                <input type="number" class="form-field w-100" step="0.01" min="0"
                                    placeholder="2.5%" id="buying_tax" name="buying_tax" value=""><span
                                    class="ps-2"></span>
                            </div>
                        </div>
                        <div id="selling_unit" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="selling_unit" class="form-label">Selling
                                    Unit:</label>
                                <input type="number" class="form-field w-100" step="1" min=""
                                    placeholder="50" id="selling_unit" name="selling_unit" value=""><span
                                    class="ps-2"></span>
                            </div>
                        </div>
                        <div id="selling_price" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="selling_price" class="form-label">Selling
                                    Price: <span class="cls_mandatory">*</span></label>
                    <input type="number" class="form-field w-100" step="0.01" min="0"
                                    placeholder="100.00" id="add_selling_price" name="selling_price" value="" ><span
                                    class="ps-2"></span>
                            </div>
                        </div>
                        <div id="selling_tax" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="selling_tax" class="form-label">Selling
                                    Tax: <span class="cls_mandatory">*</span></label>
                    <input type="number" class="form-field w-100" step="0.01" min="0.01"
                                    placeholder="3.5%" id="add_selling_tax" name="selling_tax" value=""><span
                                    class="ps-2"></span>
                            </div>
                        </div>
                        <div id="shelf_no" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="shelf_no" class="form-label">Shelf No:</label>
                                <input type="text" class="form-field w-100" placeholder="A51" id="shelf_no"
                                    name="shelf_no" value=""><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="batch_no" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="batch_no" class="form-label">Batch No:</label>
                                <input type="text" class="form-field w-100" placeholder="H2918" id="batch_no"
                                    name="batch_no" value=""><span class="ps-2"></span>
                            </div>
                        </div>

                        <div id="item_exp_date" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="item_exp_date" class="form-label">Expiry
                                    Date:</label>
                                <input type="date" class="form-field w-100" id="item_exp_date" name="item_exp_date"
                                    value=""><span class="ps-2"></span>
                            </div>
                        </div>

                        <div id="re_order_level" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="re_order_level" class="form-label">Re order level:</label>
                                <input type="text" class="form-field w-100" placeholder="Re order level" id="re_order_level"
                                    name="re_order_level" value=""><span class="ps-2"></span>
                            </div>
                        </div>
                         <div id="package" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="package" class="form-label">Package:</label>
                                <input type="text" class="form-field w-100" placeholder="Package" id="package"
                                    name="package" value=""><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="unit_ratio" class="col-12 col-md-6 col-lg-4">
                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                        <label for="unit_ratio" class="form-label">Unit Ratio:</label>
                     <input type="text" class="form-field w-100" placeholder="Unit Ratio" id="unit_ratio" name="unit_ratio" value=""><span class="ps-2"></span>
                            </div>
                        </div>
                              <div id="item_dosage" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label
                                    for="item_dosage" class="form-label">Dosage of The
                                    Medicine:</label>
                                <input type="text" class="form-field w-100" id="item_dosage" placeholder="ex: 60 ML"
                                    name="item_dosage" value=""><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="opening_stock " class="col-12 col-md-6 col-lg-4">
                        <div class="style-one py-5 flex-column justify-conent-start align-items-start">
                        <label for="opening_stock" class="form-label">Opening Stock :</label>
                     <input type="text" class="form-field w-100" placeholder="Opening Stock " id="opening_stock" name="opening_stock" value=""><span class="ps-2"></span>
                            </div>
                        </div>
                        <div id="accessed_by" class="col-12 col-md-6 col-lg-4">
                            <div class="style-one py-5 flex-column justify-conent-start align-items-start"> <label for="accessed_by" class="form-label" >Accessed By: </label>
                                    <select class="form-field w-100" name="accessed_by" id="add_accessed_by">
                                        <option value="doctor">Doctor</option>
                                        <option value="pharmacy">Pharmacy</option>
                                    </select>
                            <span class="ps-2"></span>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex px-2 justify-content-start align-items-center gap-4 my-5">

<button type="reset" class="baby-secondary-btn border-1 text-center">Reset</button>

<button type="button" class="baby-primary-btn" onClick="add_medicines()" id="add_btn">Add Item</button>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

<script type="text/javascript">
     function add_medicines() {
        var item_name = document.getElementById('add_item_name').value;
        var item_code = document.getElementById('add_item_code').value;
        var item_type = document.getElementById('add_item_type').value;
        var selling_price = document.getElementById('add_selling_price').value;
        var selling_tax = document.getElementById('add_selling_tax').value;

        var err1 = err2 = err3 = err4 = err5 = 0;

        if (item_name == '') {
            $("#add_item_name").attr("class", "form-field w-100 error-input");
            err1 = 0;
        } else {
            $("#add_item_name").attr("class", "form-field w-100");
            err1 = 1;
        }

        if (item_code == '') {
            $("#add_item_code").attr("class", "form-field w-100 error-input");
            err2 = 0;
        } else {
            $("#add_item_code").attr("class", "form-field w-100");
            err2 = 1;
        }

        if (item_type == '') {
            $("#add_item_type").attr("class", "form-field w-100 error-input");
            err3 = 0;
        } else {
            $("#add_item_type").attr("class", "form-field w-100");
            err3 = 1;
        }

         if (selling_price == '') {
            $("#add_selling_price").attr("class", "form-field w-100 error-input");
            err4 = 0;
        } else {
            $("#add_selling_price").attr("class", "form-field w-100");
            err4 = 1;
        }

        if (selling_tax == '') {
            $("#add_selling_tax").attr("class", "form-field w-100 error-input");
            err5 = 0;
        } else {
            $("#add_selling_tax").attr("class", "form-field w-100");
            err5 = 1;
        }

        if (err1 == 1 && err2 == 1 && err3 == 1 && err4 == 1 && err5 == 1) {
            var x = document.getElementById("add_btn").type = "submit";
        }

    }
</script>
