<?php

namespace App\Exports;

use DateTime;
use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

class ExportReportDate implements FromQuery
{
    use Exportable;

    public function __construct(String $date)
    {
        $this->date = $date;
    }

    public function query()
    { 
        $date = new DateTime($this->date);
        $formatDate = $date->format('d F Y');
        return Order::query()->where('order_date', $formatDate);
    }
}