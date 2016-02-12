
<?php
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="table.csv"');
$csv = urldecode($_GET['csv']);
echo $csv;
?>