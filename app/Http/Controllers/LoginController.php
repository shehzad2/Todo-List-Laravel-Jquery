<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\LoginServices;
class LoginController extends Controller
{
   public function login(){
   	return view('login');
   }

   public function getLogin(Request $request,LoginServices $service){
   		return $service->getLogin($request);
   }

   public function saveRegister(Request $request,LoginServices $service){
   		return $service->saveRegister($request);
   }

    public function logout(LoginServices $service){
   		return $service->logout();
   }
}
