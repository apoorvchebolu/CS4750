<?php
    include_once('dbloginBasic.php');
    session_start();
    $db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
    if (mysqli_connect_error()) {
	    echo "Can't connect!";
	    echo "<br>" . mysqli_connect_error();
	    return null;
    }
    
    $user_id=$_SESSION['user_id'];
    
    $userNameQuery = "SELECT * FROM users WHERE user_id='$user_id'";
    $result = mysqli_query($db_connection, $userNameQuery);
    $row = mysqli_fetch_array($result);
    
    echo $user_id . "," . $row['name_first'] . " " . $row['name_last'] . "," . $row['user_type'];
    
    $db_connection->close();
?>