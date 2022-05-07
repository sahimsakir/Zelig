<?php

namespace App\Exports;

use App\Models\Payroll;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PayrollExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
            'name',
            'phone_number',
            'ammount',
            'department_name',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Sale::all();
        return collect(Payroll::payroll_report());
    }
}
