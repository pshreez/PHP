<div class="content">

    <h2> </h2>
    <h2> सम्झौता नम्बर-<?php echo $a_id;?> </h2>
    
    <?php  echo form_open('rateEdit/operate/'.$rate);  ?>
    <div class="egridLayout" >
        <fieldset>
          
            <div class="edatagrid  " >
                <?php echo $list['ACTUAL_RATE'][0]; ?> <?php echo $a_rate; ?>

            </div>
            <div class="edatagrid  " >
                <?php echo $list['NEW_RATE'][0]; ?> <?php echo $list['NEW_RATE'][1]; ?>

            </div>
            <div class="edatagrid  " >
                <?php echo $list['ALTERED_RATE'][0]; ?> <?php echo $list['ALTERED_RATE'][1]; ?>

            </div>
            <div class="edatagrid " >
                <?php echo $list['INTEREST_CHANGE'][0]; ?> <?php echo $list['INTEREST_CHANGE'][1]; ?>
            </div>
        </fieldset>
        </div>
     <?php  echo form_submit('submit','submit');?>

    </div>

<?php echo form_close() ?>


