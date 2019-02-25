<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;
class LoginController extends Controller
{
   
    public function getLogin() {
       if(Auth::check()){
    $username=Auth::user()->username;
    $user=DB::table('tai_khoan')->join('nhan_vien','nhan_vien.ID_NV','=','tai_khoan.ID_NV')->where('tai_khoan.username','=',[$username]) ->get();
   return view('index')->with('user', $user);
       

        }
    	return view('login');
    }
    public function postLogin(Request $request) {
    	$rules = [
    		'username'=>'required',
    		'password' => 'required|min:8'
    	];
    	$messages = [
    		'username.required' => 'username là trường bắt buộc',
    		
    		'password.required' => 'Mật khẩu là trường bắt buộc',
    		
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            //return response()->json([
            //    'error'=> true,
             //   'message' => $validator->errors()
           // ],200);
    		return redirect()->back()->withErrors($validator)->withInput();
    	} else {
    		$username = $request->input('username');
    		$password = $request->input('password');

    		if( Auth::attempt(['username' => $username, 'password' =>$password])) {
                
             //return view('index')->with('user', $user);
                return redirect()->route('index');

    		} else {
    			$errors = new MessageBag(['errorlogin' => 'Username hoặc mật khẩu không đúng']);
                //return response()->json([
                //    'error' => true,
                 //   'message' => $errors
               // ], 200);
    			return redirect()->back()->withInput()->withErrors($errors);
    		}
    	}
    }
    public function logout(){

        Auth::logout(); 
        return redirect('/');
    }
public function getIndex() {
if(Auth::check()){
    $username=Auth::user()->username;
    $user=DB::table('tai_khoan')->join('nhan_vien','nhan_vien.ID_NV','=','tai_khoan.ID_NV')->where('tai_khoan.username','=',[$username]) ->get();
   return view('index')->with('user', $user);
       

        }
        else return redirect('/');
    }
}