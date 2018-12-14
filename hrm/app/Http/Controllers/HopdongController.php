<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;
class HopdongController extends Controller
{
    //
    public function getlist()

    {
    	$hd=DB::table('hop_dong_lao_dong')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->get();
    	return view('hopdonglist', compact('hd'));
    }
    public function add_hop_dong(Request $request){


    	$rules = [
    		'ten_hd'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
    		'id_hd'=>'required|unique:hop_dong_lao_dong,MA_HD',
    		'nhan_vien'=>'required',
    		'ngay_ki'=>'required|date',
    		'thoi_gian_bat_dau'=>'required',
    		'loai_hop_dong'=>'required',
    		'vi_tri_cong_viec'=>'required',
    		'hinh_thuc_lam_viec'=>'required',
    		'luong_co_ban'=>'required|numeric',
    		'dia_diem_lam_viec'=>'required',
    		'dung_cu_lam_viec'=>'required',
    		'so_ngay_nghi_phep'=>'required|numeric|max:15|min:0',
    		'thoi_gian_lam_viec'=>'required',
    	];
    	$messages = [
    		'required' => 'Đây là trường bắt buộc',
    		
    		'numeric' => 'Trường chỉ được nhập số',
    		
    		
    		
    	];
    	$validator = Validator::make($request->all(), $rules, $messages);

    	if ($validator->fails()) {
            
    		return redirect()->back()->withErrors($validator)->withInput();
    	}
    	$allRequest=$request->all();
    	$MA_HD=$allRequest['id_hd'];
    	$TEN_HOP_DONG=$allRequest['ten_hd'];
		$ID_NV=$allRequest['nhan_vien'];
		$GIA_ID_NV=$allRequest['giam_doc'];
		$THOI_GIAN_BAT_DAU=$allRequest['thoi_gian_bat_dau']; 
		$THOI_GIAN_KET_THUC=$allRequest['thoi_gian_ket_thuc']; 
		$DIA_DIEM_LAM_VIEC=$allRequest['dia_diem_lam_viec'];
		$THOI_GIAN_LAM_VIEC=$allRequest['thoi_gian_lam_viec']; 
		$MA_LOAI_HD=$allRequest['loai_hop_dong'];
		$TEN_HOP_DONG=$allRequest['ten_hd']; 
		$NGAY_KI=$allRequest['ngay_ki'];
        $HE_SO=$allRequest['he_so'];
		$MUC_LUONG=$allRequest['luong_co_ban']; 
		$THOI_GIAN_NGHI=$allRequest['so_ngay_nghi_phep']; 
		$VI_TRI_CONG_VIEC=$allRequest['vi_tri_cong_viec']; 
		$DUNG_CU_LAM_VIEC=$allRequest['dung_cu_lam_viec'];
		$HINH_THUC_LAM_VIEC=$allRequest['hinh_thuc_lam_viec'];
		$PHU_CAP=$allRequest['phu_cap'];
        $MA_PB=$allRequest['phong_ban'];
         if($request->has('bao_hiem')){
               $BAO_HIEM=$allRequest['bao_hiem'];

            }
        if($request->has('bang_cap')){
            $BANG_CAP=$allRequest['bang_cap'];
        }

			$insert_arr=array(
					'MA_HD'=>$MA_HD,
					'ID_NV'=>$ID_NV,
					'GIA_ID_NV'=>$GIA_ID_NV,
					'THOI_GIAN_BAT_DAU'=>$THOI_GIAN_BAT_DAU,
					'THOI_GIAN_KET_THUC'=> $THOI_GIAN_KET_THUC,
					'DIA_DIEM_LAM_VIEC'=>$DIA_DIEM_LAM_VIEC,
					'THOI_GIAN_LAM_VIEC'=>$THOI_GIAN_LAM_VIEC,
					'MA_LOAI_HD'=>$MA_LOAI_HD,
					'TEN_HOP_DONG'=>$TEN_HOP_DONG,
					'NGAY_KI'=>$NGAY_KI,
					'MUC_LUONG'=>$MUC_LUONG,
					'THOI_GIAN_NGHI'=>$THOI_GIAN_NGHI,
					'VI_TRI_CONG_VIEC' =>$VI_TRI_CONG_VIEC,
					'HINH_THUC_LAM_VIEC'=>$HINH_THUC_LAM_VIEC,
					'DUNG_CU_LAM_VIEC'=>$DUNG_CU_LAM_VIEC,
                    'MA_HE_SO'=>$HE_SO,


			);
			DB::table('hop_dong_lao_dong')->insert($insert_arr);
              DB::table('qua_trinh_cong_tac')->where('ID_NV',$ID_NV)->delete();

    	  if(isset($PHU_CAP)){
    foreach ($PHU_CAP as $key => $PHU_CAP) {
            # code...
                 DB::table('co_phu_cap_hd')->insert(['MA_HD'=>$MA_HD,'MA_PHU_CAP'=>$PHU_CAP]);
            
        }
    }
     if(isset($BAO_HIEM)){
    foreach ($BAO_HIEM as $key => $BAO_HIEM) {
            # code...

                 DB::table('co_giam_tru')->insert(['MA_HD'=>$MA_HD,'MA_GIAM_TRU'=>$BAO_HIEM]);
        }
    }
        DB::table('nhan_vien')->where('ID_NV',$ID_NV)->update(['LUONG_CO_BAN'=>$MUC_LUONG,'MA_PB'=>$MA_PB]);
        DB::table('qua_trinh_cong_tac')->insert(['ID_NV'=>$ID_NV,'MA_CV'=>$VI_TRI_CONG_VIEC,'THOI_GIAN_BAT_DAU_LV'=>$THOI_GIAN_BAT_DAU]);
         return "<script>alert('Thêm mới thành công');
                window.location.href='http://localhost:81/hrm/dshopdong';</script>";

            }
    
    public function edit_hop_dong_view($stt){

        $hdld=DB::table('hop_dong_lao_dong')->where('MA_HD',$stt)->get();
        return view('ediit_hop_dong', compact('hdld'));

    }

 public function edit_hop_dong(Request $request){

        $rules = [
            'ten_hd'=>'required|regex:/(^[a-zA-Z_ÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ ]+$)+/',
            'nhan_vien'=>'required',
            'ngay_ki'=>'required|date',
            'thoi_gian_bat_dau'=>'required',
            'loai_hop_dong'=>'required',
            'vi_tri_cong_viec'=>'required',
            'hinh_thuc_lam_viec'=>'required',
            'luong_co_ban'=>'required|numeric',
            'dia_diem_lam_viec'=>'required',
            'dung_cu_lam_viec'=>'required',
            'so_ngay_nghi_phep'=>'required|numeric|max:15|min:0',
            'thoi_gian_lam_viec'=>'required',
        ];
        $messages = [
            'required' => 'Đây là trường bắt buộc',
            
            'numeric' => 'Trường chỉ được nhập số',
            
            
            
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $allRequest=$request->all();
        $MA_HD=$allRequest['id_hd'];
        $TEN_HOP_DONG=$allRequest['ten_hd'];
          $THOI_GIAN_KET_THUC=$allRequest['thoi_gian_ket_thuc'];
        $ID_NV=$allRequest['nhan_vien'];
        $GIA_ID_NV=$allRequest['giam_doc'];
        $THOI_GIAN_BAT_DAU=$allRequest['thoi_gian_bat_dau']; 
        
        $DIA_DIEM_LAM_VIEC=$allRequest['dia_diem_lam_viec'];
        $THOI_GIAN_LAM_VIEC=$allRequest['thoi_gian_lam_viec']; 
        $MA_LOAI_HD=$allRequest['loai_hop_dong'];
        $TEN_HOP_DONG=$allRequest['ten_hd']; 
        $NGAY_KI=$allRequest['ngay_ki'];
        $HE_SO=$allRequest['he_so'];
        $MUC_LUONG=$allRequest['luong_co_ban']; 
        $THOI_GIAN_NGHI=$allRequest['so_ngay_nghi_phep']; 
        $VI_TRI_CONG_VIEC=$allRequest['vi_tri_cong_viec']; 
        $DUNG_CU_LAM_VIEC=$allRequest['dung_cu_lam_viec'];
        $HINH_THUC_LAM_VIEC=$allRequest['hinh_thuc_lam_viec'];
        $PHU_CAP=$allRequest['phu_cap'];
        $MA_PB=$allRequest['phong_ban'];
         if($request->has('bao_hiem')){
               $BAO_HIEM=$allRequest['bao_hiem'];

            }
        if($request->has('bang_cap')){
            $BANG_CAP=$allRequest['bang_cap'];
        }

            $update_arr=array(
                    'ID_NV'=>$ID_NV,
                    'GIA_ID_NV'=>$GIA_ID_NV,
                    'THOI_GIAN_BAT_DAU'=>$THOI_GIAN_BAT_DAU,
                    'THOI_GIAN_KET_THUC'=> $THOI_GIAN_KET_THUC,
                    'DIA_DIEM_LAM_VIEC'=>$DIA_DIEM_LAM_VIEC,
                    'THOI_GIAN_LAM_VIEC'=>$THOI_GIAN_LAM_VIEC,
                    'MA_LOAI_HD'=>$MA_LOAI_HD,
                    'TEN_HOP_DONG'=>$TEN_HOP_DONG,
                    'NGAY_KI'=>$NGAY_KI,
                    'MUC_LUONG'=>$MUC_LUONG,
                    'THOI_GIAN_NGHI'=>$THOI_GIAN_NGHI,
                    'VI_TRI_CONG_VIEC' =>$VI_TRI_CONG_VIEC,
                    'HINH_THUC_LAM_VIEC'=>$HINH_THUC_LAM_VIEC,
                    'DUNG_CU_LAM_VIEC'=>$DUNG_CU_LAM_VIEC,
                    'MA_HE_SO'=>$HE_SO,


            );
            DB::table('hop_dong_lao_dong')->where('MA_HD',$MA_HD)->update($update_arr);

        DB::table('co_phu_cap_hd')->where('MA_HD',$MA_HD)->delete();
        DB::table('co_giam_tru')->where('MA_HD',$MA_HD)->delete();
        DB::table('qua_trinh_cong_tac')->where('ID_NV',$ID_NV)->delete();


          if(isset($PHU_CAP)){
    foreach ($PHU_CAP as $key => $PHU_CAP) {
            # code...
                 DB::table('co_phu_cap_hd')->insert(['MA_HD'=>$MA_HD,'MA_PHU_CAP'=>$PHU_CAP]);
            
        }
    }
     if(isset($BAO_HIEM)){
    foreach ($BAO_HIEM as $key => $BAO_HIEM) {
            # code...

                 DB::table('co_giam_tru')->insert(['MA_HD'=>$MA_HD,'MA_GIAM_TRU'=>$BAO_HIEM]);
        }
    }
        DB::table('nhan_vien')->where('ID_NV',$ID_NV)->update(['LUONG_CO_BAN'=>$MUC_LUONG,'MA_PB'=>$MA_PB]);
         DB::table('qua_trinh_cong_tac')->insert(['ID_NV'=>$ID_NV,'MA_CV'=>$VI_TRI_CONG_VIEC,'THOI_GIAN_BAT_DAU_LV'=>$THOI_GIAN_BAT_DAU]);
          return "<script>alert('Sửa thành công');
                window.location.href='http://localhost:81/hrm/dshopdong';</script>";
            
            }
    
public function destroy($STT) {

      DB::delete('delete from hop_dong_lao_dong where MA_HD = ?',[$STT]);
    

      return "<script>alert('Đã xóa');
                window.location.href='http://localhost:81/hrm/dshopdong';</script>";


   }

}