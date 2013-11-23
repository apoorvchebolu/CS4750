<?php

include_once('dblogin.php');

session_start();
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

    $classinfo = $_POST['questionClass'];
    
    $classdetails = explode(" ", $classinfo);
    $result = mysqli_query($db_connection,"SELECT * FROM classes WHERE department_id = '" . $classdetails[0] . "' AND course_number = '" . $classdetails[1] . "' ORDER BY department_id ASC");
   
   
   while($row = mysqli_fetch_array($result))
  {
    $classid = $row['class_id'];
  }
    
    $result = mysqli_query($db_connection,"SELECT * FROM sessions WHERE class_id = '$classid'");



echo "<select class='form-control' id='questionSession' name='questionSession'>";
echo "<option>Select Session For This Class</option>";

while($row = mysqli_fetch_array($result))
  {
   echo" <option>" . $row['start_time'] . "-" . $row['end_time'] . "</option>";

  }
echo "</select>";
echo "<br>";


$db_connection->close();
?>