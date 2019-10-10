<?php
namespace App\Services;
use Illuminate\Http\Request;
use Session;
use DB;
use Illuminate\Support\Facades\Hash;
class LoginServices
{
	public function getLogin($request){
		$data = $request->all();
		$userCount = DB::table('users')->where('email',$data['email'])->count();
		if($userCount > 0){
			$user = DB::table('users')->where('email',$data['email'])->first();
			if(Hash::check($data['password'], $user->password)){
				Session::put('user-email',$user->email);
				Session::put('user-id',$user->token);
			}else{
			return response()->json(['status'=>1,'message'=>'Password does not match']);
			}
		}else{
			return response()->json(['status'=>2,'message'=>'Email does not match']);
		}
		
	}

	public function saveRegister($request){
		$data = $request->all();
		date_default_timezone_set('Asia/Dubai');
		$password = Hash::make($data['password']);
		$userCount = DB::table('users')->count();
      	$userId = time().uniqid().($userCount+1);
      	$userCount = DB::table('users')->where('email',$data['email'])->count();
      	if($userCount > 0):
      		return response()->json(['status'=>2,'message'=>'User already exist']);
      	else:
		$users = array(
			'email'=>$data['email'],
			'password'=>$password,
			'token'=>$userId,
			'status'=>1
		);
		 DB::table('users')->insert($users);
		 return response()->json(['status'=>1,'message'=>'Register Successfully']);
		endif;
	}

	public function logout(){
		Session::forget('user-email');
		Session::forget('user-id');
		return redirect()->to('/');
	}
}