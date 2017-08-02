	<!-- Footer -->
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
							©  
							<?php 
								date_default_timezone_set("Africa/Lagos");
								//echo date_default_timezone_get();
								$copyyear = '2017'; 
								$curyear = date("Y");
								echo $copyyear.(($curyear > $copyyear)?' - '.$curyear:'');
							?> 
							All right reserved. Powered By
							<a rel="nofollow" href="http://xTaurantApp.com/">
								xTaurantApp
							</a>
						</p>
					</div>
				</div>
			</div>
		</section> 
	
	<?php
			require_once 'include/modals.php';
	?>
	
	<script type="application/javascript" src="assets/js/my-script.js"></script>	
	
	<script src="../js/jquery-2.1.4.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/ripples.min.js"></script>
    <script src="../js/material.min.js"></script>
    <script src="../js/wow.js"></script>
    <script src="../js/jquery.mmenu.min.all.js"></script> 
    <script src="../js/count-to.js"></script>   
    <script src="../js/jquery.inview.min.js"></script>     
    <script src="../js/classie.js"></script>
    <script src="../js/jquery.nav.js"></script>      
    <script src="../js/smooth-on-scroll.js"></script>
    <script src="../js/smooth-scroll.js"></script>
    <script src="../js/main.js"></script>

    

    <script>
        $(document).ready(function() {
            // This command is used to initialize some elements and make them work properly
            $.material.init();
        });
    </script>
</body>
</html>