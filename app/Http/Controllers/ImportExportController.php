<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Exports\OrderExport;

use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function export()
    {   
         // export products to excel file
        return Excel::download(new ProductExport, 'products.xlsx');
        // return (new ProductExport)->download('products.pdf', \Maatwebsite\Excel\Excel\::MDPDF);
    }

    public function import()
    {   
         // validate file imported   
    	 $this->validate(request(),[
    	 	'file' => 'required|max:2000|mimes:xls,xlsx'
    	 ]);

         // import products to excel file
    	 Excel::import(new ProductImport, request()->file('file'));

    	 return back()->with('success', 'Excel file imported successfully');
    }

    public function export_order()
    {
        // export orders to excel file
        return Excel::download(new OrderExport, 'orders.xlsx');
    }
}
