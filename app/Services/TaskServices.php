<?php
namespace App\Services;
use Illuminate\Http\Request;
use Session;
use DB;
class TaskServices
{
	public function saveAddTask($request){
		$data = $request->all();
		date_default_timezone_set('Asia/Dubai');
		$_id = DB::table('task')->count();
      	$_id = time().uniqid().($_id+1);
      	$task = array(
      		'_id'=>$_id,
      		'title'=>$data['title'],
      		'description'=>$data['description'],
      		'user_id'=>Session::get('user-id'),
      		'status'=>1
      	);
      	DB::table('task')->insert($task);
      	$getTast = DB::table('task')->where('user_id',Session::get('user-id'))->get();
      	return response()->json($getTast);

	}

	public function getTask(){
		return DB::table('task')->where('user_id',Session::get('user-id'))->get();
	}

	public function changeStatus($request){
		$data = $request->all();
		DB::table('task')->where('_id',$data['_id'])->where('user_id',Session::get('user-id'))->update(['status'=>$data['status']]);
		$task = DB::table('task')->where('_id',$data['_id'])->where('user_id',Session::get('user-id'))->first();
		return response()->json($task);
	}
}