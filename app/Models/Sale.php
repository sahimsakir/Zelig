<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;
    public static function sale_report(){
        
        $sale = Sale::join('buyers','buyers.id','=','sales.buyer')
        ->get(['sales.reference','sales.purchase_from','sales.purchase_cost','sales.sale_date','buyers.buyer_name','sales.profit_ammount','sales.profit_percentage','sales.due_date','sales.due_days']);
        return $sale;

    }
}
