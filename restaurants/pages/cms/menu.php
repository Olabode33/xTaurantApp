<?php 
	include 'app/cls-menu.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	$utility_obj = New Utility();
	$order_obj = New Order();
	$menu_obj = New Menu();
	
	if(isset($_GET['dmid'])){
		$rows = $menu_obj->remove_menu($_GET['dmid']);
		//echo $rows
		if($rows > 0){
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-success" style="margin-top:120px">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>'.$rows.'</strong> records deleted.
														  </div>';
			header('Location: index.php?a=cms&s=menu');
		}
		elseif($rows == -1){
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-danger" style="margin-top:120px">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>Record cannot be deleted</strong> <br>
																Please delete menu items first.
														  </div>';
			header('Location: index.php?a=cms&s=menu');
		}
		else{
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-warning" style="margin-top:120px">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>'.$rows.'</strong> records deleted.
														  </div>';
			header('Location: index.php?a=cms&s=menu');
		}
		
	}
	
?>

<div class="section-header">
			<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="index.php?a=actions" class="btn btn-fab btn-flat btn-primary"><i class="fa fa-arrow-left"></i></a>
				Menus Categories
			</h1>
			<hr>
        </div>
		
		<div class="">
			<a class="btn btn-primary" href="index.php?a=cms&s=menu-new"><span class="fa fa-plus"></span> New Menu Category</a>
			<div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
				<table class="table table-hover">
				<thead>
					<th class="col-sm-1">S/n</th>
					<th class="col-xs-3 col-sm-3">Menu</th>
					<th class="col-xs-2 col-sm-2">Items</th>
					<th class="col-xs-6 col-sm-3">Actions</th>
				</thead>
				<tbody>
				<?php 
					$menus = $menu_obj->getMenusFor($_SESSION['restaurant_id']);
					$count = 1;
					
					foreach($menus as $menu){
						echo '<tr>
									<td>'.$count.'</td>
									<td>'.$menu['menu'].'</td>
									<td>'.$menu['items'].'</td>
									<td>
										<a href="index.php?a=cms&s=menu-view&mid='.$menu['id'].'" class="btn btn-xs btn-primary" style="margin: 0px"><span class="fa fa-eye"></span> View</a>
										<a href="index.php?a=cms&s=menu-new&mid='.$menu['id'].'" class="btn btn-xs btn-primary"style="margin: 0px"><span class="fa fa-pencil"></span> Edit</a>
										<!--a href="index.php?a=cms&s=menu&dmid='.$menu['id'].'" class="btn btn-xs btn-primary" style="margin: 0px"><span class="fa fa-trash"></span> Delete</a-->
										<button class="btn btn-xs btn-primary " data-toggle="modal" data-target="#deleteItem" data-title="Delete Menu" 
											data-msg="Are you sure you want to delete the menu '.$menu['menu'].'?" 
											data-link="index.php?a=cms&s=menu&dmid='.$menu['id'].'" style="margin: 0px">
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
		</div>
	