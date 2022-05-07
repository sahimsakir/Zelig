<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\Department;
use App\Models\Unit;
use App\Models\Payment;
use App\Models\Buyer;
use App\Models\Kind;
use App\Models\Expense;
use App\Models\Leave;
use App\Models\Type;
use App\Models\Payroll;
use App\Models\User;
use App\Exports\PayrollExport;
use App\Exports\SaleExport;
use App\Exports\ExpenseExport;
use App\Exports\InventoryExport;
use Excel;
use PDF;

class ReportController extends Controller
{
    //

    public function index(Request $request){
                
        $permission = checkRolePermission($request->auth_user_id,'Report');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        return view('report');
    }

    public function generate_csv(Request $request){
        $permission = checkRolePermission($request->auth_user_id,'Report');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');
        if($request->input('report')=='Sales'){
            return Excel::download(new SaleExport, 'sale_report.csv');
        }
        elseif($request->input('report')=='Expense'){
            return Excel::download(new ExpenseExport(), 'expense_report.csv');
        }
        elseif($request->input('report')=='Inventory'){
            return Excel::download(new InventoryExport, 'inventory_report.csv');
        }
        else
        {
            return Excel::download(new PayrollExport, 'payroll_report.csv');
        }
    }
    public function generate_pdf($id){
        $leave = Leave::join('types','types.id','=','leaves.leave_type')
        ->where([['leaves.employee',$id],['status','approve']])
        ->get(['leaves.from_date','leaves.to_date','leaves.total_days','types.type_name']);
        $pdf = PDF::loadview('leaves-pdf',compact('leave'));
        return $pdf->download('leaves.pdf');

    }
}
