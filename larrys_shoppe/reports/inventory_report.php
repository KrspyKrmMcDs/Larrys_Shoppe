<!-- Larry's Shoppe - inventory_report.php 
	Jacob Baynes
	4/18/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Inventory Report";
include('../includes/header.html');


//connect to the larrys shoppe Database
include "../db_connect.php";
?>


	<br><br>
	<h1>Inventory Report</h1>
	<?php
	$query = "SELECT item_id, description, quantity_in_stock, CASE WHEN quantity_in_stock < 5 THEN 'Place an order for this item!' 
	ELSE 'No orders needed.'
	END AS Status
	FROM inventory;";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	?>
	<table id="inv_report">
		<tr>
			<th>Item ID</th>
			<th>Description</th>
			<th>Quantity</th>
			<th>Status</th>
		</tr>
	
	<?php
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['item_id']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td>".$row['quantity_in_stock']."</td>";
		echo "<td>".$row['Status']."</td>";
	}
	?>
	</table>






<?php
// close connection to larry's shoppe database
mysqli_close($db_connection);
	
// Include site footer
include('../includes/footer.html');
?>