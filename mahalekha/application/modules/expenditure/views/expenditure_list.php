<div class="content">
    <h2>ग्वोस्वारा सुची </h2><br />



    <div class="clear"></div><div class="spacer"></div>

    <table width="99%" cellspacing="1" cellpadding="5" border="0" bgcolor="#efefef" align="center" >
        <thead>
            <tr bgcolor="#494949" style="color:#FFF;">
                <td>वौचेर नुम्बेर</td>
                <td>बुद्गेत सिर्सक</td>
                <td>मिति</td>
                <td>बिवरण </td>
                <td>सिर्सक</td>
                <td>रकम</td>
                <td>tasks</td>
            </tr>
        </thead>
        <tbody>
            <!-- FOR LISTING THE DB VALUES-->
            <?php foreach ($a_list as $value): //var_dump($value);?>
            
                <tr>
                    <td><?php echo $value->VOUCHER_NUM; ?></td>
                    <td><?php echo $value->ACC_CODE; ?></td>
                    <td><?php echo $value->CREATED_DATE; ?></td>
                    <td><?php echo $value->ECONOMIC_CODE5; ?></td>
                    <td><?php echo $value->SOURCE_TYPE_CODE; ?></td>
                    <td><?php echo $value->AMOUNT; ?></td>
                 <td>
                        
                        <a href="<?php echo base_url() . 'reports/expenReports/'  .$value->VOUCHER_NUM; ?>" class="anchorClick">print  </a>
                        <a href="<?php echo base_url() . 'reports/requestDTC/' ; ?>" class="anchorClick">print1s  </a>
                        
                    </td>
                </tr>

            <?php endforeach; ?>


        </tbody>
    </table>

    
</div>



