<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    protected $dates = [
		'date', 
    ];

    // unserialize the cart data
    public function getCartAttribute($value)
    {
        return unserialize($value);
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    protected $hidden = [
        'created_at',
        'updated_at'
    ];    
}
