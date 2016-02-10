<div class="content">

    <h2> ग्वोस्वारा वौचेर </h2>
    <div class="egridLayout" >
        
        <fieldset>
            
            <div class="edatagrid " >
                <?php //echo form_input('username',set_value('username','full name'));?>
                <?php echo $list['ACC_CODE'][0]; ?> <?php echo $list['ACC_CODE'][1] . $list['ACC_CODE'][2]; ?>
            </div>
            
            <div class="edatagrid  " >
                <?php echo $list['VOUCHER_NUM'][0]; ?> <?php echo $list['VOUCHER_NUM'][1]; ?>
            </div>
            
            <div class="edatagrid" >
                <?php echo $list['VOUCHER_EDATE'][0];  ?> <?php echo $list['VOUCHER_EDATE'][1]; ?> <?php echo $list['VOUCHER_NDATE'][0]; ?> 
            </div>

         
            
            <div class="edatagrid " >
                <?php echo $list['REMARKS'][0]; ?> <?php echo $list['REMARKS'][1]; ?>
            </div>
            
        </fieldset> 
        <div class="edatagrid2" >

            <table id="voucher" cellspacing="0"  >

                <thead cellpadding="0px">
                <td>type</td>
                <td>सिर्सक </td>
                <td>सौर्चे </td>
                <td>दात्री पाक्छ</td>
                <td>रकम </td>
                <td>डे /क्र </td></thead>
                <tbody cellpadding="10" >
                    <tr>
                        <td cellpadding="0">
                            <?php echo $list['TRANSIT'][0]; ?></td>
                        <td>
                            <?php echo $list['ECONOMIC_CODE5'][1]; ?></td>
                        <td>
                            <?php echo $list['SOURCE_TYPE_CODE'][0]; ?></td>
                        <td>
                            <?php echo $list['DONOR_CODE'][0]; ?> </td>
                        <td>
                            <?php echo $list['AMOUNT'][0]; ?></td>
                        <td>
                            <?php echo $list['AMOUNT_TYPE'][0]; ?></td>                                                                                                                                                
                    </tr> 
                    <tr>
                        <td>
                            <?php echo $list['TRANSIT'][0]; ?></td>
                        <td>
                            <?php echo $list['ECONOMIC_CODE5'][1]; ?></td>
                        <td> 
                            <?php echo $list['SOURCE_TYPE_CODE'][0]; ?> </td>
                        <td> 
                            <?php echo $list['DONOR_CODE'][0]; ?></td>
                        <td>
                            <?php echo $list['AMOUNT'][0]; ?>  </td>
                        <td> 
                            <?php echo $list['AMOUNT_TYPE'][0]; ?></td>
                    </tr>
                </tbody>                        
            </table>   
            <p id="add_field"><a href="#"><span> Add more options.....</span></a></p>
            <ul class="amount edatagrid" class="edatagrid ">
                <li>   <label>DEBIT:</label><input type="text" id="debit"></li>
                <li>   <label>CREDIT:</label>  <input type="text" id="credit"></li>
            </ul>
        </div>
    </div>
    
</div>


<script type="text/javascript">


    
    $(document).ready(function(){
         
        onchange();
     /***************** date conversion *******************************/
     var voucherEdate = 'voucherEdate';
     var voucherNdate = 'voucherNdate';
     
     dateToNep(voucherEdate,voucherNdate);
     
    /******************project load ****************************/
        $( "#typeauto" ).bind( "keyup", function( event ) {
            if ( event.keyCode === $.ui.keyCode.TAB &&
                $( this ).data( "ui-autocomplete" ).menu.active ) {
                event.preventDefault();
            }
        })
        .autocomplete({
            minLength: 0,
            source: function( request, response ) {
                $.getJSON("<?php echo base_url() . 'release/gets/'; ?>"+$("#typeauto").val(),function(data){
                    var account =[];
                    var project =[];
                    $.each(data,function(i,val){
                        account.push(val.ACC_CODE);
                        project.push(val.PROJECT_EDESC);    
                    });
                    response( project );
                });
            },
            focus: function() {
                // prevent value inserted on focus
                return false;
            },
            select: function( event,project ){ //{{"item":{"label":"Department of Commerce","value":"Department of Commerce"}}
                var project=project.item.value;
                $("#autocomplete").attr("value",project);
                return false;
            }
        });
    });
    
/**************************ADDITION OF THE ROWS FOR THE VOUCHER*******************************/


    var transit ='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['TRANSIT'][0]); ?>';   
    var economic='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['ECONOMIC_CODE5'][1]); ?>';
    var source='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['SOURCE_TYPE_CODE'][0]); ?> ';
    var donor='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['DONOR_CODE'][0]); ?> ';
    var amount = '<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['AMOUNT'][0]); ?>';
    var amountt = '<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['AMOUNT_TYPE'][0]); ?> ';

    $('p#add_field').click(function(){     //CLICKING THE ADDMORE VOUCHER ITEMS
        var opts = $("#voucher tbody").children("tr").length;       
        if(opts <10)
        {
            $("#voucher tbody").append('<tr><td cellpadding="0">'+transit+'</td><td>'+
                economic+'</td><td>'+source+'</td><td>'+
                donor+'</td></td>'+donor+'</td><td>'+amount+
                '</td><td>'+amountt+'<a href="#" id="remove">X</a>'+'</td></tr>');                       
        }        
        onchange();         
    });
    
    $("#voucher tbody tr td  #remove").live("click", function() {
        var link=$("#voucher tbody").find('tr:last,td:last').remove();
        if(link){         
            $("p#add_field").show();          
        }
    
    });
  
/******************* DISABLE THE DROPDOWN BOXES ***************************/
    function onchange(){ 
        $(".transit").change(function(){
    
            var transit = $(this).children(":selected").attr("value");
            if(transit == 1 ){ 
             
                $(this).closest('tr').find('.economic').attr("disabled",true);
                $(this).closest('tr').find('.source').attr("disabled",true);
                $(this).closest('tr').find('.donor').attr("disabled",true);             
           
            }
            if(transit == 0 ){ 
                $(this).closest('tr').find('.economic').removeAttr("disabled");
                $(this).closest('tr').find('.source').removeAttr("disabled");
                $(this).closest('tr').find('.donor').removeAttr("disabled");             
           
            }
        });
 /*********************ADDING AMOUNT*****************************/
        $(".amountType").change(function(){
            var amountType =$(this).children(":selected").attr("value");
            var str =$(this).closest('tr').find('.amounts').val();
            if(amountType == 'd' ){
                $("#debit").attr('value',str) ;
                    
                    }
            if(amountType == 'c' )
                $("#credit").attr('value',str); 
            
        });
        
        
        $(".amounts").keyup(function(){
            var str =$(this).val();
            var amountType = $(this).closest('tr').find('.amountType').val();              
            if(amountType == 'd' )
                $("#debit").attr('value',str);
            if(amountType == 'c' )
                $("#credit").attr('value',str);                          
        });
    }
    

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
                    $("#"+nep).css("color","#cococo");
                    $("#"+nep).css("background","lavender");
                    $( "#"+eng ).css("background","lavender");
                });
            });
        }
    
   
    
        
  
</script>