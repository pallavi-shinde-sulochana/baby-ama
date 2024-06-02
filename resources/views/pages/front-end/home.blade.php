@extends('base.base')

@section('content')
<style>
   body{
      height: auto;
   }
   .home-banner{
      min-height: 100vh;
   }
</style>
    <!--begin::Authentication-->
     <div class="text-center home-banner d-flex align-items-center justify-content-center">
         
        {{-- <img class="w-50 h-60" style="" src="{{asset('front-end/assets/img/iPadPro11_-31.png')}}"> --}}
        <div class="container">

         <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                  <img class="w-30" style="width: 300px;" src="{{asset('front-end/assets/img/Log-v1.png')}}">
               </div>
               <div class="col-md-3"></div>
         </div>
            
         <div class="row p-5 m-5" >
            <div class="col-12 col-md-12 p-5">
                  
               <a class="btn btn-bg  " href="{{route('patient.login')}}"> Patient Login</a>
            </div>
            <div class="col-12 col-md-12 p-5">
               <a class="btn btn-bg  " href="{{route('patient.webbooking')}}"> Book Your Appointment</a>
            </div>
            <div class="col-12 col-md-12 p-5">
               <a class="btn btn-bg   " href="{{route('doctor.login')}}">  Doctor Login</a>
            </div>
            <div class="col-12 col-md-12 p-5">
               <a class="btn btn-bg   " href="{{route('pharmacy.login')}}"> Pharmacy Login</a>
            </div>
         </div>
        </div>
    </div>
    <style>
       .home-banner{
/*         background-image: url("{{asset('front-end/assets/img/iPadPro11_-31.png')}}");*/
     
         height: 100%;
          background-repeat: no-repeat;
          background-size: auto;
          background-position: 50%;
          background:#F0C0DF;
       }
       .btn-bg{
         background-color: #724C9F;
         color: white;
       }
       .btn-bg:hover{
         color: white;
       }
       a.btn.btn-bg {
          width: 250px;
      }
    </style>
    <!--end::Authentication-->
@endsection
