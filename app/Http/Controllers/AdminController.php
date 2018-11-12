<?php

namespace App\Http\Controllers;

use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function __construct() {
        $this->middleware('checkRole:admin');
        $this->middleware('auth');
    }

    public function adminAccount(){
        $users = User::all();
        $products = Product::paginate(10);
        return view('admin.admin_account', [
            'users'     => $users,
            'products'  => $products
        ]);
    }

    public function getProducts(){

    }

    public function addProduct(){

    }

    public function editProduct(Request $request){
        if ($request->ajax()){
            $productId = $request->input('productId');
            $productData = Product::where('id', 'LIKE', $productId)->get();
            return response(json_encode($productData));
        }
    }

    public function editProductPost(){

    }

    public function deleteProduct($id){
        $product = Product::where('id', $id)->first();
        $product->delete();
        return back();
    }

    public function editUser(Request $request){
        if ($request->ajax()){
            $userId = $request->input('userId');
            $userData = User::where('id', 'LIKE', $userId)->get();
            return response(json_encode($userData));
        }
    }

    public function editUserPost(){

    }

    public function deleteUser($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return back();
    }
}
