<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Faker\Generator as Faker;
use App\User;
use App\Order;
use App\Product;

class ProductsController extends Controller
{
    public function single_product(Product $product)
    {  
        return view('users.single_product', compact('product'));
    }

    public function products()
    {
        $products = Product::paginate(8);

        return view('users.products', compact('products'));
    }
    
    public function myorders()
    {
        // fetch the users orders
        $orders = Order::where('user_id',auth()->user()->id)
                        ->orderBy('created_at', 'DESC')
                        ->paginate(4);

        return view('users.myorders', compact('orders'));
    }

    public function order_cod($id)
    {   
        $product = Product::find($id);

        return view('users.order_cod', compact('product'));
    }

    public function product_cod(Request $request, Faker $faker, $product)
    {
        // return dd($request->all());
    	$request->validate([
            'phone' => 'required|numeric' , 
		    'address' => 'required|max:100',
            'city' => 'required',
            'quantity' => 'required|numeric',
		    'price' => 'required|numeric',
		]);

        // save order data
    	$order = Order::create([
			'reference' => $faker->ean8,
			'user_id' => auth()->user()->id,
			'product_id' => $product,
			'quantity' => $request->quantity,
			'price' => $request->price,
			'status' => 'bank',
            'payment' => 'cod',
			'date' => now()
    	]);

        // update data of users
        $user = DB::table('users')
                    ->where('id', auth()->user()->id)
                    ->update([
                        'address' => $request->address,
                        'city' => $request->city,
                        'phone' => $request->phone    
                    ]);
   
    	return redirect()->route('summary', $order)->with('success', 'Your transaction has been proccess.');
    }

    public function order_bank($id)
    {
        $product = Product::find($id);

        return view('users.order_bank', compact('product'));
    }

    public function product_bank(Request $request, Faker $faker, $product)
    {
         // return dd($request->all());
        $request->validate([
            'phone' => 'required|numeric' , 
            'address' => 'required|max:100',
            'city' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        // save order data
        $order = Order::create([
            'reference' => $faker->ean8,
            'user_id' => auth()->user()->id,
            'product_id' => $product,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'status' => 'pending',
            'payment' => 'bank',
            'date' => now()
        ]);

        // update data of users
        $user = DB::table('users')
                    ->where('id', auth()->user()->id)
                    ->update([
                        'address' => $request->address,
                        'city' => $request->city,
                        'phone' => $request->phone    
                    ]);
   
        return redirect()->route('summary', $order)->with('success', 'Your transaction has been proccess.');
    }

    public function summary($id)
    {   
       // return dd($id); 
       $order = Order::find($id);
        
       return view('users.summary', compact('order')); 
    }


    public function payonbank()
    {
        return view('users.payonbank');
    }
}



