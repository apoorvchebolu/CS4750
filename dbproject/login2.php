<?php
//	include_once('dblogin.php');
//	
//       session_start();
//        
//	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
//	if (mysqli_connect_error()) {
//		echo "Can't connect!";
//		echo "<br>" . mysqli_connect_error();
//		return null;
//	}
        
	echo "<script> alert('Hello');</script>";
	
	$username = $_GET['user_id'];
    $password = $_GET['password'];

    //$username = $_POST['user_id'];
    //$password = $_POST['password'];

//    $result = mysqli_query($db_connection,"SELECT * FROM login WHERE user_id = '$username'");
//
//
//while($row = mysqli_fetch_array($result))
//  {
//    if($row['password'] == $password){
//        header('Location: home.html');
//        $_SESSION['user_id'] = $username;
//        $_SESSION['password'] = $row['password'];
//    }else{
//        header('Location: signup.html');
//    }
//
//  }
  
  

  

//$db_connection->close();
?>