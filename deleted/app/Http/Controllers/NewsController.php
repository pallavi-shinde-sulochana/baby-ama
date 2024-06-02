<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

use Carbon\Carbon;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = News::query();
      

        $query->when( ( isset($request->q)), function ($query) use ($request){

            $query = $query->where('title', 'LIKE', "%{$request->q}%") 
                   ->orWhere('created_at', 'LIKE', "%{$request->q}%");

            return $query;
        });

        $limit = 20;
        $news = $query->paginate($limit);

        return view('pages.admin.news.list',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $news = new News();
        return view('pages.admin.news.form',compact('news'));
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
        'link' => 'required|url',
        'date' => 'required',
        'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
        ];

        $sgSlug = ($request->alias) ? sgSlug($request->alias) : sgSlug($request->title);
        $meta =  ($request->meta) ? json_encode($request->meta) : null;

        if(isset($request->id) && empty($request->image)){
            unset($validator['image']);
            // unset($validator['file']);
        }
        $validated = $request->validate($validator);

        // $isExist = News::where('alias',$sgSlug)->first();

        // if($isExist){
        //     return redirect()->back()->with('error','The alias '.$sgSlug.' Already Exist')->withInput();
        // }
        $date = Carbon::parse($request->date);
        $news = (isset($request->id)) ? News::find($request->id) : new News;
        $news->title=$request->title;
        $news->alias=$sgSlug;
        $news->link=$request->link;
        $news->date=$date;
        $news->meta=$meta;
        $news->save();

        $news= News::find($news->id);
        if(is_file($request->image)){
           // $extention = "{$request->image->getClientOriginalExtension()}";
           // $imagename = substr($request->title,0,20).".".$extention;

           $fileImage = $request->file('image');
           $upload_path = sgUploadFiles($news,$fileImage,'news'); 

           $news->image = $upload_path;
        }

        $news->save();
        return redirect()->route('admin.news.list');
        // dd($news);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $news =News::find($id);
        return view('pages.admin.news.form',compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $news =News::find($id);
        $news->delete();
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
        $news=News::query()
                   ->where('title', 'LIKE', "%{$request->search}%") 
                   ->orWhere('created_at', 'LIKE', "%{$request->search}%")
                   ->orWhere('date', 'LIKE', "%{$request->search}%")->paginate(10);
        return view('pages.admin.news.list',compact('news'));
    }
}
