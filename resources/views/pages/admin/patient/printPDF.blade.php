<x-base-layout>
    <section>

@php

 // dd($data->appointment);

 $patient = ($data->appointment->user) ? $data->appointment->user : [];

 $patientName = isset($patient->patient->first_name) ? $patient->patient->first_name.' '.$patient->patient->last_name : '';
 // $patientData = isset($patient->patient) ? $patient->patient : [];
 // dd($patient);
@endphp
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
     height: calc(85vh - 30px); //viewport height - footer height
    }
    .medicine_dot_line{
        border-bottom:1px dotted #000;
    }
    </style>

<div class="container" id="page">
    <div class="row" style="border-bottom:3px solid black;">
        <div class="col-md-4 col-4">
                <img class="w-50" src="{{ asset('media/logos/babyama-logo.png') }}">
            </div>
            <div class="col-md-8 col-8">
                <p class="text-end"><br>
                    <b>Babyama Paediatric Center</b><br>
                     babyamaclinic@gmail.com
                        <br>
                        9585599885,<br>
                        0422- 3502606, 0422-3502607.
                    </p>
            </div>
    </div>
    <div class="row mt-1">
        <div class="col-12 col-md-12">
            <p class="text-end">Date: <b>{{Date('d-M-Y')}}</b></p>
        </div>
        <div class="col-12 col-md-12 row">
            <div class="col-6 col-md-6">
                @if(isset($patient->first_name))
                <p class="">Name: <b>{{$patient->first_name.' '.$patient->last_name}}</b></p>
                @endif
            </div>
            <div class="col-6 col-md-6">
                <p class="">Weight:  </p>
               
            </div>
            <div class="col-6 col-md-6">
                @if(isset($patient->patient))
                <p class="">Age: <b>{{$patient->patient->age}}</b> &emsp; , &nbsp; Gender: <b>{{ucfirst($patient->patient->gender)}}</b></p>
                @endif
            </div>
            <div class="col-6 col-md-6">
                @if(isset($patient->patient))
                <p class="">OP NO: <b>{{$patient->patient->op_no}}</b>  </p>
                @endif
            </div>
        </div>                  
    </div>
    <div class="row p-5">

       <h1>&#8478;</h1> 
       <div class="col-12 col-md-12">
           @if($data->prescriptionMedicine)
             @foreach($data->prescriptionMedicine as $p_medicine)
              @php
                $frame_data = array(
                  'id' => $p_medicine->id,
                  'medicine_id' => $p_medicine->medicine_id,
                  'total_qty' => $p_medicine->total_qty,
                  'intake_qty' => $p_medicine->intake_qty,
                  'timing_when' => $p_medicine->timing_when,
                  'timing_how' => $p_medicine->timing_how,
                  'duration' => $p_medicine->duration,
                );
                $medicine_details = getMedcineDetail($p_medicine->medicine_id);
              @endphp

                <div class="row pb-2 pt-2 medicine_dot_line">
                  <div class="col-md-9">
                    <h4>{{$medicine_details->name.' '.$medicine_details->dosage}}</h4>&nbsp;
                    <span>Qty:<b>{{$p_medicine->total_qty}}</b></span>&nbsp;
                    <span>Intake:<b>{{$p_medicine->intake_qty}}</b></span>&nbsp;
                    <span>When:<b>{{$p_medicine->timing_when}}</b></span>&nbsp;
                    <span>How:<b>{{$p_medicine->timing_how}}</b></span>&nbsp;
                    <span>Duration:<b>{{$p_medicine->duration}}</b></span>&nbsp;
                  </div>
                </div>
              @endforeach
              
            @endif
       </div>
    </div>
   {{--  
    <table id="pdf_export" class="table table-rounded table-row-bordered border gy-7 gs-7">
            <thead>
                <tr class="fw-bold fs-6 text-gray-800 border-bottom-2 border-gray-200">
                    <th>Operative</th>
                    <th>Trade</th>
                   
                    <th class="text-center">Total</th>
                    
                </tr>
            </thead>
            <tbody id="tab">
                                           
            </tbody>
        </table> --}}
    

         
        <div class="row mt-5 pt-5">
            <div class="col-md-12">
                <div class="text-center">
                    
                <button id="pdf_print" onclick="printDiv('printableArea')" class="btn btn-secondary ">PRINT</button>
                </div>
           
            </div>
        </div>
</div>
<div class="row" id="footer">
    <div class="col-md-12 col-12 text-center">
        <p> <b>Babyama Paediatric Center</b><br>
       <b> Address: </b> MP Creation 4th floor, NO-77,
                    NVN layout, VKK Menon Rd,
                    New Siddhapudur, Coimbatore,
                    Tamil Nadu - 641044.</p>
                    <p><b>Email:</b> babyamaclinic@gmail.com <b>Mobile:</b> 9585599885 <b>Landline:</b> 0422- 3502606, 0422-3502607.</p>
    </div>
</div>

</section>
</x-base-layout>

<script type="text/javascript">
     function printDiv(divName) {
            var today = new Date();
            var timesheetdate=today.getDate()+'-'+today.getMonth()+1+'-'+today.getFullYear();
             var patientName ="{{$patientName}}";
              patientName = patientName.replace(" ", "_");

             document.title = "patient_"+patientName+"_prescription_"+timesheetdate;
             window.print();
        }
</script>