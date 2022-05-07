<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    public static function payroll_report(){
        
        $payroll = Payroll::join('users','users.id','=','payrolls.user')
        ->join('departments','departments.id','=','payrolls.department')
        ->get(['users.name','users.phone_number', 'payrolls.ammount', 'departments.department_name']);
        return $payroll;

    }
}
