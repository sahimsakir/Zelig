<?php

namespace App\Exports;

use App\Models\Expense;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExpenseExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
            'expense_name',
            'expense_cost',
            'expense_date',
            'department_name',
        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Sale::all();
        return collect(Expense::expense_report());
    }
}
