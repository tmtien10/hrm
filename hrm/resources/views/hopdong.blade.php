@extends('master.master')
@section('script')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<link href="{!!asset('css/jquery-ui.css')!!}" rel="stylesheet">   
 <style>
   #loader{
   visibility:hidden;
   }
   </style>


@stop
@section('mucluc')
         <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
        <li><a href="{!!asset('/dshopdong')!!}">Quản lí hợp đồng</a>
              </li>
              <li class="active">Thêm hợp đồng</li>
@stop

 @section('page-header')
        <h1>Thêm hợp đồng</h1>
@stop



@section('content')


    <div class="row">
   <div style="margin-left: 10px; margin-right: 10px">
    <form class="form-horizontal" role="form" action="{{url('posthd')}}" method="POST" enctype="multipart/form-data">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
     
        <!-- /TAB THÔNG TIN NHÂN VIÊN --> 
        <div class="col-xs-12 col-sm-6 ">
          <div class="form-group has-info" >

                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số hợp đồng</label>
                   <div class="col-xs-12 col-sm-8">
                      <input name="id_hd" placeholder="" class="width-100" type="text" value="{{ old('id_hd') }}">
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('id_hd'))
                      <p style="color:red">{{$errors->first('id_hd')}}</p>
                          @endif
                        </div>
                    </div>
                     
                 </div> 
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Tên hợp đồng</label>
                    <div class="col-xs-12 col-sm-8">
                      <input name="ten_hd" placeholder="" class="width-100" type="text" value="{{ old('ten_hd') }}">
                      <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('ten_hd'))
                      <p style="color:red">{{$errors->first('ten_hd')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> ID nhân viên</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php $nv=DB::table('nhan_vien')->get();
                      ?>
                        <select name="nhan_vien" id="" class="width-100" value="{{old('nhan_vien')}}" >
                      @foreach($nv as $nv)
                          <option value="{{$nv->ID_NV}}" {{ old('nhan_vien') == $nv->ID_NV ? 'selected' : '' }}>{{$nv->HO_TEN}}</option>
                      @endforeach
                    </select>
                  </div></div>
           <div class="form-group has-info"> 
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày kí</label>
                    <div class="col-xs-12 col-sm-8"> 
                      <input name="ngay_ki" id="ngay_ki" placeholder="mm / dd / yy" class="width-100" type="date" data-relmax value="{{ old('ngay_ki') }}">
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('ngay_ki'))
                      <p style="color:red">{{$errors->first('ngay_ki')}}</p>
                          @endif
                        </div>
                      
                    </div>
                  </div>
                  <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Thời gian bắt đầu</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="thoi_gian_bat_dau"  name="thoi_gian_bat_dau" placeholder="" class="width-100" type="date" value="{{ old('thoi_gian_bat_dau') }}">
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('thoi_gian_bat_dau'))
                      <p style="color:red">{{$errors->first('thoi_gian_bat_dau')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Thời gian kết thúc</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="thoi_gian_ket_thuc" name="thoi_gian_ket_thuc" value="{{ old('thoi_gian_ket_thuc') }}" placeholder="" class="width-100" type="date">
                     
                    </div>
                  </div>
          <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Phụ cấp
                  </label>
                            <div class="col-xs-12 col-sm-8">
                <?php
                    $pc=DB::table('phu_cap')->get(); 
                ?>  
                <select multiple="" class="chosen-select form-control" name="phu_cap[]" data-placeholder="Choose " style="display: none;">
                   @if (is_array(old('phu_cap')))
                        @foreach($pc as $pc)
                                <option value="{{$pc->MA_PHU_CAP}}" <?php if(in_array($pc->MA_PHU_CAP, old('phu_cap'))) {echo 'selected';} ?>>{{$pc->TEN_PHU_CAP}}</option>
                        @endforeach
                        @else
                        @foreach ($pc as $pc)
                                    <option value="{{$pc->MA_PHU_CAP }}" >{{$pc->TEN_PHU_CAP}}</option>
                                    @endforeach
                                    @endif
                   </select>
                          <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('phu_cap'))
                      <p style="color:red">{{$errors->first('phu_cap')}}</p>
                          @endif
                        </div> 
                              </div>
                </div>
                <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Loại hợp đồng</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php $hd=DB::table('loai_hop_dong')->get();
                      ?>
                        <select name="loai_hop_dong" id="" class="width-100">
                      @foreach($hd as $hd)
                          <option value="{{$hd->MA_LOAI_HD}}" {{ old('loai_hop_dong') == $hd->MA_LOAI_HD ? 'selected' : '' }}>{{$hd->TEN_LOAI_HD}}</option>
                      @endforeach
                    </select>
                  </div></div>
                  <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Bảo hiểm
                  </label>
                            <div class="col-xs-12 col-sm-8">
                <?php
                    $bh=DB::table('bao_hiem')->get(); 
                ?>  
                <select multiple="" class="chosen-select form-control" name="bao_hiem[]" data-placeholder="Choose Qualification" style="display: none;">
                   @if (is_array(old('bao_hiem')))
                        @foreach($bh as $bh)
                                <option value="{{$bh->MA_GIAM_TRU}}"<?php if(in_array($bh->MA_GIAM_TRU, old('bao_hiem'))) {echo 'selected';} ?>>{{$bh->TEN_KHOAN_GIAM_TRU}}</option>
                        @endforeach
                        @else
                        @foreach($bh as $bh)
                                <option value="{{$bh->MA_GIAM_TRU}}" {{ old('bao_hiem') == $bh->MA_GIAM_TRU ? 'selected' : '' }}>{{$bh->TEN_KHOAN_GIAM_TRU}}</option>
                        @endforeach
                    @endif
                   </select>
                          
                              </div><!-- /.span -->
                              </div>
           </div>
           <div class="col-xs-12 col-sm-6 ">
           <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Vị trí công việc</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php $cv=DB::table('chuc_vu')->get();
                      ?>
                        <select name="vi_tri_cong_viec" id="" class="width-100" value="{{old('vi_tri_cong_viec')}}" >
                      @foreach($cv as $cv)
                          <option value="{{$cv->MA_CV}}" {{ old('vi_tri_cong_viec') == $cv->MA_CV ? 'selected' : '' }}>{{$cv->TEN_CV}}</option>
                      @endforeach
                    </select>
                  </div></div>
                     <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Đơn vị công tác</label>
                <div class="col-xs-12 col-sm-8">
                  <?php $pb=DB::table('phong_ban')->get(); ?>
               <select name="phong_ban" id="phong_ban" class="width-100" >

                          @foreach($pb as $pb)
                            <option value="{{$pb->MA_PB}}" {{ old('phong_ban') == $pb->MA_PB ? 'selected' : '' }} >{{$pb->TEN_PB}}</option>
                          @endforeach
                              </select>

                            </div></div>
              <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Người tuyển dụng</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php $nv=DB::table('nhan_vien')->join('giam_doc_nhan_su','giam_doc_nhan_su.ID_NV','=','nhan_vien.ID_NV')->get();
                      ?>
                        <select name="giam_doc" id="" class="width-100">
                      @foreach($nv as $nv)
                          <option value="{{$nv->ID_NV}}" {{ old('giam_doc') == $nv->ID_NV ? 'selected' : '' }}>{{$nv->HO_TEN}}</option>
                      @endforeach
                    </select>
                  </div></div>
              <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Hình thưc làm việc</label>
                      <div class="col-xs-12 col-sm-8">
                       
                        
                             <select name="hinh_thuc_lam_viec"  style="" class="width-100" value="{{old('hinh_thuc_lam_viec')}}">
                              @if(old('hinh_thuc_lam_viec')=='Toàn thời gian')
                                <option value="Toàn thời gian" selected="" >Toàn thời gian</option>
                                <option value="BánToàn thời gian">Bán thời gian</option>
                              @else
                              <option value="Toàn thời gian" >Toàn thời gian</option>
                                <option value="Toàn thời gian" selected="">Bán thời gian</option>
                              </select>
                            @endif
                              </div>
                            </div>   
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Lương cơ bản</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="ethnic" name="luong_co_ban" placeholder="" class="width-100" type="text" value="{{ old('luong_co_ban') }}">
                      <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('luong_co_ban'))
                      <p style="color:red">{{$errors->first('luong_co_ban')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Hệ số</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php $hs=DB::table('he_so_luong')->get();
                      ?>
                        <select name="he_so" id="" class="width-100">
                      @foreach($hs as $hs)
                          <option value="{{$hs->MA_HE_SO}}" {{ old('he_so') == $hs->MA_HE_SO ? 'selected' : '' }}>{{$hs->HE_SO}}</option>
                      @endforeach
                    </select>
                  </div></div>
           <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Địa điểm làm việc</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="dia_diem_lam_viec" placeholder="" class="width-100" type="text" value="{{old('dia_diem_lam_viec')}}">
                      <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('dia_diem_lam_viec'))
                      <p style="color:red">{{$errors->first('dia_diem_lam_viec')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>    
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Dụng cụ được cấp</label>
                    <div class="col-xs-12 col-sm-8">
                  <textarea name="dung_cu_lam_viec"class="width-100" type="textarea" >{{old('dung_cu_lam_viec')}}</textarea>
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('dung_cu_lam_viec'))
                      <p style="color:red">{{$errors->first('dung_cu_lam_viec')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>    
          
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số ngày nghỉ phép</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="so_ngay_nghi_phep" class="width-100" type="number" value="{{ old('so_ngay_nghi_phep') }} ">
                      <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('so_ngay_nghi_phep'))
                      <p style="color:red">{{$errors->first('so_ngay_nghi_phep')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>   
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Thời gian làm việc</label>
                    <div class="col-xs-12 col-sm-8">
                        <textarea name="thoi_gian_lam_viec" class="width-100" type="textarea">{{old('thoi_gian_lam_viec')}}
                      </textarea>
                   <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('thoi_gian_lam_viec'))
                      <p style="color:red">{{$errors->first('thoi_gian_lam_viec')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>  
           </div>
              
        
        <!-- /END TAB THÔNG TIN NHÂN VIÊN --> 

       
        <div class="wizard-actions">

                    <div class="col-md-offset-3 col-md-9">
                      <hr>
                      <center>
                      <button type="submit"  class="btn btn-info">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button>

                      &nbsp; &nbsp; &nbsp;
                       <button class="btn btn-danger">
                        <i class="ace-icon fa fa-close bigger-110" style="color: red"></i>
                        Hủy</button>
                          </center>
                    </div>

                  </div>
         </form>   
         </div>
<p style="color:red; display:none;" class=""></p>
            </div>
                              
       </div>
        
             
             
                      
<!--date-->
              <script type="text/javascript">
                        var startDate = "1945";
                    var endDate = new Date().getFullYear() - 18;    
                    var interval = startDate + ":" + endDate;
                         $( "#dob" ).datepicker({
                          dateFormat:"yy-mm-dd",
                        changeMonth: true,
                        changeYear: true,
                        yearRange: interval
                    });

                     
                      </script>



  @stop
