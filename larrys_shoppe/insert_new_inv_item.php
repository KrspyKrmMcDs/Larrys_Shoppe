<!-- Larry's Shoppe - insert_new_inv_item.php 
	Jacob Baynes
	3/29/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Create New Inventory Item";
include('includes/header.html');


//connect to the larrys shoppe Database
include "db_connect.php";

// Declare variables for errors and for inventory info
$desc_error = $price_error = $quantity_error = $vendor_id_error = "";
$description = $price = $quantity = $vendor_id = "";

// If server request method is post check if each text field is not emtpy
// or else display error message.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_REQUEST["description"])) {
		$description = test_input($_REQUEST['description']);
	} else {
		$description = NULL;
		$desc_error = " Valid Description is Required";
	}
	
	if(!empty($_REQUEST["price"])) {
		$price = test_input($_REQUEST['price']);
	} else {
		$price = NULL;
		$price_error = " Valid Price is Required";
	}
	
	if(!empty($_REQUEST["quantity"])) {
		$quantity = test_input($_REQUEST['quantity']);
	} else {
		$quantity = NULL;
		$quantity_error = " Valid Quantity is Required";
	}
	
	if(!empty($_REQUEST["vendor_id"])) {
		$vendor_id = test_input($_REQUEST['vendor_id']);
	} else {
		$vendor_id = NULL;
		$vendor_id_error = " Valid Vendor ID is Required";
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
if ($description && $price && $quantity && $vendor_id) 
{
	//sql insert command
	$sql = "INSERT INTO inventory(description, price, quantity_in_stock, vendor_id)
	VALUES('$description', '$price', '$quantity', '$vendor_id')";

	//run query and display results
	if (isset($_POST['submit'])) 
	{
		if (mysqli_query($db_connection, $sql))
		{
			$desc_error = " Inventory File Created";
		}
		else
		{
			echo "Error: ".$sql."<br>".mysqli_error($db_connection);
		}
	}	
}

?>

<!-- HTML Form for creating new customers -->
<div class="page-header" style="background-color: #001a00; text-align: center;";><img class="img-thumbnail" src="images/inventory_photo.png" alt="Larry's Shoppe Nav Bar Photo" style="margin: auto; height: 60%; width: 60%;"><h1 style="color: white">Create New Inventory Item</h1></div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // post to self?>" id="invForm" method="post" style="margin: auto; width: 700px">
	
		<legend>Inventory Item Information</legend>
		
			<p><span class="text-danger"><img src="images/small_bowtie.jpg" alt="small bow tie"> required field</span></p>
		
			<p>Description: <textarea name="description" form="invForm" value="<?php if(isset($_POST['description'])) echo $_POST['description']; ?>"></textarea><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $desc_error;?></span></p><br>
			
			<p>Price: <input type="text" name="price" value="<?php if(isset($_POST['price'])) echo $_POST['price']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $price_error;?></span></p><br>
			
			<p>Quantity: <input type="text" name="quantity" value="<?php if(isset($_POST['quantity'])) echo $_POST['quantity']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $quantity_error;?></span></p><br>
			
			<p>Vendor ID: <input type="text" name="vendor_id" value="<?php if(isset($_POST['vendor_id'])) echo $_POST['vendor_id']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $vendor_id_error;?></span></p><br>
			
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