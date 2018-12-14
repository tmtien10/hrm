
$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $('select[name="tinh"]').on('change', function(){
        var matp = $(this).val();
        if(matp) {
            $.ajax({
                url: 'gethuyen/'+matp,
                type:"GET",
                dataType:"json",
                 beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="quan"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="quan"]').append('<option value="'+ value +'">' + key+ '</option>');

                    });

                },
               complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
        
            });
        } 
    });
 });

$(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});

         $('select[name="quan"]').on('change', function(){
        var maqh = $(this).val();
        if(maqh) {
            $.ajax({
                url: 'getxa/'+maqh,
                type:"GET",
                dataType:"json",
                 beforeSend: function(){
                    $('#loader').css("visibility", "visible");
                },

                success:function(data) {

                    $('select[name="xa"]').empty();

                    $.each(data, function(key, value){

                        $('select[name="xa"]').append('<option value="'+ key +'">' + value+ '</option>');

                    });

                },
               complete: function(){
                    $('#loader').css("visibility", "hidden");
                }
        
            });
        } 
    });

});



          //

