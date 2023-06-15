<?php

namespace App\Http\Controllers\tables;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Roles;
use App\Models\Transactions;
use App\Models\TransactionDetails;
use Illuminate\Support\Facades\DB;
use PDF;

class transactiontblController extends Controller
{
  public function index(Request $request)
  {
    $user = $request->session()->get('user');
    $role = Roles::where('id', $user->roles_id)->first();
    $users = User::get();
    if($user->roles_id == 1){
      $productsId = Products::where('seller_id', $user->id)->select('id')->get();
      $products = Products::where('seller_id', $user->id)->get();
      $transactions = DB::table('transactiondetails')
        ->join('transactions', 'transactiondetails.transaction_id', '=', 'transactions.id')
        ->whereIn('product_id', $productsId)->get();
    }else{
      $productsId = Products::select('id')->get();
      $products = Products::get();
      $transactions = DB::table('transactiondetails')
        ->join('transactions', 'transactiondetails.transaction_id', '=', 'transactions.id')
        ->where('buyer_id', $user->id)->get();
    }
    return view('content.tables.transaction-tbl', array(
      'products' => $products,
      'user' => $user,
      'role' => $role,
      'users' => $users,
      'products' => $products,
      'transactions' => $transactions
  ));
  }
  public function createPDF(Request $request, $id)
  {
      $user = $request->session()->get('user');
      $users = User::get();
      $role = Roles::where('id', $user->roles_id)->first();
      $transactions = DB::table('transactiondetails')->where('transactiondetails.id', $id)
      ->join('transactions', 'transactiondetails.transaction_id', '=', 'transactions.id')
      ->first();
      $tranc = DB::table('transactions')->where('id', $transactions->transaction_id)->first();
      $product = Products::where('id', $transactions->product_id)->get();
      return view('content.tables.transaction-pdf', array(
        'products' => $product,
        'user' => $user,
        'role' => $role,
        'users' => $users,
        'product' => $product,
        'transactions' => $transactions,
        'tranc' => $tranc
    ));
  }
  public function detail(Request $request, $id){
    $user = $request->session()->get('user');
      $users = User::get();
      $role = Roles::where('id', $user->roles_id)->first();
      $transactions = DB::table('transactiondetails')->where('id', $id)->first();
      $tranc = DB::table('transactions')->where('id', $transactions->transaction_id)->first();
      $products = Products::where('id', $transactions->product_id)->first();
      return view('content.tables.transaction-detail', array(
        'products' => $products,
        'user' => $user,
        'role' => $role,
        'users' => $users,
        'products' => $products,
        'transactions' => $transactions,
        'tranc' => $tranc
    ));
  }
}
