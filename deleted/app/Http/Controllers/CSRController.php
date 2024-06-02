<?php

namespace App\Http\Controllers;

use App\Models\CSR;
use Illuminate\Http\Request;

class CSRController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = CSR::query();
      

        $query->when( ( isset($request->q)), function ($query) use ($request){

            $query = $query->where('title', 'LIKE', "%{$request->q}%") 
                   ->orWhere('content', 'LIKE', "%{$request->q}%");

            return $query;
        });

        $limit = 20;
        $csrs = $query->paginate($limit);
        return view('pages.admin.csrs.list',compact('csrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $csr = new CSR;
        return view('pages.admin.csrs.form',compact('csr'));
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
        // 'alias' => 'required',
        // 'url' => 'required|url',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        'description' => 'required',
        ];

        $meta =  ($request->meta) ? json_encode($request->meta) : null;

        if(isset($request->id) && empty($request->image)){
            unset($validator['image']);
            // unset($validator['file']);
        }

        $validated = $request->validate($validator);

        $sgSlug = ($request->alias) ? sgSlug($request->alias) : sgSlug($request->title);
        if(!$request->id){
            $isExist = CSR::where('alias',$sgSlug)->first();

            if($isExist){
                return redirect()->back()->with('error','The alias '.$sgSlug.' Already Exist')->withInput();
            }
        }

        // dd('end');

        $csr = (isset($request->id)) ? CSR::find($request->id) : new CSR;
        $csr->title=$request->title;
        $csr->alias=$sgSlug;
        // $career->url=$request->url;
        // $career->date=Carbon::parse($request->date);
        $csr->content=$request->description;
        $csr->meta=$meta;
        $csr->save();

        $csr= CSR::find($csr->id);

        if(is_file($request->image)){
           $fileImage = $request->file('image');
           $upload_path = sgUploadFiles($csr,$fileImage,'csr'); 
           $csr->image = $upload_path;
        }

        $csr->save();

        return redirect()->route('admin.csr.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CSR  $cSR
     * @return \Illuminate\Http\Response
     */
    public function show(CSR $cSR)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CSR  $cSR
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $csr = CSR::find($id);
        
        return view('pages.admin.csrs.form',compact('csr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CSR  $cSR
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CSR $cSR)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CSR  $cSR
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $csr = CSR::find($id);
        $csr->delete();
        return back()->with('success','Deleted Sucessfully');
    }
}
