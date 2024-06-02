<?php

namespace App\Http\Controllers;

use App\Models\MediaResource;
use Illuminate\Http\Request;

class MediaResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = MediaResource::query();
        
        $query->when( ( isset($request->q)), function ($query) use ($request){

            $query = $query->where('title', 'LIKE', "%{$request->q}%") 
                   ->orWhere('created_at', 'LIKE', "%{$request->q}%");

            return $query;
        });

        $limit = 20;
        $media_resources = $query->paginate($limit);

        // $media_resources = MediaResource::latest()->paginate(15);
        return view('pages.admin.media_resource.list',compact('media_resources'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $media_resource = new MediaResource();
        return view('pages.admin.media_resource.form',compact('media_resource'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $validator = [
        'title' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        'file'=>'required|mimes:doc,docx,pdf,xls,xlsx'
        // 'file'=>'required'
        ];


        if(isset($request->id) && empty($request->image)){
            unset($validator['image']);
            // unset($validator['file']);
        }

        if(isset($request->id) && empty($request->file)){
            // unset($validator['image']);
            unset($validator['file']);
        }
        // dd($request->file);

        $validated = $request->validate($validator);

        $sgSlug = ($request->alias) ? sgSlug($request->alias) : sgSlug($request->title);
        $meta =  ($request->meta) ? json_encode($request->meta) : null;

        // $isExist = MediaResource::where('alias',$sgSlug)->first();

        // if($isExist){
        //     return redirect()->back()->with('error','The alias '.$sgSlug.' Already Exist')->withInput();
        // }

        $media_resource = (isset($request->id)) ? MediaResource::find($request->id) : new MediaResource;
        $media_resource->title=$request->title;
        $media_resource->alias=$sgSlug;
        $media_resource->meta=$meta;
        
        $media_resource->save();

        /*
        $file = $request->file('attachment');

        if($file){

             $fileName = preg_replace('/\s+/', '-', $file->getClientOriginalName());
             $upload_path = 'contractors/'.$contractors->id.'/courtobs/'.$courtobs->id.'/'. $fileName;
            deleteFilesFromGivenPath($upload_path);

            if(!Storage::disk('public')->put($upload_path, file_get_contents($file))) {
                return false;
            }
            $courtobs = CourtObs::find($courtobs->id);
            $courtobs->attachment          = $upload_path;
            $courtobs->update();

        }*/

        $media_resource= MediaResource::find($media_resource->id);
        if(is_file($request->image)){

           // $extention = "{$request->image->getClientOriginalExtension()}";
           // $imagename = substr($request->title,0,20).".".$extention;
           // $imagename = preg_replace('/\s+/', '-', $fileImage->getClientOriginalName());
           // $upload_path = 'media_resource/'.$media_resource->id.'/'. $imagename;

           //  if(!Storage::disk('public')->put($upload_path, file_get_contents($fileImage))) {
           //      return false;
           //  }
           
           $fileImage = $request->file('image');
           $upload_path = sgUploadFiles($media_resource,$fileImage,'media_resource'); 
           $media_resource->image = $upload_path;
        }

        if(is_file($request->file)){
           
           // $media_resource->file = $request->file->storeAs('public/media_resource',$filename);
           // $filename = preg_replace('/\s+/', '-', $fileFile->getClientOriginalName());

           $fileFile = $request->file('file');
           $upload_path_file = sgUploadFiles($media_resource,$fileFile,'media_resource');
           $media_resource->file = $upload_path_file;

        }

        $media_resource->save();

        return redirect()->route('admin.media-resource.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaResource  $mediaResource
     * @return \Illuminate\Http\Response
     */
    public function show(MediaResource $mediaResource)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaResource  $mediaResource
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $media_resource =MediaResource::find($id);
        // dd($media_resource);
        return view('pages.admin.media_resource.form',compact('media_resource'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaResource  $mediaResource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaResource $mediaResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaResource  $mediaResource
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $media_resource =MediaResource::find($id);
        $media_resource->delete();
        return back();
    }

}
