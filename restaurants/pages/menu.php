<?php
	include 'app/cls-menu.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	$utility_obj = New Utility();
	$menu_obj = New Menu();
	$order_obj = New Order();
	
	$m=$utility_obj->getObjectFromID('tbl_menus m INNER JOIN tbl_restaurant_menus rm ON m.menu_id = rm.menu_id', 'menu_name', 'restaurant_id', $_SESSION['restaurant_id'].' LIMIT 1');
	$m_id = $utility_obj->getObjectFromID('tbl_menus m INNER JOIN tbl_restaurant_menus rm ON m.menu_id = rm.menu_id', 'm.menu_id', 'restaurant_id', $_SESSION['restaurant_id'].' LIMIT 1');
	if(isset($_GET['m'])){
		$m = $utility_obj->getObjectFromID('tbl_menus', 'menu_name', 'menu_id', $_GET['m']);
		$m_id = $_GET['m'];
	}
	
	if(isset($_POST['menu']) && $_POST['menu'] == 'order'){
		$order_obj->addToPlate();
		// echo '<pre>';
		// print_r($_SESSION['order']);
		// echo '</pre>';
	}
	
	if(isset($_POST['menu']) && $_POST['menu'] == 'remove'){
		$order_obj->removeFromPlate();
	}
	
	if(isset($_GET['st'])) {
		
	}
	
	$menus = $menu_obj->getMenusFor($_SESSION['restaurant_id']);
	?>
	<section class="section">
		<br>
		<div class="container">
			<div class="section-header">
				<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
					<a href="index.php?a=actions" class="btn btn-fab btn-fab-mini btn-primary btn-flat"><i class="fa fa-arrow-left"></i></a>
					Select Menu	
				</h1>
				
				<hr>
			</div> 
			<div class="row">
				<div class="col-md-3 col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
					<ul class="list-item" id="menu-sidebar" style="background: #fff !important;">
						<li class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
							<h2>
								Our Menus
							</h2>
						</li>
						<?php
							foreach($menus as $menu)
								echo '
										<li>
											<a href="#'.$menu['id'].'" class="btn btn-flat btn-primary btn-block truncate"  style="text-align:left;">
												<h4>'.$menu['menu'].' </h4>
											</a>
										</li>
										';
						?>
					</ul>
				</div>
				
				<div class="col-md-9 col-sm-8 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
					<?php
						foreach($menus as $menu) {
							echo '<h3 id="'.$menu['id'].'">'.$menu['menu'].'</h3>
											<div class="row">';
							//List of Items
							$items = $menu_obj->getItemsFor($menu['id']);
							$count = 0;
							
							foreach($items as $item){							
								echo '
											<div class="col-md-3 col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
												<a class="btn-menu '.(isset($theme_text)?$theme_text:"").'" data-item="'.$item['menu_item'].'" data-id="'.$item['id'].'" data-price="'.$item['price'].'" data-tprice="'.number_format($item['price'], 2).'" 
																				data-qty="1" data-etime="'.$item['time'].'">
													<div class="features-content thumbnail">
														<div class="icon hi-icon-effect-3b">
															<img src="assets/images/menu-items/'.$item['image'].'" class="img-responsive"/>
														</div>
														<h4>'.$item['menu_item'].'</h4>
														<p class="row" style="padding: 0px">
															<span class="col-sm-8">
																₦'.number_format($item['price'], 2).'
															</span>
															<span class="col-sm-4" id="selected_item_'.$item['id'].'">
															</span>
														</p>
													</div>
												</a>
												<br>
											</div>
										 ';
							}
							echo '</div><hr>';
						}
					?>
				</div>
				<button class="btn btn-fab btn-primary btn-bottom btn-lg"  id="open-button" data-toggle="tooltip" title="View Orders">
					<?php
						echo '<i class="mdi-maps-local-restaurant" id="btn-float-menu-list"></i><span class="badge badge-primary orders-count">'.(isset($_SESSION['order']) && count($_SESSION['order']) > 0? count($_SESSION['order']): 0).'</span>';
					?>
				</button>  
		<script>
			$('#menu-sidebar').affix({
				offset: {
					top: 100
				}
			});
			
			var offset = 300;
			
			$('#menu-sidebar li a').click(function(event) {
				event.preventDefault();
				//console.log($(this).attr('href'));
				$($(this).attr('href'))[0].scrollIntoView();
				scrollBy(100, -offset);
			});
			
			
			$(document).ready(function(){
				$('[data-toggle="tooltip"]').tooltip();   
			});
			
			$(".btn-menu").on('click', function(e) {
				var item_name = $(this).data('item')
				var item_id = $(this).data('id');
				var item_price = $(this).data('price');
				var item_qty = 1;
				
				console.log(item);
				
				$.ajax({
					type: 'POST',
					url: 'index.php?a=menu',
					data: {
						name: item_name,
						item: item_id,
						price: item_price,
						qty: item_qty,
						menu: "order"
					},
					success: function (data) {
						//Add and remove tick to indicate selection
						$("#selected_item_"+item_id).html('<i class="fa fa-check text-success wow rollIn"></i>');
						setTimeout(function() {
							$("#selected_item_"+item_id).html('<i class="fa fa-check text-success wow rollOut"></i>')
						}, 3000)
						setTimeout(function () {
							$("#selected_item_"+item_id).html('')
						}, 4000)
						
						//Reload Order Summary list
						$.get("app/auto_reload_result.php?data=get_plate", function(data) {
							data = $.parseJSON(data);
							var orders = "";
							var total = 0;
							
							$.each(data, function (i, item) {
								orders += '<tr>';
								orders += "<td>" + item.name + "</td>";
								orders += "<td>" + item.qty + "</td>";
								orders += "<td>" + addCommas(item.price * item.qty) +"</td>";
								orders += '<td><button type="button" class="btn btn-flat" style="color: #fff;"  data-toggle="modal" data-target="#removeOrder" data-item="' +item.name+'" data-id="'+item.id+'" data-price="'+item.price+'" data-tprice="'+item.price+'" data-qty="'+item.qty+'"><span class="fa fa-times-circle"></span</button></td>';
								orders += "</tr>";
								
								total +=  item.qty * item.price;
							})
							
							orders += "<tr><td><b>Total </b></td><td>&nbsp;</td><td><b>"+addCommas(total)+"</b></td><td>&nbsp;</td></tr>";
							$("#order-items").html(orders);
						})
						
						//Animate Menu list button
						$("#btn-menu-list").addClass("animated rubberBand");
						setTimeout(function () {
							$("#btn-menu-list").removeClass("animated rubberBand")
						}, 2000)
						
						$(".btn-bottom").addClass("animated rubberBand");
						setTimeout(function () {
							$(".btn-bottom").removeClass("animated rubberBand")
						}, 2000)
						
						
						
						$.get('app/auto_reload_result.php?data=order_count', function(data) {
							$('.orders-count').html(data);
							//$("#float-orders-count").html(data);
							//console.log('Order Count Reloaded:' +data);
						});
						
						
					}
				});
			});
			
			function addCommas(nStr){
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
			}
		</script>		
	</section>
		
		