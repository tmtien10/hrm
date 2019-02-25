$(function() {
    $("#add").button().click(function() {
       
      var id=$("#deductions_id_add").val();
      var name=$("#deductions_name_add").val();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $.ajax({
               'url': 'getgt',
                'data':{
                  'id_add': $("#deductions_id_add").val(),
                  'name_add': $("#deductions_name_add").val(),
                  'fee_add':$("#deductions_fee_add").val(),
                  'tl_add':$("#deductions_tl_add").val()
                },
                'type':'POST',
                
                success:function(data) {
                  console.log(data);
                	if(data==1){
                		alert('Added');
                    $("#deductions_id_add").val("");
                    $("#deductions_name_add").val("");
                    $("#deductions_fee_add").val("");
                    $("#deductions_tl_add").val("");
                		location.reload();
                	}
                	else {
                     if (data.error == true) {
                      $('.error').hide();
                    if (data.message.id_add != undefined) {
                $('.deductions_id_add_error').show().text(data.message.id_add[0]);
                            }
                   if (data.message.name_add != undefined) {
                $('.deductions_name_add_error').show().text(data.message.name_add[0]);
                           }
                  
                  if (data.message.fee_add != undefined) {
                $('.deductions_fee_add_error').show().text(data.message.fee_add[0]);
                           }
                  if (data.message.tl_add != undefined) {
                $('.deductions_tl_add_error').show().text(data.message.tl_add[0]);
                           }
                  }
                }

                    }

      
  });
   });
   
      $(".green").on('click', function(){
         $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
            });
      
       var id_edit=$(this).attr('id_edit');
       var name_edit=$(this).attr('name_edit');
       var fee_edit=$(this).attr('fee_edit');
       var tl_edit=$(this).attr('tl_edit');
        $("#edit_deductions").modal('show');
       $("#id_edit").val(id_edit);
       $("#name_edit").val(name_edit);
       $("#deductions_fee_edit").val(fee_edit);
       $("#deductions_tl_edit").val(tl_edit);
     });
      $("#edit").button().click(function() {
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
               'url': 'getgtedit',
                'data':{
                  'id_edit': $("#id_edit").val(),
                  'name_edit': $("#name_edit").val(),
                  'fee_edit':$("#deductions_fee_edit").val(),
                  'tl_edit':$("#deductions_tl_edit").val()
                },
                'type':'POST',
                
                success:function(data) {
                  console.log(data);
                  if(data==1){
                    alert('Update');

                    location.reload();
                  }
                  else {
                     if (data.error == true) {
                      $('.error').hide();
                     if (data.message.name_edit != undefined) {
                $('.deductions_name_edit_error').show().text(data.message.name_edit[0]);
                           }
                    if (data.message.fee_edit != undefined) {
                $('.deductions_fee_edit_error').show().text(data.message.fee_edit[0]);
                           }
                     if (data.message.tl_edit != undefined) {
                $('.deductions_tl_edit_error').show().text(data.message.tl_edit[0]);
                           }
                  }
                }

                    }

      
  });
     });

});