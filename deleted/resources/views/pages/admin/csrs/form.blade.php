<x-base-layout>
    @php
    $meta = sgParsePageMeta($csr->meta);  
     // dd($meta);
    @endphp
     <div class="container">
        <div class="card card-custom p-5">
            <div class="row p-5 text-centre">
                @if(isset($csr->id))
                    <h3>Edit CSR</h3>
                @else
                    <h3>Add CSR</h3>
                @endif
            </div>
            <div class="row p-5">
                <div class="col-md-1 col-sm-12"></div>
                <!-- Add form input starts -->
                <div class="col-md-10 col-sm-12">
                    @include('pages.admin.information')
                    <form class="form" method="POST" action="{{ route('admin.csr.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($csr->id))
                        <input type="hidden" name="id" value="{{ $csr->id }}">
                        @endif
                       <div class="row justify-content-between mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                <label class="p-0" for="title">Title<span class="text-danger">*</span></label>
                                <input id="title" type="text" class="form-control mt-2 w-100" name="title" value="{{ old('title', (isset($csr->title) ? $csr->title : '')) }}" />
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                          
                       </div>

                        <div class="row justify-content-between mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                <label class="p-0" for="alias">Alias
                                    <button type="button" class="btn" data-toggle="popover" title="Alias Will generate Automatically based on the title, If you need a specific alias url enter here"  ><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                                </label>
                                <input id="alias" type="text" class="form-control mt-2 w-100" name="alias" value="{{ old('alias', (isset($csr->alias) ? $csr->alias : '')) }}" />
                                @if ($errors->has('alias'))
                                    <span class="text-danger">{{$errors->first('alias')}}</span>
                                @endif
                            </div>
                          
                       </div>
                       <div class="row justify-content-between mb-3">
                           <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="image">Upload Image<span class="text-danger">*</span></label>
                                <input id="image" type="file" class="form-control mt-2 w-100" name="image" value="{{ old('image', (isset($csr->image) ? $csr->image : '')) }}" accept="image/*"/>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif

                                @if($csr->image)
                                <p class="mt-3 fw-bold">Current File</p>
                                 <img src="{{sgStoreAssetUrl($csr->image)}}" class="h-45px mb-5">
                                @endif
                            </div>
                            
                       </div>
                       <div class="row justify-content-between mt-3">
                            
                             <div class="col-12">
                                <label class="p-0" for="description">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control mt-2 w-100" name="description" id="textarea_tinymce" rows="5" id="kt_docs_tinymce_basic">
                                    {{ old('description', (isset($csr->content) ? $csr->content : '')) }}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                       </div>

                      @include('pages.admin.partials.meta')
                        
                       
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('admin.csr.list') }}">
                                <button type="button" class="btn btn-danger">Back</button>&ensp;
                            </a>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12"></div>
            </div>
            
        </div>
    </div>
    <script type="text/javascript">
    </script>
</x-base-layout>
