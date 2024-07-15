<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
    
        $data = Product::all();
        $banne = Banner::all();
        $cate = Category::all();
        return view('Home.index', compact('data','banne','cate'));
        
    }
    public function show($id){
       $data = Product::findOrFail($id);
       return view('Home.show', ['product'=>$data]);
    }

}
