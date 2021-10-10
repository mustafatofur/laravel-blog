<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{

    public function login(Request $request){

      if ($_POST) {
        $formLogin = $request->validate([
              'email' => 'required',
              'password' => 'required'
        ]);
        $login = $request->only('email', 'password');

    if (DB::table('users')->where('email', $request->email)->first() === null)

    {
      return redirect()->back()->with('emailError', 'Email adress is not correct!');
    }
    else {
      if (!Hash::check($request->password, DB::table('users')->where('email', $request->email)->first()->password)) {
        return redirect()->back()->with('passError', 'Password is not correct!');
      } else {
          Auth::attempt($login);
            return redirect()->route('settings');
      }
    }




        // if (User::find(1)->password != Hash::make($request->password)) {
        //   return redirect()->back()->with('passError', 'Şifreniz yanlış!');
        // }


        if (Auth::attempt($login)) {

            return redirect()->route('settings');


    }

    else {return back()->with('loginError', 'An error occurred.');}

      }

            return view('panel.login');
}

    public function logout(){

      Auth::logout();
      return redirect()->route('login');

    }



}
