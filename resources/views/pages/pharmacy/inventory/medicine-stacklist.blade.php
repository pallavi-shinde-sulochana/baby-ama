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
                                <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 15 15"
                                    fill="none">
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
                                $sell = App\Models\PrescriptionMedicine::where('medicine_id' ,
                                $getmed->id)->get()->sum('total_qty');
                                $total_stock = $getmed->buying_unit * $getmed->unit_ratio;
                                $available_stock = $total_stock - $sell;
                                $re_order_level = $getmed->re_order_level;

                                if($available_stock <= 0) { $available_stock=0; $clr='color:#FF0000' ; } else
                                    if($available_stock <=$re_order_level ) { $available_stock=$available_stock;
                                    $clr='color:#D2BD00' ; } else{ $available_stock=$available_stock; $clr='color:green'
                                    ; } @endphp <td class="text-center">{{ $total_stock }}</td>
                                    @if ($getmed->batch_no != '' && $getmed->expiry_date != '')
                                    <td class="text-center">{{ $getmed->batch_no }} &
                                        {{ $getmed->expiry_date != '' ? date('d/m/y', strtotime($getmed->expiry_date)) :
                                        'Nil' }}
                                    </td>
                                    @elseif($getmed->batch_no != '' || $getmed->expiry_date != '')
                                    <td class="text-center">
                                        {{ $getmed->batch_no != '' ? $getmed->batch_no : 'Nil' }} &
                                        {{ $getmed->expiry_date != '' ? date('d/m/y', strtotime($getmed->expiry_date)) :
                                        'Nil' }}
                                    </td>
                                    @else
                                    <td class="text-center"> Nil </td>
                                    @endif
                                    <td class="text-center" style="{{ $clr; }}">{{ $available_stock }}</td>
                                    <td class="text-center"><span>&#8377;</span>
                                        {{ $getmed->selling_price != '' ? $getmed->selling_price : '0' }}</td>
                                    <!--  <td class="text-center">300</td> -->
                                    {{-- <td class="text-center">
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
                                    </td> --}}

                                    <td class="text-center">
                                        <button type="button" class="btn border-0 edit-icon" data-bs-toggle="modal"
                                            data-bs-target="#MedProperties_{{ $getmed->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="18" viewBox="0 0 25 24" fill="none">
                                                <path
                                                    d="M16.9882 3.74493C17.2244 3.50876 17.5048 3.32142 17.8133 3.1936C18.1219 3.06579 18.4526 3 18.7866 3C19.1206 3 19.4514 3.06579 19.7599 3.1936C20.0685 3.32142 20.3489 3.50876 20.5851 3.74493C20.8212 3.98111 21.0086 4.26148 21.1364 4.57006C21.2642 4.87863 21.33 5.20936 21.33 5.54336C21.33 5.87736 21.2642 6.20809 21.1364 6.51666C21.0086 6.82524 20.8212 7.10562 20.5851 7.34179L8.44568 19.4812L3.5 20.83L4.84882 15.8843L16.9882 3.74493Z"
                                                    stroke="#667085" stroke-width="1.66667" stroke-linecap="round" stroke-linejoin="round" />
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



                @include('pages.pharmacy.inventory._medicine-stacklist-edit')





            </div>
        </div>
    </div>
    @endsection

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.11.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
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
