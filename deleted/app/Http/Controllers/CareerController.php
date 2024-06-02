<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;
use Carbon\Carbon;
class CareerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $careers = Career::latest()->paginate(15);

         $query = Career::query();
      

        $query->when( ( isset($request->q)), function ($query) use ($request){

            $query = $query->where('title', 'LIKE', "%{$request->q}%") 
                   // ->orWhere('description', 'LIKE', "%{$request->q}%")
                   // ->orWhere('created_at', 'LIKE', "%{$request->q}%")
                   ->orWhere('country', 'LIKE', "%{$request->q}%");

            return $query;
        });

        $limit = 20;
        $careers = $query->paginate($limit);
        return view('pages.admin.careers.list',compact('careers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $career = new Career;
        return view('pages.admin.careers.form',compact('career'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'title' => 'required',
        // 'alias' => 'required',
        // 'url' => 'required|url',
        // 'date' => 'required',
        // 'description' => 'required',
        'country' => 'required',
        ]);


        $meta =  ($request->meta) ? json_encode($request->meta) : null;
       
        $sgSlug = ($request->alias) ? sgSlug($request->alias) : sgSlug($request->title);
        // if(!$request->id){

        //     $isExist = Career::where('alias',$sgSlug)->first();

        //     if($isExist){
        //         return redirect()->back()->with('error','The alias '.$sgSlug.' Already Exist')->withInput();
        //     }
        // }
        

        $career = (isset($request->id)) ? Career::find($request->id) : new Career;
        $career->title=$request->title;
        $career->alias=$sgSlug;
        $career->url=$request->url;
        $career->date=Carbon::parse($request->date);
        $career->description=$request->description;
        $career->meta=$meta;
        $career->country=$request->country;
        $career->save();
        return redirect()->route('admin.careers.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(Career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $career = Career::find($id);
        
        return view('pages.admin.careers.form',compact('career'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Career $career)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $career = Career::find($id);
        $career->delete();
        return back();
    }
   
}
