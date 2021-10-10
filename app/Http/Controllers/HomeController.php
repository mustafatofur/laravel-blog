<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use Carbon\Carbon;
use App\Models\posts;
use App\Models\Category;
use App\Models\settings;
use App\Models\Messages;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      // OG Title
      $data['title'] = app()->make('settings')->title;
      $data['description'] = app()->make('settings')->description;
      $data['image'] = app()->make('settings')->logo;
      $data['keywords'] = app()->make('settings')->keywords;
      // OG Title End

        $data['cats'] = Category::all();

        $data['posts'] = posts::where('active', 1)->orderByDesc('created_at')->paginate(9);
        $data['popularPosts'] = DB::table('posts')->where('active', 1)->orderBy('counter','desc')->limit(3)->get();
        $data['main_title'] = settings::find(1)->title;
        $data['main_description'] = settings::find(1)->description;
      $datetime = Carbon::now('Europe/Istanbul');
      setlocale(LC_TIME, 'Turkish');
      $data['date'] = $datetime->formatLocalized('%d %B %Y');
        return view('index', $data);

    }

    public function single()
    {
        $data['cats'] = Category::all();
        return view('single');
    }

    public function singlePost($id)
    {
      $findPost = DB::table('posts')->where('active', 1)->find(['id' => $id]);

      // OG Title
      $data['Vtitle'] = $findPost->title;
      $data['Vdescription'] = $findPost->short_description;
      $data['Vimage'] = $findPost->image;
      $data['Vkeywords'] = $findPost->keywords;
      // OG Title End


      if (!$findPost) {
        return redirect()->route('home');
      }

      if(cookie('cookie') !="counter") {
        $counter = posts::find($id);
        $counter->counter++;
        $counter->save();
      }

        $data['popularPosts'] = DB::table('posts')->where('active', 1)->orderBy('counter','desc')->limit(3)->get();

        $data['title'] = $findPost->title;
        $data['short_description'] = $findPost->short_description;
        $data['description'] = $findPost->description;
        $data['image'] = $findPost->image;


        // Keywords Functions
        $data['keywords'] = explode(', ',$findPost->keywords);
        $data['countkeywords'] = count($data['keywords']);
        $data['count_num'] =  0;


        // Date Functions
        setlocale (LC_ALL, 'tr_TR.UTF-8', 'tr_TR', 'tr', 'turkish');

        $time = strtotime($findPost->created_at);
        $data['date']  =  strftime('%e %B %Y', $time);

        return view('single', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function clickLink($link_md5)
     {
         $findLink = DB::table('posts')->where('link_md5', $link_md5)->first();
         return redirect()->to($findLink->link)->send();
     }


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

    public function category($cat_id, $category_slug){
      $data['popularPosts'] = DB::table('posts')->orderBy('counter','desc')->limit(3)->get();


      $catPosts = Category::find($cat_id);

      // OG Title
      $data['title'] = $catPosts->category_name;
      $data['description'] = app()->make('settings')->description;
      $data['image'] = app()->make('settings')->logo;
      $data['keywords'] = $catPosts->category_name;
      // OG Title End



      $GetPosts = posts::where('cat_id', $catPosts->cat_id)->paginate(9);
      $data['category_title'] = $catPosts->category_name;
      $data['postFromCategory'] = $GetPosts;
      $datetime = Carbon::now('Europe/Istanbul');
      setlocale(LC_TIME, 'Turkish');
      $data['date'] = $datetime->formatLocalized('%d %B %Y');
      return view('category',$data);
    }

    public function search(Request $request){
      if ($_POST) {

        $data['searchterm'] = $request->searchterm;
        $data['title'] = $request->searchterm;
        $data['searchterm'] = $request->searchterm;

        $data['popularPosts'] = DB::table('posts')->orderBy('counter','desc')->limit(3)->get();

        $GetPosts = posts::where('title','LIKE', "%$request->searchterm%")->orWhere('description','LIKE', "%$request->searchterm%")->paginate(9);

        $data['postFromSearch'] = $GetPosts;
        $data['cats'] = Category::all();

        return view('search',$data);

      }
      return "Arama yapılmadı. 404.";
      return view('search',$data);
    }
    public function contact(Request $request) {
      $data['title'] = "Contact us";

        if($_POST) {
          $validdata = $request->validate([
              'captcha' => 'required|captcha',
              'name' => 'required',
              'email' => 'required',
              'message' => 'required|min:15'
          ]);
        $contactSave = new Messages();

        $contactSave->name      = $request->name;
        $contactSave->email     = $request->email;
        $contactSave->subject   = $request->subject;
        $contactSave->message   = $request->message;

        if($request->formCheck  == 1) {
          $contactSave->formCheck = "yes";
        } else {
          $contactSave->formCheck = "no";
        }

        $contactSave->save();

          return redirect()->back()->with('success','Your message has been sent.');

        }

      return view('contact', $data);
    }

    public function tags($slug){
        $data['title'] = $slug;
        $data['keywordtitle'] = $slug;
        $data['popularPosts'] = DB::table('posts')->orderBy('counter','desc')->limit(3)->get();
        $GetPosts = posts::where('keywords','LIKE', "%$slug%")->paginate(9);

        // OG Title
        $data['title'] = $slug;
        $data['description'] = $slug;
        $data['image'] = app()->make('settings')->logo;
        $data['keywords'] = $slug;
        // OG Title End


        $data['postFromTags'] = $GetPosts;
        $data['cats'] = Category::all();
        return view('tag', $data);
    }

}
