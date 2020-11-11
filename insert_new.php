<!-- Larry's Shoppe - insert_new.php 
	Jacob Baynes
	3/17/2019	This is my original work -->

<?php

// Set page title and include the site header file
$page_title = "Create New Customer";
include('includes/header.html');


//connect to the larrys shoppe Database
include "db_connect.php";

// Declare variables for errors and for customer info
$f_name_error = $l_name_error = $street_error = $city_error = $state_error = $zip_error = $phone_error = $email_error = "";
$firstName = $lastName = $street = $city = $state = $zip = $phone = $email = "";

// If server request method is post check if each text field is not emtpy
// or else display error message.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_REQUEST["first_name"])) {
		$firstName = test_input($_REQUEST['first_name']);
	} else {
		$firstName = NULL;
		$f_name_error = " Valid First Name is Required";
	}
	
	if(!empty($_REQUEST["first_name"])) {
		$lastName = test_input($_REQUEST['last_name']);
	} else {
		$lastName = NULL;
		$l_name_error = " Valid Last Name is Required";
	}
	
	if(!empty($_REQUEST["street"])) {
		$street = test_input($_REQUEST['street']);
	} else {
		$street = NULL;
		$street_error = " Valid Street Name is Required";
	}
	
	if(!empty($_REQUEST["city"])) {
		$city = test_input($_REQUEST['city']);
	} else {
		$city = NULL;
		$city_error = " Valid City Name is Required";
	}
	
	if(!empty($_REQUEST["state"])) {
		$state = test_input($_REQUEST['state']);
	} else {
		$state = NULL;
		$state_error = " Valid State is Required";
	}
	
	if(!empty($_REQUEST["zip"])) {
		$zip = test_input($_REQUEST['zip']);
	} else {
		$zip = NULL;
		$zip_error = " Valid Zip is Required";
	}
	
	if(!empty($_REQUEST["phone"])) {
		$phone = test_input($_REQUEST['phone']);
	} else {
		$phone = NULL;
		$phone_error = " Valid Phone Number is Required";
	}
	
	if(!empty($_REQUEST["email"])) {
		$email = test_input($_REQUEST['email']);
	} else {
		$email = NULL;
		$email_error = " Valid Email Address is Required";
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

// If all customer data is valid than create sql statement
if ($firstName && $lastName && $street && $city && $state && $zip && $phone && $email) 
{
	//sql insert command
	$sql = "INSERT INTO customers(first_name, last_name, street, city, state, zip, phone, email)
	VALUES('$firstName', '$lastName', '$street', '$city', '$state', '$zip', '$phone', '$email')";

	//run query and display results
	if (isset($_POST['submit'])) 
	{
		if (mysqli_query($db_connection, $sql))
		{
			$f_name_error = " Customer File Created";
		}
		else
		{
			echo "Error: ".$sql."<br>".mysqli_error($db_connection);
		}
	}	
}


?>

<!-- HTML Form for creating new customers -->
<div class="page-header" style="background-color: #000000; text-align: center;";><img class="img-thumbnail" src="images/header_photo.jpg" alt="Larry's Shoppe Nav Bar Photo" style="margin: auto; height: 60%; width: 60%;"><h1 style="color: white">Create New Customer</h1></div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // post to self?>" method="post" style="margin: auto; width: 700px">
	
		<legend>Customer Information</legend>
		
			<p><span class="text-danger"><img src="images/small_bowtie.jpg" alt="small bow tie"> required field</span></p>
		
			<p>First Name: <input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $f_name_error;?></span></p><br>
			
			<p>Last Name: <input type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $l_name_error;?></span></p><br>
			
			<p>Street: <input type="text" name="street" value="<?php if(isset($_POST['street'])) echo $_POST['street']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $street_error;?></span></p><br>
			
			<p>City: <input type="text" name="city" value="<?php if(isset($_POST['city'])) echo $_POST['city']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $city_error;?></span></p><br>
			
			<p>State: <input type="text" name="state" value="<?php if(isset($_POST['state'])) echo $_POST['state']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $state_error;?></span></p><br>
			
			<p>Zip: <input type="text" name="zip" value="<?php if(isset($_POST['zip'])) echo $_POST['zip']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $zip_error;?></span></p><br>
			
			<p>Phone: <input type="text" name="phone" value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $phone_error;?></span></p><br>
			
			<p>Email: <input type="text" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $email_error;?></span></p><br>
                    
			<p><input type="submit" name="submit" value="Submit"></p><br><br>
</form>	


<?php
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

//close the database
mysqli_close($db_connection);

// Include site footer
include('includes/footer.html');
?>