@extends('master.list')
@section('page-header')
<h1>
               Revenue payrate List
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/add-edit-categorieslabour.js') !!}"></script> 
 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li class="active">Revenue payrate List</li>

@stop
@section('content')



                  <div class="col-xs-12">

                    <div class="clearfix">
                      <a href="" data-toggle="modal" data-target="#add_payrate">+ Add payrate</a>
                      <div class="pull-right tableTools-container">
                        </div>
                    </div>
                    <div class="table-header">
                      Results for "payrate List"
                  </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                              payrate_ID
                            </th><th class="center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Payrate</th><th></th></tr>
                        </thead>

                        <tbody>
                    
                            @foreach($pb as $pb)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$pb->MA_HE_SO}}
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td class="center">
                             {{$pb->HE_SO}}
                            </td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>

                            <td style="display: none;">
                             
                            </td>

                            <td class="center">
                              <div class="hidden-sm hidden-xs action-buttons">
                                

                                <a class="green" id_edit="{{$pb->MA_HE_SO}}" name_edit="{{$pb->HE_SO}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="deletehs/{{$pb->MA_HE_SO}}" onclick="return confirm('Do you want to delete ?')">
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
      <div id="add_payrate" class="modal fade" role="dialog">
               <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">ADD Payrate</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" role="form" " method="POST" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
        <p> <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Payrate ID</label>
                      <div class="col-xs-12 col-sm-8">
                        <input type = "text" name = "id_add" class="width-100" id="payrate_id_add"> 
                                             
                              </div>
                             
                            </div>   
                             <p style="color:red;" class="payrate_id_add_error"></p>
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Payrate</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="name_add" id="payrate_name_add" class="width-100" type="text" value="">
                    </div>
                    
                  </div>   
                   <p style="color:red;" class="payrate_name_add_error"></p>
          
      </div>
    
      <div class="modal-footer">
         <button type="button" class="btn btn-info" id="add" name="add">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button></form>
        <button type="reset" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>

  </div>
</div>
    <!--END DEPARTMENT TAB-->
 <!--POPUP TAB-->
                  <!--Edit Department--> 
                <!-- Modal -->
      <div id="edit_payrate" class="modal fade" role="dialog">
               <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">EDIT Payrate</h4>
      </div>
      <div class="modal-body">
              <form class="form-horizontal" role="form" " method="POST" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
        <p> <div class="form-group has-info">
                      <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Payrate  ID</label>
                      <div class="col-xs-12 col-sm-8">
                        <input type = "text" name = "id_edit" class="width-100" id="id_edit" readonly> 
                                             
                              </div>
                             
                            </div>   
                            
          <div class="form-group has-info">
                    <label class="col-xs-12 col-sm-3 control-label no-padding-right" for="form-field-1">Payrate name</label>
                    <div class="col-xs-12 col-sm-8">
                          
                       <input name="name_edit" id="name_edit" class="width-100" type="text" value="">
                    </div>
                    
                  </div>   
                   <p style="color:red;" class="payrate_name_edit_error"></p>
          </div>
    
      <div class="modal-footer">
         <button type="button" class="btn btn-info" id="edit" name="edit">
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