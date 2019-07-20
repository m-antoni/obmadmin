<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $dates = [
		'date', 
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }
    
}
