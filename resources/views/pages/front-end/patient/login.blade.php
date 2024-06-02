@extends('base.base')

@section('content')
    <!--begin::Authentication-->
     <div class ="container">
      <div class="row">
         <div class="text-center">
         
            <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                   {{-- <img class="w-30" style="width: 300px;" src="{{asset('front-end/assets/img/pigu logo-01.png')}}"> --}}
                    <img class="w-30" style="width: 300px;" src="{{asset('front-end/assets/img/Log-v1.png')}}">
 
                  <form method="POST" action="{{ route('patient.login.post') }}" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
                         @csrf

                         <!--begin::Heading-->
                             <div class="text-center mb-10">
                                 <!--begin::Title-->
                                 <h1 class="text-dark mb-3">
                                     {{ __('Patient Sign In') }}
                                 </h1>
                                 <!--end::Title-->
                             </div>
                             <!--begin::Heading-->

                             <!--begin::Input group-->
                             <div class="fv-row mb-10">
                                 <!--begin::Label-->
                                 <label class="form-label float-start fs-6 text-dark">{{ __('Mobile Number') }}</label>
                                 <!--end::Label-->

                                 <!--begin::Input-->
                                 <input class="form-control form-control-lg" type="text" name="mobile" placeholder="Enter your registered number" autocomplete="off" value="{{ old('mobile') }}" onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{5}" max="10" required autofocus/>
                                 <!--end::Input-->
                                 @if($errors->has('mobile'))
                                      <span class="text-danger">{{ $errors->first('mobile') }}</span>
                                  @endif
                             </div>
                             <!--end::Input group-->


                             <!--begin::Actions-->
                             <div class="text-center">
                                 <!--begin::Submit button-->
                                 <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5 " style="background:#724C9F">
                                     @include('partials.general._button-indicator', ['label' => __('Sign In')])
                                 </button>
                                 <!--end::Submit button-->
                             </div>
                             <!--end::Actions-->
                         </form>
                  </div>
               <div class="col-md-3"></div>
            </div>
         </div>
      </div>

    </div>
    <!--end::Authentication-->
@endsection
