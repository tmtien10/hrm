<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;
use  PDF;
class SalaryController extends Controller
{
    //
    public function getList_Salary(){

    	$pb=DB::table('luong')->get();
    	return view('salarylist', compact("pb"));


    }
    public function getid_employee($mapb){
    	$data=DB::table('nhan_vien')->where('MA_PB',$mapb)->pluck('ID_NV');
    	return json_encode($data);
    }
    public function getten_employee($mapb){
        $data=DB::table('nhan_vien')->where('ID_NV',$mapb)->select('HO_TEN')->first();
                return json_encode($data);

    }
    public function tienthuong($ma,$thang){
        $dat=date('m',strtotime($thang));
        $year=date('Y',strtotime($thang));
        $data=DB::table('khen_thuong')->where('ID_NV',$ma)->whereMonth('NGAY_THUC_HIEN_KT',$dat)->sum('TIEN_THUONG');
        return  json_encode($data);

    }
     public function tienphat($ma,$thang){
        $dat=date('m',strtotime($thang));
        $year=date('Y',strtotime($thang));
        $data=DB::table('ki_luat')->where('ID_NV',$ma)->whereMonth('NGAY_KI_KL',$dat)->sum('MUC_PHAT');
        return  json_encode($data);

    }

    public function get_BH($LUONG_THUC_TE,$ID_NV){
    		//TÍNH BẢO HIỂM
        $bh_array=DB::table('bao_hiem')->get();
        
    			//Tính phụ cấp cần đóng bảo hiểm
    	$pc_tinh_bh=DB::table('co_phu_cap')->join('phu_cap','phu_cap.MA_PHU_CAP','=','co_phu_cap.MA_PHU_CAP')->where('ID_NV',$ID_NV)->where('TINH_BH','=',1)->sum('MUC_PHU_CAP');
    	
        $ti_le=0;
        foreach ($bh_array as $bh_array) {
            # code..
            $phi_bh[]=array($bh_array->MA_GIAM_TRU,($LUONG_THUC_TE+$pc_tinh_bh)*$bh_array->TI_LE/100);

            $ti_le=$ti_le+$bh_array->TI_LE;
        }
    	$muc_dong_bh=(($LUONG_THUC_TE+$pc_tinh_bh)*($ti_le))/100;
    	return 
    	$array_bh= array('muc_dong_bh' =>$muc_dong_bh , 'pc_bh'=>$pc_tinh_bh,'phi_bh'=>$phi_bh);

    }
    public function thue($THU_NHAP_CHIU_THUE,$TONG_KHOAN_GIAM_TRU){
    	//TÍNH THUẾ
    		$THU_NHAP_TINH_THUE=$THU_NHAP_CHIU_THUE-$TONG_KHOAN_GIAM_TRU;
    	
    		
    			if($THU_NHAP_TINH_THUE<0)
    				$THUE_TNCN=0;
    			elseif($THU_NHAP_TINH_THUE<=5000000)
    				$THUE_TNCN=(5*$THU_NHAP_TINH_THUE)/100;
    			elseif(($THU_NHAP_TINH_THUE>5000000) && ($THU_NHAP_TINH_THUE<=10000000))
    				$THUE_TNCN=(10*$THU_NHAP_TINH_THUE)/100-250000;

    			elseif (($THU_NHAP_TINH_THUE>10000000) && ($THU_NHAP_TINH_THUE<=18000000))
    				$THUE_TNCN=(15*$THU_NHAP_TINH_THUE)/100-750000;
    			elseif (($THU_NHAP_TINH_THUE>18000000) && ($THU_NHAP_TINH_THUE<=32000000))
    				$THUE_TNCN=(20*$THU_NHAP_TINH_THUE)/100-1650000;
    			elseif (($THU_NHAP_TINH_THUE>32000000) && ($THU_NHAP_TINH_THUE<=52000000))
    				$THUE_TNCN=(25*$THU_NHAP_TINH_THUE)/100-3250000;
    			elseif (($THU_NHAP_TINH_THUE>52000000) && ($THU_NHAP_TINH_THUE<=80000000))
    				$THUE_TNCN=(30*$THU_NHAP_TINH_THUE)/100-5850000;
    			elseif ($THU_NHAP_TINH_THUE>80000000)
    				$THUE_TNCN=(35*$THU_NHAP_TINH_THUE)/100-8950000;
    		return $THUE_TNCN;
    }
    public function get_salary(Request $request){

        $rules = [
            'id_employee'=>'required',
            'number' => 'required|numeric|max:23',
            'thang'=>'required'

        ];
        $messages = [
            'required' => 'Đây là trường bắt buộc',
           'number.max'=>'Không được nhập quá số ngày công chuẩn'
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json([
                   'error' => true,
                  'message' => $validator->errors()
                ], 200);
        }
    else {
    	$IDNV=$request->input('id_employee');
    	$songaycong=$request->input('number');
        $sogiotangca=$request->input('hour');
    	$tien_du_an=$request->input('luong_du_an');
    	$tien_thuong=$request->input('luong_thuong');
        $tien_phat=$request->input('luong_phat');
        $thang=$request->input('thang');
    	$nv=DB::table('nhan_vien')->JOIN('he_so_luong','he_so_luong.MA_HE_SO','=','nhan_vien.MA_HE_SO')->WHERE('ID_NV',$IDNV)->get();
    	foreach ($nv as $nv) {
    		$LUONG_CO_BAN=$nv->LUONG_CO_BAN;
    		$HE_SO=$nv->HE_SO;
            $MA_HE_SO=$nv->MA_HE_SO;
    		$NGUOI_PHU_THUOC=$nv->NGUOI_PHU_THUOC;
    		# code...
    	}
        //LẤY NGÀY-THÁNG

        $dat=date('m',strtotime($thang));
        $year=date('Y',strtotime($thang));

        //SỐ NGÀY TRONG MỘT THÁNG
        $ngay_cong_chuan=cal_days_in_month(CAL_GREGORIAN,$dat,$year)-8;
    	//LUONG_1_NGAY
    	$LUONG_MOT_H= round(($LUONG_CO_BAN*$HE_SO)/(8*$ngay_cong_chuan));
       
    	//LUONG_THUC_TE

    	$LUONG_THUC_TE=round($LUONG_MOT_H*$songaycong*8);
    	
    	$phi_bao_hiem=$this->get_BH($LUONG_THUC_TE,$IDNV);
    	$muc_dong_bao_hiem=$phi_bao_hiem['muc_dong_bh'];
    	$phu_cap_bh=$phi_bao_hiem['pc_bh'];
        $phi_bao_hiem_tung_loai=$phi_bao_hiem['phi_bh'];
    	$tien_tang_ca=($sogiotangca*$LUONG_MOT_H*200)/100;
        $phu_cap_tinh_thue=$phu_cap_bh;

    	//thu nhập chịu thuế

    	$THU_NHAP_CHIU_THUE=$LUONG_THUC_TE+ $phu_cap_tinh_thue+$tien_du_an+$tien_thuong;

    		//khoản giảm trừ
    	$TONG_KHOAN_GIAM_TRU=9000000+($NGUOI_PHU_THUOC*3600000)+$muc_dong_bao_hiem;
    	
    	$THUE_TNCN=$this->thue($THU_NHAP_CHIU_THUE,$TONG_KHOAN_GIAM_TRU);
    	
    	$phi_phu_cap=DB::table('co_phu_cap')->join('phu_cap','phu_cap.MA_PHU_CAP','=','co_phu_cap.MA_PHU_CAP')->where('ID_NV',$IDNV)->sum('MUC_PHU_CAP');
    	
	
    	$TONG_THU_NHAP=$LUONG_THUC_TE+$phi_phu_cap+$tien_du_an+$tien_thuong+$tien_tang_ca;
    	$THU_NHAP_THUC_LANH=$TONG_THU_NHAP-$muc_dong_bao_hiem-$THUE_TNCN-$tien_phat;

        //insert vào bảng lương
    	$array_luong= array(
            'THANG'=>$thang,
    		'LUONG_CO_BAN'=>$LUONG_CO_BAN,
            'LUONG_MOT_H'=>$LUONG_MOT_H,
    		'LUONG_THUONG'=>$tien_thuong,
            'TIEN_PHAT'=>$tien_phat,
    		'LUONG_DU_AN'=>$tien_du_an,
    		'SO_NGAY_CONG'=>$songaycong,
    		'PHI_BAO_HIEM'=>$muc_dong_bao_hiem,
    		'THUE_TNCN' =>$THUE_TNCN ,
    		'TIEN_PHU_CAP'=>$phi_phu_cap,
            'TANG_CA'=>$tien_tang_ca,
    		'ID_NV'=>$IDNV,
    		'NGUOI_LAP'=>Auth::user()->ID_NV,
    		'NGAY_LAP'=>date("Y-m-d"),
    		'TONG_LUONG_TRUOC_KHAU_TRU'=>$TONG_THU_NHAP,
    		'TONG_LUONG_SAU_KHAU_TRU'=>$THU_NHAP_THUC_LANH, 
            'MA_HE_SO'=>$MA_HE_SO,
            'GIO_LAM_THEM'=>$sogiotangca,
    	);
    	$stt=DB::table('luong')->insertGetId($array_luong);
        //insert vào các bảng phụ
        foreach ($phi_bao_hiem_tung_loai as $pbhtl) {
            # code...
            DB::table('PHIEU_LUONG_BAO_HIEM')->insert(['STT'=>$stt,'MA_GIAM_TRU'=>$pbhtl[0],'SO_TIEN'=>$pbhtl[1]]);
        }
        $phu_cap1=DB::table('co_phu_cap')->join('phu_cap','phu_cap.MA_PHU_CAP','=','co_phu_cap.MA_PHU_CAP')->where('ID_NV',$IDNV)->get();
        foreach ($phu_cap1 as $phu_cap1) {
                # code...
           DB::table('LUONG_PHU_CAP')->insert(['STT'=>$stt,'MA_PHU_CAP'=>$phu_cap1->MA_PHU_CAP,'SO_TIEN'=>$phu_cap1->MUC_PHU_CAP]);
          
            }
             return 1;
            }
    }
    public function del_payslip($STT){
    DB::table('luong')->where('STT',$STT)->delete();
    return "<script>alert('Delete');
                window.location.href='http://localhost:81/hrm/dsluong';</script>";
   } 
   public function get_payslip($STT){
   	$THONG_TIN_PHIEU=DB::table('luong')->where('STT',$STT)->get();
   	return view('payslip', compact("THONG_TIN_PHIEU"));
   } 
   public function print_pdf($STT){

   	   	$THONG_TIN_PHIEU=DB::table('luong')->where('STT',$STT)->get();
   	   	$pdf = PDF::loadView('pdfview',  compact('THONG_TIN_PHIEU'));
    		return $pdf->download('luong.pdf');
   }

   
}
