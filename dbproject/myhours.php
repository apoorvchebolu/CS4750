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

echo "<h4 style='width: 300px'>Office Hours for My Classes:</h4>";
echo "<table class='table table-bordered table-striped' style='width:600px'>
        <th>Class Name</th>
        <th>TA Names</th>
        <th>Day</th>
        <th>Time</th>
        <th>Location</th>";


while($row = mysqli_fetch_array($result))
  {
   echo" <tr>
            <td>" . $row['department_id'] . " " . $row['course_number'] . "</td>
            <td>Donald Draper</td>
            <td>MW</td>
            <td>2-3pm</td>
            <td>Thorton Stacks</td>            
        </tr>";


  }
echo "</table>";
  

$db_connection->close();
?>