	<!--div class="row"-->
<?php
	include 'app/cls-table.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	include 'app/cls-login-mgr.php';
	include 'app/cls-restaurant.php';
	$login_obj = new LoginMgr();
	$tbl_obj = new Table();
	$order_obj = new Order();
	$utility_obj = new Utility();
	$restaurant_obj = new Restaurant();
	
	$step = 1;
	if(isset($_GET['s'])){
		$step = $_GET['s'];
		
		//echo $step;
		
		//Change password
		if(isset($_POST['change_pass'])){
			//include 'app/cls-users.php';
			$user_obj = new User();
			
			$change = $user_obj->change_password();
			
			echo $_POST['action'].'<br>'.$_POST['step'];
			
			
			if($change > 0){
				$login_obj->logout();
				$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-success">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																Password changed successfully. Please login again
															 </div>';				
				header('Location: index.php');
			}
			else {
				$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-danger">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																Error: Unable to change password.
														  </div>';
				header('Location: index.php?a='.$_POST['action'].'&s='.$_POST['step']);
			}
		}
		else{
			//echo 'Not changing password';
		}
		
		//Logout
		if($step == 'exit'){
			$login_obj->logout();
			header ('Location: index.php');
		}
	}
	else 
		$step = 1;
	
	if(isset($_POST['login']) && $_GET['a'] == 'login'){
		
		//Set Restaurant
		if ($_POST['login'] == 'login'){			
			if($login_obj->login()){
				if($_SESSION['role_id'] == 5)
					header ('Location: index.php?a=login&s=2');
				else
					header ('Location: index.php?a=actions');
			}
			else {
				$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-warning">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																Wrong Username or password.
															  </div>';				
				header('Location: index.php');
			}
		}
		
		//Set Table
		if($_POST['login'] == 'set_restaurant'){
			if($login_obj->setRestaurant()){
				header ('Location: index.php?a=actions');
			}
			else
				header ('Location: index.php?a=login&s=2');
		}
		
		unset($_POST['login']);
	}
?>		
		<header class="hero-area" id="login-area">
			<div class="container">
				<div class="contents text-right">					
					<?php
					if($step == 1) {
					?>
						<h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">xTaurantApp - Full Automation System </h1>
						<p class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Driving your restaurant efficiently</p>
						<div class="col-md-offset-8 col-md-4  col-sm-offset-6 col-sm-6" id="login">	
							<h2 class="text-center">Enter your Login Details</h2><br>
							<form class="" id="loginEmail" action="index.php?a=login" method="post">
								<field>
									<div class="form-group">
										<div class="">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user" style="color:#fff;"></i></span>
												<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Your Username" required="true" style="color:#fff;">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="">
											<div class="input-group">
												<span class="input-group-addon" ><i class="fa fa-key" style="color:#fff;"></i></span>
												<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your Password" required="true" style="color:#fff;">
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary btn-block" name="login" id="login" value="login">
										Log In
										<span class="fa fa-sign-in"></span>
									</button>
								</field>
							</form>
						</div>
						
					<?php
					}
					elseif($step == 2) {
					?>
						<h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Welcome, <?php echo ((isset($_SESSION['fname']))?$_SESSION['fname']:"")?></h1>
						<p class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms"><?php echo ((isset($_SESSION['role']))?$_SESSION['role']:"")?></p>
						<div class="col-md-offset-8 col-md-4  col-sm-offset-6 col-sm-6" id="branch_selector">	
							<h2 class="text-center">Select a Branch</h2><br>
							<form class="" id="" action="index.php?a=login" method="post">
								<field>
									<div class="form-group">
										<div class="">
											<div class="input-group">
												<span class="input-group-addon" ><i class="fa fa-cutlery" style="color:#fff;"></i></span>
												<input type="hidden" id="type" name="type" value="<?php echo ((isset($_GET['ref']))?$_GET['ref']:'order')?>" >
												<select  name="restaurant" id="restaurant" class="form-control" required style="color:#fff; background-color: rgba(255,87,34 ,0.4)">
													<option value="">-- Select a restuarant --</option>
													<?php
														$restaurants = $restaurant_obj->getAll();
															
														foreach($restaurants as $restaurant) {
															if($restaurant['id'] != 4) 	// Exclude BV Foods 
																echo '<option value="'.$restaurant['id'].'">'.$restaurant['restaurant'].'</option>';
														}
													?>
												</select>
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-primary btn-block" name="login" id="login" value="set_restaurant">
										Select
										<span class="fa fa-chevron-right"></span>
									</button>
								</field>
							</form>
						</div>
						
					<?php
					}
					?>
					
				</div>   
			</div>
		</header>
	