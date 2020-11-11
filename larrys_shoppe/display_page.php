<!DOCTYPE html>
<link rel="stylesheet" href="css/display_page_css.css" type="text/css">
<?php
	$page_title = "Larry's Sartorial Shoppe Database";
	include('db_connect.php');

	echo "<h1>Larry's Sartorial Shoppe Database</h1>";
	// Display the customers table
	$query = "SELECT * FROM customers";	
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Customers</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Customer ID</th>";
	echo "<th>Date</th>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Street</th>";
	echo "<th>City</th>";
	echo "<th>State</th>";
	echo "<th>Zip</th>";
	echo "<th>Phone</th>";
	echo "<th>Email</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['cust_id']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['street']."</td>";
		echo "<td>".$row['city']."</td>";
		echo "<td>".$row['state']."</td>";
		echo "<td>".$row['zip']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['email']."</td>";
	}
	echo "</table>";
	
	
	// Display the employees table
	$query = "SELECT * FROM employees";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Employees</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Employee ID</th>";
	echo "<th>Date</th>";
	echo "<th>First Name</th>";
	echo "<th>Last Name</th>";
	echo "<th>Street</th>";
	echo "<th>City</th>";
	echo "<th>State</th>";
	echo "<th>Zip</th>";
	echo "<th>Phone</th>";
	echo "<th>Email</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['emp_id']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['first_name']."</td>";
		echo "<td>".$row['last_name']."</td>";
		echo "<td>".$row['street']."</td>";
		echo "<td>".$row['city']."</td>";
		echo "<td>".$row['state']."</td>";
		echo "<td>".$row['zip']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['email']."</td>";
	}
	echo "</table>";
	
	
	// Display the inventory table
	$query = "SELECT * FROM inventory";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Inventory</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Item ID</th>";
	echo "<th>Creation Date</th>";
	echo "<th>Update Date</th>";
	echo "<th>Description</th>";
	echo "<th>Price</th>";
	echo "<th>Quantity In Stock</th>";
	echo "<th>Vendor ID</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['item_id']."</td>";
		echo "<td>".$row['creation_date']."</td>";
		echo "<td>".$row['update_date']."</td>";
		echo "<td>".$row['description']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['quantity_in_stock']."</td>";
		echo "<td>".$row['vendor_id']."</td>";
	}
	echo "</table>";
	
	// Display the orders table
	$query = "SELECT * FROM orders";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Orders</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Purchase Order Number</th>";
	echo "<th>Order Date</th>";
	echo "<th>Ship Date</th>";
	echo "<th>Vendor ID</th>";
	echo "<th>Item ID</th>";
	echo "<th>Quantity</th>";
	echo "<th>Units</th>";
	echo "<th>Price</th>";
	echo "<th>Employee ID</th>";
	echo "<th>Amount</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['po_number']."</td>";
		echo "<td>".$row['order_date']."</td>";
		echo "<td>".$row['ship_date']."</td>";
		echo "<td>".$row['vendor_id']."</td>";
		echo "<td>".$row['item_id']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "<td>".$row['units']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['emp_id']."</td>";
		echo "<td>".$row['amount']."</td>";
	}
	echo "</table>";
	
	// Display the payroll table
	$query = "SELECT * FROM payroll";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Payroll</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Paycheck Number</th>";
	echo "<th>Date</th>";
	echo "<th>Employee ID</th>";
	echo "<th>Employee Name</th>";
	echo "<th>Payer Name</th>";
	echo "<th>Amount</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['paycheck_number']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['emp_id']."</td>";
		echo "<td>".$row['emp_name']."</td>";
		echo "<td>".$row['payer_name']."</td>";
		echo "<td>".$row['amount']."</td>";
	}
	echo "</table>";
	
	// Display the sales table
	$query = "SELECT * FROM sales";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Sales</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Transaction ID</th>";
	echo "<th>Date</th>";
	echo "<th>Customer ID</th>";
	echo "<th>Item ID</th>";
	echo "<th>Employee ID</th>";
	echo "<th>Quantity</th>";
	echo "<th>Price</th>";
	echo "<th>Total</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['transaction_id']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['cust_id']."</td>";
		echo "<td>".$row['item_id']."</td>";
		echo "<td>".$row['emp_id']."</td>";
		echo "<td>".$row['quantity']."</td>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['total']."</td>";
	}
	echo "</table>";
	
	// Display the time cards table
	$query = "SELECT * FROM `time cards`";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Time Cards</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Time Card Number</th>";
	echo "<th>Date</th>";
	echo "<th>Employee ID</th>";
	echo "<th>Employee Name</th>";
	echo "<th>Time In</th>";
	echo "<th>Time Out</th>";
	echo "<th>Hours</th>";
	echo "<th>Total</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['time_card_num']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['emp_id']."</td>";
		echo "<td>".$row['emp_name']."</td>";
		echo "<td>".$row['time_in']."</td>";
		echo "<td>".$row['time_out']."</td>";
		echo "<td>".$row['hours']."</td>";
		echo "<td>".$row['total']."</td>";
	}
	echo "</table>";
	
	// Display the vendor table
	$query = "SELECT * FROM vendor";
	mysqli_query($db_connection, $query) or die('Error querying database.');
	$result = mysqli_query($db_connection, $query);
	
	echo "<h3>Vendors</h3>";
	echo "<table>";
	echo "<tr>";
	echo "<th>Vendor ID</th>";
	echo "<th>Date</th>";
	echo "<th>Vendor Name</th>";
	echo "<th>Street</th>";
	echo "<th>City</th>";
	echo "<th>State</th>";
	echo "<th>Zip</th>";
	echo "<th>Phone</th>";
	echo "<th>Item ID</th>";
	echo "<th>Customer Service Contact</th>";
	echo "</tr>";
	while ($row = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$row['vendor_id']."</td>";
		echo "<td>".$row['date']."</td>";
		echo "<td>".$row['vendor_name']."</td>";
		echo "<td>".$row['street']."</td>";
		echo "<td>".$row['city']."</td>";
		echo "<td>".$row['state']."</td>";
		echo "<td>".$row['zip']."</td>";
		echo "<td>".$row['phone']."</td>";
		echo "<td>".$row['item_id']."</td>";
		echo "<td>".$row['customer_serv_contact']."</td>";
	}
	echo "</table>";
	
	// Close database connection
	mysqli_close($db_connection);
	

	
	?>
	
		