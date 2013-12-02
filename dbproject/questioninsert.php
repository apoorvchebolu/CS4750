<?php
	include_once('dblogin.php');
	
       session_start();
        
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

    $subject = $_POST['questionSubject'];
    $questionbody = $_POST['questionBody'];
    $classinfo = $_POST['classinfo'];
    $sessioninfo = $_POST['sessioninfo'];
    $userid = $_SESSION['user_id'];
    
   $classdetails = explode(" ", $classinfo);
   $result = mysqli_query($db_connection,"SELECT * FROM classes WHERE department_id = '" . $classdetails[0] . "' AND course_number = '" . $classdetails[1] . "' ");
   
   while($row = mysqli_fetch_array($result))
  {
    $classid = $row['class_id'];
  }
  
  $sessionTimes = explode("-", $sessioninfo);

  $result = mysqli_query($db_connection,"SELECT * FROM sessions WHERE class_id = '" . $classid . "' AND start_time = '" . $sessionTimes[0] . "' AND end_time ='" . $sessionTimes[1] . "'");

   while($row = mysqli_fetch_array($result))
  {
    $sessionid = $row['session_id'];
  }
    

   $result = mysqli_query($db_connection,"INSERT INTO questions VALUES ('', '$userid', '$subject', '$questionbody')");
   
   $result = mysqli_query($db_connection,"SELECT * FROM questions WHERE user_id = '" . $userid . "' AND subject = '" . $subject . "' AND question_text ='" . $questionbody . "'");

   while($row = mysqli_fetch_array($result))
  {
    $questionid = $row['question_id'];
  }
  
     $result = mysqli_query($db_connection,"INSERT INTO asks VALUES ('$questionid', '$sessionid')");

   
   

$db_connection->close();
?>