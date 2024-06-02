<?php

namespace App\Http\Controllers;

use App\Models\PressRelease;
use Illuminate\Http\Request;

class PressReleaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $press_releases = PressRelease::latest()->paginate(15);

        $query = PressRelease::query();
      

        $query->when( ( isset($request->q)), function ($query) use ($request){

            $query = $query->where('title', 'LIKE', "%{$request->q}%") 
                   ->orWhere('category', 'LIKE', "%{$request->q}%")
                   ->orWhere('created_at', 'LIKE', "%{$request->q}%");

            return $query;
        });

        $limit = 20;
        $press_releases = $query->paginate($limit);

        return view('pages.admin.press_release.list',compact('press_releases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $press_release = new PressRelease;
        // $release_category = PressRelease::select('category')->get();
        $release_category = ['Suguna Group','Suguna Foods','Globion','Suguna Dairy'];

        return view('pages.admin.press_release.form',compact('press_release','release_category'));
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
        'title' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        'category' => 'required',
        // 'file' => 'required|mimes:doc,docx,pdf,xls,xlsx',
        'file' => 'required',
        ];

        if(isset($request->id) && empty($request->file)){
            unset($validator['file']);
        }

        $validated = $request->validate($validator);

        $sgSlug = ($request->alias) ? sgSlug($request->alias) : sgSlug($request->title);
        $meta =  ($request->meta) ? json_encode($request->meta) : null;
        

        $press_release = (isset($request->id)) ? PressRelease::find($request->id) : new PressRelease;
        $press_release->title=$request->title;
        $press_release->alias=$sgSlug;
        $press_release->category=$request->category;
        $press_release->meta=$meta;
        $press_release->save();

        $press_release= PressRelease::find($press_release->id);
        if(is_file($request->file)){
           // $extention = "{$request->file->getClientOriginalExtension()}";
           // $imagename = substr($request->title,0,20).".".$extention;
           // $press_release->file = $request->file->storeAs('public/press_release_images',$imagename);

            $fileImage = $request->file('file');
            $upload_path = sgUploadFiles($press_release,$fileImage,'press_release'); 
            $press_release->file = $upload_path;

        }

        $press_release->save();
        return redirect()->route('admin.press-release.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PressRelease  $pressRelease
     * @return \Illuminate\Http\Response
     */
    public function show(PressRelease $pressRelease)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PressRelease  $pressRelease
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $press_release = PressRelease::find($id);
       
        $release_category = ['Suguna Group','Suguna Foods','Globion','Suguna Dairy'];
        return view('pages.admin.press_release.form',compact('press_release','release_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PressRelease  $pressRelease
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PressRelease $pressRelease)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PressRelease  $pressRelease
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $press_release = PressRelease::find($id);
        $press_release->delete();
        return back();
    }

    /**
     * Search the specified resourece form storage
     * 
     * @param Request
     * @return Response
     */

    public function search(Request $request){
        $validated = $request->validate([
            'search' => 'required',
        ]);
        $press_releases=PressRelease::query()
                   ->where('title', 'LIKE', "%{$request->search}%") 
                   ->orWhere('created_at', 'LIKE', "%{$request->search}%")
                   ->orWhere('category', 'LIKE', "%{$request->search}%")->paginate(10);
        return view('pages.admin.press_release.list',compact('press_releases'));
    }
}
