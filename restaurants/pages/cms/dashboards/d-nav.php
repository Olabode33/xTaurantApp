<?php
	
	
	echo '<div class="wow fadeInTop" data-wow-duration="1000ms" data-wow-delay="400ms">
				<div class="col-sm-offset-5 col-sm-7">
					<ul class="nav nav-tabs" style="margin-bottom: 15px;">
						 <li class="'.((isset($_GET['m']) && $_GET['m'] == 'time')?'active':'').'">
							<a href="index.php?a=cms&s=dashboard&m=time&t='.((isset($_GET['t']))?$_GET['t']:'none').'&g='.((isset($_GET['g']))?$_GET['g']:'none').'" >
								<span class="mdi-image-timelapse" ></span> Time
							</a>	
						</li>
						<li class="'.((isset($_GET['m']) && $_GET['m'] == 'quality')?'active':'').'">
							<a href="index.php?a=cms&s=dashboard&m=quality&t='.((isset($_GET['t']))?$_GET['t']:'none').'&g='.((isset($_GET['g']))?$_GET['g']:'none').'" >
								<span class="mdi-maps-local-restaurant"></span> Quality
							</a>	
						</li>
						<li class="'.((isset($_GET['m']) && $_GET['m'] == 'customer')?'active':'').'">
							<a href="index.php?a=cms&s=dashboard&m=customer&t='.((isset($_GET['t']))?$_GET['t']:'none').'&g='.((isset($_GET['g']))?$_GET['g']:'none').'" >
								<span class="mdi-social-people"></span> Customer
							</a>	
						</li>
						<li class="'.((isset($_GET['m']) && $_GET['m'] == 'default')?'active':'').'">
							<a href="index.php?a=cms&s=dashboard&m=default&t='.((isset($_GET['t']))?$_GET['t']:'none').'&g='.((isset($_GET['g']))?$_GET['g']:'none').'">
								<span class="mdi-action-dashboard"></span> Back
							</a>
						 </li>
					</ul>
				</div>
			 </div>';
			 
			 
?>

