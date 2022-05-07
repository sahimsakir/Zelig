<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    public static function inventory_report(){
        
        $inventory = Inventory::join('departments','departments.id','=','inventories.department')
        ->get(['inventories.inventory_name','inventories.inventory_quantity','departments.department_name']);
        return $inventory;

    }
}
