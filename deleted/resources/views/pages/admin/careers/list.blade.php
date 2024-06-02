<x-base-layout>
	<div class="card card-custom">
		<div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
		         Careers
		    </div>
		    <div class="card-toolbar">
		        
		    </div>
		</div>
		<div class="card-body">
			@include('pages.admin.information')
			<div class="row">
				<div class="col-12">
					<a href="{{route('admin.careers.create')}}" class="btn btn-primary float-end">Add new</a>
					 <form action="" method="GET">
						<div class="row align-items-center">
			                    <div class="col-lg-9 col-xl-8">
			                        <div class="row align-items-center">
			                        	 <div class="col-md-6 my-2 my-md-0">

											<input type="search" name="q" class="form-control" placeholder="Search here" value="{{request('q')}}">
			                        	 </div>
			                        	 <div class="col-md-6 my-2 my-md-0">
			                        	 	<input type="submit" value="Search" class="btn btn-light-primary px-6 font-weight-bold"> &emsp;
											<a href="{{route('admin.careers.list')}}" class="refresh-btn btn btn-light-primary px-6 font-weight-bold">Reset</a>
			                        	 </div>
			                        </div>
			                    </div>
			             </div>
					</form>
					<br>
					@if(!empty($careers->total()))

                        Showing Records {{ $careers->firstItem() }} - {{ $careers->lastItem() }} of {{ $careers->total() }} (for page {{ $careers->currentPage() }} )
                    @endif
					<table class="table table-bordered table-hover mt-3 table-striped border" id="kt_datatable">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">#</th>
					      <th scope="col">Title</th>
					      <th scope="col">Country</th>
					      <th scope="col">Created At</th>
					      <th scope="col" class="custom-no-sort">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					    @foreach($careers as $key=>$career)
					        <tr class="border">
						      <th scope="row" class="text-center">
						      	{{($careers->currentpage()-1) * $careers->perpage() + $key + 1 }}
						      </th>
						      <td>{{$career->title}}</td>
						      <td>{{$career->country}}</td>
						      <td>{{$career->created_at}}</td>
						      <td>
						      	<a href="{{ route('admin.careers.update', ['id' => $career->id]) }}"><i class="fa fa-edit text-primary icon-lg mr-5"></i>
						      	 </a>&emsp;
		                         <a href="{{ route('admin.careers.delete', ['id' => $career->id]) }}" onclick="confirmation(event)"><i class="fa text-danger fa-trash icon-lg"></i>
		                         </a>
						      </td>
						    </tr>
					   
					    @endforeach
					  </tbody>
					</table>
					<div class="row">
						<div class="col-12">
							{{$careers->appends(Request::all())->links('pagination::bootstrap-4')}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-base-layout>