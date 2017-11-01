	<?php
		include "includes/header_pages.php";
	?>
	
	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-cubes"></i> Existing Partners
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12 hidden" id="result_msg">
			<div class="alert alert-success alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<i class="fa fa-check"></i> <span id="result_msg_txt">Showing top 10 results</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6" style="margin-bottom: 20px">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-search"></i></div>
				<input type="text" id="txt_search" name="txt_search" class="form-control" placeholder="Enter your search terms">
			</div>
		</div>
		<div class="col-xs-12 col-sm-6" style="margin-bottom: 20px">
			<a href="newpartner.php" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Add New Partner</a>
		</div>
		<div class="col-xs-12 hidden" id="loading_partners">
			<div class="alert alert-info" role="alert">
				<i class="fa fa-search" id="search_icon"></i> <span id="loading_partners_txt">Showing top 10 results</span>
			</div>
		</div>
		<div class="col-xs-12">
			<div id="summary-list">
				<div class="table-responsive">
					<table class="table table-hover" id="tbl_partners" >
						<thead class="thead-inverse">	
							<th class="col-xs-2" >Short Name</th>						
							<th class="col-xs-4">Full Name</th>
							<th class="col-xs-1">Type</th>
							<th class="col-xs-2">Area</th>	
							<th class="col-xs-1">Email</th>
							<th class="col-xs-1">Phone</th>			
							<th class="col-xs-1">Actions</th>			
						</thead>
						
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="hidden" id="details">
				<div class="row">
					<div class="col-sm-10">
						<div class="panel-group" id="accordion" role="tablist" aria-multiselected="true">
							<!--Personal Data-->
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="details_header">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDetails" aria-expanded="true" aria-controls="collapseOne">Partner Details</a>
									</h4>
								</div>
								<div id="collapseDetails" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="details_header">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table">
												<tr>
													<td class="col-sm-2"><label><strong>Short Name</strong></label></td>
													<td class="col-sm-4" id="p_sname">_____________</td>
													<td class="col-sm-2"><label><strong>Type</strong></label></td>
													<td class="col-sm-4" id="p_type">_____________</td>
												</tr>
												<tr>
													<td class="col-sm-2"><label><strong>Full Name</strong></label></td>
													<td class="col-sm-10" colspan="3" id="p_fname">_____________</td>	
												</tr>
												<tr>
													<td><label><strong>Address</strong></label></td>
													<td colspan="3" id="p_address">_____________</td>
												</tr>
												<!--tr>
													<td><label><strong>Area</strong></label></td>
													<td id="p_area">_____________</td>		
													<td><label><strong>State</strong></label></td>
													<td id="p_state">_____________</td>	
												</tr-->
												<tr>
													<td><label><strong>Mobile</strong></label></td>
													<td id="p_mobile">_____________</td>		
													<td><label><strong>Email</strong></label></td>
													<td id="p_email">_____________</td>	
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!--end panel group-->	
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default btn-block" onclick="view_summary()" style="text-align: left;"><i class="fa fa-reply"></i> Back To Summary</button>
						<a style="color:white; text-align: left;" class="btn btn-block sctheme btn-block" id="btn_udpated" href="#"><i class="fa fa-pencil-square-o"></i> Update</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready( function() {
			search();
			var id = location.search;	
			id = id.split("=");
			id = id[1];
			if(id != undefined){
				$("#result_msg_txt").html(decodeURIComponent(id));
				$("#result_msg").removeClass("hidden");
			}
			
			
			$("#txt_search").keyup(function () {
				search();
			});
		});
		
		function search () {
			var term = $("#txt_search").val();
			
			$.get('api/Controllers/Partners_RestController.php?view=search&id='+term, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
					
				var t = $("#tbl_partners");
				$("#tbl_partners tbody").empty();
					
				if(data.status != 0) {
					$("#loading_partners_txt").html("Showing top " + data.length + " results!");
					$("#search_icon").removeClass("fa-check");
					$("#search_icon").addClass("fa-search");
					
					$.each(data, function(i, item) {
						row = $('<tr></tr>');
						rowData = $('<td></td>').text(item.p_sname);
						row.append(rowData);
						rowData = $('<td></td>').text(item.p_name);
						row.append(rowData);
						rowData = $('<td></td>').text(item.p_type);
						row.append(rowData);
						rowData = $('<td></td>').text(item.p_area);
						row.append(rowData);
						rowData = $('<td></td>').text(item.p_email);
						row.append(rowData);
						rowData = $('<td></td>').text(item.p_phone);
						row.append(rowData);
							
						viewButton = $('<button></button>').addClass("btn btn-primary btn-xs details").text("View Details");
						viewButton.attr('href', '#');
						viewButton.attr('data-toggle', 'tooltip');
						viewButton.attr('title', 'View Details');
						viewButton.attr('onclick', 'view_details('+item.p_id+')');
						rowData = $('<td></td>').append(viewButton);
							
						row.append(rowData);
							
						t.append(row);
					});
				}
				else {
					$("#loading_partners_txt").html(data.msg);
				}
					
				$("#summary-list").removeClass("hidden");
				$("#loading_partners").removeClass("hidden");
				$("#details").addClass("hidden");
				$("#book_appointment").addClass("hidden");
			});
		}
		
		function view_details(id) {
			//alert("button " +id+" was clicked");
			$("#summary-list").addClass("hidden");
			$("#details").removeClass("hidden");
			$("#loading_partners").addClass("hidden");
			
			$.get('api/Controllers/Partners_RestController.php?view=single&id='+id, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				
				$.each(data, function(i, item) {
					$("#p_sname").html(item.p_sname);
					$("#p_fname").html(item.p_name);
					$("#p_type").html(item.p_type);
					$("#p_address").html(item.p_addr + ", " + item.p_area + ", " + item.p_state);
					$("#p_mobile").html(item.p_phone);
					$("#p_email").html(item.p_email);
					$("#btn_udpated").attr("href", "newpartner.php?id="+item.p_id);
				});
			});
		}
		
		function view_summary() {
			$("#summary-list").removeClass("hidden");
			$("#details").addClass("hidden");
			$("#book_appointment").addClass("hidden");
			search();
		}
		
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
