<?

	include_once('dbloginProfessor.php');
	
       session_start();
        
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

    $startTime = $_POST['startTime'];
    $startTime = mysqli_real_escape_string($db_connection ,$startTime);
    //echo $startTime;
    
    $result = mysqli_query($db_connection,"INSERT INTO `cs4750apc5fr`.`locations`( `location_name`) VALUES ('$startTime')");
    header('Location: teacherhome.html');
    

$db_connection->close();
?>