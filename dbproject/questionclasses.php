<?php

include_once('dblogin.php');

session_start();
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

    $result = mysqli_query($db_connection,"SELECT * FROM classes");

echo "<select class='form-control' id='questionClass' name='questionClass'>";
echo "<option>Select Class to ask question about</option>";
while($row = mysqli_fetch_array($result))
  {
   echo" <option>" . $row['department_id'] . " " . $row['course_number'] . " " . $row['class_name'] . "</option>";
  }
echo "</select>";
echo "<br>";
  

$db_connection->close();
?>