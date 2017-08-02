								<table class="table order-items wow fadeInRight" width="100%">
									<thead>
										<tr>
											<th width="50%">Item</th>
											<th width="20%">Qty</th>
											<th width="20%">Price</th>
											<th width="10%"></th>
										</tr>
									</thead>
									<tbody id="order-items">
									<?php 
										//include 'utility/utility.php';
										//$utility_obj = New Utility();
	
										$count = 1;
										$total = 0;
										
										if(isset($_SESSION['order']) && count($_SESSION['order']) > 0){
											echo '<tr><td colspan="4">
															<a href="index.php?a=place-order" style="background-color: #fff; padding: 5px;" class="btn-block btn btn-flat btn-primary">
																Complete Order
																<i class="fa fa-arrow-circle-right"></i>
															</a>
														</td></tr>';
											foreach($_SESSION['order'] as $id=>$value){
												if($id != 0){
													echo '<tr>
																<td>'.$_SESSION['order'][$id]['name'].'</td>
																<td>'.number_format($_SESSION['order'][$id]['quantity'], 0).'</td>
																<td>'.number_format($_SESSION['order'][$id]['price'] * $_SESSION['order'][$id]['quantity'], 0).'</td>
																<td>
																	<button type="button" class="btn btn-flat" style="color: #fff"  data-toggle="modal" data-target="#removeOrder"
																		data-item="'.$_SESSION['order'][$id]['name'].'" data-id="'.$id.'" data-price="'.$_SESSION['order'][$id]['price'].'" 
																		data-tprice="'.number_format($_SESSION['order'][$id]['price'], 2).'" data-qty="'.$_SESSION['order'][$id]['quantity'].'">
																		<span class="fa fa-times-circle"></span>
																	</button>
																</td>
															</tr>';
															
													$total += $_SESSION['order'][$id]['price'] * $_SESSION['order'][$id]['quantity'];
													$count++;
												}
											}
											echo '<tr>
														<td><b>Total </b></td>
														<td>&nbsp;</td>
														<td><b>'.number_format($total,2).'</b></td>
														<td>&nbsp;</td>
													 </tr>';
										}
										else {
											echo '<tr><td colspan="4">You haven\'t selected any item</td></tr>';
										}
									?>
									</tbody>
								</table>
								
								