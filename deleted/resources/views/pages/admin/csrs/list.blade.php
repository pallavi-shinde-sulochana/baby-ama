<x-base-layout>
	<div class="card card-custom">
		<div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
		         CSR - Corporate Social Responsibility
		    </div>
		    <div class="card-toolbar">
		        
		    </div>
		</div>
		<div class="card-body">
			@include('pages.admin.information')
			<div class="row">
				<div class="col-12">
					<a href="{{route('admin.csr.create')}}" class="btn btn-primary float-end">Add new</a>
					 <form action="" method="GET">
						<div class="row align-items-center">
			                    <div class="col-lg-9 col-xl-8">
			                        <div class="row align-items-center">
			                        	 <div class="col-md-6 my-2 my-md-0">

											<input type="search" name="q" class="form-control" placeholder="Search here" value="{{request('q')}}">
			                        	 </div>
			                        	 <div class="col-md-6 my-2 my-md-0">
			                        	 	<input type="submit" value="Search" class="btn btn-light-primary px-6 font-weight-bold"> &emsp;
											<a href="{{route('admin.csr.list')}}" class="refresh-btn btn btn-light-primary px-6 font-weight-bold">Reset</a>
			                        	 </div>
			                        </div>
			                    </div>
			             </div>
					</form>
					<br>
					@if(!empty($csrs->total()))

                        Showing Records {{ $csrs->firstItem() }} - {{ $csrs->lastItem() }} of {{ $csrs->total() }} (for page {{ $csrs->currentPage() }} )
                    @endif
					<table class="table table-bordered table-hover mt-3 table-striped border" id="kt_datatable">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">#</th>
					      <th scope="col">Title</th>
					      <th scope="col" class="custom-no-sort">Image</th>
					      <th scope="col">Created At</th>
					      <th scope="col" class="custom-no-sort">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					    @foreach($csrs as $key=>$csr)
					        <tr class="border">
						      <th scope="row" class="text-center">
						      	{{($csrs->currentpage()-1) * $csrs->perpage() + $key + 1 }}
						      </th>
						      <td>{{$csr->title}}</td>
						       <td>
						       	@if($csr->image)
						      	<a target="_blank" class="btn btn-sm btn-light-primary" href="{{sgStoreAssetUrl($csr->image)}}">View</a>
						      	@endif
						      </td>
						      <td>{{$csr->created_at}}</td>
						      <td>
						      	<a href="{{ route('admin.csr.update', ['id' => $csr->id]) }}"><i class="fa fa-edit text-primary icon-lg mr-5"></i>
						      	 </a>&emsp;
		                         <a href="{{ route('admin.csr.delete', ['id' => $csr->id]) }}" onclick="confirmation(event)"><i class="fa text-danger fa-trash icon-lg"></i>
		                         </a>
						      </td>
						    </tr>
					   
					    @endforeach
					  </tbody>
					</table>
					<div class="row">
						<div class="col-12">
							{{$csrs->appends(Request::all())->links('pagination::bootstrap-4')}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-base-layout>