@extends('base.front-end')

@section('content')
<div class="container">
    <div class="row p-5">
        
    </div>
  </div>
  <div class="container">
  	<div class="breadcaump-area pt--130 pb--50 bg_color--1 breadcaump-title-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcaump-inner text-center">
                            <h1 class="heading heading-h1">My Account</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="container">
  	 <div class="row">
                       
                        <!-- Register Form -->
                        <div class="col-lg-12 mt_md--40 mt_sm--40">
                            <div class="login-form-wrapper">
                                <form action="#" class="sn-form sn-form-boxed">
                                    <div class="sn-form-inner">
                                        <div class="single-input">
                                            <label for="register-form-name">Name</label>
                                            <input type="text" name="register-form-name" id="register-form-name">
                                        </div>
                                        <div class="single-input">
                                            <label for="register-form-email">Email address</label>
                                            <input type="text" name="register-form-email" id="register-form-email">
                                        </div>
                                        <div class="single-input">
                                            <label for="register-form-password">Phone No</label>
                                            <input type="text" name="register-form-password" id="register-form-password">
                                        </div>
                                        <div class="single-input">
                                            <button type="submit">
                                                <span>Login</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!--// Register Form -->
                    </div>
         
  </div>


@include('base.front-end.js')
@endsection
