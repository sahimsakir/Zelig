<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use App\Models\Type;
use Illuminate\Support\Facades\Auth;

class RequestController extends Controller
{
    //
  
    public function index(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Request');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');



        $leave = Leave::join('users','users.id','=','leaves.employee')
        ->join('types','types.id','=','leaves.leave_type')
        ->get(['leaves.id', 'users.name','leaves.employee','leaves.from_date','leaves.to_date','leaves.total_days','leaves.status','types.type_name']);
        return view('request', ['leave'=>$leave]);
    }

    public function approve_request(Request $request,$id){

        $permission = checkRolePermission($request->auth_user_id,'Request');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $leave = Leave::find($id);
        $leave->status = 'approve';
        $leave->save();
        if($leave->save()){
            return redirect('request')->
            with('success', 'You have approved ' . $leave->employee_name ."'s request.");
        }
        else{
            return redirect('request')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
    public function reject_request(Request $request,$id){

        $permission = checkRolePermission($request->auth_user_id,'Request');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $leave = Leave::find($id);
        $leave->status = 'reject';
        $leave->save();
        if($leave->save()){
            return redirect('request')->
            with('success', 'You have rejected ' . $leave->employee_name ."'s request.");
        }
        else{
            return redirect('request')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
}
