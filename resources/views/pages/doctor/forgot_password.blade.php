@extends('base.base')

@section('content')
    <!--begin::Authentication-->
     <div class ="container">
      <div class="row">
         <div class="text-center">

            <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                   <img class="w-30" style="width: 300px;" src="{{asset('front-end/assets/img/Log-v1.png')}}">
                  <form method="POST" action="{{ route('doctor.forgot.post') }}" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
                         @csrf

                         <!--begin::Heading-->
                             <div class="text-center mb-10">
                                 <!--begin::Title-->
                                 <h1 class="text-dark mb-3">
                                    Forgot Password
                                 </h1>
                                 <!--end::Title-->
                             </div>
                             <!--begin::Heading-->

                             <!--begin::Input group-->
                             <div class="fv-row mb-10">
                                 <!--begin::Label-->
                                 <label class="form-label float-start fs-6 fw-bolder text-dark">{{ __('Email') }}</label>
                                 <!--end::Label-->

                                 <!--begin::Input-->
                                 <input class="form-control form-control-lg form-control-solid" type="email" name="email" placeholder="Your email id" autocomplete="off" value="{{ old('email') }}" required />
                                 <!--end::Input-->
                                 @if($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                             </div>
                             <!--end::Input group-->

                             <!--begin::Actions-->
                             <div class="text-center">
                                 <!--begin::Submit button-->
                                 <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5 " style="background:#724C9F">
                                 Submit
                                </button>
                                 <!--end::Submit button-->
                             </div>
                             <!--end::Actions-->
                         </form>

                         <div class="fv-row mb-10">
                            <a href="{{ route('doctor.login') }}"><label class="form-label float-start fs-6 fw-bolder text-dark"> << Back to Sign In</label>
                            </a>
                         </div>
                  </div>
               <div class="col-md-3"></div>
            </div>
         </div>
      </div>

    </div>
    <!--end::Authentication-->
@endsection

