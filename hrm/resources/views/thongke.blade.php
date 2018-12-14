@extends('master.list')
@section('page-header')
<h1>
             Thống kê hợp đồng
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/add-edit-acctype.js') !!}"></script> 

 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li>Thống kê</li>

      <li class="active"> Thống kê hợp đồng</li>

@stop
@section('content')

           
                  <div class="col-xs-14">
                   
                    <div class="clearfix">
                     
                         <div class="col-xs-8">
                         <form action="{{url('tkhd')}}" method="POST" enctype="multipart/form-data" style="width:650px">{{ csrf_field() }}
                        <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 

                      <?php $lhd=DB::table('loai_hop_dong')->get();
                      ?>
                      <select class="width-10" name="loai_hop_dong">
                        <option value="">Chọn loại hợp đồng</option>

                        @foreach($lhd as $lhd)
                          <option value="{{$lhd->MA_LOAI_HD}}" @if($lhd->MA_LOAI_HD==old('loai_hop_dong')) selected @endif>{{$lhd->TEN_LOAI_HD}}</option>
                        @endforeach
                      </select>
                     <input type="date" class="width-10" name="ngay_bat_dau"  class="width-10" placeholder="Từ ngày" value="{{old('ngay_bat_dau')}}">
                    <input type="date" name="ngay_ket_thuc" placeholder="Đến ngày" value="{{old('ngay_ket_thuc')}}">
                    <button class="btn btn-primary" type="submit">
                                 Thống kê
                                </button>
                      </form>
                      </div>
                      <div class="col-xs-4">
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
                            MÃ HỢP ĐỒNG
                            </th><th class="center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">HỌ TÊN</th><th>PHÒNG BAN</th><tH>LOẠI HỢP ĐỒNG</th><th>NGÀY CÓ HIỆU LỰC</th><th>NGÀY KẾT THÚC</th></tr>
                        </thead>

                         @if(isset($hd))
                          
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
                             {{$hd->HO_TEN}}
                            </td>
                            <td>{{$hd->TEN_PB}}</td>
                            <td class="hidden-480" >{{$hd->TEN_LOAI_HD}}</td>
                            <td class="hidden-480">{{date("d-m-Y", strtotime($hd->THOI_GIAN_BAT_DAU))}}</td>
                            @if($hd->THOI_GIAN_KET_THUC==null)
                              <td class="hidden-480">{{$hd->THOI_GIAN_KET_THUC}} </td>
                            @else
                            <td class="hidden-480">{{date("d-m-Y", strtotime($hd->THOI_GIAN_KET_THUC))}} </td>
                            @endif
                            <td style="display: none;"></td>
                          </tr>

                        @endforeach</tbody>
                         @endif  
                      </table>
                    
                    </div>
 
@stop