<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;

class PublicController extends Controller
{


    public function index(){

        //$category = new Category();
        //$categories = $category->tree();

        //$products = Product::all();

        /*return view('welcome', [
            'categories'    => $categories,
            'products'      => $products
        ]);*/

        return view('welcome');
    }

    public function getFaq(){
        return view('shop.FAQ');
    }

    public function getGuide(){
        return view('shop.guide');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function contactPost(){

    }



}
