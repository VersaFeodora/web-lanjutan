<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;

class AccountSettingsAccount extends Controller
{
  public function index(Request $request)
  {
    $user = $request->session()->get('user');
    $role = Roles::where('id', $user->roles_id)->first();
    return view('content.pages.pages-account-settings-account',array(
      'user' => $user,
      'role' => $role
      ));
  }
  public function actionupdate(Request $request)
    {
        $user = $request->session()->get('user');
        $role = Roles::where('id', $user->roles_id)->first();
        $user->update([
            'username' => $request->username,
            'first_name' => $request->firstName,
            'last_name' => $request->lastName,
            'email' => $request->email,
            'phonenumber' => $request->phoneNumber,
            'address' => $request->address,
            'roles_id' => $request->roles,
            'password' => $request->password
        ]);
        return view('content.pages.pages-account-settings-account',array(
          'user' => $user,
          'role' => $role
          ));
    }
    public function deactivate(Request $request)
    {
        $user = $request->session()->get('user');
        $user->delete();
        $request->session()->forget('user');
        return redirect()->route('login');
    }
}
