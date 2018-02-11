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
		<script src="js/jquery-2.1.4.min.js"></script>
		<script src="js/bootstrap.min.js"></script>	
		<script src="js/select2.min.js"></script>
		<script src="js/sc.js"></script>
	</head>
	
	<body style="background-color: #f8f8f8;">
		<script>
			$(document).ready(function() {
				//Update logined user name and role
				$.get('api/Controllers/Users_RestController.php?view=loggedin', function(data) {
					data = $.parseJSON(data);
					//console.log(data);
					if(data.status != 0){
						$("#lbl_role").html(data.role);
						$("#lbl_fullname").html(data.fname + ' ' + data.lname);
						$("#branch").html(data.branch);
						var cpage = document.location.href.match(/[^\/]+$/)[0];
						cpage = cpage.split("?");
						if(data.status == "Locked" && cpage[0] != "change-pass.php"){
							window.location.href = "index.php?msg=locked";
						}
						if(data.status == "New" && cpage[0] != "change-pass.php"){
							window.location.href = "change-pass.php?id="+data.userid;
						}
						
						if(data.role == 'Doctor'){
							$(".doctor-only").removeClass("hidden");
						}
						else {
							$(".doctor-only").addClass("hidden");
							//$("#nav_treatory").addClass("disabled");
						}
						
						if(data.role == 'Front Desk'){
							$(".frontdesk-only").removeClass("hidden");
							$("#nav_treatory_anchor").attr("href", "#");
							$("#nav_treatory_anchor").attr("disabled", "true");
							$("#nav_admin_anchor").attr("href", "notifications.php");
							$("#nav_admin_anchor").attr("disabled", "true");
							$("#nav_admin_anchor").attr("data-toggle", "");
							$("#nav_admin_anchor").html("<i class='fa fa-bell'></i> Annoucements");
							//$("#nav_admin").addClass("disabled");
						}
						else {
							$(".frontdesk-only").addClass("hidden");
						}
						
						if(data.role == "Admin"){
							$(".doctor-only").removeClass("hidden");
							$(".frontdesk-only").removeClass("hidden");
						}
						
						$("#btn_cpass").attr("href", "change-pass.php?id="+data.userid);
						
					}
					else {
						window.location.href = "index.php?a=loginerr";
						//alert(data.msg);
					}
				});
				
				//Setup Navigation View
				var page = location.href;
				page = page.split("/");
				page = page[page.length - 1];
				page = page.split(".php");
				page = page[0];
				//console.log(page);
				switch (page){
					case "home":
						activateNavigation("nav_home");
						break;
					case "customers":
						activateNavigation("nav_customers");
						break;
					case "newcust":
						activateNavigation("nav_customers");
						break;
					case "partners":
						activateNavigation("nav_partner");
						break;
					case "newpartner":
						activateNavigation("nav_partner");
						break;
					case "users":
						activateNavigation("nav_admin");
						break;
					case "newuser":
						activateNavigation("nav_admin");
						break;
					case "dr_view":
						activateNavigation("nav_treatory");
						break;
					case "waiting":
						activateNavigation("nav_treatory");
						break;
					case "history":
						activateNavigation("nav_treatory");
						break;
					case "change-pass":
						activateNavigation("nav_admin");
						break;
					case "newannoucement":
						activateNavigation("nav_admin");
						break;
					case "notifications":
						activateNavigation("nav_admin");
						break;
					default:
						activateNavigation("nav_home");
						break;						
				}
				
				function activateNavigation(nav_button){
					$("#nav_billing").addClass("disabled"); 					
					$("#nav_report").addClass("disabled");					
					
					switch(nav_button){
						case "nav_home":
							$("#nav_home").addClass("active");
							$("#nav_customers").removeClass("active");
							$("#nav_partner").removeClass("active");
							$("#nav_billing").removeClass("active");
							$("#nav_treatory").removeClass("active");
							$("#nav_report").removeClass("active");
							$("#nav_admin").removeClass("active");
							break;
							
						case "nav_customers":
							$("#nav_home").removeClass("active");
							$("#nav_customers").addClass("active");
							$("#nav_partner").removeClass("active");
							$("#nav_billing").removeClass("active");
							$("#nav_treatory").removeClass("active");
							$("#nav_report").removeClass("active");
							$("#nav_admin").removeClass("active");
							break;
							
						case "nav_partner":
							$("#nav_home").removeClass("active");
							$("#nav_customers").removeClass("active");
							$("#nav_partner").addClass("active");
							$("#nav_billing").removeClass("active");
							$("#nav_treatory").removeClass("active");
							$("#nav_report").removeClass("active");
							$("#nav_admin").removeClass("active");
							break;
							
						case "nav_billing":
							$("#nav_home").removeClass("active");
							$("#nav_customers").removeClass("active");
							$("#nav_partner").removeClass("active");
							$("#nav_billing").addClass("active");
							$("#nav_treatory").removeClass("active");
							$("#nav_report").removeClass("active");
							$("#nav_admin").removeClass("active");
							break;
							
						case "nav_treatory":
							$("#nav_home").removeClass("active");
							$("#nav_customers").removeClass("active");
							$("#nav_partner").removeClass("active");
							$("#nav_billing").removeClass("active");
							$("#nav_treatory").addClass("active");
							$("#nav_report").removeClass("active");
							$("#nav_admin").removeClass("active");
							break;
							
						case "nav_report":
							$("#nav_home").removeClass("active");
							$("#nav_customers").removeClass("active");
							$("#nav_partner").removeClass("active");
							$("#nav_billing").removeClass("active");
							$("#nav_treatory").removeClass("active");
							$("#nav_report").addClass("active");
							$("#nav_admin").removeClass("active");
							break;
							
						case "nav_admin":
							$("#nav_home").removeClass("active");
							$("#nav_customers").removeClass("active");
							$("#nav_partner").removeClass("active");
							$("#nav_billing").removeClass("active");
							$("#nav_treatory").removeClass("active");
							$("#nav_report").removeClass("active");
							$("#nav_admin").addClass("active");
							break;
					}
				}
				
				$("#btn_logout").click(function() {
					$.get('api/Controllers/Users_RestController.php?view=logout', function(data) {
						data = $.parseJSON(data);
						window.location.href = "index.php?a=logout";
					});
				});
			});
		</script>
	
		<nav class="navbar navbar-default" style="margin-bottom: 0px; background-color: #337ab7; color: #fff; border-color: #337ab7;">
			<div class="container">
				<div class="navbar-header">
					<img src="img/sc_brand.jpg" class="img-responsive thumbnail" alt="SightCity" style="margin-top: 5px; margin-bottom: 5px; margin-left: 0px;">
				</div>	
				
				<ul class="nav navbar-nav navbar-right" style="font-size: 14px;">
					<li><p class="navbar-text" style="color: #fff;">Welcome Back!</p></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #fff;">
							<i class="fa fa-user-circle"></i> <strong id="lbl_fullname">User name</strong>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a><i class="fa fa-medkit"></i>&nbsp;<strong id="lbl_role">Role</strong></a></li>
							<li role="separator" class="divider"></li>						
							<li><a href="#" id="btn_cpass"><i class="fa fa-key"></i> Change Password</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="#" id="btn_logout"><i class="fa fa-sign-out"></i> Logout</a></li>
						</ul>
					</li>
					<li class="dropdown">
						<p class="navbar-text" style="color: #fff;"><i class="fa fa-map-marker"	style="padding-left: 2px; padding-right: 2px"></i>&nbsp;<strong id="branch"></strong></p>
					</li>
					<!--li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #fff;" id="btn_notifications">
							<i class="fa fa-bell"></i>
							<span class="label label-pill label-danger count" style="border-radius:10px;" id="notification-count"></span> 
						</a>
						<ul class="dropdown-menu" id="notifications-dropdown"></ul>
					</li-->
				  </ul>
			</div>
		</nav>
			<ul class="nav nav-tabs container">
				<li role="presentation" id="nav_home"><a href="home.php"><i class="fa fa-home"></i> Home</a></li>
				<li role="presentation" id="nav_customers">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-users"></i> <span id="nav_customers_text">Customer</span> <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="newcust.php"><i class="fa fa-user-plus"></i> New Customer</a></li>
						<li><a href="customers.php"><i class="fa fa-users"></i> Exising Customers</a></li>
					</ul>
				</li>
				<li role="presentation" id="nav_partner" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-cubes"></i> Partners <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="newpartner.php"><i class="fa fa-plus"></i> New Partner</a></li>
						<li><a href="partners.php"><i class="fa fa-cubes"></i> Exising Partners</a></li>
					</ul>
				</li>
				<!--li role="presentation" id="nav_billing"><a href="#">Doctor</a></li-->
				<li role="presentation"  id="nav_treatory"><a href="waiting.php" id="nav_treatory_anchor"><i class="fa fa-user-md"></i> Doctor's View</a></li>
				<!--li role="presentation"  id="nav_report"><a href="#">Report</a></li-->
				<li role="presentation"  id="nav_admin" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="nav_admin_anchor"><i class="fa fa-gears"></i> Administration <span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li role="presentation" class="dropdown-header">User Management</li>
						<li><a href="newuser.php"><i class="fa fa-user-plus"></i> New User</a></li>
						<li><a href="users.php"><i class="fa fa-users"></i> Exising Users</a></li>
						<li role="presentation" class="divider"></li>
						<li role="presentation" class="dropdown-header">Role Management</li>
						<li role="presentation" class="divider"></li>
						<li role="presentation" class="dropdown-header">Export Management</li>
						<li role="presentation" class="divider"></li>
						<li><a href="notifications.php"><i class="fa fa-bell"></i> Annoucements</a>
					</ul>
				</li>
			</ul>
		<div class="container" style="background-color:white; min-height:740px;" style="margin-top: 0px;">    
			
