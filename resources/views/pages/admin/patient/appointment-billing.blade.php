<x-base-layout>

	<section >
    	<div class="container">
    		
        	<div class="row ">
        		<div class="col-md-12 row">
        			<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                		<div class="card-body py-3 px-5">
		        			<div class="row p-2">
		        				<div class="col-md-12 text-center mb-3">
		        					<h3>Appoinment Details</h3>

		        				</div>
		                	 	<div class="col-md-3">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Name - <b> {{$appointment->first_name}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-3">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Need to see - <b> {{$appointment->specialists}}</b>
		                	 		</p>
		                	 			 
		                	 	</div>
		                	 	<div class="col-md-6">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Appoinment Date & Session - <b> {{$appointment->appoinment_date}} / {{$appointment->appoinment_session}}</b> 
		                	 		</p>
		                	 		
		                	 			 
		                	 	</div>
		                	 	<div class="col-md-3">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Phone - <b> {{$appointment->phone}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-5">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Description - <b> {{$appointment->description}}</b>
		                	 		</p>
		                	 	</div>
		                	</div>
		                	<hr>
		                	<div class="row p-2">
		        				<div class="col-md-12 text-center">
		        					<h3>Patient Details</h3>
		        				</div>
		        				@if($appointment->user->patient)
		        				 @php
		        				 	$patient = $appointment->user->patient;
		        				 @endphp
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			First Name - <b> {{$patient->first_name}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Last Name - <b> {{$patient->last_name}}</b>
		                	 		</p>
		                	 			 
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			UMR NO  - <b> {{$patient->umr_no}}</b> 
		                	 		</p>
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			OP NO -  <b> {{$patient->op_no}}</b>
		                	 		</p>
		                	 			 
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Father name - <b> {{$patient->father_name}}</b>
		                	 			<br>
		                	 			Occupation - <b>{{$patient->father_occupation}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Mother Name - <b> {{$patient->mother_name}}</b>
		                	 			<br>
		                	 			Occupation - <b>{{$patient->mother_occupation}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Gender / Age - <b> {{$patient->gender}} / {{$patient->age}}</b>
		                	 			<br>
		                	 			
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			D O B - <b>{{$patient->d_o_b}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Blood Group - <b>{{$patient->blood_group}}</b>
		                	 		</p>
		                	 	</div>

		                	 	{{-- <div class="col-md-12 text-center">
		                	 		 <a  target="_blank" href="{{route('admin.patients.update',$patient->id)}}" class="btn btn-info btn-sm">Edit Patient Detail</a>
		                	 	</div> --}}
		                	 	@endif
		                	</div>
		                	<hr/>
		                	<div class="row p-2">
		                		<div class="col-md-12 text-center">
		        					<h3>Fees Details</h3>
		        				</div>
		        				<div class="col-12">
		        					<form method="POST" action="{{route('admin.patients.appointments.billing.save')}}">
		        						@csrf
		        						<input type="hidden" name="appoinment_id" value="{{$appointment->id}}">
		        						<div class="row">
		        							<div class="col-md-6">
					        					<label for="doctor_fee" class="form-label">Doctor Fee</label>
											    <input type="text" class="form-control" id="doctor_fee" name="doctor_fee" value="{{old('doctor_fee', $appointment->doctor_fee)}}">
					        				</div>
					        				<div class="col-md-6">
					        					<label for="consultant_fee" class="form-label">Consultant Fee</label>
											    <input type="text" class="form-control" id="consultant_fee" name="consultant_fee" value="{{old('consultant_fee', $appointment->consultant_fee)}}">
					        				</div>
					        				<div class="col-12">
					        					<label for="notes" class="form-label">Notes</label>
												<textarea class="form-control" id="notes" rows="3" name="notes">{{old('notes', $appointment->notes)}}</textarea>
					        				</div>
					        				<div class="col-12 mt-5">
					        					<button type="submit" class="btn btn-primary">Save</button>
					        				</div>
		        						</div>
		        					</form>
		        				</div>
		        				
		                	</div>
		                	<hr/>
		                	<div class="row p-5">
		                		<div class="col-md-12 text-center">
		                			<a  class="btn btn-secondary" href="{{route('admin.patients.appointments')}}">Back</a>
		                			<a  class="btn btn-danger ms-2" href="{{route('admin.print.appointment.billing',['appoinment' => $appointment->id])}}" target="_blank">Print Appointment</a>
		                		</div>
		                	</div>
		                </div>
		            </div>
        		</div>
			    
        	</div>
        </div>
    </section>
   <div class="p-6 bg-white border-b border-gray-200">
                    
	 {{-- <livewire:appoinment-table/> --}}
    </div>


    
</x-base-layout>
