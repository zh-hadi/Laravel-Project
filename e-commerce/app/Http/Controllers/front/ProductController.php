<?php

namespace App\Http\Controllers\front;

use App\Models\Product;
use App\Models\Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;


class ProductController extends Controller
{
    public function show(Product $product):View
    {
        if(Auth::user()){
            $countProduct = Cart::Where('user_id', Auth::user()->id)->count();
        }else{
            $countProduct = '';
        }

        return view('home.products.show', [
            'product' => $product,
            'countProduct' => $countProduct
        ]);
    }
}
