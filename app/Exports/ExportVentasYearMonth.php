<?php

namespace App\Exports;

use App\Models\OrderItem;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportVentasYearMonth implements FromQuery
{
    use Exportable;

    public function __construct(int $year, String $month)
    {
        $this->year = $year;
        $this->month = $month;
    }

    public function query()
    { 
        return OrderItem::query()->where('order_month',$this->month)->where('order_year',$this->year);
    }
}