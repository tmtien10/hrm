@extends('master.list')
@section('page-header')
<h1>
              Phiếu lương
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/getidnv.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<link href="{!!asset('css/jquery-ui.css')!!}" rel="stylesheet">   
 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li class="active"> Phiếu lương</li>

@stop
@section('content')

                <div class="row">

                  <div class="col-xs-12">
                    
                    <div class="clearfix">
                      <a href="" data-toggle="modal" data-target="#add_salary">+ Add new </a>
                      <div class="pull-right tableTools-container">
                        </div>
                    </div>
                    <div class="table-header">
                      Results for " Phiếu lương"
                  </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            THÁNG
                            </th><th class="center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">ID NHÂN VIÊN</th><th class="hidden-480"">LƯƠNG CƠ BẢN</th><th class="hidden-480">SỐ NGÀY LÀM VIỆC</th><th class="center sorting_disabled">LƯƠNG THỰC LÃNH</th><th></th></thead></tr>
                        </thead>

                        <tbody>
                    
                            @foreach($pb as $pb)
                          
                        <tr role="row" class="odd">
                            <td class="center"> {{date("m-Y", strtotime($pb->THANG))}} </td>

                            <td class="center">{{$pb->ID_NV}}</td>
                            <td class="center" class="hidden-480">{{number_format($pb->LUONG_CO_BAN)}}</td>
                            <td class="center" class="hidden-480">{{$pb->SO_NGAY_CONG}}</td>
                            <td class="center">{{number_format($pb->TONG_LUONG_SAU_KHAU_TRU)}}</td>
                           
                            <td style="display: none;">
                             
                            </td>

                            <td class="center">
                              <div class="hidden-sm hidden-xs action-buttons">
                                

                                <a class="green" href="getslip/{{$pb->STT}}" >
                                  <i class="ace-icon fa fa-search bigger-130"></i>
                                </a>

                                <a class="red" href="delslip/{{$pb->STT}}" onclick="return confirm('Do you want to delete ?')">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                              
                            </td>
                          </tr>@endforeach</tbody>
                      </table>
                    
                    </div>
                    </div>
                 </div>
               <!--POPUP TAB-->
                  <!--Add Department--> 
                <!-- Modal -->
      <div id="add_salary" class="modal fade" role="dialog">
               <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Thêm phiếu lương</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" role="form" " method="POST" action="{{url('getluong')}}" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
                             <p style="color:red;" class="payrate_id_add_error"></p>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Phiếu lương tháng</label>
                    <div class="col-xs-12 col-sm-8">
                         <input name="thang" id='thang' type="text" class="width-100" placeholder="Chọn tháng">
                    <div class="help-block col-xs-12 col-sm-reset inline">
                        <p style="color:red;" class="thang"></p>
                        </div>
                       
                    </div>
                    
                  </div>   
        <p> <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Phòng ban</label>
                      <?php
                      $phong=DB::table('phong_ban')->get();

                      ?>
                      <div class="col-xs-12 col-sm-8">
                          <select name="p" class="width-100">
                        @foreach($phong as $p)
                        <option value="{{$p->MA_PB}}">{{$p->TEN_PB}}</option>
                           @endforeach
                           </select>                  
                              </div>
                             
                            </div>   
                             <p style="color:red;" class="payrate_id_add_error"></p>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Employee ID</label>
                    <div class="col-xs-12 col-sm-8">
                          <select name="id_employee" id="id_employee"class="width-100" >
                            <option></option>

                          </select>
                      <div class="help-block col-xs-12 col-sm-reset inline">
                        <p style="color:red;" class="id_employee"></p>
                        </div>
                       
                    </div>
                    
                  </div>   
          
         <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Họ tên</label>
                    <div class="col-xs-12 col-sm-8">
                          <input name="ten_employee" id="ten_employee" class="width-100" type="text" readonly>                       
                    </div>
                    
                  </div>   
      <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số ngày tính công</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="number" id="number" class="width-100" type="number" min="0">
                       <div class="help-block col-xs-12 col-sm-reset inline">
                        <p style="color:red;" class="number"></p>
                        </div>
                       
                    </div>
                    
                  </div>   
         <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Số giờ làm thêm</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="hour" id="hour" class="width-100" type="number" step="0.1" min="0" max="23">
                    </div>
                    
                  </div>   
                   <p style="color:red;" class="hour"></p>
       
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Lương thưởng</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="luong_thuong" id="luong_thuong" class="width-100" type="text">
                    </div>
                    
                  </div>   
                   <p style="color:red;" class="luong_du_an"></p>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Lương phạt</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="luong_phat" id="luong_phat" class="width-100" type="text">
                    </div>
                    
                  </div>   
                   <p style="color:red;" class="luong_du_an"></p>
         <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1"> Lương dự án</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="luong_du_an" id="luong_du_an" class="width-100" type="text" value="">
                    </div>
                    
                  </div>   
                   <p style="color:red;" class="luong_du_an"></p>
          
          
          
      </div>
    
      <div class="modal-footer">
         <button type="button" class="btn btn-info" id="add" name="add">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Add
                      </button></form>
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
    <!--END DEPARTMENT TAB-->    
    <script type="text/javascript">
                         $( "#thang" ).datepicker({
                          dateFormat:"yy-mm",
                        changeMonth: true,
                        changeYear: true,
                    });

                     
                      </script>


@stop