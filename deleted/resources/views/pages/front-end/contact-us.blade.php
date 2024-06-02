@extends('base.front-end')

@section('content')
   @php
       $docData= isset($page->docData) ? $page->docData : [];

       $dropdown=[];
        $dropdown['food']='corporate@sugunafoods.co.in';
        $dropdown['globion']='customercare@globionindia.com';
        $dropdown['delfrez']='delfrez.support@sugunafoods.com';
        $dropdown['feed']='dhakshayaani@sugunafoods.com';
        $dropdown['dairy']='info@sugunadiary.com';
        $dropdown['aminovit']='akbar@aminovit.lk';
        $dropdown['bangladesh']='james@sugunabd.com';
        $dropdown['kenys']='leo@suguna.co.ke';
   @endphp


<section class="titlebar-inner inner_banner food scontact banner_overlay">
   <div class="container titlebar-container">
      <div class="row d-flex titlebar-container" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview","animationTarget":"all-childs","duration":1200,"delay":100,"initValues":{"translateY":51,"opacity":0},"animations":{"translateY":0,"opacity":1}}' @endif>
         <div class="titlebar-col col-md-6">
            <h1 class="editable" id="contactusSection1Getintouchtxt"> Get in touch with us </h1>
         </div>
         <div class="titlebar-col col-md-6">
         </div>
      </div>
   </div>
</section>

<section class="contactsec1" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}' @endif>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="enquiry text-center">
                            <img src="{{asset('front-end/assets/img/phone.jpg')}}" class="img-responsive">
                            <h3 class="font-30 editable" id="contactusSection1Businessenquirytxt"> Business Enquiry </h3>
                            <p class="wordbreak editable" id="contactusSection1Wanttotalktxt">Want to talk about business
                            opportunities? Our business
                            development team is here to help you.</p>
                            <a href="#modal-1" class="view_btn bgfilled lqd-unit-animation-done" @if(!$page->editable) data-lity="#modal-1" @endif>Enquire</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="enquiry text-center">
                            <img src="{{asset('front-end/assets/img/phone.jpg')}}" class="img-responsive">
                            <h3 class="font-30 editable" id="contactusSection1Mediacontacttxt"> Media Contact </h3>
                            <p class="wordbreak editable" id="contactusSection1shyamsundartxt"><b>Shyam Sundar</b>
                            Head Communications
                            M: <b class="editable" id="contactusSection1Getintouch2txt">9384806599</b>
                            E: <b class="editable" id="contactusSection1Getintouch3txt">shyam@sugunaholdings.com</b></p>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="enquiry csupport text-center">
                            <img src="{{asset('front-end/assets/img/chat.jpg')}}" class="img-responsive" width="35">
                            <h3 class="editable" id="contactusSection1Contactcustomertxt"> Contact Customer Support </h3>
                            <p class="wordbreak editable" id="contactusSection1Forproducttxt">For product/services inquiries, contact our expert team to have your questions
                            answered.</p>
                            <a href="tel:1800 103 43 43" class="view_btn bgfilled lqd-unit-animation-done editable" id="contactusSection1Getintouch1800txt">1800 103 43 43</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="map" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}' @endif>
    <div class="container">
        <header class="text-center"><h3 class="font-30 editable" id="contactusSection1contactus2txt">Contact Us</h3></header>
        <div class="row bg-ash d-flex">
            <div class="col-lg-8 col-sm-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7832.911366949624!2d76.97739877615507!3d11.00439715024921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ba859c4d8f39e25%3A0xdf5a3932e7d190a9!2sSuguna%20Group%20-%20Corporate%20office!5e0!3m2!1sen!2sin!4v1637827005102!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
            <div class="col-md-4 col-sm-12">
                <h4 class="editable" id="contactusSection1Headquarterstxt">Headquarters</h4>
                <h6 class="font-18 editable" id="contactusSection1Sugunagroupstxt">Suguna Group</h6>
                <address class="wordbreak editable" id="contactusSection1addresstxt"> 2nd Floor, UNITEA Building,
No: 3, Savithri Shanmugam Road,
Race Course, Coimbatore - 641 018,
Tamil Nadu, India.
                </address>
                 <h4 class="editable" id="contactusSection1Reachustxt">Reach Us</h4>
                 <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection10422txt"> 0422 4073000 </td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection19675txt"> 9675846567 </td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1infotxt"> info@sugunaholdings.com </td>
                     </tr>
                 </table>
            </div>
        </div>
    </div>
</section>

<section class="location bg-ash">
    <div class="container">
        <div class="row" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}' @endif>
            
            <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" id="contactusSection1Sugunaholidaystxt">Suguna Holdings Private Limited <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b>Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1addresstxt">6th Floor, Jaya Enclave, 1057, Avinashi Road, Coimbatore - 641018, Tamil Nadu, India.</address>
                    <h6><b>Corporate Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1address2txt">2nd Floor, UNITEA Building, Above Big Bazaar, <br>No. 3, Savithri Shanmugam Road, Race Course, Coimbatore - 641018, Tamil Nadu, India</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection191422txt"> +91-422-4073000 </td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1info2txt"> info@sugunaholdings.com </td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
            <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" id="contactusSection1sugunafoodslmttxt">Suguna Foods Private Limited <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b>Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1address21txt">6th Floor, Jaya Enclave, 1057, Avinashi Road, Coimbatore - 641018, Tamil Nadu, India.</address>
                    <h6><b>Corporate Office Address</b></h6>
                    <address class="wordbreak editable" class="editable" id="contactusSection1address22txt">2nd Floor, UNITEA Building, Above Big Bazaar, <br>No. 3, Savithri Shanmugam Road, Race Course, Coimbatore - 641018, Tamil Nadu, India</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection191422atxt"> +91-422-4073000 </td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1Corporatetxt"> corporate@sugunafoods.co.in </td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
            <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" id="contactusSection1sugunadairyproductstxt">Suguna Dairy Products (India) Private Limited <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b class="editable" id="contactusSection1Registeredofficetxt">Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1address31txt">6th Floor, Jaya Enclave, 1057, Avinashi Road, Coimbatore - 641018, Tamil Nadu, India.</address>
                    <h6><b>Corporate Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1address32txt">2nd Floor, UNITEA Building, Above Big Bazaar, <br>No. 3, Savithri Shanmugam Road, Race Course, Coimbatore - 641018, Tamil Nadu, India</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection191422aatxt"> +91-422-4073000 </td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1infootxt"> info@sugunadiary.com </td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
        </div>
        
        <div class="row" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}' @endif>
            
            <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" id="contactusSection1Globianindiatxt">Globion India Private Limited <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b class="editable" id="contactusSection1Registeredofficetxt">Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1address41txt">6th Floor, Jaya Enclave, 1057, Avinashi Road, Coimbatore - 641018, Tamil Nadu, India.</address>
                    <h6><b>Corporate Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1address42txt">2nd Floor, Vasavi Gold Stone, Survey No. 25, <br>Near Military Football Ground, Trimulgherry, Secunderabad-500 015, Telangana, India.</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection19140atxt">+91-40-27990397, +91-40-27990398</td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1customercaretxt">customercare@globionindia.com</td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
            <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" id="contactusSection1Aminvit1txt">Aminovit (Private) Limited, Sri Lanka <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b class="editable" id="contactusSection1Registeredofficeaddresstxt">Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1Registeredofficeaddress2txt">No. 28, Minuwangoda Road, Ekala, <br>Ja-ela, Sri Lanka.</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection1941122txt">+94 11 2228541</td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1Akbartxt">akbar@aminovit.lk</td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
             <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" class="editable" id="contactusSection1sugunafoodbangladeshtxt">Suguna Foods Bangladesh Private Limited, Bangladesh <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b class="editable" id="contactusSection1Registeredofficeaddress3atxt">Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1RegisteredOfficeaddress3btxt">House No - 76 (4th Floor), Gausul Azam Avenue, Sector-13, Uttara, Dhaka - 1230, Bangladesh.</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection188-9678txt">+880 9678777912</td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1eunustxt">eunus79@gmail.com</td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
        </div>
        
        <div class="row" @if(!$page->editable) data-custom-animations="true" data-ca-options='{"triggerHandler":"inview", "animationTarget":"all-childs", "duration":"1600", "delay":"160", "easing":"easeOutQuint", "direction":"forward", "initValues":{"translateY":30, "opacity":0}, "animations":{"translateY":0, "opacity":1}}' @endif>
            
            <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" id="contactusSection1kenyalmtdtxt">Suguna Foods Kenya Limited, Kenya <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b>Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1kenya2atxt">331B, Muguga Green, Brookside, Nairobi, Kenya, <br>P.O. Box 1210-00606.</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection1254780txt">+254 780 200 700</td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1caresugunatxt">care@suguna.co.ke</td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
            <div class="col-md-4 col-sm-12">
                <div class="hub">
                    <h5 class="font-16 editable" id="contactusSection1sugunainstitutepoultry3txt">Suguna Institute of Poultry Management <i class="fa icon-md-arrow-up"></i></h5>
                    <h6><b class="editable" id="contactusSection1Registeredofficeaddresstxt">Registered Office Address</b></h6>
                    <address class="wordbreak editable" id="contactusSection1Officeaddress23atxt">23/A, 24, Chinnapappanoothu Village, Vilamarathupatti Post, Anaimalai Road, Udumalpet Taluk, Tirupur District, Tamil Nadu – 642 207, INDIA.</address>
                    <table class="vcard">
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/call.png')}}"> </td>
                         <td class="editable" id="contactusSection109344txt">093440 21326</td>
                     </tr>
                     <tr>
                         <td> <img src="{{asset('front-end/assets/img/mail.png')}}"> </td>
                         <td class="editable" id="contactusSection1info2atxt">info@sugunainstitute.com</td>
                     </tr>
                 </table>
                </div>
            </div>
            
            <hr>
            
             <div class="col-md-4 col-sm-12">
                <div class="hub">
                </div>
            </div>
            
            
        </div>
        
    </div>
</section>

<div id="modal-1" class="lqd-modal lity-hide leader_modal">
    <div class="lqd-modal-inner">
        <div class="lqd-modal-content">
            <form action="{{route('front.page.post.email')}}" method="post" class="partwithsuguna sugunaForm">
                    <div class="row">
                        <div class="col-md-6">
                            <input  class="form-control" type="hidden" name="subject" value=" Contact Form Submitted">
                            <input  class="form-control" id="emailToFinal" type="hidden" name="emailTo" value="{{env('SG_EMAIL_ALL_TO')}}">
                            <label class="editable" id="contactusSection1Fullnametxt"> Full Name </label>
                            <input  class="form-control" type="text" name="name" id="name" onblur="this.placeholder = 'Ex: Viswanath Gopalan'"
                                    placeholder="Ex: Viswanath Gopalan" onfocus="this.placeholder = ''"  required="">
                            <input  class="form-control" type="hidden" name="messageFor" value="Contact Us">
                        </div>
                        <div class="col-md-6">
                            <label class="editable" id="contactusSection1Emailtxt"> Email </label>
                            <input  class="form-control" type="email" name="email" id="email" onblur="this.placeholder = 'Ex: Viswanath@gmail.com'"
                                    placeholder="Ex: Viswanath@gmail.com" onfocus="this.placeholder = ''"  required="">
                        </div>
                        <div class="col-md-6">
                            <label class="editable" id="contactusSection1Phonetxt"> Phone </label>
                            <input  class="form-control" type="tel" name="mobile" id="mobile" onblur="this.placeholder = '+91'"
                                    placeholder="+91 " onfocus="this.placeholder = ''"  required="">
                        </div>
                         <div class="col-md-6">
                            <label class="editable" id="contactusSection1Entitytxt"> Entity </label>
                            <select id="entity" name="entity"  class="form-control" onchange="setEmailAddress(this);" required>
                                <option class="editable" value="" id="contactusSection1Selectentitytxt">Select Entity</option>
                                <option value="Suguna Foods" class="editable" id="contactusSection1Selectentity1txt" data-email="{{$dropdown['food']}}">Suguna Foods</option>
                                <option value="Globion" class="editable" id="contactusSection1Selectentity2txt" data-email="{{$dropdown['globion']}}">Globion</option>
                                <option value="Delfrez" class="editable" id="contactusSection1Selectentity21txt" data-email="{{$dropdown['delfrez']}}">Delfrez</option>
                                <option value="Suguna Feeds" class="editable" id="contactusSection1Selectentity22txt" data-email="{{$dropdown['feed']}}">Suguna Feeds</option>
                                <option value="Suguna Dairy"  data-email="{{$dropdown['dairy']}}" class="editable" id="contactusSection1Selectentity3txt">Suguna Dairy</option>
                                <option value="Aminovit"  data-email="{{$dropdown['aminovit']}}" class="editable" id="contactusSection1Selectentity4txt">Aminovit</option>
                                <option value="Suguna Foods - Bangladesh"  data-email="{{$dropdown['bangladesh']}}" class="editable" id="contactusSection1Selectentity5txt">Suguna Foods - Bangladesh</option>
                                <option value="Suguna Foods - Kenya"  data-email="{{$dropdown['kenys']}}" class="editable" id="contactusSection1Selectentity6txt">Suguna Foods - Kenya</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="editable" id="contactusSection1yourcommentstxt"> Your Comments </label>
                        <textarea class="form-control" cols="10" rows="4" name="message" id="message"  required=""></textarea>
                        </div>
                        <div class="col-md-12 text-md-right">
                        {{-- <input class="sbmitbtn sugunaFormSubmit font-16" type="submit" value="SUBMIT" > --}}
                        <button type="submit" value="SUBMIT" class="sbmitbtn sugunaFormSubmit font-16">Submit</button>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</div>

@section('scripts')

@endsection
@include('base.front-end.js')

@endsection
