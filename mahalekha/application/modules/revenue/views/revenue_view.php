<h2>राजस्व</h2>
<div class="content">
    <?php echo form_open('revenue/operate'); ?>

    <div class="egridLayout" >
        <fieldset>
            <!----------------------------REVENUE MASTER TABLE---------------------------------------------------------------->

            <div class="edatagrid" >
                <?php echo $list['VOUCHER_EDATE'][0]; ?> <?php echo $list['VOUCHER_EDATE'][1]; ?>

                <?php echo $list['VOUCHER_NDATE'][0]; ?> </div>
            <div class="edatagrid" >
                <?php echo $list['VOUCHER_NUM'][0]; ?> <?php echo $list['VOUCHER_NUM'][1]; ?></div>
            <div class="edatagrid" >

                <?php echo $list['ACC_CODE'][0]; ?> <?php echo $list['ACC_CODE'][1] . $list['ACC_CODE'][2]; ?></div>

            <div class="edatagrid" >
                <?php echo $list['AGREEMENET_ID'][0]; ?> <?php echo $list['AGREEMENET_ID'][1]; ?></div>

            <div class="edatagrid" >
                <?php echo $list['CREATED_BY'][0]; ?> <?php echo $list['CREATED_BY'][1]; ?></div>

            <div class="edatagrid" >
                <?php echo $list['CREATED_DATE'][0]; ?> <?php echo $list['CREATED_DATE'][1]; ?></div>





        <fieldset>

<!--                <legend>राजस्व detail</legend>

                            <div class="edatagrid" >
                <?php echo $list['AMOUNT_EDESC'][0]; ?> <?php echo $list['AMOUNT_EDESC'][1]; ?>
                <?php echo $list['AMOUNT_NDESC'][0]; ?> 
                            </div>
                <div class="edatagrid" >
                    <?php echo $list['BANK_VOUCHER_NUM'][0]; ?> <?php echo $list['BANK_VOUCHER_NUM'][1]; ?>
                </div>
                <div class="edatagrid" >
                    <?php echo $list['BANK_VOUCHER_DATE'][0]; ?> <?php echo $list['BANK_VOUCHER_DATE'][1]; ?>
                </div>-->
                <div id="bankcode" align="center" >
                    <?php echo $list['BANK_CODE'][0]; ?> <?php echo $list['BANK_CODE'][1]; ?>
                </div>

            </fieldset>




        </fieldset> 

        <div class="edatagrid2" >

            <table id="voucher" cellspacing="0"  >

                <thead cellpadding="0px">
                <td>type</td>
                <td>सिर्सक </td>
                <td>सौर्चे </td>
                <td>दात्री पाक्छ</td>
                <td>रकम </td>
               <td>दे/करे</td>
                <td>बैंक भौचर नम्बर</td>
                <td>बैंक भौचर मिति </td>
               
                        
            
            </thead>
                <tbody cellpadding="0" >
                    <tr>
                        <td><?php echo $list['TRANSIT'][0]; ?></td>
                        <td ><?php echo $list['ECONOMIC_CODE5'][0]; ?></td>
                        <td> <?php echo $list['SOURCE_TYPE_CODE'][0]; ?></td>
                        <td> <?php echo $list['DONOR_CODE'][0]; ?></td>
                        <td > <?php echo $list['AMOUNT'][1]; ?> </td>
                        <td><?php echo $list['AMOUNT_TYPE'][0]; ?></td>
                        
                        <td><?php echo $list['BANK_VOUCHER_NUM'][1]; ?></td>
                        <td><?php echo $list['BANK_VOUCHER_DATE'][1]; ?></td>
                 
                    </tr>

                </tbody>
            </table>
            <p id="add_field"><a href="#"><span> Add more options.....</span></a></p>
        </div>
    </div>
    <?php echo $list['SUBMIT'][0]; ?>
    <?php echo form_close(); ?>
</div>
<script type="text/javascript">


    $(document).ready(function(){
         
        onchange();
      
        /********************* date conversion *****************************/
        var rvoucherEdate = 'rvoucherEdate';
        var rvoucherNdate = 'rvoucherNdate';
        dateToNep(rvoucherEdate,rvoucherNdate);
      
         
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
    

        /**************************ADDITION OF THE ROWS FOR THE VOUCHER*******************************/

        var transit ='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['TRANSIT'][0]); ?>';
        var economic='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['ECONOMIC_CODE5'][0]); ?>';
        var source='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['SOURCE_TYPE_CODE'][0]); ?> ';
        var donor='<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['DONOR_CODE'][0]); ?> ';
        var amount = '<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['AMOUNT'][1]); ?>';
        var amountt = '<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['AMOUNT_TYPE'][0]); ?> ';
        var bankVoucher = '<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['BANK_VOUCHER_NUM'][1]); ?> ';
        var bankVoucherDate = '<?php echo preg_replace('/^\s+|\n|\r|\s+$/m', '', $list['BANK_VOUCHER_DATE'][1]); ?> ';

        $('p#add_field').click(function(){ //CLICKING THE ADDMORE VOUCHER ITEMS
            var opts = $("#voucher tbody").children("tr").length;
            if(opts <10)
            {
                $("#voucher tbody").append('<tr><td cellpadding="0">'+transit+'</td><td>'+
                    economic+'</td><td>'+source+'</td><td>'+
                    donor+'</td></td>'+donor+'</td><td>'+amount+
                    '</td><td>'+amountt+'</td><td>'+bankVoucher+'</td><td>'+bankVoucherDate+'<td><a href="#" id="remove">X</a>'+'</td></tr>');
            }
            onchange();
        });

        $("#voucher tbody tr td #remove").live("click", function() {
            var link=$("#voucher tbody").find('tr:last,td:last').remove();
            if(link){
                $("p#add_field").show();
            }

        });

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
            }
        );
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

   

    });

</script>