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
    		$orders = Order::orderBy('date', 'DESC')->where('status', 'pending')->paginate(7);

    		return view('admin.orders.orders', compact('orders'));
    }

    public function update(Order $order)
   	{
   			$order->update([
   				'status' => 'done'
   			]);

   			return redirect()->route('admin.order')->with('success', 'Order has been updated successfully');
    }

    public function complete()
    {
        $complete = Order::orderBy('created_at', 'DESC')
                          ->where('status', 'done')
                          ->paginate(7);

        return view('admin.orders.complete', compact('complete'));
    }

    public function destroy(Order $order)
    {
    		$order->delete();

    		return redirect()->route('admin.order')->with('success', 'Order has been deleted successfully');
    }
}

