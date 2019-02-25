<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;
class HomeController extends Controller
{
    
    public function __construct() {
    	$this->middleware('auth');
    }
		public function getList_Department(){
		if(Auth::check()){
    $username=Auth::user()->username;
    $pb=DB::table('phong_ban')->get();
   return view('departmentlist', compact("pb"));
       
       }
   }
       public function getList_Position(){
		if(Auth::check()){
    $username=Auth::user()->username;
    $pb=DB::table('chuc_vu')->get();
   return view('positionlist', compact("pb"));
       
       }

}
		public function Add_Department(Request $request){
		$rules = [
    		'id_add'=>'required|max:5|unique:phong_ban,MA_PB',
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
		
			$MA_PB=$request->input('id_add');
			$TEN_PB=$request->input('name_add');
		DB::table('phong_ban')->insert(['MA_PB'=>$MA_PB,'TEN_PB'=>$TEN_PB]);
				return 1;
			}

		}
		public function Edit_Department(Request $request){
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
		
			$MA_PB=$request->input('id_edit');
			$TEN_PB=$request->input('name_edit');
		DB::table('phong_ban')->where('MA_PB',$MA_PB)->update(['TEN_PB'=>$TEN_PB]);
				return 1;
			}

		}
			public function Delete_Department($MA_PB){
				$dep=DB::table('nhan_vien')->where('MA_PB','=',$MA_PB)->first();
				if($dep==null){
				DB::table('phong_ban')->where('MA_PB','=',$MA_PB)->delete();
				return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dspb';</script>";
                	}
                else return "<script>alert('Cannot delete');
            		 window.location.href='http://localhost:81/hrm/dspb';</script>";
            
			}


		public function Add_Position(Request $request){
		$rules = [
    		'id_add'=>'required|max:5|unique:chuc_vu,MA_CV',
    		
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
		DB::table('chuc_vu')->insert(['MA_CV'=>$MA_CV,'TEN_CV'=>$TEN_CV]);
				return 1;
			}

		}
		public function Edit_Position(Request $request){
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
		DB::table('chuc_vu')->where('MA_CV',$MA_CV)->update(['TEN_CV'=>$TEN_CV]);
				return 1;
			}

		}
			public function Delete_Position($MA_CV){
				$cv=DB::table('qua_trinh_cong_tac')->where('MA_CV','=',$MA_CV)->first();
				if($cv==null){
				DB::table('chuc_vu')->where('MA_CV','=',$MA_CV)->delete();
				return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dscv';</script>";
            }
            else return "<script>alert('Cannot delete');
            		 window.location.href='http://localhost:81/hrm/dscv';</script>";
            
            
			}

			public function getList_Qualification(){

				$pb=DB::table('bang_cap')->get();
   				return view('qualificationlist', compact("pb"));
			}
			public function Add_Qualification(Request $request){

				$rules = [
    		'qu'=>'required|unique:bang_cap,TEN_BC',
    	];
    	$messages = [
    		'qu'=>'Qualification has already been taken',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            //return response()->json([
            //    'error'=> true,
             //   'message' => $validator->errors()
           // ],200);
    		return redirect()->back()->withErrors($validator)->withInput();
    	} 
    	else {
    		$TEN_BC=$request->input('qu');
    		DB::table('bang_cap')->insert(['TEN_BC'=>$TEN_BC]);

    		return "<script>alert('Added');
            		 window.location.href='http://localhost:81/hrm/dsbc';</script>";
    	}
			}
    	public function Delete_Qualification($MA_BC){
				$cv=DB::table('co_bc')->where('MA_BC','=',$MA_BC)->first();
				if($cv==null){
				DB::table('bang_cap')->where('MA_BC','=',$MA_BC)->delete();
				return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dsbc';</script>";
            }
            else return "<script>alert('Cannot delete');
            		 window.location.href='http://localhost:81/hrm/dsbc';</script>";
            
            
			}
			public function getList_Skill(){

				$pb=DB::table('ki_nang')->get();
   				return view('skilllist', compact("pb"));
			}
			public function Add_Skill(Request $request){

				$rules = [
    		'sk'=>'required|unique:ki_nang,TEN_KN',
    	];
    	$messages = [
    		'sk'=>'This skill has already been taken',
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            //return response()->json([
            //    'error'=> true,
             //   'message' => $validator->errors()
           // ],200);
    		return redirect()->back()->withErrors($validator)->withInput();
    	} 
    	else {
    		$TEN_KN=$request->input('sk');
    		DB::table('ki_nang')->insert(['TEN_KN'=>$TEN_KN]);

    		return "<script>alert('Added');
            		 window.location.href='http://localhost:81/hrm/dskn';</script>";
    	}
			}
    	public function Delete_Skill($MA_KN){
				$cv=DB::table('co_kn')->where('MA_KN','=',$MA_KN)->first();
				if($cv==null){
				DB::table('ki_nang')->where('MA_KN','=',$MA_KN)->delete();
				return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dskn';</script>";
            }
            else return "<script>alert('Cannot delete');
            		 window.location.href='http://localhost:81/hrm/dskn';</script>";
            
            
			}
            public function getList_Allowance(){

                $pb=DB::table('phu_cap')->get();
                return view('allowancelist', compact("pb"));
            }
           public function Add_Allowance(Request $request){
        $rules = [
            'id_add'=>'required|max:5|unique:phu_cap,MA_PHU_CAP',
            
            'name_add'=>'required',
            'fee_add'=>'required|numeric' ];
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
            $FEE=$request->input('fee_add');
        DB::table('phu_cap')->insert(['MA_PHU_CAP'=>$MA_CV,'TEN_PHU_CAP'=>$TEN_CV,'MUC_PHU_CAP'=>$FEE]);
                return 1;
            }

        }
        public function Edit_Allowance(Request $request){
        $rules = [

            'name_edit'=>'required',
            'fee_edit'=>'required|numeric' ];
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
            $FEE=$request->input('fee_edit');
        DB::table('phu_cap')->where('MA_PHU_CAP',$MA_CV)->update(['TEN_PHU_CAP'=>$TEN_CV,'MUC_PHU_CAP'=>$FEE]);
                return 1;
            }

        }
        public function Delete_Allowance($MA_KN){
                
                DB::table('phu_cap')->where('MA_PHU_CAP','=',$MA_KN)->delete();
                return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dspc';</script>";
            }
        public function getList_Deductions(){

                $pb=DB::table('bao_hiem')->get();
                return view('deductionslist', compact("pb"));
            }
        public function Add_Deductions(Request $request){
                $rules = [
            'id_add'=>'required|max:5|unique:bao_hiem,MA_GIAM_TRU',
            
            'name_add'=>'required',
            'fee_add'=>'required|numeric',
            'tl_add'=>'required' ];
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
            $FEE=$request->input('fee_add');
            $TL=$request->input('tl_add');
        DB::table('bao_hiem')->insert(['MA_GIAM_TRU'=>$MA_CV,'TEN_KHOAN_GIAM_TRU'=>$TEN_CV,'MUC_DONG'=>$FEE,'TI_LE'=>$TL]);
                return 1;
            }

        }
        public function Edit_Deductions(Request $request){
        $rules = [

            'name_edit'=>'required',
            'fee_edit'=>'required|numeric',
            'tl_edit'=>'required' ];
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
            $FEE=$request->input('fee_edit');
             $TL=$request->input('tl_edit');
        DB::table('bao_hiem')->where('MA_GIAM_TRU',$MA_CV)->update(['TEN_KHOAN_GIAM_TRU'=>$TEN_CV,'MUC_DONG'=>$FEE,'TI_LE'=>$TL]);
                return 1;
            }

        }
        public function Delete_Deductions($MA_KN){
                
                DB::table('bao_hiem')->where('MA_GIAM_TRU','=',$MA_KN)->delete();
                return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dsgt';</script>";
            }
        public function getList_PayRate(){

                $pb=DB::table('he_so_luong')->get();
                return view('payratelist', compact("pb"));
            }
        public function Add_PayRate(Request $request){
                $rules = [
            'id_add'=>'required|max:5|unique:he_so_luong,MA_HE_SO',
            
            'name_add'=>'required',];
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
           
        DB::table('he_so_luong')->insert(['MA_HE_SO'=>$MA_CV,'HE_SO'=>$TEN_CV]);
                return 1;
            }

        }
        public function Edit_PayRate(Request $request){
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
        DB::table('he_so_luong')->where('MA_HE_SO',$MA_CV)->update(['HE_SO'=>$TEN_CV]);
                return 1;
            }

        }
        public function Delete_PayRate($MA_KN){
                $check=DB::table('nhan_vien')->where('MA_HE_SO','=',$MA_KN)->first();
                if($check==null){
                DB::table('he_so_luong')->where('MA_HE_SO','=',$MA_KN)->delete();
                return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dshs';</script>";
            }
            else  return "<script>alert('Cannot delete');
                window.location.href='http://localhost:81/hrm/dshs';</script>";
            }
        public function getList_categorieslabour(){

                $pb=DB::table('loai_hop_dong')->get();
                return view('categorieslabourlist', compact("pb"));
            }
         public function Add_categorieslabour(Request $request){
                $rules = [
            'id_add'=>'required|max:5|unique:loai_hop_dong,MA_LOAI_HD',
            
            'name_add'=>'required',];
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
           
        DB::table('loai_hop_dong')->insert(['MA_LOAI_HD'=>$MA_CV,'TEN_LOAI_HD'=>$TEN_CV]);
                return 1;
            }

        }
        public function Edit_categorieslabour(Request $request){
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
        DB::table('loai_hop_dong')->where('MA_LOAI_HD',$MA_CV)->update(['TEN_LOAI_HD'=>$TEN_CV]);
                return 1;
            }
        }
        public function Delete_categorieslabour($MA_KN){
                $check=DB::table('hop_dong_lao_dong')->where('MA_LOAI_HD','=',$MA_KN)->first();
                if($check==null){
                DB::table('loai_hop_dong')->where('MA_LOAI_HD','=',$MA_KN)->delete();
                return "<script>alert('Deleted');
                window.location.href='http://localhost:81/hrm/dslhd';</script>";
            }
        }
		}
   