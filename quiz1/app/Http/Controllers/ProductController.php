<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\User;
use App\Models\Roles;

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
                'users' => $users,
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
        $role = Roles::where('id', $user->roles_id)->first();
        
        if($role->id == 1){
            $products = Products::where([['product_name','LIKE' ,"%".$keyword."%"],['seller_id', $user->id]])->get();
        }else{
            $products = Products::where('product_name','LIKE' ,"%".$keyword."%")->get();
        }
        return view('content.products.product-list', array(
            'content' => $output,
            'products' => $products,
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
    public function filter($cat, Request $request){
        if($request->session()->missing('user')){
            return redirect(Route('login'));
        }else{
            $output = 'Product List';
            $user = $request->session()->get('user');
            $role = Roles::where('id', $user->roles_id)->first();
            if($role->id == 1){
                $products = Products::where([['seller_id', $user->id],['category_id', $cat]])->get();
            }else{
                $products = Products::where('category_id', $cat);
            }
            return view('content.products.product-list', array(
                'content' => $output,
                'products' => $products,
                'user' => $user,
                'role' => $role
            ));
        }
    }
}
