 <html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
<style type="text/css">
body {
    font-family:  DejaVu Sans;;
}
table, td, th {    
    border: 1px solid #ddd;
    text-align: left;
}

table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 15px;
    text-align: left;
}
* {
    box-sizing: border-box;
}

.box {
    float: left;
    width: 33.33%;
    padding: 50px;
}

.clearfix::after {
    content: "";
    clear: both;
    display: table;
}
</style>

</head>
<body> @foreach($THONG_TIN_PHIEU as $tt)

    <?php $nv=DB::table('nhan_vien')->JOIN('phong_ban','phong_ban.MA_PB','=','nhan_vien.MA_PB')->where('ID_NV',$tt->ID_NV)->get();
    ?>
    @foreach($nv as $nv)
    <div class="clearfix">
        <center>PHIẾU LƯƠNG</center>
           <div class="box">
            Họ tên:  {{$nv->HO_TEN}}<br>
            Số điện thoại: {{$nv->SDT}}<br>
            Số tài khoản: {{$nv->MA_THENH}}
          </div>
          <div class="box">  
          Phòng ban: {{$nv->TEN_PB}}<br>
          Email : {{$nv->EMAIL}}<br>
         
          </div>         
      </div> <?php $hs=DB::table('he_so_luong')->get();
             
             ?>
             <table class="table" >
             <tr><th colspan="2">Thông tin chi tiết</th></tr>
              <tr><td>LƯƠNG CƠ BẢN</td> <td>{{number_format($tt->LUONG_CO_BAN)}}</td></tr>
              <tr><td>LƯƠNG MỘT GIỜ</td> <td>{{number_format($tt->LUONG_MOT_H)}}</td>
              <tr><td>HỆ SỐ LƯƠNG</td> <td>@foreach($hs as $hs)
                            @if($hs->MA_HE_SO==$tt->MA_HE_SO)
                             {{$hs->HE_SO}}
                           @endif
                         @endforeach
                       </td>
                    </tr>
              <tr><td>TIỀN THƯỞNG</td> <td>{{number_format($tt->LUONG_THUONG)}}</td></tr>
              <tr><td>TIỀN DỰ ÁN</td> <td>{{number_format($tt->LUONG_DU_AN)}}</td></tr>

              <tr><td>TIỀN TĂNG CA</td> <td>{{number_format($tt->TANG_CA)}}</td></tr>
<?php 
                  $pc=DB::table('LUONG_PHU_CAP')->join('PHU_CAP','LUONG_PHU_CAP.MA_PHU_CAP','=','PHU_CAP.MA_PHU_CAP')->where('STT',$tt->STT)->get();

                ?>
                @foreach($pc as $pc)
              <tr>  <td>{{$pc->TEN_PHU_CAP}}</td>
               <td>{{number_format($pc->SO_TIEN)}}</td></tr>
               @endforeach
              <tr><td>TỔNG LƯƠNG</td><td>{{number_format($tt->TONG_LUONG_TRUOC_KHAU_TRU)}}</td></tr>
              <?php 
                  $bh=DB::table('PHIEU_LUONG_BAO_HIEM')->join('BAO_HIEM','PHIEU_LUONG_BAO_HIEM.MA_GIAM_TRU','=','BAO_HIEM.MA_GIAM_TRU')->where('STT',$tt->STT)->get();

                ?>
                @foreach($bh as $bh)
              <tr>  <td>{{$bh->TEN_KHOAN_GIAM_TRU}}</td>
               <td>{{number_format($bh->SO_TIEN)}}</td></tr>
               @endforeach
              <tr><td>THUẾ</td> <td>{{number_format($tt->THUE_TNCN)}}</td></tr>
               <tr><td>LƯƠNG THỰC LÃNH</td><td>{{number_format($tt->TONG_LUONG_SAU_KHAU_TRU)}}</td></tr>
             </table>
             <br>
             <?php $nglap=DB::table('nhan_vien')->where('ID_NV',$tt->NGUOI_LAP)->select('HO_TEN')->first();
             ?>

             <center><b>NGƯỜI LẬP</b><br>
              {{$nglap->HO_TEN}}</center>
            @endforeach
              @endforeach
      </body>
      </html>