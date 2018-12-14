@extends('master.list')
@section('page-header')
<h1>
               Danh sách nhân viên
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li class="active">Danh sách nhân viên</li>

@stop
@section('content')


<div class="row">

                  <div class="col-xs-12">
                    <div class="clearfix">
                       <a href="addnv">+ Thêm mới nhân viên </a>
                      <div class="pull-right tableTools-container">

                    </div></div>
                    <div class="table-header">
                      Results for "Danh sách nhân viên"
                  </div>


                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="">
                              ID</th>
                            <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Họ tên</th>
                            <th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Giới tính</th>
                            <th class="hidden-480" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">Ngày vào làm</th>
                            <th class="hidden-480" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label=""> Email</th>
                              
                              <th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th></tr>
                        </thead>

                        <tbody>
                    
                            @foreach($nv as $nav)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$nav->ID_NV}}
                              </label>
                            </td>

                            <td>
                              {{$nav->HO_TEN}}
                            </td>
                            <td>{{$nav->GIOI_TINH}}</td>
                            <td class="hidden-480" >{{$nav->NGAY_VAO_LAM}}</td>
                            <td class="hidden-480" >{{$nav->EMAIL}}</td>
                             <td style="display: none;"></td>

                            <td>
                              <div class="hidden-sm hidden-xs action-buttons">
                                <a class="blue" href="editnv/{{$nav->ID_NV}}">
                                  <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                </a>

                                <a class="green" href="editnv/{{$nav->ID_NV}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>
  
                                <a href="#" data-href="delete/{{$nav->ID_NV}}" data-toggle="modal" data-target="#confirm-delete" class="red">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>
                              
                            </td>
                          </tr>
                        @endforeach</tbody>
                      </table>
                    </div>
                    </div>

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
</div>
@stop