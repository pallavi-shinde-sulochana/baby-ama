<!DOCTYPE html>
{{--
Product Name: {{ theme()->getOption('product', 'description') }}
Author: Tealorca
Purchase: {{ theme()->getOption('product', 'purchase') }}
Website: http://www.keenthemes.com/
Contact: support@tealorca.com
License: {{ theme()->getOption('product', 'license') }}
--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    {!! theme()->printHtmlAttributes('html') !!} {{ theme()->printHtmlClasses('html') }}>
{{-- begin::Head --}}
<head>
    <meta charset="utf-8"/>
    <title>{{ ucfirst(theme()->getOption('meta', 'title')) }}</title>
    <meta name="description" content="{{ ucfirst(theme()->getOption('meta', 'description')) }}"/>
    <meta name="keywords" content="{{ theme()->getOption('meta', 'keywords') }}"/>
    <link rel="canonical" href="{{ ucfirst(theme()->getOption('meta', 'canonical')) }}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{ asset(theme()->getOption('assets', 'favicon')) }}"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- begin::Fonts --}}
    {{ theme()->includeFonts() }}
    {{-- end::Fonts --}}

    @if (theme()->hasOption('page', 'assets/vendors/css'))
        {{-- begin::Page Vendor Stylesheets(used by this page) --}}
        @foreach (theme()->getOption('page', 'assets/vendors/css') as $file)
            <link href="{{ assetIfHasRTL($file) }}" rel="stylesheet" type="text/css"/>
        @endforeach
        {{-- end::Page Vendor Stylesheets --}}
    @endif

    @if (theme()->hasOption('page', 'assets/custom/css'))
        {{-- begin::Page Custom Stylesheets(used by this page) --}}
        @foreach (theme()->getOption('page', 'assets/custom/css') as $file)
            <link href="{{ assetIfHasRTL($file) }}" rel="stylesheet" type="text/css"/>
        @endforeach
        {{-- end::Page Custom Stylesheets --}}
    @endif

    @if (theme()->hasOption('assets', 'css'))
        {{-- begin::Global Stylesheets Bundle(used by all pages) --}}
        @foreach (theme()->getOption('assets', 'css') as $file)
            <link href="{{ assetIfHasRTL($file) }}" rel="stylesheet" type="text/css"/>
        @endforeach
        {{-- end::Global Stylesheets Bundle --}}
    @endif

    @if (theme()->getMode() === 'preview')
        {{ theme()->getView('partials/trackers/_ga-general') }}
        {{ theme()->getView('partials/trackers/_ga-tag-manager-for-head') }}
    @endif
     <link rel="stylesheet" type="text/css" href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}">
    @yield('styles')

    <!-- Sweet Alert 2 Css-->
    <link rel="stylesheet" type="text/css" href="{{asset('plugins/custom/sweetalert2/sweetalert2.min.css')}}">

    <!-- Tailwind Css -->
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/css/tailwind.min.css')}}"> --}}
    <!-- Flatpicker css-->
    <link rel="stylesheet" type="text/css" href="{{asset('front-end/assets/css/flatpickr.min.css')}}">

    <!-- Livewire Styles -->
    <livewire:styles />

    <style>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">.patient-info {
            display: flex;
            justify-content: space-between;
        }

        .patient-info p {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        .patient-info p span:first-child {
            flex: 0 0 40%;
            text-align: left;
        }

        .patient-info p span:last-child {
            flex: 0 0 50%;
            text-align: left;
        }

        .patient-info p span.separator {
            flex: 0 0 auto;
            text-align: center;
            width: 10px;
            /* Adjust width as needed */
        }
    </style>

    <!-- PowerGrid Styles -->
    @powerGridStyles

</head>
{{-- end::Head --}}

<style>
    .show_eye {
    padding: 15px 15px;
    background: #f6f8fa;
    border-left: 0;
    border-radius: 0 4px 4px 0;
}
</style>

{{-- begin::Body --}}
<body {!! theme()->printHtmlAttributes('body') !!} {!! theme()->printHtmlClasses('body') !!} {!! theme()->printCssVariables('body') !!}>

@if (theme()->getOption('layout', 'loader/display') === true)
    {{ theme()->getView('layout/_loader') }}
@endif

@yield('content')

{{-- begin::Javascript --}}
@if (theme()->hasOption('assets', 'js'))
    {{-- begin::Global Javascript Bundle(used by all pages) --}}
    @foreach (theme()->getOption('assets', 'js') as $file)
        <script src="{{ asset($file) }}"></script>
    @endforeach
    {{-- end::Global Javascript Bundle --}}
@endif

@if (theme()->hasOption('page', 'assets/vendors/js'))
    {{-- begin::Page Vendors Javascript(used by this page) --}}
    @foreach (theme()->getOption('page', 'assets/vendors/js') as $file)
        <script src="{{ asset($file) }}"></script>
    @endforeach
    {{-- end::Page Vendors Javascript --}}
@endif

@if (theme()->hasOption('page', 'assets/custom/js'))
    {{-- begin::Page Custom Javascript(used by this page) --}}
    @foreach (theme()->getOption('page', 'assets/custom/js') as $file)
        <script src="{{ asset($file) }}"></script>
    @endforeach
    {{-- end::Page Custom Javascript --}}
@endif
{{-- end::Javascript --}}

@if (theme()->getMode() === 'preview')
    {{ theme()->getView('partials/trackers/_ga-tag-manager-for-body') }}
@endif

<link rel="stylesheet" type="text/css" href="{{asset('plugins/custom/datatables/datatables.bundle.css')}}">
<script  src="{{asset('plugins/custom/datatables/datatables.bundle.js')}}"></script>
<script type="text/javascript" src="{{asset('plugins/custom/sweetalert2/sweetalert2.all.min.js')}}"></script>


  {{-- <script src="https://cdn.tiny.cloud/1/4p9bgasfwryzb8xc23r0cwrgxqgcype420cqrd4ljph5af1y/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script> --}}
{{-- <script type="text/javascript">
    jQuery(document).ready(function() {

        if($('#kt_datatable').length){

             var table = $('#kt_datatable');
                table.DataTable({
                    lengthMenu: [5, 10, 25, 50, 100],
                    pageLength: 10,
                    bFilter:false,
                    bInfo: false,
                    "paging":   false,
                    "ordering": true,
                    columnDefs: [{
                        orderable: false,
                        targets: "custom-no-sort"
                    }],
                    language: {
                        'lengthMenu': 'Display _MENU_',
                    },
                    aaSorting: [],
                    // fixedColumns: true,
                });
        }
        if($('#daterangepickers').length){
            $("#daterangepickers").flatpickr({
                dateFormat: "d-m-Y",
            });
        }

    });



    // For editor
    if($('#textarea_tinymce').length){
         tinymce.init({
            selector: '#textarea_tinymce',
            plugins: "link image imagetools",
          });
    }

     function confirmation(ev) {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href'); //use currentTarget because the click may be on the nested i tag and not a tag causing the href to be empty

            Swal.fire({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this data!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              showCancelButton: true,
              confirmButtonText: "Yes, delete it!"
            })
            .then(function(result) {
                if (result.value) {
                    window.location=urlToRedirect;
                }
            });
    }
</script> --}}
<script>

    // var today = new Date();
    // today.setHours(0, 0, 0, 0); // Set time to midnight
    $("#d_o_b").flatpickr({
        allowInput: true,
        maxDate: "today",
        onChange: function() {
               /*var birthDay = document.getElementById("d_o_b").value;
                var DOB = new Date(birthDay);
                var today = new Date();
                var age = today.getTime() - DOB.getTime();
                age = Math.floor(age / (1000 * 60 * 60 * 24 * 365.25));
*/
            var birthDay = document.getElementById("d_o_b").value;
            var DOB = new Date(birthDay);
            var today = new Date();

            var yearsDiff = today.getFullYear() - DOB.getFullYear();
            var monthsDiff = today.getMonth() - DOB.getMonth();

            // Check if the birth date's month is greater than the current month
            if (today.getMonth() < DOB.getMonth()) {
              yearsDiff--;
              monthsDiff += 12;
            }

            // Create a string representation of the age
            // var ageString = yearsDiff + " years " + monthsDiff + " months";
            //     document.getElementById('age').value = ageString;

            var ageString;
                    if (yearsDiff < 1) {
                        ageString = (monthsDiff < 1 ? daysDiff + " days" : monthsDiff + " months");
                    } else {
                        ageString = yearsDiff + " years " + monthsDiff + " months";
                    }
               document.getElementById('age').value = ageString;

        }
        // dateFormat: "Y-m-Y"
    });

    $(".datePicker").flatpickr({
        // dateFormat: "Y-m-Y"
    });
</script>
    @yield('scripts')
    {{-- To disaplay error / success toaster --}}
    @include('pages.admin.partials.toaster')
    <!-- Livewire Styles -->
    <livewire:scripts />

     <!-- PowerGrid Scripts -->
     @powerGridScripts

     <!-- Alpine JS -->
     <script type="text/javascript" src="{{asset('front-end/assets/js/alpine.js')}}"></script>
     <script>
        function showpassword(x1) {

        var x = document.getElementById("password");
        if (x.type === "password") {
            x.type = "text";
           // x1.classList.toggle("fa-eye");
            x1.classList.remove("fa-eye-slash");
            x1.classList.add("fa-eye");
        } else {
            x.type = "password";
            //x1.classList.toggle('fa-eye-slash');
            x1.classList.remove("fa-eye");
            x1.classList.add("fa-eye-slash");
        }
    }
            </script>

</body>
{{-- end::Body --}}
</html>
