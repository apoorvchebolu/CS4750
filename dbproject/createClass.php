<?php

include_once('dblogin.php');

session_start();
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}
    

   $departmentName = htmlspecialchars($_POST['inputDepartmentname']);;
   $departmentName = mysqli_real_escape_string($db_connection ,$departmentName);
   
   $departmentID = htmlspecialchars($_POST['inputDepartmentid']);;
   $departmentID = mysqli_real_escape_string($db_connection ,$departmentID);
   
   $profId = $_SESSION['user_id'];
 
   $courseNumber = htmlspecialchars($_POST['inputCoursenumber']);;
   $courseNumber = mysqli_real_escape_string($db_connection ,$courseNumber);
   
   $className = htmlspecialchars($_POST['inputClassname']);;
   $className = mysqli_real_escape_string($db_connection ,$className);
   
   $semster = htmlspecialchars($_POST['inputSemster']);;
   $semster = mysqli_real_escape_string($db_connection ,$semster);
   
   $year = htmlspecialchars($_POST['inputYear']);;
   $year = mysqli_real_escape_string($db_connection ,$year);
   
   $semsterYear= $semster." ".$year;
   
   
   
   
   
 
   
   $addClassSQL = mysqli_query($db_connection,"INSERT INTO classes
                         VALUES (NULL,'$departmentName','$departmentID','$courseNumber' ,'$className','$semsterYear')");
   
   
   
   
   $findClassIDSQL = mysqli_query($db_connection,"SELECT * FROM classes WHERE
      department_id = '$departmentID' AND course_number = '$courseNumber' ");
   
   
    $row = mysqli_fetch_array($findClassIDSQL);
  
    $classID= $row['class_id'];
   // echo $classID;
    
    $insertTakeSQL= mysqli_query($db_connection,"INSERT INTO takes
                                 VALUES ('$profId','$classID')");
   
   
header('Location: teacherhome.html');
$db_connection->close();
?>