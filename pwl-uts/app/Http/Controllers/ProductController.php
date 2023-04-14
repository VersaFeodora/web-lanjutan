<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request){
        $keyword = $request->search;
        $products = Product::where('product_name','LIKE',"%".$keyword."%")->orwhere('product_category','LIKE' ,"%".$keyword."%")->orwhere('product_code','LIKE' ,"%".$keyword."%")->get();
        return view('tables',compact('products'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $product = Product::create([
            'product_code' => $request->code,
            'product_name' => $request->name,
            'product_category' => $request->cat,
            'product_stock' => $request->quantity,
            'price' => $request->price
        ]);
        $product->save();
        return redirect()->route('products.index');
    }
    public function destroy(Request $request, $id){
        $product = Product::where(['id' => $id])->first();
        $product->delete();
        return redirect()->route('products.index');
    }
    public function show(Request $request, $id){
        $product = Product::where(['id' => $id])->first();
        return view('update')->with('product', $product);
    }
    public function update(Request $request, $id){
        Product::where('id', $id)->update([
            'id' => $id,
            'product_code' => $request->code,
            'product_name' => $request->name,
            'product_category' => $request->cat,
            'product_stock' => $request->quantity,
            'price' => $request->price
        ]);
        return redirect()->route('products.index');
    }
}