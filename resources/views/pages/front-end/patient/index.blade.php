@extends('base.patient-dashboard')
@section('doctor-content')
@php
$getparam = isset($_GET['doctor_type']) ? $_GET['doctor_type'] : '';
@endphp
<div class="card doctor-home">
  <div class="card-body ">
    <div class="row">
      <div class="col-7 col-md-6 col-lg-6">
        <h2 class="color-white">Book Appointment </h2>
           Book your appointment with Babyama specialist

      </div>
      <div class="col-5 col-md-6 col-lg-4">
        <div class="text-center">

          <img class="patient-home-baby" src="{{helperAssetUrl('assets/img/pigu logo-01-only.png')}}">
        </div>
      </div>
    </div>
  </div>
</div>
{{--             <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens,
              the page content will be pushed off canvas.</p>
            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> --}}

<section class="patient-specialists patient-home pt-5">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-6">
                    <h2>Our Specialists</h2>
                  </div>
                  <div class="col-md-6 text-end">
                    <select class="form-select" onchange="window.location.href = '{{route('patient.home')}}?doctor_type='+this.value+''">
                      <!-- @foreach($typesArray as $key => $types)
                        @if(count($types) > 0)
                          <option value="{{$key}}" @if($key === $doctor_type) selected @endif>{{ucwords(str_replace('-',' ',$key))}}</option>
                        @endif
                      @endforeach -->
                      <option value=""></option>
                      @foreach($getSpecialists as $sps)
                        @if($sps)
                          <option value="{{$sps}}" @if($getparam==$sps) {{'selected'}} @endif >{{ucwords(str_replace('-',' ',$sps))}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                </div>
              </div>
          </div>
        </div>
        <div class="col-md-12">
         <!--  @foreach($typesArray as $key => $types)
            @if($doctor_type === $key)
              @foreach($types as $doctor)
                <div class="card">
                  <div class="card-body">
                     <div class="row">
                       <div class="col-8">
                          <h2>{{$doctor->user->first_name.' '.$doctor->user->last_name}}</h2>
                       </div>
                       <div class="col-4">
                         <a href="{{route('patient.book',$doctor->id)}}" class="btn patinet-book">Book</a>
                       </div>
                     </div>
                  </div>
                </div>
              @endforeach
            @endif
          @endforeach -->
          @foreach($all_doctors as $key => $doctor)
            <div class="card">
                  <div class="card-body">
                     <div class="row">
                       <div class="col-8">
                          <h2>{{$doctor->user->first_name.' '.$doctor->user->last_name}}</h2>
                          <span>{{$doctor->specialist_type}}</span>
                       </div>
                       <div class="col-4">
                         <a href="{{route('patient.book',$doctor->id)}}" class="btn patinet-book">Book</a>
                       </div>
                     </div>
                  </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
    

    
    {{-- <br> --}}

    {{-- <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6"> --}}
      {{-- <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="tab" href="#{{'All'}}">All</a>
      </li> --}}
      {{-- @php $inc=1; @endphp
      @foreach($typesArray as $key => $types)
      @if(isset($types[0]))
      @php $isActive = ($inc==1) ? 'active' : ''; @endphp
        <li class="nav-item"> --}}
          {{-- {{$inc}} --}}
            {{-- <a class="nav-link {{$isActive}}" data-bs-toggle="tab" href="#{{str_replace(' ','_',$key)}}">{{$key}}</a> --}}
          
        {{-- </li>
      @php $inc++; @endphp
      @endif --}}
       {{--  <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_2">Link 2</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">Link 3</a>
        </li> --}}
      {{-- @endforeach
    </ul> --}}

    {{-- <div class="tab-content" id="myTabContent">
       @foreach($typesArray as $key => $types)
          @if(isset($types[0]))
           @php $incd=1; @endphp
            @foreach($types as $key2 => $doctor)
            @php $isActive2 = ($incd==1) ? 'active' : ''; @endphp
                <div class="tab-pane fade show  " id="{{str_replace(' ','_',$key)}}" role="tabpanel">

                  <div class="card">
                    <div class="card-body">
                       <div class="row">
                         <div class="col-8">
                        <h2>{{$doctor->user->first_name.' '.$doctor->user->last_name}}</h2>
                        <p>{{$key}}</p>
                           
                         </div>
                         <div class="col-4">
                           <a href="{{route('patient.book',$doctor->id)}}" class="btn patinet-book">Book</a>
                         </div>
                       </div>
                    </div>
                  </div>
                </div>
                 @php $incd++; @endphp
            @endforeach
          @endif
       @endforeach --}}
        
       {{--  <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
            l2
        </div>
        <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
             l3
        </div> --}}
    {{-- </div> --}}

</section>
@endsection