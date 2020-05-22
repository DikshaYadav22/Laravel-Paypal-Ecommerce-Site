<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Product;

class CartsController extends Controller
{
    
    public function index()
    {
        return view('carts.index')->with('items', Cart::getContent());
        }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        Cart::add([
            'id' => $product->id, //  same product add karoge to newly added  jo details honge wo ayega old hat jayega like size and quantity(rest to fix h na ha)
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $request->quantity,
            'attributes' => [
                'size'=>$request->size
            ],
            'associatedModel' => $product
        ]);

        return redirect()->back();
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        Cart::remove($id);
        return redirect()->back();
    }
}
