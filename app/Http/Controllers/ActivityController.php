<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Leave;
use App\Models\Type;

class ActivityController extends Controller
{
    //


    public function index(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Activites');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $type = Type::all();

        return view('activites', ['type'=>$type]);
    }
    public function add_attendance(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Activites');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');



        $attendance = new Attendance;
        $attendance->employee = $request->input('id') ;
        $attendance->date = $request->input('attendance_date');
        $attendance->time = $request->input('attendance_time');
        $attendance->save();

        if($attendance->save()){
            return redirect('activites')->
            with('success', 'You attend office at ' . $attendance->time .' on '. $attendance->date);
        }
        else{
            return redirect('activites')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }


    }
    public function add_leave_request(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'Activites');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');


        $leave = new Leave;
        $leave->employee = $request->input('id') ;
        $leave->from_date = $request->input('fromdate');
        $leave->to_date = $request->input('todate');
        $leave->total_days = $request->input('totaldays');
        $type = Type::where('type_name','=',$request->input('leave_type'))->first();
        $leave->leave_type = $type->id;
        $leave->emergency_contact = $request->input('emergency_contact');
        $leave->number = $request->input('number');
        $leave->address = $request->input('address');
        $leave->status = 'pending';
        $leave->save();

        if($leave->save()){
            return redirect('activites')->
            with('success', 'You have requested for ' . $leave->total_days .' days leave.');
        }
        else{
            return redirect('activites')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }


    }
}
