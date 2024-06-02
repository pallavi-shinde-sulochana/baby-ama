@extends('base.front-end')

@section('content')

	<div class="hero home" data-arrows="true" data-autoplay="true">
   <!--.hero-slide-->
   <div class="hero-slide banner_overlay" style="background:url({{asset('front-end/assets/img/banner1.jpg')}})">
      <div class="container">
         <div class="header-content text-white position-absolute slide-content col-lg-4">
            <h2>Enhancing Nation's <br><b>Nutritional Security.</b></h2>
         </div>
      </div>
   </div>
   <!--.hero-slide-->
   <div class="hero-slide banner_overlay" style="background:url({{asset('front-end/assets/img/banner2.jpg')}});">
      <div class="container">
         <div class="header-content text-white position-absolute slide-content col-lg-4">
            <h2><b>Empowering & enriching<br> farmers' lives</b> across<br> generations.</h2>
         </div>
      </div>
   </div>
   <!--.hero-slide-->
   <!-- <div class="hero-slide">
      <img alt=" " class="img-responsive cover" src="{{sgAssetUrl()}}assets/images/slider1.png">
       <div class="header-content text-white position-absolute slide-content col-lg-4">
        <h6>Enterprise software services
      Can’t wait,Should not wait for  </h6>  <h3> Longer lead times</h3>
      </div>
      </div>-->
</div>
{{-- end:section1 with slider--}}
{{-- begin:section2  #homeSection2--}}
<section class="vc_row d-flex flex-wrap align-items-center home_sec2 bg_grey pt-5 pb-5">
   <div class="container">
      <div class="row d-flex flex-wrap align-items-center">
         <div class="lqd-column col-lg-4 col-md-4 mb-md-0 element_grey_bg" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":"1200","delay":"150","easing":"easeOutQuint","direction":"forward","initValues":{"translateX":-47,"opacity":0},"animations":{"translateX":0,"opacity":1}}'>
            {{-- <h3 class="heading lh-15 mb-10">One Group<span>.</span><br>One Purpose<span>.</span><br>One Vision<span>.</span></h3> --}}
            {{-- <h3 class="heading lh-15 mb-10 editable" id="homeSection2Title">One Group<span>.</span><br>One Purpose<span>.</span><br>One Vision<span>.</span></h3> --}}
            {{-- <p class="editable" id="homeSection2Desciption">Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.</p> --}}
            <h3 class="heading lh-15 mb-10 " ><c class="editable" id="homeSection2Title">{!!$docData->homeSection2Title!!}</c><span>.</span></h3>
            <p class="editable" id="homeSection2Desciption">{!!$docData->homeSection2Desciption!!}</p>
         </div>
         <div class="lqd-column col-lg-8 col-md-8 mt-5 mb-md-0">
            <div class="lqd-column col-md-4 col-xs-6">
               <div class="home_sec2_box d-flex flex-wrap align-items-center liquid-counter liquid-counter-default">
                  <div class="liquid-counter-element contents" >
                     <span class="editable" id="homeSection2EmployeeCount">{!!$docData->homeSection2EmployeeCount!!}</span>
                     <p  class="editable"  id="homeSection2EmployeeText">{!!$docData->homeSection2EmployeeText!!}</p>
                  </div>
               </div>
            </div>
            <div class="lqd-column col-md-4 col-xs-6">
               <div class="home_sec2_box d-flex flex-wrap align-items-center liquid-counter liquid-counter-default">
                  <div class="liquid-counter-element contents" >
                     <span class="editable" id="homeSection2CountriesCount">{!!$docData->homeSection2CountriesCount!!}</span>
                     <p class="editable" id="homeSection2CountriesText">{!!$docData->homeSection2CountriesText!!}</p>
                  </div>
               </div>
            </div>
            <div class="lqd-column col-md-4 col-xs-6">
               <div class="home_sec2_box d-flex flex-wrap align-items-center liquid-counter liquid-counter-default">
                  <div class="liquid-counter-element contents" data-fittext="true" data-fittext-options='{ "compressor": 0.5, "minFontSize": 55, "maxFontSize": 55 }' data-enable-counter="true" data-counter-options='{"targetNumber":"07","blurEffect":true}'>
                     <span>07</span>
                     <p>Entities</p>
                  </div>
               </div>
            </div>
            <div class="lqd-column col-md-4 col-xs-6">
               <div class="home_sec2_box d-flex flex-wrap align-items-center liquid-counter liquid-counter-default">
                  <div class="liquid-counter-element contents" data-fittext="true" data-fittext-options='{ "compressor": 0.5, "minFontSize": 55, "maxFontSize": 55 }' data-enable-counter="true" data-counter-options='{"targetNumber":"₹9,700+","blurEffect":true}'>
                     <span>₹9,700+</span>
                     <p>Crores turnover in<br> FY 2020-21</p>
                  </div>
               </div>
            </div>
            <div class="lqd-column col-md-4 col-xs-6">
               <div class="home_sec2_box d-flex flex-wrap align-items-center liquid-counter liquid-counter-default">
                  <div class="liquid-counter-element contents" data-fittext="true" data-fittext-options='{ "compressor": 0.5, "minFontSize": 55, "maxFontSize": 55 }' data-enable-counter="true" data-counter-options='{"targetNumber":"03+","blurEffect":true}'>
                     <span>₹9,000</span>
                     <p>Decades of Legacy</p>
                  </div>
               </div>
            </div>
            <div class="lqd-column col-md-4 col-xs-6">
               <div class="home_sec2_box d-flex flex-wrap align-items-center liquid-counter liquid-counter-default">
                  <div class="liquid-counter-element contents" data-fittext="true" data-fittext-options='{ "compressor": 0.5, "minFontSize": 55, "maxFontSize": 55 }' data-enable-counter="true" data-counter-options='{"targetNumber":"40,000+","blurEffect":true}'>
                     <span>40,000+</span>
                     <p>Farmers Benefitted</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end:section2 --}}

{{-- begin:section3 --}}
<section class="vc_row pt-md-8 pb-md-8 contributing_sec">
   <div class="container">
      <div class="row">
         <div class="lqd-column col-md-6">
            <div class="lqd-frickin-img" data-inview="true" data-inview-options='{ "delayTime": 250, "threshold": 0.75 }'>
               <div class="lqd-frickin-img-inner">
                  <span class="lqd-frickin-img-bg bg-line"></span>
                  <div class="lqd-frickin-img-holder">
                     <figure data-responsive-bg="true" class="loaded">
                        <img src="{{sgAssetUrl()}}assets/img/contributing.jpg" alt="Contributing">
                     </figure>
                  </div>
               </div>
            </div>
         </div>
         <div class="lqd-column col-md-6 pl-md-5 contribute_cont" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
            <h2 class="heading mt-0 mb-10">Contributing to global nutritional security holistically.</h2>
            <p>For a long time, food security had been a major concern around the world. Today, <b>nutritional security</b> has become a crippling health crisis that many parts of the world face. Many people don’t get access to a wide range of foods that promises all the essential nutrients required for an active day.</p>
            <p>Since nutritional security is influenced by various factors, addressing it takes a holistic approach. For more than three decades, Suguna Group contributes to nutritional security in India and overseas by…</p>
            <ul>
               <li>Making essential nutrients accessible and affordable to the common people.</li>
               <li>Addressing malnutrition with various sources of nutrients, and not just proteins.</li>
               <li>Educating and encouraging young minds to contribute to nutritional security by creating career opportunities in the agro-food industry.</li>
            </ul>
         </div>
      </div>
   </div>
</section>
{{-- end:section3 --}}

{{-- begin:section4 our brand --}}
	<section class="vc_row brand_sec">
   <div class="container">
      <div class="row mx-sm-0 brand_row" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
         <h6 class="sub_heading text-white">Our brands</h6>
         <h3 class="heading mt-0 text-white">The rings of a global value chain</h3>
      </div>
      <div class="carousel-container carousel-nav-floated carousel-nav-center carousel-nav-middle carousel-nav-md carousel-nav-square carousel-nav-solid carousel-dots-style4">
         <div class="carousel-items row" data-lqd-flickity='{"prevNextButtons":true,"loop":true,"wrapAround":true,"autoPlay":3000,"groupCells":false,"navArrow":{"prev":"<i class=\"fa fa-angle-left\"></i>","next":"<i class=\"fa fa-angle-right\"></i>"},"buttonsAppendTo":"self"}'>
            <div class="carousel-item col-md-3 col-sm-5 col-xs-10">
               <div class="brand_box">
                  <div class="contents">
                     <div class="brand_img"><img src="{{sgAssetUrl()}}assets/img/brand1.png" alt=""></div>
                     <p>A multinational agro-food company—our flagship.</p>
                  </div>
                  <a href="suguna_food.php" class="btn btn-naked">
                  <span>
                  <span class="btn-txt">Read More</span>
                  <span class="btn-icon"><i class="icon-liquid_arrow_right"></i></span>
                  </span>
                  </a>
               </div>
            </div>
            <div class="carousel-item col-md-3 col-sm-5 col-xs-10">
               <div class="brand_box">
                  <div class="contents">
                     <div class="brand_img"><img src="{{sgAssetUrl()}}assets/img/brand5.png" alt=""></div>
                     <p class="w-80">An overseas operation of Suguna Foods serving Bangladesh's nutritional needs.</p>
                  </div>
                  <a href="suguna_food_bangladesh.php" class="btn btn-naked">
                  <span>
                  <span class="btn-txt">Read More</span>
                  <span class="btn-icon"><i class="icon-liquid_arrow_right"></i></span>
                  </span>
                  </a>
               </div>
            </div>
            <div class="carousel-item col-md-3 col-sm-5 col-xs-10">
               <div class="brand_box">
                  <div class="contents">
                     <div class="brand_img"><img src="{{sgAssetUrl()}}assets/img/brand6.png" alt=""></div>
                     <p class="w-80">An overseas operation of Suguna Foods fulfilling Kenya’s nutritional security.</p>
                  </div>
                  <a href="suguna_food_kenya.php" class="btn btn-naked">
                  <span>
                  <span class="btn-txt">Read More</span>
                  <span class="btn-icon"><i class="icon-liquid_arrow_right"></i></span>
                  </span>
                  </a>
               </div>
            </div>
            <div class="carousel-item col-md-3 col-sm-5 col-xs-10">
               <div class="brand_box">
                  <div class="contents">
                     <div class="brand_img"><img src="{{sgAssetUrl()}}assets/img/holdings-icon.png" alt=""></div>
                     <p class="w-80">Building 'Best-in-Class' Organizations with global presence for sustainable value creation.</p>
                  </div>
                  <a href="suguna_holdings.php" class="btn btn-naked">
                  <span>
                  <span class="btn-txt">Read More</span>
                  <span class="btn-icon"><i class="icon-liquid_arrow_right"></i></span>
                  </span>
                  </a>
               </div>
            </div>
            <div class="carousel-item col-md-3 col-sm-5 col-xs-10">
               <div class="brand_box">
                  <div class="contents">
                     <div class="brand_img"><img src="{{sgAssetUrl()}}assets/img/brand2.png" alt=""></div>
                     <p class="w-80">A world-class poultry vaccine and medicine maker.</p>
                  </div>
                  <a href="globin.php" class="btn btn-naked">
                  <span>
                  <span class="btn-txt">Read More</span>
                  <span class="btn-icon"><i class="icon-liquid_arrow_right"></i></span>
                  </span>
                  </a>
               </div>
            </div>
            <div class="carousel-item col-md-3 col-sm-5 col-xs-10">
               <div class="brand_box">
                  <div class="contents">
                     <div class="brand_img"><img src="{{sgAssetUrl()}}assets/img/brand3.png" alt=""></div>
                     <p>Our exclusive brand for milk and related products.</p>
                  </div>
                  <a href="dairy.php" class="btn btn-naked">
                  <span>
                  <span class="btn-txt">Read More</span>
                  <span class="btn-icon"><i class="icon-liquid_arrow_right"></i></span>
                  </span>
                  </a>
               </div>
            </div>
            <div class="carousel-item col-md-3 col-sm-5 col-xs-10">
               <div class="brand_box">
                  <div class="contents">
                     <div class="brand_img"><img src="{{sgAssetUrl()}}assets/img/brand4.png" alt=""></div>
                     <p>A modern poultry feed pre-mix manufacturer based in Sri Lanka.</p>
                  </div>
                  <a href="aminovit.php" class="btn btn-naked">
                  <span>
                  <span class="btn-txt">Read More</span>
                  <span class="btn-icon"><i class="icon-liquid_arrow_right"></i></span>
                  </span>
                  </a>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end:section4 our brand --}}

{{-- begin:section5 CSR --}}
<section class="vc_row csr_sec">
   <div class="container">
      <div class="row d-flex flex-wrap align-items-center" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
         <div class="col-lg-6">
            <h6 class="sub_heading text-red">Corporate Social Responsibility</h6>
            <h3 class="heading1 mt-0">Making commitments for a better society.</h3>
         </div>
         <div class="col-lg-6 text-right home_csr_btn">
            <a href="csr.php" class="view_btn">
            View More
            </a>
         </div>
      </div>
      <div class="carousel-items row" data-lqd-flickity='{ "filters": "#carousel-filter-1", "prevNextButtons": false,"loop":true,"wrapAround":true, "navArrow": 1, "fullwidthSide": true, "navOffsets": { "nav": {"left": -10, "top": 200} } }'>
         <div class="carousel-item col-sm-5 col-xs-11">
            <a href="infrastructural_support_to_primary&government_schools_in_villages_near_our_poultry_farms.php">
               <article class="liquid-lp">
                  <figure class="liquid-lp-media">
                     <img src="{{sgAssetUrl()}}assets/img/csr_school.jpg" alt="">
                     <h4>Infrastructural support to Primary & Government schools in villages near our Poultry farms.</h4>
                  </figure>
               </article>
            </a>
         </div>
         <div class="carousel-item col-sm-5 col-xs-11">
            <a href="promoting_health_care&sanitation.php">
               <article class="liquid-lp">
                  <figure class="liquid-lp-media">
                     <img src="{{sgAssetUrl()}}assets/img/health_care.jpg" alt="">
                     <h4>Promoting Healthcare and Sanitation</h4>
                  </figure>
               </article>
            </a>
         </div>
         <div class="carousel-item col-sm-5 col-xs-11">
            <a href="ensuring_environmental_sustainability_and_ecological_balance.php">
               <article class="liquid-lp">
                  <figure class="liquid-lp-media">
                     <img src="{{sgAssetUrl()}}assets/img/ensuring.jpg" alt="">
                     <h4>Ensuring Environmental Sustainability and Ecological Balance</h4>
                  </figure>
               </article>
            </a>
         </div>
         <div class="carousel-item col-sm-5 col-xs-11">
            <a href="infrastructural_support_to_primary&government_schools_in_villages_near_our_poultry_farms.php">
               <article class="liquid-lp">
                  <figure class="liquid-lp-media">
                     <img src="{{sgAssetUrl()}}assets/img/csr_school.jpg" alt="">
                     <h4>Infrastructural support to Primary & Government schools in villages near our Poultry farms.</h4>
                  </figure>
               </article>
            </a>
         </div>
         <div class="carousel-item col-sm-5 col-xs-11">
            <a href="promoting_health_care&sanitation.php">
               <article class="liquid-lp">
                  <figure class="liquid-lp-media">
                     <img src="{{sgAssetUrl()}}assets/img/health_care.jpg" alt="">
                     <h4>Promoting Healthcare and Sanitation</h4>
                  </figure>
               </article>
            </a>
         </div>
         <div class="carousel-item col-sm-5 col-xs-11">
            <a href="ensuring_environmental_sustainability_and_ecological_balance.php">
               <article class="liquid-lp">
                  <figure class="liquid-lp-media">
                     <img src="{{sgAssetUrl()}}assets/img/ensuring.jpg" alt="">
                     <h4>Ensuring Environmental Sustainability and Ecological Balance</h4>
                  </figure>
               </article>
            </a>
         </div>
      </div>
   </div>
</section>

{{-- end:section5 CSR--}}

{{-- begin:section6 Careers--}}
<section class="vc_row pt-50 pb-50 home_career">
   <div class="container">
      <div class="row">
         <!--<div class="lqd-column text-center" data-custom-animations="true" data-ca-options='{"triggerHandler": "inview", "animationTarget": ".ld-tm-avatar", "duration": 700, "delay": 150, "easing": "easeOutBack", "initValues": { "scale": 0 }, "animations": { "scale": 1 }}'>
            <div class="circle_bg">
            <h6 class="sub_heading text-red">Careers</h6>
            <h3 class="heading mt-0 mb-10">Work With Us</h3>
            <p>Explore and apply for positions at various<br> entities of Suguna Group.</p>
            <a href="#" class="view_btn">See Openings</a>
            </div>
            </p>
            </div>-->
         <div class="ld-tm-circ mb-5 mb-md-0" data-custom-animations="true" data-ca-options='{"triggerHandler": "inview", "animationTarget": ".ld-tm-bg", "duration": 700, "delay": 100, "easing": "easeOutBack", "initValues": { "scale": 0 }, "animations": { "scale": 1 }}'>
            <div class="ld-tm-container" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"h6,h3,p,a","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
               <div class="ld-tm-circ-outer">
                  <div class="ld-tm-bg"></div>
                  <div class="circle_bg">
                     <h6 class="sub_heading text-red">Careers</h6>
                     <h3 class="heading mt-0 mb-10">Work With Us</h3>
                     <p>Explore and apply for positions at various<br> entities of Suguna Group.</p>
                     <a href="careers.php" class="view_btn">See Openings</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end:section6 Careers--}}

{{-- end:section7 Multinational Corporation--}}

<section class="vc_row pb-50 country_sec">
   <div class="container">
      <div class="row">
         <div class="ld-tm-container" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"h6,h3,p,a","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
            <div class="pt-50 pb-50 text-center">
               <h6 class="sub_heading text-red">A Multinational Corporation</h6>
               <h3 class="heading1 mt-0 mb-20">From being a native Indian to<br> becoming a global leader.</h3>
               <p>In a journey that spans more than three decades, we have progressed<br> from one milestone to another, earning a global reputation.</p>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="ld-tm-container countries_row col-lg-offset-1 col-lg-10" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
            <div class="lqd-column col-md-3 col-sm-3 col-xs-6 pl-md-5">
               <img src="{{sgAssetUrl()}}assets/img/india.png" alt="">
               <h4 class="mt-20 mb-0">India</h4>
               <ul>
                  <li><a href="suguna_food.php">Suguna Foods</a></li>
                  <li><a href="globin.php">Globion</a></li>
                  <li><a href="dairy.php">Suguna Dairy</a></li>
                  <li><a href="suguna_holdings.php">Suguna Holdings</a></li>
               </ul>
            </div>
            <div class="lqd-column col-md-3 col-sm-3 col-xs-6 pl-md-5">
               <img src="{{sgAssetUrl()}}assets/img/kenya.png" alt="">
               <h4 class="mt-20 mb-0">Kenya</h4>
               <ul>
                  <li><a href="suguna_food_kenya.php">Suguna Foods</a></li>
               </ul>
            </div>
            <div class="lqd-column col-md-3 col-sm-3 col-xs-6 pl-md-5">
               <img src="{{sgAssetUrl()}}assets/img/srilanka.png" alt="">
               <h4 class="mt-20 mb-0">Sri lanka</h4>
               <ul>
                  <li><a href="aminovit.php">Aminovit</a></li>
               </ul>
            </div>
            <div class="lqd-column col-md-3 col-sm-3 col-xs-6 pl-md-6">
               <div class="country_inner">
                  <img src="{{sgAssetUrl()}}assets/img/bangladesh.png" alt="">
                  <h4 class="mt-20 mb-0">Bangladesh</h4>
                  <ul>
                     <li><a href="suguna_food_bangladesh.php">Suguna Foods</a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end:section7  Multinational Corporation--}}

{{-- end:section7 Updates--}}
<section class="vc_row home_blog news withdate  pt-50 pb-50">
   <div class="container">
      <div class="row margin_0" data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}'>
         <h6 class="sub_heading text-red">LATEST UPDATES</h6>
         <h4 class="heading1 mt-0">
         In the news</h3>
      </div>
      <div class="carousel-container carousel-nav-floated carousel-nav-center carousel-nav-middle carousel-nav-md carousel-nav-square carousel-nav-solid carousel-dots-style4">
         <div class="carousel-items row" data-lqd-flickity='{ "filters": "#carousel-filter-1", "prevNextButtons": true,"loop":true,"wrapAround":true,"groupCells":false,"fullwidthSide": true,"navArrow":{"prev":"<i class=\"fa fa-angle-left\"></i>","next":"<i class=\"fa fa-angle-right\"></i>"},"buttonsAppendTo":"self" }'>
            <div class="carousel-item col-lg-4 col-sm-4 col-xs-11">
               <div class="lqd-column">
                  <article class="liquid-lp liquid-blog-item liquid-blog-item-grid liquid-blog-scheme-dark mb-20">
                     <div class="liquid-blog-item-inner round">
                        <div class="liquid-lp-excerpt">
                           <img src="{{sgAssetUrl()}}assets/img/jul.jpg" class="img-responsive">
                           <div class="ddmm">
                              <p>Jul 2021</p>
                           </div>
                        </div>
                        <footer class="liquid-lp-footer">
                           <h3> Starting with Rs 5,000, how Coimbatore-based Suguna Foods became Rs 8,700 Cr turnover poultry company  </h3>
                           <a href="https://yourstory.com/smbstory/indian-poultry-industry-suguna-foods-coimbatore/amp" target="_blank" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold liquid-lp-read-more">
                           <span>
                           <span class="btn-txt">Read More</span>
                           <span class="btn-line btn-line-after"></span>
                           </span>
                           </a>
                        </footer>
                     </div>
                  </article>
               </div>
            </div>
            <div class="carousel-item col-lg-4 col-sm-4 col-xs-11">
               <div class="lqd-column">
                  <article class="liquid-lp liquid-blog-item liquid-blog-item-grid liquid-blog-scheme-dark mb-20">
                     <div class="liquid-blog-item-inner round">
                        <div class="liquid-lp-excerpt">
                           <img src="{{sgAssetUrl()}}assets/img/vitamin-d-3.jpg" class="img-responsive">
                           <div class="ddmm">
                              <p>Jun 2021</p>
                           </div>
                        </div>
                        <footer class="liquid-lp-footer">
                           <h3> Vitamin-D deficiency in patients recovered from COVID-19  </h3>
                           <a href="https://www.femina.in/tamil/health/diet/vitamin-d-deficiency-in-patients-recovered-from-covid-19_-2583.html" target="_blank" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold liquid-lp-read-more">
                           <span>
                           <span class="btn-txt">Read More</span>
                           <span class="btn-line btn-line-after"></span>
                           </span>
                           </a>
                        </footer>
                     </div>
                  </article>
               </div>
            </div>
            <div class="carousel-item col-lg-4 col-sm-4 col-xs-11">
               <div class="lqd-column">
                  <article class="liquid-lp liquid-blog-item liquid-blog-item-grid liquid-blog-scheme-dark mb-20">
                     <div class="liquid-blog-item-inner round">
                        <div class="liquid-lp-excerpt">
                           <img src="{{sgAssetUrl()}}assets/img/poultry_management.jpeg" class="img-responsive">
                           <div class="ddmm">
                              <p>Aug 2021</p>
                           </div>
                        </div>
                        <footer class="liquid-lp-footer">
                           <h3> Suguna Institute of Poultry Management to start admissions for undergraduate and diploma programmes  </h3>
                           <a href="http://mediabulletins.com/education/suguna-institute-of-poultry-management-to-start-admissions-for-undergraduate-and-diploma-programmes/" target="_blank" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold liquid-lp-read-more">
                           <span>
                           <span class="btn-txt">Read More</span>
                           <span class="btn-line btn-line-after"></span>
                           </span>
                           </a>
                        </footer>
                     </div>
                  </article>
               </div>
            </div>
            <div class="carousel-item col-lg-4 col-sm-4 col-xs-11">
               <div class="lqd-column">
                  <article class="liquid-lp liquid-blog-item liquid-blog-item-grid liquid-blog-scheme-dark mb-20">
                     <div class="liquid-blog-item-inner round">
                        <div class="liquid-lp-excerpt">
                           <img src="{{sgAssetUrl()}}assets/img/newsfood.jpg" class="img-responsive">
                           <div class="ddmm">
                              <p>Aug 2021</p>
                           </div>
                        </div>
                        <footer class="liquid-lp-footer">
                           <h3> Farm to Fork a healthy journey from the house of Suguna foods  </h3>
                           <a href="https://businessreporter.in/farm-to-fork-a-healthy-journey-from-the-house-of-suguna-foods/" target="_blank" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold liquid-lp-read-more">
                           <span>
                           <span class="btn-txt">Read More</span>
                           <span class="btn-line btn-line-after"></span>
                           </span>
                           </a>
                        </footer>
                     </div>
                  </article>
               </div>
            </div>
            <div class="carousel-item col-lg-4 col-sm-4 col-xs-11">
               <div class="lqd-column">
                  <article class="liquid-lp liquid-blog-item liquid-blog-item-grid liquid-blog-scheme-dark mb-20">
                     <div class="liquid-blog-item-inner round">
                        <div class="liquid-lp-excerpt">
                           <img src="{{sgAssetUrl()}}assets/img/SIPM.png" class="img-responsive">
                           <div class="ddmm">
                              <p>Sep 2021</p>
                           </div>
                        </div>
                        <footer class="liquid-lp-footer">
                           <h3> Suguna Institute of Poultry Management ties up with Government of India, New Delhi  </h3>
                           <a href="https://republicnewsindia.com/suguna-institute-of-poultry-management-ties-up-with-the-government-of-india-new-delhi/" target="_blank" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold liquid-lp-read-more">
                           <span>
                           <span class="btn-txt">Read More</span>
                           <span class="btn-line btn-line-after"></span>
                           </span>
                           </a>
                        </footer>
                     </div>
                  </article>
               </div>
            </div>
            <div class="carousel-item col-lg-4 col-sm-4 col-xs-11">
               <div class="lqd-column">
                  <article class="liquid-lp liquid-blog-item liquid-blog-item-grid liquid-blog-scheme-dark mb-20">
                     <div class="liquid-blog-item-inner round">
                        <div class="liquid-lp-excerpt">
                           <img src="{{sgAssetUrl()}}assets/img/cattle_feed.jpeg" class="img-responsive">
                           <div class="ddmm">
                              <p>Sep 2021</p>
                           </div>
                        </div>
                        <footer class="liquid-lp-footer">
                           <h3> Suguna Feeds launched cattle feed at affordable price  </h3>
                           <a href="https://republicnewsindia.com/suguna-feeds-launches-cattle-feed-at-affordable-price/" target="_blank" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold liquid-lp-read-more">
                           <span>
                           <span class="btn-txt">Read More</span>
                           <span class="btn-line btn-line-after"></span>
                           </span>
                           </a>
                        </footer>
                     </div>
                  </article>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
{{-- end:section7 Updates--}}
	
@endsection

<style>
.hero{background-color: #34378F; height: 90vh;}
.slick-list{top:0; }
.hero-text h2 {
  margin-bottom: 50px;
}

.hero-text .hero {
  position: relative;
}

.header-content h2
{
	color:#fff;    font-family: Catamaran;	font-weight:400;
}
.header-content h2 b
{
	font-family: Catamaran-ExtraBold;
}
.slick-dots li:nth-child(1) a:after {
    content: "Nation’s Nutrition";
    position: relative;
    font-size: 16px;
	color:#fff;
	padding-left: 14px;
    font-family: RidleyGrotesk-Regular,sans-serif;
    font-weight: 500;
}
.slick-dots li:nth-child(2) a:after {
    content: "Farmer Empowerment";
    position: relative;
    font-size: 16px;
	color:#fff;
	padding-left: 14px;
    font-family: RidleyGrotesk-Regular,sans-serif;
    font-weight: 500;
}
.hero-text .hero .hero-slide a:hover span {
  color: #033a71;
}

:focus{outline:none;}
.hero .hero-slide img {
  float: left; width: 670px;
  height: 600px;
  object-fit: cover;
  object-position: right center;
}

.hero .hero-slide .header-content {
    top: 15%;
    position: absolute;
	z-index: 1;
    /*left: 7%;    
	position: absolute;
	max-width: 550px;
	width: 100%; */
}

.slide-content {
  padding: 10px 20px 10px 0;
}

.slide-content .h1 {
  font-size: 62px
}

.btn-primary {
  background-color: #5302FE;
  border: #111;
  border-radius: 0;
}

@-webkit-keyframes fadeInUpSD {
  0% {
      opacity: 0;
      -webkit-transform: translateY(100px);
      transform: translateY(100px)
  }

  100% {
      opacity: 1;
      -webkit-transform: none;
      transform: none
  }
}

@keyframes fadeInUpSD {
  0% {
      opacity: 0;
      -webkit-transform: translateY(100px);
      transform: translateY(100px)
  }

  100% {
      opacity: 1;
      -webkit-transform: none;
      transform: none
  }
}

.fadeInUpSD {
  -webkit-animation-name: fadeInUpSD;
  animation-name: fadeInUpSD;
}

.slick-active .slide-content {
  animation-name: fadeInUpSD;
  animation-duration: 1s;
  opacity: 1;
  width: 100%;
  padding: 10px 20px 30px 0;
}

/* Text Animation End **/

.slick-dots {
    position: relative;
    bottom: 200px;
    width: 1250px;
    margin: 0 auto;
}

.slick-dots li {
	position: relative;
    display: inline-block;
    width: auto;
    height: 20px;
    margin: 0 34px 0 0;
    padding: 0;
    cursor: pointer;
    font-weight: 600;
    font-size: 26px;
}

.slick-dots li a {
    color: #fff;
	font-family: Catamaran;
	font-style: normal;
	font-weight: 600;
	font-size: 30px;
}
.slick-dots li.slick-active a {
	color: #EF3B2D;
}

.slick-dots li button {
      font-size: 0;
    line-height: 0;
    display: block;
    padding: 5px;
    outline: none;
    width: 12px;
    height: 13px;
    border: 2px solid;
    margin: 3px;
    border-radius: 50%;
    background: #fff;
    cursor: pointer;
}

.slick-dots li button::before {
  font-size: 18px;
  color: #fff;
  opacity: 1;
}

.slick-active button {
  background: #fcb514;
}
li.slick-active button {
    background-color: #fcb514;
} 
.hero-slide
{
	width: 100%;
    height: 100vh !important;
	background-size: cover !important;
}
/* Media Queries */

@media (max-width: 767px) {
  .hero-text .hero .hero-slide a {
    padding-top: 0.8rem;
  }

  .hero-text .hero .hero-slide a span {
    font-size: 20px;
    margin-top: 0.5rem;
  }

  .hero .hero-slide .header-content {
    -webkit-transform: translateX(0);
    transform: translateX(0%);
    margin: 0 auto;
	top: 55%;
  }
  .slick-dots li:nth-child(1) a:after, .slick-dots li:nth-child(2) a:after {
	  display:none;
  }
	.hero .hero-slide:nth-child(1)
	{
		background: url(assets/img/banner1_mob.jpg) !important;
	}
	.hero .hero-slide:nth-child(2)
	{
		background: url(assets/img/banner2_mob.jpg) !important;
	}
	.slick-dots {
    bottom: 150px;
	}

}
@media (min-width: 1600px) {
	.hero .hero-slide .header-content {
    top: 30%;
    position: absolute;
	z-index: 1;
	}
}
</style>


@section('scripts')
	<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 
  <script type="text/javascript" src="{{asset('front-end/assets/js/slick.min.js')}}"></script>

  <script type="text/javascript">
  jQuery(document).ready(function ($) {
    $('.hero').slick({
    dots: true,
customPaging : function(slider, i) {
var thumb = $(slider.$slides[i]).data();
return '<a>'+(i+1)+'</a>';
},
        infinite: true,
        speed: 500,
        fade: !0,
        cssEase: 'linear',
    slidesToShow: 1,
    slidesToScroll: 1,
        autoplay: true,
        loop: true,
    autoplaySpeed: 8000,
        draggable: false,
    arrows: false,
    responsive: [
      {
    breakpoint: 1024,
    settings: {
    slidesToShow: 1,
    slidesToScroll: 1,
        infinite: true
              }
        },
        {
    breakpoint: 768,
    settings: {
        draggable: true,
              }
    },
    {
    breakpoint: 600,
    settings: {
        slidesToShow: 1,
        draggable: true,
    slidesToScroll: 1
            }
    },
    {
    breakpoint: 480,
    settings: {
        slidesToShow: 1,
        draggable: true,
    slidesToScroll: 1
              }
    }
  
            ]
                  });
        }); 

       // Awesome Page Editor
        var sugunaDocs=JSON.stringify({!!$doc!!});
        var sugunaMethod="post";
        var sugunaEndpoint="{{route('front.home.store')}}";
        var sugunaDocId="{{$id}}";
</script>
@include('base.front-end.js')
@endsection
