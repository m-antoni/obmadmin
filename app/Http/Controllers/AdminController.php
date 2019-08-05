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
        $pending = Order::where('status', 'pending')->count();
        $cod = Order::where('payment', 'COD')->count();
        $bank = Order::where('payment', 'PAY ON BANK')->count();
        
        return view('admin.admin', compact('products', 'users', 'orders', 'cod', 'bank', 'pending'));
    }
    
}
