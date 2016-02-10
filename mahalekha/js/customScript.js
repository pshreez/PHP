  /************************** english to nepali date conversion ****************************/     
        
        function dateToNep(eng,nep){
         
            $( "#"+eng ).bind( "keyup", function( event ) {
                if(event.which == 13){
                    event.preventDefault();
                }
                var date=$(this).val();
                var fullUrl ="<?php echo base_url() . 'agreement/engTonepDate/'; ?>"+date;
                $.get(fullUrl,{engdate:date},function(data){
                    var date =$.parseJSON(data);
                    $("#"+nep).attr("value",date.date);
                });
            });
        }


