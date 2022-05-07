<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buyer;

class BuyerController extends Controller
{
    //

    public function buyer_list(){

        // $permission = checkRolePermission($request->auth_user_id,'Sales');
        // if(!$permission) return redirect('/')->with('fail','You Do Not Have Access !');

        $buyer = Buyer::paginate(10);
        return view('buyer', ['buyer'=>$buyer]);

    }

    public function add_buyer(Request $request){
        $buyer = new Buyer;
        $buyer->buyer_name = $request->input('buyer_name');;
        $buyer->phone_number = $request->input('phone_number');
        $buyer->ammount_due = 0;
        $buyer->save();

        
        if($buyer->save()){
            return redirect('buyer-list')->
            with('success', 'You have added "' . $buyer->buyer_name .'"');
        }
        else{
            return redirect('buyer-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
    public function edit_buyer($id){
        $buyer = Buyer::where('id','=',$id)->get();
        
        return view('buyer-single', ['buyer'=>$buyer]);

    }
    public function change_buyer(Request $request, $id){
        $buyer = Buyer::find($id);
        $buyer->buyer_name = $request->input('buyer_name');;
        $buyer->phone_number = $request->input('phone_number');
        $buyer->ammount_due = $buyer->ammount_due;
        $buyer->save();

        
        if($buyer->save()){
            return redirect('buyer-list')->
            with('success', 'You have updated "' . $buyer->buyer_name .'"');
        }
        else{
            return redirect('buyer-list')->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
    function destroy($id){
        
        $row = Buyer::find($id);     
        $row->delete();
        
        
        $buyer = Buyer::paginate(10);
        return view('buyer',['buyer'=>$buyer])->with('success',$row->buyer_name.' deleted');;
        
    }
}
