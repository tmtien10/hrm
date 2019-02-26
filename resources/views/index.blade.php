@extends('master.master')

@section('script')
<meta name="csrf-token" content="{{ csrf_token() }}">
<script type="text/javascript" src="{!! asset('js/jquery-3.0.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/jquery.min.js') !!}"></script>
<script type="text/javascript" src="{!! asset('js/changepass.js') !!}"></script>
@stop

@section('mucluc')
      <li><i class="ace-icon fa fa-home home-icon"></i><a href="/">Home</a></li>
      
@stop
@section('page-header')
        <h1>Thông tin tài khoản</h1>
@stop

@section('content')
   <div style="margin-left: 10px; margin-right: 10px">
    <div class="nhan_vien_tabs" role="tabpanel" data-example-id="togglable-tabs">
      <ul id="myTab" class="nav nav-tabs padding-18"" role="tablist">
        <li role="presentation" class="active">
          <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">
            <span><i class="green ace-icon fa fa-user bigger-120"></i>Thông tin tài khoản</span>
          </a>
        </li>
        <li role="presentation" class="next">
          <a href="#profile" id="profile-tab" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">
            <span class="text"><i class="blue ace-icon fa fa-key bigger-125"></i>Đặt lại password</span>
          </a>
        </li>
        </ul>
    </div>
    
      <div id="myTabContent" class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
          <p>
              @foreach($user as $user)
            <form method="POST" action="{{url('/change')}}" class="form-horizontal" role="form">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="row">
                            <div class="col-xs-12 col-sm-3 center">
                              <span class="profile-picture">
                                 @if($user->ANH_DAI_DIEN != '')
                           <img id="img" class="editable img-responsive" src="image/user/{{$user->ANH_DAI_DIEN}}" alt="{{$user->ANH_DAI_DIEN}}" width="200" /></center>
                              @else
                           <center><img class="editable img-responsive" src="image/user/noimage.png"  width="200"/>
                             @endif
                              </span>

                              <div class="space space-4"></div>

                              
                            </div><!-- /.col -->

                            <div class="col-xs-12 col-sm-9">
                              <h4 class="blue">
                                <span class="middle">{{$user->HO_TEN}}</span>

                                <span class="label label-purple arrowed-in-right">
                                  <i class="ace-icon fa fa-circle smaller-80 align-middle"></i>
                                  online
                                </span>
                              </h4>

                              <div class="profile-user-info">
                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Username </div>

                                  <div class="profile-info-value">
                                    <span>{{$user->username}}</span>
                                  </div>
                                </div>

                                <div class="profile-info-row">
                                  <div class="profile-info-name"> Phòng ban </div>
                                     <?php
                      $pb=DB::table('phong_ban')->where('MA_PB','=',$user->MA_PB)->select('TEN_PB')->first();

                  ?>
                                  <div class="profile-info-value">
                                    <i class="fa fa-map-marker light-orange bigger-110"></i>
                                    <span>{{$pb->TEN_PB}}</span>
                                    
                                  </div>
                                </div>                          
                                <div class="profile-info-row">
                                  <?php 
                                        date_default_timezone_set('Asia/Bangkok')
                                  ?>
                                  <div class="profile-info-name"> Bây giờ là</div>

                                  <div class="profile-info-value">
                                    <span>{{date('Y-m-d H:i:s')}}</span>
                                  </div>
                                </div>
                              </div>

                              <div class="hr hr-8 dotted"></div>

                              
                              </div>
                            </div><!-- /.col -->
                          @endforeach
          
                </form>
         
          </p>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                  <form class="form-horizontal" method="POST" action="">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                      <div id="resetpass">
                   
            
                    
                    
                 
                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right">Mật khẩu mới</label>
                   
                    <div class="col-sm-9">
                      <span class="input-icon">
                        <input id="new_pass" type="text" name="new_pass">
                        <i class="ace-icon fa fa-leaf blue"></i>
                      </span>
                        <p style="color:red;" class="errornew_pass"></p>
                    </div>
                  </div>

                  <div class="space-4"></div>

                  <div class="form-group">
                    <label class="col-sm-3 control-label no-padding-right" for="form-field-6">Mật khẩu cũ</label>
                    
                    <div class="col-sm-9">
                      <span class="input-icon">
                        <input id="old_pass" type="text" name="old_pass">
                        <i class="ace-icon fa fa-leaf blue"></i>
                    <p style="color:red;" class="errorpass"></p>
                    <p style="color:red;" class="errorold_pass"></p>
                    </div>
                  </div>


                  <div class="clearfix form-actions">
                    <div class="col-md-offset-3 col-md-9">
                      <button type="submit" id="save_pass" class="btn btn-info">
                        <i class="ace-icon fa fa-check bigger-110"></i>
                        Lưu
                      </button>

                      &nbsp; &nbsp; &nbsp;
                      <button type="reset" class="btn btn-danger" id="cancel">
                        <i class="ace-icon fa fa-close bigger-110"></i>
                        Hủy
                    </div>
                  </div>
                </span>
              </div>
                

                  </form>
                              
        </div>
@stop
