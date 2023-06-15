<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Roles;
use App\Models\User;
use App\Models\Products;
use App\Models\Transactions;

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
        if($user->roles_id == 1){
          $products = Products::where('seller_id', $user->id);
          $prodID = $products->select('id')->get();
          $transaction = TransactionDetails::whereIn('product_id', $prodID);
          $transactionID = $transaction->select('transaction_id')->get();
          $trans = Transactions::whereIn('id', $transactionID)->get();
          $trans->delete();
          $transaction->delete();
          $products->delete();
        }
        $user->delete();
        $request->session()->forget('user');
        return redirect()->route('login');
    }
}
