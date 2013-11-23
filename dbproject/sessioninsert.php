<?php
	include_once('dblogin.php');
	
       session_start();
        
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

    $classinfo = $_POST['sessionClass'];
    $starttime = $_POST['startTime'];
    $endtime = $_POST['endTime'];
    $days = $_POST['days'];
    $userid = $_SESSION['user_id'];
    $classid = 0;
   
//$classinfo = "CS 4720 Web and Mobile";
   
   $classdetails = explode(" ", $classinfo);
   $result = mysqli_query($db_connection,"SELECT * FROM classes WHERE department_id = '" . $classdetails[0] . "' AND course_number = '" . $classdetails[1] . "' ");
   
   
   while($row = mysqli_fetch_array($result))
  {
    $classid = $row['class_id'];
  }
   //echo $classid;

    $result = mysqli_query($db_connection,"INSERT INTO sessions VALUES ('', '$userid', '$classid', '$starttime', '$endtime', '$days')");





header('Location: teacherhome.html');
$db_connection->close();
?>