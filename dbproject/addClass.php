<?php

    include_once('dblogin.php');
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}
    $class_id=$_GET['classID'];
    //echo "You clicked: ".$class_id;
    
    $result = mysqli_query($db_connection,"INSERT INTO takes VALUES ('apc5fr',$class_id)");
    echo "Successfully added to myClasses!";
    
$db_connection->close();
?>