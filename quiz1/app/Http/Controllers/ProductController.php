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
            $products = Products::where('seller_id', $user->id)->get();
            return view('content.products.product-list', array(
                'content' => $output,
                'products' => $products,
                'user' => $user,
                'role' => $role
            ));
        }
        
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
    public function search(Request $request)
    {
        $keyword = $request->search;
        $output = 'Product List';
        $user = $request->session()->get('user');
        $role = Roles::where('id', $user->roles_id)->first();
        $products = Products::where([['product_name','LIKE' ,"%".$keyword."%"],['seller_id', $user->id]])->get();
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
    public function update(Request $request, $id)
    {
        //
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
}
