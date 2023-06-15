<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\Transactions;

class Analytics extends Controller
{
  public function index(Request $request)
  {
    if($request->session()->missing('user')){
      return redirect(Route('login'));
    }else{
      $user = $request->session()->get('user');
      $role = Roles::where('id', $user->roles_id)->first();
      return view('content.dashboard.dashboards-analytics', array(
        'role' => $role,
        'user' => $user
      ));
    }
  }
}
