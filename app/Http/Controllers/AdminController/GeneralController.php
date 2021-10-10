<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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



        $getSettings = settings::all();
        $data['title'] = 'Settings';
        $data['mainTitle'] = $getSettings[0]->title;
        $data['description'] = $getSettings[0]->description;
        $data['keywords'] = $getSettings[0]->keywords;
        $data['logo'] = $getSettings[0]->logo; // the logic will be changed
        $data['favicon'] = $getSettings[0]->favicon;
        $data['url'] = $getSettings[0]->url;
        $data['analytics'] = $getSettings[0]->analytics;
        return view('panel.settings', $data);
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
    public function update(Request $request)
    {
        $user = Auth::user()->email;
        if ($user == "admin@demo.com") {
          return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
        }
        $UpdateSettings = settings::find(1);
        $UpdateSettings->title = $request->title;
        $UpdateSettings->description = $request->description;
        $UpdateSettings->keywords = $request->keywords;
        $UpdateSettings->url = route('home');

        // logo ve favicon burada.

        if ($request->file('logo')){
          $logoName = $request->file('logo')->getClientOriginalName();
          $request->file('logo')->move(public_path('uploads/images'), $logoName);
          $deleteOldImagePath = public_path().'/uploads/images/'.$UpdateSettings->logo;
          if(file_exists($deleteOldImagePath)) {
            $deleteOldImage  = unlink($deleteOldImagePath);
          }
          $UpdateSettings->logo = $logoName;
        }

        if ($request->file('favicon')){
          $faviconName = $request->file('favicon')->getClientOriginalName();
          $request->file('favicon')->move(public_path('uploads/images'), $faviconName);
          $deleteOldFaviconPath = public_path().'/uploads/images/'.$UpdateSettings->favicon;
          if(file_exists($deleteOldFaviconPath)) {
            $deleteOldFavicon  = unlink($deleteOldFaviconPath);
          }

          $UpdateSettings->favicon = $faviconName;
        }

        $UpdateSettings->update();
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
        return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
      }
      $data['title'] = "Kategori Ekle";

      if ($_POST) {
        $catAdd = new Category();

        $catAdd->category_name = $request->title;
        $catAdd->category_slug = Str::slug($request->title);
        $catAdd->save();
        return redirect()->back()->with('success', 'The category was successfully added.');
      }

      return view('panel.categoriesAdd', $data);
    }

    public function categoriesdelete($cat_id)
    {
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
      }
      Category::find($cat_id)->delete();
      return redirect()->back()->with('success','The category was successfully deleted.');
    }

    public function categoriesedit(Request $request, $cat_id)
    {
      if ($_POST){
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



      if ($_POST) {
        $user = Auth::user()->email;
        if ($user == "admin@demo.com") {
          return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
        }

        $findUser = User::find(1);
        $currentpassword1 = $request->currentpassword1;
        $currentpassword2 = $request->currentpassword2;
        $futurepassword   = $request->futurepassword;

        if ($currentpassword1 == $currentpassword2) {


            if (!Hash::check($currentpassword1, $findUser->password)) {

                  return redirect()->back()->with('failed', 'Bir aksilik oluştu. Tekrar deneyiniz.');

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


      $data['title'] = "Şifre Değiştir";
      return view('panel.changePassword', $data);
    }
    public function FooterContent(Request $request){

        $data['title'] = "Footer Alanını Düzenle";
        if ($_POST) {
          $user = Auth::user()->email;
          if ($user == "admin@demo.com") {
            return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
          }
          $FooterContentUpdate = FooterContent::find(1);


          $FooterContentUpdate->footer_title                =  $request->footer_title;
          $FooterContentUpdate->footer_content              =  $request->footer_content;
          $FooterContentUpdate->copyright                   =  $request->copyright;
          $FooterContentUpdate->footer_main_link_title      =  $request->footer_main_link_title;
          $FooterContentUpdate->save();

          return redirect()->back()->with('success','Settings were successfuly updated.');



        }
        return view('panel.footerEdit', $data);
    }



    public function FooterLinks(Request $request){

        $data['title'] = "Footer Linkleri Düzenle";
        if ($_POST) {
          $user = Auth::user()->email;
          if ($user == "admin@demo.com") {
            return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
          }
          $footerLinksUpdate1 = FooterLinks::find(1);
          $footerLinksUpdate1->footer_link_title = $request->link_1_title;
          $footerLinksUpdate1->footer_link       = $request->link_1_href;
          $footerLinksUpdate1->save();

          $footerLinksUpdate2 = FooterLinks::find(2);
          $footerLinksUpdate2->footer_link_title = $request->link_2_title;
          $footerLinksUpdate2->footer_link       = $request->link_2_href;
          $footerLinksUpdate2->save();

          $footerLinksUpdate3 = FooterLinks::find(3);
          $footerLinksUpdate3->footer_link_title = $request->link_3_title;
          $footerLinksUpdate3->footer_link       = $request->link_3_href;
          $footerLinksUpdate3->save();

          $footerLinksUpdate4 = FooterLinks::find(4);
          $footerLinksUpdate4->footer_link_title = $request->link_4_title;
          $footerLinksUpdate4->footer_link       = $request->link_4_href;
          $footerLinksUpdate4->save();

          return redirect()->back()->with('success','Links were successfully updated!');
        }
        return view('panel.footerLinks', $data);
    }

    public function messages(){
      $data['title'] = "Sayfaya gelen mesajlar";
      $data['messages'] = Messages::all();
      return view('panel.messages', $data);
    }

    public function messagesView($id){
      $messageView = Messages::find($id);
      $data['title'] = $messageView->name;
      //

      $data['name'] = $messageView->name;
      $data['email'] = $messageView->email;
      $data['subject'] = $messageView->subject;
      $data['message'] = $messageView->message;
      $data['formCheck'] = $messageView->formCheck;
      $data['date'] = $messageView->created_at;

      return view('panel.messagesView', $data);
    }

    public function messagesDelete($id){
      $user = Auth::user()->email;
      if ($user == "admin@demo.com") {
        return redirect()->back()->with('demo', 'Demo modda düzenleme yapamazsınız.');
      }
      $messageView = Messages::find($id)->delete();
      return redirect()->back()->with('success','Successfully deleted.');
    }

}
