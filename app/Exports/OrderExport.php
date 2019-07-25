<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

// class OrderExport implements FromCollection
// {
//     *
//     * @return \Illuminate\Support\Collection
    
//     public function collection()
//     {
//         return Order::all();
//     }
// }

class OrderExport implements FromView
{
		public function view(): View
		{
				return view('admin.orders.orders', [
						'orders' => Order::all()
				]);
		}
}
