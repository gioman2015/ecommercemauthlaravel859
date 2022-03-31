<?php

namespace App\Exports;

use DateTime;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportStock implements FromQuery
{
    use Exportable;

    /* public function __construct(String $date)
    {
        $this->date = $date;
    } */

    public function query()
    { 
        /* dd(Product::query()->select('id'));
        Product::query()->select('id'); */
        return Product::query()->select('id','product_name_en','product_qty_start','product_qty');
    }
}