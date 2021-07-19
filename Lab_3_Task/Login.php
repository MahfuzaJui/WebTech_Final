<?php
    require_once 'controllers/UserControllers.php';
    
?>
<html>
	<head></head>
	<h5><?php echo $err_db;?></h5>
	<body>
	  <form  method="post" action="">
	  <fieldset>
	  <table>
	  <td> Log In </td>
	<tr>
	   <td>User Name</td>
	   <td>: <input type="text" name="uname" value="<?php echo $uname; ?>" > </td>
	   <td><span> <?php echo $err_uname;?> </span></td>
	</tr>
				
	<tr>
           <td>Password</td>
           <td>: <input type="password" name="pass"  >  </td>
	  <td><span> <?php echo $err_pass;?> </span></td>
	</tr>
				
       <tr>
	   <td colspan="2" align="right"> <input type="submit" name="btn_Login" value="Log In"> </td>
					
      </tr>
   </table>
  </fieldset>
 </form>
 </body>
</html>