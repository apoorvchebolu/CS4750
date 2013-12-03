<?php

include_once('dbloginProfessor.php');

session_start();
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

	
	
    $user_id=$_SESSION['user_id'];
    $result = mysqli_query($db_connection,"SELECT * FROM locations");

echo "<select class='form-control' id='sessionLocation' name='sessionLocation'>";
//echo "<option>Select Class to ask question about</option>";
while($row = mysqli_fetch_array($result))
  {
   echo" <option>" . $row['location_name'] . "</option>";
  }
echo "</select>";
echo "<br>";
  

$db_connection->close();
?>