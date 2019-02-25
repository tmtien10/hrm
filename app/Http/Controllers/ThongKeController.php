<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Validator;
use Auth;
use DB;
use Illuminate\Support\MessageBag;
use Illuminate\Routing\Redirector;


class ThongKeController extends Controller
{
    //
    public function view(){

    	return view('thongke');
    }
public function thong_ke_hop_dong(Request $request){
	

	$request->flash();
	$loai_hop_dong=$request->input('loai_hop_dong');
	$ngay_bat_dau=$request->input('ngay_bat_dau');
	$ngay_ket_thuc=$request->input('ngay_ket_thuc');

	if(($loai_hop_dong==null)&&($ngay_bat_dau==null)&&($ngay_ket_thuc==null)){

		$hd=DB::table('hop_dong_lao_dong')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->get();

		return view('thongke', compact('hd'));
	}
	elseif(($loai_hop_dong==null)&&($ngay_bat_dau==null)){
		$hd=DB::table('hop_dong_lao_dong')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('THOI_GIAN_KET_THUC','<=',$ngay_ket_thuc)->orderBy('TEN_PB', 'desc')->get();
		return view('thongke', compact('hd'));
	}
	elseif(($loai_hop_dong==null)&&($ngay_ket_thuc==null)){
		$hd=DB::table('hop_dong_lao_dong')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('THOI_GIAN_BAT_DAU','>=',$ngay_bat_dau)->orderBy('TEN_PB', 'desc')->get();
		return view('thongke', compact('hd'));
	}
	elseif($loai_hop_dong==null){
		$hd=DB::table('hop_dong_lao_dong')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('THOI_GIAN_BAT_DAU','>=',$ngay_bat_dau)->where('THOI_GIAN_KET_THUC','<=',$ngay_ket_thuc)->orderBy('TEN_PB', 'desc')->get();
		return view('thongke', compact('hd'));
	}
	elseif(($ngay_bat_dau==null)&&($ngay_ket_thuc==null)){
		$hd=DB::table('hop_dong_lao_dong')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('loai_hop_dong.MA_LOAI_HD',$loai_hop_dong)->orderBy('TEN_PB', 'desc')->get();
		return view('thongke', compact('hd'));
	}
	elseif($ngay_bat_dau==null){
		$hd=DB::table('hop_dong_lao_dong')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('loai_hop_dong.MA_LOAI_HD',$loai_hop_dong)->where('THOI_GIAN_KET_THUC','<=',$ngay_ket_thuc)->orderBy('TEN_PB', 'desc')->get();
		return view('thongke', compact('hd'));
	}
	elseif($ngay_ket_thuc==null){
		$hd=DB::table('hop_dong_lao_dong')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('loai_hop_dong.MA_LOAI_HD',$loai_hop_dong)->where('THOI_GIAN_BAT_DAU','>=',$ngay_bat_dau)->orderBy('TEN_PB', 'desc')->get();
		return view('thongke', compact('hd'));
	}
	else  {
		$hd=DB::table('hop_dong_lao_dong')->join('nhan_vien','nhan_vien.ID_NV','=','hop_dong_lao_dong.ID_NV')->join('loai_hop_dong','loai_hop_dong.MA_LOAI_HD','=','hop_dong_lao_dong.MA_LOAI_HD')->join('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('loai_hop_dong.MA_LOAI_HD',$loai_hop_dong)->where('THOI_GIAN_BAT_DAU','>=',$ngay_bat_dau)->where('THOI_GIAN_KET_THUC','<=',$ngay_ket_thuc)->orderBy('TEN_PB', 'desc')->get();
		return view('thongke', compact('hd'));
	}
}

	public function luong_view(){
		   return view('thongke2');

	}
	public function thong_ke_luong(Request $request){

		$request->flash();
	$th=$request->input('th');
	$thang=$request->input('thang');
	$muc1=$request->input('muc1');
	$muc2=$request->input('muc2');

		if($th==null){
			if($thang==null){
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->get();

				return view('thongke2', compact('luong'));
			}
			else {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->get();
				return view('thongke2', compact('luong'));
			}

		}
		if($th=='LG'){
			if(($thang==null)&&($muc1==null)&&($muc2==null)){
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->get();

				return view('thongke2', compact('luong'));
			}
			elseif(($thang==null)&&($muc1==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('TONG_LUONG_SAU_KHAU_TRU','<=',$muc2)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($thang==null)&&($muc2==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('TONG_LUONG_SAU_KHAU_TRU','=>',$muc1)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($muc1==null)&&($muc2==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($thang==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->whereBetween('TONG_LUONG_SAU_KHAU_TRU',[$muc1,$muc2])->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($muc1==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->where('TONG_LUONG_SAU_KHAU_TRU','<=',$muc2)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($muc2==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->where('TONG_LUONG_SAU_KHAU_TRU','=>',$muc1)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			else {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->whereBetween('TONG_LUONG_SAU_KHAU_TRU',[$muc1,$muc2])->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
		}
		if($th=='BH'){
			if(($thang==null)&&($muc1==null)&&($muc2==null)){
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->get();

				return view('thongke2', compact('luong'));
			}
			elseif(($thang==null)&&($muc1==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('PHI_BAO_HIEM','<=',$muc2)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($thang==null)&&($muc2==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('PHI_BAO_HIEM','>=',$muc1)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($muc1==null)&&($muc2==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($thang==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->whereBetween('PHI_BAO_HIEM',[$muc1,$muc2])->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($muc1==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->where('PHI_BAO_HIEM','<=',$muc2)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			elseif(($muc2==null)) {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->where('PHI_BAO_HIEM','>=',$muc1)->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}
			else {
				$luong=DB::table('luong')->join('nhan_vien','nhan_vien.ID_NV','=','luong.ID_NV')->join('phong_ban','nhan_vien.MA_PB','=','phong_ban.MA_PB')->where('THANG','=',$thang)->whereBetween('PHI_BAO_HIEM',[$muc1,$muc2])->orderBy('TEN_PB','desc')->get();
				return view('thongke2', compact('luong'));

			}

		}
	}

}

