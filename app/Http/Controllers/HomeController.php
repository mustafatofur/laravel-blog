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
        $data['cats'] = Category::all();

        $data['posts'] = posts::where('active', 1)->orderByDesc('created_at')->paginate(9);
        $data['main_title'] = settings::find(1)->title;
        $data['main_description'] = settings::find(1)->description;
      $datetime = Carbon::now();
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
        $data['title'] = $findPost->title;
        $data['short_description'] = $findPost->short_description;
        $data['description'] = $findPost->description;
        $data['image'] = $findPost->image;


        // Keywords Functions
        $data['keywords'] = explode(', ',$findPost->keywords);
        $data['countkeywords'] = count($data['keywords']);
        $data['count_num'] =  0;

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

    public function category($cat_id, $category_slug){
      $category = Category::find($cat_id);
      $posts = $category->posts()->paginate(9);
      $datetime = Carbon::now();
      $data['date'] = $datetime->formatLocalized('%d %B %Y');
      return view('category', compact('category', 'posts'));
    }

    public function search(Request $request){
      if ($request->isMethod('post')) {

        $data['searchterm'] = $request->searchterm;
        $data['title'] = $request->searchterm;
        $data['searchterm'] = $request->searchterm;

        $GetPosts = posts::where('title','LIKE', "%$request->searchterm%")->orWhere('description','LIKE', "%$request->searchterm%")->paginate(9);

        $data['postFromSearch'] = $GetPosts;
        $data['cats'] = Category::all();

        return view('search',$data);

      }
      return "Arama yapılmadı. 404.";
    }
    public function contact(Request $request) {
      $data['title'] = "Contact us";

        if($request->isMethod('post')) {
          $validdata = $request->validate([
              'captcha' => 'required|captcha',
              'name' => 'required',
              'email' => 'required',
              'message' => 'required|min:15'
          ]);
        
        $sendMessage = Messages::create([
          'name'      => $request->name,
          'email'     => $request->email,
          'subject'   => $request->subject,
          'message'   => $request->message,
          'newsletter' => $request->formCheck ? 1 : 0
        ]);
          
        return $sendMessage ? redirect()->back()->with('success','Your message has been sent.') : redirect()->back()->with('error','An error occured. Please try again later.');
        }

      return view('contact', $data);
    }

    public function tags($slug){
        $data['title'] = $slug;
        $data['keywordtitle'] = $slug;
        $data['postFromTags'] = posts::where('keywords','LIKE', `%$slug%`)->paginate(9);
        $data['cats'] = Category::all();
        return view('tag', $data);
    }

}
