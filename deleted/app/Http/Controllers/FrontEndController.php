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
use Route;
class FrontEndController extends Controller
{

    /*
    *NEED $page Data for ALL Front End pages
    *REF:  $page= $this->getPageByNameDynamic('name of our page in the browser URL');
    */

    function getPageByName($page=null,$url=null,$edit_url=null,$editable=false){

        // return abort(403);
        // $path = storage_path() . "/pages/test.json";

        // TODO:if no data gt from JSOn
        // $path = storage_path() . "/pagess/${page}.json";
        // $getJsonContent =json_decode(file_get_contents($path));
        // dd($getJsonContent);

        $page= ($page) ? Pages::where('name',$page)->first() : New Pages();
        // dd($page);
        if(isset($page->id) && !empty($page->id)){
            $page = sgParsePageData($page,$editable);
        }else{

            $page = New \StdClass();
            $page = sgParsePageData($page,$editable);
        }

        // Page Not Found
        if(!$page){
            // return redirect::back()->with('error', 'Oops!, Page Not Found');
             return abort(401);
        }

        $page->url= ($url) ? $url : null;
        $page->edit_url= ($edit_url) ? $edit_url : null;

        return $page;
    }


    function getPageByNameDynamic($page=null,$editable=false){

        // return abort(403);
        // $path = storage_path() . "/pages/test.json";

        // TODO:if no data gt from JSOn
        // $path = storage_path() . "/pagess/${page}.json";
        // $getJsonContent =json_decode(file_get_contents($path));
        // dd($getJsonContent);
        $getPageUrl = $page;
        $page= ($page) ? Pages::where('name',$page)->first() : New Pages();


        if(isset($page->id) && !empty($page->id)){
            $page = sgParsePageData($page,$editable);
        }else{

            $page = New \StdClass();
            $page = sgParsePageData($page,$editable);
        }

        // Page Not Found
        if(!$page){
            // return redirect::back()->with('error', 'Oops!, Page Not Found');
             return abort(401);
        }

        //
        $page->url= ($getPageUrl) ? $getPageUrl : null;
        $page->edit_url= route('front.page.edit',$getPageUrl);
        $page->resource= $getPageUrl;
        $page->resource_base= 'pages.front-end.';
        $page->return = sgGetResource($page);
        // dd($page);
        return $page;
    }

    function getCSR($page){
        $getPageUrl = $page;
        $pageData=  CSR::where('alias',$page)->first();
        $page=  CSR::where('alias',$page)->first();
        $page = sgParsePageData($page,false);
        $page->pageData=$pageData;
        return view ('pages.front-end.csr-inner',compact('page'));

         // $page = sgParsePageData($page,$editable);
    }


    function getCurrentRouteUrl(){
        $url = Route::currentRouteName();
        return $url;
    }

    function pageHome(){


        // $meta['title'] = 'Suguna Group';
        // $meta['description'] = 'Suguna Group is a global agro-food conglomerate built upon various companies that are strategically integrated for growth and excellence.';
        // $meta['keywords'] = 'Suguna Group ';
        // $meta['image'] = ' ';
        // $meta['canonical'] = '';
        // $meta['url'] = ' ';

        // $doc='{"homeSection2Title":"One Group<span>.</span><br>One Purpose<span>.</span><br>One Vision<span>.</span>","homeSection2Desciption":"Times change. Market evolves. New challenges are born. But what stays constant are our purpose and vision. While our purpose fuels the work we do, our vision navigates us in the pursuit of global nutritional security.","homeSection2EmployeeCount":"8,000+","homeSection2EmployeeText":"Employees","homeSection2CountriesCount":"<span class=\"liquid-counter-animator\"><span class=\"liquid-animator-value\">0</span><div class=\"liquid-animator-numbers\" data-value=\"0\"><ul style=\"transform: translateY(0%);\"><li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li></ul></div></span><span class=\"liquid-counter-animator\"><span class=\"liquid-animator-value\">4</span><div class=\"liquid-animator-numbers\" data-value=\"4\"><ul style=\"transform: translateY(-40%);\"><li>0</li><li>1</li><li>2</li><li>3</li><li>4</li><li>5</li><li>6</li><li>7</li><li>8</li><li>9</li></ul></div></span>","homeSection2CountriesText":"Countries"}';
        $page=  [];

        return view('pages.front-end.home',compact('page'));
    }

    function pageCart(Request $request){
      $page=  [];

        return view('pages.front-end.cart',compact('page'));
    }


    function pageCheckout(Request $request){
      $page=  [];

        return view('pages.front-end.checkout',compact('page'));
    }

      function pageThankYou(Request $request){
      $page=  [];

        return view('pages.front-end.thankyou',compact('page'));
    }  
    function pageMyAccount(Request $request){
      $page=  [];

        return view('pages.front-end.my-account',compact('page'));
    }

    function pageMyOrder(Request $request){
      $page=  [];

        return view('pages.front-end.my-order',compact('page'));
    }


    function pageHomeEdit(){
        $page= $this->getPageByName('home','front.home.index',$this->getCurrentRouteUrl(),true);
        // $meta = $page->meta;
        // $editable = $page->editable;
        // $doc= ($page->doc) ? $page->doc : [];
        // $docData= ($page->docData) ? $page->docData : [];
        // $id=$page->id;
        // $meta=$page->meta;
        // $editable=
        //  true;
        // dd($page);
        return view('pages.front-end.home',compact('page'));
    }

    function pageHomeStore(Request $request){

        $data = isset($request->doc) ? $request->doc : null;

        if($data){
            // TODO:save
            if($request->id){
                $page = Pages::find($request->id);
            }else{
                $page = New Pages();
            }
            $page->name = 'home';
            $page->route = \Request::route()->getName();
            $page->content = $data;

            // $page->url = \Request::route()->getName();
            $page->save();

            return response()->json(['success'=>true,'message'=>'Page Updated successfully']);

        }

    }


    function pageStore(Request $request){

        $data = isset($request->doc) ? $request->doc : null;

        if($data){
            // TODO:save
            if($request->id){
                $page = Pages::find($request->id);
            }else{
                $page = New Pages();
                $page->name =  $request->pageName;
            }
            $page->route = \Request::route()->getName();
            $page->content = $data;

            // $page->url = \Request::route()->getName();
            $page->save();

            return response()->json(['success'=>true,'message'=>'Page Updated successfully']);

        }else{
            return response()->json(['success'=>false,'message'=>'Unable to save this page']);
        }

    }

    function getPage(Request $request,$url){
        $page= $this->getPageByNameDynamic($url);
        return $page->return;
    }

    function getPageEdit(Request $request,$url){
        // dd($url);
        // $page= $this->getPageByName('home',$this->getCurrentRouteUrl(),'front.home.edit');
        $page= $this->getPageByNameDynamic($url,true);
        // dd($page);
        return $page->return;
    }

    function getSliderNews(){
        $news = News::all();
        return $news;
    }
     function getSliderCsr(){
        $csrs = CSR::all();
        return $csrs;
    }

    function getNews(Request $request){

       $query = News::query();

    // TODO: query check and DB change
       $query->when( ( isset($request->m)), function ($query) use ($request){

            $query = $query->whereMonth('date', $request->m);

            return $query;
        });
       $query->when( ( isset($request->y)), function ($query) use ($request){

            $query = $query->whereYear('date', $request->y);

            return $query;
        });

       // $empsalaries = EmpSalary:: whereMonth('salary_date', $date->month)
    // ->whereYear('salary_date', $date->year)
    // ->get()

        $limit = 30;
        $news = $query->paginate($limit);
        $page= $this->getPageByNameDynamic('news');
        return view('pages.front-end.news',compact('news','page'));
    }

     function getPressRelease(Request $request){

       $press_release = PressRelease::get();

       // $press_release_cat =PressRelease::select('category')->distinct()->get()->toArray();
       $press_release_cat = PressRelease::select('category')->distinct('category')->pluck('category')->filter()->flatten()->all();

       $finalData= New \StdClass;
       foreach ($press_release_cat as $cat) {
        // $tmp=[];
          $getData  = PressRelease::where('category',$cat)->get();
          // $tmp[]=
          $finalData->$cat=$getData;
       }

    // TODO: query check and DB change
       // $query->when( ( isset($request->m)), function ($query) use ($request){

       //      $query = $query->whereMonth('date', $request->m);

       //      return $query;
       //  });
       // $query->when( ( isset($request->y)), function ($query) use ($request){

       //      $query = $query->whereYear('date', $request->y);

       //      return $query;
       //  });

       // $empsalaries = EmpSalary:: whereMonth('salary_date', $date->month)
    // ->whereYear('salary_date', $date->year)
    // ->get()

        $limit = 30;
        // $press_release = $query->paginate($limit);
        $page= $this->getPageByNameDynamic('press_release');
        return view('pages.front-end.press_release',compact('finalData','page'));
    }
    function getMediaResources(Request $request){
       $media_resources = MediaResource::get();

       $limit = 100;
        // $press_release = $query->paginate($limit);

        $page= $this->getPageByNameDynamic('media_resources');

        return view('pages.front-end.media_resources',compact('media_resources','page'));
    }

    function getJobOpenings(Request $request){

       $job_openings = Career::get();
        // dd($job_openings);
       $limit = 100;
        // $press_release = $query->paginate($limit);

        $page= $this->getPageByNameDynamic('job_openings');

        return view('pages.front-end.job_openings',compact('job_openings','page'));
    }



    function getSearch(Request $request){
        // dd($request);
        $search = $request->s;
        // $media_resources = MediaResource::query();
        // $pages = Pages::query();
        // if($request->s){
        //     $media_resources->where('')
        // }

            $csr=CSR::where('title','LIKE',"%{$search}%")->get();
            $media_resources=MediaResource::where('title','LIKE',"%{$search}%")->get();
            $pages=Pages::where('name','LIKE',"%{$search}%")->get();
            // dd($pages);
        /*
        $csr = CSR::query();


        $csr->when( ( isset($request->q)), function ($csr) use ($request){

            $csr = $csr->where('title', 'LIKE', "%{$request->q}%")
                   ->orWhere('content', 'LIKE', "%{$request->q}%");


        });

        $media_resources->when( ( isset($request->q)), function ($media_resources) use ($request){

            $media_resources = $media_resources->where('title', 'LIKE', "%{$request->q}%");


        });
        $count = $media_resources->count();

        $pages->when( ( isset($request->q)), function ($pages) use ($request){

            $pages = $pages->where('name', 'LIKE', "%{$request->q}%");


        });

        // dd($pages);

        $limit= 100;
        $csr=$csr->paginate($limit);
        $media_resources=$media_resources->paginate($limit);
        $pages=$pages->paginate($limit);
        */


        $media_resourcescount = ($media_resources->count()) ? $media_resources->count() : 0;
        $csr_count = ($csr->count()) ? $csr->count() : 0;
        $pages_count = ($pages->count()) ? $pages->count() : 0;

        $count = $csr_count+$media_resourcescount+$pages_count;
        // Need tis page attribute for all FRONT END pages
        $page= $this->getPageByNameDynamic('search',false);

        // dd($media_resources);

         return view('pages.front-end.search',compact('media_resources','csr','page','pages','search', 'count'));
     }

     function getEmail(Request $request){

        $input = $request->all();

        $finalMessage='';
        // dd($request);
        $name= $request->input('name');
        $email= $request->input('email');
        $emailTo= $request->input('emailTo');
        $messageFor= $request->input('messageFor');
        // $mobile= $request->input('mobile');
        // $entity= $request->input('entity');
        // $regarding= $request->input('regarding');
        $message= $request->input('message');
        $subject= $request->input('subject');
        $details=[];

        foreach ($input as $key => $value) {
            if($key!='emailTo' || $key!='subject' || $key!='attachment'){

                $finalMessage.="$key".' : '.$value."\n";
                $details[$key]=$value;
            }
            // echo $key.' '.$value;
        }

         // dd($details);

        // dd($details);

        // $details = [
        //     'name' => $name,
        //     'email' => $email,
        //     'mobile' => $mobile,
        //     'entity' => $entity,
        //     'regarding' => $regarding,
        //     'message' => $message
        // ];
        $data=$details;
        // \Mail::to('bava.tealorca@gmail.com')->send(new \App\Mail\EmployeeGrievancePolicyMail($details));
        // dd($emailTo);
        // 
        
        if(isset($details['email'])){

            \Mail::send('pages.front-end.email', ['details'=>$details], function($message) use ($details,$emailTo,$messageFor) {
             $message->to($emailTo)->subject
                ($details['subject']);
             // $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
             // $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
             $message->from($details['email'],$details['name']);
            });
            return response()->json(['success'=>true,'message'=>'Thank you for getting in touch! ']);
        }else{

            return response()->json(['success'=>false,'message'=>'Oops!, unable to submit the form']);
        }
        // dd($details);


     }

}
