 <div class="col-12 row mt-2 mb-1">
    <p class="fw-bold">Meta Details </p>
    <div class="border p-5 row col-12">
        
        <div class="col-md-6">
            <label class="p-0" for="title">Meta Title
            </label>
            <input id="meta_title" type="text" class="form-control mt-2 w-100" name="meta[title]" value="{{ (isset($meta->title) ? $meta->title : '') }}" />
            {{-- old('description', (isset($csr->content) ? $csr->content : '')) --}}
        </div>
        <div class="col-md-6">
            <label class="p-0" for="title">Meta Description
            </label>
            <input id="meta_descrition" type="text" class="form-control mt-2 w-100" name="meta[descrition]" value="{{ (isset($meta->descrition) ? $meta->descrition : '') }}" />
        </div>
        <div class="col-md-12">
            <label class="p-0" for="title">Meta Keywords
            </label>
            <textarea class="form-control mt-2 w-100" name="meta[keywords]" id="meta_keywords" rows="5" >{{(isset($meta->keywords) ? $meta->keywords : '')}}</textarea>
        </div>
    </div>
</div>
