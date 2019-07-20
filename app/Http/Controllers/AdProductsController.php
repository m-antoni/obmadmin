<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class AdProductsController extends Controller
{
    public function products()
    {
        $products = Product::paginate(7);

        return view('admin.products.products', compact('products'));      
    }

    public function create()
    {
    		return view('admin.products.products_create'); 
    }

   	public function store(Request $request)
   	{   
        // Validation data
   			$request->validate([
   					'id' => 'required|unique:products,id',
   					'p_name' => 'required|string|max:100',
   					'p_model' => 'required|string|max:100',
   					'p_category' => 'required|string|max:100',
   					'description' => 'required|string|max:150',
   					'price' => 'required|numeric',
   					'quantity' => 'required|numeric',
            'image' => 'sometimes|file|image|max:1999',
   			]);

   			$product = Product::create([
   					'id' => $request->id,
   					'p_name' => $request->p_name,
   					'p_model' => $request->p_model,
   					'p_category' => $request->p_category,
   					'description' => $request->description,
   					'price' => $request->price,
   					'quantity' => $request->quantity
   			]);

        // store image
        $this->storeImage($product);

   			return redirect()->route('admin.products.show', $product->id )->with('success', 'New product added successfully');
   	}

   	public function edit(Product $product)
   	{
   			return view('admin.products.products_edit', compact('product'));
   	}

   	public function update(Product $product, Request $request)
   	{
        $validate = $request->validate([
            'id' => 'required',
            'p_name' => 'required|string|max:100',
            'p_model' => 'required|string|max:100',
            'p_category' => 'required|string|max:100',
            'description' => 'required|string|max:150',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'image' => 'sometimes|file|image|max:1999',
        ]);

        // update data in database
        $product->update($validate);

        // update image
        $this->storeImage($product);

   			return redirect()->route('admin.products.show', $product->id)->with('success', 'Product details updated successfully');
   	}

   	public function show(Product $product)
   	{
   			return view('admin.products.products_show', compact('product'));
   	}

    public function destroy(Product $product)
    {
      $product->delete();

      return redirect()->route('admin.products')->with('success', 'Product has been deleted successfully');
    }

    public function storeImage($product)
    {
        if(request()->has('image')){
            $product->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }
}
