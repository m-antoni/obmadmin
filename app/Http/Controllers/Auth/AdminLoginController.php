<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
		public function __construct()
		{
			// guest admin access
			$this->middleware('guest:admin')->except('adminLogout');
		}

    public function showLoginForm()
    {
    	return view('auth.adminlogin');
    }

    public function login(Request $request)
    {
    	 // Validate the form data
    	$this->validate($request,[
    			'email' => 'required|email',
    			'password' => 'required'
    	]);	

    	// Attempt to log the user in
    	if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
    			// If successful, redirect to their intended location
    			return redirect()->intended(route('admin.dashboard')); 
    	}

    	// if unsuccessful, then redireect back to the login form
    	return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function adminLogout()
    {
        Auth::guard('admin')->logout();

        return redirect('/');
    }
}
