<?php

namespace App\Http\Controllers;

use App\Models\DInvoice;
use Illuminate\Http\Request;

class DeliveryInvoiceController extends Controller
{
    public function index()
    {
        $invoice = DInvoice::with('user')->get();

        return view('invoices.d.index', ['invoices' => $invoice]);
    }

    public function show( $id)
    {
        $invoice = DInvoice::find($id);
   
        $invoiceWithProduct = $invoice->load('products');
    
        $customer = $invoiceWithProduct->products()->first()->customer;
        return view('invoices.d.show', [
            'products' => $invoiceWithProduct->products, 
            'customer' => $customer,
            'invoice' => $invoice
        ]);
    }
}
