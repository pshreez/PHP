<html>
	<head>
		 <?php echo $this->headMeta();?>
		   <?php echo $this->headTitle();?>
			   <?php echo $this->headLink()->prependStylesheet($this->baseUrl().'/css/style.css')?>
			<script src="../js/jquery-1.7.2.min.js" type="text/javascript">//jquerylibrary</script>
			<script src="../js/jquery-ui-1.8.22.custom.min.js" type="text/javascript">//datepicker</script>
			<script type="text/javascript" language="javascript" src="../media/js/jquery.dataTables.js"></script>
			<script type="text/javascript" charset="utf-8" src="../media/js/ZeroClipboard.js"></script>
			<script type="text/javascript" charset="utf-8" src="../media/js/TableTools.js"></script>
			<link rel="stylesheet" type="text/css" href="../css/ui-lightness/jquery-ui-1.8.22.custom.css">
			<link rel="stylesheet" type="text/css" href="../media/css/jquery.dataTables.css">
			<link rel="stylesheet" type="text/css" href="../media/css/jquery.dataTables_themeroller.css">
			<link rel="stylesheet" type="text/css" href="../media/css/TableTools.css">
						
			<script>
				$(function() {//$.documentready
					$( ".startDate" ).datepicker({ dateFormat: "yy-mm-dd" }); // .startDate is use as class
				});
			</script>
			<script>
			/* $(document).ready(function() {
				$('#report').dataTable( {
					"bPaginate": false,
					"bLengthChange": false,
					"bFilter": true,
					"bSort": true,
					"bInfo": true,
					"bAutoWidth": false } );
			}); */
			$(document).ready( function () {
				$('.table-grid').dataTable( {
					"sDom": 'T<"clear">lfrtip',
					"oTableTools": {
						"sSwfPath": "../media/swf/copy_csv_xls_pdf.swf"
					}					
				} );
			} );
		</script>
	 </head>
	 <body>
	 <?php if($this->userInfo()) // for not to display side bar in login page
	 {
		echo  '<div id="left-sidebar">'.$this->partial('sidebar/left-sidebar.phtml').' </div>';
		//echo  '<div id="header">'.$this->partial('header/header.phtml').' </div>';
	}?>
		 <div id="main-content">
			<?php echo $this->layout()->content; ?>
		</div>
	</body>
</html>