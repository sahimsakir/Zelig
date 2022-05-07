<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Expense;

class ExpenseController extends Controller
{

    public function expense_list(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Expense');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $expense = Expense::join('departments','departments.id','=','expenses.department')->get(['expenses.id','expenses.expense_name','expenses.expense_cost','departments.department_name'])->paginate(10);
        return view('expense-list', ['expense'=>$expense]);

    }

    public function add_expense(Request $request){
        
        $permission = checkRolePermission($request->auth_user_id,'Expense');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $department = Department::all();

        return view('expense', ['department'=>$department]);

    }

    public function new_expense(Request $request){


        $permission = checkRolePermission($request->auth_user_id,'Expense');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');



        $expense = new Expense;
        $expense->expense_name = $request->input('expense_name');;
        $expense->expense_date = $request->input('expense_date');
        $expense->expense_perpous = $request->input('expense_perpous');
        $expense->expense_cost = $request->input('expense_cost');
        $expense->department = $request->input('department');
        $expense->expense_details = $request->input('expense_details');
        $attachment = time().'.'.$request->file('attachment')->extension();  
        $request->file('attachment')->move(public_path('assets/uploads/pdf'), $attachment);
        $uploadAttachment = 'assets/uploads/pdf/'.$attachment;
        $expense->attachment = $uploadAttachment;
        $expense->save();

        
        if($expense->save()){
            return redirect('expense-list')->
            with('success', 'You have added "' . $expense->expense_name .'"');
        }
        else{
            return redirect('expense-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
    public function edit_expense(Request $request,$id){
        
        $permission = checkRolePermission($request->auth_user_id,'Expense');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $department = Department::all();
        $expense = Expense::join('departments','departments.id','expenses.department')
        ->where('expenses.id','=',$id)
        ->get(['expenses.id','expenses.expense_name','expenses.expense_date','expenses.expense_perpous','expenses.expense_details','expenses.expense_cost','expenses.department','departments.department_name','expenses.attachment']);

        return view('expense-edit', ['department'=>$department,'expense'=>$expense]);

    }
    public function change_expense(Request $request, $id){
                
        $permission = checkRolePermission($request->auth_user_id,'Expense');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $expense = Expense::find($id);
        $expense->expense_name = $request->input('expense_name');;
        $expense->expense_date = $request->input('expense_date');
        $expense->expense_perpous = $request->input('expense_perpous');
        $expense->expense_cost = $request->input('expense_cost');
        $expense->department = $request->input('department');
        $expense->expense_details = $request->input('expense_details');
        if($request->file('attachment')){
            $attachment = time().'.'.$request->file('attachment')->extension();  
            $request->file('attachment')->move(public_path('uploads'), $attachment);
            $uploadAttachment = 'uploads/'.$attachment;
        }
        else{
            $uploadAttachment = $expense->attachment;
        }
        $expense->attachment = $uploadAttachment;
        $expense->save();

        
        if($expense->save()){
            return redirect('expense-list')->
            with('success', 'You have added "' . $expense->expense_name .'"');
        }
        else{
            return redirect('expense-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
}
