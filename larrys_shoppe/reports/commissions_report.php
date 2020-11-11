<!-- Larry's Shoppe - commissions_report.php 
	Jacob Baynes
	4/18/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Commissions Report";
include('../includes/header.html');


//connect to the larrys shoppe Database
include "../db_connect.php";
?>


	<br><br>
	<h1>Monthly Commissions Report</h1>
	<?php
	$query = "SELECT emp_id, CONCAT(first_name, ' ', last_name) AS Name
	FROM employees;";
	$query2 = "SELECT sales.emp_id, SUM(total*.10) as Commission FROM sales WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW()) GROUP BY emp_id;";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	$result2 = mysqli_query($db_connection, $query2);
	
	?>
	<table id="inv_report">
		<tr>
			<th>Employee ID</th>
			<th>Name</th>
			<th>Commission</th>
		</tr>
	
	<?php
	while ($row = mysqli_fetch_array($result)) {
		$row2 = mysqli_fetch_array($result2);
		echo "<tr>";
		echo "<td>".$row['emp_id']."</td>";
		echo "<td>".$row['Name']."</td>";
		echo "<td>".number_format($row2['Commission'], 2)."</td>";
	}
	?>
	</table>






<?php
// close connection to larry's shoppe database
mysqli_close($db_connection);
	
// Include site footer
include('../includes/footer.html');
?>