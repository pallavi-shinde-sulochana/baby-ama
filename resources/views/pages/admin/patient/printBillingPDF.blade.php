<x-base-layout>
    <section>

@php

 // dd($data->appointment);

 // $patient = ($data->appointment->user) ? $data->appointment->user : [];

 // $patientName = isset($patient->patient->first_name) ? $patient->patient->first_name.' '.$patient->patient->last_name : '';
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
/*     height: calc(85vh - 30px); */
/*     viewport height - footer height*/
    }
    .medicine_dot_line{
        border-bottom:1px dotted #000;
    }
    </style>

<div class="container" id="page">
    <div class="row" style="border-bottom:3px solid black;">
            <div class="col-md-5 col-6">
                <img class="w-50" src="{{ asset('media/logos/babyama-logo.png') }}">
            </div>
            <div class="col-md-6 col-8">
                <h1 class="text-end mt-"> INVOICE </h1>
                {{-- <p class="text-end"><br>
                    <b>Babyama Paediatric Center</b><br>
                     babyamaclinic@gmail.com
                        <br>
                        9585599885,<br>
                        0422- 3502606, 0422-3502607.
                </p> --}}
            </div>
    </div>
    <div class="row mt-1">
        {{-- <div class="col-12 col-md-12">
            <p class="text-end">Date: <b>{{Date('d-M-Y')}}</b></p>
        </div> --}}
        <div class="col-4 col-md-4">
            <p for="first_name" class=" font-weight-normal">
                <b>BILL FROM : 
                </b><br>
                Babyama Paediatric Center</b><br>
                babyamaclinic@gmail.com
                <br>
                9585599885,<br>
                0422- 3502606, 0422-3502607.
            </p>
        </div>
        @if($appointment->user->patient)
        @php
           $patient = $appointment->user->patient;
        @endphp
        @endif
        <div class="col-4 col-md-4">
            <p for="first_name" class=" font-weight-normal">
                <b>BILL TO : 
                </b><br>
                {{$patient->first_name.' '.$patient->last_name}}<br>
                {{$patient->address}}
                <br>
                {{$patient->father_phone}},<br>
            </p>
        </div>
        <div class="col-4 col-md-4">
            <p for="first_name" class=" font-weight-normal">
                <b>Invoice No : </b> <br>
                <b>Date : </b>{{Date('d-M-Y')}} <br>
                <b>Place : </b> <br>
            </p>
        </div>
        <hr>
        <div class="col-12 col-md-12 row">
            <div class="col-md-12 text-center mb-5">
                <h3>Appoinment Details</h3>
            </div>
            <div class="col-md-4">
                <div class="patient-info">
                    @if($appointment->first_name)
                    <p>
                        <span><b>Patient Name</b></span>
                        <span class="separator">-</span>
                        <span>{{$patient->first_name.' '.$patient->last_name}}</span>
                    </p>
                    @endif
                    @if($appointment->appoinment_date)
                    <p>
                        <span><b>Appoinment Date & Session</b></span>
                        <span class="separator">-</span>
                        <span>{{$appointment->appoinment_date}} / {{ucfirst($appointment->appoinment_session)}}</span>
                    </p>
                    @endif
                    @if($appointment->father_name)
                    <p>
                        <span><b>Father Name</b></span>
                        <span class="separator">-</span>
                        <span>{{$appointment->father_name}}</span>
                    </p>
                    @endif
                    @if($appointment->blood_group)
                    <p>
                        <span><b>Blood Group</b></span>
                        <span class="separator">-</span>
                        <span>{{$appointment->blood_group}}</span>
                    </p>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="patient-info">
                    @if($appointment->specialists)
                    <p>
                        <span><b>Need to see</b></span>
                        <span class="separator">-</span>
                        <span>{{$appointment->specialists}}</span>
                    </p>
                    @endif
                    @if($appointment->appoinment_time)
                    <p>
                        <span><b>Appoinment Time</b></span>
                        <span class="separator">-</span>
                        <span>{{$appointment->appoinment_time}}</span>
                    </p>
                    @endif
                </div>
            </div>

            <div class="col-md-4">
                <div class="patient-info">
                    @if($patient->umr_no)
                    <p>
                        <span><b>UMR No</b></span>
                        <span class="separator">-</span>
                        <span>{{$patient->umr_no}}</span>
                    </p>
                    @endif
                    @if($patient->op_no)
                    <p>
                        <span><b>OP NO</b></span>
                        <span class="separator">-</span>
                        <span>{{$patient->op_no}}</span>
                    </p>
                    @endif
                </div>
            </div>
            
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
    

         
        <div class="row my-5 pt-5">
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
             {{-- var patientName ="{{$patientName}}"; --}}
             patientName = '';
              patientName = patientName.replace(" ", "_");

             document.title = "patient_"+patientName+"_prescription_"+timesheetdate;
             window.print();
        }
</script>