<?php

include_once('dbloginProfessor.php');

session_start();
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}
	$username=$_SESSION['user_id'];

    $result = mysqli_query($db_connection,"SELECT * FROM classes
			INNER JOIN takes ON takes.class_id=classes.class_id
			WHERE 	takes.user_id='$username'");

echo "<select class='form-control' id='sessionClass' name='sessionClass'>";

while($row = mysqli_fetch_array($result))
  {
   echo" <option>" . $row['department_id'] . " " . $row['course_number'] . " " . $row['class_name'] . " (" . $row['class_id'] . ")" . "</option>";


  }
echo "</select>";
  

$db_connection->close();
?>