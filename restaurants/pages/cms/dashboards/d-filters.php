	<h3><span class="fa fa-filter"></span> Filter</h3>
	<select class="btn btn-primary btn-block <?php echo $theme_color; ?> wow fadeInLeft" onchange="filter('age');"  data-wow-duration="1000ms" data-wow-delay="400ms">
		<option value="none">- Select Age Group -</option>	
		<option value="1" <?php echo ((isset($_GET['t']) && $_GET['t'] == '1')?'selected':''); ?> ><12</option>	
		<option value="2" <?php echo ((isset($_GET['t']) && $_GET['t'] == '2')?'selected':''); ?> >13-19</option>	
		<option value="3" <?php echo ((isset($_GET['t']) && $_GET['t'] == '3')?'selected':''); ?> >20-40</option>	
		<option value="4" <?php echo ((isset($_GET['t']) && $_GET['t'] == '4')?'selected':''); ?> >41-58</option>	
		<option value="5" <?php echo ((isset($_GET['t']) && $_GET['t'] == '5')?'selected':''); ?> >>59</option>	
	</select>
	
	<select class="btn btn-primary btn-block <?php echo $theme_color; ?>wow fadeInLeft" onchange="filter('gender');" data-wow-duration="1000ms" data-wow-delay="500ms">
		<option value="none">- Select Gender -</option>	
		<option value="M" <?php echo ((isset($_GET['g']) && $_GET['g'] == 'M')?'selected':''); ?> >Male</option>	
		<option value="F" <?php echo ((isset($_GET['g']) && $_GET['g'] == 'F')?'selected':''); ?> >Female</option>
	</select>
	
	<select class="btn btn-primary btn-block <?php echo $theme_color; ?> wow fadeInLeft" onchange="filter('time');" data-wow-duration="1000ms" data-wow-delay="500ms">
		<option value="none">- Select Time Range -</option>	
		<option value="3h" <?php echo ((isset($_GET['r']) && $_GET['r'] == '3h')?'selected':''); ?> >Last 3hrs</option>	
		<option value="6h" <?php echo ((isset($_GET['r']) && $_GET['r'] == '6h')?'selected':''); ?> >Last 6hrs</option>	
		<option value="24h" <?php echo ((isset($_GET['r']) && $_GET['r'] == '24h')?'selected':''); ?> >Last 24hrs</option>	
		<option value="7d" <?php echo ((isset($_GET['r']) && $_GET['r'] == '7d')?'selected':''); ?> >Last 7 days</option>	
		<option value="30d" <?php echo ((isset($_GET['r']) && $_GET['r'] == '30d')?'selected':''); ?> >Last 30 days</option>
	</select>
	<hr>