<?php 
	include 'utility/utility.php';
	$utility_obj = New Utility();
	
	$stp = 1;
	$delay = 300;
	
	if(isset($_GET['stp'])) {
		$stp = $_GET['stp'];
		$mode = $_GET['m'];
	}

	if(isset($_SESSION['table_id'])){
		unset($_SESSION['table_id']);
		unset($_SESSION['table']);
		header ('Location: index.php?a=actions');
		// echo "<script type='text/javascript'>
						// document.location.href='index.php?a=actions';
				  // </script>";
	}
	
	
	?>
	
	<section id="other-features" class="section">
      <div class="container">
        <div class="section-header">
          <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="100ms">Hello <?php echo isset($_SESSION['fname'])?$_SESSION['fname']:""; ?></h1>
          <h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">(<?php echo isset($_SESSION['role'])?$_SESSION['role']:""; ?>)</h2>
        </div>
		<hr>
        <div class="row">
			<div class="col-md-9 col-sm-8" style=" border-right:1px solid #eee">
			<?php 
				if($utility_obj->has_access('order'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
							<div class="features-content text-center">
								<a href="index.php?a=tables&for=order">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/restaurant_set/dish.svg" height="50px"/>
									</div>
									<h3>Orders</h3>
								</a>
							</div>
						</div>
						';
				
				if($utility_obj->has_access('bill'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
							<div class="features-content text-center">
								<a href="index.php?a=tables&for=bill">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/restaurant_set/bill-1.svg" height="50px"/>
									</div>
									<h3>Bills</h3>
								</a>
							</div>
						</div>
						';
						
				if($utility_obj->has_access('feedback'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
							<div class="features-content text-center">
								<a href="index.php?a=feedback">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/extra_set/clipboard.svg" height="50px"/>
									</div>
									<h3>Feedback</h3>
								</a>
							</div>
						</div>
						';
						
				if($utility_obj->has_access('chef'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
							<div class="features-content text-center">
								<a href="index.php?a=bar">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/restaurant_set/chef.svg" height="50px"/>
									</div>
									<h3>Bar/Chef</h3>
								</a>
							</div>
						</div>
						';
						
				if($utility_obj->has_access('dashboard'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1200ms">
							<div class="features-content text-center">
								<a href="index.php?a=cms&s=dashboard">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/restaurant_set2/app.svg" height="50px"/>
									</div>
									<h3>Dashboard</h3>
								</a>
							</div>
						</div>
						';
						
				if($utility_obj->has_access('restaurant'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1400ms">
							<div class="features-content text-center">
								<a href="index.php?a=cms&s=restaurants">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/restaurant_set/open.svg" height="50px"/>
									</div>
									<h3>Restaurants</h3>
								</a>
							</div>
						</div>
						';
						
				if($utility_obj->has_access('menu'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1600ms">
							<div class="features-content text-center">
								<a href="index.php?a=cms&s=menu">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/restaurant_set/menu.svg" height="50px"/>
									</div>
									<h3>Menus</h3>
								</a>
							</div>
						</div>
						';
						
				if($utility_obj->has_access('users'))
					echo 
						'<div class="col-md-3 col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1800ms">
							<div class="features-content text-center">
								<a  href="index.php?a=cms&s=user">
									<div class="icon hi-icon-effect-3b">
										<img src="assets/icons/restaurant_set/waiter.svg" height="50px"/>
									</div>
									<h3>Users</h3>
								</a>
							</div>
						</div>
						';
			?>
			</div>
			<div class="col-md-3 col-sm-4">
				You don't have any notifications
			</div>
        </div>
      </div>
    </section>
