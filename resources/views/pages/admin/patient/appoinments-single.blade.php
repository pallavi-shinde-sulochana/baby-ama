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
	<section >
    	<div class="container">
    		
        	<div class="row ">
        		<div class="col-md-12 row">
        			<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                		<div class="card-body py-3 px-5">
		        			<div class="row p-2">
		        				{{-- <div class="col-md-12">
		        				    @if($appointment->doctor_id && $appointment->status!=1)
		        						<button  class="btn btn-success float-end">DOCTOR ASSIGNED</button>
		        					<br>
		        					@elseif($appointment->doctor_id && $appointment->status==1)
		        						<button  class="btn btn-danger float-end">APPOINTMENT CLOSED</button>
		        					@endif
		        				</div> --}}
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
										@if($appointment->appoinment_time)
										<p>
											<span><b>Appoinment Time</b></span>
											<span class="separator">-</span>
											<span>{{$appointment->appoinment_time}}</span>
										</p>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="patient-info">
										@if($appointment->phone)
										<p>
											<span><b>Phone</b></span>
											<span class="separator">-</span>
											<span>{{$appointment->phone}}</span>
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
                                
		                	 	<div class="col-md-12 text-center">
		                	 		 {{-- <a  href="{{route('admin.patients.edit.appointment',$appointment->id)}}" class="btn btn-info btn-sm">Edit Appoinment Detail</a> &emsp;&emsp; --}}
		                	 		 {{-- @if($appointment->status==0 || $appointment->status==1)
		                	 		 <a  href="{{route('admin.patients.decline.appointment',[$appointment->id,'decline'])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to Decline?')">Decline Appoinment</a>
		                	 		 @else
		                	 		  <a  href="{{route('admin.patients.decline.appointment',[$appointment->id,'enable'])}}" class="btn btn-warning btn-sm">Enable Appoinment</a>
		                	 		 @endif --}}
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
									<div class="patient-info">
										@if($patient->first_name)
										<p>
											<span><b>First Name</b></span>
											<span class="separator">-</span>
											<span>{{$patient->first_name}}</span>
										</p>
										@endif
										@if($patient->op_no)
										<p>
											<span><b>OP NO</b></span>
											<span class="separator">-</span>
											<span>{{$patient->op_no}}</span>
										</p>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="patient-info">
										@if($patient->last_name)
										<p>
											<span><b>Last Name</b></span>
											<span class="separator">-</span>
											<span>{{$patient->last_name}}</span>
										</p>
										@endif
										@if($patient->father_name)
										<p>
											<span><b>Father Name</b></span>
											<span class="separator">-</span>
											<span>{{$patient->father_name}}</span>
										</p>
										@endif
										@if($patient->father_occupation)
										<p>
											<span><b>Occupation</b></span>
											<span class="separator">-</span>
											<span>{{$patient->father_occupation}}</span>
										</p>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="patient-info">
										@if($patient->umr_no)
										<p>
											<span><b>UMR NO</b></span>
											<span class="separator">-</span>
											<span>{{$patient->umr_no}}</span>
										</p>
										@endif
										@if($patient->mother_name)
										<p>
											<span><b>Mother Name</b></span>
											<span class="separator">-</span>
											<span>{{$patient->mother_name}}</span>
										</p>
										@endif
										@if($patient->mother_occupation)
										<p>
											<span><b>Occupation</b></span>
											<span class="separator">-</span>
											<span>{{$patient->mother_occupation}}</span>
										</p>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="patient-info">
										@if($patient->gender)
										<p>
											<span><b>Gender</b></span>
											<span class="separator">-</span>
											<span>{{$patient->gender}}</span>
										</p>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="patient-info">
										@if($patient->d_o_b)
										<p>
											<span><b>D O B</b></span>
											<span class="separator">-</span>
											<span>{{$patient->d_o_b}}</span>
										</p>
										@endif
									</div>
								</div>

								<div class="col-md-4">
									<div class="patient-info">
										@if($patient->blood_group)
										<p>
											<span><b>Blood Group</b></span>
											<span class="separator">-</span>
											<span>{{$patient->blood_group}}</span>
										</p>
										@endif
									</div>
								</div>

		                	 	{{-- <div class="col-md-12 text-center">
		                	 		 <a  target="_blank" href="{{route('admin.patients.update',$patient->id)}}" class="btn btn-info btn-sm">Edit Patient Detail</a>
		                	 	</div> --}}
		                	 	@endif
		                	</div>
		                	<hr>
		                	<div class="row py-5">
		                		<div class="col-md-12 text-center">
		                			<h3>Assign Doctor to this Appointment</h3>
		                			
		                		</div>
		                		<div class="col-md-6">
		                			<form action="{{route('admin.patients.assign.doctor')}}"  method="POST">
		                				@csrf
		                				<input type="hidden" name="id" value="{{$appointment->id}}">
		                			<select class="form-select" name="assign_doctor" id="assign_doctor" required title="Please select a Doctor" oninvalid="this.setCustomValidity('Please select a Doctor')"
 															oninput="setCustomValidity('')">
		                				<option value="">Choose Doctor</option>
		                				
		                			 @foreach($doctors as $key => $value)
		                			 @php
		                			  $sellected = ($value->id==$appointment->doctor_id) ? 'selected' : '';
                                        $name = $value->first_name .$value->last_name;
                                        $specialist='';
                                         // echo json_encode($value->info->specialist_type);
                                        

                                        if($value->info->specialist_type){



                                        $specialist = json_decode($value->info->specialist_type);

                                         try{

				                            // $specialist = implode(',',$specialist);
				                            }catch(Exception $e){
				                                $specialist=$specialist;
				                            }

                                        // $specialist = implode(', ',$specialist);

                                        // echo $specialist;
                                        }
		                			 @endphp
		                			 <option {{$sellected}} value="{{$value->id}}">{{$name.' - '.$specialist}}</option>
		                			 @endforeach
		                			 </select>
		                			
		                		</div>
		                		<div class="col-md-6">
		                			 <button class="btn btn-primary" type="submit">Assign</button> &emsp;
		                			 
		                		</div>
		                			</form>
		                	</div>
		                	<div class="row p-5">
								
		                		<div class="col-md-12 ">
									
		                			<a  class="btn btn-secondary" href="{{route('admin.patients.appointments')}}">Back</a>&emsp;
		      
									<a  href="{{route('admin.patients.edit.appointment',$appointment->id)}}" class="btn btn-info btn-sm">Edit Appoinment Detail</a> &emsp;
		                	 		 <a  target="_blank" href="{{route('admin.patients.update',$patient->id)}}" class="btn btn-info btn-sm">Edit Patient Detail</a>
                                    

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
