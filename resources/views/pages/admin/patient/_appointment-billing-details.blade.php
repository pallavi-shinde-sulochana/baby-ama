<div class="row p-2">


    <div class="col-md-12 mb-3">
        <h3>Appoinment Details</h3>
    </div>

@if($appointment->user->patient)
@php
$patient = $appointment->user->patient;
@endphp
    <div class="col-md-4 pt-4">
        <div class="patient-info">
            @if($patient->first_name && $patient->last_name)
                <p>
                    <span><b>Patient Name</b></span>
                    <span class="separator">:</span>
                    <span>{{$patient->first_name}} {{$patient->last_name}}</span>
                </p>
            @endif
            @if($patient->father_name)
                <p>
                    <span><b>Father Name</b></span>
                    <span class="separator">:</span>
                    <span>{{$patient->father_name}}</span>
                </p>
            @endif
            @if($patient->blood_group)
                <p>
                    <span><b>Blood Group</b></span>
                    <span class="separator">:</span>
                    <span>{{$patient->blood_group}}</span>
                </p>
            @endif
            @if($patient->d_o_b)
                <p>
                    <span><b>DOB</b></span>
                    <span class="separator">:</span>
                    <span>{{$patient->d_o_b}}</span>
                </p>
            @endif
            @if($patient->age)
                <p>
                    <span><b>Age</b></span>
                    <span class="separator">:</span>
                    <span>{{$patient->age}}</span>
                </p>
            @endif
        </div>
    </div>
@endif

<div class="col-md-4 pt-4">
    <div class="patient-info">
        @if($appointment->appoinment_date)
            <p>
                <span><b>Appoinment Date</b></span>
                <span class="separator">:</span>
                <span>{{$appointment->appoinment_date}}</span>
            </p>
        @endif
        @if($appointment->appoinment_session)
            <p>
                <span><b>Session</b></span>
                <span class="separator">:</span>
                <span>{{$appointment->appoinment_session}}</span>
            </p>
        @endif
        @if($appointment->appoinment_time)
            <p>
                <span><b>Time</b></span>
                <span class="separator">:</span>
                <span>{{$appointment->appoinment_time}}</span>
            </p>
        @endif
    </div>
</div>

<div class="col-md-4 pt-4">
    <div class="patient-info">
        @if($doctor->first_name)
            <p>
                <span><b>Doctor Name</b></span>
                <span class="separator">:</span>
                <span>{{$doctor->first_name}} {{$doctor->last_name}}</span>
            </p>
        @endif
        @if($appointment->specialists)
            <p>
                <span><b>Specialist</b></span>
                <span class="separator">:</span>
                <span>{{$appointment->specialists}}</span>
            </p>
        @endif
        @if($userInfo->reg_no)
            <p>
                <span><b>Reg No</b></span>
                <span class="separator">:</span>
                <span>{{$userInfo->reg_no}}</span>
            </p>
        @endif
    </div>
</div>

</div>
