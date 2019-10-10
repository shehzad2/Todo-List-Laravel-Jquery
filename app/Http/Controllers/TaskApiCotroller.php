<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
class TaskApiController extends Controller
{
	
    public function getTask(Request $request){
       $token = $request->header('x-access-token');
        if(empty($token)){
             return response()->json(['code'=>401,'message'=>'You not authorized to do this action']);
        }else{
            $task = DB::table('task')->where('user_id',$token)->get();
            return response()->json($task);
        }
      
    }

   
}
