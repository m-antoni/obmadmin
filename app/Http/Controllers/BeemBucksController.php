<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Beem;

class BeemBucksController extends Controller
{
    public function index()
    {
    		$beem = Beem::orderBy('created_at', 'desc')->paginate(7);

    		return view('admin.beem.beem', compact('beem'));
    }

    public function update($id)
    {
    		$beem = Beem::where('user_id', $id)
											->update(['status' => true]);

    		return redirect()->route('admin.beem')->with('success', 'Points has beem approved successfully');
    }
}
