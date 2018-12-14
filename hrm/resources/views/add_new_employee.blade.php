@extends('master.master')
@section('script')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<link href="{!!asset('css/jquery-ui.css')!!}" rel="stylesheet">   
<script type="text/javascript" src="{!! asset('js/gethuyen.js')!!}"></script> 
 <style>
   #loader{
   visibility:hidden;
   }
   </style>


@stop
@section('mucluc')
         <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
        <li>
                <a href="{!!asset('/dsnv')!!}">Quản lí nhân viên</a>
              </li>
              <li class="active">Thêm nhân viên</li>
@stop

 @section('page-header')
        <h1>Thêm nhân viên mới</h1>
@stop



@section('content')


    <div class="row">
   <div style="margin-left: 10px; margin-right: 10px">
    <form class="form-horizontal" role="form" action="{{url('addnewnv')}}" method="POST" enctype="multipart/form-data">{{ csrf_field() }}
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
     
        <!-- /TAB THÔNG TIN NHÂN VIÊN --> 
        <div class="col-xs-12 col-sm-6 ">
          <div class="form-group has-info" >

                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Họ tên</label>
                   <div class="col-xs-12 col-sm-8">
                      <input name="name" placeholder="" class="width-100" type="text" value="{{ old('name') }}">
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('name'))
                      <p style="color:red">{{$errors->first('name')}}</p>
                          @endif
                        </div>
                    </div>
                     </div>
                  
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Giới tính</label>
                    <div class="col-xs-12 col-sm-8">
                      <select name="gioi_tinh" id="gioi_tinh" class="width-100">
                            <option value="nam" @if(old('gioi_tinh') == 'nam') selected @endif >Nam</option>
                            <option value="nu" @if(old('gioi_tinh') == 'nu') selected @endif>Nữ</option>                    
                      </select>
                    </div>
                  </div>
           <div class="form-group has-info"> 
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày sinh</label>
                    <div class="col-xs-12 col-sm-8"> 
                      <input name="dob" id="dob" placeholder="mm / dd / yy" class="width-100" type="text" data-relmax value="{{ old('dob') }}">
                      @if($errors->has('dob'))
                      <p style="color:red">{{$errors->first('dob')}}</p>
                          @endif
                      
                    </div>
                  </div>
                  <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Nơi sinh</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="birthplace"  name="noi_sinh" placeholder="" class="width-100" type="text" value="{{ old('noi_sinh') }}">
                      @if($errors->has('noi_sinh'))
                      <p style="color:red">{{$errors->first('noi_sinh')}}</p>
                          @endif
                    </div>
                  </div>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Tôn giáo</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php
                        $tg=DB::table('ton_giao')->get();
                        ?>
               <select name="ton_giao" id="ton_giao" class="width-100">
                          @foreach($tg as $tg)
                                <option value="{{$tg->TEN_TG}}" @if(old('ton_giao') == $tg->TEN_TG) selected @endif>{{$tg->TEN_TG}}</option>
                           @endforeach
                              </select>
                    </div>
                  </div>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Dân tộc</label>
                    <div class="col-xs-12 col-sm-8">
                       <?php
                        $dt=DB::table('dan_toc')->get();
                        ?>
               <select name="dan_toc" id="dan_toc" class="width-100">
                          @foreach($dt as $dt)
                                <option value="{{$dt->TEN_DT}}" @if(old('dan_toc') == $dt->TEN_DT) selected @endif>{{$dt->TEN_DT}}</option>
                           @endforeach
                              </select>
                    </div>
                  </div>
                     <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Phòng ban</label>
                <div class="col-xs-12 col-sm-8">
                  <?php
                        $pb=DB::table('phong_ban')->get();
                        ?>
               <select name="phong_ban" id="phong_ban" class="width-100">
                          @foreach($pb as $pb)
                                <option value="{{$pb->MA_PB}}" @if(old('phong_ban') == $pb->MA_PB) selected @endif>{{$pb->TEN_PB}}</option>
                           @endforeach
                              </select>

                            </div></div>
              <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Chức vụ</label>
                      <div class="col-xs-12 col-sm-8">
                        <?php
                        $chuc_vu=DB::table('chuc_vu')->get();
                        ?>
                        
                             <select name="chuc_vu"  style="" class="width-100" >
                              @foreach($chuc_vu as $chuc_vu)
                                <option value="{{$chuc_vu->MA_CV}}" @if(old('chuc_vu') == $chuc_vu->MA_CV) selected @endif>{{$chuc_vu->TEN_CV}}  </option>
                               @endforeach
                              </select>
                       
                              </div>
                            </div>   
            
           
                              
           <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số điện thoại</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input id="sdt" name="sdt" placeholder="" class="width-100" type="text" value="{{old('sdt')}}">
                       @if($errors->has('sdt'))
                      <p style="color:red">{{$errors->first('sdt')}}</p>
                          @endif
                    </div>
                  </div>    
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Email</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input id="email" name="email" placeholder="example@xx.com" class="width-100" type="text" value="{{ old('email') }}">
                       @if($errors->has('email'))
                      <p style="color:red">{{$errors->first('email')}}</p>
                          @endif
                    </div>
                  </div>    
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày vào làm</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="ngay_vao_lam" class="width-100" type="date" value="{{ old('ngay_vao_lam') }}">
                       @if($errors->has('ngay_vao_lam'))
                      <p style="color:red">{{$errors->first('ngay_vao_lam')}}</p>
                          @endif
                    </div>
                  </div>   
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Hệ số lương</label>
          <div class="col-xs-12 col-sm-8">
                  <?php
                        $hs=DB::table('he_so_luong')->get();
                        ?>
               <select name="he_so_luong" id="he_so_luong" class="width-100">
                          @foreach($hs as $hs)
                                <option value="{{$hs->MA_HE_SO}}" @if(old('he_so_luong') == $hs->MA_HE_SO) selected @endif>{{$hs->HE_SO}}</option>
                           @endforeach
                              </select>

                            </div></div> 
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
                                <option value="{{$bh->MA_GIAM_TRU}}">{{$bh->TEN_KHOAN_GIAM_TRU}}</option>
                        @endforeach
                    @endif
                   </select>
                          
                              </div><!-- /.span -->
                              </div>
           </div>
              
        <div class="col-xs-12 col-sm-6 ">

          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số nhà</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="no" name="so_nha" placeholder="" class="width-100" type="text" value="{{ old('so_nha') }}">
                      @if($errors->has('so_nha'))
                      <p style="color:red">{{$errors->first('so_nha')}}</p>
                          @endif
                    </div>
                  </div>
          
                  <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Tỉnh / Thành phố</label>
                  <div class="col-xs-12 col-sm-8">
                  <?php
                        $tinh=DB::table('devvn_tinhthanhpho')->get();

                        ?>
              <select class="chosen-select form-control" id="tinh" data-placeholder="Choose a State..." style="display: none;" name='tinh'>
                          @foreach($tinh as $tinh)
                                <option value="{{$tinh->matp}}" @if(old('tinh') == $tinh->matp) selected @endif>{{$tinh->name}}</option>
                           @endforeach
                            @if($errors->has('tinh'))
                      <p style="color:red">{{$errors->first('tinh')}}</p>
                          @endif   </select>

                            </div></div>
                           

                       <div class="form-group has-info">
                            <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Quận/ huyện</span></label></span>
                             <div class="col-xs-12 col-sm-8">
                          <select id="quan" name="quan" class=" form-control">
                            @if(old('quan')!=null)
                            <?php $quan=DB::table('devvn_quanhuyen')->get(); ?>
                              @foreach($quan as $quan)
                                  @if($quan->maqh==old('quan'))
                            <option value="{{$quan->maqh}}">{{$quan->QUAN_HUYEN}}</option>
                                  @endif
                            @endforeach
                            @endif
                          </select>
                              @if($errors->has('quan'))
                           <p style="color:red">{{$errors->first('quan')}}</p>
                                  @endif
                            </div>
                        </div>
                       <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Phường/ Xã<span id="loader"></label></span>
                    <div class="col-xs-12 col-sm-8">
                    <select id="xa" name="xa" class=" form-control">
                            @if(old('xa')!=null)
                            <?php $xa=DB::table('devvn_xaphuongthitran')->get(); ?>
                              @foreach($xa as $xa)
                                  @if($xa->xaid==old('xa'))
                                  <option value="{{$xa->xaid}}">{{$xa->name}}</option>
                                  @endif
                            @endforeach
                            @endif

                    </select>
                      @if($errors->has('xa'))
                      <p style="color:red">{{$errors->first('xa')}}</p>
                          @endif
                    </div>
                  </div>
         <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Số người phụ thuộc</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="ethnic" name="nguoi_phu_thuoc" placeholder="" class="width-100" type="text" value="{{ old('nguoi_phu_thuoc') }}">
                      @if($errors->has('nguoi_phu_thuoc'))
                      <p style="color:red">{{$errors->first('nguoi_phu_thuoc')}}</p>
                          @endif
                    </div>
                  </div>
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Chứng minh nhân dân</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input id="cmnd" name="cmnd" placeholder="" class="width-100" type="text"value="{{ old('cmnd') }}" >
                         @if($errors->has('cmnd'))
                      <p style="color:red">{{$errors->first('cmnd')}}</p>
                          @endif
                    </div>
                  </div>      
           <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày cấp</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input id="doc" name="ngay_cap"placeholder="" class="width-100" type="date" value="{{ old('ngay_cap') }}">
                        @if($errors->has('ngay_cap'))
                      <p style="color:red">{{$errors->first('ngay_cap')}}</p>
                          @endif
                    </div>
                  </div>       
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Nơi cấp</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input id="noicap" name="noi_cap" placeholder="" class="width-100" type="text" value="{{ old('noi_cap') }}">
                       @if($errors->has('noi_cap'))
                      <p style="color:red">{{$errors->first('noi_cap')}}</p>
                          @endif
                    </div>
                  </div>     
        <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số thẻ ngân hàng</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input id="atm" name="atm" placeholder="" class="col-xs-12 col-sm-300" type="text" value="{{ old('atm') }}">
                       @if($errors->has('atm'))
                      <p style="color:red">{{$errors->first('atm')}}</p>
                          @endif
                    </div>
                  </div>    
         
          <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ảnh đại diện</label>
                        
                                <label class="ace-file-input ace-file-multiple">
                                   <div class="col-xs-12 col-sm-5"><input multiple="" id="id-input-file-3" type="file" name="file"></div><a class="remove" href="#"><i class=" ace-icon fa fa-times"></i></a></label>
                              @if($errors->has('file'))
                      <p style="color:red">{{$errors->first('file')}}</p>
                          @endif
                            </div>
                        
          <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Bằng cấp
                  </label>
                            <div class="col-xs-12 col-sm-8">
                <?php
                    $bc=DB::table('bang_cap')->get(); 
                ?>  
                <select multiple="" class="chosen-select form-control" name="bang_cap[]" data-placeholder="Choose Qualification" style="display: none;">
                   @if (is_array(old('bang_cap')))
                        @foreach($bc as $bc)
                                <option value="{{$bc->MA_BC}}"<?php if(in_array($bc->MA_BC, old('bang_cap'))) {echo 'selected';} ?>>{{$bc->TEN_BC}}</option>
                        @endforeach
                        @else
                        @foreach($bc as $bc)
                                <option value="{{$bc->MA_BC}}">{{$bc->TEN_BC}}</option>
                        @endforeach
                        @endif
                   </select>
                          
                              </div><!-- /.span -->
                              </div>
         <div class="form-group has-info">
                  <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Skill
                  </label>
                            <div class="col-xs-12 col-sm-8">
                    <?php
                    $kn=DB::table('ki_nang')->get(); 
                ?>     
                <select multiple="" class="chosen-select form-control" name="ki_nang[]" data-placeholder="Choose Skill" style="display: none;">
                   @if (is_array(old('ki_nang')))
                        @foreach($kn as $kn)
                                <option value="{{$kn->MA_KN}}"<?php if(in_array($kn->MA_KN, old('ki_nang'))) {echo 'selected';} ?>>{{$kn->TEN_KN}}</option>
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
                          
        
       
        <!-- /END TAB THÔNG TIN NHÂN VIÊN --> 

       
        <div class="wizard-actions">

                    <div class="col-md-offset-3 col-md-9">
                      <hr>
                      <center>
                      <button type="submit" id="add" class="btn btn-info">
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
