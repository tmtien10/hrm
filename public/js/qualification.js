$(function() {
    $("#ad_q").button().click(function() {
      var qu=$("#q").val();
      var id=$("#id").val();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $.ajax({
                url: 'getqu/'+id+'/'+qu,
                type:"GET",
                dataType:"json",
                success:function(data) {
                	if(data==1){
                		alert('Added');
                		location.reload();
                	}
                	else alert('Qualification is available');
                }

                    });

      
  });
    $("#ad_s").button().click(function() {
      var sk=$("#s").val();
      alert(sk);
      var id=$("#id").val();
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $.ajax({
                url: 'getsk/'+id+'/'+sk,
                type:"GET",
                dataType:"json",
                success:function(data) {
                	if(data==1){
                		alert('Added');
                		location.reload();
                	}
                	else alert('Skill is available');
                }

                    });

      
  });

    $("#ad_p").button().click(function() {
      var pc=$("#pc").val();
      var id=$("#id").val();
      alert(pc);
     $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
});
     $.ajax({
                url: 'getpc/'+id+'/'+pc,
                type:"GET",
                dataType:"json",
                success:function(data) {
                  if(data==1){
                    alert('Added');
                    location.reload();
                  }
                  else alert('Available');
                }

                    });

      
  });
    
});