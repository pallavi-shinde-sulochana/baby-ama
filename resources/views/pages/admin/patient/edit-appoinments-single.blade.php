<x-base-layout>

	<style>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
		.patient-info {
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
		width: 10px; /* Adjust width as needed */
		}
	</style>

	@php
	
	 $data = $appointment;
	@endphp
		<section >
			<div class="container">
	
				<div class="row ">
					<div class="col-md-12 row">
						<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
							<div class="card-body py-3 px-5">
								<div class="row p-2">
									<div class="col-md-12 text-center">
										<h3>Appoinment Details</h3>
                                    </div>

										<div class="col-md-4">
											<div class="patient-info">
												@if($appointment->first_name)
												<p>
													<span><b>Name</b></span>
													<span class="separator">-</span>
													<span>{{$appointment->first_name}}</span>
												</p>
												@endif
												@if($appointment->appoinment_date)
												<p>
													<span><b>Appoinment Date & Session</b></span>
													<span class="separator">-</span>
													<span>{{$appointment->appoinment_date}} / {{ucfirst($appointment->appoinment_session)}}</span>
												</p>
												@endif
											</div>
										</div>
		
										<div class="col-md-4">
											<div class="patient-info">
												@if($appointment->specialists)
												<p>
													<span><b>Need to see</b></span>
													<span class="separator">-</span>
													<span>{{$appointment->specialists}}</span>
												</p>
												@endif
												@if($appointment->description)
												<p>
													<span><b>Description</b></span>
													<span class="separator">-</span>
													<span>{{$appointment->description}}</span>
												</p>
												@endif
											</div>
										</div>
									 
								 {{-- 	<div class="col-md-12 text-center">
										  <a  href="{{route('admin.patients.update',$appointment->id)}}" class="btn btn-info btn-sm">Edit Appoinment Detail</a>
									 </div> --}}
								</div>
									<form class="row g-3" action="{{route('admin.patients.alter.appointment',$data->id)}}"  method="POST">
								<div class="row">
										@csrf
									<div class="col-md-6">
										 <label for="first_name" class="form-label">Appoinment Date <span class="text-danger">*</span></label>
										 <input type="text"  class="form-control datePicker" id="kt_date" name="appoinment_date" placeholder="Enter Baby's first name"  value="{{isset($data->appoinment_date) ? $data->appoinment_date : old('appoinment_date')}}" >
	
										@if($errors->has('appoinment_date'))
											<span class="text-danger">{{ $errors->first('appoinment_date') }}</span>
										@endif
									 </div>
									 <div class="col-md-6">
										 <label for="first_name" class="form-label">Appoinment Session <span class="text-danger">*</span></label>
										 <select class="form-control"  name="appoinment_session" id="appoinment_session">
											 <option value="morning" @if($data->appoinment_session=='morning') {{'selected'}} @endif>Morning</option>
											 <option value="afternoon"  @if($data->appoinment_session=='afternoon') {{'selected'}} @endif>Afternoon</option>
											 <option value="evening" @if($data->appoinment_session=='evening') {{'selected'}} @endif>Evening</option>
										 </select>
									 </div>
								</div>
								<div class="row">
									<div class="col-md-6">
										 <label for="description" class="form-label">Description</label>
										 <textarea class="form-control"  id="description" name="description" placeholder="Description" >{{isset($data->description) ? $data->description : old('description')}}</textarea>
	
	
										@if($errors->has('description'))
											<span class="text-danger">{{ $errors->first('description') }}</span>
										@endif
									 </div>
									 <div class="col-md-6">
										 <label for="first_name" class="form-label">Appoinment Time <span class="text-danger">*</span></label>
										  <input type="text"  class="form-control" name="appoinment_time" placeholder="Enter time like 1.0 pm , 10 a.m etc "  value="{{isset($data->appoinment_time) ? $data->appoinment_time : old('appoinment_time')}}" >
										  <br>
										  <label for="first_name" class="form-label">Status</label>
										 <select class="form-control"  name="status" id="status">
											 <option value="awaiting" @if($data->status=='awaiting') {{'selected'}} @endif>Awaiting</option>
											 <option value="assigned" @if($data->status=='assigned') {{'selected'}} @endif>Assigned</option>
											 <option value="completed" @if($data->status=='completed') {{'selected'}} @endif>Completed</option>
											 <option value="missed" @if($data->status=='missed') {{'selected'}} @endif>Missed</option>
											 <option value="cancelled" @if($data->status=='cancelled') {{'selected'}} @endif>Cancelled</option>
	
										 </select>
									 </div>
								</div>
	
	
	
								<div class="row p-5">
									{{-- <div class="col-md-12 text-center">
										<a  class="btn btn-secondary" href="{{route('admin.patients.get.appointment',$data->id)}}">Back</a>
									</div> --}}
									<div class="col-md-12 p-5 mt-5">
										<a href="{{route('admin.patients.get.appointment',$data->id)}}" class="btn btn-danger btn-sm ms-2" >Back</a>
										<button class="btn btn-primary btn-sm ms-2" type="submit">Save</button>
									</div>
								</div>
								</form>
						</div>
					</div>
	
				</div>
			</div>
		</section>
	   <div class="p-6 bg-white border-b border-gray-200">
	
		 {{-- <livewire:appoinment-table/> --}}
		</div>
	
	
	
	</x-base-layout>
	