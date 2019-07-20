<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class AdUsersController extends Controller
{
  	public function index()
  	{	
  			$users = User::orderBy('created_at', 'desc')->paginate(7);

  			return view('admin.users.users', compact('users'));
  	}

  	public function pending()
  	{
  			$pendings = Order::where('status', 'pending')->get();

  			return $pendings; 
  	}
    
}
