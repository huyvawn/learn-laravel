<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

use Illuminate\Http\Request;

class WebController extends Controller
{
    //
    public function home(){
        $categories= Category::all()->toArray();
        $products= Product::paginate(3);
        // dd($categories); // dd= vardump +die -- debug purposes
        return view("welcome",compact("categories","products"));
    }
    public function about(){
        return view("about");
    }
    public function category($id){
        $categories= Category::all();
        return view("category");
    }
}
