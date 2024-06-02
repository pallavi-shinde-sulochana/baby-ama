@extends('base.doctor-dashboard')
@section('doctor-content')
@php

 // dd($data->prescriptionMedicine);
@endphp
 
<section class="doctor-patinet-appointment pt-5">
  
 
    <div class="row">
      <div class="col-md-2">
        {{-- <a href="{{route('doctor.appointment.patient.details',$patient->id)}}"> --}}
        {{-- <a href="{{route('doctor.appointment.patient',$appoinment->id)}}"> --}}
        <a href="{{ URL::previous() }}">
        {{-- <a href="{{URL::previous()}}"> --}}
          <img src="{{asset('front-end/assets/img/goBack.png')}}">
        </a>
      </div>
      <div class="col-md-8 text-center">
          <h2 class="p-0">Prescription details</h2>
      </div>
      <div class="col-md-2">
        
          {{--  <button type="submit"   class="btn p-1 ">
             
             <img src="{{asset('front-end/assets/img/charm_tick.png')}}">
           </button> --}}
      </div>
    </div>
  <div class="row p-5 m-5 pediatric-form-fields prescriptionForm table-responsive">
    <div class="col-md-12">
      <span class="text-" style="color:#fd7e14">NOTE: Make sure you saved all details of each Medicine</span>
    </div> 
     <div class="col-md-8">
      <div class="row pt-5 pb-5">
        <h3>
          Medicine
        </h3>
        <form method="GET" id="searchForm">
          <div class="col-md-8">
            <div class="input-group">
              <div class="form-outline">
                <input type="search" name="search" placeholder="search medicine" id="search" class="form-control" />
              </div>
                <button onclick="searchMedicine()" type="button" class="btn-sm btn-info">
                <i class="fas fa-search"></i>
                </button>
                <label class="pt-3">TIPS: you can search based on medicine types such as tablet,syrup,drops</label>
                 
                   <a href="https://youtu.be/N-Q98zHEwtU" target="_blank">Check how to video here  <i class="fa fa-question-circle" aria-hidden="true" ></i></a>
                 
                {{-- <label class="pt-3 text-danger">NOTE: First you need to select the medicines and then save after save you can add the Quantity and other informations </label> --}}
              {{-- <a class="btn" href="{{route('doctor.appointment.patient.prescription.medicine',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Clear Search</a> --}}
            </div>
          </div>
        </form>

      </div>

       <form action="{{route('doctor.appointment.patient.prescription.medicine.post',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}" method="POST">
        @csrf
        <input type="hidden" name="deleted_prescription_medicines" id="deleted_prescription_medicines" value="[]">
        <div class="row">
          <h3>Selected Medicine <i class="fa fa-question-circle" aria-hidden="true" data-bs-toggle="tooltip" data-bs-html="true" title="1) If selected medicine show this mark <i class='fa fa-check-circle text-danger' aria-hidden='true'></i> not yet saved all the details , <br>2) if it shows this mark <i class='fa fa-check-circle text-success' aria-hidden='true'></i>  means all details are saved for that medicine <br> 3) To add / alter medicine details like intake quantity etc click this icon <i class='fas fa-cog text-dark'></i> <br> 4) To remove / delete medicine click this icon <i class='fas fa-trash text-danger'></i>"></i></h3>

          <div class="col-md-12" id="choosenMedicine">
            @php $selectedMed=[]; @endphp
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
                $selectedMed[]=$p_medicine->id;
                $medicine_details = getMedcineDetail($p_medicine->medicine_id);
                $getType =($medicine_details->dosage) ? ' ('.$medicine_details->dosage.')' : '';
                 $fullName =helperFormatMedicinePrefix($medicine_details->type).' '.$medicine_details->name.$getType
              @endphp
              <div class="row selected-medicine-wrapper">
                <textarea name="choosenMedicine[]" class="d-none">{{json_encode($frame_data)}}</textarea>
                <div class="col-md-12 m-1 p-3 rounded border border-dark">
                  <div class="row">
                    <div class="col-12 d-flex justify-content-between">
                      <span class="selected-medicine-wrapper">{{$fullName}}</span>
                      <div class="btn-wrapper">
                        <span class="me-2 btn p-0" onclick="editSelectedMedician(this)">
                          <i class="fas fa-cog text-dark"></i>
                        </span>&nbsp;
                        <span class="btn p-0" onclick="removeSelectedMedician(this)">
                          <i class="fas fa-trash text-danger"></i>
                        </span> &emsp;
                        @if($p_medicine->total_qty && $p_medicine->intake_qty && $p_medicine->timing_when && $p_medicine->timing_how && $p_medicine->duration)
                          <i class="fa fa-check-circle text-success" aria-hidden="true"></i>
                        @else
                           <i class="fa fa-check-circle text-danger" aria-hidden="true"></i>
                        @endif
                      </div>

                    </div>
                  </div>
                </div>
              </div>


            @endforeach
          </div>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-md-12" id="MedicineButtons">
              <hr>
              <h2>Select the Medicines</h2>
              @foreach($medicines as $medicine)
                 @php 
                 $getType =($medicine->dosage) ? ' ('.$medicine->dosage.')' : '';
                 $fullName =helperFormatMedicinePrefix($medicine->type).' '.$medicine->name.$getType
                 @endphp
                <button type="button" class="btn btn-medicine-tag " id="{{$medicine->id}}" data-name="{{$medicine->name}}" data-details="{{json_encode($medicine)}}" onclick="addMedicineToList(this.id,'{{$fullName}}')"> 
                  <span>{{helperFormatMedicinePrefix($medicine->type)}}</span>
                  {{$medicine->name}} @if($medicine->dosage) {{'('.$medicine->dosage.')'}} @endif
                </button>
              @endforeach
            </div>
            
        </div>
     
      <div class="row">
        <div class="col-md-3 col-3">
          <a class="btn btn-info btn-cancel" href="{{  route('doctor.appointment.patient.prescription',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id]) }}">Back</a>
        </div>
        <div class="col-md-3 col-3">
          
         <button type="submit" class="btn btn-info">Save</button>
        </div>
      </div>

     </div>
  </div>
 

  </form>
</section>
<!-- Modal -->
<div class="modal fade d-none" id="dosageModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="dosageModelTitle">
          
        </h5>
        <span class="modal-title" id="dosageModelSubTitle">
          
        </span>
        {{-- <button onclick="closeDosageModel()" type="button" class="close" data-dismiss="modal" aria-label="Close"> 
          <span aria-hidden="true">&times;</span>
        </button> --}}
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
          <!-- Quantity -->
          <h4>Quantity</h4>
          <div class="col-md-12">
            <input type="number" name="total_qty"id="total_qty" class="form-control w-200px" value="">
            
          </div>
          <div class="col-md-12 mt-5">
             <h4 class="mt-5">Intake Quantity</h4>
            <!-- 1/3 -->
            <input type="radio" name="intake_qty" id="intake_1_3" class="d-none medician-check-inp" value="1/3">
            <label class="medician-check-label" for="intake_1_3">1/3</label>

            <!-- 1/2 -->
            <input type="radio" name="intake_qty" id="intake_1_2" class="d-none medician-check-inp" value="1/2">
            <label class="medician-check-label" for="intake_1_2">1/2</label>

            <!-- 3/4 -->
            <input type="radio" name="intake_qty" id="intake_3_4" class="d-none medician-check-inp" value="3/4">
            <label class="medician-check-label" for="intake_3_4">3/4</label>

            <!-- 1 -->
            <input type="radio" name="intake_qty" id="intake_1" class="d-none medician-check-inp" value="1">
            <label class="medician-check-label" for="intake_1">1</label>

            <!-- 1 1/2 -->
            <input type="radio" name="intake_qty" id="intake_1__1_2" class="d-none medician-check-inp" value="1 1/2">
            <label class="medician-check-label" for="intake_1__1_2">1 1/2</label>

            <!-- 2 -->
            <input type="radio" name="intake_qty" id="intake_2" class="d-none medician-check-inp" value="2">
            <label class="medician-check-label" for="intake_2">2</label>

            <!-- 2 1/2 -->
            <input type="radio" name="intake_qty" id="intake_2__1_2" class="d-none medician-check-inp" value="2 1/2">
            <label class="medician-check-label" for="intake_2__1_2">2 1/2</label>

            <!-- 3 -->
            <input type="radio" name="intake_qty" id="intake_3" class="d-none medician-check-inp" value="3">
            <label class="medician-check-label" for="intake_3">3</label>

            <!-- 3 1/2 -->
            <input type="radio" name="intake_qty" id="intake_3__1/2" class="d-none medician-check-inp" value="3 1/2">
            <label class="medician-check-label" for="intake_3__1/2">3 1/2</label>
            <br><br>
            <input type="radio" name="intake_qty" id="intake_1_ml" class="d-none medician-check-inp" value="1 ml">
            <label class="medician-check-label" for="intake_1_ml">1 ML</label>
            <input type="radio" name="intake_qty" id="intake_2_5_ml" class="d-none medician-check-inp" value="2.5 ml">
            <label class="medician-check-label" for="intake_2_5_ml">2.5 ML</label>
            <input type="radio" name="intake_qty" id="intake_5_ml" class="d-none medician-check-inp" value="5 ml">
            <label class="medician-check-label" for="intake_5_ml">5 ML</label>
            <label class="medician-check-label" for="intake_10_ml">10 ML</label>
            <input type="radio" name="intake_qty" id="intake_10_ml" class="d-none medician-check-inp" value="10 ml">
            <label class="medician-check-label" for="intake_10_ml">10 ML</label>
          </div>

          <!-- Timing -->
          <h4 class="mt-5">Timing</h4>
          <!-- Timing When -->
          <div class="col-md-12">
            <!-- 4h -->
            <input type="radio" name="timing_when" id="t_when_4h" class="d-none medician-check-inp" value="4h">
            <label class="medician-check-label" for="t_when_4h">4h</label>

            <!-- 6h -->
            <input type="radio" name="timing_when" id="t_when_6h" class="d-none medician-check-inp" value="6h">
            <label class="medician-check-label" for="t_when_6h">6h</label>

            <!-- 8h -->
            <input type="radio" name="timing_when" id="t_when_8h" class="d-none medician-check-inp" value="8h">
            <label class="medician-check-label" for="t_when_8h">8h</label>

            <!-- 12h -->
            <input type="radio" name="timing_when" id="t_when_12h" class="d-none medician-check-inp" value="12h">
            <label class="medician-check-label" for="t_when_12h">12h</label>

            <!-- 48h -->
            <input type="radio" name="timing_when" id="t_when_48h" class="d-none medician-check-inp" value="48h">
            <label class="medician-check-label" for="t_when_48h">48h</label>

            <!-- once -->
            <input type="radio" name="timing_when" id="t_when_once" class="d-none medician-check-inp" value="once">
            <label class="medician-check-label" for="t_when_once">Once</label>

            <!-- twice -->
            <input type="radio" name="timing_when" id="t_when_twice" class="d-none medician-check-inp" value="twice">
            <label class="medician-check-label" for="t_when_twice">Twice</label>

            <!-- thrice -->
            <input type="radio" name="timing_when" id="t_when_thrice" class="d-none medician-check-inp" value="thrice">
            <label class="medician-check-label" for="t_when_thrice">Thrice</label>

            <!-- 4 times -->
            <input type="radio" name="timing_when" id="t_when_4_times" class="d-none medician-check-inp" value="4 times">
            <label class="medician-check-label" for="t_when_4_times">4 times</label>

            <!-- 5 times -->
            <input type="radio" name="timing_when" id="t_when_5_times" class="d-none medician-check-inp" value="5 times">
            <label class="medician-check-label" for="t_when_5_times">5 times</label>
          </div>

          <!-- Timing How -->
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-6">
                <!-- Before Food -->
                <div class="form-check mt-2">
                  <input class="form-check-input" type="radio" name="timing_how" id="timing_how_before_food" value="before food">
                  <label class="form-check-label" for="timing_how_before_food">
                    Before Food
                  </label>
                </div>  

                <!-- Empty Stomach -->
                <div class="form-check mt-2">
                  <input class="form-check-input" type="radio" name="timing_how" id="timing_how_empty_stomach" value="empty stomach">
                  <label class="form-check-label" for="timing_how_empty_stomach">
                    Empty Stomach
                  </label>
                </div>  
              </div>
              <div class="col-md-6">
                <!-- After Food -->
                <div class="form-check mt-2">
                  <input class="form-check-input" type="radio" name="timing_how" id="timing_how_after_food" value="after food">
                  <label class="form-check-label" for="timing_how_after_food">
                    After food
                  </label>
                </div>  

                <!-- Empty Stomach -->
                <div class="form-check mt-2">
                  <input class="form-check-input" type="radio" name="timing_how" id="timing_how_bedtime" value="bedtime">
                  <label class="form-check-label" for="timing_how_bedtime">
                    Bedtime
                  </label>
                </div>  

              </div>
            </div>
          </div>

          <!-- Duration -->
          <h4 class="mt-5">Duration</h4>

          <div class="col-md-12">
            <!-- 1d -->
            <input type="radio" name="duration" id="duration_1d" class="d-none medician-check-inp" value="1d">
            <label class="medician-check-label" for="duration_1d">1d</label>

            <!-- 2d -->
            <input type="radio" name="duration" id="duration_2d" class="d-none medician-check-inp" value="2d">
            <label class="medician-check-label" for="duration_2d">2d</label>

            <!-- 3d -->
            <input type="radio" name="duration" id="duration_3d" class="d-none medician-check-inp" value="3d">
            <label class="medician-check-label" for="duration_3d">3d</label>

            <!-- 4d -->
            <input type="radio" name="duration" id="duration_4d" class="d-none medician-check-inp" value="4d">
            <label class="medician-check-label" for="duration_4d">4d</label>

            <!-- 5d -->
            <input type="radio" name="duration" id="duration_5d" class="d-none medician-check-inp" value="5d">
            <label class="medician-check-label" for="duration_5d">5d</label>

            <!-- 1w -->
            <input type="radio" name="duration" id="duration_1w" class="d-none medician-check-inp" value="1w">
            <label class="medician-check-label" for="duration_1w">1w</label>

            <!-- 10d -->
            <input type="radio" name="duration" id="duration_10d" class="d-none medician-check-inp" value="10d">
            <label class="medician-check-label" for="duration_10d">10d</label>

            <!-- 2w -->
            <input type="radio" name="duration" id="duration_2w" class="d-none medician-check-inp" value="2w">
            <label class="medician-check-label" for="duration_2w">2w</label>

            <!-- 15d -->
            <input type="radio" name="duration" id="duration_15d" class="d-none medician-check-inp" value="15d">
            <label class="medician-check-label" for="duration_15d">15d</label>

            <!-- 3w -->
            <input type="radio" name="duration" id="duration_3w" class="d-none medician-check-inp" value="3w">
            <label class="medician-check-label" for="duration_3w">3w</label>
          </div>
        </div>
      </div>
      <div class="modal-footer">
         
        <button type="button" class="btn btn-primary" id="save_medician_details">Close</button>
      </div>
    </div>
  </div>
</div>

@endsection


<script type="text/javascript">


window.addEventListener("DOMContentLoaded", (event) => {
  // openDosageModel();
});
// window.addEventListener('load', function () {
//    jQuery(".dosageitems").click(function () {
//      openDosageModel();
//   });
// })

  // jQuery(".dosageitems").click(function () {
  //    openDosageModel();
  // });

  function openDosageModel(){

     jQuery('#dosageModel').removeClass('d-none');
     jQuery('#dosageModel').modal('show');

  }

  function closeDosageModel(){
     jQuery('#dosageModel').modal('hide');

     toastr.warning('The data not yet saved, once you finished kindly scroll down and hit save!');

  }

  function searchMedicine() {
    
     var search = jQuery("#search").val();
      // var form = $(this);
      var actionUrl = "{{route('doctor.search.medicine')}}"+"?search="+search;

      jQuery.ajax({
        url: actionUrl,
          type: 'GET',
          dataType: 'json', // added data type
          success: function(res) {
               jQuery('#MedicineButtons').html('');
               jQuery('#MedicineButtons').append('<hr>');
               jQuery('#MedicineButtons').append('<h2>Select the Medicines</h3>');
               jQuery.each(res.data, function(index, itemData) {
                var getDose = (itemData.dosage) ? '('+itemData.dosage+')' : '';
               var name= '"'+itemData.name+'"';
                    jQuery("#MedicineButtons").append("<button id="+itemData.id+" type='button' onclick='addMedicineToList("+itemData.id+","+name+")' class='btn btn-medicine-tag'>"+itemData.name+getDose+"</button>");
                })
          }
      });

    
  }

  jQuery("input[name=intake_qty]").on('click', function() {
    jQuery("input[name=intake_qty]").prop('checked', false)
     var $box = jQuery(this);
     $box.prop("checked", true);

  });
  
  function addMedicineToList(id,name){
      // jQuery("#choosenMedicineTable tbody").append("<tr id="+id+">" +
      //       "<td>" +name+"</td>"+
      //       "<td><a href='#'>Remove</a></td>" +
      //       "</tr>");
       // console.log(getMedicineToListRenderHtml(id,name));
    // .prescriptionForm
      jQuery('.prescriptionForm #'+id).addClass('medicine-selected');
      jQuery("#choosenMedicine").append(getMedicineToListRenderHtml(id,name));

       // jQuery("#choosenMedicine").append("<input type='hidden' name='choosenMedicine[]' class='form-control' value='"+id+"'><lable class='form-label dosageitems'>"+name+"</label>&emsp;<a href='#' onclick='openDosageModel()'>+ Add Dosage</a><br>");

       toastr.success(name+" Selectd Successfuly")
  }

  function getMedicineToListRenderHtml(id,name){
    let html = '';
    if(id && name){
      let frameData = {
        id:null,
        medicine_id:id,
        total_qty:null,
        intake_qty:null,
        timing_when:null,
        timing_how:null,
        duration:null
      };
      html = `
      <div class="row selected-medicine-wrapper">
        <textarea name="choosenMedicine[]" class="d-none">${JSON.stringify(frameData)}</textarea>
        <div class="col-md-12 m-1 p-3 rounded border border-dark">
          <div class="row">
            <div class="col-12 d-flex justify-content-between">
              <span class="selected-medicine-wrapper">${name}</span>
              <div class="btn-wrapper">
                <span class="me-2 btn p-0" onclick="editSelectedMedician(this)">
                  <i class="fas fa-cog text-dark"></i>
                </span>
                <span class="btn p-0" data-id="${id}" onclick="removeSelectedMedician(this)">
                  <i class="fas fa-trash text-danger"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
      </div>
      `;
    }
    return html;
  }

  function editSelectedMedician(btn){
    let textarea = $(btn).parents('.selected-medicine-wrapper').find('textarea[name="choosenMedicine[]"]');
    let data = JSON.parse($(btn).parents('.selected-medicine-wrapper').find('textarea[name="choosenMedicine[]"]').val());
    let save_btn = document.getElementById('save_medician_details');

    // Setting Values
    for(let i in data){
      if(i === 'medicine_id' || i === 'id') continue;
      if(i === 'total_qty'){
        $(`[name="${i}"]`).val(data[i]);
      }else{
        $(`[name="${i}"]`).prop('checked',false)
        $(`[name="${i}"][value="${data[i]}"]`).prop('checked',true).change();
      }
    }

    openDosageModel();

    save_btn.onclick = function(){
      // Getting Values
      for(let i in data){
        let value = null;
        if(i === 'medicine_id' || i === 'id') continue;
        if(i === 'total_qty'){
          value = $(`[name="${i}"]`).val();
        }else{
          value = $(`[name="${i}"]:checked`).val();
        }
        data[i] = (value) ? value : null;
      }
      $(textarea).text(JSON.stringify(data));
      closeDosageModel();
    }

  }

  function removeSelectedMedician(btn){
    var getDelId =jQuery(btn).data("id");
      // console.log(getDelId);
      jQuery('.prescriptionForm #'+getDelId).removeClass('medicine-selected');
    if(confirm('Are you sure you want to delete this itme ?')){
      let data = JSON.parse($(btn).parents('.selected-medicine-wrapper').find('textarea').val());
      if(data['id']){

        let deleted_inp_ids = JSON.parse($('#deleted_prescription_medicines').val());
        deleted_inp_ids.push(data['id']);
        $('#deleted_prescription_medicines').val(JSON.stringify(deleted_inp_ids));
        // var getDelId =jQuery(btn).data("id");
        // console.log(getDelId);
       // jQuery('.prescriptionForm #'+getDelId).removeClass('medicine-selected');

      }
      $(btn).parents('.selected-medicine-wrapper').remove();

    }
  }
</script>