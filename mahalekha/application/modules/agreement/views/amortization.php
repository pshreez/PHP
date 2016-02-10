<div class="content">

    <span id="amortTitle">Amortization schedule</span>

    <?php if ($a_data): ?>
        <table class="amortizationTable">
            <tr><th width="200px"> Project name:</th><td><?php echo $a_data[0]->PROJECT_NAME; ?></td></tr>
            <tr>  <th>Budget Year:</th><td><?php echo $a_data[0]->BUD_YEAR; ?></td> </tr>
            <tr> <th>Project Start Year:</th><td><?php echo $a_data[0]->START_EDATE; ?></td></tr>
            <tr> <th>Project End Year:</th><td><?php echo $a_data[0]->END_EDATE; ?></td></tr>
            <tr>  <th>Total Installment number:</th><td><?php echo $a_data[0]->INSTALLMENT_NUM; ?></td></tr>
            <tr> <th>Total Installment duration:</th><td><?php echo $a_data[0]->INSTALLMENT_DURATION; ?></td></tr>
            <tr>  <th>Created date :</th><td><?php echo $a_data[0]->DATETIME; ?></td></tr>
            <tr> <th>Grace year:</th><td><?php echo $a_data[0]->GRACE_YEAR; ?></td></tr>

        </table>
    <?php endif; ?>
    <table class='amort' cellspacing='0'>
        <thead>
            <tr>
                <td>S.N</td>
                <td>PAYMENT DATE</td>
                <td>AMOUNT</td>
                <td>INTEREST</td>
                <td>TOTAL</td>
            </tr>
        </thead>
        <tbody>
            <?PHP foreach ($list as $value): ?>
                <tr>
                    <td><?php echo $value['id'] ?></td>
                    <td><?php echo $value['date'] ?></td>
                    <td><?php echo $value['installment_amount'] ?></td>
                    <td><?php echo $value['interest'] ?></td>
                    <td><?php echo $value['total'] ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td colspan='5' align='right'> 
                    Total : <?php echo $total; ?>
                </td>
            </tr>

        </tbody>



    </table>


</div>
