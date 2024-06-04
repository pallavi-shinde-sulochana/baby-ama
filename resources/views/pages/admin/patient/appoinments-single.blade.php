<x-base-layout>
	

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
                                
								<div class="row p-2">
									@if(!empty($appointment->first_name))
                                    <div class="col-md-4">
										<p for="first_name" class=" font-weight-normal">
											Name - <b> {{$appointment->first_name}}</b>
										</p>
									</div>
									@endif

									@if(!empty($appointment->specialists))
									<div class="col-md-4">
										<p for="first_name" class=" font-weight-normal">
											Need to see - <b> {{ucfirst($appointment->specialists)}}</b>
										</p>
									</div>
									@endif

									@if(!empty($appointment->phone))
									<div class="col-md-4">
										<p for="first_name" class=" font-weight-normal">
											Phone - <b> {{$appointment->phone}}</b>
										</p>
										{{-- <p for="first_name" class=" font-weight-normal">
											Appointment Time - <b> {{$appointment->appoinment_time}}</b> 
										</p>  --}}
									</div>
									@endif

                                    @if(!empty($appointment->appoinment_date))
									<div class="col-md-4">
										<p for="first_name" class=" font-weight-normal">
											Appoinment Date & Session - <b> {{$appointment->appoinment_date}} / {{ucfirst($appointment->appoinment_session)}}</b> 
										</p>
									</div>
									@endif

                                    @if(!empty($appointment->appoinment_time))
									<div class="col-md-4">
									<p for="first_name" class=" font-weight-normal">
										Appointment Time - <b> {{$appointment->appoinment_time}}</b> 
									</p>
									</div>
									@endif

									@if(!empty($appointment->description))
									<div class="col-md-4">
										<p for="first_name" class=" font-weight-normal">
											Description - <b> {{$appointment->description}}</b>
										</p>
									</div>
									@endif

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

                                @if(!empty($patient->first_name))
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			First Name - <b> {{$patient->first_name}}</b>
		                	 		</p>
		                	 	</div>
								@endif

								@if(!empty($patient->last_name))
		                	 	<div class="col-md-4">
		                	 		<p for="last_name" class=" font-weight-normal">
		                	 			Last Name - <b> {{$patient->last_name}}</b>
		                	 		</p>
		                	 	</div>
								@endif

								@if(!empty($patient->umr_no))
		                	 	<div class="col-md-4">
		                	 		<p for="umr_no" class=" font-weight-normal">
		                	 			UMR NO  - <b> {{$patient->umr_no}}</b> 
		                	 		</p>
		                	 	</div>
								@endif

								@if(!empty($patient->op_no))
		                	 	<div class="col-md-4">
		                	 		<p for="op_no" class=" font-weight-normal">
		                	 			OP NO -  <b> {{$patient->op_no}}</b>
		                	 		</p>
		                	 	</div>
								@endif

								@if(!empty($patient->father_name))
								<div class="col-md-4">
		                	 		<p for="father_name" class=" font-weight-normal">
		                	 			Father name - <b> {{$patient->father_name}}</b>
		                	 			<br>
		                	 			Occupation - <b>{{$patient->father_occupation}}</b>
		                	 		</p>
		                	 	</div>
								@endif

                                @if(!empty($patient->mother_name))
		                	 	<div class="col-md-4">
		                	 		<p for="mother_name" class=" font-weight-normal">
		                	 			Mother Name - <b> {{$patient->mother_name}}</b>
		                	 			<br>
		                	 			Occupation - <b>{{$patient->mother_occupation}}</b>
		                	 		</p>
		                	 	</div>
								@endif

								@if(!empty($patient->gender))
		                	 	<div class="col-md-4">
		                	 		<p for="first_name" class=" font-weight-normal">
		                	 			Gender / Age - <b> {{ucfirst($patient->gender)}} / {{$patient->age}}</b>
		                	 			<br>
		                	 		</p>
		                	 	</div>
								@endif

								@if(!empty($patient->d_o_b))
		                	 	<div class="col-md-4">
		                	 		<p for="d_o_b" class=" font-weight-normal">
		                	 			D O B - <b>{{$patient->d_o_b}}</b>
		                	 		</p>
		                	 	</div>
                                @endif

								@if(!empty($patient->blood_group))
		                	 	<div class="col-md-4">
		                	 		<p for="blood_group" class=" font-weight-normal">
		                	 			Blood Group - <b>{{$patient->blood_group}}</b>
		                	 		</p>
		                	 	</div>
								@endif
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
