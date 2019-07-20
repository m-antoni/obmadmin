<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ProductExport;
use App\Imports\ProductImport;
use Maatwebsite\Excel\Facades\Excel;

class ImportExportController extends Controller
{
    public function export()
    {   
        return Excel::download(new ProductExport, 'products.xlsx');
    }

    public function import()
    {
    	 $this->validate(request(),[
    	 		'file' => 'required|max:2000|mimes:xls,xlsx'
    	 ]);

    	 Excel::import(new ProductImport, request()->file('file'));

    	 return back()->with('success', 'Excel file imported successfully');
    }
}
