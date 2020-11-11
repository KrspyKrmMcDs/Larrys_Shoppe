<!-- Larry's Shoppe - delete_sale.php 
	Jacob Baynes
	4/18/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Delete Sale";
include('includes/header.html');


//connect to the larrys shoppe Database
include "db_connect.php";

// Declare variables for errors and for sales info
$transaction_id_error =  "";
$transaction_id = "";

// If server request method is post check dropdown is not emtpy
// or else display error message.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_REQUEST["transaction_id"])) {
		$transaction_id = test_input($_REQUEST['transaction_id']);
	} else {
		$transaction_id = NULL;
		$transaction_id_error = " Please select a transaction";
	}
}

// test_input trims whitespaces for the ends of the argument, 
// stips slashes, and applies the htmlspecialchars function 
// to avoid sql injections.
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
} 

// If all inventory data is valid than create sql statement
if ($transaction_id) 
{
	//sql insert command
	$sql = "DELETE FROM sales WHERE transaction_id='$transaction_id';";

	//run query and display results
	if (isset($_POST['submit'])) 
	{
		if (mysqli_query($db_connection, $sql))
		{
			$transaction_id_error = " Transaction File Deleted";
		}
		else
		{
			echo "Error: ".$sql."<br>".mysqli_error($db_connection);
		}
	}	
}
?>

<!-- HTML Form for creating new customers -->
<div class="page-header" style="background-color: #000154; text-align: center;";><img class="img-thumbnail" src="images/sales_photo.jpg" alt="Larry's Shoppe Nav Bar Photo" style="margin: auto; height: 350px; width: 60%;"><h1 style="color: white">Delete Sales Transaction</h1></div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // post to self?>" id="invForm" method="post" style="margin: auto; width: 800px">
	
		<legend>Sales Transaction Information</legend>
		
			<p><span class="text-danger"><img src="images/small_bowtie.jpg" alt="small bow tie"> required field</span></p>
			
		<p>Transaction ID | Customer ID & Name : Item ID  
		<?php
		
		// Query creates inner join with sales and customers tables to display dropdown options
		$filter = mysqli_query($db_connection, "SELECT sales.transaction_id, sales.cust_id, customers.first_name, customers.last_name, sales.item_id, sales.emp_id
		FROM sales
		INNER JOIN customers ON sales.cust_id=customers.cust_id
		ORDER BY transaction_id;");
		
		// Create dropdown from query
		echo "<select class='form-dropdown' style='width:150px' name='transaction_id'>";
		echo "<option selected='selected'></option>";
		while($row = mysqli_fetch_array($filter))
		{
		echo "<option value='". $row['transaction_id'] ."'>" . $row['transaction_id'] . " | " . $row['cust_id'] . ". " . $row['first_name'] . " " . $row['last_name'] . " : " . $row['item_id'] .  "</option>";
		}
		echo "</select>";
		?>
		<span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $transaction_id_error;?></span></p><br>
		
		<p><input type="submit" name="submit" value="Submit"></p><br>
</form>	


<?php
// Display the sales table with inner join to show customer names
$query = "SELECT sales.transaction_id, sales.date, sales.cust_id, customers.first_name, customers.last_name, sales.item_id, sales.emp_id, sales.quantity, sales.price, sales.total
FROM sales
INNER JOIN customers ON sales.cust_id=customers.cust_id
ORDER BY transaction_id;";
mysqli_query($db_connection, $query) or die('Error querying database.');
$result = mysqli_query($db_connection, $query);

echo "<h3>Sales</h3>";
echo "<table>";
echo "<tr>";
echo "<th>Transaction ID</th>";
echo "<th>Creation Date</th>";
echo "<th>Customer ID</th>";
echo "<th>Customer First Name</th>";
echo "<th>Customer Last Name</th>";
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
	echo "<td>".$row['first_name']."</td>";
	echo "<td>".$row['last_name']."</td>";
	echo "<td>".$row['item_id']."</td>";
	echo "<td>".$row['emp_id']."</td>";
	echo "<td>".$row['quantity']."</td>";
	echo "<td>".$row['price']."</td>";
	echo "<td>".$row['total']."</td>";
}
echo "</table>";

// close connection to larry's shoppe database
mysqli_close($db_connection);
	
// Include site footer
include('includes/footer.html');
?>