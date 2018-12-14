@extends('master.list')
@section('page-header')
<h1>
               Qualification List
               
              </h1>
@stop
@section('script')
<script type="text/javascript" src="{!! asset('js/jquery-1.9.1.js') !!}"></script> 
<script type="text/javascript" src="{!! asset('js/add-edit-po.js') !!}"></script> 
 <meta name="csrf-token" content="{{ csrf_token() }}"> 

@stop
@section('breadcrumb')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      <li class="active">Qulification List</li>

@stop
@section('content')



                  <div class="col-xs-12">
                    <form class="form-horizontal" role="form" action="{{url('getqu')}}" method="POST" enctype="multipart/form-data">
             <input type = "hidden" name = "_token" value = "<?php echo csrf_token(); ?>"> 
                    <input type="text" name="qu" value="{{old('qu')}}">
                   
                    <button type="submit" class="btn btn-info">Add</button></form>
                     @if($errors->has('qu'))
                      <p style="color:red">{{$errors->first('qu')}}</p>
                          @endif
                    <div class="clearfix">
                      
                      <div class="pull-right tableTools-container">
                        </div>
                    </div>
                    <div class="table-header">
                      Results for "Qualification List"
                  </div>

                    <!-- div.table-responsive -->

                    <!-- div.dataTables_borderWrap -->
                    <div>
                      
                      <table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
                        <thead>
                          <tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
                            STT
                            </th><th class="center sorting_disabled" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">QUALIFICATION NAME</th><th></th></tr>
                        </thead>
                        <?php  $i=0; ?>
                        <tbody>
                    
                            @foreach($pb as $pb)
                          
                        <tr role="row" class="odd">
                            <td class="center">
                              <label class="pos-rel">
                                {{$i=$i+1}}
                                <span class="lbl"></span>
                              </label>
                            </td>

                            <td class="center">
                             {{$pb->TEN_BC}}
                            </td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>
                            <td style="display: none;"></td>

                            <td style="display: none;">
                             
                            </td>

                            <td class="center">
                              <div class="hidden-sm hidden-xs action-buttons">
                                


                                <a class="red" href="deletequ/{{$pb->MA_BC}}" onclick="return confirm('Do you want to delete ?')">
                                  <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                </a>
                              </div>

                              
                            </td>
                          </tr>@endforeach</tbody>
                      </table>
                    
                    </div>
                    </div>
                

@stop