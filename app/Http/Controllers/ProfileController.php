<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Leave;
use App\Models\Department;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public $menus;
    function __construct() {
        $this->menus = getmenu('admin@zelig.com'); 

      }
      public function edit_profile($id){
        $user = User::join('departments','departments.id','=','users.department')
        ->where('users.id','=',$id)
        ->get(['users.id','users.name','users.dob', 'users.nid', 'users.designation', 'users.phone_number', 'users.attachment', 'users.image','departments.department_name']);
        $department = Department::all();
        return view('user-profile', ['user'=>$user,'department'=>$department]);
    }
    public function change_profile(Request $request, $id){
        $profile = User::find($id);
        $profile->name = $request->input('name');;
        $profile->dob = $request->input('dob');
        $profile->nid = $request->input('nid');
        $profile->phone_number= $request->input('phone_number');
        $dept = Department::where('department_name','=',$request->input('department'))->first();
        $profile->department = $dept->id;
        $profile->designation = $request->input('designation');
        if($request->file('attachment')){
            $attachment = time().'.'.$request->file('attachment')->extension();  
            $request->file('attachment')->move(public_path('uploads'), $attachment);
            $uploadAttachment = 'uploads/'.$attachment;
        }
        else{
            $uploadAttachment = $profile->attachment;
        }
        if($request->file('image')){
            $image = time().'.'.$request->file('image')->extension();  
            $request->file('image')->move(public_path('uploads'), $image);
            $uploadImage = 'uploads/'.$image;
        }
        else{
            $uploadImage = $profile->image;
        }
        $profile->attachment = $uploadAttachment;
        $profile->image = $uploadImage;
        $profile->save();

        
        if($profile->save()){
            return redirect('user-profile/'.$id)->
            with('success', 'Your Profile upadeted.');
        }
        else{
            return redirect('user-profile/'.$id)->
            with('fail', 'Something Went Wrong Please Try Again!');
        }
    }
}
