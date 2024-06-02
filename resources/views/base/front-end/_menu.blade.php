 <!-- Header -->
        <header class="br_header header-default position-from--top header-transparent black-logo--version haeder-fixed-width haeder-fixed-150 headroom--sticky header-mega-menu clearfix">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="header__wrapper mr--0">
                            <!-- Header Left -->
                            <div class="header-left">
                                <div class="logo">
                                    <a href="{{route('front.home.index')}}">
                                        <img src="https://dhoom.filmipop.com/media//theatrelogo/2015/Aug/1439283291-arrslogoma121.jpg" alt="Brook Images">
                                    </a>
                                </div>
                            </div>
                            <!-- Mainmenu Wrap -->
                            <div class="mainmenu-wrapper d-none d-lg-block">
                                <nav class="page_nav">
                                    <ul class="mainmenu">
                                        <li class="lavel-1 ">
                                          <a href="{{route('front.home.index')}}"><span>Home</span></a>
                                        </li>
                                        <li class="lavel-1 ">
                                          <a href="{{route('front.page.myaccount')}}"><span>My Account</span></a>
                                        </li>
                                        <li class="lavel-1 ">
                                          <a href="{{route('front.page.order')}}"><span>My Orders</span></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- Header Right -->
                            <div class="header-right">
                                <!-- Start Minicart -->
                                <div class="mini-cart">
                                    <div id="minicart-trigger" class="minicart-trigger mini-cart-button" data-count="3">
                                        <a href="{{route('front.page.cart')}}"><i class="fas fa-shopping-bag"></i></a>
                                    </div>
                                     
                                </div>
                                <!-- End Minicart -->
                                <!-- Start Popup Search Wrap -->
                                <div class="popup-search-wrap">
                                    <a class="btn-search-click" href="#">
                                        <i class="fa fa-search"></i>
                                    </a>
                                </div>
                                <!-- End Popup Search Wrap -->
                                <!-- Start Hamberger -->
                                <div class="manu-hamber popup-mobile-click d-block d-lg-none black-version d-block d-xl-none pl_md--10 pl_sm--10">
                                    <div>
                                        <i></i>
                                    </div>
                                </div>
                                <!-- End Hamberger -->
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </header>
        <!--// Header -->
<!-- Start Popup Menu -->
        <div class="popup-mobile-manu popup-mobile-visiable">
          <div class="inner">
              <div class="mobileheader">
                  <div class="logo">
                     {{--  <a href="index.html">
                          <img src="img/logo/brook-black.png" alt="Multipurpose">
                      </a> --}}
                  </div>
                  <a class="mobile-close" href="#"></a>
              </div>
              <div class="menu-content">
                  <ul class="menulist object-custom-menu">
                      <li class="">
                      <a href="{{route('front.home.index')}}"><span>Home</span></a>
                    </li>
                    <li class=" ">
                      <a href="{{route('front.page.myaccount')}}"><span>My Account</span></a>
                    </li>
                    <li class=" ">
                      <a href="{{route('front.page.order')}}"><span>My Orders</span></a>
                    </li>
                    </ul>
                  </div>
                </div>
        </div>
<div class="brook-search-popup">
    <div class="inner">
        <div class="search-header">
            <div class="logo">
                <a href=" ">
                     
                </a>
            </div>
            <a href="#" class="search-close"></a>
        </div>
        <div class="search-content">
            <form action="#">
                <label>
                    <input type="search" placeholder="Enter search keyword…">
                </label>
                <button class="search-submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>
</div>