<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;

class StripePaymentController extends Controller
{
    public function stripe($total):View
    {
        return view('stripe', [
            'amount' => $total
        ]);
    }

    public function stripePost($amount)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        Stripe\Charge::create([
            'amount' => $amount * 100,
            'currency' => "usd",
            'source' => request()->stripeToken,
            'description' => "Test payment method for localhost"
        ]);

        $userId = Auth::user()->id;
        $user = Auth::user();

        $cart = Cart::where('user_id', $userId)->get();

        foreach($cart as $item){
            $order = new Order();

            $order->name = $user->name;
            $order->rec_address = $user->address;
            $order->phone = $user->phone;
            $order->user_id = $item->user_id;
            $order->product_id = $item->product_id;
            $order->payment_status = "Paid";

            $order->save();
            $data = Cart::find($item->id);
            $data->delete();
        }



        

        toastr()->success('Order completed!');
        return redirect()->route('cart.index');
    }
}
