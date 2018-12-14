<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;

class EmployeeController extends Controller
{
    //

    function getList(Request $Request){

    	if(Auth::check()){
    $username=Auth::user()->username;
    $nv=DB::table('nhan_vien')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->orderBy('ID_NV','asc')->get();
   return view('danhsachnhanvien', compact("nv"));
       

        }
        else return redirect('/');
    }
    function addemployview(){

    	return view('add_new_employee');
    }
    function addemployee(Request $request){
    	//validator

    	$rules = [
    		'name'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
    		'dob'=>'required',
    		'noi_sinh'=>'required',
    		'ton_giao'=>'required',
    		'dan_toc'=>'required',
    		'so_nha'=>'required',
    		'xa'=>'required',
    		'quan'=>'required',
    		'tinh'=>'required',
    		'cmnd'=>'required|numeric|max:999999999999999',
    		'ngay_cap'=>'required',
    		'noi_cap'=>'required',
    		'sdt'=>'required|numeric|max:999999999999999|unique:nhan_vien,SDT',
    		'email'=>'required|email|unique:nhan_vien,EMAIL',
    		'atm'=>'required|numeric|max:99999999999999999999',
    		'ngay_vao_lam'=>'required',
            
            'nguoi_phu_thuoc|numeric',
    		
    		'file'=>'image'

    	];
    	$messages = [
    		'required' => 'Đây là trường bắt buộc',
    		
    		'numeric' => 'Trường chỉ được nhập số',
    		'email.email'=>'Email không đúng định dạng',
    		'max'=>'Không được nhập quá 15 số',
    		
    		
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            
    		return redirect()->back()->withErrors($validator)->withInput();
    	}
    	//
    	 $file_name='';
    	if($request->hasFile('file'))
    	{
    		$files = $request->file;
            $file_name = time().'_'.$files->getClientOriginalName();
            // Lưu file vào thư mục user với tên là biến $filename
             $files->move('image/user', $file_name);
         }
           
    		//allRequest

    		$allRequest=$request->all();
    		$HO_TEN=$allRequest['name'];
    		$GIOI_TINH=$allRequest['gioi_tinh'];
    		$NGAY_SINH=$allRequest['dob'];
    		$NOI_SINH=$allRequest['noi_sinh'];
    		$TON_GIAO=$allRequest['ton_giao'];
    		$DAN_TOC=$allRequest['dan_toc'];
    		$SO_NHA=$allRequest['so_nha'];
            $HE_SO_LUONG=$allRequest['he_so_luong'];
    		$maqh=$allRequest['quan'];
    		$xaid=$allRequest['xa'];
    		$matp=$allRequest['tinh'];
    		$CMND=$allRequest['cmnd'];
            $NGUOI_PHU_THUOC=$allRequest['nguoi_phu_thuoc'];
    		$NGAY_CAP=$allRequest['ngay_cap'];
    		$NOI_CAP=$allRequest['noi_cap'];
    		$MA_THE_NH=$allRequest['atm'];
    		$SDT=$allRequest['sdt'];
    		$EMAIL=$allRequest['email'];
    		$NGAY_VAO_LAM=$allRequest['ngay_vao_lam'];
    		$MA_PB=$allRequest['phong_ban'];
    		$CHUC_VU=$allRequest['chuc_vu'];
            if($request->has('bao_hiem')){
               $BAO_HIEM=$allRequest['bao_hiem'];

            }
             if($request->has('ki_nang')){
            $KI_NANG=$allRequest['ki_nang'];
        }
         if($request->has('bang_cap')){
            $BANG_CAP=$allRequest['bang_cap'];
        }
         if($request->has('phu_cap')){
            $PHU_CAP=$allRequest['phu_cap'];            

            }//
            
			//
    			$data_insert=array(
            'MA_HE_SO'=>$HE_SO_LUONG,
    		'HO_TEN'=>$HO_TEN,
    		'GIOI_TINH'=>$GIOI_TINH,
    		'NGAY_SINH'=>$NGAY_SINH,
    		'NOI_SINH'=>$NOI_SINH,
    		'TON_GIAO'=>$TON_GIAO,
    		'DAN_TOC'=>$DAN_TOC,
    		'SO_NHA'=>$SO_NHA,
    		'maqh'=>$maqh,
    		'xaid'=>$xaid,
    		'matp'=>$matp,
    		'CMND'=>$CMND,
    		'NGAY_CAP'=>$NGAY_CAP,
    		'NOI_CAP'=>$NOI_CAP,
    		'MA_THENH'=>$MA_THE_NH,
    		'SDT'=>$SDT,
    		'EMAIL'=>$EMAIL,
            'LUONG_CO_BAN'=>0,
    		'MA_PB'=>$MA_PB,
    		'ANH_DAI_DIEN'=>$file_name,
    		'NGAY_VAO_LAM'=>$NGAY_VAO_LAM,
            'NGUOI_PHU_THUOC'=>$NGUOI_PHU_THUOC,
    	);

        DB::table('nhan_vien')->insert($data_insert);
       
        //insert chuc_vu
        $id1=DB::table('nhan_vien')->orderBy('ID_NV','asc')->GET();
        foreach ($id1 as $id1) {
            # code...
            $id=$id1->ID_NV;
        }
      
        	$inser_cv=array(
        	'ID_NV'=>$id,
        	'MA_CV'=>$CHUC_VU,
        	'THOI_GIAN_BAT_DAU_LV'=>$NGAY_VAO_LAM,
        );
        	 DB::table('qua_trinh_cong_tac')->insert($inser_cv);       

         if(isset($PHU_CAP)){
    foreach ($PHU_CAP as $key => $PHU_CAP) {
            # code...
                 DB::table('co_phu_cap')->insert(['ID_NV'=>$id,'MA_PHU_CAP'=>$PHU_CAP]);
            
        }
    }
         if(isset($KI_NANG)){
    foreach ($KI_NANG as $key => $KI_NANG) {
            # code...

                 DB::table('co_kn')->insert(['ID_NV'=>$id,'MA_KN'=>$KI_NANG]);
            
        }
    }
         if(isset($BANG_CAP)){
    foreach ($BANG_CAP as $key => $BANG_CAP) {
            # code...

                 DB::table('co_bc')->insert(['ID_NV'=>$id,'MA_BC'=>$BANG_CAP]);
        }
    }
        if(isset($BAO_HIEM)){
    foreach ($BAO_HIEM as $key => $BAO_HIEM) {
            # code...

                 DB::table('nhan_vien_bao_hiem')->insert(['ID_NV'=>$id,'MA_GIAM_TRU'=>$BAO_HIEM]);
        }
    }
        
         return "<script>alert('Thêm mới thành công');
                window.location.href='http://localhost:81/hrm/dsnv';</script>";


    }
   function editemployview($ID_NV){
   		 
   		$nv = DB::select('select * from nhan_vien where ID_NV=?',[$ID_NV]);
   		
      return view('edit_employee',['nv'=>$nv]);


   }
  function editemploy(Request $request,$ID_NV){
  	//Validator

   	$rules = [
    		'name'=>'required|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
    		'noi_sinh'=>'required',
    		'ton_giao'=>'required',
    		'dan_toc'=>'required',
    		'so_nha'=>'required',
    		'xa'=>'required',
    		'quan'=>'required',
    		'tinh'=>'required',
    		'cmnd'=>'required|numeric|max:999999999999999',
    		'ngay_cap'=>'required',
    		'noi_cap'=>'required',
    		'sdt'=>'required|numeric|max:999999999999999',
    		//'sdt'=>'required|regex:/(01)[0-9]{9}/|max:999999999999999',
    		'email'=>'required|email',
    		'atm'=>'required|numeric',
    		'ngay_vao_lam'=>'required',
            'nguoi_phu_thuoc'=>'numeric',
    		'file'=>'image'

    	];
    	$messages = [
    		'required' => 'Đây là trường bắt buộc',
    		
    		'numeric' => 'Trường chỉ được nhập số',
    		'email.email'=>'Email không đúng định dạng',
    		'max'=>'Không được nhập quá 15 số',
    		'file.image'=>"Chỉ chấp nhận file ảnh(jpeg, png, bmp, gif, or svg)"
    		
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            
    		return redirect()->back()->withErrors($validator)->withInput();
    	}
    	//
    	 $file_name='';
    	
           
    		//allRequest

    		$allRequest=$request->all();
    		$HO_TEN=$allRequest['name'];
            $HE_SO_LUONG=$allRequest['he_so_luong'];
    		$GIOI_TINH=$allRequest['gioi_tinh'];
    		$NGAY_SINH=$allRequest['dob'];
    		$NOI_SINH=$allRequest['noi_sinh'];
    		$TON_GIAO=$allRequest['ton_giao'];
    		$DAN_TOC=$allRequest['dan_toc'];
    		$SO_NHA=$allRequest['so_nha'];
    		$QUAN_HUYEN=$allRequest['quan'];
    		$PHUONG_XA=$allRequest['xa'];
    		$TP_TINH=$allRequest['tinh'];
    		$CMND=$allRequest['cmnd'];
    		$NGAY_CAP=$allRequest['ngay_cap'];
    		$NOI_CAP=$allRequest['noi_cap'];
    		$MA_THE_NH=$allRequest['atm'];
    		$SDT=$allRequest['sdt'];
    		$EMAIL=$allRequest['email'];
            $NGUOI_PHU_THUOC=$allRequest['nguoi_phu_thuoc'];
    		$NGAY_VAO_LAM=$allRequest['ngay_vao_lam'];
    		$MA_PB=$allRequest['phong_ban'];
            if($request->has('bao_hiem')){
               $BAO_HIEM=$allRequest['bao_hiem'];

            }
             if($request->has('ki_nang')){
            $KI_NANG=$allRequest['ki_nang'];
        }
         if($request->has('bang_cap')){
            $BANG_CAP=$allRequest['bang_cap'];
        }
         if($request->has('phu_cap')){
            $PHU_CAP=$allRequest['phu_cap'];            

			}//
			if($request->hasFile('file'))
    	{
    		$files = $request->file;
            $file_name = time().'_'.$files->getClientOriginalName();
            // Lưu file vào thư mục user với tên là biến $filename
             $files->move('image/user', $file_name);
         
    			$data_update=array(
            'MA_HE_SO'=>$HE_SO_LUONG,
    		'HO_TEN'=>$HO_TEN,
    		'GIOI_TINH'=>$GIOI_TINH,
    		'NGAY_SINH'=>$NGAY_SINH,
    		'NOI_SINH'=>$NOI_SINH,
    		'TON_GIAO'=>$TON_GIAO,
    		'DAN_TOC'=>$DAN_TOC,
    		'SO_NHA'=>$SO_NHA,
    		'maqh'=>$QUAN_HUYEN,
    		'xaid'=>$PHUONG_XA,
    		'matp'=>$TP_TINH,
    		'CMND'=>$CMND,
    		'NGAY_CAP'=>$NGAY_CAP,
    		'NOI_CAP'=>$NOI_CAP,
    		'MA_THENH'=>$MA_THE_NH,
    		'SDT'=>$SDT,
    		'EMAIL'=>$EMAIL,
    		'MA_PB'=>$MA_PB,
            'LUONG_CO_BAN'=>$LUONG_CO_BAN,
    		'ANH_DAI_DIEN'=>$file_name,
            'NGUOI_PHU_THUOC'=>$NGUOI_PHU_THUOC,
    		'NGAY_VAO_LAM'=>$NGAY_VAO_LAM
    	);

    		}
    else {

    	$data_update=array(
            'MA_HE_SO'=>$HE_SO_LUONG,
    		'HO_TEN'=>$HO_TEN,
    		'GIOI_TINH'=>$GIOI_TINH,
    		'NGAY_SINH'=>$NGAY_SINH,
    		'NOI_SINH'=>$NOI_SINH,
    		'TON_GIAO'=>$TON_GIAO,
    		'DAN_TOC'=>$DAN_TOC,
    		'SO_NHA'=>$SO_NHA,
    		'maqh'=>$QUAN_HUYEN,
    		'xaid'=>$PHUONG_XA,
    		'matp'=>$TP_TINH,
    		'CMND'=>$CMND,
    		'NGAY_CAP'=>$NGAY_CAP,
    		'NOI_CAP'=>$NOI_CAP,
    		'MA_THENH'=>$MA_THE_NH,
    		'SDT'=>$SDT,
    		'EMAIL'=>$EMAIL,
    		'MA_PB'=>$MA_PB,
            'NGUOI_PHU_THUOC'=>$NGUOI_PHU_THUOC,
    		'NGAY_VAO_LAM'=>$NGAY_VAO_LAM
    	);

    }
   
			
  	$updateData = DB::table('nhan_vien')->where('ID_NV','=', $request->id)->update($data_update);
    //update dữ liệu vào các bảng  phụ
    //xóa các dữ liệu cũ ko cần dùng tới

        DB::table('co_phu_cap')->where('ID_NV',$ID_NV)->delete();
        DB::table('co_bc')->where('ID_NV',$ID_NV)->delete();
        DB::table('nhan_vien_bao_hiem')->where('ID_NV',$ID_NV)->delete();
        DB::table('co_kn')->where('ID_NV',$ID_NV)->delete();
   //chèn dữ liệu mới
         if(isset($PHU_CAP)){
    foreach ($PHU_CAP as $key => $PHU_CAP) {
            # code...
                 DB::table('co_phu_cap')->insert(['ID_NV'=>$ID_NV,'MA_PHU_CAP'=>$PHU_CAP]);
            
        }
    }
         if(isset($KI_NANG)){
    foreach ($KI_NANG as $key => $KI_NANG) {
            # code...

                 DB::table('co_kn')->insert(['ID_NV'=>$ID_NV,'MA_KN'=>$KI_NANG]);
            
        }
    }
         if(isset($BANG_CAP)){
    foreach ($BANG_CAP as $key => $BANG_CAP) {
            # code...

                 DB::table('co_bc')->insert(['ID_NV'=>$ID_NV,'MA_BC'=>$BANG_CAP]);
        }
    }
        if(isset($BAO_HIEM)){
    foreach ($BAO_HIEM as $key => $BAO_HIEM) {
            # code...

                 DB::table('nhan_vien_bao_hiem')->insert(['ID_NV'=>$ID_NV,'MA_GIAM_TRU'=>$BAO_HIEM]);
        }
    }
      return "<script>alert('Update thành công');
                window.location.href='http://localhost:81/hrm/dsnv';</script>";




  }
 public function destroy($ID_NV) {

      DB::delete('delete from nhan_vien where ID_NV = ?',[$ID_NV]);

      return "<script>alert('Đã xóa nhân viên');
                window.location.href='http://localhost:81/hrm/dsnv';</script>";


   }
public function  getHuyen($matp){
	
	 $data=DB::table('devvn_quanhuyen')->where('matp',$matp)->pluck('maqh','QUAN_HUYEN');
	 
		return json_encode($data);
			}
public function  getXa($maqh){
	
	 $data=DB::table('devvn_xaphuongthitran')->where('maqh',$maqh)->pluck('name','xaid');
	 
		return json_encode($data);
			}
public function get_list_khen_thuong(){
    $kt=DB::table('khen_thuong')->get();
    return view('khenthuonglist', compact('kt'));
}
public function them_khen_thuong(Request $request){
  //Validator

    $rules = [
            'ly_do'=>'required|max:25|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'id_qd'=>'required|max:20|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/|unique:khen_thuong,MA_QD_KT',
            'ngay_hieu_luc'=>'required|date',
            'ngay_ki'=>'required|date',
            'tien_thuong'=>'numeric|required',
            

        ];
        $messages = [
           'required'=>'Đây là trường không được bỏ trống',
           'date'=>'Định dạng ngày tháng',
           'numeric'=>'Chỉ cho phép nhập số'

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //
        $MA_QD_KT=$request->input('id_qd');
        $ID_NV=$request->input('id_employee');
        $GIA_ID_NV=$request->input('gi_id_nv');
        $NGAY_KY_KT=$request->input('ngay_ki');
        $NGAY_THUC_HIEN_KT=$request->input('ngay_hieu_luc');
        $LY_DO=$request->input('ly_do');
        $TIEN_THUONG=$request->input('tien_thuong');

        $insertarr=array(
        'MA_QD_KT'=>$MA_QD_KT,
        'ID_NV'=>$ID_NV,
        'GIA_ID_NV'=>$GIA_ID_NV,
        'NGAY_KY_KT'=>$NGAY_KY_KT,
        'NGAY_THUC_HIEN_KT'=>$NGAY_THUC_HIEN_KT,
        'LY_DO'=>$LY_DO,
        'TIEN_THUONG'=>$TIEN_THUONG,
    );
        DB::table('khen_thuong')->insert($insertarr);
        return "<script>alert('Đã thêm');
                window.location.href='http://localhost:81/hrm/dskhenthuong';</script>";
}
public function view_khen_thuong($MA){

    $kt=DB::table('khen_thuong')->where('MA_QD_KT',$MA)->get();
    return view('edit_khen_thuong',compact('kt'));
}
public function edit_khen_thuong(Request $request){

    //Validator

    $rules = [
            'ly_do'=>'required|max:25|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'ngay_hieu_luc'=>'required|date',
            'ngay_ki'=>'required|date',
            'tien_thuong'=>'numeric|required',
            

        ];
        $messages = [
           'required'=>'Đây là trường không được bỏ trống',
           'date'=>'Định dạng ngày tháng',
           'numeric'=>'Chỉ cho phép nhập số'

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //
        $MA_QD_KT=$request->input('id_qd');
        $ID_NV=$request->input('id_employee');
        $GIA_ID_NV=$request->input('gi_id_nv');
        $NGAY_KY_KT=$request->input('ngay_ki');
        $NGAY_THUC_HIEN_KT=$request->input('ngay_hieu_luc');
        $LY_DO=$request->input('ly_do');
        $TIEN_THUONG=$request->input('tien_thuong');

        $updatearr=array(
        'ID_NV'=>$ID_NV,
        'GIA_ID_NV'=>$GIA_ID_NV,
        'NGAY_KY_KT'=>$NGAY_KY_KT,
        'NGAY_THUC_HIEN_KT'=>$NGAY_THUC_HIEN_KT,
        'LY_DO'=>$LY_DO,
        'TIEN_THUONG'=>$TIEN_THUONG,
    );
        DB::table('khen_thuong')->where('MA_QD_KT',$MA_QD_KT)->update($updatearr);

}
    public function del_khen_thuong($ma){

        DB::table('khen_thuong')->where('MA_QD_KT',$ma)->delete();
        return "<script>alert('Đã xóa');
                window.location.href='http://localhost:81/hrm/dskhenthuong';</script>";
    }
  public function get_list_ki_luat(){
    $kl=DB::table('ki_luat')->get();
    return view('kiluatlist', compact('kl'));
}
public function them_ki_luat(Request $request){
  //Validator

    $rules = [
            'ly_do'=>'required|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'id_qd'=>'required|max:20|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/|unique:khen_thuong,MA_QD_KT',
            'ngay_hieu_luc'=>'required|date',
            'ngay_ki'=>'required|date',
            'tien_kl'=>'numeric|required',
            

        ];
        $messages = [
           'required'=>'Đây là trường không được bỏ trống',
           'date'=>'Định dạng ngày tháng',
           'numeric'=>'Chỉ cho phép nhập số'

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //
        $MA=$request->input('id_qd');
        $ID_NV=$request->input('id_employee');
        $GIA_ID_NV=$request->input('gi_id_nv');
        $NGAY_KY=$request->input('ngay_ki');
        $NGAY_THUC_HIEN=$request->input('ngay_hieu_luc');
        $LY_DO=$request->input('ly_do');
        $TIEN_KL=$request->input('tien_kl');
        $HINH_THUC=$request->input('hinh_thuc');

        $insertarr=array(
        'MA_KL'=>$MA,
        'ID_NV'=>$ID_NV,
        'GIA_ID_NV'=>$GIA_ID_NV,
        'NGAY_KI_KL'=>$NGAY_KY,
        'NGAY_THUC_HIEN_KL'=>$NGAY_THUC_HIEN,
        'LY_DO'=>$LY_DO,
        'MUC_PHAT'=>$TIEN_KL,
        'HINH_THUC_KI_LUAT'=>$HINH_THUC,
    );
        DB::table('ki_luat')->insert($insertarr);
        return "<script>alert('Đã thêm');
                window.location.href='http://localhost:81/hrm/dskiluat';</script>";
}
public function view_ki_luat($MA){

    $kl=DB::table('ki_luat')->where('MA_KL',$MA)->get();
    return view('edit_ki_luat',compact('kl'));
}
public function edit_ki_luat(Request $request){

    //Validator

    $rules = [
            'ly_do'=>'required|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'id_qd'=>'required|max:20|regex:/(^[a-z0-9A-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/|unique:khen_thuong,MA_QD_KT',
            'ngay_hieu_luc'=>'required|date',
            'ngay_ki'=>'required|date',
            'tien_kl'=>'numeric|required',
            

        ];
        $messages = [
           'required'=>'Đây là trường không được bỏ trống',
           'date'=>'Định dạng ngày tháng',
           'numeric'=>'Chỉ cho phép nhập số'

        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        //
        $MA=$request->input('id_qd');
        $ID_NV=$request->input('id_employee');
        $GIA_ID_NV=$request->input('gi_id_nv');
        $NGAY_KY=$request->input('ngay_ki');
        $NGAY_THUC_HIEN=$request->input('ngay_hieu_luc');
        $LY_DO=$request->input('ly_do');
        $TIEN_KL=$request->input('tien_kl');
        $HINH_THUC=$request->input('hinh_thuc');

        $updatearr=array(
        'ID_NV'=>$ID_NV,
        'GIA_ID_NV'=>$GIA_ID_NV,
        'NGAY_KI_KL'=>$NGAY_KY,
        'NGAY_THUC_HIEN_KL'=>$NGAY_THUC_HIEN,
        'LY_DO'=>$LY_DO,
        'MUC_PHAT'=>$TIEN_KL,
        'HINH_THUC_KI_LUAT'=>$HINH_THUC,
    );
        DB::table('ki_luat')->where('MA_KL',$MA)->update($updatearr);
        return "<script>alert('Đã thêm');
                window.location.href='http://localhost:81/hrm/dskiluat';</script>";
}
 public function del_ki_luat($ma){

        DB::table('ki_luat')->where('MA_KL',$ma)->delete();
        return "<script>alert('Đã xóa');
                window.location.href='http://localhost:81/hrm/dskiluat';</script>";
    }

    public function addposition(Request $request){
        $id=$request->input('id');
        $chuc_vu=$request->input('chuc_vu');
        $ngay_bat_dau=$request->input('ngay_bat_dau');
        $ngay_ket_thuc=$request->input('ngay_ket_thuc');

        DB::table('qua_trinh_cong_tac')->insert(['ID_NV'=>$id,'MA_CV'=>$chuc_vu,'THOI_GIAN_BAT_DAU_LV'=>$ngay_bat_dau,'THOI_GIAN_KET_THUC_LV'=>$ngay_ket_thuc]);
         return "<script>alert('Thêm mới thành công');
                window.location.href='http://localhost:81/hrm/editnv/{$id}';</script>";

    }
    public function editposition(Request $request){
        $id=$request->input('id');
        $chuc_vu=$request->input('macv_edit');
        $ngay_bat_dau=$request->input('ngay_bat_dau_edit');
        $ngay_ket_thuc=$request->input('ngay_ket_thuc_edit');

        DB::table('qua_trinh_cong_tac')->where('MA_CV',$chuc_vu)->where('ID_NV',$id)->update(['THOI_GIAN_BAT_DAU_LV'=>$ngay_bat_dau,'THOI_GIAN_KET_THUC_LV'=>$ngay_ket_thuc]);
         return "<script>alert('Sửa thành công');
                window.location.href='http://localhost:81/hrm/editnv/{$id}';</script>";

    }
    public function destroycv($id,$ma){

        DB::table('qua_trinh_cong_tac')->where('MA_CV',$ma)->where('ID_NV',$id)->delete();
         return "<script>alert('Xóathành công');
                window.location.href='http://localhost:81/hrm/editnv/{$id}';</script>";
    }


}
