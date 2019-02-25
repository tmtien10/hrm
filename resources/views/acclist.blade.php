@extends('master.list')
@section('page-header')
<h1>
               Acc List
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/acc.js') !!}"></script> 

 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li class="active">Acc List</li>

@stop
@section('content')



                  <div class="col-xs-12">

                    <div class="clearfix">
                      <a href="" data-toggle="modal" data-target="#add_acc">+ Add acc</a>
                      <div class="pull-right tableTools-container">
                        </div>
                    </div>
                    <div class="table-header">
                      Results for "Acc List"
                  </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                             ACC_ID
                            </th><th class="center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">ID NHÂN VIÊN</th><th>LOẠI TÀI KHOẢN</th><th></th></tr>
                        </thead>

                        <tbody>
                    
                            @foreach($acc as $acc)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$acc->username}}
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td class="center">
                             {{$acc->ID_NV}}
                            </td>
                            <td> {{$acc->TEN_LOAITK}}</td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>

                            <td style="display: none;">
                             
                            </td>

                            <td class="center">
                              <div class="hidden-sm hidden-xs action-buttons">
                                

                                <a class="green" username_edit="{{$acc->username}}" loaitk_edit="{{$acc->MA_LOAI_TK}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="deleteacc/{{$acc->username}}" onclick="return confirm('Do you want to delete ?')">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                              
                            </td>
                          </tr>@endforeach</tbody>
                      </table>
                    
                    </div>
                    </div>
                 
                  <!--POPUP TAB-->
                  <!--Add Department--> 
                <!-- Modal -->
      <div id="add_acc" class="modal fade" role="dialog">
               <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD ACC</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" role="form" " method="POST" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
        <p> <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">ACC USERNAME</label>
                      <div class="col-xs-12 col-sm-8">
                        <input type = "text" name = "username_add" class="width-100" id="username_add"> 
                                             
                              </div>
                            </div>  
                            <p style="color:red; margin-left:200px" class="username_add"></p> 
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">ID NHÂN VIÊN</label>
                    <div class="col-xs-12 col-sm-8">
                          <?php
                          $nv=DB::table('nhan_vien')->select('ID_NV','HO_TEN')->get();

                          ?>
                       <select name="id_add" id="id_add" class="width-100" type="text" value="{{old('value')}}">

                         @foreach($nv as $nv)
                        
                            <option value="{{$nv->ID_NV}}">{{$nv->HO_TEN}}</option>
                               
                          @endforeach
                       </select>
                    </div>
                    
                  </div>   
                  
                 <p style="color:red; margin-left:200px" class="id_add"></p> 
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">ACC TYPE</label>
                    <div class="col-xs-12 col-sm-8">
                          <?php
                          $loaitk=DB::table('loai_tai_khoan')->get();
                          ?>
                       <select name="loaitk_add" id="loaitk_add" class="width-100" type="text" value="">
                         @foreach($loaitk as $loaitk)
                            <option value="{{$loaitk->MA_LOAI_TK}}">{{$loaitk->TEN_LOAITK}}</option>
                          @endforeach
                       </select>
                    </div>
                    
                  </div>   
                 
            <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">PASSWORD</label>
                    <div class="col-xs-12 col-sm-8">
                        <input type = "password" name = "password_add" class="width-100" id="password_add">   
                    </div>
                   
                  </div>   
                 <p style="color:red;margin-left:200px;" class="password_add"></p>
      </div>
    
      <div class="modal-footer">
         <button type="button" class="btn btn-info" id="add" name="add">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button></form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
    <!--END DEPARTMENT TAB-->
 <!--POPUP TAB-->
                  <!--Edit Department--> 
                <!-- Modal -->
      <div id="edit_acc" class="modal fade" role="dialog">
               <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT ACC</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" role="form" " method="POST" action="{{url('editacc')}}" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
        <p> <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">USERNAME</label>
                      <div class="col-xs-12 col-sm-8">
                        <input type = "text" name = "username_edit" class="width-100" id="username_edit" readonly> 
                                             
                              </div>
                             
                            </div>   
                            
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">ACC TYPE</label>
                    <div class="col-xs-12 col-sm-8">
                          <?php
                          $loaitk=DB::table('loai_tai_khoan')->get();
                          ?>
                       <select name="loaitk_edit" id="loaitk_edit" class="width-100" type="text" >
                         @foreach($loaitk as $loaitk)
                            <option value="{{$loaitk->MA_LOAI_TK}}">{{$loaitk->TEN_LOAITK}}</option>
                          @endforeach
                       </select>
                    </div>
                    
                  </div>   
           </div></p>
      </div>
    
      <div class="modal-footer">
         <button type="submit" class="btn btn-info" id="edit" name="edit">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button></form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
    <!--END DEPARTMENT TAB-->

@stop