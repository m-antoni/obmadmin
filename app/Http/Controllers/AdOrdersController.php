<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\User;
use App\Product;

class AdOrdersController extends Controller
{
    public function index()
    {

    		$orders = Order::orderBy('date', 'desc')
                  ->where('status', 'PENDING')
                  ->paginate(7);

        // $order = Order::find(2);
        // dd($order->cart);

    		return view('admin.orders.orders', compact('orders'));
    }

    public function order_invoice($id)
    {
        $order = Order::find($id);

        // dd($order->id);

        return view('admin.orders.order_invoice', compact('order'));
    }

    public function update(Order $order)
   	{
   			$order->update([
   				'status' => 'DONE'
   			]);

   			return redirect()->route('admin.order')->with('success', 'Order has been updated successfully');
    }

    public function completed()
    {
        $complete = Order::orderBy('created_at', 'DESC')
                          ->where('status', 'DONE')
                          ->paginate(7);


        return view('admin.orders.completed', compact('complete'));
    }

    public function destroy(Order $order)
    {
    		$order->delete();

    		return redirect()->route('admin.order')->with('success', 'Order has been deleted successfully');
    }
}

