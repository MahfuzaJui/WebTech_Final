<?php
    require_once 'models/db_config.php';
	$name="";
	$err_name="";
	$hasError=false;
	$err_db="";
		

		
		function getAllDepartments(){
			$query="select * from departments";
			$rs=get($query);
			return $rs;
		}
		
?>
