<div class="row">
	 <div class="col-md-6">
	 	@if(isset($data->id))
        <input type="hidden" name="id" value="{{$data->id}}">
        @endif
        <label for="first_name" class="form-label">First name<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="first_name" placeholder="Enter first name" name="first_name" value="{{isset($data->first_name) ? $data->first_name : old('first_name')}}">
        @if($errors->has('first_name'))
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        @endif
    </div>
    <div class="col-md-6">
        <label for="last_name" class="form-label">Last name</label>
        <input type="text" class="form-control" id="last_name" placeholder="Enter last name" name="last_name" value="{{isset($data->last_name) ? $data->last_name : old('last_name')}}">
        @if($errors->has('last_name'))
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        @endif
    </div>
</div>
<div class="row pt-5">
	 <div class="col-md-6">

        <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
        <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" autocomplete="off" value="{{isset($data->email) ? $data->email : old('email')}}">
        @if($errors->has('email'))
            <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="col-md-6">
        <label for="phone" class="form-label">Phone<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="phone" placeholder="Enter Mobile No" name="phone" autocomplete="off" value="{{isset($data->info->phone) ? $data->info->phone : old('phone')}}">
        @if($errors->has('phone'))
            <span class="text-danger">{{ $errors->first('phone') }}</span>
        @endif

        @if($role!='admin')
        <input type="hidden" name="role" value='{{$role}}'>
        @endif
    </div>
</div>
<div class="row pt-5">
	 <div class="col-md-6">

        <label for="email" class="form-label">Password<span class="text-danger">*</span></label>
        <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" autocomplete="off">
        @if($errors->has('password'))
            <span class="text-danger">{{ $errors->first('password') }}</span>
        @endif
    </div>
    <div class="col-md-6">
        {{-- admin and super admin adde edit --}}
        @if($role === 'admin' || $role === 'super-admin')
            <label for="roles" class="form-label">Role of Admin<span class="text-danger">*</span></label>
            <select name="role" id="role" class="form-control">
                <option value="admin" @if($data->hasRole('admin')) {{'selected'}} @endif>Admin</option>
                {{-- <option value="super-admin" @if($data->hasRole('super-admin')) {{'selected'}} @endif>Super Admin</option> --}}
            </select>
            @if($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
            @endif
        @endif

        <!-- Doctor Specialist Type List -->
       @if($role === 'doctor' || $role === 'therapist')
	       @php
		       $s_type = (isset($data->info->specialist_type)) ? json_decode($data->info->specialist_type,TRUE) : [];
               $available_specialist_types = [];
               if($role === 'doctor') $available_specialist_types = getDoctorSpecialistType();
               if($role === 'therapist') $available_specialist_types = getTherapistSpecialistType();
	       @endphp
	       <label for="select_user_role" class="form-label">{{ucfirst($role)}} Specialist Type</label>
           <div class="row">
            @php
                $getType = '';
        
                if (isset($data->info->specialist_type)) {
                    $decodedType = json_decode($data->info->specialist_type, true); // Ensure we get an array
                    
                    if (is_array($decodedType)) {
                        try {
                            $getType = implode(',', $decodedType);
                        } catch (Exception $e) {
                            $getType = $data->info->specialist_type;
                        }
                    } else {
                        $getType = $data->info->specialist_type;
                    }
                }
            @endphp
        
            @if($getType)
                <input type="text" class="form-control" id="specialist_type" placeholder="Enter Specialization" name="specialist_type" autocomplete="off" value="{{ $getType }}">
            @else
                <input type="text" class="form-control" id="specialist_type" placeholder="Enter Specialization" name="specialist_type" autocomplete="off" value="{{ old('specialist_type') }}">
            @endif
        
            @if($errors->has('specialist_type'))
                <span class="text-danger">{{ $errors->first('specialist_type') }}</span>
            @endif
        </div>
        
       @endif
    </div>
</div>


@if($role=='doctor')
<div class="row pt-5">
     <div class="col-md-6">

        <label for="email" class="form-label">Degree<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="email" placeholder="Enter The Degree" name="degree" autocomplete="off" value="{{isset($data->info->degree) ? $data->info->degree : old('degree')}}">
        @if($errors->has('degree'))
            <span class="text-danger">{{ $errors->first('degree') }}</span>
        @endif
    </div>
    <div class="col-md-6">
        <label for="phone" class="form-label">Reg.No<span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="reg_no" placeholder="Enter Register No" name="reg_no" autocomplete="off" value="{{isset($data->info->reg_no) ? $data->info->reg_no : old('reg_no')}}">
        @if($errors->has('reg_no'))
            <span class="text-danger">{{ $errors->first('reg_no') }}</span>
        @endif
        <input type="hidden" name="role" value='{{$role}}'>

    </div>
</div>
@endif

{{-- Avatar input for admin, super-admin, and doctor --}}
@if($role === 'admin' || $role === 'super-admin' || $role === 'doctor')
<div class="row pt-5">
    <div class="col-md-6">
        <label for="avatar" class="form-label">Profile</label>
        <input type="file" class="form-control" id="avatar" name="avatar">
        @if($errors->has('avatar'))
        <span class="text-danger">{{ $errors->first('avatar') }}</span>
        @endif
    </div>
</div>
@endif


 {{-- Submit Button --}}
<div class="col-md-12 p-5 mt-5 ">
	<div class="float-end">
	</div>
    <a href="{{route(''.$role.'.users.list.'.$role.'')}}" class="btn btn-danger btn-sm ms-2 " >Back</a>
    <button class="btn btn-primary btn-sm ms-2" type="submit">Save</button>
</div>
