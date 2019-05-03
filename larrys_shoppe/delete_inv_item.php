<!-- Larry's Shoppe - delete_inv_item.php 
	Jacob Baynes
	3/29/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Modify Inventory Item";
include('includes/header.html');


//connect to the larrys shoppe Database
include "db_connect.php";

// Declare variables for errors and for inventory info
$item_id_error =  "";
$item_id = "";

// If server request method is post check if each text field is not emtpy
// or else display error message.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_REQUEST["item_id"])) {
		$item_id = test_input($_REQUEST['item_id']);
	} else {
		$item_id = NULL;
		$item_id_error = " Valid Item ID is Required";
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
if ($item_id) 
{
	//sql insert command
	$sql = "DELETE FROM inventory WHERE item_id='$item_id';";

	//run query and display results
	if (isset($_POST['submit'])) 
	{
		if (mysqli_query($db_connection, $sql))
		{
			$item_id_error = " Inventory File Deleted";
		}
		else
		{
			echo "Error: ".$sql."<br>".mysqli_error($db_connection);
		}
	}	
}
?>

<!-- HTML Form for creating new customers -->
<div class="page-header" style="background-color: #001a00; text-align: center;";><img class="img-thumbnail" src="images/inventory_photo.png" alt="Larry's Shoppe Nav Bar Photo" style="margin: auto; height: 60%; width: 60%;"><h1 style="color: white">Delete Inventory Item</h1></div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // post to self?>" id="invForm" method="post" style="margin: auto; width: 700px">
	
		<legend>Inventory Item Information</legend>
		
			<p><span class="text-danger"><img src="images/small_bowtie.jpg" alt="small bow tie"> required field</span></p>
			
			<p>Item ID: <input type="text" name="item_id" value="<?php if(isset($_POST['item_id'])) echo $_POST['item_id']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $item_id_error;?></span></p><br>
		
			<p><input type="submit" name="submit" value="Submit"></p><br>
</form>	


<?php
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
	echo "<td>".$row['customer_serv_contact']."</td>";
}
echo "</table>";
// close connection to larry's shoppe database
mysqli_close($db_connection);
	
// Include site footer
include('includes/footer.html');
?>