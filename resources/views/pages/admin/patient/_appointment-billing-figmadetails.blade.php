<div class="row p-2">
    <div class="col-md-6 mb-12">
        <label for="doctor_id" class="form-label">Doctor Name</label>
        <select class="form-control" id="doctor_id" >
            <option value="">Select a doctor</option>
            @foreach($doctorlist as $id => $name)
            <option value="{{ $id }}">
                {{ $name }}
            </option>
            @endforeach
        </select>
    </div>
</div>
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

                            $list_type = (isset($list_medicine->type)) ?
                            helperFormatMedicinePrefix($list_medicine->type) : '';
                            $list_name = (isset($list_medicine->name)) ? ($list_medicine->name) :
                            ucfirst($list_pres->prescription_name);
                            $list_dosage = (isset($list_medicine->dosage)) ? ($list_medicine->dosage) : '';

                            @endphp
                            <tr>
                                <th scope="row" class="text-center">{{ $i }}</th>
                                <td class=""> @if ($list_type)
                                    {{ '(' . $list_type . ')' }}
                                    @endif
                                    {{ ($list_name) }}
                                    @if ($list_dosage)
                                    {{ '(' . $list_dosage . ')' }}
                                    @endif
                                </td>
                                <td class="text-center">
                                    <div class="d-flex">
                                        <div class="w-50 d-flex justify-content-center align-items-center">
                                            <button class="action-btn" data-bs-toggle="modal"
                                                data-bs-target="#EditMedPopModal<?php echo $list_pres->id; ?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M10.9921 2.49662C11.1496 2.33917 11.3365 2.21428 11.5422 2.12907C11.7479 2.04386 11.9684 2 12.1911 2C12.4138 2 12.6342 2.04386 12.84 2.12907C13.0457 2.21428 13.2326 2.33917 13.39 2.49662C13.5475 2.65407 13.6724 2.84099 13.7576 3.04671C13.8428 3.25242 13.8867 3.47291 13.8867 3.69557C13.8867 3.91824 13.8428 4.13873 13.7576 4.34444C13.6724 4.55016 13.5475 4.73708 13.39 4.89453L5.29712 12.9875L2 13.8867L2.89921 10.5895L10.9921 2.49662Z"
                                                        stroke="#667085" stroke-width="1.11111" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="w-50 d-flex justify-content-center align-items-center">
                                            <button class="action-btn"
                                                onclick="deleteMedicine('<?php echo $list_pres->id; ?>');">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                    viewBox="0 0 16 16" fill="none">
                                                    <path
                                                        d="M2.66675 4.48933H3.91141M3.91141 4.48933H13.8687M3.91141 4.48933V13.202C3.91141 13.5321 4.04255 13.8487 4.27597 14.0821C4.50939 14.3155 4.82598 14.4467 5.15608 14.4467H11.3794C11.7095 14.4467 12.0261 14.3155 12.2595 14.0821C12.4929 13.8487 12.6241 13.5321 12.6241 13.202V4.48933H3.91141ZM5.77841 4.48933V3.24467C5.77841 2.91456 5.90955 2.59797 6.14297 2.36455C6.37639 2.13113 6.69297 2 7.02308 2H9.51241C9.84252 2 10.1591 2.13113 10.3925 2.36455C10.6259 2.59797 10.7571 2.91456 10.7571 3.24467V4.48933M7.02308 7.601V11.335M9.51241 7.601V11.335"
                                                        stroke="#FF505B" stroke-width="1.11111" stroke-linecap="round"
                                                        stroke-linejoin="round" />
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
