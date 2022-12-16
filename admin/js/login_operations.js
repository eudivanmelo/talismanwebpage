$('document').ready(function(){

	$("#loginConfirm").click(function(){
		var data = $("#loginForm").serialize();
		
		$.ajax({
			type : 'POST',
			url  : "functions/login-validation.php",
			data : data,
			dataType: 'json',
			beforeSend: function()
			{	
				$("#loginConfirm").html('Validating...');
			},
			success: function(response){						
				if(response.code == "success"){	
					$("#loginConfirm").html('Sign in');
					$("#loginAlert").html('');
					window.location.href = "index.php";
				}
				else{			
					$("#loginConfirm").html('Sign in');
					$("#loginAlert").html(response.message);
				}
		    }
		});
	});

});