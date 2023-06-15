<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Roles;
use App\Models\TransactionDetails;
use App\Models\Transactions;
use Illuminate\Support\Facades\DB;
Use \Carbon\Carbon;
use PDF;
use DateTime;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->session()->missing('user')){
            return redirect(Route('login'));
        }else{
            $output = 'Product List';
            $user = $request->session()->get('user');
            $role = Roles::where('id', $user->roles_id)->first();
            $users = User::get();
            if($role->id == 1){
                $products = Products::where('seller_id', $user->id)->get();
            }else{
                $products = Products::get();
            }
            return view('content.products.product-list', array(
                'content' => $output,
                'products' => $products,
                'user' => $user,
                'role' => $role,
                'users' => $users
            ));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = $request->session()->get('user');
        $product = Products::create([
            'product_name' => $request->product_name,
            'seller_id' => $user->id,
            'file_path' => $request->file_path,
            'category_id' => $request->category_id,
            'product_stock' => $request->product_stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        $product->save();
        return redirect()->route('products');
    }
    

    public function delete(Request $request, $id)
    {
        TransactionDetails::where('product_id', $id)->delete();
        $product = Products::where('id', $id);
        $product->delete();
        return redirect()->route('products');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $keyword = $request->search;
        $output = 'Product List';
        $user = $request->session()->get('user');
        $users = User::get();
        $role = Roles::where('id', $user->roles_id)->first();
        $sortprice = $request->sortprice;
        $sortrate = $request->sortrate;
        if($user->roles_id == 1){
            if($sortprice == 'asc'){
                $products = Products::orderBy('price')->where([['product_name','LIKE' ,"%".$keyword."%"],['seller_id', $user->id]])->get();
            }else if($sortprice == 'dsc'){
                $products = Products::orderBy('price', 'DESC')->where([['product_name','LIKE' ,"%".$keyword."%"],['seller_id', $user->id]])->get();
            }else{
                $products = Products::where([['product_name','LIKE' ,"%".$keyword."%"],['seller_id', $user->id]])->get();
            }
        }else{
            if($sortprice == 'asc'){
                $products = Products::orderBy('price')->where('product_name','LIKE' ,"%".$keyword."%")->get();
            }else if($sortprice == 'dsc'){
                $products = Products::orderBy('price', 'DESC')->where('product_name','LIKE' ,"%".$keyword."%")->get();
            }else{
                $products = Products::get();
            }
        }
        return view('content.products.product-list', array(
            'content' => $output,
            'products' => $products,
            'user' => $user,
            'role' => $role,
            'users' => $users
        ));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editPage(Request $request, $id)
    {
        $product = Products::where('id', $id)->first();
        $user = $request->session()->get('user');
        $role = Roles::where('id', $user->roles_id)->first();
        return view('content.products.product-edit', array(
            'product' => $product,
            'user' => $user,
            'role' => $role
        ));
    }

        /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addCartPage(Request $request, $id)
    {
        $product = Products::where('id', $id)->first();
        $user = $request->session()->get('user');
        $role = Roles::where('id', $user->roles_id)->first();
        return view('content.products.product-addcart', array(
            'product' => $product,
            'user' => $user,
            'role' => $role
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addPage(Request $request)
    {
        $product = null;
        $user = $request->session()->get('user');
        $role = Roles::where('id', $user->roles_id)->first();
        return view('content.products.product-add', array(
            'product' => $product,
            'user' => $user,
            'role' => $role
        ));
    }

    public function addCart(Request $request, $id)
    {
        $user = $request->session()->get('user');
        $status = "new";
        $date = now()->format('Y-m-d');
        $t = Transactions::create([
            'buyer_id' => $user->id,
            'transaction_date' => (new DateTime)->format('Y-m-d'),
            'status' => $status
        ]);
        $t->save();
        $transID = DB::getPdo('transactions')->lastInsertId();
        $transdetail = TransactionDetails::create([
            'transaction_id' => $transID,
            'product_id' => $id,
            'quantity' => $request->qty
        ]);
        $transdetail->save();
        return redirect()->route('products');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        Products::where('id', $id)->update([
            'product_name' => $request->product_name,
            'file_path' => $request->file_path,
            'category_id' => $request->category_id,
            'product_stock' => $request->product_stock,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return redirect()->route('products');
    }
    public function filter($cat, Request $request){
        if($request->session()->missing('user')){
            return redirect(Route('login'));
        }else{
            $output = 'Product List';
            $user = $request->session()->get('user');
            $role = Roles::where('id', $user->roles_id)->first();
            $users = User::get();
            if($role->id == 1){
                //$products = Products::where([['seller_id', $user->id],['category_id', $cat]])
                //            ->leftJoin('transactionDetails', 'transactionDetails.product_id', '=', 'products.id')
                //            ->select(['products.*', DB::raw('AVG(transactionDetails.rating) as avgrating')])
                //            ->get();
                $products = Products::where([['seller_id', $user->id],['category_id', $cat]])->get();
            }else{
                $products = Products::where('category_id', $cat)->get();
            }
            return view('content.products.product-list', array(
                'content' => $output,
                'products' => $products,
                'user' => $user,
                'users' => $users,
                'role' => $role
            ));
        }
    }
}
