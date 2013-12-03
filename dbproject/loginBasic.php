<?php

	include_once('dbloginBasic.php');
	
       session_start();
        
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

	
    $username = $_POST['user_id'];
   // $username = mysqli_real_escape_string($db_connection ,$username);
    $password = $_POST['password'];
   // echo $password;
   // echo ".............";
  //  $password = mysqli_real_escape_string($db_connection ,$password);
    $password = hash('md5', $password);
  //  echo $password;
//
    $result = mysqli_query($db_connection,"SELECT * FROM login WHERE user_id = '$username'");
    $userType = mysqli_query($db_connection,"SELECT * FROM users WHERE user_id='$username'");

    $userRow= mysqli_fetch_array($userType);
//    
//    
//    
//	echo "hi";
	$row = mysqli_fetch_array($result);
	
	//echo $row['password'];
	//echo ".............";
	//echo $password;
  
    if ($row['password']!=$password){
	echo "<div class='alert alert-danger'> You have entered incorrect username and/or password information.</div>";
    }
    else if($row['password'] == $password){
	if (strcmp($userRow['user_type'],"Professor")==0){
		echo "teacherhome.html";
		$_SESSION['user_id'] = $username;
		$_SESSION['password'] = $row['password'];
		//header('Location: teacherhome.html');
	}
	else{
		echo "home.html";
		$_SESSION['user_id'] = $username;
		$_SESSION['password'] = $row['password'];
		//header('Location: home.html');
	}
    
	//echo ",$username";
  }
  
  

  

$db_connection->close();
?>