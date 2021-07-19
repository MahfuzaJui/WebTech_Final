<?php
   include 'header.php'; 
    require_once 'controllers/depcon.php';
	$students=getStudents();
	
    
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
	foreach($students as $d){
		echo "<tr>";
		  echo "<td>$i</td>";
		  echo "<td>".$s["name"]."</td>";
		  echo "<td>".$s["id"]."</td>";
		  echo "<td>".$s["dob"]."</td>";
		  echo "<td>".$s["cgpa"]."</td>";
		  echo "<td>".$s["credit"]."</td>";
		  echo "<td>".$d["id"]."</td>";
		  
		  echo "</tr>";
		  $i++;
	}
	
	?>
	</tbody>
	</table>
	</body>
</html>
<?php include 'footer.php'; ?>