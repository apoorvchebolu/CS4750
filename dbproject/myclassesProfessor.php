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
    //echo "user_id: " . $user_id;
    //$user_id='apc5fr';

    //echo "user: $user_id<br>";
    $viewQuery = "CREATE OR REPLACE VIEW myClassView AS SELECT user_id, classes.class_id, department_name, department_id,
                           course_number, class_name, semester FROM classes INNER JOIN takes ON takes.class_id=classes.class_id
                           WHERE user_id='$user_id'";
    
    mysqli_query($db_connection,$viewQuery);
    $result = mysqli_query($db_connection,"Select * FROM myClassView");
    //echo "myClasses";
    
    $sessionQuery = "CREATE OR REPLACE VIEW mySessions AS SELECT sessions.user_id, myClassView.class_id, session_id, start_time, end_time, date
				  FROM myClassView INNER JOIN sessions ON myClassView.class_id=sessions.class_id
				  ORDER BY class_id asc";
    
    mysqli_query($db_connection,$sessionQuery);
    $sessionResult = mysqli_query($db_connection,"Select * FROM mySessions");
    
    echo "<script>
		var session_id;
		function getAddSessionID(id) {
                        session_id = id;
		}
		
	  </script>";

    
    echo "<div style='padding: 15px'>";
//	echo "<table class='table table-bordered table-striped'>";
//	echo "<th>User ID</th>";
//	echo "<th>Class ID</th>";
//	echo "<th>Department Name</th>";
//        echo "<th>Department ID</th>";
//        echo "<th>Course Number</th>";
//        echo "<th>Course Name</th>";
//        echo "<th>Semester</th>";
	
    while($row = mysqli_fetch_array($result))
      {
	
      echo "<strong>" . $row['department_id'] . " " . $row['course_number'] . ": " . $row['class_name'] . "</strong><br><br>";
	
	
	$count=0;
	while($row2 = mysqli_fetch_array($sessionResult))
	  {
	    if($row['class_id']==$row2['class_id']){
		if($count==0){
		    echo "<table class='table table-bordered table-striped'>";
		    echo "<th>Professor ID</th>";
		    //echo "<th>Class ID</th>";
		    //echo "<th>Session ID</th>";
		    echo "<th>Start Time</th>";
		    echo "<th>End Time</th>";
		    echo "<th>Days of the Week</th>";
		    echo "<th></th>";
		}
		echo "<tr>";
		//session_id, start_time, end_time, date
		echo "<td>";
		echo  $row2['user_id'];
		echo "</td>";
		//echo "<td>";
		//echo  $row2['class_id'];
		//echo "</td>";
		//echo "<td>";
		//echo  $row2['session_id'];
		//echo "</td>";
		echo "<td>";
		echo  $row2['start_time'];
		echo "</td>";
		echo "<td>";
		echo  $row2['end_time'];
		echo "</td>";
		echo "<td>";
		echo  $row2['date'];
		echo "</td>";
		
		$joinedQuery = "SELECT * FROM attends WHERE user_id='$user_id' AND session_id=" . $row2['session_id'];
		$joinedQueryResult = mysqli_query($db_connection, $joinedQuery);
		$numJoinRows = mysqli_num_rows($joinedQueryResult);
		if(!$numJoinRows){
		    //echo "<td><a href='joinSession.php?sessionID=" . $row2['session_id'] . "' type='input' id='" . $row2['session_id'] . "' onClick= 'getAddSessionID(this.id)' class='btn btn-info joinSession' >Join Session!</a></td>";
		    echo "<td><button type='input' id='" . $row2['session_id'] . "' onClick= 'getAddSessionID(this.id)' class='btn btn-info joinSession' >Join Session!</button></td>";
		} else{
		    echo "<td><button type='input' id='" . $row2['session_id'] . "' onClick= 'getAddSessionID(this.id)' class='btn btn-success joinSession' >Attending!</button></td>";
		}
		echo "</tr>";
		$count++;
	    }
	  }
	  if($count==0){
	    echo  "<em>No Sessions have been created yet!</em>";
	    echo "<br><br>";
	  }
	  mysqli_data_seek($sessionResult,0);
	  echo "</table>";
      
      
//	  echo "<tr>";
//	  echo "<td>";
//	  echo  $row['user_id'];
//	  echo "</td>";
//	  echo "<td>";
//	  echo  $row['class_id'];
//	  echo "</td>";
//	  echo "<td>";
//	  echo  $row['department_name'];
//	  echo "</td>";
//	  echo "<td>";
//	  echo  $row['department_id'];
//	  echo "</td>";
//          echo "<td>";
//	  echo  $row['course_number'];
//	  echo "</td>";
//          echo "<td>";
//	  echo  $row['class_name'];
//	  echo "</td>";
//          echo "<td>";
//	  echo  $row['semester'];
//	  echo "</td>";
      
      //echo "<td><button id='addClassID' class='btn btn-info addClass'>Add</button></td>";
      //echo"<script> alert('". $row['name_first'] . "')</script>";
      //echo "</tr>";
      }
	//echo "</table>";
	
	
//	echo "Sessions table";
//	echo "<table class='table table-bordered table-striped'>";
//	echo "<th>Professor ID</th>";
//	echo "<th>Class ID</th>";
//	echo "<th>Session ID</th>";
//        echo "<th>Start Time</th>";
//	echo "<th>End Time</th>";
//	echo "<th>Date</th>";
//	
//	while($row = mysqli_fetch_array($sessionResult))
//	  {
//	    echo "<tr>";
//	    session_id, start_time, end_time, date
//	    echo "<td>";
//	    echo  $row['user_id'];
//	    echo "</td>";
//	    echo "<td>";
//	    echo  $row['class_id'];
//	    echo "</td>";
//	    echo "<td>";
//	    echo  $row['session_id'];
//	    echo "</td>";
//	    
//	    
//	    echo "<td>";
//	    echo  $row['start_time'];
//	    echo "</td>";
//	    echo "<td>";
//	    echo  $row['end_time'];
//	    echo "</td>";
//	    echo "<td>";
//	    echo  $row['date'];
//	    echo "</td>";
//	    
//	    echo "</tr>";
//	  }
//	  echo "</table>";
    echo "</div>";
    $db_connection->close();
?>