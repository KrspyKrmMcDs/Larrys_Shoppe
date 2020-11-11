<!-- Larry's Shoppe - delete_employee.php
	Jacob Baynes-
	
	3/29/2019	This is my original work -->
	
<?php

// Set page title and include header file
$page_title = "Delete Employee Account";
include('includes/header.html');

//connect to the larrys shoppe Database
include "db_connect.php";

// Declare error variables and emplyee variables
$emp_id_error = $f_name_error = $l_name_error = "";
$employee_id = $firstName = $lastName = "";

// If form method equals post than check if username and password are
// empty, if not, send both to test_input function.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if(!empty($_REQUEST["emp_id"])) {
		$employee_id = test_input($_REQUEST['emp_id']);
	} else {
		$employee_id = NULL;
		$emp_id_error = " Valid Employee ID is Required";
	}
	
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

// If all employee info is filled than create sql statement
if($employee_id && $firstName && $lastName)
{
	//sql insert command
	$sql = "DELETE FROM employees WHERE emp_id='$employee_id' AND first_name='$firstName' AND last_name='$lastName';";
	

	//run query and display results
	if (isset($_POST['submit'])) 
	{	
		if(mysqli_query($db_connection, $sql))
		{
			$emp_id_error = " Employee Account Deleted";
		}
		else
		{
		echo "Error: ".$sql."<br>".mysqli_error($db_connection);
		}
	
	}
}
?>

<!-- HTML form for deleting customers -->
<div class="page-header" style="background-color: #330000; text-align: center;";><img class="img-thumbnail" src="images/employee_photo.jpg" alt="Larry's Shoppe Nav Bar Photo" style="margin: auto; height: 40%; width: 40%;"><h1 style="color: white">Delete Employee</h1></div>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); // post to self?>" method="post" style="margin: auto; width: 700px">
    <legend>Employee Information</legend>
		<p>Please enter the ID, first name, and last name of the employee you want to delete.</p>
		<p><span class="text-danger"><img src="images/small_bowtie.jpg" alt="small bow tie"> required field</span></p>
		
		<p>Employee ID: <input type="text" name="emp_id" value="<?php if(isset($_POST['emp_id'])) echo $_POST['emp_id']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $emp_id_error;?></span></p><br>
		
        <p>First Name: <input type="text" name="first_name" value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $f_name_error;?></span></p><br>
		
        <p>Last Name: <input type="text" name="last_name" value="<?php if(isset($_POST['last_name'])) echo $_POST['last_name']; ?>"><span class="text-danger"> <img src="images/small_bowtie.jpg" alt="small bow tie"><?php echo $l_name_error;?></span></p><br>
                    
        <p><input type="submit" name="submit" value="Submit"></p><br>
</form>	

<?php 
// Display the employees table
$queryTable = "SELECT * FROM employees";	
mysqli_query($db_connection, $queryTable) or die('Error querying database.');
$result = mysqli_query($db_connection, $queryTable);
	
echo "<h3>Employees</h3>";
echo "<table>";
echo "<tr>";
echo "<th>Employee ID</th>";
echo "<th>Date</th>";
echo "<th>First Name</th>";
echo "<th>Last Name</th>";
echo "<th>Phone</th>";
echo "<th>Email</th>";
echo "</tr>";
while ($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	echo "<td>".$row['emp_id']."</td>";
	echo "<td>".$row['date']."</td>";
	echo "<td>".$row['first_name']."</td>";
	echo "<td>".$row['last_name']."</td>";
	echo "<td>".$row['phone']."</td>";
	echo "<td>".$row['email']."</td>";
}
echo "</table>";
//close the database
mysqli_close($db_connection);

// include site footer
include('includes/footer.html');
?>