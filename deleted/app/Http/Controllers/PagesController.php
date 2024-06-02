<?php

namespace App\Http\Controllers;

use App\Models\News;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {   
        $doc= new \StdClass();
        $doc->bannerTitle="Great Companies are built on great Products";
        $doc->bannerSubtitle="Ignite the most powerfull growth engine you have ever built for your company";
        $doc->bannerButton="More Info";
        $doc->bannerButtonLink="Watch Video <div class='fab'><span class='mai-play'></span></div> ";
        $doc->sectionOneTitle="Provide financial advice by our advisor";
        $doc->sectionOneSubtitle="Copywrite, blogpublic relations content translation.";
        $doc->sectionTwoTitle="Complete solutions for global organisations";
        $doc->sectionTwoSubtitle="Copywrite, blogpublic realations content translation.";
        // dd($doc);
        $doc_json= json_encode($doc);
        return view('pages.index',compact('doc','doc_json'));
        // Get view file location from menu config
        $view = theme()->getOption('page', 'view');

        // Check if the page view file exist
        if (view()->exists('pages.'.$view)) {
            return view('pages.'.$view);
        }



        // Get the default inner page
        return view('inner');
    }

    public  function test(){

        $doc= new \StdClass();

        // $doc->bannerTitle='This is banner title';
        // $doc->bannerTitle='This is banner title';
        // $doc->bannerTitle='This is banner title';
        // $doc->bannerTitle='This is banner title';

        // $doc->editable="false";
        $doc->bannerTitle="Great Companies are built on great Products";
        $doc->bannerSubtitle="Ignite the most powerfull growth engine you have ever built for your company";
        $doc->bannerButton="More Info";
        $doc->bannerButtonLink="Watch Video <div class='fab'><span class='mai-play'></span></div> ";
        $doc->sectionOneTitle="Provide financial advice by our advisor";
        $doc->sectionOneSubtitle="Copywrite, blogpublic relations content translation.";
        $doc->sectionTwoTitle="Complete solutions for global organisations";
        $doc->sectionTwoSubtitle="Copywrite, blogpublic realations content translation.";
        // dd($doc);
        $doc_json= json_encode($doc);
        return view('pages.index',compact('doc','doc_json'));


    }
}
