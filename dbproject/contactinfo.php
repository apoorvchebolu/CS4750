<?php
    include_once('dblogin.php');
    
    $db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
    if (mysqli_connect_error()){
        echo "Can't connect";
        echo '<br>'.mysql_connect_error();
        return null;
    }
    
    //echo "Connect Successful!<br>";
    
    $computingID = $_GET['computingID'];
    $name_last = $_GET['name_last'];
    $name_first = $_GET['name_first'];
    $phoneNum = $_GET['phoneNum'];
    
    $insertQuery = "INSERT INTO contact_Info (computingID, name_last, name_first, phoneNum)
                   VALUES ('$computingID', '$name_last', '$name_first', '$phoneNum')";
    
    if($db_connection->query($insertQuery)){
        //echo "1 record added!<br>";
        echo "Your information has been successfully added!";
    }
    else{
        echo "Error: ".$db_connection->error;
        //printf("Error: %s\n", $db_connection->error);
    }
    
    //echo "Closing connection...";
    
    $db_connection->close();
?>