<?php	
	$view = 'actions';
	if(isset($_GET['s'])){
		$view = $_GET['s'];
	}
	$admin_title = ucfirst($view);
?>
<section class="section">
	<br>
		<div class="container">
			<?php			
				include 'pages/cms/'.$view.'.php';
			?>
		</div>
</section>
