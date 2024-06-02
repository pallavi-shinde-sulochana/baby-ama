<?php

if (!function_exists('get_svg_icon')) {
    function get_svg_icon($path, $class = null, $svgClass = null)
    {
        $file_path = public_path(theme()->getMediaUrlPath().$path);

        if (!file_exists($file_path)) {
            return '';
        }

        $svg_content = file_get_contents($file_path);

        $dom = new DOMDocument();
        $dom->loadXML($svg_content);

        // remove unwanted comments
        $xpath = new DOMXPath($dom);
        foreach ($xpath->query('//comment()') as $comment) {
            $comment->parentNode->removeChild($comment);
        }

        // add class to svg
        if (!empty($svgClass)) {
            foreach ($dom->getElementsByTagName('svg') as $element) {
                $element->setAttribute('class', $svgClass);
            }
        }

        // remove unwanted tags
        $title = $dom->getElementsByTagName('title');
        if ($title['length']) {
            $dom->documentElement->removeChild($title[0]);
        }
        $desc = $dom->getElementsByTagName('desc');
        if ($desc['length']) {
            $dom->documentElement->removeChild($desc[0]);
        }
        $defs = $dom->getElementsByTagName('defs');
        if ($defs['length']) {
            $dom->documentElement->removeChild($defs[0]);
        }

        // remove unwanted id attribute in g tag
        $g = $dom->getElementsByTagName('g');
        foreach ($g as $el) {
            $el->removeAttribute('id');
        }
        $mask = $dom->getElementsByTagName('mask');
        foreach ($mask as $el) {
            $el->removeAttribute('id');
        }
        $rect = $dom->getElementsByTagName('rect');
        foreach ($rect as $el) {
            $el->removeAttribute('id');
        }
        $xpath = $dom->getElementsByTagName('path');
        foreach ($xpath as $el) {
            $el->removeAttribute('id');
        }
        $circle = $dom->getElementsByTagName('circle');
        foreach ($circle as $el) {
            $el->removeAttribute('id');
        }
        $use = $dom->getElementsByTagName('use');
        foreach ($use as $el) {
            $el->removeAttribute('id');
        }
        $polygon = $dom->getElementsByTagName('polygon');
        foreach ($polygon as $el) {
            $el->removeAttribute('id');
        }
        $ellipse = $dom->getElementsByTagName('ellipse');
        foreach ($ellipse as $el) {
            $el->removeAttribute('id');
        }

        $string = $dom->saveXML($dom->documentElement);

        // remove empty lines
        $string = preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "\n", $string);

        $cls = array('svg-icon');

        if (!empty($class)) {
            $cls = array_merge($cls, explode(' ', $class));
        }

        $asd = explode('/media/', $path);
        if (isset($asd[1])) {
            $path = 'assets/media/'.$asd[1];
        }

        $output = "<!--begin::Svg Icon | path: $path-->\n";
        $output .= '<span class="'.implode(' ', $cls).'">'.$string.'</span>';
        $output .= "\n<!--end::Svg Icon-->";

        return $output;
    }
}

if (!function_exists('theme')) {
    function theme()
    {
        return app(\App\Core\Adapters\Theme::class);
    }
}

if (!function_exists('util')) {
    function util()
    {
        return app(\App\Core\Adapters\Util::class);
    }
}

if (!function_exists('assetIfHasRTL')) {
    function assetIfHasRTL($path, $secure = null)
    {
        if (isRTL()) {
            return asset(dirname($path).'/'.basename($path, '.css').'.rtl.css');
        }

        return asset($path, $secure);
    }
}

if (!function_exists('isRTL')) {
    function isRTL()
    {
        return (bool) request()->input('rtl');
    }
}

if (!function_exists('sgAssetUrl')) {
    function sgAssetUrl()
    {
        $url = asset('/front-end').'/';
        return $url;
    }
}


if (!function_exists('sgGetMeta')) {
    function sgGetMeta($data=[],$key=null)
    {
       // dd($data);
       if(count(get_object_vars($data))!=0){
         if($key){
             // $data = (!empty($data[$key])) ? $data[$key] : null;
             $data = (!empty($data->$key)) ? $data->$key : null;
         }
       }

        return $data;
    }
}

if (!function_exists('sgParsePageData')) {
    function sgParsePageData($data=[],$editable=false)
    {
         $page = new \StdClass();
         // dd($data);
         $page->meta = isset($data->meta) ? (object)json_decode($data->meta,true) : null;
         $page->doc = isset($data->content) ? $data->content : null;
         $page->docData = isset($data->content) ? json_decode($data->content) : null;
         $page->id = isset($data->id) ? $data->id : null;
         $page->editable = $editable;
       // if(!empty($data->id)){
       // }
        return $page;
    }
}

 function goa()
    {
    $node = 'umma';
    }

if (! function_exists('deleteFilesFromGivenPath')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @return string
     */
    function deleteFilesFromGivenPath($path)
    {
       if($path){
            if(\File::exists(storage_path('app/public/'.$path))){

                \File::delete(storage_path('app/public/'.$path));
            }
       }
    }
}

if (! function_exists('sgUploadFiles')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @param  string  $separator
     * @return string
     */
    function sgUploadFiles($model,$file,$folder)
    {
           $fileFile = $file;
           $filename = preg_replace('/\s+/', '-', $fileFile->getClientOriginalName());
           $upload_path = $folder.'/'.$model->id.'/'. $filename;

            if(!\Storage::disk('public')->put($upload_path, file_get_contents($fileFile))) {
                return false;
            }

            return $upload_path;

    }
}

if (! function_exists('sgSlug')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @return string
     */
    function sgSlug($title)
    {
           $title = Str::slug($title);

            return $title;

    }
}

if (! function_exists('sgStoreAssetUrl')) {
    /**
     * Generate a URL friendly "slug" from a given string.
     *
     * @param  string  $title
     * @return string
     */
    function sgStoreAssetUrl($url)
    {
           $url = asset('/storage/'.$url);
           return $url;

    }
}

if (! function_exists('sgParsePageMeta')) {
    function sgParsePageMeta($meta)
    {

        $meta = !empty($meta) ? (object)json_decode($meta,true) : null;

        return $meta;

    }
}

if (! function_exists('sgGetRouteName')) {
    function sgGetRouteName($name='home')
    {
       $return = [];
       $routes = \Route::getRoutes();
       // Route::has($name)
       foreach ($routes as $route) {
         if($route->getName()){
            // if(Route::has($name)==$route->getName()){
            if( preg_match("~\b$name\b~",$route->getName()) ){

            }
         }
            // echo $route->getName();
            // echo '<br>';
       }
        // $meta = !empty($meta) ? (object)json_decode($meta,true) : null;

        // return $meta;

    }
}

if (! function_exists('sgGetResource')) {
    function sgGetResource($page=[])
    {

       if(isset($page->resource_base) && isset($page->resource)){

            if(view()->exists($page->resource_base.$page->resource)){
                // return view($view)->render();
                $return = view($page->resource_base.$page->resource,compact('page'));
                return $return;
            }else{

                return abort(404);
            }


       }else{
            // dd($page);
            return abort(404);
       }


    }
}

if (! function_exists('sgParseDateFront')) {
    function sgParseDateFront($date=null,$format='d-m-Y')
    {
        if($date){
            $obj = \Carbon\Carbon::parse($date);
            $result = $obj->format($format);
            return $result;
        }
         return '';

    }
}

if (! function_exists('sgParseMenuUrl')) {
    function sgParseMenuUrl($url=null)
    {
        if($url){
            // $obj = url($url);
            $obj = URL::to($url);
            return $obj;
        }
         return '#';

    }
}


if (! function_exists('sgSearchNameParse')) {
    function sgSearchNameParse($name=null)
    {
        if($name){
            // $obj = url($url);
            $name = str_replace('-',' ',$name);
            $name = ucfirst($name);
            return $name;
        }
         return '#';

    }
}
