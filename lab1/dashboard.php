<?php 
session_start();
if(!isset($_COOKIE["loggeduser"]))
{header("Location: index.php");
}
?> 
<html>
<body>
<h1 align ="center" style="color: Purple ; ">Welcome <?php echo $_COOKIE["loggeduser"] ; ?> </h1>
<h2 align ="center"style="color: red; ">Welcome <?php echo $_SESSION["loggeduser"] ; ?> </h2>
</body>
</html>