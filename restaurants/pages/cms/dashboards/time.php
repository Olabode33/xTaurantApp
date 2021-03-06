<?php
	
	//Load Data
	$wait_time_data = $dash_obj->getDataForQuestion(3, $age_f, $gender_f, $time_f);
	$avg_time_data = $dash_obj->getDetailsForEstimatedTime($time_f);
	
	//echo json_encode($avg_time_data['etime']);
	//echo json_encode($wait_time_data['points']);
	
	
	$bg_colors = ["#8E44AD", "#F62459", "#6C7A89", "#F89406", "#03C9A9"];
	
?>
<div class="col-xs-3">
	<!--Filter-->
	<?php
		include 'pages/cms/dashboards/d-filters.php';
	?>
	<!--Legends-->
	<h3>Legends</h3><hr>
	<span id="wtLegends"></span>
	<hr>
	<div class="legend wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">
		<p>
			<span style="background-color: <?php echo $bg_colors[0]; ?>"></span>
			Estimated Serve Time
		</p>
		<p>
			<span style="background-color: <?php echo $bg_colors[1]; ?>"></span>
			Recorded Serve Time
		</p>
	</div>
</div>

<div class="col-xs-9">
	<?php
		include 'pages/cms/dashboards/d-nav.php';
	?>

	<!--Charts-->
	<div class="row">
		<div class="col-md-4">
				<canvas id="wt_chart" width="400" height="400"></canvas>
		</div>	
		<div class="col-md-4">
				<canvas id="at_chart" width="400" height="400"></canvas>
				<span class="help-block text-center">Age and Gender filter doesn't apply to this chart.</span>
		</div>	
	</div>
	<hr>
</div>



<script>
	var legends = function(chart) {
			console.log(chart.data);
			
			var text = [];
			text.push('<div class="legend">');
			for(var i=0; i<chart.data.datasets[0].data.length; i++) {
				text.push('<p>');
				text.push('<span style="background-color: ' + chart.data.datasets[0].hoverBackgroundColor[i] + '"></span>'); //+ chart.data.datasets[0].data[i] +  (Add data to legend)
				if (chart.data.labels[i]) {
					text.push(chart.data.labels[i]);
				}
				text.push('</p>');
			}
			text.push('</div>');
			return text.join("");
		}

	//Colors::
	var waittime_color =  ["#f44336",  "#FFC107", "#4CAF50"];
	var waittime_hover = ["#FFA000", "#F57C00", "#E64A19"];
	var trans_color = ["rgba(244,67,54,0.5)",  "rgba(255,193,7,0.5)", "rgba(76,175,80,0.5)"]
	
	var wt_chart = $("#wt_chart");
	var at_chart = $("#at_chart");
	
	//SetUp for Waiting Time
	var wt_datas = {
		labels: <?php  echo json_encode($wait_time_data['labels']); ?>,
		datasets: [{
				label: "Response (%)",
				backgroundColor: trans_color,
				borderColor: waittime_color,
				borderWidth: 2,
				hoverBackgroundColor: waittime_color,
				hoverBorderColor: '#ffffff',
				hoverBorderWidth: 2,
				data: <?php  echo json_encode($wait_time_data['points']); ?>,
			}]
	};
	var wt_options = {
		title: {
			display: true,
			text: 'Average Waiting Time<?php echo $time_f_text; ?>'
		},
		legend: {
			display: false
		},
		legendCallback: legends
	}
	var wtChart = new Chart(wt_chart, {
		type: 'polarArea',
		data: wt_datas,
		options: wt_options
	});
	$("#wtLegends").html(wtChart.generateLegend());
	
	var at_data = {
		labels: <?php echo json_encode((isset($avg_time_data['date']))?((isset($_GET['r']) && ($_GET['r'] == '3h' || $_GET['r'] == '6h' || $_GET['r'] == '24h'))?$avg_time_data['hours']:$avg_time_data['date']):0); ?>,
		datasets: [
			{
				label: "Estimated Serve Time(mins)",
				fill: false,
				lineTension: 0.1, 
				backgroundColor: "<?php echo $bg_colors[0]; ?>",
				borderColor: "<?php echo $bg_colors[0]; ?>",
				borderCapStyle: "butt",
				borderDash: [],
				borderDashOffset: 0.0,
				borderJoinStyle: "mitter",
				pointBorderColor: "<?php echo $bg_colors[0]; ?>",
				pointBackgroundColor: "#fff",
				pointBorderWidth: 5,
				pointHoverRadius: 5, 
				pointHoverBackgroundColor: "<?php echo $bg_colors[0]; ?>",
				pointHoverBorderColor: "rgba(220, 220, 220, 1)",
				pointHoverBorderWidth: 2,
				pointRadius: 1,
				pointHitRadius: 10,
				data: <?php echo json_encode((isset($avg_time_data['etime']))?$avg_time_data['etime']:0); ?>,
				spanGaps: false
			},
			{
				label: "Recorded Serve Time(mins)",
				fill: false,
				lineTension: 0.1, 
				backgroundColor: "<?php echo $bg_colors[1]; ?>",
				borderColor: "<?php echo $bg_colors[1]; ?>",
				borderCapStyle: "butt",
				borderDash: [],
				borderDashOffset: 0.0,
				borderJoinStyle: "mitter",
				pointBorderColor: "<?php echo $bg_colors[1]; ?>",
				pointBackgroundColor: "#fff",
				pointBorderWidth: 5,
				pointHoverRadius: 5, 
				pointHoverBackgroundColor: "<?php echo $bg_colors[1]; ?>",
				pointHoverBorderColor: "rgba(220, 220, 220, 1)",
				pointHoverBorderWidth: 2,
				pointRadius: 1,
				pointHitRadius: 10,
				data: <?php echo json_encode((isset($avg_time_data['atime']))?$avg_time_data['atime']:0); ?>,
				spanGaps: false
			}
		]
	};
	var at_options = {
		title: {
			display: true,
			text: 'Average Serve Time<?php echo $time_f_text; ?>'
		},
		legend: {
			display: false
		},
		scales: {
			yAxes: [{
				ticks: {
					beginAtZero: true,
					maxTicksLimit: 5
				}
			}]
		}
	}
	var atChart = new Chart(at_chart, {
		type: 'line',
		data: at_data,
		options: at_options
	});
	//$("#atLegends").html(wtChart.generateLegend());
	
</script>