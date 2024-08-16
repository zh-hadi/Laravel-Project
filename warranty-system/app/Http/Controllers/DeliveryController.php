<?php

namespace App\Http\Controllers;

use App\Models\DInvoice;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliveryController extends Controller
{
    public function delivery()
    {
        $products = Product::with('customer')->where('d_invoice_id', '0')->get();
        return view('products.delivery',  ['products' => $products]);
    }

    public function deliveryAdd()
    {
        $attributes = request()->validate([
            'delivery' => 'required'
        ]);

        $delivery_ids = $attributes['delivery'];

        //Product::whereIn('id', $delivery_ids);
        
        // foreach($delivery_ids as $id){
        //     Product::where('id', $id)->update(['name' => $id]);
        // }

       // create delivery invoice
       $userId = Auth::id();
       $newDInvoice = DInvoice::create(['user_id' => $userId]);
       $DInvoiceId = $newDInvoice->id;
       // and update product delivery col data to add delivery
       Product::whereIn('id', $delivery_ids)->update(['d_invoice_id' => $DInvoiceId]);
     
       // redirect
       return redirect()->route('invoicesd.show', ['invoicesd' => $DInvoiceId]);
    }
}
