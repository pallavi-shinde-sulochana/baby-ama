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
                            <h1 class="heading heading-h1">Checkout</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="container">
  	 <!-- Start Product Area -->
         <div class="row">

                                            <!-- Cart Total -->
                                            <div class="col-12 mb--60">

                                                {{-- <h4 class="checkout-title">Cart Total</h4> --}}

                                                <div class="checkout-cart-total">

                                                    <h4>Product <span>Total</span></h4>

                                                    <ul>
                                                        <li>Puff Egg X 01 <span>₹295.00</span></li>
                                                        <li>Ice Cream X 02 <span>₹550.00</span></li>
                                                       
                                                        <li>Popcorn Large X 01 <span>₹110.00</span></li>
                                                    </ul>

                                                    <p>Sub Total <span>₹1250.00</span></p>

                                                    <h4>Grand Total <span>₹1250.00</span></h4>

                                                </div>

                                            </div>

                                            <!-- Payment Method -->
                                            <div class="col-12 mb--60">

                                                <h4 class="checkout-title">Payment Method</h4>

                                                <div class="checkout-payment-method">

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_check" name="payment-method" value="check">
                                                        <label for="payment_check">Pay at Pickup</label>
                                                        <p data-method="check">Please pay amount at while at the time of interval</p>
                                                    </div>

                                                    <div class="single-method">
                                                        <input type="radio" id="payment_bank" name="payment-method" onclick="oncheckUPI()" value="bank">
                                                        <label for="payment_bank">UPI</label>
                                                        <p data-method="bank">Check the below QR Code on your gpay, phonepe , any UPI supported payment app and pay</p>
                                                        <div id="upi" style="display:none" >
                                                            <img  src="https://qph.cf2.quoracdn.net/main-qimg-6f10dcab91fe9a768c8757381a98e9ae-pjlq">
                                                        </div>

                                                    </div>

                                                   

                                                

                                                    <div class="single-method">
                                                        <input type="checkbox" id="accept_terms">
                                                        <label for="accept_terms">I’ve read and accept the terms &amp;
                                                            conditions of ARRS THEATRE</label>
                                                    </div>
                                                </div>
                                                <div class="plceholder-button mt--50">
                                                    <a href="{{route('front.page.thankyou')}}" style="    background: #0038e3;" class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between">Place
                                                        order</a>
                                                </div>
                                            </div>
                                        </div>
            <!-- End Product Area -->
  </div>

<script>
    
    function oncheckUPI(){
        jQuery('#upi').show();
    }
</script>
@include('base.front-end.js')
@endsection
