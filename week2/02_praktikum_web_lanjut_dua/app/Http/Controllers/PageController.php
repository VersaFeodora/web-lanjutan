<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return 'Welcome';
    }
    public function about(){
        return '2141720156 Versacitta Feodora Ramadhani';
    }
    public function articles(Request $request, $id){
        return 'Article Page with id '.$id;
    }
}
