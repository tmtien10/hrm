
$(function() {
    $('#add').click(function(e) {
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
      $.ajax({
          'url' : 'addtk',
          'data': {
            'username' : $('#username_add').val(),
            'id_nv' : $('#id_add').val(),
            'loai_tk':$('#loaitk_add').val(),
            'password':$('#password_add').val(),
          },
          'type' : 'POST',
          success: function (data) {
            console.log(data);
            if (data.error == true) {
              $('.error').hide();
              if (data.message.username != undefined) {
                $('.username_add').show().text(data.message.username[0]);
              }
              if (data.message.password != undefined) {
                $('.password_add').show().text(data.message.password[0]);
              }
              if (data.message.id_nv != undefined) {
                $('.id_add').show().text(data.message.id_nv[0]);
              }
              
            }
              else {
                alert("Added");
                window.location.href="http://localhost:81/hrm/dstk";

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
      
       var username_edit=$(this).attr('username_edit');
       var loaitk_edit=$(this).attr('loaitk_edit');
        $("#edit_acc").modal('show');
       $("#username_edit").val(username_edit);
       $("#loaitk_edit").val(loaitk_edit);
     });
  });





          //

