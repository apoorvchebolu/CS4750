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
    $class_id=$_GET['classID'];
    //echo "You clicked: ".$class_id;
    
    $query = "INSERT INTO takes VALUES ('$user_id'," . $class_id . ")";
    $result = mysqli_query($db_connection,$query);
    
    if($result){
    echo "Successfully added to myClasses!";
     } else{
        echo "Something went wrong!";
    }
    
    $db_connection->close();
?>