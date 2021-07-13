<?php 
	  include 'main_header.php';
	  include 'controllers/UserController.php';
?>

	<h1 >Login</h1>
	<h5 ><?php echo $err_db;?></h5>
	<form action="" method="post" >
	
			<h4 >Username</h4> 
			<input type="text" name="uname" value="<?php echo $uname;?> ">
			<span ><?php echo $err_uname;?></span>
	
			<h4 >Password</h4> 
			<input type="password" name ="pass" value ="<?php echo $pass;?>" >
            <span ><?php echo $err_pass;?></span>
		


			<input type="submit" name="btn_login" value="Login" >
	
			<a href="signup.php" >Not registered yet? Sign Up</a>
		
	</form>

<?php include 'main_footer.php';?>