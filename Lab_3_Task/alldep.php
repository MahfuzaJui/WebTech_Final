<?php
   include 'header.php'; 
    require_once 'controllers/depcon.php';
	$departments=getAllDepartments();
	
?>
<html>
	<head></head>
	<h3>All Departments</h3>
	<table>
	<thead>
	    <th>Sl#</th>
		<th>Name</th>
		<th></th>
		<th></th>
	</thead>
	<tbody>
	<?php 
	$i = 1;
	foreach($departments as $d){
		echo "<tr>";
		  echo "<td>$i</td>";
		  echo "<td>".$d["name"]."</td>";
		  
		  echo "</tr>";
		  $i++;
	}
	
	?>
	</tbody>
	</table>
	</body>
</html>
<?php include 'footer.php'; ?>