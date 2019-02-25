@extends('master.master')
@section('script')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{!! asset('js/jquery-3.0.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>

  <script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 

    <script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<link href="{!!asset('css/jquery-ui.css')!!}" rel="stylesheet">   
<script type="text/javascript" src="{!! asset('js/gethuyen.js')!!}"></script> 
<script type="text/javascript" src="{!! asset('js/edit-position.js')!!}"></script> 
<script type="text/javascript" src="{!! asset('js/qualification.js')!!}"></script> 
<script type="text/javascript" src="{!! asset('js/loadimg.js')!!}"></script> 
<script type="text/javascript" src="{!! asset('assets/js/dataTables.select.min.js')!!}"></script> 


 <style>
   #loader{
   visibility:hidden;
   }
   </style>




    <link href="{!! asset('css/jquery-ui.css')!!}" rel="stylesheet">   </style>

@stop
@section('mucluc')
         <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
        <li>
                <a href="{!!asset('/dsnv')!!}">Quản lí nhân viên</a>
              </li>
              <li class="active">Sửa nhân viên</li>
@stop

 @section('page-header')
        <h1>Sửa nhân viên</h1>
@stop



 

@section('content')

   <div style="margin-left: 10px; margin-right: 10px">
    <div class="nhan_vien_tabs" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs padding-18"" role="tablist">
        <li role="presentation" class="active">
          <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
            <span><i class="green ace-icon fa fa-user bigger-120"></i>Thông tin nhân viên</span>
          </a>
        </li>
        <li role="presentation" class="next">
          <a href="#profile" id="profile-tab" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
            <span class="text"><i class="blue ace-icon fa  fa-briefcase bigger-125"></i>Quá trình làm việc</span>
          </a>
        </li>
         
        </ul>
    </div>
    
      @foreach($nv as $nv)
      <form class="form-horizontal" role="form" action="{{$nv->ID_NV}}" method="POST" enctype="multipart/form-data">
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
      
      <div id="myTabContent" class="tab-content">
        <!-- /TAB THÔNG TIN NHÂN VIÊN --> 
      
        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
         
           <div class="form-group">
                    
                      @if($nv->ANH_DAI_DIEN != '')
                  <center> <img id="img" class="editable img-responsive" src="image/user/{{$nv->ANH_DAI_DIEN}}" alt="{{$nv->ANH_DAI_DIEN}}" width="200" /></center>
                  @else
                  <center><img class="editable img-responsive" src="image/user/noimage.png"  width="200"/></center>
                  @endif
                  </div>
    <div class="col-xs-12 col-sm-6 ">
           <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> ID nhân viên</label>
                    <div class="col-xs-12 col-sm-8">
                      <input name="id" placeholder="" class="width-100" type="text" value="{{$nv->ID_NV}}" readonly>
                    </div>
                  </div>
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Họ tên</label>
                   <div class="col-xs-12 col-sm-8">
                      <input name="name" placeholder="" class="width-100" type="text" value="{{$nv->HO_TEN}}">
                      @if($errors->has('name'))
                      <p style="color:red">{{$errors->first('name')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Giới tính</label>
                    <div class="col-xs-12 col-sm-8">
                      <select name="gioi_tinh" class="width-100">

                      @if((old('gioi_tinh',$nv->GIOI_TINH))=='nam'){
                        <option value="nam" selected>Nam</option>
                        <option value="nữ">Nữ</option>
                      }
                        @else {<option value="nam" >Nam</option>
                        <option value="nữ" selected>Nữ</option>}
                             
                  
                    @endif
                  </select>
                      @if($errors->has('gioi_tinh'))
                      <p style="color:red">{{$errors->first('gioi_tinh')}}</p>
                          @endif
                    </div>
                  </div>
           <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày sinh</label>
                    <div class="col-xs-12 col-sm-8">
                      <input name="dob" placeholder="" class="width-100" type="text" id="dob"
                      value="{{old('dob', $nv->NGAY_SINH)}}">
                      @if($errors->has('dob'))
                      <p style="color:red">{{$errors->first('dob')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nơi sinh</label>
                    <div class="col-xs-12 col-sm-8">
                      
                      <input name="noi_sinh" placeholder="" class="width-100" type="text" value="{{old('noi_sinh',$nv->NOI_SINH)}}">
                      @if($errors->has('noi_sinh'))
                      <p style="color:red">{{$errors->first('noi_sinh')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tôn giáo</label>
                    <div class="col-xs-12 col-sm-8">
                      <input name="ton_giao" placeholder="" class="width-100" type="text" value="{{old('ton_giao',$nv->TON_GIAO)}}">
                      @if($errors->has('ton_giao'))
                      <p style="color:red">{{$errors->first('ton_giao')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Tôn giáo</label>
                    <div class="col-xs-12 col-sm-8">
                      <input name="dan_toc" placeholder="" class="width-100" type="text" value="{{old('dan_toc',$nv->DAN_TOC)}}">
                      @if($errors->has('dan_toc'))
                      <p style="color:red">{{$errors->first('dan_toc')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số nhà</label>
                    <div class="col-xs-12 col-sm-8">
                      <input name="so_nha" placeholder="" class="width-100" type="text" value="{{old('so_nha',$nv->SO_NHA)}}">
                      @if($errors->has('so_nha'))
                      <p style="color:red">{{$errors->first('so_nha')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Phường / Xã</label>
                   <div class="col-xs-12 col-sm-8">
                      <?php
                        $xa=DB::table('devvn_xaphuongthitran')->get();

                        ?>
                      <select class="width-100" id="xa" name="xa">
                           @foreach($xa as $x)
                              @if($x->xaid==$nv->xaid)
                      <option value="{{$nv->xaid}}">{{$x->name}}</option>
                              @endif
                              @endforeach
                            </select>

                      @if($errors->has('phuong'))
                      <p style="color:red">{{$errors->first('phuong')}}</p>
                          @endif

                    </div>
                  </div>

          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Quận / Huyện</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php
                        $quan=DB::table('devvn_quanhuyen')->get();

                        ?>
                      <select class="width-100" id="quan" name="quan">
                           @foreach($quan as $district)
                              @if($district->maqh==$nv->maqh)
                      <option value="{{$nv->maqh}}">{{$district->QUAN_HUYEN}}</option>
                              @endif
                              @endforeach
                            </select>

                      @if($errors->has('quan'))
                      <p style="color:red">{{$errorbs->first('quan')}}</p>
                          @endif
                    </div>
                  </div>
                    <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Tỉnh / Thành phố</label>
                  <div class="col-xs-12 col-sm-8">
                  <?php
                        $tinh=DB::table('devvn_tinhthanhpho')->get();

                        ?>
              <select class="chosen-select form-control" id="tinh" data-placeholder="Choose a State..." style="display: none;" name="tinh">
                          @foreach($tinh as $provine)
                                <option value="{{$provine->matp}}" {{ old('tinh', $nv->matp) == $provine->matp ? 'selected' : '' }}>{{$provine->name}}</option>
                           @endforeach
                            @if($errors->has('tinh'))
                      <p style="color:red">{{$errors->first('tinh')}}</p>
                          @endif   </select>

                            </div></div>
            <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Phụ cấp
                  </label>
                            <div class="col-xs-12 col-sm-8">
                <?php
                    $pc=DB::table('phu_cap')->get(); 
                    $check1=DB::table('co_phu_cap')->where('ID_NV',$nv->ID_NV)->get();
                          foreach ($check1 as $key => $check1) {
                            # code...
                            $mapc[]=$check1->MA_PHU_CAP;

                          }
                ?>  
                <select multiple="" class="chosen-select form-control" name="phu_cap[]" data-placeholder="Phụ cấp" style="display: none;">
                   @if (isset($mapc))
                        @foreach($pc as $pc)
                                <option value="{{$pc->MA_PHU_CAP}}" <?php if(in_array($pc->MA_PHU_CAP,old('phu_cap',$mapc))) {echo 'selected';} ?>>{{$pc->TEN_PHU_CAP}}</option>
                        @endforeach
                    @else
                        @foreach($pc as $pc)
                                <option value="{{$pc->MA_PHU_CAP}}">{{$pc->TEN_PHU_CAP}}</option>
                        @endforeach
                    @endif
                   </select>
                          
                              </div><!-- /.span -->
                              </div>
             <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Bảo hiểm
                  </label>
                            <div class="col-xs-12 col-sm-8">
                <?php
                    $bh=DB::table('bao_hiem')->get(); 
                    $check2=DB::table('nhan_vien_bao_hiem')->where('ID_NV',$nv->ID_NV)->get();
                          foreach ($check2 as $key => $check2) {
                            # code...
                            $mabh[]=$check2->MA_GIAM_TRU;

                          }
                ?>  
                <select multiple="" class="chosen-select form-control" name="bao_hiem[]" data-placeholder="Bảo hiểm" style="display: none;">
                   @if (isset($mabh))
                        @foreach($bh as $bh)
                                <option value="{{$bh->MA_GIAM_TRU}}"<?php if(in_array($bh->MA_GIAM_TRU,old('bao_hiem',$mabh))) {echo 'selected';} ?>>{{$bh->TEN_KHOAN_GIAM_TRU}}</option>
                        @endforeach
                    @else
                    @foreach($bh as $bh)
                                <option value="{{$bh->MA_GIAM_TRU}}">{{$bh->TEN_KHOAN_GIAM_TRU}}</option>
                     @endforeach
                     @endif
                   </select>
                          
                              </div><!-- /.span -->
                              </div>
                          </div>
      <div class="col-xs-12 col-sm-6 ">

            <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Chứng minh nhân dân</label>
                    <div class="col-sm-9">
                          
                       <input NAME="cmnd" placeholder="" class="width-100" type="text" value="{{old('cmnd',$nv->CMND)}}">
                       @if($errors->has('cmnd'))
                      <p style="color:red">{{$errors->first('cmnd')}}</p>
                          @endif

                    </div>
                  </div>      
           <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày cấp</label>
                    <div class="col-sm-9">
                          
                       <input name="ngay_cap" placeholder="" class="width-100" type="date" value="{{old('ngay_cap',$nv->NGAY_CAP)}}">
                       @if($errors->has('ngay_cap'))
                      <p style="color:red">{{$errors->first('ngay_cap')}}</p>
                          @endif

                    </div>
                  </div>       
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Nơi cấp</label>
                    <div class="col-sm-9">
                          
                       <input name="noi_cap" placeholder="" class="width-100" type="text" value="{{old('noi_cap',$nv->NOI_CAP)}}">
                       @if($errors->has('noi_cap'))
                      <p style="color:red">{{$errors->first('noi_cap')}}</p>
                          @endif

                    </div>
                  </div>     
        <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số thẻ ngân hàng</label>
                    <div class="col-sm-9">
                          
                       <input name="atm" placeholder="" class="width-100" type="text" value="{{old('atm',$nv->MA_THENH)}}">
                       @if($errors->has('atm'))
                      <p style="color:red">{{$errors->first('atm')}}</p>
                          @endif

                    </div>
                  </div>    
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Số điện thoại</label>
                    <div class="col-sm-9">
                          
                       <input name="sdt" placeholder="" class="width-100" type="text" value="{{old('sdt',$nv->SDT)}}">
                       @if($errors->has('sdt'))
                      <p style="color:red">{{$errors->first('sdt')}}</p>
                          @endif

                    </div>
                  </div>    
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>
                    <div class="col-sm-9">
                          
                       <input name="email" placeholder="example@xx.com" class="width-100" type="text" value="{{old('email',$nv->EMAIL)}}">
                       @if($errors->has('email'))
                      <p style="color:red">{{$errors->first('email')}}</p>
                          @endif

                    </div>
                  </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phòng ban</label>
                <div class="col-sm-9">
                  <?php
                        $pb=DB::table('phong_ban')->get();
                        ?>
               <select name="phong_ban" class="chosen-select form-group">
                          @foreach($pb as $pb)
                              @if($pb->MA_PB==old('phong_ban',$nv->MA_PB))
                                <option value="{{$pb->MA_PB}}" selected>{{$pb->TEN_PB}}</option>
                              @else <option value="{{$pb->MA_PB}}">{{$pb->TEN_PB}}</option>
                              @endif
                           @endforeach
                              </select>

                            </div></div>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Mức lương</label>
                    <div class="col-sm-9">
                      <input id="ethnic" name="muc_luong" placeholder="" class="width-100" type="text" value="{{$nv->LUONG_CO_BAN}}" readonly>
                     
                    </div>
                  </div>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Hệ số lương</label>
          <div class="col-sm-9">
                  <?php
                        $hs=DB::table('he_so_luong')->get();
                        ?>
               <select name="he_so_luong" id="he_so_luong" class="width-100">
                          @foreach($hs as $hs)
                            @if($hs->MA_HE_SO==old('he_so_luong',$nv->MA_HE_SO))
                                <option value="{{$hs->MA_HE_SO}}" selected>{{$hs->HE_SO}}</option>
                            @else
                               <option value="{{$hs->MA_HE_SO}}">{{$hs->HE_SO}}</option>
                            @endif
                           @endforeach
                              </select>

                            </div></div> 
                <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Số người phụ thuộc</label>
                    <div class="col-sm-9">
                      <input id="ethnic" name="nguoi_phu_thuoc" placeholder="" class="width-100" type="text" value="{{old('nguoi_phu_thuoc',$nv->NGUOI_PHU_THUOC)}}">
                      @if($errors->has('nguoi_phu_thuoc'))
                      <p style="color:red">{{$errors->first('nguoi_phu_thuoc')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group">
                      <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh đại diện</label>
                      <div class="col-sm-9">
                              <input id="id-input-file-2" name="file" type="file" onchange="readURL(this);">
                              </div>
                            </div>   
          <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày vào làm</label>
                    <div class="col-sm-9">
                          
                       <input name="ngay_vao_lam" class="width-100" type="date" value="{{old('ngay_vao_lam', $nv->NGAY_VAO_LAM)}}">
                       @if($errors->has('ngay_vao_lam'))
                      <p style="color:red">{{$errors->first('ngay_vao_lam')}}</p>
                          @endif
                    </div>
                  </div> 

        <div class="form-group">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Bằng cấp
                  </label>
                            <div class="col-sm-9">
                <?php
                    $bc=DB::table('bang_cap')->get(); 
                     $check3=DB::table('co_bc')->where('ID_NV',$nv->ID_NV)->get();
                          foreach ($check3 as $key => $check3) {
                            # code...
                            $ma[]=$check3->MA_BC;
                          }

                ?>  
                <select multiple="" class="chosen-select form-control" name="bang_cap[]" data-placeholder="Chọn bằng cấp" style="display: none;">
                  @if(isset($ma))
                        @foreach($bc as  $bc)
                      
                                <option value="{{$bc->MA_BC}}" <?php if(in_array($bc->MA_BC,old('bang_cap',$ma))) {echo 'selected';} ?>>{{$bc->TEN_BC}}</option>
                        
                        @endforeach
                  @else
                     @foreach($bc as  $bc)
                      
                                <option value="{{$bc->MA_BC}}">{{$bc->TEN_BC}}</option>
                        
                        @endforeach
                  @endif
                   </select>
                          
                              </div><!-- /.span -->
                              </div>
         <div class="form-group">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Skill
                  </label>
                            <div class="col-sm-9">
                    <?php
                    $kn=DB::table('ki_nang')->get(); 
                    $check4=DB::table('co_kn')->where('ID_NV',$nv->ID_NV)->get();
                          foreach ($check4 as $key => $check4) {
                            # code...
                            $makn[]=$check4->MA_KN;
                          }
                ?>     
                <select multiple="" class="chosen-select form-control" name="ki_nang[]" data-placeholder="Chọn kĩ năng" style="display: none;">
                  @if(isset($makn))
                  @foreach($kn as $kn)
                                <option value="{{$kn->MA_KN}}" <?php if(in_array($kn->MA_KN,old('ki_nang',$makn))) {echo 'selected';} ?>>{{$kn->TEN_KN}}</option>
                  @endforeach 
                  @else
                   @foreach($kn as $kn)
                                <option value="{{$kn->MA_KN}}">{{$kn->TEN_KN}}</option>
                  @endforeach  
                  @endif       
                   </select>
                          
                              </div><!-- /.span -->
                              </div>
                </div>                  
           
                <div class="form-group">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" id="edit_tt_nv" class="btn btn-info">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button>
@endforeach
                      &nbsp; &nbsp; &nbsp;
                
                     <button type="reset" id="huy" class="btn btn-danger" onclick="window.location.href='http://localhost:81/hrm/dsnv'">
                       <i class="ace-icon fa fa-close bigger-110"></i>
                        Hủy
                     
                      </button>
                                       </form>

                    </div></div>
        </div>

      
        <!-- /END TAB THÔNG TIN NHÂN VIÊN --> 

        <!-- /TAB THÔNG TIN CHỨC VỤ -->
        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
              

                             <?php
                        $cv = DB::table('qua_trinh_cong_tac')->join('chuc_vu', 'chuc_vu.MA_CV', '=', 'qua_trinh_cong_tac.MA_CV')->where('ID_NV','=',$nv->ID_NV)->get();
                        
                        ?>
                    <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                              Chức vụ
                            </th><th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label=""> Thời gian bắt đầu</th><th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label=""> Thời gian kết thúc</th><th class="sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label=""></th></tr>
                        </thead>

                        <tbody>
                    
                            @foreach($cv as $cv)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$cv->TEN_CV}}
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td>
                             {{$cv->THOI_GIAN_BAT_DAU_LV}}
                            </td>
                             <td>
                             {{$cv->THOI_GIAN_KET_THUC_LV}}
                            </td>
                            <td>
                              <div class="hidden-sm hidden-xs action-buttons">
                                <a class="green" macv="{{$cv->MA_CV}}" time_star="{{$cv->THOI_GIAN_BAT_DAU_LV}}" time_end=" {{$cv->THOI_GIAN_KET_THUC_LV}}" tencv=" {{$cv->TEN_CV}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="deletecv/{{$nv->ID_NV}}/{{$cv->MA_CV}}" onclick="return confirm('Do you want to delete ?')">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>
                              <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                   <a class="green" macv="{{$cv->MA_CV}}" time_star="{{$cv->THOI_GIAN_BAT_DAU_LV}}" time_end=" {{$cv->THOI_GIAN_KET_THUC_LV}}" tencv=" {{$cv->TEN_CV}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="deletecv/{{$nv->ID_NV}}/{{$cv->MA_CV}}" onclick="return confirm('Do you want to delete ?')">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                                </div></div>
                              
                            </td>
                          </tr>@endforeach</tbody>
                      </table>
                <a href="" data-toggle="modal" data-target="#addcv">+ Add position</a>
      </div>
     <!--TAB QUAFILICATION-->

        <!-- /END TAB THÔNG TIN CHỨC VỤ --> 
        <!--TAB QUALIFICATION-->

                
                <!--END TAB QUALIFICATION-->       
               <!--POPUP TAB-->
                <!-- Modal -->
      <div id="addcv" class="modal fade" role="dialog">
               <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">THÊM CHỨC VỤ</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" role="form" action="{{url('addposition')}}" method="POST" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
        <p> <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Chức vụ</label>
                      <div class="col-xs-12 col-sm-8">
                        <?php
                        $chuc_vu=DB::table('chuc_vu')->get();
                        ?>
                        <input type = "hidden" name = "id" value = "{{$nv->ID_NV}}" id="id"> 
                             <select name="chuc_vu"  style="" class="width-100"  >
                              @foreach($chuc_vu as $chuc_vu)
                                <option value="{{$chuc_vu->MA_CV}}">{{$chuc_vu->TEN_CV}}  </option>
                               @endforeach
                              </select>
                       
                              </div>
                            </div>   
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày bắt đầu</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="ngay_bat_dau" class="width-100" type="date" value="{{ old('ngay_bat_dau') }}"required>
                       @if($errors->has('ngay_bat_dau'))
                      <p style="color:red">{{$errors->first('ngay_bat_dau')}}</p>
                          @endif
                    </div>
                  </div>   
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày kết thúc</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="ngay_ket_thuc" class="width-100" type="date" value="{{ old('ngay_ket_thuc') }}">
                      
                    </div>
                  </div>    
           </div></p>
      </div>
    
      <div class="modal-footer">
         <button type="submit" id="edit_tt_nv" class="btn btn-info">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button></form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
    <!--END TAB POSITION-->
 
<!--TAB EDIT-->
        <!-- Modal -->
      <div id="editcv" class="modal fade" role="dialog">
               <div class="modal-dialog">

    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">SỬA CHỨC VỤ</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" role="form" action="{{url('editposition')}}" method="POST" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
        <p> <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Chức vụ</label>
                      <div class="col-xs-12 col-sm-8">
      
                        <input type = "hidden" name = "id" value = "{{$nv->ID_NV}}"> 
                         <input type = "hidden" name = "macv_edit" id="macv_edit" readonly> 
                            <input type = "text" name = "chuc_vu" id="chucvu" class="width-100" readonly>
                       
                              </div>
                            </div>   
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày bắt đầu</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="ngay_bat_dau_edit" id="ngay_bat_dau_edit"  class="width-100" type="date" value="{{ old('ngay_bat_dau') }}">
                       @if($errors->has('ngay_bat_dau'))
                      <p style="color:red">{{$errors->first('ngay_bat_dau')}}</p>
                          @endif
                    </div>
                  </div>   
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày kết thúc</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="ngay_ket_thuc_edit" id="ngay_ket_thuc_edit"   class="width-100" type="date" value="{{ old('ngay_ket_thuc') }}">
                      
                    </div>
                  </div>    
           </div></p>
      </div>
    
      <div class="modal-footer">
         <button type="submit" id="edit_tt_nv" class="btn btn-info">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button></form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
    <!--END TAB-->
             


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