<?php

include_once('dblogin.php');
	
	$db_connection = new mysqli($SERVER, $USER, $PASS, $DB);
	if (mysqli_connect_error()) {
		echo "Can't connect!";
		echo "<br>" . mysqli_connect_error();
		return null;
	}

    $classname = explode(" ", $_GET['classname']);
    
    $department_id = $classname[0];
    $course_number = $classname[1];
    
    //echo "department_id: " . $department_id . "<br>";
    //echo "course num: " . $course_number;
    
    if($department_id=="")
	echo "You can search for classes by typing a course name. For example, 'CS 4750'";
    else{

    //$result = mysqli_query($db_connection,"SELECT * FROM classes WHERE class_name LIKE '%$classname%'");
    $result = mysqli_query($db_connection,"SELECT * FROM classes WHERE department_id LIKE '$department_id%'
			   AND course_number LIKE '$course_number%'");

    //echo"<script> alert('$classname')</script>";
    echo "<script>
		var class_id;
		function getAddClassID(id) {
                        class_id = id;
		}
	  </script>";

	echo "<div style='padding: 15px'>";
	echo "<table class='table table-bordered table-striped'>";
	echo "<th>Department ID</th>";
	echo "<th>Course Number</th>";
	echo "<th>Class Name</th>";
	echo "<th></th>";
	
	while($row = mysqli_fetch_array($result))
	  {
	  echo "<tr>";
	  echo "<td>";
	  echo  $row['department_id'];
	  echo "</td>";
	  echo "<td>";
	  echo  $row['course_number'];
	  echo "</td>";
	  echo "<td>";
	  echo  $row['class_name'];
	  echo "</td>";
	  echo "<td><button type='input' id='" . $row['class_id'] . "' onClick= 'getAddClassID(this.id)' class='btn btn-info addClass' >Add</button></td>";
	  //echo "<td><button id='addClassID' class='btn btn-info addClass'>Add</button></td>";
	  //echo"<script> alert('". $row['name_first'] . "')</script>";
	  echo "</tr>";
	  }
	echo "</table>";
	echo "</div>";
    }

$db_connection->close();
?>