<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductValidate;
use App\Product;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('verifyCategoryCount')->only('create', 'store');
    }
    
    public function index()
    {
        return view('products.index')->with('products', Product::all());
    }

   
    public function create()
    {
        return view('products.create');
    }

   
    public function store(ProductValidate $request)
    {
        $image = $request->image->store('product');
        Product::create([
            'name'=>$request->name,
            'image'=>$image,
            'description'=>$request->description,
            'price'=>$request->price
        ]);
        return redirect()->route('products.index');
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->back();
    }
}
