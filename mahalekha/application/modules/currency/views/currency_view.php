<div class="content">
<div CLASS="agridLayout">

    <?php echo form_open('currency/c_validate'); ?>
    <?php echo validation_errors(); ?>
    <form id="myform" >
    <div>     
        <fieldset>
        
            <div class="adatagrid1" >
                <?php echo $list['CURR_CD'][0]; ?>
             
                <?php echo $list['CURR_CD'][1]; ?>
            </div>
            <div class="adatagrid1">
                <?php echo $list['CURR_ENAME'][0]; ?>   
                <?php echo $list['CURR_ENAME'][1]; ?> 
            </div>
            <div class="adatagrid1">
                <?php echo $list['CURR_NNAME'][0]; ?>   
                <?php echo $list['CURR_NNAME'][1]; ?> 
            </div>
            <div class="adatagrid1">
                <?php echo $list['SYMBOL'][0]; ?>  
                <?php echo $list['SYMBOL'][1]; ?>  
            </div>
            <div class="adatagrid1">
                <?php echo $list['CREATED_BY'][0]; ?> 
                <?php echo $list['CREATED_BY'][1]; ?>

            </div>
            <div class="adatagrid1">
                <?php echo $list['DATETIME'][0]; ?>
                <?php echo $list['DATETIME'][1]; ?>
            </div>
            <div class="adatagrid1">
                <?php echo$list['SUBMIT'][0]; ?> 
            </div>
        </fieldset>
    </div>                 
    <?php echo form_close(); ?>
</div>
</div>



<script type="text/javascript">

    <script src="http://code.jquery.com/jquery-1.9.1.min.js">
<script src="http://jquery.bassistance.de/validate/jquery.validate.js">
<script src="http://jquery.bassistance.de/validate/additional-methods.js">

 
  
  </script>     