  
<?php 
	require_once 'models/db_config.php';
	
	$uname="";
	$err_uname="";
	$err_pass="";
	$err_db="";
	$hasError=false;
	

	if(isset($_POST["btn_Login"])){
		
		//uname
			if(empty($_POST["uname"])){
			$hasError = true;
			$err_uname="User name Required";
		}
		
		else if(strpos($_POST["uname"]," ")){
			$hasError = true;
			$err_uname="Username does not contain space";
		}
		else{
			$uname =$_POST["uname"];
			
		}
		//password
		if(empty($_POST["pass"])){
			$hasError = true;
			$err_pass="Password Required";
		}

		else{
			$pass = $_POST["pass"];
		}
		if(!$hasError){
			if(authenticateUser($uname,$pass)){
			header("Location: Dashboard.php");
		}
		    $err_db="Username password invalid";
		}
		}
		
	function authenticateUser($uname,$pass){
		$query="select * from users where username='$uname' and password='$pass'";
		$rs=get($query);
		if(count($rs)>0){
			return true;
		}
		return false;
	}

?> 