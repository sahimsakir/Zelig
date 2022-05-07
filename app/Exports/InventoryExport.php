<?php

namespace App\Exports;

use App\Models\Inventory;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InventoryExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
            'inventory_name',
            'inventory_quantity',
            'department_name',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Sale::all();
        return collect(Inventory::inventory_report());
    }
}
