<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;
class UserController extends Controller
{
    //

  public function ChangePass(Request $request) {
    	$rules = [
    		'old_pass'=>'required|min:8',
    		'new_pass' => 'required|min:8'
    	];
    	$messages = [
    		'old_pass.required' => 'Đây là trường bắt buộc',
    		'old_pass.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    		'new_pass.required' => 'Đây là trường bắt buộc',
            'new_pass.min' => 'Mật khẩu phải chứa ít nhất 8 ký tự',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            return response()->json([
                   'error' => true,
                  'message' => $validator->errors()
                ], 200);
           
    		//return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$old_pass = $request->input('old_pass');

    		$new_pass = $request->input('new_pass');
    		$username = Auth::user()->username;
  
    		if( Auth::attempt(['username' => $username,'password' =>$old_pass])) {
               
                DB::update('update tai_khoan set password = ? where username = ?',[bcrypt($new_pass),$username]);
                	return 1;  
                	             	
    		} else {
    			$errors = new MessageBag(['errorpass' => 'Password cũ không chính xác']);
              
    			return response()->json([
                   'error' => true,
                  'message' => $errors
                ], 200);
    	}
    }
    }
}
