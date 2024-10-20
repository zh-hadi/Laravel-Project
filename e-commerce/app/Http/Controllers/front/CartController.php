<?php

namespace App\Http\Controllers\front;

use App\Models\Cart;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Redirect;

class CartController extends Controller
{
    public function addToCart($id)
    {
        $product_id = $id;
        $user = Auth::user();
        $user_id = $user->id;

        $cart = new Cart();
        $cart->user_id = $user_id;
        $cart->product_id = $product_id;

        $cart->save();

        toastr()->success("Product add to the cart Successfully!");

        return redirect()->back();
    }

    public function index()
    {
        if(Auth::check()){
            $user = Auth::user();
            $userId = $user->id;

            $countProduct = Cart::where('user_id', $userId)->count();

            $cart = Cart::where('user_id', $userId)->get();
        }

        

        return view('home.cart.index', [
            'cart' => $cart,
            'countProduct' => $countProduct,
            'user' => $user
        ]);
    }

    public function store()
    {
        $userId = Auth::user()->id;

        $cart = Cart::where('user_id', $userId)->get();

        foreach($cart as $item){
            $order = new Order();

            $order->name = request()->name;
            $order->rec_address = request()->address;
            $order->phone = request()->phone;
            $order->user_id = $item->user_id;
            $order->product_id = $item->product_id;

            $order->save();
            $data = Cart::find($item->id);
            $data->delete();
        }



        

        toastr()->success('Order completed!');
        return redirect()->back();
    }

    public function destroy(Cart $cart):RedirectResponse
    {
        $cart->delete();

        toastr()->success('Item remove successfully');
        return redirect()->back();
    }
}
