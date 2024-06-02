<x-base-layout>
    @php
        $meta = sgParsePageMeta($press_release->meta);  
    @endphp
     <div class="container">
        <div class="card card-custom p-5">
            <div class="row p-5 text-centre">
                @if(isset($press_release->id))
                    <h3>Edit Press Release</h3>
                @else
                    <h3>Add Press Release</h3>
                @endif
            </div>
            <div class="row p-5">
                <div class="col-md-1 col-sm-12"></div>
                <!-- Add form input starts -->
                <div class="col-md-10 col-sm-12">
                    <form class="form" method="POST" action="{{ route('admin.press-store.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($press_release->id))
                        <input type="hidden" name="id" value="{{ $press_release->id }}">
                        @endif
                       <div class="row justify-content-between mb-3">
                            <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="category">Category<span class="text-danger">*</span></label>
                                <select id="category" class="form-control mt-2 w-100" name="category" id="category_option" />
                                     @foreach ($release_category as $category)
                                         <option value="{{$category}}" @if( $press_release->category == $category) {{'selected'}} @endif>{{$category}}</option>
                                     @endforeach
                                </select>
                                @if ($errors->has('category'))
                                    <span class="text-danger">{{$errors->first('category')}}</span>
                                @endif
                            </div>
                            <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="title">Title<span class="text-danger">*</span></label>
                                <input id="title" type="text" class="form-control mt-2 w-100" name="title" value="{{ old('title', (isset($press_release->title) ? $press_release->title : '')) }}" />
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                             
                       </div>

                        <div class="row justify-content-between mb-3">
                            <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="file">Upload File<span class="text-danger">*</span></label>
                                <input id="file" type="file" class="form-control mt-2 w-100" name="file" value="{{ old('file', (isset($press_release->file) ? $press_release->file : '')) }}" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint,text/plain, application/pdf, image/*" />
                                @if ($errors->has('file'))
                                    <span class="text-danger">{{$errors->first('file')}}</span>
                                @endif
                                @if($press_release->file)
                                <p class="mt-3 fw-bold">Current File</p>
                                    <a class="btn btn-secondary" href="{{sgStoreAssetUrl($press_release->file)}}" target="_blank" >
                                        <i class="fas fa-download"></i>
                                         View File
                                    </a>
                                @endif
                            </div>  
                       </div>

                        @include('pages.admin.partials.meta')
                        
                       
                        <div class="d-flex justify-content-end pt-3">
                            <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger">Back</button>&ensp;</a>
                            <button class="btn btn-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2 col-sm-12"></div>
            </div>
            
        </div>
    </div>
</x-base-layout>

