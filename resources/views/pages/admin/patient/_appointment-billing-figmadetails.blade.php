<style>
    .dropdown-container {
        position: relative;
        display: inline-block;
        width: 100%;
        margin-bottom: 20px;
        /* Add margin for spacing between dropdowns */
    }

    .dropdown-btn {
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 4px;
        background-color: #fff;
        text-align: left;
        cursor: pointer;
    }

    .dropdown-btn:after {
        content: '\25BC';
        float: right;
        margin-left: 10px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 100%;
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        z-index: 1;
    }

    .dropdown-content.show {
        display: block;
    }

    .dropdown-content table {
        width: 100%;
        border-collapse: collapse;
        background-color: white;
    }

    .dropdown-content th,
    .dropdown-content td {
        border: 1px solid black;
        padding: 8px;
        text-align: left;
    }

    .dropdown-content th {
        background-color: #f2f2f2;
    }
</style>

    <div class="dropdown-container pt-2">
        <button class="dropdown-btn form-control" onclick="toggleDropdown('prescription-table-container')">Doctor
            Prescription</button>
        <div class="dropdown-content" id="prescription-table-container">
            <div class="table-responsive py-3 w-5 p-4" id="mydiv">
                <table class="table" id="prescription-table">
                    <thead class="table-light bg-color-v1">
                        <tr>
                            <th scope="col" class="text-center">S.No</th>
                            <th scope="col" class="bg-color-v1">MEDICINE</th>
                            <th scope="col" class="bg-color-v1">Dosage</th>
                            <th scope="col" class="bg-color-v1">Timing</th>
                            <th scope="col" class="bg-color-v1">Relation to Food</th>
                            <th scope="col" class="bg-color-v1">Follow Up Days</th>
                            <th scope="col" class="bg-color-v1">Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; @endphp
                        @foreach ($pres as $list_pres)
                        @php
                        $list_medicine = App\Models\Medicine::find($list_pres->medicine_id);

                        $list_type = (isset($list_medicine->type)) ?
                        helperFormatMedicinePrefix($list_medicine->type) : '';
                        $list_name = (isset($list_medicine->name)) ? ($list_medicine->name) :
                        ucfirst($list_pres->prescription_name);
                        $list_dosage = (isset($list_medicine->dosage)) ? ($list_medicine->dosage) : '';

                        @endphp
                        <tr>
                            <th scope="row" class="text-center">{{ $i }}</th>
                            <td class="">
                                @if ($list_type)
                                {{ '(' . $list_type . ')' }}
                                @endif
                                {{ ($list_name) }}
                                @if ($list_dosage)
                                {{ '(' . $list_dosage . ')' }}
                                @endif
                            </td>
                            <td>{{ ($list_pres->dosage) }}</td>
                            <td>{{ ($list_pres->timing_when) }}</td>
                            <td>{{ ($list_pres->timing_how) }}</td>
                            <td>{{ ($list_pres->duration) }}</td>
                            <td>{{ ($list_pres->total_qty) }}</td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="dropdown-container">
        <button class="dropdown-btn form-control" onclick="toggleDropdown('pharmacy-bill-table-container')">Pharmacy
            Bill</button>
        <div class="dropdown-content" id="pharmacy-bill-table-container">
            <div class="table-responsive py-3 w-5 p-4" id="mydiv">
                <table class="table" id="pharmacy-bill-table">
                    <thead class="table-light bg-color-v1">
                        <tr>
                            <th scope="col" class="text-center">S.No</th>
                            <th scope="col" class="bg-color-v1">MEDICINE</th>
                            <th scope="col" class="bg-color-v1">PRICE</th>
                            <th scope="col" class="bg-color-v1">QUANTITY</th>
                            <th scope="col" class="bg-color-v1">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1; $subtotal = 0; @endphp
                        <!-- Initialize $subtotal variable -->
                        @foreach ($pharmacyBillMedicines as $bill)
                        @php
                        // Find the corresponding PrescriptionMedicine for the current pharmacy bill medicine
                        $prescriptionMedicine = $list_pres->where('medicine_id', $bill->id)->first();
                        $totalPrice = $bill->buying_price * ($prescriptionMedicine ? $prescriptionMedicine->total_qty : 0);
                        $subtotal += $totalPrice;
                        @endphp

                        <tr>
                            <th scope="row" class="text-center">{{ $i }}</th>
                            <td>{{ $bill->name }}</td>
                            <td>{{ $bill->buying_price }}</td>
                            <td>{{ $prescriptionMedicine ? $prescriptionMedicine->total_qty : '' }}</td>
                            <td>{{ $totalPrice }}</td>
                        </tr>
                        @php $i++; @endphp
                        @endforeach
                    </tbody>
                    <tfoot  style="border-top: 1px solid #000000">
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right">Subtotal</td>
                            <td>{{ $subtotal }}</td>
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right">Tax</td>
                            <td>{{ $subtotal * ($bill->buying_tax / 100) }}</td> <!-- Assuming $tax contains the tax rate -->
                        </tr>
                        <tr>
                            <td colspan="3"></td>
                            <td class="text-right">Total</td>
                            <td>{{ $subtotal + ($subtotal * ($bill->buying_tax / 100)) }}</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(containerId) {
            const tableContainer = document.getElementById(containerId);
            tableContainer.classList.toggle('show');
        }

        // Close the dropdown if the user clicks outside of it
        window.onclick = function(event) {
            if (!event.target.matches('.dropdown-btn')) {
                const dropdowns = document.getElementsByClassName("dropdown-content");
                for (let i = 0; i < dropdowns.length; i++) {
                    const openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }
    </script>
