<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\News;
use App\Models\Career;
use App\Models\CSR;
use App\Models\Entities;
use App\Models\MediaResource;
use App\Models\PressRelease;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getAllFrontEndPages(Request $request){

        // $pages = Pages::paginate(10);

        $query = Pages::query();
      

        $query->when( ( isset($request->q)), function ($query) use ($request){

            $query = $query->where('name', 'LIKE', "%{$request->q}%"); 
                   // ->orWhere('description', 'LIKE', "%{$request->q}%")
                   // ->orWhere('created_at', 'LIKE', "%{$request->q}%")
                   // ->orWhere('meta', 'LIKE', "%{$request->q}%");

            return $query;
        });

        $limit = 20;
        $pages = $query->paginate($limit);
        // dd($pages);
        return view('pages.admin.frontpages.list',compact('pages'));
    }

    public function  getFrontPages($id)
    {
         $page =Pages::find($id);
        return view('pages.admin.frontpages.form',compact('page'));

    }

    public function  postFrontPages(Request $request)
    {
         // $sgSlug = ($request->alias) ? sgSlug($request->alias) : sgSlug($request->title);
        $meta =  ($request->meta) ? json_encode($request->meta) : null;

       
        $pages = (isset($request->id)) ? Pages::find($request->id) : new News;
        // $pages->name=$request->title;
        // $pages->alias=$sgSlug;
        // $pages->link=$request->link;
        // $pages->date=$request->date;
        $pages->meta=$meta;
        $pages->save();

        return redirect()->route('admin.pages.list');

    }

    public function  dashboard(){

        $data =[];
        $data['pages'] = Pages::get()->count();
        $data['news'] = News::get()->count();
        $data['career'] = Career::get()->count();
        $data['csr'] = CSR::get()->count();
        // $data['e'] = Entities::get()->count();
        $data['media'] = MediaResource::get()->count();
        $data['press'] = PressRelease::get()->count();

        return view('pages.index',compact('data'));
        dd($data);
    }
}
