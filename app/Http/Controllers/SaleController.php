<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\Department;
use App\Models\Unit;
use App\Models\Payment;
use App\Models\Buyer;
use App\Models\Kind;
use Carbon\Carbon;

class SaleController extends Controller
{
    //

    public function sale_list(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Sales');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $buyer = Buyer::all();
        $department = Department::all();
        $unit = Unit::all();
        $payment = Payment::all();
        $sale = Sale::join('buyers','buyers.id','=','sales.buyer')->get(['sales.id','sales.reference','sales.purchase_from','sales.purchase_cost','sales.sale_date','buyers.buyer_name','sales.profit_ammount','sales.profit_percentage','sales.due_date','sales.due_days'])->paginate(10);
        return view('sales-single', ['buyer'=>$buyer,'department'=>$department,'unit'=>$unit,'payment'=>$payment,'sale'=>$sale]);

    }
    public function add_sale(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Sales');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $buyer = Buyer::all();
        $department = Department::all();
        $unit = Unit::all();
        $payment = Payment::all();
        $sales_type = Kind::all();
        return view('sales', ['buyer'=>$buyer,'department'=>$department,'unit'=>$unit,'payment'=>$payment,'sales_type'=>$sales_type]);

    }
    public function new_sale(Request $request){
        $permission = checkRolePermission($request->auth_user_id,'Sales');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $sales = new Sale;
        $sales->product_name = $request->input('product_name');;
        $sales->sale_date = $request->input('sale_date');
        $sales->purchase_cost = $request->input('purchase_cost');
        $sales->purchase_from= $request->input('purchase_from');
        $dept = Department::where('department_name','=',$request->input('department'))->first();
        $sales->department = $dept->id;
        $sales->quantity = $request->input('quantity');
        $unit = Unit::where('unit_name','=',$request->input('unit'))->first();
        $sales->unit = $unit->id;
        $buyer = Buyer::where('buyer_name','=',$request->input('buyer'))->first();
        $sales->buyer = $buyer->id;
        $sales->quantity = $request->input('quantity');
        $payment = Payment::where('payment_name','=',$request->input('payment'))->first();
        $sales->payment = $payment->id;
        $sales_type = Kind::where('sales_type','=',$request->input('sales_type'))->first();
        $sales->sales_type = $sales_type->id;
        $sales->reference = $request->input('reference');
        $sales->reference = $request->input('reference');
        $sales->sale_ammount = $request->input('sale_ammount');
        $sales->profit_ammount = $request->input('profit_ammount');
        $attachment = time().'.'.$request->file('attachment')->extension();  
        $request->file('attachment')->move(public_path('assets/uploads/pdf'), $attachment);
        $uploadAttachment = 'assets/uploads/pdf/'.$attachment;
        $sales->profit_ammount = $request->input('profit_ammount');
        $sales->profit_percentage = $request->input('profit_percentage');
        $sales->due = $request->input('due');
        if($sales->due == "No"){
            $sales->recovery = $sales->sale_ammount;
        }
        else
        {
            $sales->recovery = $sales->sale_ammount - $request->input('due_ammount');
        }
        if($sales->due == "Yes"){
        $sales->due_ammount = $sales->sale_ammount - $sales->recovery;
        }
        else {
            $sales->due_ammount = 0;
        }
        $sales->due_date = $request->input('due_date');
        $sales->attachment = $uploadAttachment;
        $sales->remarks = $request->input('remarks');
        $end = Carbon::parse($request->input('due_date'));
        $now = Carbon::now();
        $length = $end->diffInDays($now);
        $sales->due_days = $length;
        $sales->save();

        $ammount_due = Sale::where([['buyer', '=' , $sales->buyer],['due','=','Yes']])->sum('due_ammount');

        $buyer_set = Buyer::find($sales->buyer);
        $buyer_set->ammount_due = $ammount_due;
        $buyer_set->save();
        
        if($sales->save()){
            return redirect('sales-list')->
            with('success', 'You have added "' . $sales->product_name .'"');
        }
        else{
            return redirect('sales-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
    public function edit_sale(Request $request,$id){

        $permission = checkRolePermission($request->auth_user_id,'Sales');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $sale = sale::join('departments','departments.id','=','sales.department')
        ->join('units','units.id','=','sales.unit')
        ->join('payments','payments.id','=','sales.payment')
        ->join('buyers','buyers.id','=','sales.buyer')
        ->join('kinds','kinds.id','=','sales.sales_type')
        ->where('sales.id',$id)->get();
        $department = Department::all();
        $unit = Unit::all();
        $payment = Payment::all();
        $buyer = Buyer::all();
        $sales_type = Kind::all();

        return view('sales-edit', ['sale'=>$sale,'department'=>$department,'unit'=>$unit,'payment'=>$payment,'buyer'=>$buyer,'sales_type'=>$sales_type]);
    }

    public function change_sale(Request $request, $id){

        $permission = checkRolePermission($request->auth_user_id,'Sales');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $sales = Sale::find($id);
        $sales->product_name = $request->input('product_name');;
        $sales->sale_date = $request->input('sale_date');
        $sales->purchase_cost = $request->input('purchase_cost');
        $sales->purchase_from= $request->input('purchase_from');
        $dept = Department::where('department_name','=',$request->input('department'))->first();
        $sales->department = $dept->id;
        $sales->quantity = $request->input('quantity');
        $unit = Unit::where('unit_name','=',$request->input('unit'))->first();
        $sales->unit = $unit->id;
        $buyer = Buyer::where('buyer_name','=',$request->input('buyer'))->first();
        $sales->buyer = $buyer->id;
        $sales->quantity = $request->input('quantity');
        $payment = Payment::where('payment_name','=',$request->input('payment'))->first();
        $sales->payment = $payment->id;
        $sales_type = Kind::where('sales_type','=',$request->input('sales_type'))->first();
        $sales->sales_type = $sales_type->id;
        $sales->reference = $request->input('reference');
        $sales->profit_ammount = $request->input('profit_ammount');
        if($request->file('attachment')){
            $attachment = time().'.'.$request->file('attachment')->extension();  
            $request->file('attachment')->move(public_path('uploads'), $attachment);
            $uploadAttachment = 'uploads/'.$attachment;
        }
        else{
            $uploadAttachment = $sales->attachment;
        }
        $sales->profit_ammount = $request->input('profit_ammount');
        $sales->profit_percentage = $request->input('profit_percentage');
        $sales->due = $request->input('due');
        if($sales->due == "No"){
            $sales->recovery = $sales->sale_ammount;
        }
        else
        {
            $sales->recovery = $sales->sale_ammount - $request->input('due_ammount');
        }
        if($sales->due == "Yes"){
        $sales->due_ammount = $sales->sale_ammount - $sales->recovery;
        }
        else {
            $sales->due_ammount = 0;
        }
        // $sales->sale_ammount = $request->input('sale_ammount');
        $sales->due_date = $request->input('due_date');
        $sales->attachment = $uploadAttachment;
        $sales->remarks = $request->input('remarks');
        $end = Carbon::parse($request->input('due_date'));
        $now = Carbon::now();
        $length = $end->diffInDays($now);
        $sales->due_days = $length;
        $sales->save();
        
        $ammount_due = Sale::where([['buyer', '=' , $sales->buyer],['due','=','Yes']])->sum('due_ammount');

        $buyer_set = Buyer::find($sales->buyer);
        $buyer_set->ammount_due = $ammount_due;
        $buyer_set->save();
        
        if($sales->save()){
            return redirect('sales-list')->
            with('success', 'You have upadeted "' . $sales->product_name .'"');
        }
        else{
            return redirect('sales-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
}
