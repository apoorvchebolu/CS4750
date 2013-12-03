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
    $result = mysqli_query($db_connection,"SELECT * FROM questions");


while($row = mysqli_fetch_array($result))
  {
   echo "<div class='well'>";
   echo "<b>Subject </b><br>" . $row['subject'];
   echo "<br> -----------------------------------------------------------------------------<br>";
   echo "<b>Question </b><br>" . $row['question_text'];
   echo "</div>";
  }
  

$db_connection->close();
?>