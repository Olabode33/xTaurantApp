<!DOCTYPE html>
<html lang="en">
	<?php
		include ("includes/head.php");
	?>
	
	<body style="background-color:cornsilk;">
		<div class="container">
			<div style="margin-top:3%">				
				<img src="img/sc_logo.jpg" class="img-responsive thumbnail" style="margin: 0 auto">
			</div>
			<div style="margin-top: 3%">
				<form id="loginform" method="post" action="api/user/login/">
					<div style="padding-left:35%; padding-right:35%">
						<div class="alert alert-info hidden" role="alert" id="login_alert">
							<i class="fa fa-info-circle"></i> 
							<span id="login_msg">

							</span>
						</div>
						<div class="form-group">
							<label class="sr-only" for="username">Username</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-user-circle"></i>
								</div>
								<input type="text" placeholder="Username" name="username" id="username" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="sr-only" for="password">Password</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-key"></i>
								</div>
								<input type="password" placeholder="Password" name="password" id="password" class="form-control" required>
							</div>
						</div>
						<div class="form-group">
							<label class="sr-only" for="password">Password</label>
							<div class="input-group">
								<div class="input-group-addon">
									<i class="fa fa-map-marker">&nbsp;</i>
								</div>
								<select class="form-control" Required id="branch" name="branch">
									<option value="">Select a Branch</option>
									<option value="VI">VI Branch</option>
									<option value="Ikeja">Ikeja Branch</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<button type="submit" style="color:white;" class="btn btn-block sctheme">
								Login <i class="fa fa-sign-in" id="login_icon"></i>
							</button> 
						</div>
						<div class="form-group">
							<a style="background-color:gray; color:white;" class="btn btn-block">Forgot password <i class="fa fa-question-circle"></i></a>
						</div>
					</div>
				</form>
			</div>
		</div>

  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="js/jquery-2.1.4.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    
	
	<script>
		$(document).ready(function() {
			var login_msg = location.search;
			login_msg = login_msg.split("=");
			login_msg = login_msg[1];
			console.log(login_msg);
			
			if(login_msg != undefined){
				$("#login_alert").removeClass("hidden");
				
				if(login_msg == "logout")
					$("#login_msg").html("Logged Out Successfully");
				if(login_msg == "loginerr")
					$("#login_msg").html("Please login to access the system");
				if(login_msg == "changepass")
					$("#login_msg").html("Password changed successfully!<br>Please Login again with you new passwordy");
			}
		});
	
		$("#loginform").submit(function(e) { 
			e.preventDefault();
			
			$("#login_icon").removeClass("fa-sign-in");
			$("#login_icon").addClass("fa-spinner fa-pulse");
			
			$.ajax({
				//url: $('#myform').attr('action'),
				//url: 'api/user/login/', api/Controllers/Customers_RestController.php?view=all
				url: 'api/Controllers/Users_RestController.php?view=login',
				type: 'post',
				//dataType: 'application/json',
				//data: $('#myForm').serialize(),
				data : {
					'username' : $('#username').val(),
					'password' : $('#password').val(),
					'branch': $("#branch").val()
				},
				success: function(data) {
				   //alert (data);
				   data = $.parseJSON(data);
				   if(data.status == 1){
						$("#login_icon").removeClass("fa-spinner fa-pulse");
						$("#login_icon").addClass("fa-check");
						window.location.href = "customers.php";
				   }
				   else {
						$("#login_icon").removeClass("fa-spinner fa-pulse");
						$("#login_icon").addClass("fa-sign-in");
						$("#login_alert").removeClass("alert-info");
						$("#login_alert").addClass("alert-danger");
						$("#login_msg").html(data.msg);
						$("#login_alert").removeClass("hidden");
				   }
				}
			});
		});
	</script>
	
  </body>
  
</html>
