<?php

namespace App\Exports;

use App\Models\OrderItem;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportVentasYear implements FromQuery
{
    use Exportable;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function query()
    {
        return OrderItem::query()->where('order_year',$this->year);
    }
}