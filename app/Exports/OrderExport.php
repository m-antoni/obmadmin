<?php

namespace App\Exports;

use App\Order;
use App\User;
use App\Cart;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// use Illuminate\Contracts\View\View;
// use Maatwebsite\Excel\Concerns\FromView;


class OrderExport implements FromCollection, WithMapping, WithHeadings, ShouldAutoSize
{
	public function collection()
	{

		return Order::select(['user_id', 'order_number', 'phone', 'address','cart','status','payment', 'date'])
		       ->orderBy('id', 'asc')
		       ->get();
	}

	public function headings(): array
    {
    	return [
    		'USER ID',
    		'FULLNAME',
    		'ORDER NUMBER',
    		'PHONE',
    		'DELIVERY ADDRESS',
    		'TOTAL QTY',
    		'TOTAL PRICE',
        'STATUS',
    		'PAYMENT METHOD',
    		'DATE PURCHASED',
    	];
    }

    public function map($order): array
    {
        return [
        	  $order->user_id,
            User::find($order->user_id)->getFullNameAttribute(),
       			$order->order_number,
       			$order->phone,
       			$order->address,
       			$order->cart->totalQty,
       			$order->cart->totalPrice,
            $order->status,
       			$order->payment,
       			$order->date->format('m-d-Y'),	
        ];
    }
}