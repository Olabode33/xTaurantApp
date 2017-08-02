<?php
	include 'app/cls-menu.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	$utility_obj = New Utility();
	$order_obj = New Order();
	$menu_obj = New Menu();
	
	if(isset($_POST['menu']) && $_POST['menu'] == 'remove'){
		$order_obj->removeFromPlate();
	}
	
	if(isset($_POST['order']) && $_POST['order'] == 'update'){		
		if(isset($_POST['qty'])){
			foreach($_POST['qty']  as $key=>$val){
				if($val==0) {
					unset($_SESSION['order'][$key]);
				}
				else {
					$_SESSION['order'][$key]['quantity'] = $val;
					$_SESSION['order'][$key]['pref'] = $_POST['pref'][$key];
				}
			}
			
			header('Location: index.php?a=message&m=wait');
		}
		else {
			//$_SESSION['feedback']
		}
	}
	
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
?>
<section class="section">
		<br>
		<div class="container">
			<div class="section-header">
				<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
					<a href="index.php?a=menu&for=order" class="btn btn-fab btn-primary"  data-toggle="tooltip" title="Go Back to Menu"><i class="fa fa-arrow-left"></i></a>
					Complete Your Order
				</h1>
				<hr>
				<form method="post" action="index.php?a=place-order">
					<table class="table table-hover wow fadeInRight" id="orders_list">
						<thead>
							<th class="col-sm-1">S/n</th>
							<th class="col-xs-3 col-sm-4">Item</th>
							<th class="col-xs-2 col-sm-1">Price (₦)</th>
							<th class="col-xs-3 col-sm-2">Servings</th>
							<th class="col-xs-2 col-sm-1">Total (₦)</th>
							<th class="col-xs-2 col-sm-2">Preference</th>
							<th class="col-xs-1 col-sm-1"> </th>
						</thead>
						<tbody>
							<?php
								//<input type="text" class="form-control qty input-sm" id = "qty['.$id.']" name="qty['.$id.']" value="'.$_SESSION['order'][$id]['quantity'].'">
								$count = 1;
								$total = 0;
								if(isset($_SESSION['order']) && count($_SESSION['order']) > 0){
									foreach($_SESSION['order'] as $id=>$value){
										if($id != 0){
											echo '<tr>
														<td>'.$count.'</td>
														<td>'.$utility_obj->getObjectFromID('tbl_menu_items', 'menu_item', 'menu_item_id', $id).'</td>
														<td><span id="price'.$id.'">'.number_format($_SESSION['order'][$id]['price'], 2).'</span></td>
														<td>
															<div class="input-group">
																<span class="input-group-btn">
																	<button class="btn btn-sm '.(isset($theme_color)?$theme_color:"btn-primary").'" type="button" onclick="updateServings('.$id.', \'#qty'.$id.'\');"><i class="fa fa-plus"></i></button>
																</span>
																<input type="hidden" class="form-control qty input-sm" id = "qty'.$id.'" name="qty['.$id.']" value="'.$_SESSION['order'][$id]['quantity'].'">
																<input type="text" class="form-control qty input-sm" id = "qty'.$id.'" name="qty['.$id.']" value="'.$_SESSION['order'][$id]['quantity'].'" disabled style="text-align: center; border: 1px #eee solid; font-weight: 900">
																<span class="input-group-btn">
																	<button class="btn btn-default btn-sm '.(isset($theme_color)?$theme_color:"btn-primary").'" type="button" onclick="updateServings('.$id.', \'#qty'.$id.'\', \'minus\');"><i class="fa fa-minus"></i></button>
																</span>
															</div>														
														</td>
														<td><span id="ttlprice'.$id.'">'.number_format($_SESSION['order'][$id]['price'] * $_SESSION['order'][$id]['quantity'], 2).'</span></td>
														<td>
															<input type="text" class="form-control qty input-sm" id = "pref'.$id.'" name="pref['.$id.']" placeholder="Eg. Salty, Pepperish, ...">
														</td>
														<td>
															<button type="button" class="btn btn-fab btn-fab-mini btn-primary btn-xs pull-left '.(isset($theme_color)?$theme_color:"").'"  data-toggle="modal" data-target="#removeOrder" data-img="'.$utility_obj->getObjectFromID('tbl_menu_items','image', 'menu_item_id', $id).'" 
																data-item="'.$utility_obj->getObjectFromID('tbl_menu_items', 'menu_item', 'menu_item_id', $id).'" data-id="'.$id.'" data-price="'.$_SESSION['order'][$id]['price'].'" 
																data-tprice="'.number_format($_SESSION['order'][$id]['price'], 2).'" data-qty="'.$_SESSION['order'][$id]['quantity'].'">
																<i class="fa fa-times"></i>
															</button>
														</td>
													  </tr>';
											$total += $_SESSION['order'][$id]['price'] * $_SESSION['order'][$id]['quantity'];
											$count++;
										}
									}
									echo '<tr>
												<td colspan="4">&nbsp;</td>
												<td><b>'.number_format($total,2).'</b></td>
												<td colspan="2">&nbsp;</td>
											 </tr>
											 <tr>
												<td colspan="5">&nbsp;</td>
												<td colspan="2">
													<span class="help-block">Your preference would be applied based on availablility</span>
												</td>
											 </tr>';
								}
								else
									echo '<tr><td colspan="7">You haven\'t selected any item</td></tr>';
							?>
						</tbody>
					</table>
					<button type="submit" class="btn btn-primary btn-lg pull-right"  <?php echo (isset($theme_color)?$theme_color:""); ?> name="order" id="order" value="update"  data-toggle="tooltip" title="Place Orders">
						<?php
							echo 'Place Orders <i class="mdi-maps-local-restaurant"></i>';
						?>
					</button>  
				</form>
			</div>
		</div>
</section>
	
	<script>
		var grandtotal = 0;
		// console.log("Script Active");
		
		function updateServings(item, qty_id, op) {
			// console.log("Updating Servings on plate");
			var uqty = $(qty_id).val();
			qty = parseInt(uqty);
			
			if(op == 'minus'){
				if(qty > 1){
					qty--;
				}
			}
			else
				qty++;
			
			// console.log("UQty: "+qty);
			// console.log(item, qty);
			// console.log("qty"+item);
			
			
			//$('#orders_list').load("index.php?a=place-order #orders_list");
			
			$.get('app/auto_reload_result.php?data=update_plate&item='+item+'&qty='+qty, function(data) {
				// console.log(data);
				$('#orders_list').load("index.php?a=place-order #orders_list");
				$('#qty'+qty_id).addClass("animated fadeInTop")
			});		
		}
	
		function update_total(val){
			console.log("Updating Total" + val);
		}
	</script>