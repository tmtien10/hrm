@extends('master.list')
@section('page-header')
<h1>
               Danh sách HỢP ĐỒNG
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/add-edit-categorieslabour.js') !!}"></script> 
 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li class="active">Danh sách HỢP ĐỒNG</li>

@stop
@section('content')



                  <div class="col-xs-12">

                    <div class="clearfix">
                      <a href="addhopdong"> +  Add HỢP ĐỒNG</a>
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
                            Mã hợp đồng
                            </th><th class="center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">ID Nhân viên</th><th>Hình thức làm việc</th><th>Loại hợp đồng</th><th></th></tr>
                        </thead>

                        <tbody>
                    
                            @foreach($hd as $hd)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$hd->MA_HD}}
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td class="center">
                             {{$hd->ID_NV}}
                            </td>
                            <td>{{$hd->HINH_THUC_LAM_VIEC}}</td>
                            
                         <td> {{$hd->TEN_LOAI_HD}}</td>
                         <td style="display: none;"></td>

                            <td style="display: none;">
                             
                            </td>

                            <td class="center">
                              <div class="hidden-sm hidden-xs action-buttons">
                                

                                <a class="green" href="edithopdong/{{$hd->MA_HD}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a href="#" data-href="delhopdong/{{$hd->MA_HD}}" data-toggle="modal" data-target="#confirm-delete" class="red">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                              
                            </td>
                          </tr>@endforeach</tbody>
                      </table>
                    
                    </div>
                    </div>
                 
         
</div>
    <!--END DEPARTMENT TAB-->

    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE!</h5>
                                          </div>
                                          <div class="modal-body">
                                           Do you want to delete?
                                          </div>
                                          <div class="modal-footer">
                                             <a class="btn btn-danger btn-ok">Delete</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
        <script>
        $( document ).ready( function( )
{
         $('#confirm-delete').on('show.bs.modal', function(e) {
       $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
}); 
       });
    </script>

@stop