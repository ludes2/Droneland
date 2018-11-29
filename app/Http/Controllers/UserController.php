<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct(){
        return $this->middleware('auth');
    }

    public function myAccount(){
        $user = Auth::user();

        return view('user.user_account', [
            'user' => $user
        ]);
    }
}
