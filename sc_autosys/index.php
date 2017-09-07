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
						<div class="alert alert-info <?php echo isset($_GET["a"]) ? '' : 'hidden' ; ?>" role="alert" id="login_alert">
							<i class="fa fa-info-circle"></i> 
							<span id="login_msg">
								<?php
									if(isset($_GET["a"]) && $_GET["a"] == "logout")
										echo "Logged Out Successfully";
									if(isset($_GET["a"]) && $_GET["a"] == "loginerr")
										echo "Please login to access the system";
								?>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<script>
		$("#loginform").submit(function(e) { 
			e.preventDefault();
			
			$("#login_icon").removeClass("fa-sign-in");
			$("#login_icon").addClass("fa-spinner fa-pulse");
			
			$.ajax({
				//url: $('#myform').attr('action'),
				//url: 'api/user/login/',
				url: 'api/Users_RestController.php?view=login',
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
