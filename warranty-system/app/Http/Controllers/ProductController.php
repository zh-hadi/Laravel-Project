<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Importer;
use App\Models\Product;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(!Auth::check()){
            return redirect('/login');
        }
        $search_id = request()->input('search_id');
       
        if($search_id){
            $products = Product::with('customer')->where('customer_id', '=', $search_id)->where('d_invoice_id', '=' , 0)->get();
        }else {
            $products = Product::with('customer')->where('d_invoice_id', '=' , 0)->get();
        }
        $customers = Customer::withCountProducts()->get();
        return view('products.index',  ['products' => $products, 'customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // product list without save database if
        if(session()->has('p_data')){
            $data = session()->get('p_data');
            $current_customer_id = $data[0]['customer_id'];
        }else{
            $data = [];
            $current_customer_id = null;
        }
        $customers = Customer::all();
        $importers = Importer::all();
        return view('products.create', [
            'temp_products' => $data,
            'current_customer_id' => $current_customer_id, 
            'customers' => $customers, 
            'importers' => $importers
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attribute = request()->validate([
            'name' => 'required',
            'serial' => 'required',
            'problem' => 'required',
            'sale_date' => 'required',
            'customer_id' => 'required',
            'importer_id' => 'required',
        ]);
        $data = session()->get('p_data');
        $data[] = $attribute;
       
        session()->put("p_data", $data);

        $customers = Customer::all();
        $importers = Importer::all();
        return view('products.create', [
            'temp_products' => $data, 
            'current_customer_id' => $attribute['customer_id'],
            'customers' => $customers, 
            'importers' => $importers]);
    }

    public function storeData()
    {
        // get all product list 
        $data = session()->get('p_data');
        // get current entry user
        $user_id = Auth::id();
        // create this product  invoice
        $invoice = Invoice::create(['user_id' => $user_id]);
        $invoice_id = $invoice->id;

        // store data with invoice number
        foreach($data as $d){

            Product::create(array_merge($d, ['invoice_id' => $invoice_id]));
        }
        session()->forget('p_data');

        // redirect the all warranty products
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $product_id)
    {
        // get data
        $data = session()->get('p_data');
        $updateData = $data[--$product_id];
        $updateData['id'] = $product_id;
        
        // process data to view
        $customers = Customer::all();
        $importers = Importer::all();


        return view('products.edit', ['temp_products' => $data, 'product' => $updateData, 'customers' => $customers, 'importers' => $importers]);
        // show this data in redirect page
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($product)
    {
        $attribute = request()->validate([
            'name' => 'required',
            'serial' => 'required',
            'problem' => 'required',
            'sale_date' => 'required',
            'customer_id' => 'required',
            'importer_id' => 'required',
        ]);


        $data = session()->get('p_data');
        $data[$product] = $attribute;
       
        session()->put("p_data", $data);

        $customers = Customer::all();
        $importers = Importer::all();
        return redirect()->route('products.create');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($product_id)
    {
        $products = session()->get('p_data');

        --$product_id;
      
        for($i = $product_id; $i<count($products)-1; $i++){
            $products[$i] = $products[$i+1];
        }
        array_pop($products);
        session()->put('p_data', $products);

        return redirect()->route('products.create');
    }

    
}
