<x-base-layout>
    @php
    $meta = sgParsePageMeta($page->meta);  
     // dd($meta);
    @endphp
     <div class="container">
        <div class="card card-custom p-5">
            <div class="row p-5 text-centre">
                
            </div>
            <div class="row p-5">
                <div class="col-md-1 col-sm-12"></div>
                <!-- Add form input starts -->
                <div class="col-md-10 col-sm-12">
                    @include('pages.admin.information')
                    <form class="form" method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($page->id))
                        <input type="hidden" name="id" value="{{ $page->id }}">
                        @endif
                       <div class="row justify-content-between mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                <label class="p-0" for="title">Page : </label>
                                {{ old('name', (isset($page->name) ? $page->name : '')) }}
                                @if ($errors->has('name'))
                                    <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                            </div>
                          
                       </div>

                        {{-- <div class="row justify-content-between mb-3">
                            <div class="col-lg-12 col-md-12 col-sm-12 mb-2">
                                <label class="p-0" for="alias">Alias
                                    <button type="button" class="btn" data-toggle="popover" title="Alias Will generate Automatically based on the title, If you need a specific alias url enter here"  ><i class="fa fa-info-circle" aria-hidden="true"></i></button>
                                </label>
                                <input id="alias" type="text" class="form-control mt-2 w-100" name="alias" value="{{ old('alias', (isset($page->alias) ? $page->alias : '')) }}" />
                                @if ($errors->has('alias'))
                                    <span class="text-danger">{{$errors->first('alias')}}</span>
                                @endif
                            </div>
                          
                       </div> --}}
                       
                      @include('pages.admin.partials.meta')
                        
                       
                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('admin.pages.list') }}">
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
