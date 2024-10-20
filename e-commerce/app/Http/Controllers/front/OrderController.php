<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            $countProduct = Cart::where('user_id', Auth::user()->id)->get()->count();
        }
        return view('home.orders.index', [
            'orders' => Order::Where('user_id', Auth::user()->id)->get(),
            'countProduct' => $countProduct
        ]);
    }
}
