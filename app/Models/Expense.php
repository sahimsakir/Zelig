<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    public static function expense_report(){
        
        $expense = Expense::join('departments','departments.id','=','expenses.department')
        ->get(['expenses.expense_name','expenses.expense_cost','expenses.expense_date','departments.department_name']);
        return $expense;

    }
}
