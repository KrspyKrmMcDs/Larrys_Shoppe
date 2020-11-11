<!-- Larry's Shoppe - transactions_report.php 
	Jacob Baynes
	4/18/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Transaction Report";
include('../includes/header.html');


//connect to the larrys shoppe Database
include "../db_connect.php";
?>


	<br><br>
	<h1>Monthly Transaction Report</h1>
	<?php
	
	$query = "SELECT s.transaction_id, s.date, CONCAT(e.first_name, ' ', e.last_name) AS Employee, CONCAT(c.first_name, ' ', c.last_name) AS Customer, i.item_id, i.description AS Description, s.quantity AS Quantity, s.price AS Price, s.total AS Total FROM sales AS s LEFT JOIN customers AS c ON s.cust_id=c.cust_id LEFT JOIN inventory AS i ON s.item_id=i.item_id LEFT JOIN employees AS e ON s.emp_id=e.emp_id WHERE YEAR(s.date)=YEAR(NOW());";
	// "SELECT sales.*, customers.cust_id, inventory.item_id, employees.emp_id FROM sales WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW());";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
		
	?>
	<table id="inv_report">
		<tr>
			<th>Transaction ID</th>
			<th>Date</th>
			<th>Employee</th>
			<th>Customer</th>
			<th>Item ID</th>
			<th>Description</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>
		</tr>
	
	<?php
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['transaction_id']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['Employee']."</td>";
		echo "<td>".$row['Customer']."</td>";
		echo "<td>".$row['item_id']."</td>";
		echo "<td>".$row['Description']."</td>";
		echo "<td>".$row['Quantity']."</td>";
		echo "<td>$".$row['Price']."</td>";
		echo "<td>$".$row['Total']."</td>";
	}
	?>
	</table>

	<br>
	<h1>Monthly: Commissions | Profits | Expenses</h1>
	<?php
	$query = "SELECT SUM(total*.10) AS Commissions FROM sales WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW());";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$commissions = mysqli_query($db_connection, $query);
	
	$query = "SELECT SUM(total) AS Profits FROM sales WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW())";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$profits = mysqli_query($db_connection, $query);
	
	$query = "SELECT SUM(amount) AS Orders FROM orders WHERE YEAR(order_date) = YEAR(NOW()) AND MONTH(order_date) = MONTH(NOW())";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$orders = mysqli_query($db_connection, $query);

	$query = "SELECT SUM(amount) AS Payroll FROM payroll WHERE YEAR(date) = YEAR(NOW()) AND MONTH(date) = MONTH(NOW())";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$payroll = mysqli_query($db_connection, $query);
	?>
	
	<table id="inv_report">
		<tr>
			<th>Commissions</th>
			<th>Profits</th>
			<th>Expenses</th>
		</tr>
	
	<?php
	$com = mysqli_fetch_array($commissions);
	$pro = mysqli_fetch_array($profits);
	$ord = mysqli_fetch_array($orders);
	$pay = mysqli_fetch_array($payroll);
	
	$comm = $com['Commissions'];
	$profit = $pro['Profits'];
	$order = $ord['Orders'];
	$pRoll = $pay['Payroll'];
	
	$netProfits = $profit - ($comm + $order + $pRoll);
	$expenses = $comm + $order +$pRoll;
	echo "<tr>";
	if ($com && $pro && $ord && $pay) {
		echo "<td>$".number_format($comm, 2)."</td>";
		echo "<td>$".$netProfits."</td>";
		echo "<td>$".$expenses."</td>";
	}
	?>
	</table>

<?php
// close connection to larry's shoppe database
mysqli_close($db_connection);
	
// Include site footer
include('../includes/footer.html');
?>