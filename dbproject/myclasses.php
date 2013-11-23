<?php
    include_once('dblogin.php');
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}
        
    //$user_id=$_SESSION['user_id'];
    $user_id='apc5fr';

    //echo "user: $user_id<br>";
    
    $result = mysqli_query($db_connection,"SELECT user_id, classes.class_id, department_name, department_id,
                           course_number, class_name, semester FROM classes INNER JOIN takes ON takes.class_id=classes.class_id
                           WHERE user_id='$user_id'");
    //echo "myClasses";
    
    echo "<div style='padding: 15px'>";
	echo "<table class='table table-bordered table-striped'>";
	echo "<th>User ID</th>";
	echo "<th>Class ID</th>";
	echo "<th>Department Name</th>";
        echo "<th>Department ID</th>";
        echo "<th>Course Number</th>";
        echo "<th>Course Name</th>";
        echo "<th>Semester</th>";
	
	while($row = mysqli_fetch_array($result))
	  {
	  echo "<tr>";
	  echo "<td>";
	  echo  $row['user_id'];
	  echo "</td>";
	  echo "<td>";
	  echo  $row['class_id'];
	  echo "</td>";
	  echo "<td>";
	  echo  $row['department_name'];
	  echo "</td>";
	  echo "<td>";
	  echo  $row['department_id'];
	  echo "</td>";
          echo "<td>";
	  echo  $row['course_number'];
	  echo "</td>";
          echo "<td>";
	  echo  $row['class_name'];
	  echo "</td>";
          echo "<td>";
	  echo  $row['semester'];
	  echo "</td>";
          
	  //echo "<td><button id='addClassID' class='btn btn-info addClass'>Add</button></td>";
	  //echo"<script> alert('". $row['name_first'] . "')</script>";
	  echo "</tr>";
	  }
	echo "</table>";
	echo "</div>";
    
    $db_connection->close();
?>