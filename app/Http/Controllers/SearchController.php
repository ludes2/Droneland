<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchProduct(Request $request) {
        if ($request->ajax()){
            $userInput = $request->input('search');

            //todo: limit number of products returned

            if(strlen($userInput) > 0){
               $searchOutput = Product::where('title', 'LIKE', '%' . $userInput . '%')->get();
                return response(json_encode($searchOutput));
            }

        }




    }

}
