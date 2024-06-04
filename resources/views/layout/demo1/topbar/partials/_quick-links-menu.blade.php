<!--begin::Menu-->
<div class="menu menu-sub menu-sub-dropdown menu-column w-250px w-lg-325px" data-kt-menu="true">
	<!--begin::Heading-->
    <div class="d-flex flex-column flex-center bgi-no-repeat rounded-top px-9 py-10" style="background-image:url('{{ asset('media//misc/pattern-1.jpg') }}')">
        <!--begin::Title-->
        <h3 class="text-white fw-bold mb-3">
            Quick Links
        </h3>
        <!--end::Title-->

    </div>
	<!--end::Heading-->

    <!--begin:Nav-->
    <div class="row g-0">
        <!--begin:Item-->
        <div class="col-6">
            <a href="{{ theme()->getPageUrl('admin/appointments') }}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end border-bottom">
                {!! theme()->getSvgIcon("icons/duotone/Shopping/Euro.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Appointments</span>
                {{-- <span class="fs-7 text-gray-400">View All Appointment </span> --}}
            </a>
        </div>
        <!--end:Item-->

        <!--begin:Item-->
        <div class="col-6">
            <a href="{{route('doctor.users.list.doctor')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-bottom">
                {!! theme()->getSvgIcon("icons/duotone/Communication/Mail-attachment.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Doctors</span>
                {{-- <span class="fs-7 text-gray-400">View All Doctors</span> --}}
            </a>
        </div>
        <!--end:Item-->

        <!--begin:Item-->
        <div class="col-12">
            <a href="{{route('admin.patients.list','patients')}}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light border-end">
                {!! theme()->getSvgIcon("icons/duotone/Shopping/Box2.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Patients</span>
                {{-- <span class="fs-7 text-gray-400">View All Customers</span> --}}
            </a>
        </div>
        <!--end:Item-->

        <!--begin:Item-->
        {{-- <div class="col-6">
            <a href="{{ theme()->getPageUrl('pages/projects/users') }}" class="d-flex flex-column flex-center h-100 p-6 bg-hover-light">
                {!! theme()->getSvgIcon("icons/duotone/Communication/Group.svg", "svg-icon-3x svg-icon-success mb-2") !!}
                <span class="fs-5 fw-bold text-gray-800 mb-0">Careers</span>
                <span class="fs-7 text-gray-400">Job Posting </span>
            </a>
        </div> --}}
        <!--end:Item-->
    </div>
    <!--end:Nav-->
</div>
<!--end::Menu-->
