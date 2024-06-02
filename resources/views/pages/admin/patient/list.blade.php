<x-base-layout>
	

	<section >
    	<div class="container">
    		<a class="btn btn-primary" href="{{route('admin.patients.create')}}">Add New </a>
        	<div class="row">

        		{{-- <table class="table table-bordered  table-hover mt-3 table-striped border"  id="kt_datatable"> 
			        <thead>
			          <tr>
			            <th scope="col" class="text-center">#</th>
			            <th scope="col">Name</th>
			            <th scope="col">UMR.NO</th>
			            <th scope="col">DOB</th>
			            <th scope="col">Action</th>
			          </tr>
			        </thead>
			        <tbody>
			        	@php $inc=1; @endphp
			        	@foreach ($data as $key => $patient) 
			        		<tr >
			        			<td class="text-center">{{$inc}}</td>
			        			<td>{{$patient->first_name.' '.$patient->last_name}}</td>
			        			<td>{{$patient->umr_no}}</td>
			        			<td>{{$patient->d_o_b}}</td>
			        			<td>
			        				<a class="btn btn-sm btn-danger" href="{{route('admin.patients.update',$patient->id)}}">Edit</a>
			        			</td>
			        		</tr>
			        		@php $inc++; @endphp
			        	@endforeach  
			        </tbody>
			    </table> --}}
        	</div>
        </div>
    </section>
    <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <livewire:users/> --}}
	 <livewire:patient-table/>
    </div>
</x-base-layout>