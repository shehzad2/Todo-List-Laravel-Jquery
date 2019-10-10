<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TaskServices;
class TaskController extends Controller
{
	public function __construct(){
   		$this->middleware('checkLogin');
	}
    public function index(TaskServices $task){
    	$getTask = $task->getTask();
    	return view('task',['getTask'=>$getTask]);
    }

    public function saveAddTask(Request $request,TaskServices $task){
    	return $task->saveAddTask($request);
    }

    public function changeStatus(Request $request,TaskServices $task){
    	return $task->changeStatus($request);
    }
}
