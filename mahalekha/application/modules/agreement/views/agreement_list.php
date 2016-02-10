<div class="content">

    <h2>सम्झौता सुची </h2><br />



    <div class="clear"></div><div class="spacer"></div>

    <table width="99%" cellspacing="1" cellpadding="5" border="0" bgcolor="#efefef" align="center" >
        <thead>
            <tr bgcolor="#494949" style="color:#FFF;">
                <td>अग्रीमेंट कडे</td>
                <td>योजनाको नाम</td>
                <td>अग्रीमेंट मिति</td>
                <td>रकम (ने रु )</td>
                <td>ब्याज दर</td>
                <td>tasks</td>
            </tr>
        </thead>
        <tbody>
            <!-- FOR LISTING THE DB VALUES-->
            <?php foreach ($a_list as $value): //var_dump($value);?>
                <tr>
                    <td><?php echo $value->AGREEMENT_CD; ?></td>
                    <td><?php echo $value->PROJECT_NAME; ?></td>
                    <td><?php echo $value->AGREE_EDATE; ?></td>
                    <td><?php echo $value->AMOUNT_NEPALI; ?></td>
                    <td><?php echo $value->ACTUAL_RATE; ?></td>
                    <td>
                        <a href="<?php echo base_url() . 'rateEdit/edit/' . $value->AGREEMENT_CD . '/' . $value->DETAIL_ID . '/' . $value->ACTUAL_RATE; ?>" class="anchorClick">Edit Rate</a>
                        <a href="<?php echo base_url() . 'release/index/' . $value->AGREEMENT_CD; ?>" class="anchorClick">निकासा  </a>
                        <a href="<?php echo base_url() . 'agreement/amortSchedule/' . $value->AGREEMENT_CD; ?>" class="anchorClick">amortization  </a>
                    </td>
                </tr>

            <?php endforeach; ?>
        </tbody>
    </table>
</div>


