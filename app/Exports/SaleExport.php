<?php

namespace App\Exports;

use App\Models\Sale;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SaleExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
            'reference',
            'purchase_from',
            'purchase_cost',
            'sale_date',
            'buyer_name',
            'profit_ammount',
            'profit_percentage',
            'due_date',
            'due_days',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Sale::all();
        return collect(Sale::sale_report());
    }
}
