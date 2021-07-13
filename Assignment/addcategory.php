<?php 
	 
	 include 'main_header.php';
	 include 'controllers/CategoryController.php';
?>


		<h5 ><?php echo $err_db;?></h5>
		<form method="post" action="" >
			
				<h4 >Name:</h4> 
				<input type="text" name="name" value="<?php echo $name;?>" >
			<span><?php echo $err_name;?></span>
			
		
				<input type="submit" name="add_category" value="Add Category" >
			
		</form>

		<?php include 'main_footer.php';?>