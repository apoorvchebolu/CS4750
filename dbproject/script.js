$(document).ready(function(){

/*$.ajax({
	    url: 'myhours.php', 
	    data: {},
	    success: function(data){
	    $('#myhours').html(data);	
	    }
    }); */

    
  $("#addSessionButton").click(function(){
    $.ajax({
	    url: 'sessionmyclasses.php', 
	    data: {},
	    success: function(data){
	    $('#classSelect').html(data);	
	    }
    });
  });
  
  $("#questionModal").click(function(){
    $.ajax({
	    url: 'questionclasses.php', 
	    data: {},
	    success: function(data){
	    $('#questionSelects').html(data);	
	    }
    });
  });
  
  $(document).on("change", "#questionClass", function(){

    $.ajax({
	    type: 'POST',
	    url: 'questionsession.php', 
	    data: {questionClass: $('#questionClass').val()},
	    success: function(data){
	    $('#questionSession').html(data);	
	    }
    });
  });


  
  $( "#search" ).keyup(function() {
			
			$.ajax({
				url: 'searchclasses.php', 
				data: {classname: $('#search').val()},
				success: function(data){
					$('#myhours').html(data);	
				}
			});
		});
  
  $( "#update" ).keyup(function() {
			
			$.ajax({
				url: 'updatesearch.php', 
				data: {id: $('#update').val()},
				success: function(data){
					$('#updateresults').html(data);	
				}
			});
		});
  
    $("#password").keypress(function(e){
	    
       if(e.which==13){
	    $.ajax({
	    type: 'POST',
	    url: 'login.php', 
	    data: {user_id: $('#user_id').val(), password: $('#password').val()},
	    success: function(data){
			if (data==="home.html" || data==="teacherhome.html") {
				    window.location.replace(data);
				    var sessionValue = '<%=Session["user_id"]%>'
				    $('#loggedInUserID').html(sessionValue+"HI");
				    alert("sessionuser_id: "+sessionValue);
			} else {
			     $('#loginError').html(data);
			}
			
	    }
    });
       }
    });
  
    $("#loginbutton").click(function(){
	    
    $.ajax({
	    type: 'POST',
	    url: 'login.php', 
	    data: {user_id: $('#user_id').val(), password: $('#password').val()},
	    success: function(data){
			if (data==="home.html") {
				    window.location.replace(data);
			} else {
			     $('#loginError').html(data);
			}
			
	    }
    });
  });
    
// QUESTION --------------------------------------------------------------------------
    //$("#questionButton").click(function(){
    $(document).on("click", "#questionButton", function(){
      alert($('#questionSession').find(":selected").text());
       $.ajax({
	    type: 'POST',
	    url: 'questioninsert.php', 
	    data: {sessioninfo: $('#questionSession').find(":selected").text(), classinfo: $('#questionClass').val(), questionSubject: $('#questionSubject').val(), questionBody: $('#questionBody').val()},
	    success: function(data){
	    alert(data);
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
    
    $(document).on("click", ".addClass", function(){
	   
	   //alert('Value: '+class_id);
	   $.ajax({
			       url: 'addClass.php', 
			       data: {classID: class_id},
			       success: function(data){
				       alert(data);
			       },
			       error: function(data){
				   //alert("error")
			       }
		       });
	   
 });
    
     $("#myClasses").click(function(){
            
            $.ajax({
			       url: 'myclasses.php', 
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