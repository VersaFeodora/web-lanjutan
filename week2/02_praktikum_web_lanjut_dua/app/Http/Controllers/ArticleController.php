<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(Request $request, $id){
        return 'Article Page with id '.$id;
    }
}
