$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $('.green').on('click', function(){
       var macv=$(this).attr('macv');
       var tencv=$(this).attr('tencv');
       var stime=$(this).attr('time_star');
       alert(stime);
       var etime=$(this).attr('time_end');
    
       $("#editcv").modal('show');
       $("#chucvu").val(tencv);
       $("#macv_edit").val(macv)
       $("#ngay_ket_thuc_edit").val(etime);
       $("#ngay_bat_dau_edit").val(stime);

});

 });