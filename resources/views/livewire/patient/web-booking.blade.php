<section id="web-booking">
    <div class="web-booking-wrapper">
        <form>
            
            @php
                $today = date('Y-m-d');
                $date_limit = 7;
            @endphp

            <!-- Full Name & Specialist -->
            <fieldset id="user-details" class="web-book-wrapper @if($step == 1) d-block @endif">
                <h1 class="web-book-title m-0 text-center">Book Appointment</h1>
                <p class="web-book-sub-title m-0 text-center">Book your appointment with simple touch, </p>
                <div class="mb-3">
                    <label for="full-name" class="form-label">Full Name <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="full-name" aria-describedby="full-name" placeholder="Enter your name" wire:model="full_name">
                    @error('full_name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="specialists" class="form-label">Specialists <span class="text-danger">*</span></label>
                    <select id="disabledSelect" class="form-select" id="specialists" wire:model="specialist">
                        <option value="" disabled selected>Select specialist</option>
                        @php
                            $specialist_types = getDoctorSpecialistType();
                            ksort($specialist_types);
                        @endphp
                        @foreach($specialist_types as $slug => $specialist_type)
                            <option value="{{$slug}}">{{$specialist_type}}</option>
                        @endforeach
                    </select>
                     @error('specialist') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm w-100" type="button" wire:click="goNext(2)">Continue</button>
                </div>
            </fieldset>

            <!-- Date & Session -->
            <fieldset id="select-session" class="web-book-wrapper @if($step == 2) d-block @endif">
                <h1 class="web-book-title m-0 text-center">Select Your Slot</h1>
                <p class="web-book-sub-title m-0 text-center">Select your Appointment date and session</p>
                <div class="mb-3">
                    <label for="select-date" class="form-label">Select Date</label>
                    <div class="web-book-date-scroll">
                        <div class="swiper web-booking-dates-list" wire:ignore>
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
                    @error('select_date') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <label for="select-session" class="form-label">Select Session</label>
                    <div class="row">
                        <div class="col-4">
                            <div class="web-book-check">
                                <input type="radio" value="morning" class="d-none web-book-check-radio" id="morning-session" name="session" onchange="selectDataSession(this,'session')">
                                <label for="morning-session" class="web-book-check-label w-100">
                                    <span class="web-book-check-text fw-bold">Morning</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-4 px-1">
                            <div class="web-book-check">
                                <input type="radio" value="afternoon" class="d-none web-book-check-radio" id="afternoon-session" name="session" onchange="selectDataSession(this,'session')">
                                <label for="afternoon-session" class="web-book-check-label w-100">
                                    <span class="web-book-check-text fw-bold">Afternoon</span>
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="web-book-check">
                                <input type="radio" value="evening" class="d-none web-book-check-radio" id="evening-session" name="session" onchange="selectDataSession(this,'session')">
                                <label for="evening-session" class="web-book-check-label w-100">
                                    <span class="web-book-check-text fw-bold">Evening</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    @error('session') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm w-100" type="button" wire:click="goNext(3)">Continue</button>
                </div>
            </fieldset>

            <!-- Phone Number -->
            <fieldset id="phone-number" class="web-book-wrapper @if($step == 3) d-block @endif">
                <h1 class="web-book-title m-0 text-center">Book Appointment</h1>
                <p class="web-book-sub-title m-0 text-center">Gat your appointment details on mobile number</p>
                <div class="mb-3">
                    <label for="phone" class="form-label">Mobile Number <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter your mobile number" wire:model="phone">
                    @error('phone') <span class="error text-danger">{{ $message }}</span> @enderror
                    <div class="form-text">
                        You will receive an OTP shortly.
                        <br>
                        We will send appointment details on this number.
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm w-100" type="button" wire:click="goNext(4)">Continue</button>
                    <!-- <div class="text-center">
                        <button class="btn btn-sm">Resend OTP</button>
                    </div> -->
                </div>
            </fieldset>

            <!-- OTP -->
            <fieldset id="otp" class="web-book-wrapper @if($step == 4) d-block @endif">
                <h1 class="web-book-title m-0 text-center">Book Appointment</h1>
                <p class="web-book-sub-title m-0 text-center">Verify the OTP to confirm your slot</p>
                <div class="mb-3">
                    <label for="otp" class="form-label">Enter OTP <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="otp" aria-describedby="otp" placeholder="Enter OTP" wire:model="otp">
                    @error('otp') <span class="error text-danger">{{ $message }}</span> @enderror
                    <div class="form-text">
                        You will receive an OTP shortly.
                        <br>
                        We will send appointment details on this number.
                    </div>
                </div>
                <div class="mb-3">
                    <button class="btn btn-primary btn-sm w-100" type="button" wire:click="goNext('success')">Verify OTP</button>
                    <div class="text-center">
                        <button class="btn btn-sm" type="button">Resend OTP</button>
                    </div>
                </div>
            </fieldset>

            <!-- Success Card -->
            <fieldset id="success" class="web-book-wrapper @if($step == "success") d-block @endif">
                <div class="row py-5">
                    <div class="col-12 text-center">
                        <img src="{{asset('front-end/assets/img/web-book-success.png')}}" class="web-book-success-img">
                    </div> 
                    <div class="col-12 mt-3">
                        <h2 class="h1 text-center">Successfully</h2>
                        <p class="m-0 mt-2 text-center">
                            You successfully booked your slot. You get confirmation from our side, you need pay to confirm your appointment.
                        </p>
                        <p class="text-center mt-3"><a class="text-center" href="{{url('/')}}">Back to Home</a></p>
                    </div>
                </div>
            </fieldset>

        </form>
    </div>
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
                @this.set('select_date',value);
            }else{
                @this.set('session',value);
            }
        }
        // User Alert
            window.addEventListener('user:alert', event => { 
                 Swal.fire({
                    title: event.detail.message
                })
            });
    </script>
</section>