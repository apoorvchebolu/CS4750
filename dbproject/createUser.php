<?php

include_once('dblogin.php');

session_start();
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}
    

   $username = htmlspecialchars($_POST['inputUserid']);;
   $username = mysqli_real_escape_string($db_connection ,$username);
    //echo "<script type='text/javascript'>alert('$username');</script>";
    $password = htmlspecialchars($_POST['inputPassword']);;
    $password = mysqli_real_escape_string($db_connection ,$password);
    //echo "<script type='text/javascript'>alert('$password');</script>";
    $type= htmlspecialchars($_POST['inputUserType']);;
    $type = mysqli_real_escape_string($db_connection ,$type);
    //echo "<script type='text/javascript'>alert('$type');</script>";
    $firstName = htmlspecialchars($_POST['inputFirstname']);;
    $firstName = mysqli_real_escape_string($db_connection ,$firstName);
    //echo "<script type='text/javascript'>alert('$firstName');</script>";
    $lastName = htmlspecialchars($_POST['inputLastname']);;
    $lastName = mysqli_real_escape_string($db_connection ,$lastName);
   // echo "<script type='text/javascript'>alert('$lastName');</script>";
    $email = htmlspecialchars($_POST['inputEmail']);;
    $email = mysqli_real_escape_string($db_connection ,$email);
    //echo "<script type='text/javascript'>alert('$email');</script>";
   
   $result = mysqli_query($db_connection,"INSERT INTO users
                         VALUES ('$username','$type','$lastName' ,'$firstName','$email')");
   
   
   $password= hash('md5', '$password');
    
    $passwordUser= mysqli_query($db_connection,"INSERT INTO `cs4750apc5fr`.`login` (`user_id`, `password`) VALUES ('$username', '$password')");
    
 //  $result = mysqli_query($db_connection,"INSERT INTO `cs4750apc5fr`.`users` (`user_id`, `user_type`, `name_last`, `name_first`, `email`)
  //                        VALUES ('". mysql_real_escape_string($username)."', 'HardCodedUserType', 'HardCodedUserLastName', 'HardCodedUserFirstName', 'HardcodedUserEmail');");
    

    //if($db_connection->query($result)){
    //    echo "Your information has successfully added!";
    //    header('Location: home.html');
    //}
    //else{
    //  //  echo "Error: ".$db_connection->error;
    //   echo "<script type='text/javascript'>alert('"Error: Try again"');</script>";
    //}

/*while($row = mysqli_fetch_array($result))
  {
   
  }*/

header('Location: index.html');
$db_connection->close();
?>