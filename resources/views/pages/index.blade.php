<x-base-layout>
  {{--  <div class="card card-custom">
      <div class="card-header border-0 pt-6 pb-0">
            <div class="card-title">
                 Dashboard under constrution
            </div>
            <div class="card-toolbar">
                
            </div>
        </div>
      <div class="card-body">
      </div>
   </div> --}}
   @php 
   $today = date('Y-m-d');
        $tomorrow = date('Y-m-d',strtotime("+1 day"));
        $day_after_tomorrow = date('Y-m-d',strtotime("+2 days"));
   @endphp
<div class="row">
     <div class="col-md-4">
         <div class="card card-custom bg-light-success card-shadowless gutter-b border">
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <a href="#" class="card-title fw-bold text-success text-hover-state-dark fs-6 mb-4 d-block">Total Doctors</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                        <span class="text-dark fs-2 fw-bolder mr-2">{{$data['doctors']}}</span></div>
                  
                       
                    </div>
                    <!--end:: Body-->
                </div>
     </div>
     <div class="col-md-4">
         <div class="card card-custom bg-light card-shadowless gutter-b border">
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <a href="#" class="card-title fw-bold text-info text-hover-state-dark fs-6 mb-4 d-block">Total Employees </a>
                        <div class="font-weight-bold text-muted font-size-sm">
                        <span class="text-dark fs-2 fw-bolder mr-2">{{$data['staffs']}}</span></div>
                  
                       
                    </div>
                    <!--end:: Body-->
                </div>
     </div>
     <div class="col-md-4">
         <div class="card card-custom bg-light-primary card-shadowless gutter-b border">
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <a href="#" class="card-title fw-bold text-primary text-hover-state-dark fs-6 mb-4 d-block">Total Patients</a>
                        <div class="font-weight-bold text-muted font-size-sm">
                        <span class="text-dark fs-2 fw-bolder mr-2">{{$data['patients']}}</span></div>
                       
                    </div>
                    <!--end:: Body-->
                </div>
     </div>
 </div>
 <div class="row pt-5">
     <div class="col-md-12">
         <h3>Appointments Details</h3>
     </div>
    <div class="col-md-4">
         <div class="card card-custom bg-light-primary card-shadowless gutter-b border">
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <a href="{{route('admin.patients.appointments','date='.$today)}}" class="card-title fw-bold text-primary text-hover-state-dark fs-6 mb-4 d-block">Today Appointments</a>
                        <p>{{ date('d-m-Y') }}</p>
                        <div class="font-weight-bold text-muted font-size-sm">
                        <span class="text-dark fs-2 fw-bolder mr-2">{{$data['today_appointments']}}</span></div>
                       
                    </div>
                    <!--end:: Body-->
                </div>
     </div>
     <div class="col-md-4">
         <div class="card card-custom bg-light-primary card-shadowless gutter-b border">
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <a href="{{route('admin.patients.appointments','date='.$tomorrow)}}" class="card-title fw-bold text-primary text-hover-state-dark fs-6 mb-4 d-block">Tomorrow Appointments</a>
                        <p>{{ date('d-m-Y',strtotime("+1 day"))}}</p>
                        <div class="font-weight-bold text-muted font-size-sm">
                        <span class="text-dark fs-2 fw-bolder mr-2">{{$data['tomorrow_appointments']}}</span></div>
                       
                    </div>
                    <!--end:: Body-->
                </div>
     </div>
     <div class="col-md-4">
         <div class="card card-custom bg-light-primary card-shadowless gutter-b border">
                    <!--begin::Body-->
                    <div class="card-body my-4">
                        <a href="{{route('admin.patients.appointments','date='.$day_after_tomorrow)}}" class="card-title fw-bold text-primary text-hover-state-dark fs-6 mb-4 d-block">Day afer Tomorrow Appointments</a>
                        <p>{{ date('d-m-Y',strtotime("+2 days"))}}</p>
                        <div class="font-weight-bold text-muted font-size-sm">
                        <span class="text-dark fs-2 fw-bolder mr-2">{{$data['day_after_tomorrow_appointments']}}</span></div>
                       
                    </div>
                    <!--end:: Body-->
                </div>
     </div>
 </div>
 <div class="row">
    <div class="col-md-12">
       <br>
    </div>
 </div>
 
</x-base-layout>
