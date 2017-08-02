<?php
	include 'app/cls-menu.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	$utility_obj = New Utility();
	$order_obj = New Order();
	$menu_obj = New Menu();

	$mid = 0;
	if(isset($_GET['mid'])){
		$mid = $_GET['mid'];
	}
	
	if(isset($_GET['diid'])){
		$rows = $menu_obj->remove_item($_GET['diid']);
		//echo $rows
		if($rows > 0){
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-success">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>'.$rows.'</strong> records deleted.
														  </div>';
			header('Location: index.php?a=cms&s=menu-view&mid='.$mid);
		}
		else{
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-warning">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>'.$rows.'</strong> records deleted.
														  </div>';
			header('Location: index.php?a=cms&s=menu-view&mid='.$mid);
		}
		
	}
	if(isset($_GET['siid'])){
		$rows = $menu_obj->set_special_item($_GET['siid'], $_GET['sp']);
		//echo $rows
		if($rows > 0){
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-success" style="margin-top:50px">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>'.$rows.'</strong> records updated.
														  </div>';
			header('Location: index.php?a=cms&s=menu-view&mid='.$mid);
		}
		else{
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-warning">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>Error updating menu item'.$rows.'</strong> records deleted.
														  </div>';
			header('Location: index.php?a=cms&s=menu-view&mid='.$mid);
		}
		
	}
	
?>
		<div class="section-header">
			<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="index.php?a=cms&s=menu" class="btn btn-fab btn-flat btn-primary" data-toggle="tooltip" title="Go Back to Menu Categories"><i class="fa fa-arrow-left"></i></a>
				Menu - <span class="small"><?php echo $utility_obj->getObjectFromID('tbl_menus', 'menu_name', 'menu_id', $mid); ?></span>
			</h1>
			<hr>
        </div>
		
		<div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
			<a class="btn btn-sm btn-primary pull-left" href="index.php?a=cms&s=menu-item&mid=<?php echo $mid; ?>"><span class="fa fa-plus-square-o"></span> New Menu Item</a>
			<!--h3>Items under this menu</h3-->
			<table class="table table-hover">
				<thead>
					<th class="col-sm-1">S/n</th>
					<th class="col-xs-3">Item</th>
					<th class="col-xs-2">Price (₦)</th>
					<th class="col-xs-1">Special</th>
					<!--th class="hidden-xs hidden-sm hidden-md">Note</th-->
					<th class="col-xs-3">Actions</th>
				</thead>
				<tbody>
				<?php
					//<td>'.$item['note'].'</td>
				
					$items = $menu_obj->getItemsFor($mid);
					$count = 1;
					
					foreach($items as $item){
						echo '<tr>
									<td>'.$count.'</td>
									<td>'.$item['menu_item'].'</td>
									<td>'.$item['price'].'</td>
									
									<td>
										<a href="#" class="btn btn-flat btn-primary" data-toggle="modal" data-target="#deleteItem" data-title="Set as Special" style="margin: 0px; padding: 0px 10px;"
											data-msg="Are you sure you want to make the menu item '.$item['menu_item'].' a '.(($item['special'] == 1)?'regular':'special').'?" 
											data-link="index.php?a=cms&s=menu-view&siid='.$item['id'].'&mid='.$mid.'&sp='.(($item['special'] == 1)?'n':'y').'" >
											<i class="mdi-toggle-'.(($item['special'] == 1)?'star':'star-outline').'" ></i>
										</a>
									</td>
									<td>
										<a href="index.php?a=cms&s=menu-item&iid='.$item['id'].'&mid='.$mid.'" class="btn btn-xs btn-primary " style="margin: 0px"><span class="fa fa-pencil"></span> Edit</a>
										<!--a href="index.php?a=cms&s=menu-view&diid='.$item['id'].'&mid='.$mid.'" class="btn btn-xs btn-primary " style="margin: 0px"><span class="fa fa-trash"></span> Delete</a-->
										<button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#deleteItem" data-title="Delete Menu Item" 
											data-msg="Are you sure you want to delete the menu item '.$item['menu_item'].'?" 
											data-link="index.php?a=cms&s=menu-view&diid='.$item['id'].'&mid='.$mid.'" style="margin: 0px">
											<span class="fa fa-trash"></span> Delete
										</button>
									</td>
								 </tr>';
						
						$count++;
					}
				?>
					
				</tbody>
			</table>
		</div>
