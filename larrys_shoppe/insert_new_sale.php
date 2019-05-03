<!-- Larry's Shoppe - insert_new_inv_item.php 
	Jacob Baynes
	3/29/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Create New Sale";
include('includes/header.html');

//connect to the larrys shoppe Database
include "db_connect.php";

$cust_id_error = $item_id_error = $emp_id_error = $quantity_error = "";
$cust_id = $item_ids = $emp_id = $quantity = "";

// If server request method is post check that each entry field
// has been given a value
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(isset($_REQUEST["cust_id"]) && $_REQUEST["cust_id"] != 0) {
		$cust_id = $_REQUEST["cust_id"];
	} else {
		$cust_id = NULL;
		$cust_id_error = " Please choose a customer";
	}
	
	if(isset($_REQUEST["emp_id"]) && $_REQUEST["emp_id"] != 0) {
		$emp_id = $_REQUEST["emp_id"];
	} else {
		$emp_id = NULL;
		$emp_id_error = " Please choose an employee";
	}
	
	// Check that one or more of the checkboxes has been set and its
	// values have been input into the key value pair 'items' array
	if(isset($_REQUEST["items"]) && $_REQUEST["items"]!="") 
	{
		$item_ids = $_POST["items"];
		
	} else {
		$item_id_error = " Please choose an item";
	}

	// Check that the quantity array has values and that they are
	// more than 0
	if(!empty($_REQUEST["quantity"]) && is_array($_REQUEST["quantity"]))
	{
		$q = $_POST["quantity"];
		$quantities = array();
		foreach($q as $num)
		{
			if ($num > 0)
			{
				array_push($quantities, $num); // add quantity to quantities array
			}
		}
		if (empty($quantities))
			$quantity_error = " Please enter a quantity";
	}
}

// If each entry field has a value 
if ($cust_id && $emp_id && $item_ids && $quantities)
{
	$item_count = 0;
	// For each key value pair in the item_ids array
	foreach($item_ids as $id => $cost)
	{
		// Multiply the quantity that matches the item
		// by the cost of the item 
		$sub_total = $quantities[$item_count] * $cost;
		
		// Query to insert each individual item as its own transaction 
		// into the sales table
		$insert = "INSERT INTO sales(cust_id, item_id, emp_id, quantity, price, total)
		VALUES('$cust_id', '$id', '$emp_id', '$quantities[$item_count]', '$cost', '$sub_total')"; 
		
		// Update the quantity in stock of items purchased in sales transaction
		$sql = mysqli_query($db_connection, "SELECT quantity_in_stock FROM inventory WHERE item_id='$id'");
		while($row = mysqli_fetch_array($sql))
		{
			$new_quant = $row['quantity_in_stock'] - $quantities[$item_count];
			$update = "UPDATE inventory
			SET quantity_in_stock='$new_quant'
			WHERE item_id='$id'";
			
		}
		$item_count++;
		
		
		
		//run querys and display results
		if (isset($_POST['submit'])) 
		{
			if (mysqli_query($db_connection, $insert))
			{
				$cust_id_error = " Transaction Files Created";
			}
			else
			{
				echo "Error: ".$insert."<br>".mysqli_error($db_connection);
			}
			if (mysqli_query($db_connection, $update))
			{
				$emp_id_error = " Inventory updated";
			}
			else
			{
				echo "Error: ".$update."<br>".mysqli_error($db_connection);
			}
		}
	}
}
?>

<!-- HTML Form for creating new transactions -->
<div class="page-header" style="background-color: #000154; text-align: center;";><img class="img-thumbnail" src="images/sales_photo.jpg" alt="Photo of a handshake" style="margin: auto; height: 350px; width: 60%;"><h1 style="color: white">Create New Sale</h1></div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // post to self?>" id="invForm" method="post" style="margin: auto; width: 800px">
	
	<legend>Sale Information</legend>
		
		<p><span class="text-danger"><img src="images/small_bowtie.jpg" alt="small bow tie"> required field</span></p>
		
		<!-- Customer ID Dropdown box -->
		<p>Customer ID: 
		<?php
		$filter = mysqli_query($db_connection, "SELECT * FROM customers");
		echo "<select class='form-dropdown' style='width:150px' id='cust_drop' name='cust_id'>";
		echo "<option selected='selected'></option>";
		while($row = mysqli_fetch_array($filter))
		{
			echo "<option value='". $row['cust_id'] ."'>" . $row['cust_id'] . " " . $row['first_name'] . " " . $row['last_name'] . "</option>";
		}
		echo "</select>";
		?>
		<span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $cust_id_error;?></span></p><br>
			
		<!-- Employee ID dropdown box -->	
		<p>Employee ID: 
		<?php
		$filter = mysqli_query($db_connection, "SELECT * FROM employees");
		echo "<select class='form-dropdown' style='width:200px' id='emp_drop' name='emp_id'>";
		echo "<option selected='selected'></option>";
		while($row = mysqli_fetch_array($filter))
		{
			echo "<option value='". $row['emp_id'] ."'>" . $row['emp_id'] . " " . $row['first_name'] . " " . $row['last_name'] ."</option>";
		}
		echo "</select>";
		?>
		<span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $emp_id_error;?></span></p><br>
		
		<!-- Checkboxes to select items in sales transaction -->
		<p>Inventory ID | Description | Price | Quantity: <span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $item_id_error . " ";?></span></p>
		<span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $quantity_error;?></span></p>
		<?php
		$sql = mysqli_query($db_connection, "SELECT * FROM inventory");
		while($row_item = mysqli_fetch_array($sql))
		{
			// checkboxes are populated by inventory table
			// when a checkbox is selected its value, which
			// is a key value pair of the item_id and price,
			// is input into the items array 
			echo "<br><input type='checkbox' name='items[".$row_item['item_id']."]' value='". $row_item['price'] ."'>" . " " . $row_item['item_id'] . " | " . $row_item['description'] . " | " . $row_item['price'] . " | " . $row_item['quantity_in_stock'] . "<br>";
			
			// When the quantity is selected for an item its 
			// value is saved to the quantity array 
			echo "Quantity to Order: <input type='number' name='quantity[]' value='' min='0' max='" .$row_item['quantity_in_stock'] ."'><br>";				
		}
		?>
		
		<!-- The total order amount get calculated and printed -->
		<br><p>Total Amount:
		<?php  
		$total = 0.0;
		if(!empty($_POST['items']) && !empty($_POST['quantity']))
		{
			// Create array to hold quantity values that are 
			// greater than 0
			$quants = array();
			foreach($_POST['quantity'] as $quant)
				{
					if($quant > 0)
						array_push($quants, $quant);
				}
			// Create key value pair array of items
			$items = $_POST['items'];
			
			$count = 0;	
			// If quants is not empty
			if(!empty($quants))
			{
				// For each key value pair in the items array
				foreach($items as $item_id => $price)
				{
					// Add price * quantity to running total
					$total += $price * $quants[$count];
					$count++; // increment count
				}
			}
			
			// Print the total in dollar format
			echo "$" . number_format($total, 2) . "<br><br>";
		}		
		?>
		
		
		<p><input type="submit" name="submit" value="Submit"></p><br>
</form>	
<?php

// close connection to larry's shoppe database
mysqli_close($db_connection);

// Include site footer
include('includes/footer.html');
?>