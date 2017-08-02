	
		 <?php
			if($action == 'menu')
				include ("menu-navbar.php");
		?>
		<!--Header -->
		<div class="col-md-12">
				<!--top Navbar bar header -->
				<div class="navbar navbar sticky-navigation navbar-fixed-top affix <?php echo (isset($theme_color)?$theme_color:""); ?>" role="navigation">
					<div class="container">
						<div class="navbar-header">
							<a class="logo-left " href="index.php">
								<?php 
										echo ((isset($_SESSION['logo_name']))?'<img src="assets/images/restaurants-logo/'.$_SESSION['logo_name'].'" id="HeaderLogo" class="img-rounded" height="35px" width="auto"/>':
													((isset($_SESSION['restaurant_id']))?$_SESSION['restaurant']: 'xTaurantApp')
												 ); 
								?> 
							</a>
						</div>
						<div class="navbar-right">
							<button class="menu-icon">
								<a href="index.php?a=actions"><i class="mdi-action-home" style="color: #fff;"></i></a>
								<?php						
									if(isset($_SESSION['user']))
										echo '<a href="index.php?a=login&s=exit"><i class="fa fa-sign-out" style="color: #fff;" data-toggle="tooltip" title="Sign Out"></i></a>&nbsp;';
									if($action == "menu")
										echo '<a href="index.php?a=place-order" data-toggle="tooltip" title="Complete Order"><i class="fa fa-arrow-circle-right" style="color: #fff"></i>
													<span class="badge badge-primary orders-count">'.(isset($_SESSION['order']) && count($_SESSION['order']) > 0? count($_SESSION['order']): 0).'</span></a>';
								?>
							</button>
							<!--button class="menu-icon"  id="open-button">
								<?php
									if($action == "menu")
										echo '<i class="mdi-maps-local-restaurant" id="btn-menu-list"></i><span class="badge badge-primary orders-count">'.(count($_SESSION['order']) > 0? count($_SESSION['order']): 0).'</span>';
									else {}
									//	echo '<i class="mdi-navigation-menu"></i>';
								?>
							</button-->             
						</div>
					</div>
				   
			<?php
			if ($action == 'login' || $action == 'actions'){}
			else{
				echo '<div style="background-color: #FFFAFA; margin-bottom: -20px; ">
							<ul class="container breadcrumb '.(isset($theme_text)?$theme_text:"").'" style="background-color: #FFFAFA;">
								<li><a href="index.php?a=actions" class="'.(isset($theme_text)?$theme_text:"").'"> Actions</a></li>';
								switch($action){
									case 'actions':
										break;
									case 'cms':
										if(isset($_GET['s'])){							
											switch($_GET['s']){
												case 'menu-new':
													if(isset($_GET['mid']))
														echo '<li><a href="index.php?a=cms&s=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>
																 <li class="active">Edit Menu</li>';
													else
														echo '<li><a href="index.php?a=cms&s=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>
																 <li class="active">New Menu</li>';
													break;
												case 'menu-view':
													echo '<li><a href="index.php?a=cms&s=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>
															 <li class="active">View Menu</li>';
													break;
												case 'menu':
													if(isset($_GET['dmid']))
														echo '<li><a href="index.php?a=cms&s=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>
																 <li class="active">Delete Menu</li>';
													else
														echo '<li class="active">Menus</li>';
													break;
												case 'menu-item':
													if(isset($_GET['iid']))
														echo '<li><a href="index.php?a=cms&s=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>
																 <li><a href="index.php?a=cms&s=menu-view&mid='.$_GET['mid'].'" class="'.(isset($theme_text)?$theme_text:"").'">Menu Item</a></li>
																 <li class="active">Edit Menu Item</li>';
													else
														echo '<li><a href="index.php?a=cms&s=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>
																 <li><a href="index.php?a=cms&s=menu-view&mid='.$_GET['mid'].'" class="'.(isset($theme_text)?$theme_text:"").'">Menu Item</a></li>
																 <li class="active">New Menu Item</li>';
													break;										
												case 'dashboard':
													if(isset($_GET['m']) && $_GET['m'] != 'default')
														echo '<li><a href="index.php?a=cms&s=dashboard" class="'.(isset($theme_text)?$theme_text:"").'">Dashboard</a></li>
																  <li class="active">'.ucfirst($_GET['m']).'</li>';
													else
														echo '<li class="active">Dashboard</li>';
													break;
												case 'user':
													if(isset($_GET['duid']))
														echo '<li><a href="index.php?a=cms&s=user" class="'.(isset($theme_text)?$theme_text:"").'">User</a></li>
																 <li class="active">Delete User</li>';
													else
														echo '<li class="active">Users</li>';
													break;
												case 'user-new':
													if(isset($_GET['uid']))
														echo '<li><a href="index.php?a=cms&s=user" class="'.(isset($theme_text)?$theme_text:"").'">User</a></li>
																 <li class="active">Edit User</li>';
													else
														echo '<li><a href="index.php?a=cms&s=user" class="'.(isset($theme_text)?$theme_text:"").'">User</a></li>
																 <li class="active">New User</li>';
													break;
												case 'restaurants':		
													if(isset($_GET['drid']))
														echo '<li><a href="index.php?a=cms&s=restaurants" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant</a></li>
																 <li class="active">Delete Restaurant</li>';
													else
														echo '<li class="active">Restaurant</li>';
													break;
												case 'restaurant-new':
													if(isset($_GET['rid']))
														echo '<li><a href="index.php?a=cms&s=restaurants" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant</a></li>
																 <li class="active">Edit Restaurant</li>';
													else
														echo '<li><a href="index.php?a=cms&s=restaurants" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant</a></li>
																 <li class="active">New Restaurant</li>';
													break;
												case 'restaurant-view':
													echo '<li><a href="index.php?a=cms&s=restaurants" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant</a></li>
															 <li class="active">View Restaurant</li>';
													break;
												case 'table-new':
													if(isset($_GET['iid']))
														echo '<li><a href="index.php?a=cms&s=restaurants" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant</a></li>
																 <li><a href="index.php?a=cms&s=restaurant-view&rid='.$_GET['rid'].'" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant Table</a></li>
																 <li class="active"> Edit Restaurant Table</li>';
													else
														echo '<li><a href="index.php?a=cms&s=restaurants" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant</a></li>
																 <li><a href="index.php?a=cms&s=restaurant-view&rid='.$_GET['rid'].'" class="'.(isset($theme_text)?$theme_text:"").'">Restaurant Table</a></li>
																 <li class="active">New Restaurant Table</li>';
													break;	
											}
										}									
										break;
									case 'place-order':
										echo '<li><a href="index.php?a=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>';
										echo '<li class="active">Place Order</li>';
										break;
									case 'message':
										if(isset($_GET['m']) && $_GET['m'] == 'wait'){
											echo '<li><a href="index.php?a=menu" class="'.(isset($theme_text)?$theme_text:"").'">Menu</a></li>';
											echo '<li><a href="index.php?a=place-order" class="'.(isset($theme_text)?$theme_text:"").'">Place Order</a></li>';
											echo '<li class="active">Order Placed</li>';
										}
										if(isset($_GET['m']) && $_GET['m'] == 'bill'){
											echo '<li class="active">Bill</li>';
										}
										
										if(isset($_GET['m']) && $_GET['m'] == 'feedback'){
											echo '<li class="active">Feedback Sumbitted</li>';
										}
										break;
									default:
										echo '<li class="active">'.ucfirst($action).'</li>';
								}
				echo '	</ul>
						 </div>';
			}
		?>
			</div>
		</div>