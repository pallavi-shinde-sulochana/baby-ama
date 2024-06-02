@extends('base.front-end')

@section('content')
   @php
       $docData= isset($page->docData) ? $page->docData : [];
       $FrontEndController = new App\Http\Controllers\FrontEndController();
       $csrs= $FrontEndController->getSliderCsr();
   @endphp


<section class="titlebar-inner inner_banner food scsr banner_overlay">
   <div class="container titlebar-container">
      <div class="row d-flex titlebar-container" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":100,"initValues":{"translateY":51,"opacity":0},"animations":{"translateY":0,"opacity":1}}' @endif>
         <div class="titlebar-col col-md-6">
            <h1 class="editable" id="csrSection1Corporatetxt"> Corporate Social
            Responsibility (CSR) </h1>
         </div>
         <div class="titlebar-col col-md-6">
         </div>
      </div>
   </div>
</section>

<section class="csr bg_lgrey">
   <div class="container"> 
      <div class="row" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}' @endif>
          
         <div class="lqd-column col-md-8 col-sm-12">
             <h2 class="font-30 editable" id="csrSection1Overviewtxt">Overview</h2>
            <p class="font-18 wordbreak editable" id="csrSection1Beingatxt">Being a responsible corporate citizen, Suguna firmly believes in giving back to the society, more than what it has taken from it. Suguna strives to serve the society in the areas of education and environment where they operate.</p>
            <h2 class="font-30 editable" id="csrSection1Visionstatement1txt">Vision Statement</h2>
            <p class="font-18 wordbreak editable" id="csrSection1Toactivelytxt">To actively contribute to the social and economic development of the communities in which we operate. In doing so build a better, sustainable way of life for the weaker sections of society and empowering rural India.</p>
            
            <hr class="hide">
            <h6 class="hide editable" id="csrSection1Ourboardmemberstxt"> Our board Members </h6>
            
            <div class="row hide">
                <div class="col-lg-4 col-sm-12">
                    <h4 class="font-18 editable" id="csrSection1VigneshSoundarajantxt"> Vignesh Soundararajan </h4>
                    <p class="editable" id="csrSection1Executivedirectortxt"> Executive Director </p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <h4 class="font-18 editable" id="csrSection1boardmembers1txt"> G. Subaramanium </h4>
                    <p class="editable" id="csrSection1boardmembers2txt"> Senior Vice President – International Business </p>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <h4 class="font-18 editable" id="csrSection1boardmembers3txt"> S. Harish </h4>
                    <p class="editable" id="csrSection1Chrotxt"> CHRO </p>
                </div>
            </div>
            
            
         </div>
      
         <div class="col-md-4 col-sm-6 hide">
                 <article class="liquid-lp liquid-blog-item liquid-blog-item-grid liquid-blog-scheme-dark mb-20">
                      <div class="liquid-blog-item-inner round">
                         <div class="liquid-lp-excerpt">
                              <p class="font-20 editable" id="csrSection1Wantreadtxt">Want read our full CSR policy document?</p>
                          </div>
                          <footer class="liquid-lp-footer">
                              <a href="#" class="btn btn-naked text-uppercase ltr-sp-1 size-sm font-weight-bold liquid-lp-read-more">
                                  <span>
                                      <img src="{{asset('front-end/assets/img/pdf.jpg')}}">
                                      <span class="btn-txt editable" id="csrSection1Viewdocumenttxt">View Document</span>
                                      <span class="btn-line btn-line-after"></span>
                                  </span>
                              </a>
                          </footer>
                          </div>
                  </article>
         </div>
      </div>
   </div>
</section>

<section class="vc_row csrpage csr_sec bg_grey">
    <div class="container">
        <div class="row d-flex flex-wrap align-items-center" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":160,"initValues":{"translateY":50,"opacity":0},"animations":{"translateY":0,"opacity":1}}' @endif>
            <div class="col-lg-6">
                <h6 class="sub_heading text-red editable" id="csrSection1Corporatesocialresponsibilitytxt">Corporate Social Responsibility</h6>
                <h3 class="heading1 mt-0 editable" id="csrSection1Makingcomitmentstxt">Making commitments for a better society.</h3>
            </div>
            <div class="col-lg-6 text-right home_csr_btn">
            </div>
        </div>
        
        <div class="carousel-items row" @if(!$page->editable) data-lqd-flickity='{ "filters": "#carousel-filter-1", "prevNextButtons": false,"loop":true,"wrapAround":true, "navArrow": 1, "fullwidthSide": true, "navOffsets": { "nav": {"left": -10, "top": 200} } }' @endif>
            @if(!empty($csrs))
                @foreach($csrs as $key => $csr)
                    <div class="carousel-item col-sm-4 col-xs-11">
                        <a href="{{'csr/'.$csr->alias}}">
                            <article class="liquid-lp">
                                <figure class="liquid-lp-media">
                                    <img src="{{sgStoreAssetUrl($csr->image)}}" alt="">
                                    <h4>{{$csr->title}}.</h4>
                                </figure>
                            </article>
                        </a>
                        </div>
                @endforeach
            @endif
        
        </div>      
    </div>
</section>
@section('scripts')
@endsection
@include('base.front-end.js')
@endsection