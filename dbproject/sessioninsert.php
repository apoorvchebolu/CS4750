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
    $location = $_POST['sessionLocation'];
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

    
    
    
    
    //GETTING LOCATION ID------------------------------------
    
    $result = mysqli_query($db_connection,"Select * FROM locations WHERE location_name = '$location'");


while($row = mysqli_fetch_array($result))
  {
    $locationid = $row['location_id'];
  } 
  
     //-------------------------------------------------
  
  
  
  //GETTING SESSION ID------------------------------------
    
    $result = mysqli_query($db_connection,"Select * FROM sessions WHERE class_id = '$classid' AND start_time = '$starttime' AND end_time = '$endtime' AND date = '$days'");


while($row = mysqli_fetch_array($result))
  {
    $sessionid = $row['session_id'];
  } 
  
     //-------------------------------------------------
  
      $result = mysqli_query($db_connection,"INSERT INTO hostedAt VALUES ('$sessionid', '$locationid')");

echo 

header('Location: teacherhome.html');
$db_connection->close();
?>