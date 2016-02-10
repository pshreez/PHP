<?php
class Sqlclass {
	
	## insert
	function insert($tbl, $arr) {
          
            
		$value = "'".implode("','",$arr)."'";
           
		$val = "";
		foreach ($arr as $key=>$arr)
		{
			$val .= $key.",";
		}

		$subs = substr($val,0,-1);	
		$insert = "INSERT INTO $tbl ($subs) VALUES ($value)";          
		return $insert;

	}
	
}