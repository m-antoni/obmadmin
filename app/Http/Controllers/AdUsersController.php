<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

class AdUsersController extends Controller
{
  	public function index()
  	{	
  			$users = User::orderBy('created_at', 'DESC')->where('isBan', 0)->paginate(7);

  			return view('admin.users.users', compact('users'));
  	}

    public function user_show(User $user)
    {
        return view('admin.users.user_show', compact('user'));
    }

    public function block()
    {   
        $block = User::orderBy('created_at', 'DESC')
                        ->where('isBan', 1)
                        ->paginate(7);

        return view('admin.users.block', compact('block'));
    }

    public function block_user(User $user)
    {
        $user = User::where('id', $user->id);

        $user->update([
            'isBan' => 1
        ]);

        return redirect()->route('admin.users')->with('success', 'User has been Block! successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User has been deleted successfully');
    }

}
