<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Department;
use App\Models\Unit;

class InventoryController extends Controller
{
    //

    public function index(Request $request){
        
        $permission = checkRolePermission($request->auth_user_id,'Inventory');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        // $inventory = Inventory::paginate(10);
        $inventory = Inventory::join('departments','departments.id','=','inventories.department')->get(['inventories.id','inventories.inventory_name','inventories.inventory_quantity','departments.department_name'])->paginate(10);

        return view('inventory-list', ['inventory'=>$inventory]);
    }
    public function inventory(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Inventory');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $inventory = Inventory::all();
        $department = Department::all();
        $unit = Unit::all();

        return view('inventory', ['inventory'=>$inventory,'department'=>$department,'unit'=>$unit]);
    }
    public function add_inventory(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Inventory');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $inventory = new Inventory;
        $inventory->inventory_name = $request->input('name');;
        $inventory->purchase_date = $request->input('date');
        $inventory->purchase_cost = $request->input('cost');
        $inventory->purchase_perpous= $request->input('perpous');
        $dept = Department::where('department_name','=',$request->input('department'))->first();
        $inventory->department = $dept->id;
        $inventory->inventory_quantity = $request->input('quantity');
        $unit = Unit::where('unit_name','=',$request->input('unit'))->first();
        $inventory->unit = $unit->id;
        $inventory->balance = $request->input('balance');
        $inventory->used = $request->input('used');
        $inventory->detail = $request->input('detail');
        $inventory->save();
        if($inventory->save()){
            return redirect('inventory-list')->
            with('success', 'You have added "' . $inventory->inventory_name .'"');
        }
        else{
            return redirect('inventory-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
    public function edit_inventory(Request $request,$id){


        $permission = checkRolePermission($request->auth_user_id,'Inventory');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $inventory = Inventory::join('departments','departments.id','=','inventories.department')
        ->join('units','units.id','=','inventories.unit')
        ->where('inventories.id',$id)->get();
        $department = Department::all();
        $unit = Unit::all();

        return view('inventory-edit', ['inventory'=>$inventory,'department'=>$department,'unit'=>$unit]);
    }
    public function change_inventory(Request $request, $id){

        
        $permission = checkRolePermission($request->auth_user_id,'Inventory');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $inventory = Inventory::find($id);
        $inventory->inventory_name = $request->input('name');
        $inventory->purchase_date = $request->input('date');
        $inventory->purchase_cost = $request->input('cost');
        $inventory->purchase_perpous= $request->input('perpous');
        $dept = Department::where('name','=',$request->input('department'))->first();
        $inventory->department = $dept->id;
        $inventory->inventory_quantity = $request->input('quantity');
        $unit = Unit::where('unit_name','=',$request->input('unit'))->first();
        $inventory->unit = $unit->id;
        $inventory->balance = $request->input('balance');
        $inventory->used = $request->input('used');
        $inventory->detail = $request->input('detail');
        $inventory->save();
        if($inventory->save()){
            return redirect('inventory-list')->
            with('success', 'You have updated "' . $inventory->inventory_name .'"');
        }
        else{
            return redirect('inventory-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }

}
