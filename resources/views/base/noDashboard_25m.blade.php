<!DOCTYPE html>
@php
    $route = Route::currentRouteName();
@endphp
{{--
Product Name: {{ theme()->getOption('product', 'description') }}
Author: KeenThemes
Purchase: {{ theme()->getOption('product', 'purchase') }}
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: {{ theme()->getOption('product', 'license') }}
--}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" {!! theme()->printHtmlAttributes('html') !!}
    {{ theme()->printHtmlClasses('html') }}>
{{-- begin::Head --}}

<head>
    <meta charset="utf-8" />
    <title>{{ ucfirst(theme()->getOption('meta', 'title')) }}</title>
    <meta name="description" content="{{ ucfirst(theme()->getOption('meta', 'description')) }}" />
    <meta name="keywords" content="{{ theme()->getOption('meta', 'keywords') }}" />
    <link rel="canonical" href="{{ ucfirst(theme()->getOption('meta', 'canonical')) }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="{{ asset(theme()->getOption('assets', 'favicon')) }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    {{-- begin::Fonts --}}
    {{ theme()->includeFonts() }}
    {{-- end::Fonts --}}

    @if (theme()->hasOption('page', 'assets/vendors/css'))
        {{-- begin::Page Vendor Stylesheets(used by this page) --}}
        @foreach (theme()->getOption('page', 'assets/vendors/css') as $file)
            <link href="{{ assetIfHasRTL($file) }}" rel="stylesheet" type="text/css" />
        @endforeach
        {{-- end::Page Vendor Stylesheets --}}
    @endif

    @if (theme()->hasOption('page', 'assets/custom/css'))
        {{-- begin::Page Custom Stylesheets(used by this page) --}}
        @foreach (theme()->getOption('page', 'assets/custom/css') as $file)
            <link href="{{ assetIfHasRTL($file) }}" rel="stylesheet" type="text/css" />
        @endforeach
        {{-- end::Page Custom Stylesheets --}}
    @endif

    @if (theme()->hasOption('assets', 'css'))
        {{-- begin::Global Stylesheets Bundle(used by all pages) --}}
        @foreach (theme()->getOption('assets', 'css') as $file)
            <link href="{{ assetIfHasRTL($file) }}" rel="stylesheet" type="text/css" />
        @endforeach
        {{-- end::Global Stylesheets Bundle --}}
    @endif

    @if (theme()->getMode() === 'preview')
        {{ theme()->getView('partials/trackers/_ga-general') }}
        {{ theme()->getView('partials/trackers/_ga-tag-manager-for-head') }}
    @endif

    @yield('styles')

</head>
{{-- end::Head --}}

{{-- begin::Body --}}

<body {!! theme()->printHtmlAttributes('body') !!} {!! theme()->printHtmlClasses('body') !!} {!! theme()->printCssVariables('body') !!} style="background-color: #ECF8FF">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.css@7/themes/algolia-min.css" />

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

    <script type="text/javascript">
        $("#supervisor_signature_date").flatpickr({
            dateFormat: "d-m-Y"
        });

        $("#client_signature_date").flatpickr({
            dateFormat: "d-m-Y"
        });
    </script>
    <!-- New Added  -->

    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {

            $('.trigger-modal').click(function() {
                // Find the sibling image source and alt text
                var src = $(this).siblings('img').attr('src');
                var alt = $(this).siblings('img').attr('alt');

                // Set the src and alt attributes of the modal image
                $('.img-light-box .modal-body.image-enlarged img').attr('src', src);
                $('.img-light-box .modal-body.image-enlarged img').attr('alt', alt);
                $('.img-light-box .modal-title').text(alt);
            });
            // Activate report thumbnail on trigger-modal click
            // function toggleReportThumbnail() {
            //     const reportThumbnail = $(this).closest('.report-thumbnail');
            //     if ($(this).hasClass('trigger-modal')) {
            //         if (!reportThumbnail.hasClass('active')) {
            //             reportThumbnail.addClass('active');
            //         }
            //     } else if ($(this).hasClass('trigger-close')) {
            //         if (reportThumbnail.hasClass('active')) {
            //             reportThumbnail.removeClass('active');
            //         }
            //     }
            // }

            // $('.trigger-modal, .trigger-close').click(toggleReportThumbnail);



            $('textarea').on('input', function() {
                this.style.height = 'auto';
                this.style.height = (this.scrollHeight) + 'px';
            });

            function performMedicineSearch(searchValue) {
                var actionUrl = "{{ route('doctor.search.medicine') }}";
                $.ajax({
                    url: actionUrl,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        updateMedItems(response.data);
                    },
                    error: function(error) {
                        // console.error('Error fetching data:', error);
                    }
                });
            }

            function updateMedItems(data) {
                var medItems = $('.med-items');
                medItems.html('');

                $.each(data, function(index, itemData) {
                    var getDose = itemData.dosage ? '(' + itemData.dosage + ')' : '';
                    var id = itemData.id;
                    var name = itemData.name;
                    var type = itemData.type ? itemData.type.substring(0, 3) : '';

                    var medItem = $(
                        '<div class="med-item" data-bs-toggle="modal" data-bs-target="#MedPopModal' +
                        id + '"></div>');
                    var medicine = $('<div class="medicine"></div>');

                    $('<span class="m-type pe-1 text-capitalize"></span>').text('(' + type + ')').appendTo(
                        medicine);
                    $('<span class="m-name"></span>').text(name).appendTo(medicine);
                    $('<span class="m-name ps-1"></span>').text(getDose).appendTo(medicine);

                    medicine.appendTo(medItem);
                    medItem.appendTo(medItems);
                });
            }

            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }

            const delayedSearch = debounce(function(searchValue) {
                if (searchValue.trim() !== '') {
                    performMedicineSearch(searchValue.toLowerCase().trim());
                } else {
                    performMedicineSearch(searchValue);
                }
            }, 200);

            $('#filterMedicine').on('input', function() {
                var searchValue = $(this).val();
                delayedSearch(searchValue);
            });

            // input with checkbox 
            (function($) {
                $.fn.enableTextFieldOnCheckbox = function() {
                    return this.each(function() {
                        const $parent = $(this);
                        const $checkbox = $parent.find('input[type="checkbox"]');
                        const $textField = $parent.find('input[type="text"]');
                        const $textArea = $parent.find('textarea');

                        $textField.prop('disabled', true);
                        $textArea.prop('disabled', true);
                        $checkbox.on('change', function() {
                            const isChecked = $(this).is(':checked');
                            $textField.prop('disabled', !isChecked);
                            $textArea.prop('disabled', !isChecked);


                            if (!isChecked) {
                                $textField.val('');
                                $textArea.val('');
                            }
                        });
                    });
                };
                $.fn.invertedCheckboxInput = function() {
                    return this.each(function() {
                        const $parent = $(this);
                        const $checkbox = $parent.find('input[type="checkbox"]');
                        const $textField = $parent.find('input[type="text"]');
                        const $textArea = $parent.find('textarea');

                        function updateFieldState() {
                            const inputValue = '';
                            const inputTAValue = '';
                            if ($textField.val()) {
                                inputValue = $textField.val().trim();
                            }
                            if ($textField.val()) {
                                inputTAValue = $textArea.val().trim();
                            }
                            const isChecked = $checkbox.is(':checked');

                            if (isChecked) {
                                $textField.val('');
                                $textArea.val('');
                                $textField.prop('disabled', true);
                                $textArea.prop('disabled', true);;
                            } else if (inputValue !== '') {
                                $checkbox.prop('disabled', true);
                            } else if (inputTAValue !== '') {
                                $checkbox.prop('disabled', true);
                            } else {
                                $checkbox.prop('disabled', false);
                                $textField.prop('disabled', false);
                                $textArea.prop('disabled', false);
                            }
                        }

                        $textField.on('input', updateFieldState);
                        $textArea.on('input', updateFieldState);
                        $checkbox.on('change', updateFieldState);
                        updateFieldState();
                    });
                };
            })(jQuery);

            // Usage example:
            $('.input-with-checkbox.general').enableTextFieldOnCheckbox();
            $('.input-with-checkbox.inv-general').invertedCheckboxInput();

            // Function to add a new row
            function addNewProcedure() {
                const newprd = $('<tr></tr>');
                const adviceCell = $('<td></td>').addClass('text-start').html(
                    '<textarea class="form-control" name="advice[]"></textarea>');
                const dateCell = $('<td></td>').addClass('text-center date').html(`
                    <div class="d-flex gap-2 align-items-center">
                        <input class="form-control" type="date" name="followUpDays[]">
                        <div>
                        <button type="button" class="action-btn delete-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16" fill="none">
                                <path d="M2.66675 4.48933H3.91141M3.91141 4.48933H13.8687M3.91141 4.48933V13.202C3.91141 13.5321 4.04255 13.8487 4.27597 14.0821C4.50939 14.3155 4.82598 14.4467 5.15608 14.4467H11.3794C11.7095 14.4467 12.0261 14.3155 12.2595 14.0821C12.4929 13.8487 12.6241 13.5321 12.6241 13.202V4.48933H3.91141ZM5.77841 4.48933V3.24467C5.77841 2.91456 5.90955 2.59797 6.14297 2.36455C6.37639 2.13113 6.69297 2 7.02308 2H9.51241C9.84252 2 10.1591 2.13113 10.3925 2.36455C10.6259 2.59797 10.7571 2.91456 10.7571 3.24467V4.48933M7.02308 7.601V11.335M9.51241 7.601V11.335" stroke="#FF505B" stroke-width="1.11111" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                        </button>
                        </div>
                    </div>
                `);
                newprd.append(adviceCell, dateCell);
                const tableBody = $('.procedure-table .table tbody');
                tableBody.append(newprd);
            }

            // Event delegation to handle delete button clicks for dynamically added rows
            $('.procedure-table').on('click', '.delete-btn', function() {
                $(this).closest('tr').remove();
            });

            // Event handler for adding a new row
            $('#addNewButton').on('click', function() {
                addNewProcedure();
            });

            // Scroll table sing mouse
            var isMouseDown = false,
                startX,
                scrollLeft;

            $(".table-responsive").on("mousedown", function(e) {
                isMouseDown = true;
                startX = e.pageX - $(".table-responsive")[0].offsetLeft;
                scrollLeft = $(".table-responsive").scrollLeft();
            });

            $(".table-responsive").on("mouseup", function() {
                isMouseDown = false;
            });

            $(".table-responsive").on("mousemove", function(e) {
                if (!isMouseDown) return;
                var currentX = e.pageX - $(".table-responsive")[0].offsetLeft;
                var distance = currentX - startX;
                $(".table-responsive").scrollLeft(scrollLeft - distance);
            });

        });
    </script>

    <!-- New Added End -->

    @yield('scripts')

    @include('pages.admin.partials.toaster')

</body>
<!--  -->
{{-- end::Body --}}

</html>
