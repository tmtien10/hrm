@extends('master.list')
@section('content')


									<div class="col-xs-12">

										<div class="clearfix">
											<div class="pull-right tableTools-container">
												</div>
										</div>
										<div class="table-header">
											Results for "Latest Registered Domains"
									</div>

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											
											<table id="dynamic-table" class="table table-striped table-bordered table-hover dataTable no-footer" role="grid" aria-describedby="dynamic-table_info">
												<thead>
													<tr role="row"><th class="center sorting_disabled" rowspan="1" colspan="1" aria-label="">
															ID
														</th><th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Domain: activate to sort column ascending">Họ tên</th><th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Price: activate to sort column ascending">Giới tính</th><th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Clicks: activate to sort column ascending">Ngày vào làm</th><th class="sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="
															
															Update
														: activate to sort column ascending">
															
															Email
														</th><th class="hidden-480 sorting" tabindex="0" aria-controls="dynamic-table" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending">Số điện thoại</th><th class="sorting_disabled" rowspan="1" colspan="1" aria-label=""></th></tr>
												</thead>

												<tbody>
										
														@foreach($nv as $nav)
													
												<tr role="row" class="odd">
														<td class="center">
															<label class="pos-rel">
																{{$nav->ID_NV}}
																<span class="lbl"></span>
															</label>
														</td>

														<td>
															{{$nav->HO_TEN}}
														</td>
														<td>{{$nav->GIOI_TINH}}</td>
														<td >{{$nav->NGAY_VAO_LAM}}</td>
														<td>{{$nav->EMAIL}}</td>

														<td>
															{{$nav->SDT}}
														</td>

														<td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="blue" href="#">
																	<i class="ace-icon fa fa-search-plus bigger-130"></i>
																</a>

																<a class="green" href="#">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red" href="#">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
															</div>

															
														</td>
													</tr>@endforeach</tbody>
											</table>
										
										</div>
										</div>
									</div>
								


@stop