<x-base-layout>

@php

 $data = $appointment;
@endphp
	<section>
    	<div class="container">

        	<div class="row ">
        		<div class="col-md-12 row">
        			<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                		<div class="card-body py-3 px-5">
                			<div class="row p-5">
		        				<div class="col-md-12 text-center pb-5">
		        					<h3>Creating Appoinment For -  {{$patient->first_name.' '.$patient->last_name}}</h3>

		        				</div>
                                     @if($patient->father_name || $patient->mother_name || $patient->address || $patient->father_phone ||
                                    $patient->mother_phone || $patient->gender || $patient->age)
                                    <div class="col-md-4">
                                        <div class="patient-info">
                                            @if($patient->father_name)
                                            <p>
                                                <span><b>Father Name</b></span>
                                                <span class="separator">-</span>
                                                <span>{{$patient->father_name}}</span>
                                            </p>
                                            @endif
                                            @if($patient->mother_name)
                                            <p>
                                                <span><b>Mother Name</b></span>
                                                <span class="separator">-</span>
                                                <span>{{$patient->mother_name}}</span>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="patient-info">
                                            @if($patient->address)
                                            <p>
                                                <span><b>Address</b></span>
                                                <span class="separator">-</span>
                                                <span>{{$patient->address}}</span>
                                            </p>
                                            @endif
                                            @if($patient->father_phone)
                                            <p>
                                                <span><b>Primary Contact</b></span>
                                                <span class="separator">-</span>
                                                <span>{{$patient->father_phone}}</span>
                                            </p>
                                            @endif
                                            @if($patient->mother_phone)
                                            <p>
                                                <span><b>Secondary Contact</b></span>
                                                <span class="separator">-</span>
                                                <span>{{$patient->mother_phone}}</span>
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
                                            @if($patient->age)
                                            <p>
                                                <span><b>Age</b></span>
                                                <span class="separator">-</span>
                                                <span>{{$patient->age}}</span>
                                            </p>
                                            @endif
                                        </div>
                                    </div>
                                    @endif
		        			</div>

			               <form class="row g-3" action="{{route('admin.patient.create.store.appointment',$patient->id)}}"  method="POST">
		                	<div class="row">
	                    			@csrf

	                    		<div class="col-md-6">
                        	 		<label for="first_name" class="form-label">Appoinment Date <span class="text-danger">*</span></label>
                        	 		<input type="text"  class="form-control datePicker" id="kt_date" name="appoinment_date" placeholder="Date of the appoinment"  value="{{isset($data->appoinment_date) ? $data->appoinment_date : old('appoinment_date')}}" >

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
		                	<div class="row pt-5">
		                		<div class="col-md-6">
		                			<label for="first_name" class="form-label">Specialists </label>
                        	 		<input type="text"  class="form-control " id="kt_date" name="specialists" placeholder="Which Specialists to you wants to meet"  value="{{isset($data->specialists) ? $data->specialists : old('specialists')}}" >

		                            @if($errors->has('specialists'))
		                                <span class="text-danger">{{ $errors->first('specialists') }}</span>
		                            @endif


                        	 	</div>
                        	 	<div class="col-md-6">
                        	 		<label for="first_name" class="form-label">Select Doctor <span class="text-danger">*</span></label>
                        	 		<select class="form-select" name="assign_doctor" id="assign_doctor" required>
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

                                        // echo $specialist;
                                        }
		                			 @endphp
		                			 <option {{$sellected}} value="{{$value->id}}">{{$name.' - '.$specialist}}</option>
		                			 @endforeach
		                			 </select>
                        	 	</div>
		                	</div>



		                	<div class="row pt-5">
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
								</div>
		                	</div>



		                	<div class="row p-5">
		                		{{-- <div class="col-md-12 text-center">
		                			<a  class="btn btn-secondary" href="{{route('admin.patients.get.appointment',$data->id)}}">Back</a>
		                		</div> --}}
		                		<div class="col-md-12 p-5 mt-5">
		                            {{-- <a href="{{route('admin.patients.get.appointment',$data->id)}}" class="btn btn-danger btn-sm ms-2" >Back</a> --}}
									<a href="{{route('admin.patients.list')}}" class="btn btn-secondary btn-sm ms-2" >Back</a>
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
