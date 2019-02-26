$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $('select[name="p"]').on('change', function(){
        var mapb = $(this).val();
        if(mapb) {
            $.ajax({
                url: 'getnv/'+mapb,
                type:"GET",
                dataType:"json",
                 beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="id_employee"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="id_employee"]').append('<option value="'+ value +'">' + value+ '</option>');

                    });

                },
               complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
        
            });
        } 
    });
     $('select[name="id_employee"]').on('change', function(){
        var mapb = $(this).val();
        if(mapb) {
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
            $.ajax({
                url: 'gettennv/'+mapb,
                type:"GET",
                dataType:"json",
                success:function(data) {
                   $.each(data, function(key, value){

                        $('#ten_employee').val(value);

                    });
               },
               complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
        
            });
        } 
    });

     $('select[name="id_employee"]').on('change', function(){
        var mapb = $(this).val();
        var thang=$("#thang").val();
        if(mapb) {
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
            $.ajax({
                url: 'gettienthuong/'+mapb+'/'+thang,
                type:"GET",
                dataType:"json",
                success:function(data) {
                  

                        $('#luong_thuong').val(data);

               },
               complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
        
            });
        } 
    });
$('select[name="id_employee"]').on('change', function(){
        var mapb = $(this).val();
        var thang=$("#thang").val();
        if(mapb) {
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
            $.ajax({
                url: 'gettienphat/'+mapb+'/'+thang,
                type:"GET",
                dataType:"json",
                success:function(data) {
                  

                        $('#luong_phat').val(data);

               },
               complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
        
            });
        } 
    });
 $('#add').click(function(e) {
      e.preventDefault();
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
      });
      $.ajax({
          'url' : 'getluong',
          'data': {
            'thang': $("#thang").val(),
            'id_employee':$("#id_employee").val(),
            'number':$("#number").val(),
            'hour':$("#hour").val(),
            'luong_du_an':$("#luong_du_an").val(),
            'luong_thuong':$("#luong_thuong").val(),
            'luong_phat':$("#luong_phat").val()

          },
          'type' : 'POST',
          success: function (data) {
            console.log(data);
            if (data.error == true) {
              $('.error').hide();
              if (data.message.id_employee != undefined) {
                $('.id_employee').show().text(data.message.id_employee[0]);
              }
              if (data.message.number != undefined) {
                $('.number').show().text(data.message.number[0]);
              }
              if (data.message.thang != undefined) {
                $('.thang').show().text(data.message.thang[0]);
              }
            }
              else {
                alert("Thêm mới thành công");
                window.location.href="http://localhost:81/hrm/dsluong";

              }
            } 
          
        });
    })
 })