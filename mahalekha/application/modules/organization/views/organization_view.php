<div id="content" >

    <h3>संस्था विवरण</h3><br />

  

        <?php echo form_open('organization/org_operate'); ?>
        <?php echo validation_errors(); ?>
        <div class ="gridLayout">     
            <fieldset>
                <div class = "datagrid" >
                    <?php echo $list['ORG_CD'][0]; ?> <?php echo $list['ORG_CD'][1]; ?>              
                </div>

                <div class="datagrid">
                    <?php echo $list['DATETIME'][0]; ?> <?php echo $list['DATETIME'][1]; ?>              
                </div>

                <div class="datagrid">
                    <?php echo $list['ORG_ENAME'][0]; ?><?php echo $list['ORG_ENAME'][1]; ?> 
                </div>

                <div class="datagrid">
                    <?php echo $list['ORG_NNAME'][0]; ?><?php echo $list['ORG_NNAME'][1]; ?> 
                </div>

                <div class="datagrid">
                    <?php echo $list['ORG_ADD'][0]; ?> <?php echo $list['ORG_ADD'][1]; ?>  
                </div>

                <div class="datagrid">
                    <?php echo $list['POST_BOX_NO'][0]; ?><?php echo $list['POST_BOX_NO'][1]; ?>
                </div>

                <div class="datagrid">
                    <?php echo $list['PHONE_NO'][0]; ?> <?php echo $list['PHONE_NO'][1]; ?>
                </div>

                <div class="datagrid">
                    <?php echo $list['EMAIL_ADD'][0]; ?><?php echo $list['EMAIL_ADD'][1]; ?>
                </div>

                <div class="datagrid">
                    <?php echo $list['FAX_NO'][0]; ?> <?php echo $list['FAX_NO'][1]; ?>
                </div>

                <div class="datagrid">
                    <?php echo $list['CREATED_BY'][0]; ?> <?php echo $list['CREATED_BY'][1]; ?>
                </div>

                <div class="datagrid">
                    <?php echo $list['DISABLE_FLAG'][0]; ?><?php echo $list['DISABLE_FLAG'][1]; ?>
                </div>        

                <div class="datagrid">
                    <?php echo$list['SUBMIT'][0]; ?> 
                </div>
            </fieldset>
        </div>                 
        <?php echo form_close(); ?>
  

</div>
