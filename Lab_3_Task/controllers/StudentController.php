<?php
    require_once 'models/db_config.php';
	$name="";
	$err_name="";
	$dob="";
	$err_dob="";
	$credit="";
	$err_credit="";
	$cgpa="";
	$err_cgpa="";
	$dept_id="";
	$err_dept_id="";
	
	$hasError=false;
	$err_db="";
	if(isset($_POST["AddStudent"])){
	
		if(empty($_POST["name"])){
			$hasError = true;
			$err_name="Name Required";
		}
		
		else{
			$name =$_POST["name"];
	
		}
		if(empty($_POST["dob"])){
			$hasError = true;
			$err_dob="Date of birth Required";
		}
		
		else{
			$dob =$_POST["dob"];
	
		}
		if(empty($_POST["credit"])){
			$hasError = true;
			$err_credit="Credit Required";
		}
		
		else{
			$credit =$_POST["credit"];
	
		}
		if(empty($_POST["cgpa"])){
			$hasError = true;
			$err_cgpa="Cgpa Required";
		}
		
		else{
			$cgpa =$_POST["cgpa"];
	
		}
		if(empty($_POST["dept_id"])){
			$hasError = true;
			$err_dept_id="Department Required";
		}
		
		else{
			$dept_id =$_POST["dept_id"];
	
		}
		
	
		if(!$hasError){
		
		$rs = insertStudent($name,$dob,$credit,$cgpa,$dept_id);
		if ($rs === true){
			header("Location: Allstudents.php");
		}
		$err_db = $rs;
	}
		}
		elseif(isset($_POST["Editstudent"])){
	     //name
		if(empty($_POST["name"])){
			$hasError = true;
			$err_name="Name Required";
		}
		
		else{
			$name =$_POST["name"];
	
		}
		if(empty($_POST["dob"])){
			$hasError = true;
			$err_dob="Date of birth Required";
		}
		
		else{
			$dob =$_POST["dob"];
	
		}
		if(empty($_POST["Credit"])){
			$hasError = true;
			$err_credit="Credit Required";
		}
		
		else{
			$credit =$_POST["credit"];
	
		}
		if(empty($_POST["cgpa"])){
			$hasError = true;
			$err_cgpa="CGPA Required";
		}
		
		else{
			$cgpa =$_POST["cgpa"];
	
		}
		if(empty($_POST["dept_id"])){
			$hasError = true;
			$err_dept_id="Department Required";
		}
		
		else{
			$dept_id =$_POST["dept_id"];
	
		}
		if(!$hasError){
			
		$rs = editStudent($name,$dob,$credit,$cgpa,$dept_id,$_POST["id"]);
		if($rs === true){
			header("Location: allstudents.php");
		}
		$err_db = $rs;
		}
		
	}
	
	function insertStudent($name,$dob,$credit,$cgpa,$dept_id){
		$query = "insert into students values (NULL,'$name','$dob',$credit,'$cgpa',$dept_id)";
		return execute($query);
	}
	function getStudents(){
		$query ="select s.*,d.name as 'd_name' from students s left join departments d on s.dept_id = d.id";
		$rs = get($query);
		return $rs;
	}
	function getStudent($id){
		$query = "select * from students where id = $id";
		$rs = get($query);
		return $rs[0];
		
	}
	function editStudent($name,$dob,$credit,$cgpa,$dept_id,$id){
		$query ="update students set name='$name',dob='$dob',credit=$credit,cgpa=$cgpa,dept_id=$dept_id where id = $id";
		return execute($query);
	}
	
?>  
<?php 
	require_once 'models/db_config.php';
	$name="";
	$err_name="";
	$uname="";
	$err_uname="";
	$err_pass="";
	$err_db="";
	$hasError=false;
	

	if(isset($_POST["btn_Login"])){
		//name
			if(empty($_POST["name"])){
			$hasError = true;
			$err_name="Name Required";
		}
		
		else{
			$name =$_POST["name"];
	
		}
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