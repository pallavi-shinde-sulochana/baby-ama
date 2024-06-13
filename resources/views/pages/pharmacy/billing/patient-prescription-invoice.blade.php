@extends('base.pharmacy-dashboard')
@section('pharmacy-content')
<style type="text/css">
        
    #pdf_export tr th{
        padding: 5px!important;
        text-align: center;
        color: #670e36!important;
        font-weight: bold;
    }
    #pdf_export tr td{
        /*font-weight: bold!important;*/
        padding: 5px!important;
        line-height: 1;

    }
    div#kt_content {
        background: white;
    }
    div#kt_footer {
        display: none!important;
    }
    
    @media print {
      .p-dis-row , #kt_aside,#kt_header,#kt_toolbar, #sidebar-wrapper, header, .navbar {
        display: none;
      }
      .footer,#kt_footer,#pdf_print {
            display: none;
      }
      body {-webkit-print-color-adjust: exact;}
    }

    @print {
        @page :footer {
            display: none
        }
      
        @page :header {
            display: none
        }
    }
    .pdf-txt-color{
           color: #670e36;
           font-weight: bold;
    }
    .pdf-bg-color{
       background-color: #670e36;
       font-weight: bold;
       color: white;
    }
    #footer {
     height: 20px;
     border-top:3px solid black;
    }
#page {
    height: calc(85vh - 30px); */
    viewport height - footer height
}
.medicine_dot_line{
    border-bottom:1px dotted #000;
}
</style> 


 <div class="container" id="page">
    <div class="pharmacy medicine-stacklist  p-5" style="margin-top: 50px;">
        <div class="row mx-0  justify-content-between p-sm-4">
            <div class="col-12 col-md-8">
                <div class="mb-5 pb-4">
                    <img src="{{ asset('media/logos/babyama-logo.png') }}" alt="Babyama" class="w-100 object-fit-contain inv-logo">
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
                            
                            PH. No. {{ ($user->father_phone)." ".($user->mother_phone) }}.<br>
                            UMR No. {{ ($user->umr_no) }}<br>
                            OP No. {{ ($user->op_no) }}</p>
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
                        @php $i = 1; $total = 0; $tax = 0; @endphp
                        @foreach($invoice_details as $key => $val)
                            @php
                                $list_med = App\Models\Medicine::find($val->medicine_id);
                                $taxval = isset($list_med) && isset($list_med->selling_tax) ? $list_med->selling_tax : 0;
                                $tot = $list_med ? $list_med->selling_price * $val->total_qty : 0;
                            @endphp
                            <tr>
                                <th scope="row">{{ $i }} </th>
                                <td>{{ $list_med ? $list_med->name . ' (' . helperFormatMedicinePrefix($list_med->type) . ')' : 'Medicine not found' }}</td>
                                <td>&#x20B9; {{ $list_med ? $list_med->selling_price : 'N/A' }}</td>
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
                        <button id="pdf_print" onclick="printDiv('printableArea')" class="baby-primary-btn" >Print</button>
                        <a href="{{ URL::previous() }}" class="baby-secondary-btn border-1 text-center">Back</a>
                    </div>
                </div>
    </div>
        
    
 </div>   
@endsection


<script type="text/javascript">
    function printDiv(divName) {
           var today = new Date();
           var timesheetdate=today.getDate()+'-'+today.getMonth()+1+'-'+today.getFullYear();
            {{-- var patientName ="{{$patientName}}"; --}}
            patientName = '';
             patientName = patientName.replace(" ", "_");

            document.title = "patient_"+patientName+"_prescription_"+timesheetdate;
            window.print();
       }
</script>