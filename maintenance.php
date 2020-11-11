<!-- Larry's Shoppe - maintenance.php
	Jacob Baynes
	3/17/2019	This is my original work -->

<?php 

// Create page title and include site header file
$page_title = "Customer Maintenance";
include('includes/header.html');
?>


	<h1>Database Maintenance</h1>
		
	<div class="page-header" style="background-color: #000000; text-align: center;";><img class="img-thumbnail" src="images/header_photo.jpg" alt="Larry's Shoppe Nav Bar Photo" style="margin: auto; height: 60%; width: 60%;"></div>
	<h2>Customer Maintenance</h2>
	<div class="maintenance-links">
		<ul>
			<li><a href="insert_new.php">Insert New Customer</a></li>
			<li><a href="modify_customer.php">Modify Customer</a></li>
			<li><a href="delete_customer.php">Delete Customer</a></li>
		</ul>
	</div>
	<h2>Employee Maintenance</h2>
	<div class="maintenance-links">
		<ul style="background-color: #330000">
			<li><a href="insert_new_employee.php">Insert New Employee</a></li>
			<li><a href="modify_employee.php">Modify Employee</a></li>
			<li><a href="delete_employee.php">Delete Employee</a></li>
		</ul>
	</div>
	<h2>Inventory Maintenance</h2>
	<div class="maintenance-links">
		<ul style="background-color: #001a00">
			<li><a href="insert_new_inv_item.php">Insert New Inventory Item</a></li>
			<li><a href="modify_inv_item.php">Modify Inventory Item</a></li>
			<li><a href="delete_inv_item.php">Delete Inventory Item</a></li>
		</ul>
	</div>
	<h2>Sales Maintenance</h2>
	<div class="maintenance-links">
		<ul style="background-color: #000154">
			<li><a href="insert_new_sale.php">Insert New Sale</a></li>
			<li><a href="delete_sale.php">Delete Sale</a></li>
		</ul>
	</div>
	<h2>Reports</h2>
	<div class="maintenance-links">
		<ul style="background-color: #4CAF50">
			<li><a href="reports\inventory_report.php">Iventory Report</a></li>
			<li><a href="reports\customer_report.php">Customer Report</a></li>
			<li><a href="reports\commissions_report.php">Commissions Report</a></li>
			<li><a href="reports\transactions_report.php">Transactions Report</a></li>
		</ul>
	</div>

	
<?php

// Include site footer 
include('includes/footer.html');
?>