<x-base-layout>
	<section >
    	<div class="container">
        	<div class="row">
        		<div class="col-md-12 row">
        			<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                		<div class="card-body py-3 px-5">
                			<div class="row">
                				<div class="col-md-12">

                				@if(isset($data->id))
                        		<a href="{{route('doctor.users.delete.doctor',$data->id)}}" onclick="return confirm('Are you sure you want to delete this user?');" class="btn btn-sm w-50 btn-danger mb-5 float-end">DELETE USER</a>
                        		@endif
                				</div>
                			</div>
                    		<form class="row g-3" action="{{route('doctor.users.post.doctor')}}"  method="POST" enctype="multipart/form-data">
                    			@csrf
                    			@if(isset($data->id))
                    				<input type="hidden" name="id" value="{{$data->id}}">
                    			@endif
                        	<h1 class="font-size-lg text-dark font-weight-bold mb-6 text-center">@if(isset($data->id)){{'Edit'}} @else {{'Create'}}@endif Doctor</h1>

                        	@include('pages.admin.user.partials.form')

                        	</form>
                    	</div>
                    </div>
        		</div>
        	</div>
        </div>
    </section>
</x-base-layout>
