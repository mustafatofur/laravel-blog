<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\settings;
use App\Models\Category;
use App\Models\User;
use App\Models\FooterContent;
use App\Models\FooterLinks;
use App\Models\Messages;

class GeneralController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'Home Page';
        return view('panel.index', $data);
    }

    public function settings()
    {
        $settings = settings::find(1);
        return view('panel.settings', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user()->email;
        if ($user == "admin@demo.com") {
          return redirect()->back()->with('demo', 'You cannot change anything when you using demo mode..');
        }
        $settings = settings::find(1);
     
        // logo ve favicon here.

        if ($request->file('logo')){
          $logoName = $request->file('logo')->getClientOriginalName();
          $request->file('logo')->move(public_path('uploads/images'), $logoName);
          $deleteOldImagePath = public_path().'/uploads/images/'.$settings->logo;
          if(file_exists($deleteOldImagePath)) {
            $deleteOldImage  = unlink($deleteOldImagePath);
          }
        }

        if ($request->file('favicon')){
          $faviconName = $request->file('favicon')->getClientOriginalName();
          $request->file('favicon')->move(public_path('uploads/images'), $faviconName);
          $deleteOldFaviconPath = public_path().'/uploads/images/'.$settings->favicon;
          if(file_exists($deleteOldFaviconPath)) {
            $deleteOldFavicon  = unlink($deleteOldFaviconPath);
          }
        }

        $UpdateSettings = $settings->update([
          'title'       => $request->title,
          'description' => $request->description,
          'keywords'    => $request->keywords,
          'logo'        => isset($logoName) ?: $settings->logo,
          'favicon'     => isset($faviconName) ?: $settings->favicon
        ]);


        return redirect()->back()->with('success', 'Settings are successfully saved.');
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

    public function categories()
    {
      $data['title'] = "Categories";
      $data['categories'] = Category::all();
      return view('panel.categories', $data);
    }


    public function categoriesadd(Request $request)
    {
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'You cannot change anything when you using demo mode..');
      }
      $data['title'] = "Add Category";

      if ($request->isMethod('post')) {
        $catAdd = Category::updateOrCreate([
          'category_name' => $request->title,
          'category_slug' => Str::slug($request->title)
        ]);

        return redirect()->back()->with('success', 'The category was successfully added.');
      }

      return view('panel.categoriesAdd', $data);
    }

    public function categoriesdelete($cat_id)
    {
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'You cannot change anything when you using demo mode..');
      }
      Category::find($cat_id)->delete();
      return redirect()->back()->with('success','The category was successfully deleted.');
    }

    public function categoriesedit(Request $request, $cat_id)
    {
      if ($request->isMethod('post')){
        $catEdit = Category::find($cat_id);
        $catEdit->category_name = $request->title;
        $catEdit->category_slug = Str::slug($request->title);
        $catEdit->save();

        return redirect()->back()->with('success','The category was successfully updated .');
      }


      $data['category'] = Category::find($cat_id);
      $data['title'] = $data['category']->category_name;
      return view('panel.categoriesEdit', $data);
    }

    public function AdminSettings(Request $request){
      if ($request->isMethod('post')) {
        $user = Auth::user()->email;
        if ($user == "admin@demo.com") {
          return redirect()->back()->with('demo', 'You cannot change anything when you using demo mode..');
        }

        $findUser = User::find(1);
        $currentpassword1 = $request->currentpassword1;
        $currentpassword2 = $request->currentpassword2;
        $futurepassword   = $request->futurepassword;

        if ($currentpassword1 == $currentpassword2) {
            if (!Hash::check($currentpassword1, $findUser->password)) {

                  return redirect()->back()->with('failed', 'An error occured. Please try again.');

            } else {
              $findUser->password = Hash::make($futurepassword);
              $findUser->save();

              $loginAgain = $findUser->only('email', 'password');
              Auth::attempt($loginAgain);
              return redirect()->back()->with('success', 'Password has successfully changed!');
            }

        } else {
              return redirect()->back()->with('failed', 'Your passwords are different. Please try again.');
        }
      }
      $data['title'] = "Change Password";
      return view('panel.changePassword', $data);
    }
    public function FooterContent(Request $request){

        $data['title'] = "Arrange Footer Area";
        if ($request->isMethod('post')) {
          $user = Auth::user()->email;
          if ($user == "admin@demo.com") {
            return redirect()->back()->with('demo', 'You cannot change anything when you using demo mode.');
          }
          $FooterContentUpdate = FooterContent::find(1);
          FooterContent::find(1)->update([
            'footer_title'            => $request->footer_title,
            'footer_content'          => $request->footer_content,
            'copyright'               => $request->copyright,
            'footer_main_link_title'  => $request->footer_main_link_title
          ]);

          return redirect()->back()->with('success','Settings were successfuly updated.');
        }
        return view('panel.footerEdit', $data);
    }



    public function FooterLinks(Request $request){

        $data['title'] = "Footer Linkleri Düzenle";
        $links = FooterLinks::all();
        if ($request->isMethod('post')) {
          // If any link has been removed
          $deleted = FooterLinks::whereNotIn('id', array_keys($request->link))->get();
          foreach ($deleted as $delete) {$delete->delete();}
          // If any link has been updated
          $updated = FooterLinks::whereIn('id', array_keys($request->link))->get();
          foreach ($updated as $link) {$link->update([
            'footer_link_title' => $request->link[$link->id]['title'],
            'footer_link' => $request->link[$link->id]['href']
          ]);}

          // If any link has been added
          if($request->newLink) {
            foreach ($request->newLink as $newLink) {
              FooterLinks::create([
                'footer_link_title' => $newLink['title'],
                'footer_link' => $newLink['href']
              ]);
            }
          }
 
          $user = Auth::user()->email;
          if ($user == "admin@demo.com") {
            return redirect()->back()->with('demo', 'You cannot change anything when you using demo mode.');
          }
          return redirect()->back()->with('success','Links were successfully updated!');
        }
        return view('panel.footerLinks', compact('links'));
    }

    public function messages(){
      $messages = Messages::all();
      return view('panel.messages', compact('messages'));
    }

    public function messagesView($id){
      $message = Messages::find($id);
      return view('panel.messagesView', compact('message'));
    }

    public function messagesDelete($id){
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'You cannot change anything when you using demo mode.');
      }
      $messageView = Messages::find($id)->delete();
      return redirect()->back()->with('success','Successfully deleted.');
    }

}
