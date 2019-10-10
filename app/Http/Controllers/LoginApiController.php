<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;
class LoginApiController extends Controller
{
  
   public function getLogin(Request $request){
   	$data = $request->all();
      $userCount = DB::table('users')->where('email',$data['email'])->count();
      if($userCount > 0){
         $user = DB::table('users')->where('email',$data['email'])->first();
         if(Hash::check($data['password'], $user->password)){
            return response()->json(['status'=>200,'data'=>$user]);
         }else{
         return response()->json(['status'=>1,'message'=>'Password does not match']);
         }
      }else{
         return response()->json(['status'=>2,'message'=>'Email does not match']);
      }
   }

   public function saveRegister(Request $request){
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

   
}
