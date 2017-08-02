<?php
	include_once 'app/cls-dashboard.php';
	include_once 'utility/utility.php';

	$util_obj = new Utility();
	$dash_obj = new Dashboard();

	$summary = $dash_obj->getDashboardSummary();
	
	// echo json_encode($wait_time_data['labels']);
	// echo json_encode($wait_time_data['points']);
	// echo json_encode($wait_time_data['max_label']);
	// echo json_encode($wait_time_data['max_point']);
	// echo json_encode($wait_time_data['avg']);
	
	$scale_color = ["#f44336", "#FF9800", "#FFC107", "#CDDC39", "#4CAF50"];
	
	//5 - Green - rgba(76,175,80,1); #4CAF50;
	//4 - Lime - rgba(205,220,57,1); #CDDC39;
	//3 - Amber - rgba(255,193,7,1); #FFC107;
	//2 - Orange - rgba(255,152,0,1); #FF9800;
	//1 - Red - rgba(244,67,54,1); #F44336;
	
	// echo '<pre>';
	// print_r($summary);
	// echo '</pre>';
?>
<div class="row">
	<div class="col-xs-3">
		<!--Filter-->
		<?php
			//include 'pages/cms/dashboards/d-filters.php';
		?>
		<h3>Legends</h3><hr>
		<div class="legend wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">
			<p>
				<span style="background-color: <?php echo $scale_color[0]; ?>"></span>
				Score 1 (Very Low)
			</p>
			<p>
				<span style="background-color: <?php echo $scale_color[1]; ?>"></span>
				Score 2 (Low)
			</p>
			<p>
				<span style="background-color: <?php echo $scale_color[2]; ?>"></span>
				Score 3 (Medium)
			</p>
			<p>
				<span style="background-color: <?php echo $scale_color[3]; ?>"></span>
				Score 4 (High)
			</p>
			<p>
				<span style="background-color: <?php echo $scale_color[4]; ?>"></span>
				Score 5 (Very High)
			</p>
		</div>
		<hr>
	</div>

	<div class="col-xs-9">
		<!--Quick Facts-->
		<div class="">
			<div class="col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
				<div class="features-content text-center">
					<a href="index.php?a=cms&s=dashboard&m=time" class="btn btn-primary btn-flat btn-block btn-material-green" >
						<div class="icon hi-icon-effect-3b">
							<i class="mdi-image-timelapse"></i>
						</div>
						<h3>Time to Serve</h3>
					</a>
					<hr>
					<div class="" >
						<table>
							<tr>
								<th width="5%"></th>
								<th width="80%">Highest Reponse</th>
								<th width="10%">Count</th>
							</tr>
							<tbody>
								<tr>
									<td colspan="3"><i>Wait Time (Customer's Response)</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['time']['waittime_max_l']; ?></td>
									<td><?php echo $summary['time']['waittime_max_p']; ?></td>
								</tr>
								<tr>
									<td colspan="3"><i>Average Time To Serve (Past 30 days)</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>Estimated Time To Serve (mins)</td>
									<td><?php echo number_format($summary['time']['etime'], 0); ?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>Record Time To Serve (mins)</td>
									<td><?php echo number_format($summary['time']['atime'], 0); ?></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
								<tr>
									<td colspan="3"><i>&nbsp;</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
									<td>&nbsp;</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			<div class="col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
				<div class="features-content text-center">
					<a href="index.php?a=cms&s=dashboard&m=quality" class="btn btn-primary btn-flat btn-block btn-material-amber" >
						<div class="icon hi-icon-effect-3b">
							<i class="mdi-maps-local-restaurant"></i>
						</div>
						<h3>Quality of Service</h3>
					</a>
					<hr>
					<div class="" >
						<table>
							<tr>
								<th width="5%"></th>
								<th width="80%">Highest Reponse</th>
								<th width="10%">Count</th>
							</tr>
							<tbody>
								<tr>
									<td colspan="3"><i>Attendant</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['quality']['attendant_max_l']; ?></td>
									<td><?php echo $summary['quality']['attendant_max_p']; ?></td>
								</tr>
								<tr>
									<td colspan="3"><i>Employee</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['quality']['employee_max_l']; ?></td>
									<td><?php echo $summary['quality']['employee_max_p']; ?></td>
								</tr>
								<tr>
									<td colspan="2"><i>Customer</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['quality']['customer_max_l']; ?></td>
									<td><?php echo $summary['quality']['customer_max_p']; ?></td>
								</tr>
								<tr>
									<td colspan="2"><i>Meal</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['quality']['meal_max_l']; ?></td>
									<td><?php echo $summary['quality']['meal_max_p']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
	
			<div class="col-sm-6 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="600ms">
				<div class="features-content text-center">
					<a href="index.php?a=cms&s=dashboard&m=customer" class="btn btn-primary btn-flat btn-block btn-material-red" >
						<div class="icon hi-icon-effect-3b">
							<i class="mdi-social-people"></i>
						</div>
						<h3>Customer Satisfaction</h3>
					</a>
					<hr>
					<div class="" >
						<table>
							<tr>
								<th width="5%"></th>
								<th width="80%">Highest Reponse</th>
								<th width="10%">Count</th>
							</tr>
							<tbody>
								<tr>
									<td colspan="3"><i>Beverage</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['customer']['beverage_max_l']; ?></td>
									<td><?php echo $summary['customer']['beverage_max_p']; ?></td>
								</tr>
								<tr>
									<td colspan="3"><i>Food Quality</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['customer']['food_max_l']; ?></td>
									<td><?php echo $summary['customer']['food_max_p']; ?></td>
								</tr>
								<tr>
									<td colspan="2"><i>Value</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['customer']['value_max_l']; ?></td>
									<td><?php echo $summary['customer']['value_max_p']; ?></td>
								</tr>
								<tr>
									<td colspan="2"><i>Ambassador</i></td>
								</tr>
								<tr>
									<td>&nbsp;</td>
									<td><?php echo $summary['customer']['ambassador_max_l']; ?></td>
									<td><?php echo $summary['customer']['ambassador_max_p']; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			
			
		</div>
		<hr>		
	</div>
</div>

<script>
	function filter(){
		var filt = $(event.currentTarget);
		var opt = filt.val();
		window.location.href = 'index.php?a=cms&s=dashboard&t='+opt;
	}
</script>