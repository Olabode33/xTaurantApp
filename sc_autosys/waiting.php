	<?php
		include "includes/header_pages.php";
	?>
	

	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-user-md"></i> View Appointments
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12">
			<div id="waiting-list">
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
									<th class="col-xs-3">Full Name</th>
									<th class="col-xs-2">Date</th>
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
			
			<div id="waiting-details">
				<!--Appointment Details-->
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">Appointment Details</h4>
					</div>
					<div class="panel-body">
						<div class="table-responsive">
							<table class="table">
								<tr>
									<td class="col-sm-2"><label><strong>Full Name</strong></label></td>
									<td class="col-sm-4" id="vw_cname"></td>		
									<td class="col-sm-2"><label><strong>Card No.</strong></label></td>
									<td class="col-sm-4" id="vw_cardno"></td>	
								</tr>
								<tr>
									<td class="col-sm-2"><label><strong>Date</strong></label></td>
									<td class="col-sm-4" id="vw_date" colspan="3"></td>	
								</tr>
								<tr>
									<td><label><strong>Notes</strong></label></td>
									<td id="vw_notes" colspan="3"></td>		
								</tr>
								<tr>
									<td colspan="4">
										<a class="btn btn-primary" id="btn_vw_appt" href="#"><i class="fa fa-calendar-check-o"></i> Open Appointment</a>
										<button class="btn btn-default" id="btn_vw_sum" onclick="back2list();"><i class="fa fa-reply"></i> Go Back</button>
									</td>		
								</tr>
							</table>
						</div>
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
						rowData = $('<td></td>').text(item.dep_id > 0 ? item.dep : item.fname);
						row.append(rowData);
						rowData = $('<td></td>').text(item.date);
						row.append(rowData);
						rowData = $('<td></td>').html('<div class="badge" '+(item.status == 'New'? ' style="background-color: green"': item.status == 'Closed'? ' style="background-color: #337ab7"': '')+'>' + item.status + "</div>");
						row.append(rowData);
							
						viewButton = $('<button></button>').addClass("btn btn-primary btn-xs details").text("View Details");
						viewButton.attr('href', '#');
						viewButton.attr('data-toggle', 'tooltip');
						viewButton.attr('title', 'View Details');
						viewButton.attr('onclick', 'view_details('+item.id+', '+item.dep_id+')');
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
		
		function view_details(id, dep_id) {
			//alert("button " +id+" was clicked");
			$("#waiting-list").addClass("hidden");
			$("#waiting-details").removeClass("hidden");
			
			$.get('api/Controllers/Customers_RestController.php?view=get_appointment&id='+id, function(data) {
				data = $.parseJSON(data);
				
				$.get('api/Controllers/Customers_RestController.php?view=open_appointment&id='+id, function(data) {
					data = $.parseJSON(data);
				});
				
				var monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
				
				$.each(data, function(i, item) {
					appt_date = item.date.split("-");
					
					$("#vw_cardno").html(item.cardno);
					$("#vw_cname").html(item.dep_id > 0? item.dep : item.fname);
					$("#vw_date").html(appt_date[2] + "-" + monthNames[appt_date[1] - 1] + "-" + appt_date[0]);
					$("#vw_notes").html(item.notes);
					$("#btn_vw_appt").attr("href", "dr_view.php?id="+item.cid+"&a="+id+"&dep="+dep_id);
				});
			});
		}
		
		function back2list() {
			$("#waiting-list").removeClass("hidden");
			$("#waiting-details").addClass("hidden");
		}
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
