<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;
class AccController extends Controller
{
    //
    public function getList_Acctype(){
		
      $pb=DB::table('loai_tai_khoan')->get();
         return view('acctype', compact("pb"));
       
       }
  
    public function Add_Acctype(Request $request){
		    $rules = [
      		'id_add'=>'required|max:5|unique:loai_tai_khoan,MA_LOAITK',
    		'name_add'=>'required', ];
      	$messages = [
    		'required' => 'Đây là trường bắt buộc',
    		
    		];
    	    $validator = Validator::make($request->all(), $rules, $messages);
    	     if ($validator->fails()) {
            return response()->json([
                   'error' => true,
                  'message' => $validator->errors(),
                ], 200);
                                    }
            else {
		
			         $MA_CV=$request->input('id_add');
			         $TEN_CV=$request->input('name_add');
		            DB::table('loai_tai_khoan')->insert(['MA_LOAITK'=>$MA_CV,'TEN_LOAITK'=>$TEN_CV]);
				        return 1;
			            }

		      }
		public function Edit_Acctype(Request $request){
		  $rules = [

    		'name_edit'=>'required', ];
    	   $messages = [
    		'required' => 'Đây là trường bắt buộc',
    		
    		];
    	$validator = Validator::make($request->all(), $rules, $messages);
    	if ($validator->fails()) {
            return response()->json([
                  'error' => true,
                  'message' => $validator->errors(),
                ], 200);
                 }
        else {
		
			$MA_CV=$request->input('id_edit');
			$TEN_CV=$request->input('name_edit');
		DB::table('loai_tai_khoan')->where('MA_LOAITK',$MA_CV)->update(['TEN_LOAITK'=>$TEN_CV]);
				return 1;
			}

		}
			public function Delete_Acctype($MA_CV){
				$cv=DB::table('tai_khoan')->where('MA_LOAI_TK','=',$MA_CV)->first();
				if($cv==null){
				DB::table('loai_tai_khoan')->where('MA_LOAI_TK','=',$MA_CV)->delete();
				return "<script>alert('Deleted');
                window.location.href='https://hrmappns.herokuapp.com/dsloaitk';</script>";
            }
            else return "<script>alert('Cannot delete');
            		 window.location.href='https://hrmappns.herokuapp.com/dsloaitk';</script>";
            
            
			}
      public function get_Acc(){
        $acc=DB::table('tai_khoan')->JOIN('loai_tai_khoan','loai_tai_khoan.MA_LOAI_TK','=','tai_khoan.MA_LOAI_TK')->get();
        
        return view('acclist', compact('acc'));
      }
    public function add_acc(Request $request) {
      $rules = [
        'username'=>'required|max:5|unique:tai_khoan,username',
        'password' => 'required|min:8',
        'id_nv'=>'unique:tai_khoan,ID_NV',
      ];
      $messages = [
        'id_nv.unique'=>'Nhân viên này đã có tài khoản'
      ];
      $validator = Validator::make($request->all(), $rules, $messages);

      if ($validator->fails()) {
            return response()->json([
                   'error' => true,
                  'message' => $validator->errors()
                ], 200);
           
        //return redirect()->back()->withErrors($validator)->withInput();
      } else {
        $username = $request->input('username');

        $id_nv = $request->input('id_nv');
        $loai_tk= $request->input('loai_tk');
        $password=$request->input('password');
        DB::table('tai_khoan')->insert(['username'=>$username,'ID_NV'=>$id_nv,'MA_LOAI_TK'=>$loai_tk,'password'=>bcrypt($password),'updated_at'=>date('Y-m-d H:i:s')]);

  }
    }
    public function Edit_Acc(Request $request){
    
      $username=$request->input('username_edit');
      $loai_tk=$request->input('loaitk_edit');
    DB::table('tai_khoan')->where('username',$username)->update(['MA_LOAI_TK'=>$loai_tk]);
        return "<script>alert('Update');
                window.location.href='https://hrmappns.herokuapp.com/dstk';</script>";
      }

   public function Delete_Acc($username){
      
    DB::table('tai_khoan')->where('username',$username)->delete();
        return "<script>alert('Delete');
                window.location.href='https://hrmappns.herokuapp.com/dstk';</script>";
      }
}
