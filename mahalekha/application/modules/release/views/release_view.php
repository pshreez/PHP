

<div class="content">

    <h2> निकासा फारम : </h2>
    <h2> सम्झौता नम्बर-<?php echo $a_id; ?> </h2>
    <?php echo form_open("release/operate/$a_id"); ?>

    <div class="egridLayout" >
        <fieldset>
            <div class="edatagrid  " >
                <?php echo $list['RELEASE_NUM'][0]; ?> <?php echo $list['RELEASE_NUM'][1]; ?>

            </div>
            <div class="edatagrid  " >
                <?php echo $list['REFERENCE_NUM'][0]; ?> <?php echo $list['REFERENCE_NUM'][1]; ?>

            </div>
            <div class="edatagrid  " >
                <?php echo $list['BUD_YEAR'][0]; ?> <?php echo $list['BUD_YEAR'][1]; ?>

            </div>
            <div class="edatagrid " >
                <?php echo $list['ACC_CODE'][0]; ?> <?php echo $list['ACC_CODE'][1] . $list['ACC_CODE'][2]; ?>
            </div>

            <div class="edatagrid  " >
                <?php echo $list['RELEASE_EDATE'][0]; ?> <?php echo $list['RELEASE_EDATE'][1]; ?> <?php echo $list['RELEASE_NDATE'][0]; ?> 
            </div>

            <div class="edatagrid " >
                <?php echo $list['REMARKS'][0]; ?> <?php echo $list['REMARKS'][1]; ?>
            </div>
            
        </fieldset> 
        
        <div class="edatagrid2" >

            <table id="voucher" cellspacing="0"  >

                <thead cellpadding="0px">
                <td>सिर्सक </td>
                <td>सौर्चे </td>
                <?php if($adata[0]->INVESTOR_TYPE == 1): ?>     <td>दात्री पाक्छ</td> <?php endif;?>
                <td>रकम </td>
                </thead>
                
                <tbody cellpadding="10" >
                    <tr>
                        <td>
                            <?php echo $list['ECONOMIC_CODE5'][1]; ?></td>
                        <td>
                            <?php echo $list['SOURCE_TYPE_CODE'][0]; ?></td>
                        
                <?php if($adata[0]->INVESTOR_TYPE == 1): ?>    
                        <td>
                            <?php echo $list['DONOR_CODE'][0]; ?> </td>
                        
                   <?php endif;?>
                           <td> 
                            <?php echo $list['AMOUNT'][0]; ?></td>

                    </tr> 

                </tbody>                        
            </table>   
            <p id="add_field" style=""><a href="#"><span> Add more options.....</span></a></p>
            <div id="scroll"></div>
        </div>


        <?php echo form_submit('submit', 'submit'); ?>
<a href="<?php echo base_url() . 'reports/releaseReports/' ; ?>" class="anchorClick">print1s  </a>
    </div>

    <?php echo form_close() ?>
</div>


<script type="text/javascript">
    
    $(document).ready(function(){

        /****************** date conversion ********************/
        var  releaseEdate = 'releaseEdate';
        var releaseNdate = 'releaseNdate';
      
        dateToNep(releaseEdate,releaseNdate);
   
        /*******************************  budget head and project name autocomplete        ***************************/        
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
                 response( $.map(data, function (val) {
                     return {
                         project: val.PROJECT_EDESC,
                         accode: val.ACC_CODE
                     }
                 }));
                })
                }
                ,
            focus: function( ) {
                return false;
            },
            select: function( event,ui ){ 
               this.value = ui.item.accode;
               $("#autocomplete").attr("value",ui.item.project);
               return false;
            }
        })
        .data( "ui-autocomplete" )._renderItem = function( ul, item ) {
			return $( "<li>" )
				.append( "<a>" + item.project + /*"<br>" + item.accode +*/ "</a>" )
				.appendTo( ul );
		};
   
 
        /************************8addition of the items of donor,sources********************************/

        var economic='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['ECONOMIC_CODE5'][1]); ?>';
        var source='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['SOURCE_TYPE_CODE'][0]); ?> ';
        var donor='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['DONOR_CODE'][0]); ?> ';
        var amount = '<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['AMOUNT'][0]); ?>';
        var ifstart=' <?php echo $adata[0]->INVESTOR_TYPE ; ?>  '; 
          
        
        $('p#add_field').click(function(){
            var opts = $("#voucher tbody").children("tr").length;
            if(opts <10)
            {              
                $("#voucher tbody").append('<tr><td cellpadding="0">'+
                    economic+'</td><td>'+source+'</td><td class="donor">'+donor+'</td><td>'+amount+
                    '<a href="#" id="remove">X</a>'+'</td></tr>');
                if(ifstart == 0)
                    {
                        $("#voucher tbody tr .donor").remove();
                    }
                    else{
                        return false;
                    }
            }   
        });
    
        $("#voucher tbody tr td  #remove").live("click", function() {
            var link=$("#voucher tbody").find('tr:last,td:last').remove();
            if(link){         
                $("p#add_field").show();          
            }
    
        });
    
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
    
    


    });
       
  
</script>



