
<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','LoginController@getLogin' );
Auth::routes();
Route::post('login', 'LoginController@postLogin');
Route::get('logout', 'LoginController@logout');

Route::get('index', 'LoginController@getIndex')->name('index');
Route::post('change', 'UserController@ChangePass');
//control quản lí nhân viên--
Route::group(['middleware' => 'auth'], function () {
Route::get('dsnv', 'EmployeeController@getList');
Route::get('addnv', 'EmployeeController@addemployview');
Route::post('addnewnv', 'EmployeeController@addemployee');
Route::get('editnv/{ID_NV}', 'EmployeeController@editemployview');
Route::post('editnv/{ID_NV}', 'EmployeeController@editemploy');
Route::get('delete/{ID_NV}', 'EmployeeController@destroy');
Route::post('gethuyen', 'EmployeeController@getHuyen');
Route::post('getxa/', 'EmployeeController@getXa');
Route::get('editnv/gethuyen/{matp}', 'EmployeeController@getHuyen');
Route::get('editnv/getxa/{maqh}', 'EmployeeController@getXa');
Route::get('editnv/deletecv/{ID_NV}/{MA_CV}', 'EmployeeController@destroycv');
Route::post('addposition', 'EmployeeController@addposition');
Route::post('editposition', 'EmployeeController@editposition');

//control phòng ban+bằng cấp+skill
Route::get('dspb', 'HomeController@getList_Department');
Route::POST('getdep', 'HomeController@Add_Department');
Route::POST('getdepedit', 'HomeController@Edit_Department');
Route::get('deletepb/{MA_PB}', 'HomeController@Delete_Department');

Route::get('dscv', 'HomeController@getList_Position');
Route::POST('getpo', 'HomeController@Add_Position');
Route::POST('getpoedit', 'HomeController@Edit_Position');
Route::get('deletecv/{MA_CV}', 'HomeController@Delete_Position');

Route::get('dsbc', 'HomeController@getList_Qualification');
Route::POST('getqu', 'HomeController@Add_Qualification');
Route::get('deletequ/{MA_BC}', 'HomeController@Delete_Qualification');

Route::get('dskn', 'HomeController@getList_Skill');
Route::POST('getskill', 'HomeController@Add_Skill');
Route::get('deleteskill/{MA_KN}', 'HomeController@Delete_Skill');

Route::get('dsloaitk', 'AccController@getList_Acctype');
Route::POST('getloaitk', 'AccController@Add_Acctype');
Route::POST('getloaitkedit', 'AccController@Edit_Acctype');
Route::get('deleteloaitk/{MA_ACC}', 'AccController@Delete_Acctype');

Route::get('dspc', 'HomeController@getList_Allowance');
Route::POST('getpc', 'HomeController@Add_Allowance');
Route::POST('getpcedit', 'HomeController@Edit_Allowance');
Route::get('deletepc/{MA_PHU_CAP}', 'HomeController@Delete_Allowance');

Route::get('dsgt', 'HomeController@getList_Deductions');
Route::POST('getgt', 'HomeController@Add_Deductions');
Route::POST('getgtedit', 'HomeController@Edit_Deductions');
Route::get('deletegt/{MA_GIAM_TRU}', 'HomeController@Delete_Deductions');

Route::get('dshs', 'HomeController@getList_PayRate');
Route::POST('geths', 'HomeController@Add_PayRate');
Route::POST('gethsedit', 'HomeController@Edit_PayRate');
Route::get('deletehs/{MA_HE_SO}', 'HomeController@Delete_PayRate');

Route::get('dslhd', 'HomeController@getList_categorieslabour');
Route::POST('getlhd', 'HomeController@Add_categorieslabour');
Route::POST('getlhdedit', 'HomeController@Edit_categorieslabour');
Route::get('deletelhd/{MA_LOAI_HD}', 'HomeController@Delete_categorieslabour');


Route::get('dsluong', 'SalaryController@getList_Salary');
Route::get('getnv/{mapb}','SalaryController@getid_employee');
Route::get('gettennv/{mapb}','SalaryController@getten_employee');
Route::get('gettienthuong/{mapb}/{thang}','SalaryController@tienthuong');
Route::get('gettienphat/{mapb}/{thang}','SalaryController@tienphat');


Route::post('getluong','SalaryController@get_salary');
Route::get('getslip/{STT}','SalaryController@get_payslip');
Route::get('delslip/{STT}','SalaryController@del_payslip');

Route::get('pdf/{STT}','SalaryController@print_pdf');

Route::get('dstk/','AccController@get_Acc');
Route::post('addtk','AccController@add_acc');
Route::post('editacc','AccController@Edit_acc');
Route::get('deleteacc/{username}','AccController@Delete_acc');

Route::get('addhopdong/',function(){


	return view('hopdong');
});
Route::post('posthd','HopdongController@add_hop_dong');
Route::get('edithopdong/{STT}','HopdongController@edit_hop_dong_view');
Route::post('edithd','HopdongController@edit_hop_dong');
Route::get('delhopdong/{STT}','HopdongController@destroy');

Route::get('dshopdong','HopdongController@getlist');
Route::get('dskhenthuong','EmployeeController@get_list_khen_thuong');
Route::get('dskhenthuong/addkhenthuong', function(){

	return view('khenthuong'); });
Route::get('dskhenthuong/getnv/{mapb}','SalaryController@getid_employee');
Route::post('addkt','EmployeeController@them_khen_thuong');
Route::get('editkt/{MA_QD_KT}','EmployeeController@view_khen_thuong');
Route::get('editkt/getnv/{mapb}','SalaryController@getid_employee');
Route::post('updatekt','EmployeeController@edit_khen_thuong');
Route::get('deletekt/{MA_QD_KT}','EmployeeController@del_khen_thuong');

Route::get('dskiluat','EmployeeController@get_list_ki_luat');
Route::get('dskiluat/addkiluat', function(){

	return view('kiluat'); });
Route::get('dskiluat/getnv/{mapb}','SalaryController@getid_employee');
Route::post('addkl','EmployeeController@them_ki_luat');
Route::get('editkl/{MA_KL}','EmployeeController@view_ki_luat');
Route::get('editkl/getnv/{mapb}','SalaryController@getid_employee');
Route::post('updatekl','EmployeeController@edit_ki_luat');
Route::get('deletekl/{MA_KL}','EmployeeController@del_ki_luat');

Route::get('dsthongke','ThongKeController@view' );
Route::get('dsthongkeluong','ThongKeController@luong_view' );

Route::post('tkhd','ThongKeController@thong_ke_hop_dong');
Route::post('tkluong','ThongKeController@thong_ke_luong');

});
Route::get('/test', function(){

	return view('e');
});