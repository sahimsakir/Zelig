<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\User;
use App\Models\Leave;
use App\Models\Attendence;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\Unit;
use App\Models\Payment;
use App\Models\Buyer;
use App\Models\Kind;
use App\Models\Expense;
use App\Models\Type;
use App\Models\Payroll;
use App\Models\UserAuth;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function index(){

        $user = User::all();
        $users = $user->count();
        $inventory = Inventory::all();
        $inventories = $inventory->count();
        $expense = Expense::all();
        $expenses = $expense->count();
        $sale = Sale::where('sales_type','=','1');
        $sale1 = $sale->sum('sale_ammount');
        $sale_recovery = $sale->sum('recovery');
        $profit_percentage = $sale->avg('profit_percentage');
        $sales = Sale::where('sales_type','=','2');
        $sale2 = $sales->sum('sale_ammount');
        $sale_recovery2 = $sales->sum('recovery');
        $profit_percentage2 = $sales->avg('profit_percentage');
        
     
        return view('index',compact('users', 'inventories', 'sale1', 'sale_recovery', 'profit_percentage', 'sale2', 'sale_recovery2', 'profit_percentage2', 'expenses'));
        
    }

    function user_list(Request $request)
    {
        $permission = checkRolePermission($request->auth_user_id,'User');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');
        $user = User::where('email','!=','admin@zelig.com')->get()->paginate(10);
        $department = Department::all();
        return view('user-list', ['user'=>$user, 'department'=>$department]);
        
    }

    public function create_user(Request $request){

        $permission = checkRolePermission($request->auth_user_id,'User');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');
        return view('user-creation');
         
    }

    public function new_user(Request $request)
    {
        
        $permission = checkRolePermission($request->auth_user_id,'User');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');
        // return $request;
        $request->validate([
            'inputName' => 'required',            
            'email' => 'required|email|unique:users',
            // 'inputPassword' => 'required|min:3|max:30',
        ]);
        
        // return $request;
        $users = new User;
        $users->name = $request->input('inputName');
        $users->email = $request->input('email');
        $users->password = Hash::make('123456');
        $users->permissions = "test";
        $users->save();

        
        $user = User::all();
        if($users->save()){

            $data = array();
            if($request->input("Inventory")==="on"){
            array_push($data,['user_id'=>$users->id,'menu'=>'Inventory']);
            }
           
            if($request->input("Expense")==="on"){
            array_push($data,['user_id'=>$users->id,'menu'=>'Expense']);
                
            }
            if($request->input("Report")==="on"){
            array_push($data,['user_id'=>$users->id,'menu'=>'Report']);
                
            }
            if($request->input("Dashboard")==="on"){
            array_push($data,['user_id'=>$users->id,'menu'=>'Dashboard']);
                
            }
            if($request->input("User")==="on"){
            array_push($data,['user_id'=>$users->id,'menu'=>'User']);
                
            }
            if($request->input("Payroll")==="on"){
            array_push($data,['user_id'=>$users->id,'menu'=>'Payroll']);
                
            }
            if($request->input("Request")==="on"){
            array_push($data,['user_id'=>$users->id,'menu'=>'Request']);
                
            }
            foreach($data as $dat){
             UserAuth::create($dat);}
            
            return redirect()->route('user-list',['user'=>$user]);
        }
        
    }

    function user_update(Request $request,$id)
    {
        $permission = checkRolePermission($request->auth_user_id,'User');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');
        
        $loggedUser = User::where('users.id',$id)->first();
        $user = User::join('departments','departments.id','=','users.department')
        ->where('users.id',$id)
        ->get(['users.id','users.name','users.dob', 'users.nid', 'users.designation', 'users.phone_number', 'users.attachment', 'users.image','departments.department_name']);
        $leave = Leave::join('types','types.id','=','leaves.leave_type')
        ->where([['employee','=',$loggedUser->id],['status', '=' , 'approve']])
        ->get(['leaves.id','types.type_name','leaves.total_days']);
        $department = Department::all();
        return view ('user-profile-view',['user'=>$user, 'department'=>$department, 'leave'=>$leave]);
        
    }

    public function user_modify(Request $request,$id)
    {
        $permission = checkRolePermission($request->auth_user_id,'User');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');
        $profile = User::find($id);
        $profile->name = $request->input('name');;
        $profile->dob = $request->input('dob');
        $profile->nid = $request->input('nid');
        $profile->phone_number= $request->input('phone_number');
        $dept = Department::where('department_name','=',$request->input('department'))->first();
        $profile->department = $dept->id;
        $profile->designation = $request->input('designation');
        $profile->save();

        
        if($profile->save()){
            return redirect('user-edit/'.$id)->
            with('success', $profile->name . ' upadeted.');
        }
        else{
            return redirect('user-edit/'.$id)->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
        
        
    }

    function destroy(Request $request, $id){
        $permission = checkRolePermission($request->auth_user_id,'User');
        if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');
        $row = User::find($id);  
        $row->delete();
        
        
        $user = User::where('email','!=','admin@zelig.com')->get()->paginate(10);
        $department = Department::all();

        return redirect()->route('user-list',['user'=>$user,'department'=>$department])->with('success',$row->name.' deleted');

        
    }

    
}