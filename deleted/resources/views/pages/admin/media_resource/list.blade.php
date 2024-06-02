<x-base-layout>
<div class="card card-custom">
	<div class="card-header flex-wrap border-0 pt-6 pb-0">
	    <div class="card-title">
	         Media Resources
	    </div>
	    <div class="card-toolbar">
	        
	    </div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-12">
				<a href="{{route('admin.media-resource.create')}}" class="btn btn-primary float-end">Add new</a>
					 <form action="" method="GET">
						<div class="row align-items-center">
			                    <div class="col-lg-9 col-xl-8">
			                        <div class="row align-items-center">
			                        	 <div class="col-md-6 my-2 my-md-0">

											<input type="search" name="q" class="form-control" placeholder="Search here" value="{{request('q')}}">
			                        	 </div>
			                        	 <div class="col-md-6 my-2 my-md-0">
			                        	 	<input type="submit" value="Search" class="btn btn-light-primary px-6 font-weight-bold"> &emsp;
											<a href="{{route('admin.media-resource.list')}}" class="refresh-btn btn btn-light-primary px-6 font-weight-bold">Reset</a>
			                        	 </div>
			                        </div>
			                    </div>
			             </div>
					</form>
					<br>
					@if(!empty($media_resources->total()))

                        Showing Records {{ $media_resources->firstItem() }} - {{ $media_resources->lastItem() }} of {{ $media_resources->total() }} (for page {{ $media_resources->currentPage() }} )
                    @endif
				<table  class="table table-bordered table-hover mt-3 table-striped border" id="kt_datatable">
				  <thead>
				    <tr>
				      <th scope="col" class="text-center">#</th>
				      <th scope="col">Title</th>
				      <th scope="col" class="custom-no-sort">Image</th>
				      <th scope="col" class="custom-no-sort">File</th>
				      <th scope="col">Created At</th>
				      <th scope="col" class="custom-no-sort">Actions</th>
				    </tr>
				  </thead>
				  <tbody>
				    @foreach($media_resources as $key=>$media_resource)
				        <tr class="border">
					      <th scope="row" class="text-center">
					      	{{($media_resources->currentpage()-1) * $media_resources->perpage() + $key + 1 }}
					      </th>
					      <td>{{$media_resource->title}}</td>
					      <td>
					      	<a target="_blank" class="btn btn-sm btn-light-primary" href="{{sgStoreAssetUrl($media_resource->image)}}">View</a>
					     
					      </td>
					      <td>
					      	<a target="_blank" class="btn btn-sm btn-light-primary" href="{{sgStoreAssetUrl($media_resource->file)}}">View</a>
					      </td>
					      <td>{{$media_resource->created_at}}</td>
					      <td>
					      	@if($media_resources)
					      	<a href="{{ route('admin.media-resource.update', ['id' => $media_resource->id]) }}"><i class="fa fa-edit text-primary icon-lg mr-5"></i>
				      	 	</a>&emsp;
	                        <a href="{{ route('admin.media-resource.delete', ['id' => $media_resource->id]) }}" onclick="confirmation(event)"><i class="fa text-danger fa-trash icon-lg"></i>
	                        </a>
	                        @endif
					      </td>
					    </tr>
				    @endforeach
				  </tbody>
				</table>
				<div class="row">
					<div class="col-12">
						{{$media_resources->appends(Request::all())->links('pagination::bootstrap-4')}}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</x-base-layout>