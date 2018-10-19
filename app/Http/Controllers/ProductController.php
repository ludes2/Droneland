<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Cart;
use App\Category;

class ProductController extends Controller
{
    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        // dd($request->session()->get('cart'));
        return redirect()->route('index');
    }

    public function getCart(){
        if (!Session::has('cart')){
            return view('shop.shopping_cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping_cart', [
            'products'      => $cart->items,
            'totalPrice'    => $cart->totalPrice
        ]);
    }

    public function getCheckout(){
        if (!Session::has('cart')){
            return view('shop.shopping_cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', [
            'products'      => $cart->items,
            'totalPrice'    => $cart->totalPrice,
            'total'         => $total
        ]);
    }

    public function getProducts($cat){
        $category = new Category();
        $categories = $category->tree();

        $products = Product::where('category', $cat)->get();
        // dd($products);
        return view('shop.products', [
            'categories'    => $categories,
            'products'      => $products
        ]);
    }

    public function getSingleProduct(Product $product){
        return view('shop.singleProduct', [
            'product' => $product
        ]);
    }

}
