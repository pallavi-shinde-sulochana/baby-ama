<x-base-layout>
	<div class="card card-custom">
		<div class="card-header flex-wrap border-0 pt-6 pb-0">
		    <div class="card-title">
		         All Font Pages 
		    </div>
		    <div class="card-toolbar">
		        
		    </div>
		</div>
		<div class="card-body">
			@include('pages.admin.information')
			<div class="row">
				<div class="col-12">
					{{-- <a href="{{route('admin.csr.create')}}" class="btn btn-primary float-end">Add new</a> --}}
					 <form action="" method="GET">
						<div class="row align-items-center">
			                    <div class="col-lg-9 col-xl-8">
			                        <div class="row align-items-center">
			                        	 <div class="col-md-6 my-2 my-md-0">

											<input type="search" name="q" class="form-control" placeholder="Search here" value="{{request('q')}}">
			                        	 </div>
			                        	 <div class="col-md-6 my-2 my-md-0">
			                        	 	<input type="submit" value="Search" class="btn btn-light-primary px-6 font-weight-bold"> &emsp;
											<a href="{{route('admin.pages.list')}}" class="refresh-btn btn btn-light-primary px-6 font-weight-bold">Reset</a>
			                        	 </div>
			                        </div>
			                    </div>
			             </div>
					</form>
					<br>
					@if(!empty($pages->total()))

                        Showing Records {{ $pages->firstItem() }} - {{ $pages->lastItem() }} of {{ $pages->total() }} (for page {{ $pages->currentPage() }} )
                    @endif
					<table class="table table-bordered table-hover mt-3 table-striped border" id="kt_datatable">
					  <thead>
					    <tr>
					      <th scope="col" class="text-center">#</th>
					      <th scope="col">Page name</th>
					      <th scope="col">Created At</th>
					      <th scope="col">Last Updated At</th>
					      {{-- <th scope="col" class="custom-no-sort">View Page</th> --}}
					      <th scope="col" class="custom-no-sort">Meta Data</th>
					      <th scope="col" class="custom-no-sort">Actions</th>
					    </tr>
					  </thead>
					  <tbody>
					    @foreach($pages as $key=>$page)
					        <tr class="border">
						      <th scope="row" class="text-center">
						      	{{($pages->currentpage()-1) * $pages->perpage() + $key + 1 }}
						      </th>
						      <td>
						      	{{$page->name}}
						      </td>
						      <td>
						       {{$page->created_at}}
						      </td>
						      <td>
						      	{{$page->updated_at}}
						      </td>
						      
						      <td>
						      	@php 
						      		$pageMeta = (object)json_decode($page->meta);
						      	@endphp
						      	@foreach ($pageMeta as $key=> $value)
						      		{{"$key = $value"}}<br>
						      	@endforeach
						      </td>
						      <td>
						      	<a href="{{ route('admin.pages.update', ['id' => $page->id]) }}"><i class="fa fa-edit text-primary icon-lg mr-5"></i>
						      	 </a>
						      	{{-- <a  href="{{route(str_replace("store","index",$page->route))}}" target="_blank"> <i class="fa fa-eye text-primary icon-lg "></i>
						      	</a>&emsp;
						      	 --}}

						      </td>
						    </tr>
					   
					    @endforeach
					  </tbody>
					</table>
					<div class="row">
						<div class="col-12">
							{{$pages->appends(Request::all())->links('pagination::bootstrap-4')}}
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-base-layout>