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
					<h3 class="panel-title">Notifications</h3>
				 </div>
				<div class="panel-body">
					Coming soon...
				</div>
			</div>
		</div>
		
		<div class="col-sm-6">
			<div id="waiting-list" class="doctor-only">
				<div class="alert alert-info hidden alert-dismissible" role="alert" id="examine_alert">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<i class="fa fa-info-circle"></i> 
					<span id="examine_msg"></span>
				</div>
				<div class="panel panel-default panel-primary" style="height:">
					<div class="panel-heading  ">
						<h3 class="panel-title">Appointments for Today</h3>
					 </div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table table-hover" id="tbl_waiting" >
								<thead class="thead-inverse">	
									<th class="col-xs-1" >S/n</th>						
									<th class="col-xs-2" >Card No.</th>						
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
			
			<div id="quick_actions" class="frontdesk-only">
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
			</div>
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
		});	
		
		function search () {
			$.get('api/Controllers/Customers_RestController.php?view=get_all_appointments', function(data) {
				data = $.parseJSON(data);
					
				var t = $("#tbl_waiting");
				$("#tbl_waiting tbody").empty();
					
				if(data.status != 0) {		
					var count = 1;
					$.each(data, function(i, item) {
						row = $('<tr></tr>');
						rowData = $('<td></td>').text(count);
						row.append(rowData);
						rowData = $('<td></td>').text(item.cardno);
						row.append(rowData);
						rowData = $('<td></td>').text(item.fname);
						row.append(rowData);
						rowData = $('<td></td>').html('<div class="badge" '+(item.status == 'New'? ' style="background-color: green"': item.status == 'Closed'? ' style="background-color: #337ab7"': '')+'>' + item.status + "</div>");
						row.append(rowData);
							
						viewButton = $('<a></a>').addClass("btn btn-primary btn-xs details").text("View Details");
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
			});
		}
		
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
