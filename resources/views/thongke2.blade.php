@extends('master.list')
@section('page-header')
<h1>
             Thống kê lương
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/add-edit-acctype.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-3.0.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>

  <script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 

    <script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/jquery-ui.js')!!}"></script> 
<link href="{!!asset('css/jquery-ui.css')!!}" rel="stylesheet">   
 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
            <li>Thống kê</li>

      <li class="active"> Thống kê</li>

@stop
@section('content')

			 <div class="col-xs-14">
                   
                    <div class="clearfix">
                     
                         <div class="col-xs-12">
                         <form action="{{url('tkluong')}}" method="POST" enctype="multipart/form-data">{{ csrf_field() }}
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 

                     
                      <select class="width-10" name="th">
                        <option value="">Chọn </option>

                          <option value="LG" @if(old('th')=="LG") selected="" @endif>LƯƠNG</option>
                          <option value="BH" @if(old('th')=="BH") selected="" @endif>BẢO HIỂM</option>

                       
                      </select>
                     <input type="text"  name="thang"  id="thang" class="width-10" placeholder="Chọn tháng" value="{{old('thang')}}">
                     Từ
                    <input type="number" name="muc1" min="0" step="1000" class="width-10" value="{{old('muc1')}}">
                 Đến <input type="number" name="muc2" min="0" step="1000" class="width-10" value="{{old('muc2')}}">
                    <button class="btn btn-primary" type="submit">
                                 Thống kê
                                </button>
                      </form>
                      </div>
                      <div class="col-xs-12">
                      <div class="pull-right tableTools-container"></div>
                        </div>
                    </div>
                    <div class="table-header">
                      Results for "Thống kê"
                  </div>
                 </div>
             

                    <!-- div.dataTables_borderWrap -->
                      
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                           ID NHÂN VIÊN
                            </th><th>HỌ TÊN</th><th>PHÒNG BAN</th><th class="hidden-480">THÁNG</th><th class="hidden-480">LƯƠNG THỰC LÃNH</th><th class="hidden-480">THUẾ</th><th class="hidden-480">PHÍ BẢO HIỂM</th><th></th></tr>
                        </thead>

                         @if(isset($luong))
                          
                        <tbody>
                    
                            @foreach($luong as $luong)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$luong->ID_NV}}
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td class="center">
                             {{$luong->HO_TEN}}
                            </td>
                            <td>{{$luong->TEN_PB}}</td>
                            <td class="hidden-480" >{{$luong->THANG}}</td>
                            <td class="hidden-480">{{number_format($luong->TONG_LUONG_SAU_KHAU_TRU)}}</td>
                            <td class="hidden-480">{{number_format($luong->THUE_TNCN)}} </td>
                            <td class="hidden-480">{{number_format($luong->PHI_BAO_HIEM)}} </td>
                          </tr>

                        @endforeach</tbody>
                         @endif  
                      </table>
                    
    </div>
 <script type="text/javascript">
            $('#thang').datepicker( {
            changeMonth: true,
            changeYear: true,
  
            dateFormat: 'yy-mm',
            
            });
            </script>  
@stop