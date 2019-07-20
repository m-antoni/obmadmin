<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Order;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   

        $products = Product::count();
        $users = User::count();
        $orders = Order::count();
        $cod = Order::where('payment', 'cod')->get();
        $bank = Order::where('payment', 'bank')->get();
        
        return view('admin.admin', compact('products', 'users', 'orders', 'cod', 'bank'));
    }
    
}
