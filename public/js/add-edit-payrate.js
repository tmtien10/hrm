$(function() {
    $("#add").button().click(function() {
       
      
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $.ajax({
               'url': 'geths',
                'data':{
                  'id_add': $("#payrate_id_add").val(),
                  'name_add': $("#payrate_name_add").val(),
                },
                'type':'POST',
                
                success:function(data) {
                  console.log(data);
                	if(data==1){
                		alert('Added');
                    $("#payrate_id_add").val("");
                    $("#payrate_name_add").val("");
                   
                		location.reload();
                	}
                	else {
                     if (data.error == true) {
                      $('.error').hide();
                    if (data.message.id_add != undefined) {
                $('.payrate_id_add_error').show().text(data.message.id_add[0]);
                            }
                   if (data.message.name_add != undefined) {
                $('.payrate_name_add_error').show().text(data.message.name_add[0]);
                           }
                  
                  if (data.message.fee_add != undefined) {
                $('.payrate_fee_add_error').show().text(data.message.fee_add[0]);
                           }
                  if (data.message.tl_add != undefined) {
                $('.payrate_tl_add_error').show().text(data.message.tl_add[0]);
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
        $("#edit_payrate").modal('show');
       $("#id_edit").val(id_edit);
       $("#name_edit").val(name_edit);
      
     });
      $("#edit").button().click(function() {
          $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
        $.ajax({
               'url': 'gethsedit',
                'data':{
                  'id_edit': $("#id_edit").val(),
                  'name_edit': $("#name_edit").val(),
                  'fee_edit':$("#payrate_fee_edit").val(),
                  'tl_edit':$("#payrate_tl_edit").val()
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
                $('.payrate_name_edit_error').show().text(data.message.name_edit[0]);
                           }
                    if (data.message.fee_edit != undefined) {
                $('.payrate_fee_edit_error').show().text(data.message.fee_edit[0]);
                           }
                     if (data.message.tl_edit != undefined) {
                $('.payrate_tl_edit_error').show().text(data.message.tl_edit[0]);
                           }
                  }
                }

                    }

      
  });
     });

});