@extends('base.pharmacy-dashboard')
@section('pharmacy-content')
    <div class="pharmacy medicine-stacklist  p-5" style="margin-top: 50px;">
        <div class="row mx-0  justify-content-between p-sm-4">
            <div class="col-12 col-md-8">
                <div class="mb-5 pb-4">
                    <img src="{{ asset('images/inv-logo.png') }}" alt="Babyama" class="w-100 object-fit-contain inv-logo">
                </div>
                <div class="row justify-content-between bill-data py-5">
                    <div class="col-12 col-md-6 col-lg-6 mb-5 mb-lg-0">
                        <h2 class="pt-title d-block d-md-none mb-5">Invoice</h2>
                        <h6>BILL FORM:</h6>
                        <p>Babyama Women Wellness & Paediatric Centre <br>
                            New Siddha Pudur, <br>
                            Coimbatore - 638 933. <br>
                            PH.NO: 78967 84329.</p>
                    </div>
                    <div class="col-12 col-md-6 col-lg-5">
                        <h6>BILL TO:</h6>
                        <p> {{ ucfirst($user->first_name)." ".ucfirst($user->last_name) }} <br>
                            {{ $user->address }}<br>
                            
                            PH. No. {{ ($user->father_phone)." ".($user->mother_phone) }}.</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-4 col-xl-3">
                <div class="inv-title d-flex align-items-center mb-5 py-4 d-none d-md-block">
                    <h2 class="pt-title ">Invoice</h2>
                </div>
                <div class="inv-info pt-2">
                    <div class="row py-md-5">
                        <div class="col-5">Invoice No</div>
                        <div class="col-7"> : <?php echo rand(100,1000); ?> </div>
                        <div class="col-5">Date</div>
                        <div class="col-7"> : <?php echo date('d.m.Y'); ?></div>
                        <div class="col-5">Place</div>
                        <div class="col-7"> : Coimbatore</div>
                    </div>
                </div>
            </div>
            <div class="col-12 baby-border invoice-table">
                <table class="table table-hover table table-borderless">
                    <thead class="py-2">
                        <tr>
                            <th scope="col">S.NO</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">QTY</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <tbody class="mb-5">
                         @php $i = 1;
                         $total = 0;
                         $tax = 0;
                         @endphp
                            @foreach($invoice_details as $key => $val)
                            @php
                            $list_med = App\Models\Medicine::find($val->medicine_id);
                            $tot = ($list_med->selling_price) * ($val->total_qty) ;
                            $taxval = isset($list_med->selling_tax) ? $list_med->selling_tax : '0';
                            @endphp
                        <tr>
                            <th scope="row">{{ $i }} </th>
                            <td>{{ $list_med->name }}  ({{ helperFormatMedicinePrefix($list_med->type) }})</td>
                            <td>&#x20B9; {{ $list_med->selling_price }}</td>
                            <td>{{ $val->total_qty }}</td>
                            <td>&#x20B9; {{ $tot }}</td>
                        </tr>

                        @php 
                        $i++;
                        $total += $tot;
                        $tax += $taxval;
                        @endphp
                            @endforeach  
                    </tbody>
                    <tfoot class="pt-5">
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="tf-info">Total :</td>
                            <td>&#x20B9; {{ $total }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="tf-info">Tax :</td>
                            <td> {{ $tax }} %</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td class="tf-info">Subtotal :</td>
                            <?php if($tax == '0'){
                                $subtotal= $total;
                            } else { 
                                $subtotal= $total + ($total * $tax / 100);
                            }?>
                            <td>&#x20B9; {{ $subtotal }}</td>
                        </tr>
                    </tfoot>
                </table>
                <div class="mt-5 pt-5">
                    <div class="d-flex px-2 justify-content-start align-items-center gap-4 my-5">
                        <button type="button" class="baby-primary-btn">Print</button>
                        <a href="#" class="baby-secondary-btn border-1 text-center">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
