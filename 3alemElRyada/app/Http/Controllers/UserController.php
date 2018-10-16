<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User ;
use Validator;
class UserController extends Controller
{
    public function index(){
		$rules = [
			"user_id" => "required"
		];

		$validator = Validator(request()->all(),$rules);

		if($validator->fails()){
		return response()->json(['status'=>false,"message"=>"data not valid", "result"=>$validator->messages()]); 
		}
		$user = User::find(request("user_id"));

		return response()->json(['status'=>true,"message"=>"all users", "result"=>$user]); 
	}
}
