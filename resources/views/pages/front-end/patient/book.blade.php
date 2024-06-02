@extends('base.patient-dashboard')
@section('doctor-content')
@php
    $today = date('Y-m-d',strtotime("-1 days"));
    // $today = date('Y-m-d');
    $date_limit = 7;
@endphp
<div class="card doctor-home">
  <div class="card-body ">
    <div class="row">
      <div class="col-7 col-md-6 col-lg-6">
        <h2 class="color-white">Book Appointment </h2>
           Book your appointment with Babyama specialist

      </div>
      <div class="col-5 col-md-6 col-lg-4">
        <div class="text-center">

          <img class="patient-home-baby" src="{{helperAssetUrl('assets/img/pigu logo-01-only.png')}}">
        </div>
      </div>
    </div>
  </div>
</div>
{{--             <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens,
              the page content will be pushed off canvas.</p>
            <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
            <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a> --}}

<section class="patient-specialists patient-home pt-5">
    
   
    <div class="patinet-booking">
      <h1 class="web-book-title m-0 text-center">Select Your Slot</h1>
      <form action="{{route('patient.book.post')}}" method="POST">
          @csrf
      
      @if(isset($doctor))

               <input type="hidden" id="doctor_id" name="doctor_id" value="{{$doctor}}">
      @endif
               <input type="hidden" id="bookingDate" name="bookingDate">
               <input type="hidden" id="bookingTime" name="bookingTime">
                <div class="mb-3">
                    <label for="select-date" class="form-label">Select Date</label>
                    <div class="web-book-date-scroll">
                        <div class="swiper web-booking-dates-list" >
                            <div class="swiper-wrapper"> 
                                @for($i = 1; $i < $date_limit+1; $i++)
                                    @php
                                        $date = date('Y-m-d', strtotime($today . ' + ' . $i . ' days'));
                                    @endphp
                                    <div class="swiper-slide">
                                        <div class="web-book-check">
                                            <input type="radio" value="{{$date}}" class="d-none web-book-check-radio" id="web-book-{{$i}}" name="web-booking-date" onchange="selectDataSession(this)">
                                            <label for="web-book-{{$i}}" class="web-book-check-label">
                                                <span class="web-book-check-text fw-bold">{{date('D', strtotime($date))}}</span>
                                                <span class="h1 web-book-check-text m-0">{{date('j', strtotime($date))}}</span>
                                                <span class="web-book-check-text fw-bold">{{date('M', strtotime($date))}}</span>
                                            </label>
                                        </div>
                                    </div>
                                @endfor
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                     
                </div>
                <div class="mb-3">
                    <label for="select-session" class="form-label">Select Session</label>
                    <div class="row">
                        <div class="col-4">
                            <div class="web-book-check" id="morning-session-check">
                                <input type="radio" value="morning" class=" web-book-check-radio d-none" id="morning-session" name="session"  onchange="selectDataSession(this,'session')">
                                <label for="morning-session" class="web-book-check-label w-100">
                                    <span class="web-book-check-text fw-bold">Morning</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-4 px-1">
                            <div class="web-book-check" id="afternoon-session-check">
                                <input type="radio" value="afternoon" class=" web-book-check-radio d-none" id="afternoon-session" name="session" onchange="selectDataSession(this,'session')">
                                <label for="afternoon-session" class="web-book-check-label w-100">
                                    <span class="web-book-check-text fw-bold">Afternoon</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="web-book-check" id="evening-session-check">
                                <input type="radio" value="evening" class=" web-book-check-radio d-none" id="evening-session" name="session" onchange="selectDataSession(this,'session')">
                                <label for="evening-session" class="web-book-check-label w-100">
                                    <span class="web-book-check-text fw-bold">Evening</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Description (Option)</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5" placeholder="Enter your health problams"></textarea>
                    </div>
                </div>
                 <div class="row pt-5">
                   <div class="col-12">
                     <button class="btn w-100 btn-primary" type="submit" >Schedule Appointment </button>
                   </div>
                 </div>
                 </form>
    </div>

</section>
 <script type="text/javascript">
        swiperInit();
        function swiperInit(){
            var swiper = new Swiper(".web-booking-dates-list", {
                slidesPerView: "auto",
                freeMode: true,
                spaceBetween: 10,
                mousewheel: {
                releaseOnEdges: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        }

        function selectDataSession(field,type = "select_date"){
          let value = field.value;

          if(type === 'select_date'){

                var getCurrentDate1 = getCurrentDate();
                    let currentDate = new Date();
                    // Set specific times of the day
                    currentDate.setHours(11, 59, 0); // Morning at 11:59 AM
                    let morningTimeup = currentDate.getTime();

                    currentDate.setHours(15, 0, 0); // Noon at 03:00 PM
                    let noonTimeup = currentDate.getTime();

                    currentDate.setHours(18, 0, 0); // Evening at 06:00 PM
                    let eveningTimeup = currentDate.getTime();

                    let currentTime = new Date().getTime();
                    if (currentTime > morningTimeup && value===getCurrentDate1) {
                       jQuery('#morning-session-check').hide();
                    } else {
                       jQuery('#morning-session-check').show();
                    }

                    if (currentTime > noonTimeup && value===getCurrentDate1) {
                       jQuery('#afternoon-session-check').hide();
                    } else {
                       jQuery('#afternoon-session-check').show();
                    }

                    if (currentTime > eveningTimeup && value===getCurrentDate1) {
                       jQuery('#morning-session-check').hide();
                    } else {
                       jQuery('#evening-session-check').show();
                    }
              jQuery('#bookingDate').val(value);
                 
            }else{
              jQuery('#bookingTime').val(value);
            }


        }

        function getCurrentDate(){
            let currentDate = new Date();

            // Get the year, month, and day components
            let year = currentDate.getFullYear();
            let month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Add 1 to month because it's zero-based
            let day = String(currentDate.getDate()).padStart(2, '0');

            // Create the formatted date string
            let formattedDate = `${year}-${month}-${day}`;

            return formattedDate;
        }

        
        
    </script>
@endsection