<?php
    include_once('dbloginStudent.php');
    session_start();
    $db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
    if (mysqli_connect_error()) {
            echo "Can't connect!";
            echo "<br>" . mysqli_connect_error();
            return null;
    }
    
    $user_id=$_SESSION['user_id'];
    $session_id=$_GET['sessionID'];
    //echo "You clicked: ".$class_id;
    
    $query = "INSERT INTO attends VALUES ('$user_id'," . $session_id . ")";
    $result = mysqli_query($db_connection,$query);
    
    if($result){
    echo "success";
    } else{
        echo "error";
    }
    
    $db_connection->close();
?>