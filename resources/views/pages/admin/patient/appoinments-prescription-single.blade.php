<x-base-layout>
	<section>
    	<div class="container">
        	<div class="row ">
        		<div class="col-md-12 row">
        			<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                		<div class="card-body py-3 px-5">
		        			<div class="row p-2">
		        				<div class="col-md-12 d-flex justify-content-end pb-5">
		        				    @if($appointment->doctor_id && $appointment->status!=1)
		        						<button  class="btn btn-success me-2">DOCTOR ASSIGNED</button>
		        					<br>
		        					@elseif($appointment->doctor_id && $appointment->status==1)
		        						<button  class="btn btn-danger me-2">APPOINTMENT CLOSED</button>
		        					@endif

		        					@if($prescription->payment_status === 'paid')
			        					<button  class="btn btn-success me-2">PAID</button>
			        				@else
				        				<button  class="btn btn-danger me-2">NOT YET PAID</button>
			        				@endif

			        				@if($prescription->order_status === 'delivered')
			        					<button  class="btn btn-success me-2">DELIVERED</button>
			        				@else
				        				<button  class="btn btn-danger me-2">NOT YET DELIVERED</button>
			        				@endif
		        				</div>
		        				<div class="col-md-12 text-center">
		        					<h3>Appoinment Details</h3>

		        				</div>
		                	 	<div class="col-md-4">
		                	 		<p class=" font-weight-normal">
		                	 			Name - <b> {{$appointment->first_name}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p class=" font-weight-normal">
		                	 			Need to see - <b> {{$appointment->specialists}}</b>
		                	 		</p>
		                	 			 
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p class=" font-weight-normal">
		                	 			Appoinment Date - <b> {{$appointment->appoinment_date}}</b> 
		                	 		</p>
		                	 		<p class=" font-weight-normal">
		                	 			Appoinment Session -  <b> {{$appointment->appoinment_session}}</b>
		                	 		</p>
		                	 			 
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p class=" font-weight-normal">
		                	 			Phone - <b> {{$appointment->phone}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-4">
		                	 		<p class=" font-weight-normal">
		                	 			Description - <b> {{$appointment->description}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-12 text-center mt-3">
		        					<h3>Prescription Details</h3>

		        				</div>
		        				<div class="col-md-6">
		                	 		<p class=" font-weight-normal">
		                	 			Diagnosis - <b> {{$prescription->diagnosis}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-6">
		                	 		<p class=" font-weight-normal">
		                	 			Follow up advice - <b> {{$prescription->advice}}</b>
		                	 		</p>
		                	 	</div>
		                	 	<div class="col-md-12 text-center mt-3">
	        					  <h3>Prescription Medicine Details</h3>
	        				    </div>
		                	 	@if($prescription->prescriptionMedicine && count($prescription->prescriptionMedicine) > 0)
		        				    <div class="col-md-12">
		        				    	<div class="table-responsive">
											<table class="table">
												<thead>
													<tr class="fw-bold fs-6 text-gray-800">
														<th>No</th>
														<th>Name</th>
														<th>Quantity</th>
														<th>Intake Quantity</th>
														<th>Timing When</th>
														<th>Timing How</th>
														<th>Duration</th>
													</tr>
												</thead>
												<tbody>
													@php
														$index = 1;
													@endphp
													@foreach($prescription->prescriptionMedicine as $medicine)

													@php 
														$medicine_details = getMedcineDetail($medicine->medicine_id);
													@endphp
														<tr>
															<td>{{$index++}}</td>
															<td>{{$medicine_details->name.' '.$medicine_details->dosage}}</td>
															<td>{{$medicine->total_qty}}</td>
															<td>{{$medicine->intake_qty}}</td>
															<td>{{$medicine->timing_when}}</td>
															<td>{{$medicine->timing_how}}</td>
															<td>{{$medicine->duration}}</td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
		        				    </div>
		        				    <div class="row text-center p-5">
		        				    	<a class="btn btn-info" target="_blank" href="{{route('admin.print.appointment.prescription',$appointment->id)}}">Print</a>
		        				    </div>
		                	 	@else
			                	 	<div class="col-md-12">
			                	 		<p class="text-center">No Medicines Found</p>
			                	 	</div>
		                	 	@endif
		                	 	<div class="col-md-12 text-center mt-3">
	        					    <h3>Payment & Delivery</h3>
	        				    </div>
	        				    <div class="col-md-12">
	        				    	<form method="POST" action="{{route('admin.patients.prescription.order-and-payment-update.save')}}">
	        				    		@csrf
	        				    		<div class="row">
	        				    			<input type="hidden" name="prescription_id" value="{{$prescription->id}}">
	        				    			<div class="col-md-6">
			                        	 		<label for="payment_status" class="form-label">Payment Status</label>
			                        	 		<select class="form-select" name="payment_status">
												    <option value="not yet paid" @if($prescription->payment_status === 'not yet paid') selected @endif>Not Yet Paid</option>
												    <option value="paid" @if($prescription->payment_status === 'paid') selected @endif>Paid</option>
												</select>
			                        	 	</div>
			                        	 	<div class="col-md-6">
			                        	 		<label for="order_status" class="form-label">Order Status</label>
			                        	 		<select class="form-select" name="order_status">
												    <option value="not yet delivered" @if($prescription->order_status === 'not yet delivered') selected @endif>Not Yet Delivered</option>
												    <option value="delivered" @if($prescription->order_status === 'delivered') selected @endif>Delivered</option>
												</select>
			                        	 	</div>
			                        	 	<div class="col-md-12 mt-3">
				        				    	@if(isset($prescription->delivered_at))
					        				    	<p class="text-danger">
					        				    		<b>Delivered At : {{\Carbon\Carbon::parse($prescription->delivered_at)->diffForHumans()}}
					        				    		</b>
					        				    	</p>
				        				    	@endif
				        				    </div>
			                        	 	<div class="col-md-12 p-5 mt-5">
			                        	 		<a href="{{route('admin.patients.appointments')}}" class="btn btn-danger btn-sm" >Back</a>
					                            <button class="btn btn-primary btn-sm ms-2" type="submit">Save</button>
					                        </div>
	        				    		</div>
	        				    	</form>
	        				    </div>
		        			</div>
		        		</div>
		        	</div>
		        </div>
		    </div>
		</div>
    </section>
</x-base-layout>