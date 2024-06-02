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
                            <h1 class="heading heading-h1">Thank You</h1>
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
                                                   <h3 class="text-center p-5"> Hi Your order place succesfully , you can collect at interval time</h3>
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

                                            
                                        </div>
            <!-- End Product Area -->
  </div>


@include('base.front-end.js')
@endsection
