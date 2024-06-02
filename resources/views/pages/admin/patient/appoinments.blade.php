<x-base-layout> 

	<section >
    	<div class="container">
    		{{-- <a class="btn btn-primary" href="{{route('admin.patients.appointments')}}">Add New </a> --}}
    		<div class="row">
    			<div class="mt-2 mb-5 mt-lg-5 mb-lg-10 py-5">
                @can('edit-contractor')
                <!--begin::Button-->
                {{-- <a href="{{ route('notes.create',$contractors->id) }}" class="btn btn-primary font-weight-bolder float-right">
                <i class="la la-plus"></i>Add Notes</a> --}}
                <!--end::Button-->
                @endcan
                {{-- <form method="GET" action="">
                <div class="row align-items-center">
                    <div class="col-lg-9 col-xl-8">
                        <div class="row align-items-center">
                            <div class="col-md-6 my-3 my-md-0">
                                <div class="input-icon">
                                	<label>Search by name</label>
                                    <input type="text" class="form-control" placeholder="Search..." id="kt_datatable_search_query" name="q" value={{request('q')}}>
                                    <span><i class="flaticon2-search-1 text-muted"></i></span>
                                </div>
                            </div>
                            <div class="col-md-6 my-3 my-md-0">
                                <div class="input-icon">
                                	<label>Search by Phone number</label>
                                    <input type="text" class="form-control" placeholder="Search by Phone" id="kt_datatable_search_query_phone" name="phone" value={{request('phone')}}>
                                    <span>
                                    	<i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="col-md-6 my-3">
                                <div class="input-icon">
                                	<label>Search by Appoinment Date</label>
                                    <input type="text" class="form-control datePicker" placeholder="Search by Date" id="kt_date" name="date" value={{request('date')}}>
                                    <span>
                                    	<i class="flaticon2-search-1 text-muted"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-xl-4 mt-5 mt-lg-0">
                        <button type="submit" class="btn btn-info px-6 font-weight-bold">Search</button>
                        <a class="refresh-btn btn btn-light-info px-6 font-weight-bold" href="{{route('admin.patients.appointments')}}">
                            <img src="{{asset('media/icons/duotone/Media/Repeat.svg')}}"> &nbsp;
                                Reset
                            </a>
                    </div>
                </div>
                </form> --}}
            </div>
    		</div>
        	<div class="row table-responsive">
        		{{-- @if($datas->total())
	             Showing Records {{ $datas->firstItem() }} - {{ $datas->lastItem() }} of {{ $datas->total() }} (for page {{ $datas->currentPage() }} )
	            @endif
        		<table class="table table-bordered  table-hover mt-3 table-striped border"  id="kt_datatable">
			        <thead>
			          <tr class="text-center border">
			            <th scope="col">SNo</th>
			            <th scope="col">Need to see</th>
			            <th scope="col">Name</th>
			            <th scope="col">UMR.NO</th>
			            <th scope="col">OP.NO</th>
			            <th scope="col">DOB / Age</th>
			            <th scope="col">Phone</th>
			            <th scope="col">OP DATE</th>
			            <th scope="col">OP Session</th>
			            <th scope="col">Status</th>
			            <th scope="col">Action</th>
			          </tr>
			        </thead>
			        <tbody>
			        	@if(!isset($datas[0]))
			        		<tr class="border">
			        			<td class="text-center" colspan="11">No record(s) found</td>
			        		</tr>
			        	@endif
			        	@php $inc=1; @endphp
			        	@foreach ($datas as $key => $app)
			        		<tr class="border">
			        			<td class="text-center">{{$inc}}</td>
			        			<td class="text-center">{{ucfirst($app->specialists)}}</td>
			        			<td>{{$app->first_name.' '.$app->last_name}}</td>
			        			@if(isset($app->user->patient))
			        			<td>{{$app->user->patient->umr_no}}</td>
			        			<td>{{$app->user->patient->op_no}}</td>
			        			<td>{{$app->user->patient->d_o_b}} / {{$app->user->patient->age}}</td>
			        			<td>{{$app->user->patient->father_phone}}</td>
			        			<td>{{$app->appoinment_date}}</td>
			        			<td>{{$app->appoinment_session}}</td>
			        			<td>
			        				@if($app->doctor_id && $app->status=='assigned')
			        					<button class="btn btn-success btn-sm"> Assigned</button>
			        				@elseif($app->status=='awaiting')
			        					<button class="btn btn-warning btn-sm">Awaiting</button>
                                    @elseif($app->status=='completed')
			        					<button class="btn btn-info btn-sm">Completed</button>
                                    @elseif($app->status=='missed')
			        					<button class="btn btn-secondary btn-sm">Missed</button>
                                    @else
			        					<button class="btn btn-danger btn-sm">Cancelled</button>
			        				@endif
			        			</td>
			        			<td>
			        				<a class="btn btn-sm bg-primary my-3 w-100 text-white" target="_blank" href="{{route('admin.patients.get.appointment',$app->id)}}">View</a>

			        				<a class="btn btn-sm bg-info my-3 w-100 text-white" target="_blank" href="{{route('admin.patients.update',$app->user->patient->id)}}">Goto Patient</a>

			        				@if(isset($app->prescription))
				        				<a class="btn btn-sm bg-warning my-3 w-100 text-white" target="_blank" href="{{route('admin.patients.appointments.prescription',['appointment_id' => $app->id,'prescription_id' => $app->prescription->id])}}">Prescription</a>
			        				@endif

			        				<a class="btn btn-sm bg-success my-3 w-100 text-white" target="_blank" href="{{route('admin.patients.appointments.billing',['appoinment' => $app->id])}}">Billing</a>
			        			</td>
			        			@endif
			        		</tr>
			        		@php $inc++; @endphp
			        	@endforeach
			        </tbody>
			    </table>
			    <div class="row">
			    	<div class="col-md-3">

			    {{$datas->links()}}
			    	</div>
			    </div>
        	</div> --}}
        </div>
    </section>
   <div class="p-6 bg-white border-b border-gray-200">

	 <livewire:appoinment-table/>
    </div>
@section('styles')
    {{-- <link href="{{ asset('plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/> --}}
    <style type="text/css">
    	span.relative.z-0.inline-flex.shadow-sm.rounded-md svg {
		    width: 10px;
		}
		nav.flex.items-center.justify-between .flex.justify-between.flex-1.sm\:hidden {
		    /* top: 99px; */
		    /* position: relative; */
		    display: none;
		}
    </style>
@endsection


</x-base-layout>

<script>





    </script>
