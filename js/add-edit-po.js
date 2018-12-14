$(function() {
    $("#add").button().click(function() {
       
      var id=$("#position_id_add").val();
      var name=$("#position_name_add").val();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $.ajax({
               'url': 'getpo',
                'data':{
                  'id_add': $("#position_id_add").val(),
                  'name_add': $("#position_name_add").val()
                },
                'type':'POST',
                
                success:function(data) {
                  console.log(data);
                	if(data==1){
                		alert('Added');
                		location.reload();
                	}
                	else {
                     if (data.error == true) {
                      $('.error').hide();
                    if (data.message.id_add != undefined) {
                $('.position_id_add_error').show().text(data.message.id_add[0]);
                            }
                   if (data.message.name_add != undefined) {
                $('.position_name_add_error').show().text(data.message.name_add[0]);
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
        $("#edit_position").modal('show');
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
               'url': 'getpoedit',
                'data':{
                  'id_edit': $("#id_edit").val(),
                  'name_edit': $("#name_edit").val()
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
                $('.position_name_edit_error').show().text(data.message.name_edit[0]);
                           }
                  }
                }

                    }

      
  });
     });

});