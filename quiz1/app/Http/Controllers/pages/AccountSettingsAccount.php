<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;

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
}
