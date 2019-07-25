<?php

namespace App\Imports;

use App\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'id' => $row['id'],
            'p_name' => $row['p_name'],
            'description' => $row['description'],
            'price' => $row['price'],
            'old_price' => $row['old_price'],
            'image' => $row['image'],
        ]);
    }
}
