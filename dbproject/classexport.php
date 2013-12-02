<?php

include_once('dblogin.php');

session_start();
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

	
	
    $user_id=$_SESSION['user_id'];
    
    $result = mysqli_query($db_connection,"SELECT * FROM classes INNER JOIN takes ON classes.class_id = takes.class_id WHERE user_id = '$user_id'");

while($row = mysqli_fetch_array($result))
  {
    
   $arr = array('department_id' => $row['department_id'], 'course_number' => $row['course_number'],
                     'class_name' => $row['class_name']);
   $json[]=$arr; 
  }
  
  echo json_encode($json);

  

$db_connection->close();
?>