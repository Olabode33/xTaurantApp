<?php
	include_once 'app/cls-dashboard.php';
	include_once 'utility/utility.php';

	$util_obj = new Utility();
	$dash_obj = new Dashboard();
	
	if(isset($_GET['t']))
		$age_f = $_GET['t'];
	else
		$age_f = 'none';
	
	if(isset($_GET['g']))
		$gender_f = $_GET['g'];
	else
		$gender_f = 'none';
	
	if(isset($_GET['r']))
		$time_f = $_GET['r'];
	else 
		$time_f = 'none';
	
	switch($time_f){
		case '3h':
			$time_f_text = ' for the last 3 hours';
		break;
		case '6h':
			$time_f_text = ' for the last 6 hours';
		break;
		case '24h':
			$time_f_text = ' for the last 24 hours';
		break;
		case '7d':
			$time_f_text = ' for the last 7 days';
		break;
		case '30d':
			$time_f_text = ' for the last 30 days';
		break;
		default:
			$time_f_text = ' ';
		break;
	}
?>
	<div class="section-header">
		<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
			<a href="index.php?a=actions" class="btn btn-fab btn-primary"  data-toggle="tooltip" title="Go Back to Actions"><i class="fa fa-arrow-left"></i></a>
			Dashboard <?php echo '<small class="'.(isset($theme_text)?$theme_text:'').'">- '.ucfirst((!isset($_GET['m']) || $_GET['m'] == 'default')?'summary':$_GET['m']).'</small>';?>
		</h1>
		<hr>
	</div>

	<div>
	<?php
		$mode = 'default';
		if(isset($_GET['m'])){
			$mode = $_GET['m'];
		}
		
		switch($mode) {
			case 'time':
				include 'pages/cms/dashboards/time.php';
				break;
			case 'quality':
				include 'pages/cms/dashboards/quality.php';
				break;
			case 'customer':
				include 'pages/cms/dashboards/customer.php';
				break;
			default:
				include 'pages/cms/dashboards/default.php';
				break;
		}
	?>
	</div>

<script>
	function filter(type){
		var filt = $(event.currentTarget);
		//var opt = filt.val();
	
		switch(type){
			case 'age':
				var age = filt.val();
				var gender = '<?php echo ((isset($_GET['g']))?$_GET['g']:'none'); ?>'; 
				var time = '<?php echo ((isset($_GET['r']))?$_GET['r']:'none'); ?>';
			break;
			case 'gender':
				var age = '<?php echo ((isset($_GET['t']))?$_GET['t']:'none'); ?>';
				var gender = filt.val();
				var time = '<?php echo ((isset($_GET['r']))?$_GET['r']:'none'); ?>';
			break;
			case 'time':
				var age = '<?php echo ((isset($_GET['t']))?$_GET['t']:'none'); ?>';
				var gender = '<?php echo ((isset($_GET['g']))?$_GET['g']:'none'); ?>'; 
				var time = filt.val();
			break;
			default:
				var age = '<?php echo ((isset($_GET['t']))?$_GET['t']:'none'); ?>';
				var gender = '<?php echo ((isset($_GET['g']))?$_GET['g']:'none'); ?>';
				var time = '<?php echo ((isset($_GET['r']))?$_GET['r']:'none'); ?>';
			break;
		}
		
		window.location.href = 'index.php?a=cms&s=dashboard&m=<?php echo $mode; ?>'+'&t='+age+'&g='+gender+'&r='+time;
	}
</script>