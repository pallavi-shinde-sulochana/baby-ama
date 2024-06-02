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
                            <h1 class="heading heading-h1">Cart</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="container">
  	 <!-- Start Product Area -->
            <div class="cart_area pt--60 pb--150">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <!-- Cart Table -->
                                <div class="cart-table table-responsive mb--40">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="pro-thumbnail">Image</th>
                                                <th class="pro-title">Product</th>
                                                <th class="pro-price">Price</th>
                                                <th class="pro-quantity">Quantity</th>
                                                <th class="pro-subtotal">Total</th>
                                                <th class="pro-remove">Remove</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img src="https://img.freepik.com/free-photo/croissant-with-hot-dog-white-dish_1150-20169.jpg" alt="Product"></a></td>
                                                <td class="pro-title"><a href="#">Puff</a></td>
                                                <td class="pro-price"><span>₹395.00</span></td>
                                                <td class="pro-quantity">
                                                    
                                                    <div class="pro-qty">
                                                        <input type="number" value="1">
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal"><span>₹395.00</span></td>
                                                <td class="pro-remove"><a href="#"><i class="ion ion-android-close"></i></a></td>
                                            </tr>
                                            <tr>
                                                <td class="pro-thumbnail"><a href="#"><img src="https://img.freepik.com/free-photo/ice-cream-cones_1101-962.jpg" alt="Product"></a></td>
                                                <td class="pro-title"><a href="#">Ice Cream</a></td>
                                                <td class="pro-price"><span>₹275.00</span></td>
                                                <td class="pro-quantity">
                                                     
                                                    <div class="pro-qty">
                                                        {{-- <span class="dec qtybtn">-</span> --}}
                                                        <input type="text" value="2">
                                                        {{-- <span class="inc qtybtn">+</span> --}}
                                                    </div>
                                                </td>
                                                <td class="pro-subtotal"><span>₹550.00</span></td>
                                                <td class="pro-remove"><a href="#"><i class="ion ion-android-close"></i></a></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>

                            <div class="row">

                              

                                <!-- Cart Summary -->
                                <div class="col-lg-12 col-12 mb--40 d-flex">
                                    <div class="cart-summary">
                                        <div class="cart-summary-wrap">
                                            <h4>Cart Summary</h4>
                                            <p>Sub Total <span>₹1250.00</span></p>
                                            <h2>Grand Total <span>₹1250.00</span></h2>
                                        </div>
                                        <div class="cart-summary-button-group">
                                            <a href="{{route('front.page.checkout')}}" class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between" style="background: #0038e3;" type="submit">Checkout</a>
                                            <a href="{{route('front.page.checkout')}}" class="brook-btn bk-btn-theme btn-sd-size btn-rounded space-between" style="background: #0038e3;"  type="submit">Update Cart</a>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- End Product Area -->
  </div>


@include('base.front-end.js')
@endsection
