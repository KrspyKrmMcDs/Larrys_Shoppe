<?php

$db_connection = mysqli_connect('localhost', 'root', 'ryGHqvrX7YCXEB8', 'larrys_shoppe');

if($db_connection){
}
else{
    echo '<script language="javascript">';
	echo 'alert("Error conneecting to database")';
	echo '</script>';
}
    
?>