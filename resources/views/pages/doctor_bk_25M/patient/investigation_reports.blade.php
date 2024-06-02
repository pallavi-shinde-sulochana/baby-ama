@extends('base.doctor-dashboard')
@section('doctor-content')
@php
$appointment= $appoinment;
$id = $appointment->id;
@endphp
    <section class="doctor-patinet-appointment pt-5">
        <div class="header">
            <div class="row sticky-top mx-0 px-4 w-100 align-items-center">
                <div class="col-1 position-absolute">
                    <a href="{{route('doctor.appointment.patient',$id)}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32" fill="none">
                            <path
                                d="M12.7599 25.0934C12.5066 25.0934 12.2533 25 12.0533 24.8L3.95992 16.7067C3.57326 16.32 3.57326 15.68 3.95992 15.2934L12.0533 7.20003C12.4399 6.81337 13.0799 6.81337 13.4666 7.20003C13.8533 7.5867 13.8533 8.2267 13.4666 8.61337L6.07992 16L13.4666 23.3867C13.8533 23.7734 13.8533 24.4134 13.4666 24.8C13.2799 25 13.0133 25.0934 12.7599 25.0934Z"
                                fill="#344054" />
                            <path
                                d="M27.3336 17H4.89355C4.34689 17 3.89355 16.5467 3.89355 16C3.89355 15.4533 4.34689 15 4.89355 15H27.3336C27.8802 15 28.3336 15.4533 28.3336 16C28.3336 16.5467 27.8802 17 27.3336 17Z"
                                fill="#344054" />
                        </svg>
                    </a>
                </div>
                <div class="col-11 text-center">
                    <h2 class="mb-0">Investigation Reports</h2>
                </div>
            </div>
        </div>
        <div class="py-5 mb-5">
            <div class="py-4"></div>
        </div>
        <div class="doc-pat-upload-report">
            <h3 class="">Upload Report</h3>
            <div class="row py-3">
                <div class="col-12">
                    <form action="{{ route('doctor.appointment.patient.reports.post', ['appoinment' => $appoinment->id, 'patient' => $user->patient->id]) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col form-fld">
                                <input type="text"
                                    class="form-control @error('report_name') {{ 'error' }} @enderror"
                                    placeholder="Report Name" id="insReportName" name="report_name"
                                    value="{{ old('report_name') }}">
                            </div>
                            <div class="col form-fld">
                                <div class="mb-3">
                                    <input class="form-control" type="date" id="insFilerepordate" name="report_date"
                                        value="{{ old('report_date') }}">
                                    @error('report_date')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col form-fld">
                                <div class="mb-3 selec-file">
                                    <label for="insFilereportUpload" class="form-label btn-select-file">select File</label>
                                    <input class="form-control" type="file" name="report_image" id="insFilereportUpload"
                                        accept="image/png, image/jpeg" placeholder="Select file">
                                    @error('report_image')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <input type="hidden" name="patientid" value="{{ $patientid }}">
                            <div class="col form-fld">
                                <div class="mb-3 ">
                                    <input class="btn btn-primary w-100" style="background: #8A4FBA;" type="submit"
                                        value="upload">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--  Reports --}}
            <div class="reports-gallery py-4">
                <div class="row mx-0 justify-content-between align-items-center">
                    <div class="col">
                        <h3 class="mb-5">Reports</h3>
                    </div>
                    <div class="col">
                        <div class="row mx-0 justify-content-end align-items-center">
                            <div class="med-search-container col-8 col-md-8 d-none ">
                                <form method="GET" id="searchForm">
                                    <div class="med-search rounded-2">
                                        <div class="search-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15"
                                                viewBox="0 0 15 15" fill="none">
                                                <path
                                                    d="M13.6667 13.6667L10.676 10.6707M12.3333 6.66667C12.3333 8.16956 11.7363 9.6109 10.6736 10.6736C9.6109 11.7363 8.16956 12.3333 6.66667 12.3333C5.16377 12.3333 3.72243 11.7363 2.65973 10.6736C1.59702 9.6109 1 8.16956 1 6.66667C1 5.16377 1.59702 3.72243 2.65973 2.65973C3.72243 1.59702 5.16377 1 6.66667 1C8.16956 1 9.6109 1.59702 10.6736 2.65973C11.7363 3.72243 12.3333 5.16377 12.3333 6.66667Z"
                                                    stroke="#7B7A7C" stroke-linecap="round"></path>
                                            </svg>
                                        </div>
                                        <div class="search-field-wrap w-100">
                                            <input type="search" name="search" placeholder="Search by name, item code"
                                                id="filterpharmaMedicine" class="form-control">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="sort-medicine col-4 col-md-4"> -->
                            <div class="sort-medicine col">
                                <div class="btn-group float-end">
                                    <button type="button" class="baby-secondary-btn border-1 dropdown-toggle"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="pe-2"><svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 20 20" fill="none">
                                                <path d="M5 10H15M2.5 5H17.5M7.5 15H12.5" stroke="#344054"
                                                    stroke-width="1.67" stroke-linecap="round" stroke-linejoin="round">
                                                </path>
                                            </svg></span>
                                        Sort
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#" onclick="reportlist('name','asc','<?php echo $patientid; ?>')">Name A to Z</a></li>
                            <li><a class="dropdown-item" href="#" onclick="reportlist('name','desc','<?php echo $patientid; ?>')">Name Z to A</a></li>
                            <li><a class="dropdown-item" href="#" onclick="reportlist('date','asc','<?php echo $patientid; ?>')">Date Oldest to Newest</a></li>
                            <li><a class="dropdown-item" href="#" onclick="reportlist('date','desc','<?php echo $patientid; ?>')">Date Newest to Oldest</a></li>
                       </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-3 my-3 reps">

                    @foreach ($get_reports as $key => $getreports)
                        <!-- single report -->
                        <div class="col-6 col-md-4 col-lg-3 p-3">
                            <div class="report">
                                <div class="report-thumbnail p-3">
                                    {{-- <span class="trigger-close">x</span> --}}
                                    {{-- <span class="trigger-modal">View</span> --}}
                                    {{-- <span class="trigger-modal">View</span> --}}
                                    <button type="button" class="trigger-modal border-0 outline-none"
                                        data-bs-toggle="modal" data-bs-target="#reportenlarge">
                                        View
                                    </button>
                                    <img src="{{ url($getreports->report_path) }}" alt="{{ $getreports->report_name }}">
                                </div>
                                <div class="report-info p-3">
                                    <div class="info">
                                        <p class="r-name mb-1">{{ $getreports->report_name }}</p>
                                        <p class="text-muted r-date mb-0">
                                            {{ helperParseDate(
                                                $getreports->report_date,
                                                'Y-m-d',
                                                'd M Y',
                                            ) }}
                                        </p>
                                    </div>
                                    <div class="actions">
                                        <div class="dropdown dropstart">  {{-- dropup dropup-center  --}}
                                            <button class="btn btn-light p-0 rounded-0 bg-transparent dropdown-toggl"
                                                type="button" data-bs-toggle="dropdown" aria-expanded="false" >
                                                <svg width="16px" height="16px" viewBox="0 0 16.00 16.00"
                                                    xmlns="http://www.w3.org/2000/svg" fill="#A1A5B7"
                                                    class="bi bi-three-dots-vertical" stroke="none">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                        stroke-linejoin="round"></g>
                                                    <g id="SVGRepo_iconCarrier">
                                                        <path
                                                            d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z">
                                                        </path>
                                                    </g>
                                                </svg>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><button class="dropdown-item" type="button" data-bs-toggle="modal" data-bs-target="#reporEdit">Edit</button></li>
                                                <li><button class="dropdown-item report_class" type="button" data-bs-toggle="modal" data-bs-target="#reporDelete" data-id="{{ $getreports->id }}" onclick="functionToExecute({{ $getreports->id }})">Delete</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Light Box Report --}}
            <div class="modal img-light-box fade" id="reportenlarge" tabindex="-1" aria-labelledby="reportenlargeLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-xl modal-fullscreen-md-down">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="reportenlargeLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body image-enlarged">
                            <img class="w-100" src="" alt="">
                        </div>
                        {{-- <div class="modal-footer d-none">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary">Save changes</button>
                    </div> --}}
                    </div>
                </div>
            </div>

            {{-- Update Report --}}
            <div class="modal fade" id="reporEdit" tabindex="-1" aria-labelledby="reporEditLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="reporEditLabel">Modal title</h1>
                                <button type="reset" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body row justify-content-evenly mx-0">
                                <div class="col-12 col-md-7 mb-3">
                                    <label for="reportName">Report Name</label>
                                    <input type="text" class="form-control mt-2" id="reportName" placeholder="Update Report Name">
                                  </div>
                                  <div class="col-12 col-md-5">
                                    <label for="reportDate">Report Date</label>
                                    <input type="date" class="form-control mt-2" id="reportDate">
                                  </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset" class="baby-secondary-btn border-1 text-center" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="baby-primary-btn">Save changes</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            {{-- Delete Report --}}
            <div class="modal fade" id="reporDelete" tabindex="-1" aria-labelledby="reporDeleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h2 class="modal-title fs-5" id="reporDeleteLabel">Delete Report</h2>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you sure to delete Report?
                            </div>
                            <input type="hidden" value="" id="del_report" />
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <button type="button" class="btn btn-danger"  onclick="deleteReport();">Delete</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script type="text/javascript">

    function reportlist(type, searchValue, pid) {

        var p_id = pid;

        var actionUrl = "{{ route('doctor.patient.search.report', ':p_id') }}";
        actionUrl = actionUrl.replace(':p_id', p_id);

        // alert(actionUrl);
        $.ajax({
            url: actionUrl,
            method: 'GET',
            dataType: 'json',
            data: {
                type: type,
                search: searchValue
            },
            success: function(response) {
                // console.log(response.data);
                $('.reps').html(response.data);
            },
            error: function(error) {
                // console.error('Error fetching data:', error);
            }
        });
    }

    function deleteReport() {
        document.getElementById("reporDelete").style.display = 'none';

        var delid = document.getElementById("del_report").value;
        var actionUrl = "{{ route('doctor.delete.reports') }}" + "?delid=" + delid;
            jQuery.ajax({
                url: actionUrl,
                type: 'GET',
                dataType: 'json', // added data type
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                  //  $('#reporDelete').modal('hide');
                  //$("#reporDelete").hide();
                    // $('#reporDelete').modal('toggle');
                    alert("Record deleted successfully");
                    window.location.reload();

                    //alert("Record deleted successfully");
                    //$("#mydiv").load(location.href + " #mydiv");
                    //window.location.reload();

                }
            });

    }

function functionToExecute(report_id){
    $("#del_report").val(report_id);
    //alert(report_id);
}
</script>
