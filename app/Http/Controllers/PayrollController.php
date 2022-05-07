<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Department;
use App\Models\Payroll;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    //

    public function payroll_list(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Sales');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $payroll = Payroll::join('users','users.id','=','payrolls.user')
        ->join('departments','departments.id','=','payrolls.department')
        ->get(['payrolls.id', 'users.name','users.phone_number', 'payrolls.ammount', 'departments.department_name'])->paginate(10);
        // $department = Department::all();
        // $user = User::where('email','!=','admin@zelig.com')->get();
        return view('payroll-list', ['payroll'=>$payroll]);

    } 
    public function add_payroll(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Payroll');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $user = User::where('email','!=','admin@zelig.com')->get();
        $department = Department::all();
        return view('payroll', ['user'=>$user,'department'=>$department]);

    }

    public function new_payroll(Request $request){
        $permission = checkRolePermission($request->auth_user_id,'Payroll');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $payroll = new Payroll;
        $payroll->user = $request->input('employee');;
        $payroll->ammount = $request->input('ammount');
        $payroll->date = $request->input('date');
        $payroll->department= $request->input('department');
        $payroll->save();
        
        if($payroll->save()){
            return redirect('payroll-list')->
            with('success', 'You have added new payroll');
        }
        else{
            return redirect('payroll-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }

    public function edit_payroll(Request $request, $id){
        $permission = checkRolePermission($request->auth_user_id,'Payroll');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $payroll = Payroll::join('users','users.id','=','payrolls.user')
        ->join('departments','departments.id','=','payrolls.department')
        ->get(['payrolls.id', 'payrolls.date', 'users.name','users.phone_number', 'payrolls.ammount', 'departments.department_name'])->paginate(10);
        $department = Department::all();
        $user = User::where('email','!=','admin@zelig.com')->get();
        return view('payroll-edit', ['payroll'=>$payroll, 'user'=>$user, 'department'=>$department]);

    }
    public function change_payroll(Request $request, $id){
        $permission = checkRolePermission($request->auth_user_id,'Payroll');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $payroll = Payroll::find($id);
        $user = User::where('name','=',$request->input('employee'))->first();

        $payroll->user = $user->id;
        $payroll->ammount = $request->input('ammount');
        $payroll->date = $request->input('date');
        $dept = Department::where('department_name','=',$request->input('department'))->first();
        $payroll->department= $dept->id;
        $payroll->save();
        
        if($payroll->save()){
            return redirect('payroll-list')->
            with('success', 'You have updated the payroll');
        }
        else{
            return redirect('payroll-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
    function destroy($id){
        
        $row = Payroll::find($id);     
        $row->delete();
        
        
        $payroll = Payroll::join('users','users.id','=','payrolls.user')
        ->join('departments','departments.id','=','payrolls.department')
        ->get(['payrolls.id', 'users.name','users.phone_number', 'payrolls.ammount', 'departments.department_name'])->paginate(10);
        return view('payroll-list',['payroll'=>$payroll])->with('success','succesfully deleted');;
        
    }
}
