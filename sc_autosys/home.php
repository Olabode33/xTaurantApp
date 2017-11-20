	<?php
		include "includes/header_pages.php";
	?>
	<script>
	
	</script>

	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-home"></i> Home
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-sm-6">
			<div class="panel panel-default panel-primary" style="height:">
				<div class="panel-heading  ">
					<h3 class="panel-title">Annoucements</h3>
				 </div>
				<div class="list-group" id="lg-notifications">
					<a href="#" class="list-group-item">
						<h5 class="list-group-item-heading"><strong>List group item heading</strong><small class="pull-right">Time</small></h5>
						<p class="list-group-item-text">List groupo item body</p>
					</a>
				</div>
			</div>
		</div>
		
		<div class="col-sm-6">
			<div id="waiting-list" class="">
				<div class="alert alert-info hidden alert-dismissible" role="alert" id="examine_alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-info-circle"></i> 
					<span id="examine_msg"></span>
				</div>
				<div class="panel panel-default panel-primary" style="height:">
					<div class="panel-heading  ">
						<h3 class="panel-title">
							Appointments for <span id="apptime">Today</span>
						</h3>
					 </div>
					<div class="panel-body">
						<div class="table-responsive">
							<div class="row">
								<h5 class="col-sm-2 control-label">Filter:</h5>
								<div class="col-sm-10">
									<select id="appfilter" name="appfilter" class="form-control input-sm">
										<option value="daily">Today</option>
										<option value="weekly">This Week</option>
										<option value="monthly">This Month</option>
									</select>
								</div>
							</div>
							<hr style="margin-top: 10px; margin-bottom: 10px;">
							<table class="table table-hover" id="tbl_waiting" >
								<thead class="thead-inverse">	
									<th class="col-xs-1" >S/n</th>						
									<th class="col-xs-2" id="dym_tilte">Date</th>						
									<th class="col-xs-5">Full Name</th>
									<th class="col-xs-2">Status</th>				
									<th class="col-xs-2">Actions</th>			
								</thead>
								
								<tbody>
									
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			
			<!--div id="quick_actions" class="frontdesk-only">
				<div class="panel panel-default panel-primary" style="height:">
					<div class="panel-heading  ">
						<h3 class="panel-title">Actions</h3>
					 </div>
					<div class="panel-body text-right">
						<p><a href="customers.php" class="btn btn-info">View customers</a></p>
						<p><a href="partners.php" class="btn btn-info">View partners</a></p>
						</span>
					</div>
				</div>
			</div-->
		</div>
	</div>
	
	<script>
		$(document).ready( function() {
			search();
			$("#waiting-details").addClass("hidden");
			$("#waiting-list").removeClass("hidden");
			
			var id = location.search;	
			id = id.split("=");
			msg = id[1];
			if(msg != undefined){
				if(msg == 'closed'){
					$("#examine_alert").removeClass("hidden");
					$("#examine_msg").html("Appointment was successfully closed")
				}
			}
			
			$("#appfilter").on('change', function() {
				search();
			})
			
			$.get('api/Controllers/Notifications_RestController.php?view=recent', function(data) {
				data = $.parseJSON(data);	
				//console.log(data);
				if(data.length > 0){
					var lg = $("#lg-notifications");
					lg.empty();
					
					$.each(data, function(i, item) {
						//console.log(item);
						listItem = $('<a></a>').addClass("list-group-item");
						listItem.html('<h5 class="list-group-item-heading"><strong>'+item.fname + ' ' + item.lname+'</strong><small class="pull-right">'+item.date+'</small></h5><p class="list-group-item-text">'+item.msg+'</p>');
						listItem.attr("href", "#");
						lg.append(listItem);
					});
				}
				else {
					var l = $("#lg-notifications");
					l.empty();
					listItem = $('<a></a>').addClass("list-group-item").html("<strong>No Notifications for now</strong>");
					l.append(listItem);
				}
			});
		});	
		
		function search() {
			var uri = '';
			var term = $("#appfilter").val();
			
			switch(term){
				case 'daily':
					uri = 'api/Controllers/Customers_RestController.php?view=get_all_appointments';
					$("#apptime").text('today');
					break;
				case 'weekly':
					uri = 'api/Controllers/Customers_RestController.php?view=get_weekly_appointments';
					$("#apptime").text('this week');
					break;
				case 'monthly':
					uri = 'api/Controllers/Customers_RestController.php?view=get_monthly_appointments';
					$("#apptime").text('this month');
					break;
				default:
					uri = 'api/Controllers/Customers_RestController.php?view=get_all_appointments';
					$("#apptime").text('today');
					break;
			}
			
			$.get(uri, function(data) {
				data = $.parseJSON(data);
					
				var t = $("#tbl_waiting");
				$("#tbl_waiting tbody").empty();
				
				//console.log(getWeekNumber('2017-11-24'));
				
				if(data.status != 0) {						
					var count = 1;
					$.each(data, function(i, item) {
						row = $('<tr></tr>');
						rowData = $('<td></td>').text(count);
						row.append(rowData);
						
						rowData = $('<td></td>').text(item.date);
						row.append(rowData);
						
						rowData = $('<td></td>').text(item.dep_id > 0? item.dep : item.fname);
						row.append(rowData);
						rowData = $('<td></td>').html('<div class="badge" '+(item.status == 'New'? ' style="background-color: green"': item.status == 'Closed'? ' style="background-color: #337ab7"': '')+'>' + item.status + "</div>");
						row.append(rowData);
							
						viewButton = $('<a></a>').addClass("btn btn-primary btn-xs details doctor-only").text("View Details");
						//viewButton.attr('href', '#');
						viewButton.attr('data-toggle', 'tooltip');
						viewButton.attr('title', 'View Details');
						viewButton.attr("href", "dr_view.php?id="+item.cid+"&a="+item.id);
						if(item.status != 'Closed')
							rowData = $('<td></td>').append(viewButton);
						else
							rowData = $('<td></td>');
							
						row.append(rowData);
							
						t.append(row);
						count++;
					});
				}
				else {
					$("#tbl_waiting tbody").html(data.msg);
				}
				
				$.get('api/Controllers/Users_RestController.php?view=loggedin', function(data) {
					data = $.parseJSON(data);
					//console.log(data);
					if(data.role == 'Doctor' || data.role == 'Admin'){
						$(".doctor-only").removeClass("hidden");
					}
					else {
						$(".doctor-only").addClass("hidden");
						$("#nav_treatory").addClass("disabled");
					}
				});	
			});			
		}
		
		function getWeekNumber(aDate){
			var dt = new Date(aDate);
			var thisDay = dt.getDate();
			
			var newDate = dt;
			newDate.setDate(1);
			var digit = newDate.getDay();
			
			var Q = (thisDay + digit) / 7;
			var R = (thisDay + digit) % 7;
			
			if(R !== 0)
				return Math.ceil(Q);
			else
				return Q;
		}
		
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
