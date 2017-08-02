<?php 
	include 'app/cls-restaurant.php';
	include 'app/cls-order.php';
	include 'utility/utility.php';
	$utility_obj = New Utility();
	$order_obj = New Order();
	$restaurant_obj = New Restaurant();
	
	if(isset($_GET['drid'])){
		$rows = $restaurant_obj->remove_restaurant($_GET['drid']);
		//echo $rows
		if($rows > 0){
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-success">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>'.$rows.'</strong> record deleted.
														  </div>';
			header('Location: index.php?a=cms&s=restaurants');
		}
		elseif($rows == -1){
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-danger">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>Record cannot be deleted</strong> <br>
																Please delete menu items first.
														  </div>';
			header('Location: index.php?a=cms&s=restaurants');
		}
		else{
			$_SESSION['feedback'] = '<div class="alert alert-dismissible alert-warning">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																<strong>'.$rows.'</strong> record deleted.
														  </div>';
			header('Location: index.php?a=cms&s=restaurants');
		}
		
	}
	
?>
		<div class="section-header">
			<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
				<a href="index.php?a=actions" class="btn btn-fab btn-flat btn-primary"><i class="fa fa-arrow-left"></i></a>
				Manage Restaurants
			</h1>
			<hr>
        </div>
		
		<div class="">
			<a class="btn btn-primary" href="index.php?a=cms&s=restaurant-new"><span class="fa fa-plus"></span> Add New Restaurant</a>
			<div class="wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
				<table class="table table-hover">
					<thead>
						<th class="col-sm-1 col-md-1">S/n</th>
						<th class="col-sm-2 col-md-3">Restaurants</th>
						<th class="col-sm-2 col-md-2">Phone</th>
						<th class="col-sm-2 col-md-2">E-Mail</th>
						<th class="col-sm-5 col-md-3">Actions</th>
					</thead>
					<tbody>
					<?php 
						$restaurants = $restaurant_obj->getAll();
						$count = 1;
						
						foreach($restaurants as $restaurant){
							echo '<tr>
										<td>'.$count.'</td>
										<td class="truncate">'.$restaurant['restaurant'].'</td>
										<td>'.$restaurant['phone'].'</td>
										<td>'.$restaurant['email'].'</td>
										<td>
											<a href="index.php?a=cms&s=restaurant-view&rid='.$restaurant['id'].'" class="btn btn-xs btn-primary" style="margin: 0px"><span class="fa fa-eye"></span> View</a>
											<a href="index.php?a=cms&s=restaurant-new&rid='.$restaurant['id'].'" class="btn btn-xs btn-primary" style="margin: 0px"><span class="fa fa-pencil"></span> Edit</a>
											<!--a href="index.php?a=cms&s=restaurants&drid='.$restaurant['id'].'" class="btn btn-xs btn-primary" style="margin: 0px"><span class="fa fa-trash"></span> Delete</a-->
											<button class="btn btn-xs btn-primary" data-toggle="modal" data-target="#deleteItem" data-title="Delete Restaurant" 
												data-msg="Are you sure you want to delete the restaurant '.$restaurant['restaurant'].'?" 
												data-link="index.php?a=cms&s=restaurants&drid='.$restaurant['id'].'" style="margin: 0px">
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