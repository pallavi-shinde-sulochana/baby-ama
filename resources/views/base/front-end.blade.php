<!DOCTYPE html>
{{--
   Product Name: {{ theme()->getOption('product', 'description') }}
   Author: Tealorca
   Purchase: {{ theme()->getOption('product', 'purchase') }}
   Website: http://www.tealorca.com/
   Contact: support@tealorca.com
   License: {{ theme()->getOption('product', 'license') }}
--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    {!! theme()->printHtmlAttributes('html') !!} {{ theme()->printHtmlClasses('html') }}>
{{-- begin::Head --}}

<head>
   {{-- Collect Meta from Page  --}}
   @php
    $meta= isset($page->meta) ? $page->meta : null;
   @endphp

    <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>{{ ($meta) ? ucfirst(sgGetMeta($meta,'title'))  : ucfirst(theme()->getOption('meta', 'title'))  }}</title>

    <meta name="description" content="{{ ($meta) ? ucfirst(sgGetMeta($meta,'description'))  : ucfirst(theme()->getOption('meta', 'description'))  }}"/>
    <meta name="keywords" content="{{($meta) ? ucfirst(sgGetMeta($meta,'keywords'))  : ucfirst(theme()->getOption('meta', 'keywords'))}}"/>
    @if($meta && !empty(sgGetMeta($meta,'canonical')))
      <link rel="canonical" href="{{ ($meta) ? ucfirst(sgGetMeta($meta,'description'))  : ucfirst(theme()->getOption('meta', 'description'))  }}"/>
    @endif
    @if(!empty($meta))
      <meta property="og:title" content="{{ucfirst(sgGetMeta($meta,'title'))}}">
      <meta property="og:description" content="{{ucfirst(sgGetMeta($meta,'description'))}}">
      <meta property="og:image" content="{{ucfirst(sgGetMeta($meta,'image'))}}">
      <meta property="og:url" content="{{ucfirst(sgGetMeta($meta,'url'))}}">
    @endif
    <link rel="shortcut icon" href="{{ asset(theme()->getOption('assets', 'favicon')) }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- begin::Fonts --}}
    <link rel="shortcut icon" href="{{asset('front-end/assets/img/favicon.png') }}">
        <link href="https://fonts.googleapis.com/css2?family=Catamaran:wght@100;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="{{asset('front-end/assets/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{asset('front-end/assets/css/revoulation.css') }}">
        <link rel="stylesheet" href="{{asset('front-end/assets/css/plugins.min.css') }}">
        <link rel="stylesheet" href="{{asset('front-end/assets/style.min.css') }}">

    {{-- end::Fonts --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    @yield('styles')

</head>
{{-- end::Head --}}

{{-- begin::Body --}}
<body class="template-color-13 template-font-1">
    <!-- Start Preloader  -->
    <div id="page-preloader" class="page-loading clearfix">
        <div class="page-load-inner">
            <div class="preloader-wrap">
                <div class="wrap-2">
                    <div class=""> 
                        {{-- <img src="{{asset('front-end/assets/img/icons/brook-preloader.gif') }}" alt="Brook Preloader"> --}}
                        <img src="https://dhoom.filmipop.com/media//theatrelogo/2015/Aug/1439283291-arrslogoma121.jpg" alt="ARRS">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Preloader  -->
     <div id="wrapper" class="wrapper">
 
        {{ theme()->getView('base/front-end/_menu') }}
         <!-- Page Conttent -->
        <main class="page-content">
            @yield('content')
        </main>

        @yield('scripts')

        <!-- Footer -->
        <footer class="page-footer bg_color--1 pl--150 pr--150 pl_lg--100 pr_lg--100 pl_md--50 pr_md--50 pl_sm--30 pr_sm--30">
            <div class="bk-footer-inner pt--150 pt_md--80 pt_sm--80 pb--60">
                <div class="row">
                    <div class="col-lg-5 col-xl-7 col-md-4 col-12">
                        <div class="footer-widget">
                            <div class="logo">
                                <a href="index.html">
                                    {{-- <img src="{{asset('front-end/assets/img/logo/brook-black.png') }}" alt="Logo image"> --}}
                                    <img src="https://dhoom.filmipop.com/media//theatrelogo/2015/Aug/1439283291-arrslogoma121.jpg" alt="Logo image">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-2 col-md-3 col-12 mt_sm--30">
                        <div class="footer-widget text-var--2 dark-text menu--about">
                            <h5 class="heading heading-h5">About us</h5>
                            <div class="footer-menu mt--50">
                                <ul class="ft-menu-list bk-hover">
                                    <li><a class="color-dark" href="#">About Us</a></li>
                                    <li><a class="color-dark" href="#">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-xl-3 col-md-5 col-12 mt_sm--30">
                        <div class="footer-widget text-var--2 menu--contact">
                            <h5 class="heading heading-h5">Contact</h5>

                            <div class="footer-inner mt--50">
                                <div class="footer-address dark-text bk-hover mb--20">
                                    <p class="color-dark">2-94-95, Meyyanur Bypass Rd, Meyyanur, Salem, Tamil Nadu 636004</p>
                                    <div class="link mt--10">
                                        <p><a class="color-dark" href="#">info@arrstheatre.com</a></p>
                                    </div>
                                </div>

                                <div class="social-share social--transparent">
                                    <a href="https://www.facebook.com/ARRSMultiplexSalem/"><i class="fab fa-facebook"></i></a>
                                    <a href="https://www.facebook.com/ARRSMultiplexSalem/"><i class="fab fa-twitter"></i></a>
                                    <a href="https://www.facebook.com/ARRSMultiplexSalem/"><i class="fab fa-twitte"><i class="fab fa-instagram"></i></a>
                                  {{--   <a href="#"><i class="fab fa-dribbble"></i></a>
                                    <a href="#"><i class="fab fa-pinterest"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Copyright Area -->
            <div class="copyright text-var-2 ptb--50">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="copyright-left">
                            <div class="bk-copyright-payment d-flex justify-content-center justify-content-md-start">
                                <div>
                                    <a href="#"><img src="{{asset('front-end/assets/img/payment/method-1.png') }}" alt="Multipurpose"></a>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="copyright-right text-center text-md-end mt_sm--15">
                            <p class="color-dark">© 2022 Techyazh. All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Copyright Area -->
        </footer>
        <!--// Footer -->

 </div>
 {{-- Wrapper --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script src="{{asset('front-end/assets/js/vendor/vendor.min.js') }}"></script>
    <script src="{{asset('front-end/assets/js/plugins.min.js') }}"></script>
    <!-- REVOLUTION JS FILES -->
    <script src="{{asset('front-end/assets/js/revolution.tools.min.js') }}"></script>
    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS -->
    <script src="{{asset('front-end/assets/js/revolution.extension.min.js') }}"></script>
    <script src="{{asset('front-end/assets/js/main.js') }}"></script>
    <script src="{{asset('front-end/assets/js/revoulation.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



<script type="text/javascript">


toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
}

function showToasterSuccess(msg){
    toastr.success(msg);
}

function showToasterError(msg){
    toastr.error(msg);
}

    /*jQuery( '.sugunaForm' ).on( 'submit', function(e) {
        e.preventDefault();
        jQuery('.sugunaFormSubmit').html('<i class="fa fa-spinner fa-spin"></i> Submitting..');
        jQuery('.sugunaFormSubmit').prop("disabled", true);
        jQuery.ajax({
            type: 'post',
            url: "{{route('front.page.post.email')}}",
            // data: JSON.stringify(currentDoc),
            // data: {doc:JSON.stringify(currentDoc)},
            // data: JSON.stringify(data),
            data: jQuery('.sugunaForm').serialize(),
            // data: prepareData,
            // contentType: "application/json; charset=utf-8",
            // traditional: true,
            success: function (response) {
               // var returnedData = JSON.parse(response);
               if(response.success){
                   console.log('success');
                  // alert(response.message);
                  Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  })

                  setTimeout(function(){
                    location.reload();
                  }, 1550);
               }else{
                   console.log('message');
                  Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 1500
                  })

                   jQuery('.sugunaFormSubmit').html('Submit');
                   jQuery('.sugunaFormSubmit').prop("disabled", false);
               }

                // alert('Data saved')
                // console.log(data);
            }
        });
       
    });*/
</script>
 
</body>
{{-- end::Body --}}
</html>
