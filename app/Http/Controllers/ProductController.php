<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
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
        return back();
    }

    public function removeFromCart($id){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->remove($id);
        session()->put('cart', $cart);
        return back();
    }

    public function refreshCart(Request $request){
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        foreach ($oldCart->items as $item){
            if ( $item['quantity'] < $request->input('quantity_of_' . $item['item']['id']) ){
                $cart = new Cart($oldCart);
                $diff = intval($request->input('quantity_of_' . $item['item']['id']) - intval($item['quantity']));
                for($i = 1; $i <= $diff; $i++){
                    $cart->add($item['item'], $item['item']['id']);
                }
            } elseif ( $item['quantity'] > $request->input('quantity_of_' . $item['item']['id']) ){
                $cart = new Cart($oldCart);
                $diff = intval($item['quantity']) - intval($request->input('quantity_of_' . $item['item']['id']));
                for($i = 1; $i <= $diff; $i++){
                    $cart->reduceByOne($item['item']['id']);
                }
            } else{
                $cart = new Cart($oldCart);
            }
            $request->session()->put('cart', $cart);
            return back();
        }




        //var_dump($request);


        //$cart = new Cart($oldCart);
        //dd($request);
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
