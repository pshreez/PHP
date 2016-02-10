<div class="content">

    <ul class="tabs" >
        <li>          
            <a href="#tab1" >सम्झौता बिवरण</a> 
        </li>

        <li>       
            <a href="#tab2">अमोर्तिज़शन </a>   
        </li>
        <span style="float:right;padding-right:40px;color:red;display:none" id="msg">Agreement has been created</span>
    </ul>

    <div class="tab_container">

        <div id="tab1" class="tab_content" >

            <?php echo form_open('agreement/operate', $list['FORM_ATTRIBUTES']); ?>
            <?php echo validation_errors(); ?>
            <div class="agridLayout" >
                <fieldset>
                    <div class="adatagrid " >
                        <?php echo $list['AGREEMENT_CD'][0]; ?> <?php echo $list['AGREEMENT_CD'][1]; ?>
                    </div>
                    <div class="adatagrid ">
                        <?php echo$list['ORG_CD'][0]; ?>  <?php echo $list['ORG_CD'][1]; ?> 
                    </div>

                    <div class="adatagrid ">
                        <?php echo$list['BUD_YEAR'][0]; ?> <?php echo $list['BUD_YEAR'][1]; ?> 
                    </div>

                    <div class="adatagrid ">
                        <?php echo$list['INVESTOR_TYPE'][0]; ?> <?php echo $list['INVESTOR_TYPE'][1]; ?> 
                    </div><br>

                    <div class="adatagrid ">
                        <?php echo$list['PROJECT_NAME'][0]; ?>   <?php echo $list['PROJECT_NAME'][1]; ?>  
                    </div>

                    <div class="adatagrid ">
                        <?php echo$list['AGREE_EDATE'][0]; ?>   <?php echo $list['AGREE_EDATE'][1]; ?>   <?php echo$list['AGREE_NDATE'][0]; ?>  
                    </div>
                    <div class="adatagrid ">
                        <?php echo$list['DISABLE_FLAG'][0]; ?> <?php echo $list['DISABLE_FLAG'][1]; ?>
                    </div>

                    <div class="adatagrid ">
                        <?php echo$list['AMOUNT_NEPALI'][0]; ?> <?php echo $list['AMOUNT_NEPALI'][1]; ?>
                    </div>
                    <div class="adatagrid ">
                        <?php echo$list['START_EDATE'][0]; ?>  <?php echo $list['START_EDATE'][1]; ?> <?php echo$list['START_NDATE'][0]; ?>  
                    </div>
                    <div class="adatagrid ">
                        <?php echo$list['END_EDATE'][0]; ?>  <?php echo $list['END_EDATE'][1]; ?> <?php echo$list['END_NDATE'][0]; ?>  
                    </div>
                </fieldset>

                <fieldset  id="donor">                  
                    <div class="adatagrid1" >
                        <?php echo$list['DONOR_CODE'][0]; ?> <?php echo $list['DONOR_CODE'][1]; ?>
                    </div>

                    <div class="adatagrid  ">
                        <?php echo$list['CURR_CD'][0]; ?><?php echo $list['CURR_CD'][1]; ?>
                    </div>

                    <div class="adatagrid ">
                        <?php echo$list['EXCHANGE_RATE'][0]; ?> <?php echo $list['EXCHANGE_RATE'][1]; ?>
                    </div>

                    <div class="adatagrid  ">
                        <?php echo$list['AMOUNT_FOREIGN'][0]; ?> <?php echo $list['AMOUNT_FOREIGN'][1]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['LOAN_NUM'][0]; ?> <?php echo $list['LOAN_NUM'][1]; ?>
                    </div>
                </fieldset>

                <fieldset>
                    <div style="width:420px;"class="adatagrid " >
                        <?php echo$list['ACC_CODE'][0]; ?> <?php echo $list['ACC_CODE'][1]; ?>
                        <?php echo $list['ACC_CODE'][2]; ?>
                    </div><br>

                    <div class="adatagrid " >
                        <?php echo$list['SOURCE_TYPE_CODE'][0]; ?>  <?php echo $list['SOURCE_TYPE_CODE'][1]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['GRACE_YEAR'][0]; ?>  <?php echo $list['GRACE_YEAR'][1]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['INSTALLMENT_NUM'][0]; ?> <?php echo $list['INSTALLMENT_NUM'][1]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['INSTALLMENT_DURATION'][0]; ?> <?php echo $list['INSTALLMENT_DURATION'][1]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['REPAYMENT_FROM_EDATE'][0]; ?><?php echo $list['REPAYMENT_FROM_EDATE'][1]; ?>  <?php echo$list['REPAYMENT_FROM_NDATE'][0]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['REPAYMENT_TO_EDATE'][0]; ?>  <?php echo $list['REPAYMENT_TO_EDATE'][1]; ?> <?php echo$list['REPAYMENT_TO_NDATE'][0]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['PAYABLE_WITH_INTEREST'][0]; ?>    <?php echo $list['PAYABLE_WITH_INTEREST'][1]; ?>                   
                    </div>

                </fieldset>

                <fieldset id="interestPayable">




                    <div class="adatagrid " >
                        <?php echo$list['PAYMENT_TYPE'][0]; ?>  <?php echo $list['PAYMENT_TYPE'][1]; ?>
                    </div>

                    <div class="adatagrid " >
                        <?php echo$list['ACTUAL_RATE'][0]; ?>  <?php echo $list['ACTUAL_RATE'][1]; ?>
                    </div>
                    <div class="adatagrid " >
                        <?php echo$list['CAPITALIZATION'][0]; ?>  <?php echo $list['CAPITALIZATION'][1]; ?>
                    </div>

                </fieldset>
                <?php echo$list['SUBMIT'][0]; ?> 
            </div>   

            <?php echo form_close(); ?>

        </div>

       <div id="tab2" class="tab_content">
            
            <table id="amort">
                <thead>
                    <tr>
                        <td>sn</td>
                        <td>date</td>
                        <td>price</td>
                        <td>interest</td>
                        <td>amount</td>
                        
                    </tr>
                </thead>
                <tbody>       </tbody>
            </table>
            
            <div id="colspans" ></div>
            
        </div>

    </div>
</div>




<script type="text/javascript">

    $(document).ready(function() {


        alert(eval(1 + 2));
        /**************** click submit ******************************/
        $("#msg").hide();
        //   $("#amort").hide();
        var baseUrl = "<?php echo base_url() . 'agreement/operate' ?>";
        $("#aSubmit").click(function(e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: baseUrl,
                data: $('#agreementForm').serialize(),
                dataType: "html",
                success: function(data) {
                    $("#msg").show();
                    var adata = $.parseJSON(data);
                    $.getJSON("<?php echo base_url() . 'agreement/amortization/' ?>" + adata.id,
                            {
                                data: data
                            },
                    function(data) {
                        var len = JSON.stringify(data);

                        var sumTotal = 0;
                        var totals = 0;
                        $.each(data, function(key, value) {
                            $("#amort tbody ").append('<tr><td>' + value.id + '</td><td>' + value.date + '</td><td>' + value.installment_amount +
                                    '</td><td>' + value.interest +
                                    '</td><td>' + value.total + '</td></tr>');
                            var cal = eval(value.total);
                            sumTotal += eval(cal);
                        });
                        $("#colspans").html(sumTotal);
                        $("input[type=text]").val("");

                    });
                }
            });

        });


        /***********************   nepali date conversion   *********************************/

        var aStartEDate = "aStartEDate";
        var aStartNDate = "aStartNDate";
        var pStartEDate = "pStartEDate";
        var pStartNDate = "pStartNDate";
        var pEndEDate = "pEndEDate";
        var pEndNDate = "pEndNDate";

        var repStartEDate = "repStartEDate";
        var repStartNDate = "repStartNDate";
        var repEndEDate = "repEndEDate";
        var repEndNDate = "repEndNDate";

        dateToNep(aStartEDate, aStartNDate);
        dateToNep(pStartEDate, pStartNDate);
        dateToNep(pEndEDate, pEndNDate);
        dateToNep(repStartEDate, repStartNDate);
        dateToNep(repEndEDate, repEndNDate);



        /*********************  When page loads... *************************/

        $(".tab_content").hide(); //Hide all content
        $("ul.tabs li:first").addClass("active").show(); //Activate first tab
        $(".tab_content:first").show(); //Show first tab content

        //On Click Event
        $("ul.tabs li").click(function() {

            $("ul.tabs li").removeClass("active"); //Remove any "active" class
            $(this).addClass("active"); //Add "active" class to selected tab
            $(".tab_content").hide(); //Hide all tab content

            var activeTab = $(this).find("a").attr("href"); //Find the href attribute value to identify the active tab + content
            $(activeTab).fadeIn(2); //Fade in the active ID content
            return false;
        });



        /************************ for foreign donor case  **************************/

        var investor = $('#investorType').val();

        if (investor == 1)
            $("#donor").hide();
        if (investor == 2)
            $("#donor").show();

        $("#investorType").change(function() {
            var investor = $(this).children(":selected").attr("value");

            if (investor == 1)
                $("#donor").hide();
            if (investor == 2)
                $("#donor").show();
        });


        /*******************************  budget head and project name autocomplete        ***************************/

        $("#autocomplete").attr("value", "");
        $("#typeauto").bind("keyup", function(event) {
            if (event.keyCode == 8) {
                $("#autocomplete").attr("value", "Project not available");
            }
            var typeauto = $(this).val();
            var budYear = $('#budYear').val().replace('/', '-');
            if (budYear == "") {
                $("#autocomplete").attr("value", "Budget year not selected");
            }
            else {
                var fullUrl = "<?php echo base_url() . 'release/gets/'; ?>" + typeauto + '/' + budYear;

                $.getJSON(fullUrl, {engdate: typeauto}, function(data) {
                    var project = JSON.stringify(data);
                    if (data == "") {
                        $("#autocomplete").attr("value", "Project not available");
                    }
                    else {
                        $.each(data, function(key, value) {
                            project = value.PROJECT_EDESC;
                        });
                        $("#autocomplete").attr("value", project);
                    }
                });

            }
        });

        /************************** english to nepali date conversion ****************************/

        function dateToNep(eng, nep) {

            $("#" + eng).bind("keyup", function(event) {

                if (event.which == 13) {
                    event.preventDefault();
                }
                var date = $(this).val();
                var fullUrl = "<?php echo base_url() . 'agreement/engTonepDate/'; ?>" + date;
                $.get(fullUrl, {engdate: date}, function(data) {
                    var date = $.parseJSON(data);
                    $("#" + nep).attr("value", date.date);
                    $("#" + nep).css("background", "lavender");
                    $("#" + eng).css("background", "lavender");
                });
            });
        }







    });

</script>



