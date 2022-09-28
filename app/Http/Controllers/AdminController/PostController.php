<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\posts;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Posts';
        $data['posts'] = posts::all()->sortByDesc('id');
        $data['categories'] = Category::all();
        return view('panel.posts', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data['title'] = "Add New Post";
      $data['category'] = Category::all();
      return view('panel.addPost', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'You cannot editing on demo mode.');
      }

      $newPost = posts::create([
        'title'                 => $request->title,
        'short_description'     => $request->short_desc,
        'description'           => $request->description,
        'keywords'              => $request->keywords,
        'slug'                  => Str::slug($request->title),
        'cat_id'                => $request->category
      ]);


      // validate request will be added.
      if ($request->file('image')){
        $ImageName = $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('uploads/images/posts'), $ImageName);
        $deleteOldImagePath = public_path().'/uploads/images/posts/'.$newPost->image;

         $deleteOldImagePath = public_path().'/uploads/images/posts/'.$newPost->image;
        $newPost->update([
            'image' => $ImageName
        ]);
      }

      if ($newPost) {
        return redirect()->back()->with('success', 'Successfully Added!');
      }


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
        $data['post'] = posts::find($id);
        $data['category'] = Category::all();
        $data['title'] = $data['post']->title;
        return view('panel.editPost',$data);
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
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
      }
        $updatePost = posts::find($id);
        $updatePost->update([
          'title'                => $request->title,
          'short_description'    => $request->short_desc,
          'description'          => $request->description,
          'keywords'             => $request->keywords,
          'cat_id'               => $request->category
        ]);
          // image

          // validate request will be added.
          if ($request->file('image')){
            $ImageName = $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('uploads/images/posts'), $ImageName);
            $deleteOldImagePath = public_path().'/uploads/images/posts/'.$updatePost->image;
            if(file_exists($deleteOldImagePath)) {
              $deleteOldImage  = unlink($deleteOldImagePath);
            }
            $updatePost->update([
              'image' => $ImageName
            ]);
          }

          $UpdatePost->save();
            return redirect()->back()->with('success', 'Successfully Updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
      }
        $DeletePost = posts::find($id);
        $DeletePost->delete();
        return redirect()->back()->with('success', 'Successfully Deleted.');
    }

    public function activepassive(Request $request, $id)
    {
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
      }
      $updateActiveStatus = posts::find($id);
      $updateActiveStatus->active = $request->durum;
      $updateActiveStatus->save();
            if ($updateActiveStatus->save()) {
              return response()->json(
	     [
                'success' => 'Basarili!'
              ]
);
            }

    }

}
