@extends('master.list')
@section('page-header')
<h1>
             Danh sách kỉ luật
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/add-edit-acctype.js') !!}"></script> 
 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li class="active">Danh sách kỉ luật</li>

@stop
@section('content')


                  <div class="col-xs-12">

                    <div class="clearfix">
                      <a href="dskiluat/addkiluat" data-toggle="modal" data-target="">+ Thêm mới kỉ luật</a>
                      <div class="pull-right tableTools-container">
                        </div>
                    </div>
                    <div class="table-header">
                      Results for "Danh sách kỉ luật"
                  </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                             Số quyết định
                            </th><th class="center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">ID nhân vien</th><th>Ngày quyết định</th><th class="hidden-480">Ngày thực hiện</th><th class="hidden-480">Mức phạt</th><th></th></tr>
                        </thead>

                        <tbody>
                    
                            @foreach($kl as $kl)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$kl->MA_KL}}
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td class="center">
                             {{$kl->ID_NV}}
                            </td>
                            <td>{{date("d-m-Y", strtotime($kl->NGAY_KI_KL))}}</td>
                            <td class="hidden-480">{{date("d-m-Y", strtotime($kl->NGAY_THUC_HIEN_KL))}}</td>
                            <td class="hidden-480">{{number_format($kl->MUC_PHAT)}}</td>

                            <td class="hidden">
                             
                            </td>

                            <td class="center">
                              <div class="hidden-sm hidden-xs action-buttons">
                                

                                <a class="green" href="editkl/{{$kl->MA_KL}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="deletekl/{{$kl->MA_KL}}" onclick="return confirm('Do you want to delete ?')">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>
                              <div class="hidden-md hidden-lg">
                                <div class="inline pos-rel">
                                  <a class="green" href="editkl/{{$kl->MA_KL}}">
                                  <i class="ace-icon fa fa-pencil bigger-130"></i>
                                </a>

                                <a class="red" href="deletekl/{{$kl->MA_KL}}" onclick="return confirm('Do you want to delete ?')">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div></div>
                            </td>
                          </tr>@endforeach</tbody>
                      </table>
                    
                    </div>
                    </div>
                 
                  

@stop