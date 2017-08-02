<?php 
	include 'app/cls-table.php';
	include 'app/cls-login-mgr.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	
	$tbl_obj = new Table();	
	$login_obj = new LoginMgr();
	$order_obj = new Order();
	$utility_obj = new Utility();
	
	$stp = 1;
	if(isset($_GET['stp'])) {
		$stp = $_GET['stp'];
		$mode = $_GET['m'];
	}
	
	if(isset($_GET['st'])){
		//echo 'Potter';
		//echo $login_obj->setTable($_GET['st']);
		if($login_obj->setTable($_GET['st'])){
			//echo 'James';
			if(isset($_GET['for'])){
				if($_GET['for'] == 'bill')
					header ('Location: index.php?a=bill&for=bill');
				elseif($_GET['for'] == 'order')
					header ('Location: index.php?a=menu&for=order');
			}				
			else
				header ('Location: index.php?a=menu');
		}
	}
	
	if(isset($_SESSION['table_id']) && !isset($_GET['st'])){
		unset($_SESSION['table_id']);
		unset($_SESSION['table']);
		header ('Location: index.php?a=tables');
	}
	
	$orders = $order_obj->getOrderSummary(3);
?>
<section id="features" class="section">
	<br>
      <div class="container">
        <div class="section-header">
          <h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="100ms">
			<a href="index.php?a=actions" class="btn btn-fab btn-fab-mini btn-flat btn-primary"><i class="fa fa-arrow-left"></i></a>
			<?php
				if(isset($_GET['for']) && $_GET['for'] == 'bill')
					echo 'Present Bill';
				elseif(isset($_GET['for']) && $_GET['for'] == 'reserved')
					echo 'Reserved Tables';
				else
					echo 'Place an Order';
			?>
		  </h1>
        </div>
        <div class="row">
			<div class="col-md-4 col-sm-6 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">
				<h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">Select a table</h2>
				<?php
					if(isset($_GET['for']) && $_GET['for'] == 'bill'){
						$orders = $order_obj->getOrderSummary(3);
						
						$count = count($orders);
						
						if($count > 0)
							foreach($orders as $order){
								echo '<a href="index.php?a=bill&ok='.$order['order_key'].'" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
												<h2>
												'.$utility_obj->getObjectFromID('tbl_tables', 'table_name', 'table_id', $order['table_id']).'
												<i class="fa fa-chevron-circle-right"></i>
												</h2>
											</a>';
							}
						else
							echo '<li>No tables available for billing</li>';
					}
					else {
						$tables = $tbl_obj->getAllFor($_SESSION['restaurant_id']);
						foreach($tables as $table){
							$ordered_table = array();
							foreach($orders as $order)
								array_push($ordered_table, $order['table_id']);
								
							//if(!in_array($table['id'], $ordered_table))
							echo '<button data-toggle="collapse" data-target="#billing_method_'.$table['id'].'" data-parent="#billing_method" class="btn btn-flat btn-primary btn-block"  style="text-align:left;">
											<h2>
												'.$table['table'].'
												<i class="fa fa-chevron-circle-right"></i>
											</h2>
										</button>									
										';
						}
					}
				?>
					
			</div>
			
			<?php
				if(isset($_GET['for']) && $_GET['for'] == 'bill'){
					
				}
				else {
			?>
			
			
			<div class="col-md-4 col-sm-6 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms" id="bill_method" >				
				<h2 class="section-subtitle wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">Select a billing method</h2>
				<div class="" id="billing_method">
						<?php
							foreach($tables as $table){
									$ordered_table = array();
									foreach($orders as $order)
										array_push($ordered_table, $order['table_id']);
										
									//if(!in_array($table['id'], $ordered_table))
									echo '<div class="panel panel-default" style="background-color:rgba(0,0,0,0); box-shadow:none;">
													<div class="panel-collapse collapse" id="billing_method_'.$table['id'].'" style="padding-top: 3%;">
														<a  href="index.php?a=tables&bm=sh&st='.$table['id'].'&for='.((isset($_GET['for']))?$_GET['for']:'order').'" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
															<h1>
																<i class="mdi-social-person"></i>
																Single																
															</h1>
														</a>
														<a  href="index.php?a=tables&bm=sp&st='.$table['id'].'&for='.((isset($_GET['for']))?$_GET['for']:'order').'" class="btn btn-flat btn-primary btn-block "  style="text-align:left;">
															<h1>
																<i class="mdi-social-people"></i>
																Multiple
															</h1>
														</a>
													</div>
												</div>										
												';
							}
						?>
						</div>
					
				</div>
				<?php
				}
				?>
			</div>
		</div>
	
</section>