<x-base-layout>
	<section >
    	<div class="container">
        	<div class="row">
        		<div class="col-md-12 row">
        			<div class="card border shadow-sm p-3 mb-5 bg-body rounded">
                		<div class="card-body py-3 px-5">
                    		<form class="row g-3" action="{{route('admin.patients.store')}}"  method="POST">
                    			@csrf
                    			@if(isset($data->id))
                    				<input type="hidden" name="id" value="{{$data->id}}">
                    			@endif
                        	<h1 class="font-size-lg text-dark font-weight-bold mb-6 text-center">@if(isset($data->id)){{'Edit'}} @else {{'Create'}}@endif Patient</h1>

                        	 {{-- Submit Button --}}
                        	<div class="col-md-12 p-5 mt-5">
	                            <a href="{{route('admin.patients.list')}}" class="btn btn-danger btn-sm ms-2" >Back</a>
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