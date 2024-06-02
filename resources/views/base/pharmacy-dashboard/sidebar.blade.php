@php

    // Example from documentation
    $docRoute = Route::currentRouteName();

    // $docHome= ($docRoute=='pharmacy.home') ? 'active' : '';
    // $docAppoinments= ($docRoute=='doctor.appointments') ? 'active' : '';
    // $docProfile= ($docRoute=='doctor.profile') ? 'active' : '';
    // $docHelp= ($docRoute=='doctor.help') ? 'active' : '';

    // dd($docRoute);

@endphp


<div id="sidebar-wrapper">
    <div class="sidebar-close-wrapper text-end pt-4">
        <span class="navbar-toggler sidebar-toggle d-md-none" type="button">
            <i class="fas fa-times closer h3 text-dark"></i>
            <i class="fas fa-bars opener h3 text-dark"></i>
        </span>
    </div>
    <div class="sidebar-user-logo py-5">
        <div class="row mx-0 align-items-center justify-content-center">
            <div class="col-10 mb-5">
                <img src="{{ asset('images/logo-pharmacy-v1.png') }}" alt="Babyama"
                    class="w-100 object-fit-contain">
            </div>
            <div class="col-12 text-center">
                {{-- <h2 class="h3 m-0">{{helperGetAuthUser('first_name')}}</h2> --}}
                {{-- <p class="m-0">{{helperGetAuthUserSpecialization()}}</p>  --}}
            </div>
        </div>
    </div>
    <div class="sidebar-inner-wrapper py-4 py-md-5">
        <div class="sidebar-nav-section p-5">
            <ul class="sidebar-nav w-100">
                <li class="sidebar-link px-0 has-child">
                    <span class=" menu-icon h-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 17 20"
                            fill="none">
                            <path
                                d="M16.8873 5.58548C16.8816 5.55912 16.8816 5.53184 16.8873 5.50548C16.8824 5.4824 16.8824 5.45856 16.8873 5.43548V5.34548L16.8273 5.19548C16.8029 5.15455 16.7726 5.11748 16.7373 5.08548L16.6473 5.00548H16.5973L12.6573 2.51548L8.93728 0.21548C8.85122 0.14721 8.75274 0.0962702 8.64728 0.0654799H8.56728C8.4779 0.0505611 8.38667 0.0505611 8.29728 0.0654799H8.19728C8.08113 0.0911721 7.96976 0.135046 7.86729 0.19548L0.397285 4.84548L0.307285 4.91548L0.217285 4.99548L0.117285 5.06548L0.067285 5.12548L0.00728483 5.27548V5.42548C-0.00242828 5.49179 -0.00242828 5.55917 0.00728483 5.62548V14.3555C0.00694475 14.5254 0.049921 14.6927 0.132156 14.8414C0.214391 14.9901 0.333172 15.1154 0.477285 15.2055L7.97728 19.8455L8.12728 19.9055H8.20728C8.37647 19.9591 8.5581 19.9591 8.72728 19.9055H8.80728L8.95728 19.8455L16.3973 15.2755C16.5414 15.1854 16.6602 15.0601 16.7424 14.9114C16.8246 14.7627 16.8676 14.5954 16.8673 14.4255V5.69548C16.8673 5.69548 16.8873 5.62548 16.8873 5.58548ZM8.39728 2.23548L10.1773 3.33548L4.58728 6.79548L2.79729 5.69548L8.39728 2.23548ZM7.39728 17.2355L1.89728 13.8755V7.48548L7.39728 10.8855V17.2355ZM8.39728 9.12548L6.48729 7.97548L12.0773 4.50548L13.9973 5.69548L8.39728 9.12548ZM14.8973 13.8455L9.39728 17.2655V10.8855L14.8973 7.48548V13.8455Z"
                                fill="#8A4FBA" />
                        </svg>
                    </span>
                    <a href="{{ route('pharmacy.home') }}" class="ps-0 inline-block sidebar-link ">Inventory</a>
                    <ul class="sub-menu bg-white px-0 py-2">
                        <li class="{{ ($docRoute=='pharmacy.inventory.medicinelist') ? 'active' : ''; }}"><a href="{{ route('pharmacy.inventory.medicinelist') }}" class="ps-0 inline-block sidebar-link ">Medicine
                                List</a></li>
                        <li class="{{ ($docRoute=='pharmacy.inventory.addmedicine') ? 'active' : ''; }}"><a href="{{ route('pharmacy.inventory.addmedicine') }}"
                                class="ps-0 inline-block sidebar-link ">Add New
                                Medicine</a></li>
                    </ul>
                </li>
                <li class="sidebar-link px-0 has-child">
                    <span class=" menu-icon h-100">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="20" viewBox="0 0 17 20"
                            fill="none">
                            <path
                                d="M16.8873 5.58548C16.8816 5.55912 16.8816 5.53184 16.8873 5.50548C16.8824 5.4824 16.8824 5.45856 16.8873 5.43548V5.34548L16.8273 5.19548C16.8029 5.15455 16.7726 5.11748 16.7373 5.08548L16.6473 5.00548H16.5973L12.6573 2.51548L8.93728 0.21548C8.85122 0.14721 8.75274 0.0962702 8.64728 0.0654799H8.56728C8.4779 0.0505611 8.38667 0.0505611 8.29728 0.0654799H8.19728C8.08113 0.0911721 7.96976 0.135046 7.86729 0.19548L0.397285 4.84548L0.307285 4.91548L0.217285 4.99548L0.117285 5.06548L0.067285 5.12548L0.00728483 5.27548V5.42548C-0.00242828 5.49179 -0.00242828 5.55917 0.00728483 5.62548V14.3555C0.00694475 14.5254 0.049921 14.6927 0.132156 14.8414C0.214391 14.9901 0.333172 15.1154 0.477285 15.2055L7.97728 19.8455L8.12728 19.9055H8.20728C8.37647 19.9591 8.5581 19.9591 8.72728 19.9055H8.80728L8.95728 19.8455L16.3973 15.2755C16.5414 15.1854 16.6602 15.0601 16.7424 14.9114C16.8246 14.7627 16.8676 14.5954 16.8673 14.4255V5.69548C16.8673 5.69548 16.8873 5.62548 16.8873 5.58548ZM8.39728 2.23548L10.1773 3.33548L4.58728 6.79548L2.79729 5.69548L8.39728 2.23548ZM7.39728 17.2355L1.89728 13.8755V7.48548L7.39728 10.8855V17.2355ZM8.39728 9.12548L6.48729 7.97548L12.0773 4.50548L13.9973 5.69548L8.39728 9.12548ZM14.8973 13.8455L9.39728 17.2655V10.8855L14.8973 7.48548V13.8455Z"
                                fill="#8A4FBA" />
                        </svg>
                    </span>
                    <a href="#" class="ps-0 inline-block sidebar-link ">Billing</a>
                    <ul class="sub-menu bg-white px-0 py-2">
                <li class="{{ ($docRoute=='pharmacy.billing.prescription.list') ? 'active' : ''; }}"><a href="{{ route('pharmacy.billing.prescription.list') }}"
                                class="ps-0 inline-block sidebar-link ">Prescription</a></li>
                        <li class=".active"><a href="{{ route('pharmacy.home') }}"
                                class="ps-0 inline-block sidebar-link">History</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <div class="sidebar-logout">
            <ul class="sidebar-nav">
                <li><a href="{{ route('logout') }}" class="sidebar-logout-link text-danger">Log out</a></li>
            </ul>
        </div>
    </div>
</div>
