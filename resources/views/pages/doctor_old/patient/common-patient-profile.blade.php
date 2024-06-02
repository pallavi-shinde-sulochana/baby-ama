<div class="head baby-shadow py-3 px-5" style="margin-top:50px;">
    <div class="row px-5 py-4 align-items-center">
        <div class="col-12 col-md-5 col-lg-3 col-xl-2">
            <div class="patient-img d-flex justify-content-center align-items-center mx-auto">
                <p class="name mb-0">
                    {{ucfirst(substr($user->first_name, 0,1)).ucfirst(substr($user->last_name, 0,1))}}</p>
                {{-- <img src="{{helperAssetUrl('assets/img/patinet-placeholder.png')}}"> --}}
            </div>
        </div>
        <div class="col-12 col-md-7 col-lg-5 col-xl-6">
            <div class="patient-info">
                <p class="name">{{ ucfirst($user->first_name).' '.ucfirst($user->last_name)}} </p>
                @if($user->patient)
                <p class="doctor-patinet-app-list-color"><span class="fw-normal label">UMR NO</span><span class="val">{{$user->patient->umr_no}}</span></p>
                <p class="doctor-patinet-app-list-color"><span class="fw-normal label">DOB</span><span class="val gap-3 d-flex flex-wrap align-items-center justify-content-start"><span>{{$user->patient->d_o_b}}</span><span>({{$user->patient->age}})</span></span></p>
                <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Gender</span><span class="val">{{ ucfirst($user->patient->gender) }}</span></p>

                @endif

                @if($appointment->specialists)
                <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Department</span><span class="val">{{$appointment->specialists}}</span></p>
                @endif
                @if($appointment->doctor)
                <p class="doctor-patinet-app-list-color"><span class="fw-normal label">Doctor</span><span class="val">{{$appointment->doctor->first_name.' '.$appointment->doctor->last_name}}</span></p>
                @endif
                <p class="doctor-patinet-app-list-color">
                    <span class="fw-normal label">Status</span> 
                    <span class="val">
                    {{ Str::ucfirst($appointment->status) }}
                        {{-- @if($appointment->status==-1)
                        {{'Declined' }}
                        @elseif($appointment->status==0 && $appointment->doctor_id)
                        {{'Assigned' }}
                        @else
                        {{'Awaiting' }}
                        @endif --}}
                    </span>
                </p>
                @if($appointment->appoinment_session)
                <p class="doctor-patinet-app-list-color">
                    <span class="fw-normal label">Session</span>
                    <span class="val">
                        {{ $appointment->appoinment_session }}
                    </span>
                </p>
                @endif
            </div>
        </div>
        <div class="col-12 col-lg-4 mt-4 mt-lg-0">
            <div class="text-center">
                @if(isset($user->patient->id))
                <a class="link doctor-color-main doctor-font-bold btn-outline-primary"
                    href="{{route('doctor.appointment.patient.details',['appoinment'=>$appoinment->id,'patient'=>$user->patient->id])}}">Basic
                    Details</a>
                @endif
            </div>
        </div>
    </div>
</div>
