<x-base-layout>
    @php
    $meta = sgParsePageMeta($media_resource->meta);  
    @endphp
     <div class="container">
        <div class="card card-custom p-5">
            <div class="row p-5 text-centre">
                @if(isset($media_resource->id))
                    <h3>Edit News</h3>
                @else
                    <h3>Add News</h3>
                @endif
            </div>
            <div class="row p-5">
                <div class="col-md-1 col-sm-12"></div>
                <!-- Add form input starts -->
                <div class="col-md-10 col-sm-12">
                    <form class="form" method="POST" action="{{ route('admin.media-resource.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($media_resource->id))
                        <input type="hidden" name="id" value="{{ $media_resource->id }}">
                        @endif
                       <div class="row justify-content-between mb-3">
                            <div class="col-12 mb-2">
                                <label class="p-0" for="title">Title<span class="text-danger">*</span></label>
                                <input id="title" type="text" class="form-control mt-2 w-100" name="title" value="{{ old('title', (isset($media_resource->title) ? $media_resource->title : '')) }}" />
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                             
                       </div>

                        <div class="row justify-content-between mb-3">
                           <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="image">Upload Image<span class="text-danger">*</span></label>
                                <input id="image" type="file" class="form-control mt-2 w-100" name="image" value="{{ old('image', (isset($media_resource->image) ? $media_resource->image : '')) }}" accept="image/*"/>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif

                                @if($media_resource->image)
                                <p class="mt-3 fw-bold">Current File</p>
                                 <img src="{{sgStoreAssetUrl($media_resource->image)}}" class="h-45px mb-5">
                                @endif
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="file">Upload File<span class="text-danger">*</span></label>
                                <input id="file" type="file" class="form-control mt-2 w-100" name="file" value="{{ old('file', (isset($media_resource->file) ? $media_resource->file : '')) }}" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf"/>
                                @if ($errors->has('file'))
                                    <span class="text-danger">{{$errors->first('file')}}</span>
                                @endif
                                @if($media_resource->file)
                                <p class="mt-3 fw-bold">Current File</p>
                                    <a class="btn btn-secondary" href="{{sgStoreAssetUrl($media_resource->file)}}" target="_blank" >
                                        <i class="fas fa-download"></i>
                                         View File
                                    </a>
                                @endif
                            </div>
                       </div>
                        @include('pages.admin.partials.meta')
                       
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('admin.media-resource.list') }}"><button type="button" class="btn btn-danger">Back</button>&ensp;</a>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12"></div>
            </div>
            
        </div>
    </div>

</x-base-layout>
