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
    
    echo $subject;
    echo " ";
    echo $questionbody;
    echo " ";
    echo $userid;
    echo " ";
    echo $sessioninfo;
    echo $classinfo;
    echo " ";
    echo $sessioninfo;
    echo " ";

   //$result = mysqli_query($db_connection,"INSERT INTO questions VALUES ('', '$userid', '$subject', '$questionbody')");

$db_connection->close();
?>