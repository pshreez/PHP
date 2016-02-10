
<div class="content">
<h3>संस्थाको  विवरण</h3><br />

<table cellspacing="1" cellpadding="8" border="0" bgcolor="#efefef" align="center">
	<tr bgcolor="#494949" style="color:#FFF;">
		<td>संस्थाको कडे</td>
		<td>संस्थाको नाम अंग्रेजीमा</td>
		<td>संस्थाको नाम नेपालीमा</td>
		<td>संस्थाको स्थान</td>
		<td>पी. वो. बक्स</td>
		<td>फोन नम्वर</td>
		<td> इमेल आइडी </td>
		<td>फाक्स नम्बर</td>
		<td>मिति</td>
		<td>created by</td>
		
         </tr>
<!--         FOR LISTING THE DB VALUES-->
         <?php foreach ($list as $value): ?>
         <tr>
             
              <td><?php   echo $value->ORG_CD;?></td>
              <td><?php   echo $value->ORG_ENAME;?></td>
              <td><?php   echo $value->ORG_NNAME;?></td>
              <td><?php   echo $value->ORG_ADD;?></td>
              <td><?php   echo $value->POST_BOX_NO;?></td>
              <td><?php   echo $value->PHONE_NO;?></td>
              <td><?php   echo $value->EMAIL_ADD;?></td>
              <td><?php   echo $value->FAX_NO;?></td>
               <td><?php   echo $value->DATETIME;?></td>
              <td><?php   echo $value->CREATED_BY;?></td>
             
       
             
         </tr>
         <?php endforeach; ?>
         
<?php // foreach ($list as $row):?>
         
         
         
         
<!--	<tr class="bg1">
		<td>//<?php echo $l->CURR_CD; ?></td>
		<td></td>
		<td>//<?php echo $l->CURR_ENAME;?></td>
		<td align="center">
			<a href=""></a> &nbsp; 
			<a href=""><img src="//<?php echo base_url();?>images/delete.png" width="20" height="20" title="Delete" /></a> &nbsp;
			<a href=""><img src="//<?php echo base_url();?>images/view.png" width="20" height="20" title="View Detail" /></a>
		</td>
	</tr>-->
<?php //endforeach;?>
</table>

</div>