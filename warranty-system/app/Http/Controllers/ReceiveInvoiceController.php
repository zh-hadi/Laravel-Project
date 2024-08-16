<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\User;
use App\Models\Customer;
use App\Models\Importer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class ReceiveInvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::with('user')->latest()->get();
        return view('invoices.r.index', ['invoices' => $invoices]);
    }

    public function show(Invoice $invoice)
    {

        

        // if(!Gate::allows('show-invoice', $invoice)){
        //     return redirect()->route('invoices.index');
        // }
     
        $invoiceWithProduct = $invoice->load('products');
        $customer = $invoiceWithProduct->products()->first()->customer;
        return view('invoices.r.show', [
            'products' => $invoiceWithProduct->products, 
            'customer' => $customer,
            'invoice' => $invoice
        ]);
    }


    public function edit(Invoice $invoice)
    {
        // invoice all product
        // importer and customer data load
        // redir
        if(session()->has('p_data')){
            $data = session()->get('p_data');
            $current_customer_id = $data[0]['customer_id'];
        }else{
            $data = Product::where('invoice_id', $invoice->id)->get();
            
            session()->put('p_data', $data);
            $current_customer_id = $data[0]['customer_id'];
        }
        $customers = Customer::all();
        $importers = Importer::all();
        return view('invoices.r.edit', [
            'temp_products' => $data,
            'current_customer_id' => $current_customer_id, 
            'customers' => $customers, 
            'importers' => $importers
        ]);
    }

    public function editProduct($id)
    {

    }
    public function editProductStore()
    {

    }

    public function update()
    {

    }
}
