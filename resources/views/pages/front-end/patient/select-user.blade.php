@extends('base.base')

@section('content')
    <style type="text/css">
        .user-list-item-wrapper label{
            cursor: pointer;
        }
        .user-list-item-wrapper label{
            border-color:#181c321c !important;
        }
        .user-list-item-wrapper input[type="radio"]:checked + label{
            border-color:#724C9F !important;
        }
    </style>
    <!--begin::Authentication-->
     <div class ="container">
      <div class="row">
         <div class="text-center">
         
            <div class="row">
               <div class="col-md-4"></div>
               <div class="col-md-4">
                   <img class="w-30" style="width: 300px;" src="{{asset('front-end/assets/img/Log-v1.png')}}">
                  <form method="POST" action="{{route('patient.selected.user.login')}}" class="form w-100" novalidate="novalidate" id="kt_sign_in_form">
                         @csrf

                         <!--begin::Heading-->
                             <div class="text-center mb-10">
                                 <!--begin::Title-->
                                 <h1 class="text-dark mb-3">
                                     {{ __('Login As') }}
                                 </h1>
                                 <!--end::Title-->
                             </div>
                             <!--begin::Heading-->

                             <!--begin::Input group-->
                             <div class="fv-row mb-10   ">
                                 <!--begin::Label-->
                                 {{-- <label class="form-label fs-6 fw-bolder text-dark">{{ __('Mobile No') }}</label> --}}
                                 <!--end::Label-->

                                 <!--begin::Input-->
                                 {{-- <input class="form-control form-control-lg form-control-solid" type="text" name="otp" placeholder="1234" autocomplete="off" value="{{ old('otp') }}" onkeypress="return event.charCode > 47 && event.charCode < 58;" pattern="[0-9]{5}" max="4" required autofocus/> --}}
                                 <!--end::Input-->
                                {{--  @if($errors->has('otp'))
                                      <span class="text-danger">{{ $errors->first('otp') }}</span>
                                  @endif --}}
                                <!--begin::user-list-->
                                @forelse($users as $key => $user)
                                    {{-- @dd($user) --}}
                                    <div class="user-list-item-wrapper mt-3">
                                        <input type="radio" class="d-none" id="select-user-{{$user->user_id}}" name="selected_user" value="{{$user->user_id}}" @if($key === 0) checked @endif/>
                                        <label for="select-user-{{$user->user_id}}" class="px-5 py-4 w-100 border rounded border-2">
                                            <div class="d-flex justify-content-between align-items-center h3 m-0">
                                                <div class="user-name">{{$user->first_name}} {{$user->last_name}}</div>
                                                <div class="icon-wrapper">
                                                    <i class="fas fa-chevron-right"></i>
                                                </div>
                                            </div>
                                        </label>
                                    </div>
                                    
                                @empty
                                @endforelse
                                <!--end::user-list-->
                             </div>
                             <!--end::Input group-->


                             <!--begin::Actions-->
                             <div class="text-center">
                                 <!--begin::Submit button-->
                                 {{-- <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5 " style="background:#724C9F">
                                     @include('partials.general._button-indicator', ['label' => __('Verify OTP')])
                                 </button>
                                 <a id="resendOTP" href="#" style="display:none;color:#724C9F">Re-send OTP</a> --}}
                                 <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5 " style="background:#724C9F">
                                     @include('partials.general._button-indicator', ['label' => __('Login')])
                                 </button>
                                 <!--end::Submit button-->

                             </div>
                             <!--end::Actions-->
                         </form>
                  </div>
               <div class="col-md-4"></div>
            </div>
         </div>
      </div>

    </div>
    <!--end::Authentication-->
@endsection
<script type="text/javascript">
    
    var myTimeout = setTimeout(enableResendOtp, 8000);

    function enableResendOtp(){
        jQuery('#resendOTP').css('display','block');
    }
</script>