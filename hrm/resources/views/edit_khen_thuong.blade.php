@extends('master.master')
@section('script')

<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<link href="{!!asset('css/jquery-ui.css')!!}" rel="stylesheet">   
<script type="text/javascript" src="{!! asset('js/gethuyen.js')!!}"></script> 
<script type="text/javascript" src="{!! asset('js/getidnv.js') !!}"></script> 

 <style>
   #loader{
   visibility:hidden;
   }
   </style>


@stop
@section('mucluc')
         <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
        <li><a href="{!!asset('/dskhenthuong')!!}">Danh sách khen thưởng</a>
              </li>
              <li class="active">Sửa khen thưởng</li>
@stop

 @section('page-header')
        <h1>Sửakhen thưởng</h1>
@stop



@section('content')


    <div class="row">
   <div style="margin-left: 10px; margin-right: 10px">
     @foreach($kt as $kt)
    <form class="form-horizontal" role="form" action="{{url('updatekt')}}" method="POST" enctype="multipart/form-data">{{ csrf_field() }}
      <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
     
        <!-- /TAB THÔNG TIN NHÂN VIÊN --> 
       
        <div class="col-xs-12 col-sm-6 ">
           <div class="form-group has-info">

                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Phòng ban</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php 
                      
                       $pb2=DB::table('phong_ban')->get();
                       $pb=DB::table('nhan_vien')->where('ID_NV',$kt->ID_NV)->select('MA_PB')->get();
                       foreach ($pb as $pb) {
                         # code...
                        $pb1[]=$pb->MA_PB;
                       }

                      ?>
                      
                        <select name="p" id="p" class="width-100" >
                          
                      @foreach($pb2 as $pb2)
                        
                          <option value="{{$pb2->MA_PB}}"<?php if(in_array($pb2->MA_PB, $pb1)) {echo 'selected';} ?> >{{$pb2->TEN_PB}}</option>
                          
                      @endforeach
                    </select>
                  </div></div>
                  
          <div class="form-group has-info" >

                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số quyết định</label>
                   <div class="col-xs-12 col-sm-8">
                      <input name="id_qd" placeholder="" class="width-100" type="text" value="{{$kt->MA_QD_KT}}" readonly="">
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('id_qd'))
                      <p style="color:red">{{$errors->first('id_qd')}}</p>
                          @endif
                        </div>
                    </div>
                     
                 </div> 
          
          
                  <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Ngày có hiệu lực</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="ngay_hieu_luc"  name="ngay_hieu_luc" placeholder="" class="width-100" type="date" value="{{ $kt->NGAY_THUC_HIEN_KT }}">
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('ngay_hieu_luc'))
                      <p style="color:red">{{$errors->first('ngay_hieu_luc')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số tiền khen thưởng</label>
                    <div class="col-xs-12 col-sm-8">
                      <input id="tien_thuong" name="tien_thuong" value="{{ $kt->TIEN_THUONG }}" placeholder="" class="width-100" type="text">
                     
              <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('tien_thuong'))
                      <p style="color:red">{{$errors->first('tien_thuong')}}</p>
                          @endif
                        </div></div></div></div>
       <div class="col-xs-12 col-sm-6 ">
         
                 <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> ID nhân viên</label>
                    <div class="col-xs-12 col-sm-8">
                      
                        <select name="id_employee" id="id_employee" class="width-100" >
                          <option value="{{$kt->ID_NV}}">{{$kt->ID_NV}}</option>
                    </select>
                  
                  <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('id_employee'))
                      <p style="color:red">{{$errors->first('id_employee')}}</p>
                          @endif
                        </div></div></div>
                  <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Lý do khen thưởng</label>
                    <div class="col-xs-12 col-sm-8">
                      <input name="ly_do" placeholder="" class="width-100" type="text" value="{{ $kt->LY_DO}}">
                      <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('ly_do'))
                      <p style="color:red">{{$errors->first('ly_do')}}</p>
                          @endif
                        </div>
                    </div>
                  </div>
                   <div class="form-group has-info"> 
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Ngày kí</label>
                    <div class="col-xs-12 col-sm-8"> 
                      <input name="ngay_ki" id="ngay_ki" placeholder="mm / dd / yy" class="width-100" type="date" data-relmax value="{{$kt->NGAY_KY_KT }}">
                     <div class="help-block col-xs-12 col-sm-reset inline">
                      @if($errors->has('ngay_ki'))
                      <p style="color:red">{{$errors->first('ngay_ki')}}</p>
                          @endif
                        </div>
                      
                    </div>
                  </div>         
                 <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Người kí quyết định</label>
                    <div class="col-xs-12 col-sm-8">
                      <?php
                          $gd=DB::table('nhan_vien')->join('giam_doc_nhan_su','nhan_vien.ID_NV','=','giam_doc_nhan_su.ID_NV')->get();
                      ?>

                        <select name="gi_id_nv" id="gi_id_nv" class="width-100" >

                          @foreach($gd as $gd)
                          @if($gd->ID_NV==$kt->ID_NV)
                      <option value="{{$gd->ID_NV}}" selected="">{{$gd->HO_TEN}}</option>
                          @else
                           <option value="{{$gd->ID_NV}}" >{{$gd->HO_TEN}}</option>
                        @endif
                          @endforeach
                    </select>
                  


       </div>
          
           </div>
           @endforeach
         </div>
        
        <!-- /END TAB THÔNG TIN NHÂN VIÊN --> 

       
        <div class="wizard-actions">

                    <div class="col-md-offset-1 col-md-9">
                      <hr>
                      <center>
                      <button type="submit" id="add" class="btn btn-info">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button>

                      &nbsp; &nbsp; &nbsp;
                       <button class="btn btn-danger" type="reset">
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
