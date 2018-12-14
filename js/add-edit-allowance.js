$(function() {
    $("#add").button().click(function() {
       
      var id=$("#allowance_id_add").val();
      var name=$("#allowance_name_add").val();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $.ajax({
               'url': 'getpc',
                'data':{
                  'id_add': $("#allowance_id_add").val(),
                  'name_add': $("#allowance_name_add").val(),
                  'fee_add':$("#allowance_fee_add").val()
                },
                'type':'POST',
                
                success:function(data) {
                  console.log(data);
                	if(data==1){
                		alert('Added');
                    $("#allowance_id_add").val("");
                    $("#allowance_name_add").val("");
                    $("#allowance_fee_add").val("");
                		location.reload();
                	}
                	else {
                     if (data.error == true) {
                      $('.error').hide();
                    if (data.message.id_add != undefined) {
                $('.allowance_id_add_error').show().text(data.message.id_add[0]);
                            }
                   if (data.message.name_add != undefined) {
                $('.allowance_name_add_error').show().text(data.message.name_add[0]);
                           }
                  
                  if (data.message.fee_add != undefined) {
                $('.allowance_fee_add_error').show().text(data.message.fee_add[0]);
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
        $("#edit_allowance").modal('show');
       $("#id_edit").val(id_edit);
       $("#name_edit").val(name_edit);
       $("#allowance_fee_edit").val(fee_edit);
     });
      $("#edit").button().click(function() {
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
               'url': 'getpcedit',
                'data':{
                  'id_edit': $("#id_edit").val(),
                  'name_edit': $("#name_edit").val(),
                  'fee_edit':$("#allowance_fee_edit").val()
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
                $('.allowance_name_edit_error').show().text(data.message.name_edit[0]);
                           }
                     if (data.message.fee_edit != undefined) {
                $('.allowance_fee_edit_error').show().text(data.message.fee_edit[0]);
                           }
                  }
                }

                    }

      
  });
     });

});