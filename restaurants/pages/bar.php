<?php
	include 'app/cls-menu.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	$utility_obj = New Utility();
	$order_obj = New Order();
	$menu_obj = New Menu();
	
	$view = 'none';
	if(isset($_GET['v'])){
		$view = $_GET['v'];
		//$order_obj->updateOrderStatus($view, 2);
		
		if(isset($_GET['s']) && $_GET['s'] == 3){
			$order_obj->updateOrderStatus($view, 3);
			$view = 'none';
		}
	}
	
?>
<section class="section">
	<br>
	<div class="container">
		<div class="section-header">
			<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="index.php?a=actions" class="btn btn-fab btn-primary"  data-toggle="tooltip" title="Go Back to Actions"><i class="fa fa-arrow-left"></i></a>
				Chef
			</h1>
			<hr>
		</div>
		<div class="row">
			<div class="">
				<h3 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Orders</h3>
				<div class="list-group">
				<?php
							$count = 1;
							$total = 0;
							$delay = 400;
							
							$orders = $order_obj->getOrderSummary();
							if(count($orders) > 0){
								foreach($orders as $order){
									echo '
										<div class="wow fadeInRight list-group-item" data-wow-duration="1000ms" data-wow-delay="'.$delay.'ms" style="background-color: #fff;">
											<div class="row-action-primary text-primary wow fadeInLeft"  data-wow-duration="1000ms" data-wow-delay="'.($delay + 200).'ms">
												<a href="index.php?a=bar&v='.$order['order_key'].'&s=3" class="">
													<i class="mdi-action-done text-primary" style="background-color: '.(isset($theme_hex)?$theme_hex:'#ff5722').'"></i>
												</a>
											</div>
											<div class="row-content">
												<div class="least-content">'.$utility_obj->time_elapsed_string($order['date']).'</div>
											  <!--div class="action-secondary"><i class="mdi-action-"></i></div-->
											  <h4 class="list-group-item-heading"><b>#'.$order['order_key'].'</b> <small>('.$utility_obj->getObjectFromID('tbl_tables', 'table_name', 'table_id', $order['table_id']).' )</small></h4>

											  <p class="list-group-item-text">';
											  $order_items = $order_obj->getAllFor('k', $order['order_key']);
												foreach($order_items as $order_item){
														echo '<div class="col-sm-6 col-md-4">
																	<span class="col-sm-6">'.$order_item['menu_item'].' </span> <b class="text-primary col-sm-6">'.$order_item['quantity'].'</b>
																  </div>
																';
													}
									echo '</p>
											</div>
											<div class="list-group-separator"></div>
										</div>
										
										
									';
									$delay += 200;
								}
							}
							else {
								echo '<h3>No order has been placed yet.</h3>';
							}
				?>
				</div>
			</div>
	</div>
</section>

	<script>
	if (window.webkitNotifications) {
		console.log('Your web browser does support notifications!');
	} else {
		console.log('Your web browser does not support notifications!');
	}
	</script>