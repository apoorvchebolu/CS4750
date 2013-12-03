$(document).ready(function(){
    
    //Adds session for Professor
  $("#addSessionButton").click(function(){
    $.ajax({
	    url: 'sessionmyclassesProfessor.php', 
	    data: {},
	    success: function(data){
	    $('#classSelect').html(data);	
	    }
    });
  });
  
  // Shows modal for asking a question for Student
  $("#questionModal").click(function(){
    $.ajax({
	    url: 'questionclassesStudent.php', 
	    data: {},
	    success: function(data){
	    $('#questionSelects').html(data);	
	    }
    });
  });
  
  
  // Shows modal for viewing questions for Professor
  $("#viewQuestionsButton").click(function(){
    $.ajax({
	    url: 'viewQuestions.php', 
	    data: {},
	    success: function(data){
	    $('#viewQuestions').html(data);	
	    }
    });
  });
  
  
  
  //EXPORT CLASSSES -------------------------------------------------------
  
  $("#classExport").click(function(){
    $.ajax({
	    url: 'classexport.php', 
	    data: {},
	    success: function(data){
	    $('#sessionLocations').html(data);	
	    }
    });
  });
  
  //-------------------------------------------------------------------
  
  
  
  //ADD SESSIONS Locations-------------------------------------------------------
  $("#addSessionButton").click(function(){
    $.ajax({
	    url: 'sessionlocationsProfessor.php', 
	    data: {},
	    success: function(data){
	    $('#sessionLocations').html(data);	
	    }
    });
  });
  
  //-------------------------------------------------------------------
  
  //Adds session in question modal for Student
  $(document).on("change", "#questionClass", function(){

    $.ajax({
	    type: 'POST',
	    url: 'questionsessionStudent.php', 
	    data: {questionClass: $('#questionClass').val()},
	    success: function(data){
	    $('#questionSession').html(data);	
	    }
    });
  });
  
  // Searchs classes for Professor
  $( "#search" ).keyup(function() {
			
			$.ajax({
				url: 'searchclassesProfessor.php', 
				data: {classname: $('#search').val()},
				success: function(data){
					$('#myhours').html(data);	
				}
			});
		});
  
  // Searchs key up for Student
  $( "#searchStudent" ).keyup(function() {
			
			$.ajax({
				url: 'searchclassesStudent.php', 
				data: {classname: $('#searchStudent').val()},
				success: function(data){
					$('#myhours').html(data);	
				}
			});
		});
  
//  // 
//  $( "#update" ).keyup(function() {
//			
//			$.ajax({
//				url: 'updatesearch.php', 
//				data: {id: $('#update').val()},
//				success: function(data){
//					$('#updateresults').html(data);	
//				}
//			});
//		});

  // Checks if password is accurate
  $("#password").keypress(function(e){
	  
     if(e.which==13){
	  $.ajax({
	  type: 'POST',
	  url: 'loginBasic.php', 
	  data: {user_id: $('#user_id').val(), password: $('#password').val()},
	  success: function(data){
		      if (data==="home.html" || data==="teacherhome.html") {
				  window.location.replace(data);
		      } else {
			   $('#loginError').html(data);
		      }
		      
		      //if (data.charAt(0)=="<") {
		      //  $('#loginError').html(data);
		      //} else{
		      //  var array = data.split(",");
		      //  window.location.assign(array[0]);
		      //  alert(array[1]);
		      //  
		      //  $(window).on( "load",function(){
		      //      alert("loaded");
		      //  });
		      //  
		      //  //$(document).on(null, null, array[1], function(){
		      //  //  alert("hi");
		      //  //  $("#loggedInUserID").html(array[1]);
		      //  //});
		      //  
		      //}
		      
	  }
  });
     }
  });

  //Logins in to Student/Professor
  $("#loginbutton").click(function(){
	  //alert ("test");
  $.ajax({
	  type: 'POST',
	  url: 'loginBasic.php', 
	  data: {user_id: $('#user_id').val(), password: $('#password').val()},
	  success: function(data){
		      if (data==="home.html"|| data==="teacherhome.html") {
				  window.location.replace(data);
		      } else {
			   $('#loginError').html(data);
		      }
		      
	  }
  });
});
    
  // Asks questions for Student --------------------------------------------------------------------------
  //$("#questionButton").click(function(){
  $(document).on("click", "#questionButton", function(){
    //alert($('#questionSession').find(":selected").text());
     $.ajax({
	  type: 'POST',
	  url: 'questioninsertStudent.php', 
	  data: {sessioninfo: $('#questionSession').find(":selected").text(), classinfo: $('#questionClass').val(), questionSubject: $('#questionSubject').val(), questionBody: $('#questionBody').val()},
	  success: function(data){
	    alert("You've successfully asked a question!");
	  },
    });
    
    $('#questionSubject').val('');
    $('#questionBody').val('');
       
  });
    
    //-------------------------------------------------------------------------------

    //$(document).on("click", "#addSession", function(){
    
 /* $("#addSession").click(function(){
	   $.ajax({
			       type: 'POST',
			       url: 'sessioninsert.php', 
			       data: {sessionClass: $('#sessionClass').val(), startTime: $('#startTime').val(), endTime: $('#endTime').val(), days: $('#days').val()},
			       success: function(data){
			       },
		       });
	   
 }); */
    
    
    
    
  //Apoorv's Methods------------------------------------------------------------
  //Adds professors classes to myClasses
  $(document).on("click", ".addClass", function(e){
	 
	 //alert('Value: '+class_id);
	 $.ajax({
		  url: 'addClassProfessor.php', 
		  data: {classID: class_id},
		  success: function(data){
			  if (data=="success") {
			    $(e.target).html("Added!");
			    $(e.target).attr('class', 'btn btn-success addClass');
			  } /*else{
			    $(e.target).html("Error!");
			    $(e.target).attr('class', 'btn btn-danger addClass');
			  }*/
		  },
		  error: function(data){
		      //alert("error")
		  }
	  });
	 
  });
  
  //Adds students classes to myClasses
  $(document).on("click", ".addClassStudent", function(e){
	 
	 //alert('Value: '+class_id);
	 $.ajax({
		  url: 'addClassStudent.php', 
		  data: {classID: class_id},
		  success: function(data){
			  if (data=="success") {
			    $(e.target).html("Added!");
			    $(e.target).attr('class', 'btn btn-success addClass');
			  } /*else{
			    $(e.target).html("Error!");
			    $(e.target).attr('class', 'btn btn-danger addClass');
			  }*/
		  },
		  error: function(data){
		      //alert("error")
		  }
	  });
	 
  });
  
  //Joins session for professor
  $(document).on("click", ".joinSession", function(e){
	
	//alert('Value: '+session_id);
	$.ajax({
		 url: 'joinSessionProfessor.php', 
		 data: {sessionID: session_id},
		 success: function(data){
			  if (data=="success") {
			    $(e.target).html("Attending!");
			    $(e.target).attr('class', 'btn btn-success joinSession');
			  } /*else{
			    $(e.target).html("Error!");
			    $(e.target).attr('class', 'btn btn-danger joinSession');
			  }*/
			  
			 //this.html("You've Joined this session!");
		 },
		 error: function(data){
		     //alert("error")
		 }
	 });
	
  });
  
  //Joins session for student
  $(document).on("click", ".joinSessionStudent", function(e){
	
	//alert('Value: '+session_id);
	$.ajax({
		 url: 'joinSessionStudent.php', 
		 data: {sessionID: session_id},
		 success: function(data){
			  if (data=="success") {
			    $(e.target).html("Attending!");
			    $(e.target).attr('class', 'btn btn-success joinSession');
			  } /*else{
			    $(e.target).html("Error!");
			    $(e.target).attr('class', 'btn btn-danger joinSession');
			  }*/
			  
			 //this.html("You've Joined this session!");
		 },
		 error: function(data){
		     //alert("error")
		 }
	 });
	
  });
  
  //Shows myClasses for Professor
   $("#myClassesProfessor").click(function(){
	  
	  $.ajax({
		  url: 'myclassesProfessor.php', 
		  success: function(data){
			  $('#myhours').html(data);
			  
		  }
	  });
   });
   
   //Shows myClasses for Student
   $("#myClassesStudent").click(function(){
	  
	  $.ajax({
		  url: 'myclassesStudent.php', 
		  success: function(data){
			  $('#myhours').html(data);        
		  }
	  });
   });
     
     //---------------------------------------------------------------------------------
    
    
    
    //KEEP THESE AT THE BOTTOM OF THIS FILE
    $("#startTime").timepicker();
    $("#endTime").timepicker();

});