<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class UserController extends Controller
{
    public function index()
  {
    return view('content.authentications.auth-login-basic');
  }
  public function checklogin()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function actionlogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username','LIKE' ,$username)->first();
        if ($user!=null){
            if($user->password==$password){
                $request->session()->put('user', $user);
                return redirect(Route('dashboard-analytics'));
            }else{
                Session::flash('error', 'Username or Password Wrong');
                return redirect(Route('login'))->with(['info' => 'Email or Password Wrong']);
            }
        }else{
            Session::flash('error', 'Username or Password Wrong');
            return redirect(Route('login'))->with(['info' => 'Email or Password Wrong']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
    public function register(){
        return view('content.authentications.auth-register-basic');
    }
}
