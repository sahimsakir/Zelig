<?php
  
  use Illuminate\Support\Facades\DB;



   function getmenu($email){

    $data = DB::table('user_auth')
    ->join('users','users.id','=','user_auth.user_id')
    ->where('users.email',$email)
    ->select('menu')
    ->get();
    
    return $data;

  }

  function checkRolePermission($email,$menu){

    $data = getmenu($email);
    if(collect($data)->where('menu','=',$menu)->pluck('menu')->first()){
      return true;
    }else return false;
    

  }