<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		<title>.: SC AutoSys ::.</title>

		<!-- CSS -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/sctheme.css" rel="stylesheet">
		<link rel="stylesheet" href="fonts/font-awesome.min.css" type="text/css" media="screen">
		<link rel="stylesheet" href="css/select2.min.css" type="text/css">
		
		<!--JS-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/select2.min.js"></script>
	</head>
	
	<body style="background-color:cornsilk;">
		<script>
			$(document).ready(function() {
				$.get('api/Users_RestController.php?view=loggedin', function(data) {
				data = $.parseJSON(data);
				console.log(data);
				if(data.status != 0){
					$("#lbl_role").html(data.role);
					$("#lbl_fullname").html(data.fname + ' ' + data.lname);
					$("#branch").html("(" + data.branch + " Branch)");
				}
				else {
					window.location.href = "index.php?a=loginerr";
					//alert(data.msg);
				}
			});
				
				$("#btn_logout").click(function() {
					$.get('api/Users_RestController.php?view=logout', function(data) {
						data = $.parseJSON(data);
						window.location.href = "index.php?a=logout";
					});
				});
			});
		</script>
	
		<nav class="navbar navbar-default" style="margin-bottom: 0px;">
			<div class="container">
				<div class="navbar-header">
					<img src="img/sc_brand.jpg" class="img-responsive thumbnail" alt="SightCity" style="margin-top: 5px; margin-bottom: 5px; margin-left: 0px;">
				</div>	
				<p class="navbar-text navbar-right">
					Welcome 
					<span id="lbl_role">Dr</span> 
					<span id="lbl_fullname">Elochukwu</span> | 
					<span id="branch"></span> |
					<a href="#" class="navbar-link" id="btn_logout">Logout</a>
				</p>
			</div>
		</nav>
			<ul class="nav nav-tabs container">
				<li role="presentation"><a href="index.php" class="<?php echo (basename($_SERVER['PHP_SELF'])) == "home.php" ? "active" : "" ; ?>">Home</a></li>
				<li role="presentation"  class="<?php echo (basename($_SERVER['PHP_SELF'])) == "customers.php" || (basename($_SERVER['PHP_SELF'])) == "newcust.php" ? "active" : "" ; ?>"><a href="customers.php"><i class="fa fa-users"></i> Customer</a></li>
				<li role="presentation"  class="<?php echo (basename($_SERVER['PHP_SELF'])) == "home" ? "active" : "" ; ?>"><a href="#">Partner</a></li>
				<li role="presentation"  class="<?php echo (basename($_SERVER['PHP_SELF'])) == "home.php" ? "active" : "" ; ?>"><a href="#">Billing</a></li>
				<li role="presentation"  class="<?php echo (basename($_SERVER['PHP_SELF'])) == "home.php" ? "active" : "" ; ?>"><a href="#">Case List</a></li>
				<li role="presentation"  class="<?php echo (basename($_SERVER['PHP_SELF'])) == "home.php" ? "active" : "" ; ?>"><a href="#">Report</a></li>
				<li role="presentation"  class="<?php echo (basename($_SERVER['PHP_SELF'])) == "users.php" || (basename($_SERVER['PHP_SELF'])) == "newuser.php" ? "active" : "" ; ?>"><a href="users.php"><i class="fa fa-user-circle"></i> User Management</a></li>
			</ul>
		<div class="container" style="background-color:white; min-height:740px;" style="margin-top: 0px;">    
			
