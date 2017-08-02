<?php 
	include 'utility/utility.php';
	$utility_obj = New Utility();
	
	$stp = 1;
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
		<br>
      <div class="container">
        <div class="section-header">
          <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="100ms">Hello <?php echo isset($_SESSION['fname'])?$_SESSION['fname']:""; ?></h1>
		  <h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">(<?php echo isset($_SESSION['role'])?$_SESSION['role']:""; ?>)</h2>
        </div>
		<hr>
        <div class="row">
			<div class="col-md-8 col-sm-6">
				<h3 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">No Notifications</h3>
			</div>
			<div class="col-md-4 col-sm-6">
				<ul class="list-item text-right">
				<?php 
					if($utility_obj->has_access('order'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
								<a href="index.php?a=tables&for=order" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
									<h4>
										<img src="assets/icons/restaurant_set/dish.svg" height="40px"/>
										Place an Order
									</h4>
								</a>
							</li>
							';
					
					if($utility_obj->has_access('bill'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
								<a href="index.php?a=tables&for=bill" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
									<h4>
										<img src="assets/icons/restaurant_set/bill-1.svg" height="40px"/>
										Present Bill
									</h4>
								</a>
							</li>
							';
							
					if($utility_obj->has_access('feedback'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
								<a href="index.php?a=feedback" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
									<h4>
										<img src="assets/icons/extra_set/clipboard.svg" height="40px"/>
										Get Feedback
									</h4>
								</a>
							</li>
							';
							
					if($utility_obj->has_access('chef'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1000ms">
								<a href="index.php?a=bar" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
									<h4>
										<img src="assets/icons/restaurant_set/chef.svg" height="40px"/>
										Serve Order
									</h4>
								</a>
							</li>
							';
					echo '<hr>';
					if($utility_obj->has_access('dashboard'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1200ms">
								<a href="index.php?a=cms&s=dashboard" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
									<h4>
										<img src="assets/icons/restaurant_set2/app.svg" height="40px"/>
										View Dashboard
									</h4>
								</a>
							</li>
							';
							
					if($utility_obj->has_access('restaurant'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1400ms">
								<a href="index.php?a=cms&s=restaurants" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
									<h4>
										<img src="assets/icons/restaurant_set/open.svg" height="40px"/>
										Manage Restaurants
									</h4>
								</a>
							</li>
							';
							
					if($utility_obj->has_access('menu'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1600ms">
								<a href="index.php?a=cms&s=menu" class="btn btn-flat btn-primary btn-block" style="text-align:left;">
									<h4>
										<img src="assets/icons/restaurant_set/menu.svg" height="40px"/>
										Manage Menus
									</h4>
								</a>
							</li>
							';
							
					if($utility_obj->has_access('users'))
						echo 
							'<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="1800ms">
								<a  href="index.php?a=cms&s=user" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
									<h4>
										<img src="assets/icons/restaurant_set/waiter.svg" height="40px"/>
										Manage Users
									</h4>
								</a>
							</li>
							';
				?>
				</ul>
			</div>
        </div>
      </div>
    </section>