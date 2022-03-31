<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportReportYear implements FromQuery
{
    use Exportable;

    public function __construct(int $year)
    {
        $this->year = $year;
    }

    public function query()
    { 
        return Order::query()->where('order_year', $this->year);
    }
}