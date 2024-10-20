<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index():View
    {
        $user = User::where('usertype', 'user')->get()->count();
        $product = Product::all()->count();
        $order = Order::all()->count();
        $orderComplete = Order::where('status', 'delivered')->get()->count();
        return view('admin.index', [
            'user' => $user,
            'product' => $product,
            'order' => $order,
            'orderComplete' => $orderComplete
        ]);
    }


    public function home():View
    {
        if(Auth::user()){
            $countProduct = Cart::Where('user_id', Auth::user()->id)->count();
        }else{
            $countProduct = '';
        }


        $products = Product::all();

        return view('home.index', [
            'products' => $products,
            'countProduct' => $countProduct
        ]);
    }
}
