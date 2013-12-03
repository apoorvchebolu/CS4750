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
    $result = mysqli_query($db_connection,"SELECT `subject`, `question_text` 
			FROM `questions`
			JOIN asks ON questions.question_id= asks.question_id
			JOIN sessions ON asks.session_id = sessions.session_id
			WHERE sessions.user_id= '$user_id'");


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