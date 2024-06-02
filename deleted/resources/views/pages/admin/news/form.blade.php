<x-base-layout>
    @php
        $meta = sgParsePageMeta($news->meta);  
    @endphp
     <div class="container">
        <div class="card card-custom p-5">
            <div class="row p-5 text-centre">
                @if(isset($news->id))
                    <h3>Edit News</h3>
                @else
                    <h3>Add News</h3>
                @endif
            </div>
            <div class="row p-5">
                <div class="col-md-1 col-sm-12"></div>
                <!-- Add form input starts -->
                <div class="col-md-10 col-sm-12">
                    <form class="form" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($news->id))
                        <input type="hidden" name="id" value="{{ $news->id }}">
                        @endif
                       <div class="row justify-content-between mb-3">
                            <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="title">Title<span class="text-danger">*</span></label>
                                <input id="title" type="text" class="form-control mt-2 w-100" name="title" value="{{ old('title', (isset($news->title) ? $news->title : '')) }}" />
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                             <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="image">Upload Image<span class="text-danger">*</span></label>
                                <input id="image" type="file" class="form-control mt-2 w-100" name="image" value="{{ old('image', (isset($news->image) ? $news->image : '')) }}" accept="image/*"/>
                                @if ($errors->has('image'))
                                    <span class="text-danger">{{$errors->first('image')}}</span>
                                @endif
                                @if($news->image)
                                <p class="mt-3 fw-bold">Current File</p>
                                 <img src="{{sgStoreAssetUrl($news->image)}}" class="h-45px mb-5">
                                @endif
                            </div>
                       </div>

                        <div class="row justify-content-between mb-3">
                            <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="date">Date<span class="text-danger">*</span></label>
                                <input id="daterangepickers" type="text" class="form-control mt-2 w-100" name="date" value="{{ old('date', (isset($news->date) ? $news->date : '')) }}" />
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{$errors->first('date')}}</span>
                                @endif
                            </div>
                             <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="link">Link<span class="text-danger">*</span></label>
                                <input id="link" type="url" class="form-control mt-2 w-100" name="link" value="{{ old('link', (isset($news->link) ? $news->link : '')) }}" />
                                @if ($errors->has('link'))
                                    <span class="text-danger">{{$errors->first('link')}}</span>
                                @endif
                            </div>
                       </div>

                        @include('pages.admin.partials.meta')
                       
                        <div class="d-flex justify-content-end mt-3">
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
