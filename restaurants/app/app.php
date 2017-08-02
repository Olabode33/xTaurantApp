<?php	
	
	if(isset($_POST['menu']) && $_POST['menu'] == 'order'){
		$order_obj->addToPlate();
		echo '<pre>';
		print_r($_SESSION['order']);
		echo '</pre>';
	}
	
?>