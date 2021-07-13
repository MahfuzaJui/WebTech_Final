<?php
	include 'main_header.php';
	include 'controllers/UserController.php';
?>

	<h1 >Sign Up</h1>
	<h5 ><?php echo $err_db;?></h5>
	<form action="" method="post">
		
			<h4 >Name</h4> 
			<input type="text" name="name" value="<?php echo $name;?>" >
			<span><?php echo $err_name;?></span>
		
	
			<h4 >Username</h4> 
			<input type="text" name="uname" value="<?php echo $uname;?> ">
			<span ><?php echo $err_uname;?></span>
		
		
			<h4 >Email</h4> 
			<input type="text" name ="email" value ="<?php echo $email;?>" >
            <span><?php echo $err_email;?></span>
	
		
			<h4 >Password</h4> 
			<input type="password" name ="pass" value ="<?php echo $pass;?>" >
            <span ><?php echo $err_pass;?></span>
		
		
			
			<input type="submit" name="sign_up" class="btn btn-success" value="Sign Up" >
		
	</form>

	<?php include 'main_footer.php';?>