<?php

namespace App\Http\Controllers\Profile;
use App\Product;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller
{
    public function index(){



        $user = Auth::user();
      return view("profile.index.index", compact('title','meta_key','meta_desc', 'user'));
    }

    public function orders(){
        $user = Auth::user();
        $orders = Order::where('user_id', '=', $user->id)->get();

        
      return view("profile.index.orders", compact('title','meta_key','meta_desc', 'user', 'products'));
    }



}
