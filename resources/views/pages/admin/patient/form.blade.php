<x-base-layout>

	{{-- {{getUMRONo();}} --}}
	{{-- @if($errors->any())
	    {{ implode('', $errors->all('<div>:message</div>')) }}
	@endif --}}
	<section >
    	<div class="container">
        	<div class="row">
        		<div class="col-md-12 row">
        			<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                		<div class="card-body py-3 px-5">
                    		<form class="row g-3" action="{{route('admin.patients.store')}}"  method="POST" onsubmit="return validateForm()">
                    			@csrf
                    			@if(isset($data->id))
                    				<input type="hidden" name="id" value="{{$data->id}}">
                    			@endif
                        	<h1 class="font-size-lg text-dark font-weight-bold mb-6 text-center">
                        		{{-- @if(isset($data->id)){{'Edit'}} @else {{'Create'}}@endif Patient --}}
                        		Patient registration
                        	</h1>
                        	<div class="row p-2">
                        	 	<div class="col-md-6">
                        	 		<label for="first_name" class="form-label">First name <span class="text-danger">*</span></label>
                        	 		<input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter Baby's first name"  value="{{isset($data->first_name) ? $data->first_name : old('first_name')}}" >
		                            @if($errors->has('first_name'))
		                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
		                            @endif
                        	 	</div>
                        	 	<div class="col-md-6">
                        	 		<label for="first_name" class="form-label">Last name </label>
                        	 		<input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Baby's Last Name"  value="{{isset($data->last_name) ? $data->last_name : old('last_name')}}" >
		                            @if($errors->has('last_name'))
		                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
		                            @endif
                        	 	</div>
                        	</div>
                        	<div class="row p-2">
                        	 	<div class="col-md-6">
                        	 		<label for="father_name" class="form-label">Father's name <span class="text-danger">*</span></label>
                        	 		<input type="text" class="form-control" id="father_name" name="father_name" placeholder="Enter Baby's Father's name" value="{{isset($data->father_name) ? $data->father_name : old('father_name')}}" >
		                            @if($errors->has('father_name'))
		                                <span class="text-danger">{{ $errors->first('father_name') }}</span>
		                            @endif
                        	 	</div>
                        	 	<div class="col-md-6">
                        	 		<label for="mother_name" class="form-label">Mother's name </label>
                        	 		<input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="Enter Baby's Mother's Name" value="{{isset($data->mother_name) ? $data->mother_name : old('mother_name')}}" >
		                            @if($errors->has('mother_name'))
		                                <span class="text-danger">{{ $errors->first('mother_name') }}</span>
		                            @endif
                        	 	</div>
                        	</div>
                        	<div class="row p-2">
                        	 	<div class="col-md-6">
                        	 		<label for="father_name" class="form-label">Father's Occupation <span class="text-danger">*</span></label>
                        	 		<input type="text" class="form-control" id="father_occupation" name="father_occupation" placeholder="Driver" value="{{isset($data->father_occupation) ? $data->father_occupation : old('father_occupation')}}" >
		                            @if($errors->has('father_occupation'))
		                                <span class="text-danger">{{ $errors->first('father_occupation') }}</span>
		                            @endif
                        	 	</div>
                        	 	<div class="col-md-6">
                        	 		<label for="mother_occupation" class="form-label">Mother's Occupation </label>
                        	 		<input type="text" class="form-control" id="mother_occupation" name="mother_occupation" placeholder="Home maker" value="{{isset($data->mother_occupation) ? $data->mother_occupation : old('mother_occupation')}}" >
		                            @if($errors->has('mother_occupation'))
		                                <span class="text-danger">{{ $errors->first('mother_occupation') }}</span>
		                            @endif
                        	 	</div>
                        	</div>
                        	<div class="row p-2">
                        	 	<div class="col-md-6">
                        	 		<label for="father_name" class="form-label">Contact Number <span class="text-danger">*</span></label>
                        	 		<input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="9090909090" value="{{isset($data->father_phone) ? $data->father_phone : old('contact_number')}}" >
		                            @if($errors->has('contact_number'))
		                                <span class="text-danger">{{ $errors->first('contact_number') }}</span>
		                            @endif
                        	 	</div>
                        	 	<div class="col-md-6">
                        	 		<label for="mother_name" class="form-label">Alternative Number </label>
                        	 		<input type="text" class="form-control" id="alternate_number" name="alternate_number" placeholder="9090909090" value="{{isset($data->mother_phone) ? $data->mother_phone : old('mother_number')}}" >
		                            @if($errors->has('alternate_number'))
		                                <span class="text-danger">{{ $errors->first('alternate_number') }}</span>
		                            @endif
                        	 	</div>
                        	</div>
                        	<div class="row p-2">
                        	 	<div class="col-md-6">
                        	 		<label for="father_name" class="form-label">Date Of Birth <span class="text-danger">*</span></label>
                        	 		<input type="text" class="form-control" id="d_o_b" name="d_o_b" placeholder="Date Of Birth" value="{{isset($data->d_o_b) ? $data->d_o_b : old('d_o_b')}}">
		                            @if($errors->has('d_o_b'))
		                                <span class="text-danger">{{ $errors->first('d_o_b') }}</span>
		                            @endif
                        	 	</div>
                        	 	<div class="col-md-6 row">
                        	 		<div class="col-md-6">


	                        	 		<label for="gender" class="form-label">Gender <span class="text-danger">*</span></label>
	                        	 		 <select class="form-control " name="gender" required>
	                        	 		 	<option value="">Select</option>
	                        	 		 	<option value="male" {{isset($data->gender) && ($data->gender=='male') || old('gender')=='male' ? 'selected' : ''}}>Male</option>
	                        	 		 	<option value="female"{{isset($data->gender) && ($data->gender=='female') || old('gender')=='female' ? 'selected' : ''}} >Female</option>
	                        	 		 </select>
			                            @if($errors->has('gender'))
			                                <span class="text-danger">{{ $errors->first('gender') }}</span>
			                            @endif
			                         </div>
			                         <div class="col-md-6">
			                         	<label for="age" class="form-label">Age <span class="text-danger">*</span></label>
			                         	<input type="text" class="form-control" id="age" name="age" placeholder="Age" value="{{isset($data->age) ? $data->age : old('age')}}">
			                            @if($errors->has('age'))
			                                <span class="text-danger">{{ $errors->first('age') }}</span>
			                            @endif
			                         </div>
                        	 	</div>
                        	</div>
                        	<div class="row p-2">
                        	 	<div class="col-md-6">
                        	 		<label for="father_name" class="form-label">Address <span class="text-danger">*</span></label>

                        	 		<textarea class="form-control" id="address" name="address" >{{isset($data->address) ? $data->address : old('address')}}</textarea>
		                            @if($errors->has('address'))
		                                <span class="text-danger">{{ $errors->first('address') }}</span>
		                            @endif
                        	 	</div>
                        	 	<div class="col-md-6">
                        	 		<label for="blood_group" class="form-label">Blood Group <span class="text-danger">*</span></label>
                        	 		 <select class="form-control " name="blood_group" >
                        	 		 	@php
                        	 		 		$bloods = ['A+','A-','B+','B-','O+','O-','AB+','AB-','Others']
                        	 		 	@endphp
                        	 		 	<option value="">Select</option>
                        	 		 	 @foreach($bloods as $key => $blood)
                        	 		 	 	<option value="{{$blood}}" {{(isset($data->blood_group) && $data->blood_group==$blood) ? 'selected' : ''}}>{{$blood}}</option>
                        	 		 	 @endforeach
                        	 		 </select>
		                            @if($errors->has('blood_group'))
		                                <span class="text-danger">{{ $errors->first('blood_group') }}</span>
		                            @endif
                        	 	</div>

                        	</div>

                        	<div class="row p-2">
                        	 	<div class="col-md-6">
                        	 		<label for="email" class="form-label">Email </label>
                        	 		<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email id"  value="{{isset($data->email) ? $data->email : old('email')}}" >
		                            @if($errors->has('email'))
		                                <span class="text-danger">{{ $errors->first('email') }}</span>
		                            @endif
                        	 	</div>
                        	 	<div class="col-md-6 row">
                        	 		<div class="col-md-6">
                        	 			<label for="umr_no" class="form-label">UMR NUMBER <span class="text-danger">*</span></label>
                        	 			<input type="text" class="form-control" id="umr_no" name="umr_no" placeholder="329323"  value="{{isset($data->umr_no) ? $data->umr_no : getUMRONo()}}" >
                        	 			 {{-- <span class="text-info">Mention weight ex: 5.6</span> --}}
                        	 			@if($errors->has('umr_no'))
			                                <span class="text-danger">{{ $errors->first('umr_no') }}</span>
			                            @endif
                        	 		</div>
                                     <div class="col-md-6">
                                        <label for="op_no" class="form-label">OP NUMBER <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="op_no" name="op_no" placeholder="329323"  value="{{isset($data->op_no) ? $data->op_no : getUMRONo()}}" >
                                         {{-- <span class="text-info">Mention weight ex: 5.6</span> --}}
                                        @if($errors->has('op_no'))
                                           <span class="text-danger">{{ $errors->first('op_no') }}</span>
                                       @endif
                                    </div>

									{{-- Check if UMR number and OP Number match --}}
									<script>
										function validateForm() {
											var umrNo = document.getElementById('umr_no').value;
											var opNo = document.getElementById('op_no').value;
											if (umrNo !== opNo) {
												alert('UMR NUMBER and OP NUMBER must be the same.');
												return false; // Prevent form submission
											}
											return true; // Allow form submission
										}
									</script>
									
                        	 		{{-- <div class="col-md-6">
                        	 			<label for="weight" class="form-label">Weight (Kilo Grams) <span class="text-danger">*</span></label>
                        	 			<input type="text" class="form-control" id="weight" name="weight" placeholder="Wight ex: 4.5"  value="{{isset($data->weight) ? $data->weight : old('weight')}}" >
                        	 			 <span class="text-info">Mention weight ex: 5.6</span>
                        	 			@if($errors->has('weight'))
			                                <span class="text-danger">{{ $errors->first('weight') }}</span>
			                            @endif
                        	 		</div>
                        	 		<div class="col-md-6">
                        	 			<label for="height" class="form-label">Height (Centimeters) <span class="text-danger">*</span></label>
                        	 			<input type="text" class="form-control" id="height" name="height" placeholder="Height ex: 4.5"  value="{{isset($data->height) ? $data->height : old('height')}}" >
                        	 			<span class="text-info">Mention Height ex: 63</span>
                        	 			@if($errors->has('height'))
			                                <span class="text-danger">{{ $errors->first('height') }}</span>
			                            @endif
                        	 		</div> --}}
                        	 	</div>
                        	 	<div class="row pt-5">
                        	 		<div class="col-md-6">
                        	 			<label for="height" class="form-label">HOW DID YOU COME TO KNOW ABOUT BABYAMA? </label>
                        	 			<textarea class="form-control" name="about_us" id="about_us" cols="30" rows="5">{{isset($data->about_us) ? $data->about_us : old('about_us')}}</textarea>
                        	 			@if($errors->has('height'))
			                                <span class="text-danger">{{ $errors->first('height') }}</span>
			                            @endif
                        	 		</div>
                        	 	</div>

                        	</div>

                        	 {{-- Submit Button --}}
                        	<div class="col-md-12 p-5 mt-5">
	                            <a href="{{route('admin.patients.list')}}" class="btn btn-secondary btn-sm ms-2" >Back</a>
	                            <button class="btn btn-primary btn-sm ms-2" type="submit">Save</button>
	                        </div>
                        	</form>
                    	</div>
                    </div>
        		</div>
        	</div>
        </div>
    </section>
</x-base-layout>