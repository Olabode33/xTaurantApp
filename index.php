<?php 
	session_start();
	ob_start();
?>
<!doctype html>
<html lang="en">

	<?php
		include ("includes/head.php");
	?>

  <body>

    <?php
		include ("includes/side-navbar.php");
	?>
  	
  	<div class="content-wrap">
		<!--Home-->
		<header class="hero-area" id="home">
			<div class="container">
				<?php
					include("includes/top-navbar.php");
					
					if(isset($_POST['login'])){
						include 'php/utility/login-mgr.php';
						$login_obj = new LoginMgr();
						
						if($login_obj->login()){
							if(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 5){
								header ('Location: restaurants/index.php?a=login&s=2');
							}
							elseif(isset($_SESSION['role_id']) && $_SESSION['role_id'] == 6){
								header ('Location: customers/index.php?a=login&s=2');
							}
							else{
									header ('Location: restaurants/index.php?a=actions');
							}							
						}
						else {
							$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-warning">
																			<button type="button" class="close" data-dismiss="alert">&times;</button>
																			Wrong Username or password.
																		  </div>';				
							header('Location: index.php');
						}
					}
					
					//print_r($_SESSION);
				?>
				<div class="contents text-right">
					<h1 class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">xTaurantApp - Full Automation System </h1>
					<p class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Driving your restaurant efficiently</p>
					<a href="#cta" class="btn btn-lg btn-primary wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">Sign Up</a>
					<button data-toggle="collapse" data-target="#login" class="btn btn-lg btn-border wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">Login</button>
					<a href="#demo" class="btn btn-lg btn-border wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">Demo</a>
					
					<div class="col-md-offset-8 col-md-4  col-sm-offset-6 col-sm-6 collapse" id="login">	
						<div class="text-center">
							<a class="social" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
							<a class="social" href="#" target="_blank"><i class="fa fa-twitter"></i></a>
							<a class="social" href="#" target="_blank"><i class="fa fa-google"></i></a>
						</div>
						<h2 class="text-center">-OR-</h2>
						<form class="" id="loginEmail" action="index.php" method="post">
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
				</div>   
			</div>
		</header>
		
		<section id="cta">
			<div class="row text-center">         
				<h3 class="title-small wow bounce" data-wow-duration="1000ms" data-wow-delay="300ms">Join Us Today</h3>
				<button data-toggle="collapse" data-parent="#accordion" data-target="#rsignup" class="btn btn-lg btn-border">Restaurant</button>
				<button data-toggle="collapse" data-parent="#accordion" data-target="#csignup" class="btn btn-lg btn-border">Customer</button>
			</div>
		</section>

		<section id="signupmini" class="">
			<div class="container" id="accordion" >
					<div class="panel panel-default" style="background-color:rgba(0,0,0,0); box-shadow:none;">
						<div class="panel-collapse collapse" id="rsignup" style="padding-top: 3%;">	
								<form class="form-horizontal" action="index.php" method="post">
									<field>
										<div class="form-group">
											<div class="col-sm-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-cutlery" style="color:#fff;"></i></span>
													<input type="text" class="form-control" id="rname" name="rname" placeholder="Restaurant Name" required="true" style="color:#fff;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-12">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-map-marker" style="color:#fff;"></i></span>
													<input type="text" class="form-control" id="addr" name="addr" placeholder="Address" required="true" style="color:#fff;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-map-marker" style="color:#fff;"></i></span>
													<input type="text" class="form-control" id="state" name="state" placeholder="State" required="true" style="color:#fff;">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-map-marker" style="color:#fff;"></i></span>
													<input type="text" class="form-control" id="region" name="region" placeholder="Region" required="true" style="color:#fff;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-at" style="color:#fff;"></i></span>
													<input type="text" class="form-control" id="cmail" name="cmail" placeholder="Contact Email" required="true" style="color:#fff;">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-phone" style="color:#fff;"></i></span>
													<input type="text" class="form-control" id="cphone" name="cphone" placeholder="Contact Number" required="true" style="color:#fff;">
												</div>
											</div>
										</div>
										<hr>
									</field>
									<field>
										<div class="form-group">
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon"><i class="fa fa-user" style="color:#fff;"></i></span>
													<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Your Login Name" required="true" style="color:#fff;">
												</div>
											</div>
											<div class="col-sm-6">
												<div class="input-group">
													<span class="input-group-addon" ><i class="fa fa-key" style="color:#fff;"></i></span>
													<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your Password" required="true" style="color:#fff;">
												</div>
											</div>
										</div>
										<div class="form-group">
											<div class="col-sm-offset-6 col-sm-6">
												<div class="input-group">
													<span class="input-group-addon" ><i class="fa fa-check" style="color:#fff;"></i></span>
													<input type="password" class="form-control" id="pass" name="pass" placeholder="Confirm Your Password" required="true" style="color:#fff;">
												</div>
											</div>
										</div>
										<br>
										<button type="submit" class="btn btn-border" name="signup" id="signup" value="r">
											Sign Up
											<span class="fa fa-sign-up"></span>
										</button>
									</field>
								</form>
						</div>
					</div>
					<!-- Customer Sign Up -->
					<div class="panel panel-default" style="background-color:rgba(0,0,0,0); box-shadow:none;">
						<div class="panel-collapse collapse" id="csignup">	
							<div class="text-center">
								<a class="social" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
								<a class="social" href="#" target="_blank"><i class="fa fa-twitter"></i></a>
								<a class="social" href="#" target="_blank"><i class="fa fa-google"></i></a>
								<a class="social" data-toggle="collapse" data-target="#cSignUpForm"><i class="fa fa-at"></i></a>
							</div>
							<form class="collapse" id="cSignUpForm" action="index.php" method="post">
								<field>
									<div class="form-group">
										<div class="">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Your Username" required="true" style="color:#fff;">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="">
											<div class="input-group">
												<span class="input-group-addon" ><i class="fa fa-key"></i></span>
												<input type="password" class="form-control" id="pass" name="pass" placeholder="Enter Your Password" required="true" style="color:#fff;">
											</div>
										</div>
									</div>
									<button type="submit" class="btn btn-border btn-block" name="login" id="login" value="login">
										Log In
										<span class="fa fa-sign-in"></span>
									</button>
								</field>
							</form>
						</div>
					</div>
				<br>
			</div>
		</section>
		
		<section id="demo" class="section">
			<div class="container">
				<div class="section-header">
					<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">Demo</h1>
					<h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">The system grants you access to a demo version of xTaurantApp</h2>
					<div class="wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
						<h3>For the demo version, you have access to only the following functions</h3>
						<ul class="list-item">
							<li><i class="mdi-action-done"></i> Place Order</li>
							<li><i class="mdi-action-done"></i> Serve Order</li>
							<li><i class="mdi-action-done"></i> Feedback</li>
							<li><i class="mdi-action-done"></i> Dashboard</li>
						</ul>
						<button data-toggle="collapse"  data-target="#demologin" class="btn btn-larg btn-primary">Login</button>
						<div class="row collapse" id="demologin">	
							<form class="col-md-4 col-sm-6" action="index.php" method="post">
								<field>
									<div class="form-group">
										<div class="">
											<div class="input-group">
												<span class="input-group-addon"><i class="fa fa-user"></i></span>
												<input type="text" class="form-control" id="uname" name="uname" placeholder="Enter Your Username" required="true" style="color:#fff;">
											</div>
										</div>
									</div>
									<div class="form-group">
										<div class="">
											<div class="input-group">
												<span class="input-group-addon" ><i class="fa fa-key"></i></span>
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
							<div class="col-md-8 col-sm-6 text-center">
								<p><b>Username:</b> demouser</p>
								<br>
								<p><b>Password:</b> demopass</p>
							</div>
						</div>
					</div>
				</div>
			</div>

		</section>

		<!--section id="testimonial" class="section">
			<div class="container">
				<div class="section-header text-center wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
					<h1 class="section-title">What People Says</h1>
					<h2 class="section-subtitle">Digitized restaurant process</h2>
				</div>
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
						<div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
							< Indicators > is a comment
							<ol class="carousel-indicators">
								<li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
								<li data-target="#testimonial-carousel" data-slide-to="1"></li>
								<li data-target="#testimonial-carousel" data-slide-to="2"></li>
							</ol>
							<div class="carousel-inner">
								<div class="item active text-center">               
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
									<div class="meta">
										<p>Web excutive <span><a href="http://wingthemes.com/">FiredUp - Restaurant</a></span></p>
									</div>
								</div>
								<div class="item text-center">                
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
									<div class="meta">
										<p>Web excutive <span><a href="http://graygrids.com/">Benedict</a></span></p>
									</div>
								</div>
								<div class="item text-center">                
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud</p>
									<div class="meta">
										<p>Web excutive <span><a href="http://landingbow.com/">LandinBow</a></span></p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="counter" class="section">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
						<div class="counter-item">
							<div class="icon">
								<i class="mdi-action-grade"></i>
							</div>
							<h3 class="timer">1046</h3>
							<hr>
							<h5>
								Restaurants
							</h5>          
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="700ms">
						<div class="counter-item">
							<div class="icon">
								<i class="mdi-action-face-unlock"></i>
							</div>
							<h3 class="timer">6345</h3>
							<hr>
							<h5>
								Customers
							</h5>          
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
						<div class="counter-item">
							<div class="icon">
								<i class="mdi-action-get-app"></i>
							</div>
							<h3 class="timer">39000</h3>
							<hr>
							<h5>
								Restaurant Transactions
							</h5>          
						</div>
					</div>
					<div class="col-md-3 col-sm-6 col-xs-12 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="900ms">
						<div class="counter-item">
							<div class="icon">
								<i class="mdi-action-trending-up"></i>
							</div>
							<h3 class="timer">18325</h3>
							<hr>
							<h5>
								Customers Transactions
							</h5>          
						</div>
					</div>
				</div>
			</div>
		</section>

		<section id="clients" class="section">
			<div class="container">
        
				<div class="section-header text-center">
					<h1 class="section-title wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">Our Clients</h1>
					<h2 class="section-subtitle wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">Restaurants are using our platform</h2>
				</div>
				<div class="row">
					<div class="col-md-3 col-sm-3 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
						<div class="client-item-wrapper">
							<img src="img/clients/img1.png" alt="">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
						<div class="client-item-wrapper">
							<img src="img/clients/img2.png" alt="">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="700ms">
						<div class="client-item-wrapper">
							<img src="img/clients/img3.png" alt="">
						</div>
					</div>
					<div class="col-md-3 col-sm-3 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="900ms">
						<div class="client-item-wrapper">
							<img src="img/clients/img4.png" alt="">
						</div>
					</div>
				</div>
			</div>
		</section-->

		<section id="footer">
			<div class="container">
				<div class="container">
					<div class="row">
						<div class="col-md-3 col-sm-6 col-xs-12">
							<h3>Top Restaurants</h3>
							<ul>
								<li>
									<a href="http://wingthemes.com/">FiredUp Restaurant</a>
								</li>
								<li>
									<a href="http://graygrids.com/">TheRestaurant</a>
								</li>
								<li>
									<a href="http://wpbean.com/">Utazi</a>
								</li>
								<li>
									<a href="http://landingbow.com/">Landingbow</a>
								</li>
								<li>
									<a href="http://freebiescircle.com/">FreebiesCicle</a>
								</li>               
							</ul>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<h3>FAQs</h3>
							<ul>
								<li>
									<a href="#">Why choose us?</a>
								</li>
								<li>
									<a href="#">Where we are?</a>
								</li>
								<li>
									<a href="#">Fees</a>
								</li>
								<li>
									<a href="#">Guarantee</a>
								</li>
								<li>
									<a href="#">More...</a>
								</li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<h3>About</h3>
							<ul>
								<li>
									<a href="#">Vision</a>
								</li>
								<li>	
									<a href="#">Partners</a>
								</li>
								<li>
									<a href="#">Team</a>
								</li>
								<li>
									<a href="#">Clients</a>
								</li>
								<li>
									<a href="#">Contact</a>
								</li>
							</ul>
						</div>
						<div class="col-md-3 col-sm-6 col-xs-12">
							<h3>Find us on</h3>
							<a class="social" href="#" target="_blank"><i class="fa fa-facebook"></i></a>
							<a class="social" href="#" target="_blank"><i class="fa fa-twitter"></i></a>
							<a class="social" href="#" target="_blank"><i class="fa fa-google-plus"></i></a>
						</div>
					</div>
				</div>  
			</div>      
			<!-- Go to Top Link -->
			<a href="#home" class="btn btn-primary back-to-top">
				<i class=" mdi-hardware-keyboard-arrow-up"></i>
			</a>
		</section> 

		<section id="copyright">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<p class="copyright-text">
							© xTaurantApp 2017 All right reserved. Designed and Developed by 
							<a rel="nofollow" href="http://olabode33.com.ng/">
								Olabode33
							</a>
						</p>
					</div>
				</div>
			</div>
		</section>     
    </div>  
	
	<?php
		include ("includes/foot.php");
	?>
</body>

</html>
