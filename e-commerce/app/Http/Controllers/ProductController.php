<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    public function index():View
    {
       

        $search = request()->query('search');

        $products = Product::when($search, fn($query, $search) => $query->whereAny(['name', 'category'], 'like', '%'.$search.'%'))->paginate(3);
        

        return view('admin.products.index', [
            'products' => $products
        ]);
    }

    public function show()
    {
        return "this is product show method";
    }

    public function create():View
    {
        return view('admin.products.create');
    }

    public function store()
    {

        



        $product  = new Product();

        $product->name = request()->name;
        $product->description = request()->description;
        $product->price = request()->price;
        $product->category = request()->category;
        $product->quantity = request()->quantity;

        if(request()->file('image')){
            $image = request()->file('image');
            $path = $image->store('products');
            $product->image = $path;
        }

        $product->save();

        toastr()->success('Product add successfully');

        return redirect()->route('products.index');
    }

    public function edit(Product $product):View
    {
        return view('admin.products.edit', compact('product'));
    }


    public function update(Product $product)
    {
        $product->name = request()->name;
        $product->description = request()->description;
        $product->price = request()->price;
        $product->quantity = request()->quantity;
        $product->category = request()->category;

        $product->save();

        toastr()->success('Product update successfully');

        return redirect(route('products.index'));
    }


    public function destroy(Product $product)
    {
        $product->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Product Delete Successfully',
            'redirectUrl' => route('products.index')
        ]);
    }
}
