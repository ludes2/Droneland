<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserUpdate;

class UserController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function myAccount(){
        $user = Auth::user();
         $orders = $user->orders;
        //$orders = Order::selectRaw('user_id, date_format(created_at, \'%M\') month, cart')->where('user_id', $user)->sortBy('month');
        $orders->transform(function($order){
            $order->cart = unserialize($order->cart);
            return $order;
        });

        $collection = collect($orders);



        return view('user.user_account', [
            'user'      => $user,
            'orders'    => $orders,
            'collection'    => $collection
        ]);
    }

    public function profilePost(Request $request){
        $user = Auth::user();

        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();

        if ($request['password'] != ""){
            if (!(Hash::check($request['password'], Auth::user()->password))){
                return redirect()->back()->with('error', 'Your current password does not match with the password you provided.');
            }

            if (strcmp($request['password'], $request['new_password']) == 0){
                return redirect()->back()->with('error', 'New password cannot be the same as your current password.');
            }

            $validation = $request->validate([
                'password'      => 'required',
                'new_password'  => 'required|string|min:6|confirmed'
            ]);

            $user->password = bcrypt($request['new_password']);
            $user->save();

            return redirect()->back()->with('success', 'Password changed succesfully');
        }

        return back();
    }
}
