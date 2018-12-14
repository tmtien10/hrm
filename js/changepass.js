
$(function() {
    $('#save_pass').click(function(e) {
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
      $.ajax({
          'url' : 'change',
          'data': {
            'old_pass' : $('#old_pass').val(),
            'new_pass' : $('#new_pass').val()
          },
          'type' : 'POST',
          success: function (data) {
            console.log(data);
            if (data.error == true) {
              $('.error').hide();
              if (data.message.old_pass != undefined) {
                $('.errorold_pass').show().text(data.message.old_pass[0]);
              }
              if (data.message.new_pass != undefined) {
                $('.errornew_pass').show().text(data.message.new_pass[0]);
              }
              if (data.message.errorpass != undefined) {
                $('.errorpass').show().text(data.message.errorpass[0]);
              }
            }
              else {
                alert("Đổi mật khẩu thành công. Vui lòng đăng nhập lại");
                window.location.href="http://localhost:81/hrm/";

              }
            } 
          
        });
    })
  });





          //

