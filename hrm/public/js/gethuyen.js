
$(function() {
    $('#tinh').on('change',function(e) {
      var tinh=$('#tinh').val();
      alert('hello');
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
      $.ajax({
          'url' : 'gethuyen',
          'data': {
            'tinh' : $('#tinh').val(),
  
          },
          'type' : 'POST',
          success: function (data) {
            console.log(data);
            if (data.error == true) {
              $('.error').hide();
              if (data.response.matp!= undefined) {
               $("#tinh").append('<option value="' + data.response.matp + '">' + data.response.matp + '</option>');
              }
              
            }
              else {
                alert("Lỗi");
               

              }
            } 
          
        });
    })
  });





          //

