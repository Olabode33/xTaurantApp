<?php
	include 'app/cls-menu.php';
	include 'app/cls-order.php';
	include 'app/cls-restaurant.php';
	include 'utility/utility.php';
	$utility_obj = New Utility();
	$order_obj = New Order();
	$menu_obj = New Menu();
	$restaurant_obj = New Restaurant();
	
	$order_key = 0;
	
	if(isset($_GET['ok'])){
		$order_key = $_GET['ok'];
	}
	
	$restaurants_details = $restaurant_obj->getAll($_SESSION['restaurant_id']);
	
	foreach($restaurants_details as $restaurant_details)
	
	//print_r($restaurant_details);
	// if(isset($_POST['menu']) && $_POST['menu'] == 'remove'){
		// $order_obj->removeFromPlate();
	// }
	
	// if(isset($_POST['order']) && $_POST['order'] == 'update'){
		// if(isset($_POST['qty'])){
			// foreach($_POST['qty']  as $key=>$val){
				// if($val==0) {
					// unset($_SESSION['order'][$key]);
				// }
				// else {
					// $_SESSION['order'][$key]['quantity'] = $val;
					// header('Location: index.php?a=message&m=wait');
				// }
			// }
		// }
		// else {
			// $_SESSION['feedback']
		// }
	// }
	
	// echo "<pre>";
		// print_r($_SESSION['order'][2]);
	// echo "</pre>";
	
	// $array = $_SESSION['order'];
	// foreach ($array as $element){
		// echo "<pre>";
		// print_r($element);
	// echo "</pre>";
	//}
	
	// include_once 'app/cls-projects.php';

	// $prj_obj = new Projects();
	// $prj_obj->scanCategory();
	// $categorys = $prj_obj->getCategorys();

	// if (isset($_GET['delete']) && $_GET['delete'] == 'true') {
		// $deleted_rows = $prj_obj->deleteProject($_GET['id']);
		// if ($deleted_rows > 0) {
			// $_SESSION['feedback'] = '<div class="alert alert-success alert-dismissible">
										// <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										// Project successfully deleted from database.<br>
										// Kindly delete the folder/file.
									 // </div>';
		// }
		// else {
			// $_SESSION['feedback'] = '<div class="alert alert-warning alert-dismissible">
										// <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										// Error deleting project
									 // </div>';
		// }
		// header('Location: index.php?a=view');
	// }
	date_default_timezone_set('Africa/Lagos');
?>
<section class="section">
	<br>
	<div class="container">
		<div class="section-header">
			<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="index.php?a=actions" class="btn btn-fab btn-flat btn-primary"><i class="fa fa-arrow-left"></i></a>
				Checkout
			</h1>
			<hr>
		</div>
		
		<div class="" id="bill_area">
			<div class="row">
				<div class="col-sm-6">
					<?php
						if(isset($_SESSION['logo_name']))
							echo '<img src="assets/images/restaurants-logo/'.$_SESSION['logo_name'].'" id="HeaderLogo" class="img-rounded" height="100px" width="auto"/>';
						else
							echo '<h2>'.((isset($_SESSION['restaurant_id']))?$_SESSION['restaurant']: 'xTaurantApp').'</h2>';
						
						$address = $restaurant_details['address'];
						$region = $restaurant_details['region'];
						$state = $restaurant_details['state'];
						$phone = $restaurant_details['phone'];
						$email = $restaurant_details['email'];
						
						$full_address = ((isset($address))?$address.' ':'');
						$full_address .= ((isset($region))?$region.' ':'');
						$full_address .= ((isset($state))?$state.', Nigeria.<br>':'');

						echo '<h5><i class="mdi-communication-location-on"></i> '.($full_address != ''?$full_address:'Nigeria.').'</h5>';
						
						if(isset($phone)){
							echo '<h5><i class="mdi-communication-phone"></i> '.$phone.'</h5>';
						}
						if(isset($email)){
							echo '<h5><i class="mdi-communication-email"></i> '.$email.'</h5>';
						}
					?>
				</div>
				
				<div class="col-sm-6">
					<h2 class="text-right">Order #<?php echo $order_key; ?></h2>
					<p class="text-right">Billed:  <?php  echo date('d/M/Y'); ?></p>
				</div>
			</div>				
			<table class="table table-hover">
				<thead>
					<th class="col-sm-1">S/n</th>
					<th class="col-xs-4 col-sm-5">Item</th>
					<th class="col-xs-2 col-sm-2">Price (₦)</th>
					<th class="col-xs-3 col-sm-2">Quantity</th>
					<th class="col-xs-2 col-sm-2">Total (₦)</th>
				</thead>
				<tbody>
					<?php
						$count = 1;
						$total = 0;
						if($order_key > 0){
							$orders = $order_obj->getAllFor('k', $order_key);
							// echo '<pre>';
							// print_r($orders);
							// echo '</pre>';
							foreach($orders as $order){
								//if($id != 0){
									echo '<tr>
												<td>'.$count.'</td>
												<td>'.$order['menu_item'].'</td>
												<td>'.number_format($order['price']).'</td>
												<td>'.$order['quantity'].'</td>
												<td>'.number_format($order['price'] * $order['quantity'], 2).'</td>
											  </tr>';
									$total += $order['price'] * $order['quantity'];
									$count++;
								//}
							}
							echo '<tr>
										<td>&nbsp;</td>
										<td colspan="3"><b>Total</b></td>
										<td><b>'.number_format($total,2).'</b></td>
										<td>&nbsp;</td>
									 </tr>';
						}
						else
							echo '<tr><td colspan="7">Cannot find order</td></tr>';
					?>
				</tbody>
			</table>
			<a href="index.php?a=message&m=bill&ok=<?php echo $order_key; ?>" class="btn btn-primary pull-right <?php echo $theme_color; ?>" name="order" id="order" value="update" data-toggle="tooltip" title="Finish"><i class="mdi-action-done"></i></a>
			<button class="btn btn-flat btn-primary pull-right"><i class="mdi-action-print" data-toggle="tooltip" title="Print"></i></button>
			<button class="btn btn-flat btn-primary pull-right"><i class="mdi-social-share" data-toggle="tooltip" title="Share"></i></button>
		</div>
	</div>
</section>