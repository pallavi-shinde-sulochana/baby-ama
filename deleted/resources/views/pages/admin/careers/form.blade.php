<x-base-layout>

    @php
    $meta = sgParsePageMeta($career->meta);  
     // dd($meta);
    @endphp
     <div class="container">
        <div class="card card-custom p-5">
            <div class="row p-5 text-centre">
                @if(isset($career->id))
                    <h3>Edit Career</h3>
                @else
                    <h3>Add Career</h3>
                @endif
            </div>
            <div class="row p-5">
                <div class="col-md-1 col-sm-12"></div>
                <!-- Add form input starts -->
                <div class="col-md-10 col-sm-12">
            @include('pages.admin.information')
                    <form class="form" method="POST" action="{{ route('admin.careers.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($career->id))
                        <input type="hidden" name="id" value="{{ $career->id }}">
                        @endif
                       <div class="row justify-content-between mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                <label class="p-0" for="title">Title<span class="text-danger">*</span></label>
                                <input id="title" type="text" class="form-control mt-2 w-100" name="title" value="{{ old('title', (isset($career->title) ? $career->title : '')) }}" />
                                @if ($errors->has('title'))
                                    <span class="text-danger">{{$errors->first('title')}}</span>
                                @endif
                            </div>
                          
                       </div>

                       {{--  <div class="row justify-content-between mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                <label class="p-0" for="alias">Alias
                                    <button type="button" class="btn" data-toggle="popover" title="Alias Will generate Automatically based on the title, If you need a specific alias url enter here"  ><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                                </label>
                                <input id="alias" type="text" class="form-control mt-2 w-100" name="alias" value="{{ old('alias', (isset($career->alias) ? $career->alias : '')) }}" />
                                @if ($errors->has('alias'))
                                    <span class="text-danger">{{$errors->first('alias')}}</span>
                                @endif
                            </div>
                          
                       </div> --}}

                       {{--  <div class="row justify-content-between mb-3">
                              <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="date">Date<span class="text-danger">*</span></label>
                                <input id="daterangepickers" type="text" class="form-control mt-2 w-100" name="date" value="{{ old('date', (isset($career->date) ? $career->date : '')) }}" />
                                @if ($errors->has('date'))
                                    <span class="text-danger">{{$errors->first('date')}}</span>
                                @endif
                            </div>
                             <div class="col-lg-5 col-md-6 col-sm-12 mb-2">
                                <label class="p-0" for="url">Link<span class="text-danger">*</span></label>
                                <input id="url" type="url" class="form-control mt-2 w-100" name="url" value="{{ old('url', (isset($career->url) ? $career->url : '')) }}" />
                                @if ($errors->has('url'))
                                    <span class="text-danger">{{$errors->first('url')}}</span>
                                @endif
                            </div>
                       </div>
                       <div class="row justify-content-between mb-3">
                            
                             <div class="col-12">
                                <label class="p-0" for="description">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control mt-2 w-100" name="description" id="textarea_tinymce" rows="5" id="kt_docs_tinymce_basic">
                                    {{ old('description', (isset($career->description) ? $career->description : '')) }}
                                </textarea>
                                @if ($errors->has('description'))
                                    <span class="text-danger">{{$errors->first('description')}}</span>
                                @endif
                            </div>
                       </div> --}}

                        <div class="row justify-content-between mb-3">
                            
                           <div class="col-12 row">
                                <div class="col-md-4">
                                    <label class="p-0" for="title">Country
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input id="country" type="text" class="form-control mt-2 w-100" name="country" value="{{ old('country', (isset($career->country) ? $career->country : '')) }}" />
                                    @if ($errors->has('country'))
                                        <span class="text-danger">{{$errors->first('country')}}</span>
                                    @endif
                                </div>
                                <div class="col-md-4"></div>
                                <div class="col-md-4"></div>
                            </div>

                            
                        </div>
                        {{-- @include('pages.admin.partials.meta') --}}
                       
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
    <script type="text/javascript">
    </script>
</x-base-layout>
