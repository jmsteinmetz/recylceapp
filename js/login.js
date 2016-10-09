$(function() {

	localStorage.clear();

	$(":input").on("change", function() {
        validateThis();
    });

    $("input").keypress(function(event) {
	    if (event.which == 13) {
	        event.preventDefault();

	        var email = $("#inputEmail").val();
	    	var key = $("#inputPassword").val();

	    	logMeIn(email,key);
	        
	    }
	});

    function validateThis() {
    	 if ($("#inputFirstname").val() && $("#inputLastname").val() && $("#inputEmail").val()  && $("#inputPassword").val() && $("#confirmPassword").val() ) {

			var pass2 = document.getElementById("inputPassword").value;
			var pass1 = document.getElementById("confirmPassword").value;
			if(pass1!=pass2)
			    document.getElementById("confirmPassword").setCustomValidity("Passwords Don't Match");
			else
			    document.getElementById("confirmPassword").setCustomValidity(''); 
			    $("#create").removeAttr("disabled"); 
    	 } 
    }

    function logMeIn(email,key) {

    	var user = email;
    	var pass = key;
    	var info = "email=" + user + "&userkey=" + key;

    	//console.log(info);

    	$.ajax({ 
		    type: "POST",
			data: info, 
			url: '/data/login.php', 
		    success: function(obj) // Variable data contains the data we get from JSON
		        {
		        	console.log(obj);
		        	$.each(obj.user, function(key, value) {
		        		localStorage.setItem("userid",value.userid);
		        	});
		        	//localStorage.setItem("userid",value.userid);
		        	localStorage.setItem("accesstoken",obj.token);

		        	
		        },
		    error: function() {
		    	console.log(info);
		        console.log("Error loading user.");
		    }
	    })
	    .done( function() {
	    		$(".form-signin").animate({
				    opacity: .0,
		            top: 30
				}, {
				    queue: false,
				    duration: 400,
				    complete: function() {
				        setTimeout(function() {
				            window.location.replace("/user");
				        }, 100);
				    }
				});  
	    })
    }

    $('#login').on('click', function() {

    	var email = $("#inputEmail").val();
    	var key = $("#inputPassword").val();

    	logMeIn(email,key);

    });

	$('#create').on('click', function() {
		var firstname 	= $('#inputFirstname').val();
		var lastname 	= $('#inputLastname').val();
		var handle 		= firstname.charAt(0) + lastname;
		var email 		= $('#inputEmail').val();
		var profileimg 	= "https://s3.amazonaws.com/uifaces/faces/twitter/polovecn/73.jpg"; //$('').val();
		var companyid 	= "1"; //$('').val();
		var userkey 	= $('#inputPassword').val();

		var info = "firstname=" + firstname.capitalize()
		+ "&lastname=" + lastname.capitalize()
		+ "&email=" + email.toLowerCase()
		+ "&handle=" + handle.toLowerCase()
		+ "&userkey=" + userkey 
		+ "&profileimg=" + profileimg
		+ "&companyid=" + companyid;

		$.ajax({ 
		    type: "POST",
			data: info, 
			url: '/data/createaccount.php', 
		    success: function(data) {
		        	console.log("User created successfully.")
		    },
		    error: function() {
		        console.log("Error creating user.");
		    },
		    onComplete: function() {
		    	window.location = "/";
		    }
	    })

	});


	String.prototype.capitalize = function(){
        return this.toLowerCase().replace( /\b\w/g, function (m) {
            return m.toUpperCase();
        });
    };

	

});