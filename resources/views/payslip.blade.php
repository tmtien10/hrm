@extends('master.master')
@section('page-header')
<h1>
              Phiếu lương
               
              </h1>
@stop
@section('script')

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li><a href="dsluong">Danh sách phiếu lương</a></li>
      <li class="active">Phiếu lương</li>

@stop
@section('content')
    @foreach($THONG_TIN_PHIEU as $tt)

    <?php $nv=DB::table('nhan_vien')->JOIN('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('ID_NV',$tt->ID_NV)->get();
    ?>

    @foreach($nv as $nv)
    
     <div class="form-group has-info" >
                   <div class="col-xs-12 col-sm-8">
        <a href="pdf/{{$tt->STT}}"> <i class="ace-icon fa fa-print bigger-110"></i></a>
                    </div></div><br>
      <div class="form-group has-info" >
                   <div class="col-xs-12 col-sm-12">
     <center><b style="font-size: 30px;">PHIẾU LƯƠNG THÁNG {{date("m-Y", strtotime($tt->THANG))}}</b></center>
                    </div>
                    <div class="col-xs-12 col-sm-12">
     <center><p style="font-size: 14px;">Ngày lập {{date("d-m-Y", strtotime($tt->NGAY_LAP))}}</p></center>
                    </div>
                  </div><br>
   <div class="form-group has-info" >
                   <div class="col-xs-12 col-sm-8">
       <b style="font-size: 18px;">THÔNG TIN NHÂN VIÊN</b>
                    </div></div><br><br>
                  <div class="col-xs-12 col-sm-6 ">
          <div class="form-group has-info" >

                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Họ tên</label>
                   <div class="col-xs-12 col-sm-8">
                    {{$nv->HO_TEN}}
                    </div></div></div>
              <div class="col-xs-12 col-sm-6 ">
             <div class="form-group has-info" >
                     <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Phòng ban</label>
                   <div class="col-xs-12 col-sm-8">
                    {{$nv->TEN_PB}}
                    </div>
                  </div></div>
            <div class="col-xs-12 col-sm-6 ">
             <div class="form-group has-info" >
                     <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số điện thoại</label>
                   <div class="col-xs-12 col-sm-8">
                    {{$nv->SDT}}
                    </div>
                  </div></div>
              <div class="col-xs-12 col-sm-6 ">
             <div class="form-group has-info" >
                     <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>
                   <div class="col-xs-12 col-sm-8">
                    {{$nv->EMAIL}}
                    </div>
                  </div></div>
            <div class="col-xs-12 col-sm-6 ">
             <div class="form-group has-info" >
                     <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Số tài khoản</label>
                   <div class="col-xs-12 col-sm-8">
                    {{$nv->MA_THENH}}
                    </div>
                  </div></div>
         <div class="col-xs-12 col-sm-12 ">
             <br>
             <?php $hs=DB::table('he_so_luong')->get();
             
             ?>
             <table class="col-md-12 table-bordered table-striped table-condensed cf" style="text-align:left;padding-left:500px ">
             <tr style="background-color: black; color:white"><th colspan="4">Bảng lương chi tiết</th></tr>
              <tr><td>LƯƠNG CƠ BẢN</td> <td>{{number_format($tt->LUONG_CO_BAN)}}</td>
               <tr><td>LƯƠNG MỘT GIỜ</td> <td>{{number_format($tt->LUONG_MOT_H)}}</td>

                <tr><td>HỆ SỐ LƯƠNG</td> <td>@foreach($hs as $hs)
                            @if($hs->MA_HE_SO==$tt->MA_HE_SO)
                             {{$hs->HE_SO}}
                           @endif
                         @endforeach
                       </td>
                    </tr>
              <tr><td>TIỀN THƯỞNG</td>  <td>{{number_format($tt->LUONG_THUONG)}}</td></tr>
             <tr><td>TIỀN DỰ ÁN</td>   <td>{{number_format($tt->LUONG_DU_AN)}}</td></tr>
             <?php 
                  $pc=DB::table('LUONG_PHU_CAP')->join('PHU_CAP','LUONG_PHU_CAP.MA_PHU_CAP','=','PHU_CAP.MA_PHU_CAP')->where('STT',$tt->STT)->get();

                ?>
                @foreach($pc as $pc)
              <tr>  <td>{{$pc->TEN_PHU_CAP}}</td>
               <td>{{number_format($pc->SO_TIEN)}}</td></tr>
               @endforeach
              <tr><td>TIỀN TĂNG CA</td> <td>{{number_format($tt->TANG_CA)}}</td></tr>
               <tr><td>SỐ NGÀY CÔNG CHUẨN</td> <td>{{$tt->SO_NGAY_CONG}}</td>
               <tr style="background-color: black; color:white"> <td>TỔNG LƯƠNG</td> <td>{{number_format($tt->TONG_LUONG_TRUOC_KHAU_TRU)}}</td></tr>
                <?php 
                  $bh=DB::table('PHIEU_LUONG_BAO_HIEM')->join('BAO_HIEM','PHIEU_LUONG_BAO_HIEM.MA_GIAM_TRU','=','BAO_HIEM.MA_GIAM_TRU')->where('STT',$tt->STT)->get();

                ?>
                @foreach($bh as $bh)
              <tr>  <td>{{$bh->TEN_KHOAN_GIAM_TRU}}</td>
               <td>{{number_format($bh->SO_TIEN)}}</td></tr>
               @endforeach
                <td>THUẾ</td>
                <td>{{number_format($tt->THUE_TNCN)}}</td>
               <tr style="background-color: black; color:white"><td>LƯƠNG THỰC LÃNH</td>
                <td>{{number_format($tt->TONG_LUONG_SAU_KHAU_TRU)}}</td></tr>
             </table>
             
             
             </div>
             <br> 

  -----------------------------------------------------------------------<br>

  lương 1h = (lương cơ bản * hệ số)/(8*số ngày công chuẩn của 1 tháng) <br>
  lương 1 tháng=lương 1 h* số ngày công thực tế*8<br>
  lương tăng ca =lương 1h * 200%
  phí bảo hiểm=(lương 1 tháng + phụ cấp tính bảo hiểm+tiền thưởng+tiền tăng ca ) *tỉ lệ (%)<br>
  thu nhập tính thuế=(lương 1 tháng + phụ cấp tính thuế+tiền thưởng+tiền tăng ca ) - khoản giảm trừ<br>=>Dựa theo bảng tính thuế=>thuế
  lương thực lãnh=(lương 1 tháng + phụ cấp +tiền thưởng+tiền tăng ca ) - thuế- bảo hiểm
 @endforeach  
@endforeach
@stop