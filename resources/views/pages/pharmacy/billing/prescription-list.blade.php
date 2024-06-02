@extends('base.pharmacy-dashboard')
@section('pharmacy-content')
    {{-- <div class="pharmacy medicine-stacklist baby-border p-5" style="margin-top: 50px;">
        <div class="row mx-0 align-items-center justify-content-between p-4">
            <h1> Prescription List</h1>
            <a href="{{ route('pharmacy.billing.patient.prescription', '20') }}" class="ps-0 inline-block sidebar-link">Patient
                Prescription page</a>
        </div>
    </div> --}}

    <div class="pharmacy medicine-stacklist pt-5" style="margin-top: 50px;">
        {{-- <h2 class="h2 text-primary mb-4">Prescription List</h2> --}}
        <div class="row mx-0 align-items-center justify-content-between">
            <div class="col-12 col-sm-4 col-md-3 col-lg-3 px-0">
                <h3 class="text-baby-v2 font-medium mb-md-0">Prescription List</h3>
            </div>
            <div class="col-12 col-sm-8 col-md-9 col-lg-6">
                <div class="row mx-0 justify-content-end">
                    <div class="med-search-container col-8 col-md-8">
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
                                    <input type="search" name="search" placeholder="Search by name, UMR no."
                                        id="filterpharmaMedicine" class="form-control" onKeyup="patientlist(this.value)">

                                    <!-- <input type="search" name="search" placeholder="search medicine" id="search" class="form-control w-100" /> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="medicine-list px-0">
                <div class="prescription-table py-3">
                    <div class="table-responsive py-3">
                        <table class="table">
                            <thead class="table-light bg-color-v1">
                                <tr>
                                    <th scope="col" class="text-center">S.No</th>
                                    <th scope="col" class="bg-color-v1 p-name">Baby Name</th>
                                    <th scope="col" class="bg-color-v1 text-center">Age</th>
                                    <th scope="col" class="bg-color-v1 text-center">UMR No.</th>
                                    <th scope="col" class="bg-color-v1 text-center">O/P No.</th>
                                    <th scope="col" class="bg-color-v1 text-center">Date</th>
                                    <th scope="col" class="bg-color-v1 text-center action-btn w-100">Action</th>
                                </tr>
                            </thead>
                            <tbody>
        @php $i = 1; @endphp
        @foreach($patients as $key => $details)

                                <tr>
                                    <th scope="row" class="text-center">{{ $i; }}</th>
                                    <td class="">
                                    <span class="patient-avtr">
                                        <?php
                                        if(isset($details->user['first_name'])){
                                            $f = substr($details->user['first_name'],0,1);
                                            $fname = $details->user['first_name'];
                                        }
                                        else
                                        {
                                             $f = '';
                                             $fname = '';
                                        }
                                        if(isset($details->user['last_name'])){
                                            $l = substr($details->user['last_name'],0,1);
                                            $lname = $details->user['last_name'];
                                        }
                                        else
                                        {
                                            $l = '';
                                            $lname = '';
                                        }

                                        ?>

                                    {{  strtoupper($f.$l) }}
                                    </span>
                                    {{  ucfirst($fname).' '.ucfirst($lname) }}



                </td>
                <td class="text-center">
                {{ isset($details->user['age']) ? $details->user['age'] : ""  }}
                </td>
                 <td class="text-center">
                {{ isset($details->user['umr_no']) ? $details->user['umr_no'] : ""  }}
                </td>
                 <td class="text-center">
                {{ isset($details->user['op_no']) ? $details->user['op_no'] : ""  }}
                </td>
                <td class="text-center">{{ date('d-m-Y', strtotime($details->created_at))  }}</td>
                                    <td class="text-center">
                                        <div class="action-btn-group d-flex justify-content-evenly align-items-center">
                            <a class="act-btn warning" href="#"
                           rel="noopener noreferrer" onclick="prescription_declined('<?php echo $details->prescription_id; ?>')">Decline</a>
                                            <a class="act-btn success"
                                                href="{{ route('pharmacy.billing.patient.prescription', $details->prescription_id) }}"
                                                rel="noopener noreferrer">Proceed</a>
                                        </div>

                                        {{-- <button type="button" class="btn border-0 edit-icon" data-bs-toggle="modal"
                                                data-bs-target="#MedProperties_{{ $getmed->prescription_id }}"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="20" height="18"
                                                    viewBox="0 0 25 24" fill="none">
                                                    <path
                                                        d="M16.9882 3.74493C17.2244 3.50876 17.5048 3.32142 17.8133 3.1936C18.1219 3.06579 18.4526 3 18.7866 3C19.1206 3 19.4514 3.06579 19.7599 3.1936C20.0685 3.32142 20.3489 3.50876 20.5851 3.74493C20.8212 3.98111 21.0086 4.26148 21.1364 4.57006C21.2642 4.87863 21.33 5.20936 21.33 5.54336C21.33 5.87736 21.2642 6.20809 21.1364 6.51666C21.0086 6.82524 20.8212 7.10562 20.5851 7.34179L8.44568 19.4812L3.5 20.83L4.84882 15.8843L16.9882 3.74493Z"
                                                        stroke="#667085" stroke-width="1.66667" stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                </svg></button> --}}
                                    </td>
                                </tr>
                                 @php $i++; @endphp
                            @endforeach

                            </tbody>
                        </table>
                    </div>

                    {{ $patients->links('pagination::v1') }}

                </div>

            </div>
        </div>
    </div>
@endsection
<script type="text/javascript">
     function prescription_declined(id) {
        var delid = id;
        var actionUrl = "{{ route('pharmacy.billing.delete.medicine') }}" + "?delid=" + delid;
        if (confirm('Are you sure to declined this record ?')) {
            jQuery.ajax({
                url: actionUrl,
                type: 'GET',
                dataType: 'json', // added data type
                error: function() {
                    alert('Something is wrong');
                },
                success: function(data) {
                    //alert("Record deleted successfully");
                   // $("#mydiv").load(location.href + " #mydiv");
                   location.reload();

                }
            });
        }
    }


       function patientlist(searchValue) {
                var actionUrl = "{{ route('pharmacy.billing.search.patient.prescription') }}";
                $.ajax({
                    url: actionUrl,
                    method: 'GET',
                    dataType: 'json',
                    data: {
                        search: searchValue
                    },
                    success: function(response) {
                        //updateMedItems(response.data);
                        //console.log(response.data);
                        $('tbody').html(response.data);
                    },
                    error: function(error) {

                   location.reload();

                        // console.error('Error fetching data:', error);
                    }
                });
            }

</script>
