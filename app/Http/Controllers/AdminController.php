<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\UserUpdate;
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

    public function adminDashboard(){
        $users = User::all();
        $products = Product::paginate(10);
        $categories = Category::all();
        return view('admin.admin_dashboard', [
            'users'         => $users,
            'products'      => $products,
            'categories'    => $categories
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

    public function editProductPost(Request $request){
        $product = Product::findOrFail($request['id']);
        $this->validate($request, [
            'title'         => 'required|string',
            'thumbnail'     => 'file',
            'price'         => 'required|regex:/^[0-9]+(\.[0-9][0-9]?)?$/',
            'editInputCategory' => 'required',
            'short_description' => 'nullable|string',
            'full_description'  => 'nullable|string'
        ]);

        $product->title = $request['title'];
        $product->price = $request['price'];
        $product->category = $request['editInputCategory'];
        ( !empty($request['short-description']) ) ? $product->short_description = $request['short-description'] : $product->short_description = '';
        ( !empty($request['full-description']) ) ? $product->full_description = $request['full-description'] : $product->full_description = '';

        if ($request->hasFile('thumbnail')){
            $thumbnail = $request->file('thumbnail');
            $fileName = $thumbnail->getClientOriginalName();
            $thumbnail->move('imgs/products', $fileName);
            $product->thumbnail = 'imgs/products/' . $fileName;
        }

        $product->save();
        //return dd($request);
        return back()->with('successProductUpdate', 'Product updated successfully');
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

    public function editUserPost(UserUpdate $request){
        $user = User::where('id', $request['id'])->first();
        $user->name = $request['name'];
        $user->email = $request['email'];

        if ($request['admin'] == 1){
            $user->admin = true;
        } else {
            $user->admin = false;
        }

        $user->save();

        return back()->with('successUserUpdate', 'User updated successfully');
    }

    public function deleteUser($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return back();
    }
}
