<section id="user-form">
    <div class="row">
        <div class="col-12">
            <div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                <div class="card-body py-3 px-5">
                    <form class="row g-3" wire:submit.prevent="submitForm" method="POST">
                        <h3 class="font-size-lg text-dark font-weight-bold mb-6">User Info:</h3>
                        <div class="col-md-6">
                            <input type="hidden" wire:model="user_id">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" placeholder="Enter your first name" wire:model="first_name">
                            @if($errors->has('first_name'))
                                <span class="text-danger">{{ $errors->first('first_name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" placeholder="Enter your last name" wire:model="last_name">
                            @if($errors->has('last_name'))
                                <span class="text-danger">{{ $errors->first('last_name') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email address" wire:model="email">
                            @if($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="tel" class="form-control" id="phone" placeholder="Enter your mobile number" wire:model="phone">
                            @if($errors->has('phone'))
                                <span class="text-danger">{{ $errors->first('phone') }}</span>
                            @endif
                        </div>

                        <div class="col-md-12">
                            <label for="select_user_role" class="form-label">Select User Role</label>
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select_user_role" wire:model="user_role">
                                @if($type === "admin-pharmacy")
                                    <option value="admin">Admin</option>
                                    <option value="pharmacy">Pharmacy</option>
                                @elseif($type === "doctors")
                                    <option value="doctor">Doctor</option>
                                @else
                                    <option value="patient">Patient</option>
                                @endif
                            </select>
                        </div>
                        
                        @if($type === "doctors")
                            <div class="col-md-12">
                                <label for="select_user_role" class="form-label">Specialist Type</label>
                                {{-- <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="select_user_role" wire:model="specialist_type">
                                    <option value="audiologists">Audiologists</option>
                                    <option value="dentists">Dentists</option>
                                    <option value="cardiologists">Cardiologists</option>
                                    <option value="gynecologists">Gynecologists</option>
                                </select> --}}
                                <div class="row">
                                    @foreach(getDoctorSpecialistType() as $slug => $specialist_type)
                                        <div class="col-12 mt-2">
                                           <label class="form-check form-check-custom form-check-solid">
                                                <input class="form-check-input" type="checkbox" value="{{$slug}}" wire:model="specialist_type"/>
                                                <span class="form-check-label">
                                                    {{$specialist_type}}
                                                </span>
                                            </label>
                                        </div>
                                    @endforeach
                                </div> 
                            </div> 
                        @endif

                        <div class="col-md-12">
                            <label for="password" class="form-label">Password</label>
                             <input type="password" class="form-control" id="password" placeholder="Enter your password" wire:model="password">
                            
                        </div>

                        <div class="col-md-12 mt-5">
                            <button class="btn btn-danger btn-sm" type="button" wire:click="$emitUp('toggleUserForm')">Cancel</button>
                            <button class="btn btn-primary btn-sm ms-2" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>