	<?php
		include "includes/header_pages.php";
	?>
	
	<div class="row" >
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-users"></i> Existing Customers
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
			<a href="newcust.php" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Add New Customer</a>
		</div>
		<div class="col-xs-12 hidden" id="loading_cus">
			<div class="alert alert-info" role="alert">
				<i class="fa fa-search" id="search_icon"></i> <span id="loading_cus_txt">Showing top 10 results</span>
			</div>
		</div>
		<div class="col-xs-12">
			<div id="summary-list">
				<div class="table-responsive">
					<table class="table table-hover" id="tbl_customers" >
						<thead class="thead-inverse">	
							<th class="col-xs-2" >Card No.</th>						
							<th class="col-xs-2">Surname</th>
							<th class="col-xs-2">First Name</th>
							<th class="col-xs-2">Phone No.</th>	
							<th class="col-xs-1">Relationship</th>
							<th class="col-xs-2">Email</th>			
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
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDetails" aria-expanded="true" aria-controls="collapseOne">Personal Data</a>
									</h4>
								</div>
								<div id="collapseDetails" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="details_header">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table">
												<tr>
													<td class="col-sm-2"><label><strong>Card No.</strong></label></td>
													<td class="col-sm-4" id="cardno">_____________</td>		
													<td class="col-sm-2"><label><strong>Enrolee ID</strong></label></td>
													<td class="col-sm-4" id="enroleeno">_____________</td>	
												</tr>
												<tr>
													<td class="col-sm-2"><label><strong>Full Name</strong></label></td>
													<td class="col-sm-4" id="fullname">_____________</td>		
													<td class="col-sm-2"><label><strong>Gender</strong></label></td>
													<td class="col-sm-4" id="gender">_____________</td>	
												</tr>
												<tr>
													<td><label><strong>Date of Birth</strong></label></td>
													<td id="dob">_____________</td>		
													<td><label><strong>Age</strong></label></td>
													<td id="age">_____________</td>	
												</tr>
												<tr>
													<td><label><strong>Address</strong></label></td>
													<td colspan="3" id="fulladdress">_____________</td>
												</tr>
												<tr>
													<td><label><strong>Occupation</strong></label></td>
													<td id="occupation">_____________</td>		
													<td><label><strong>Next of Kin</strong></label></td>
													<td id="nok">_____________</td>	
												</tr>
												<tr>
													<td><label><strong>Mobile</strong></label></td>
													<td id="mobile">_____________</td>		
													<td><label><strong>Email</strong></label></td>
													<td id="email">_____________</td>	
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!--Biiling-->
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="billiing_header">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseBilling" aria-expanded="true" aria-controls="collapseBilling">Billing</a>
									</h4>
								</div>
								<div id="collapseBilling" class="panel-collapse collapse" role="tabpanel" aria-labelledby="billing_header">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-2"><label><strong>Relationship</strong></label></div>
											<div class="col-xs-4" id="rship_type">_____________</div>		
											<div class="col-xs-2"><label><strong>Account</strong></label></div>
											<div class="col-xs-3" id="rship_account">_____________</div>	
										</div>
									</div>
								</div>
							</div>
							<!-- New Case Notes-->
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="ncase_header">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNewCase" aria-expanded="true" aria-controls="collapseOne">Treatment History</a>
									</h4>
								</div>
								<div id="collapseNewCase" class="panel-collapse collapse" role="tabpanel" aria-labelledby="case_header">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-hover" id="tbl_history" >
												<thead class="thead-inverse">	
													<th class="col-xs-1" >S/n</th>						
													<th class="col-xs-2">Date</th>
													<th class="col-xs-2">Diagnosis</th>
													<th class="col-xs-2">Prescription</th>	
													<th class="col-xs-5">Note</th>		
												</thead>
												
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!--Old Case Notes-->
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="case_header">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseCase" aria-expanded="true" aria-controls="collapseOne">Migrated Case History</a>
									</h4>
								</div>
								<div id="collapseCase" class="panel-collapse collapse" role="tabpanel" aria-labelledby="case_header">
									<div class="panel-body">
										<div id="chistory_note">
										
										</div>
									</div>
								</div>
							</div>
							<!--Next of Kin-->
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="nok_header">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNOK" aria-expanded="true" aria-controls="collapseNOK">Next of Kin</a>
									</h4>
								</div>
								<div id="collapseNOK" class="panel-collapse collapse" role="tabpanel" aria-labelledby="nok_header">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table">
												<tr>
													<td><label><strong>Name</strong></label></td>
													<td id="nok_fname">_____________</td>		
													<td><label><strong>Relationship</strong></label></td>
													<td id="nok_relationship">_____________</td>	
												</tr>
												<tr>
													<td><label><strong>Phone</strong></label></td>
													<td id="nok_phone">_____________</td>		
													<td><label><strong>Email</strong></label></td>
													<td id="nok_email">_____________</td>	
												</tr>
											</table>
										</div>
									</div>
								</div>
							</div>
							<!--Dependents-->
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="dep_header">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseDEP" aria-expanded="true" aria-controls="collapseDEP">Dependents</a>
									</h4>
								</div>
								<div id="collapseDEP" class="panel-collapse collapse" role="tabpanel" aria-labelledby="dep_header">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-hover" id="tbl_dependents" >
												<thead class="thead-inverse">	
													<th class="col-xs-1" >S/n</th>						
													<th class="col-xs-3">Name</th>
													<th class="col-xs-2">Relationship</th>
													<th class="col-xs-2">Phone</th>	
													<th class="col-xs-2">Email</th>		
													<th class="col-xs-2"></th>		
												</thead>
												
												<tbody>
													
												</tbody>
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
						<a style="color:white; background-color:cornflowerblue; text-align: left;" class="btn btn-block" id="btn_book_app" href="#"><i class="fa fa-calendar-plus-o"></i> Book Appointment</a> 
						<a style="text-align: left;" class="btn btn-block btn-success" id="btn_add_dep" href="#"><i class="fa fa-plus"></i>  &nbsp;Add Dependent</a> 
					</div>
				</div>
			</div>
			<div class="hidden" id="book_appointment">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">Book an Appointment</h4>
					</div>
					<div class="panel-body">
						<form action="#" class="form-horizontal" id="frm_book_appoitment">
							<div class="alert alert-info hidden" role="alert" id="book_appt_alert">
								<i class="fa fa-info-circle"></i> 
								<span id="book_appt_msg"></span>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="cname">Full Name</label>
								<div class=" col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-circle"></i>
										</div>
										<input type="text" placeholder="" name="cname" id="cname" class="form-control" disabled>
										<input type="hidden" placeholder="" name="c_ba_id" id="c_ba_id" class="form-control">
									</div>
								</div>
								<label class="col-sm-2 control-label" for="ccard">Card No.</label>
								<div class="col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-address-card-o"></i>
										</div>
										<input type="text" placeholder="" name="ccard" id="ccard" class="form-control" disabled>
									</div>
								</div>
							</div>	
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="cdate">Date</label>
								<div class=" col-sm-4">
									<div class="input-group">
										<input type="date" placeholder="" name="cdate" id="cdate" class="form-control" value="2017-10-16">
										<div class="input-group-addon">
											<i class="fa fa-calendar"></i>
										</div>
									</div>
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-2 control-label" for="cname">Notes</label>
								<div class=" col-sm-10">
									<textarea type="text" placeholder="" name="cnotes" id="cnotes" class="form-control"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="submit"></label>
								<div class=" col-sm-4">
									<button type="submit" class="btn btn-primary" id="btn_bk_appt"><i class="fa fa-calendar-plus-o" id="book_icon"></i> Book Appointment</button> 
									<button type="button" class="btn btn-default" id="btn_back2view"><i class="fa fa-reply"></i> Go Back</button> 
								</div>
							</div>
						</form>
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
			
			$.get('api/Controllers/Customers_RestController.php?view=search&q='+term, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
					
				var t = $("#tbl_customers");
				$("#tbl_customers tbody").empty();
					
				if(data.status != 0) {
					$("#loading_cus_txt").html("Showing top " + data.length + " results!");
					$("#search_icon").removeClass("fa-check");
					$("#search_icon").addClass("fa-search");
					
					$.each(data, function(i, item) {
						row = $('<tr></tr>');
						rowData = $('<td></td>').text(item.cardno);
						row.append(rowData);
						rowData = $('<td></td>').text(item.lname);
						row.append(rowData);
						rowData = $('<td></td>').text(item.fname);
						row.append(rowData);
						rowData = $('<td></td>').text(item.phone1);
						row.append(rowData);
						rowData = $('<td></td>').text(item.rship_type);
						row.append(rowData);
						rowData = $('<td></td>').text(item.email1);
						row.append(rowData);
							
						viewButton = $('<button></button>').addClass("btn btn-primary btn-xs details").text("View Details");
						viewButton.attr('href', '#');
						viewButton.attr('data-toggle', 'tooltip');
						viewButton.attr('title', 'View Details');
						viewButton.attr('onclick', 'view_details('+item.cid+')');
						rowData = $('<td></td>').append(viewButton);
							
						row.append(rowData);
							
						t.append(row);
					});
				}
				else {
					$("#loading_cus_txt").html(data.msg);
				}
					
				$("#summary-list").removeClass("hidden");
				$("#loading_cus").removeClass("hidden");
				$("#details").addClass("hidden");
				$("#book_appointment").addClass("hidden");
			});
		}
		
		function view_details(id) {
			//alert("button " +id+" was clicked");
			$("#summary-list").addClass("hidden");
			$("#details").removeClass("hidden");
			$("#loading_cus").addClass("hidden");
			$("#book_appointment").addClass("hidden");
			
			$.get('api/Controllers/Customers_RestController.php?view=single&id='+id, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				
				$.each(data, function(i, item) {
					$("#cardno").html(item.cardno);
					$("#enroleeno").html(item.enroleeid);
					$("#fullname").html(item.title + " " + item.fname + ' ' + item.lname);
					$("#gender").html(item.gender);
					$("#fulladdress").html(item.address + ", " + item.address_area + " " + item.address_state);
					$("#dob").html(item.dob);
					$("#age").html(item.age);
					$("#occupation").html(item.occupation);
					$("#nok").html(item.nok);
					$("#mobile").html(item.phone1 + ", " + item.phone2);
					$("#email").html(item.email1 + ",  " + item.email2);
					$("#rship_type").html(item.rship_type);
					$("#rship_account").html(item.rship_account);
					$("#chistory_note").html(item.casenote);
					$("#btn_udpated").attr("href", "newcust.php?id="+item.cid);
					$("#btn_book_app").attr("onclick", "book_c_appt("+item.cid+")");
				});
			});
		}
		
		function view_summary() {
			$("#summary-list").removeClass("hidden");
			$("#details").addClass("hidden");
			$("#book_appointment").addClass("hidden");
			search();
		}
		
		function book_c_appt(id) {
			$("#frm_book_appoitment").trigger("reset");
			$.get('api/Controllers/Customers_RestController.php?view=single&id='+id, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				
				$.each(data, function(i, item) {
					$("#c_ba_id").val(id);
					$("#ccard").val(item.cardno);
					$("#cname").val(item.title + " " + item.fname + ' ' + item.lname);
					$('#cdate').val(new Date().toISOString().split('T')[0]);
					$("#btn_back2view").attr("onclick", "view_details("+id+")");
				});
				
			});
			
			$("#summary-list").addClass("hidden");
			$("#details").addClass("hidden");
			$("#book_appointment").removeClass("hidden");
		}
		
		$("#frm_book_appoitment").submit(function(e) { 
			$("#book_icon").removeClass("fa-calendar-plus-o");
			$("#book_icon").addClass("fa-spinner fa-pulse");
				
			e.preventDefault();
			
			$.ajax({
				url: 'api/Controllers/Customers_RestController.php?view=book_appointment',
				type: 'post',
				data : {
					'ccard' : $("#ccard").val(),
					'cdate' : $("#cdate").val(),
					'cnotes': $("#cnotes").val()
				},
				success: function(data) {
				   //alert (data);
				   data = $.parseJSON(data);
				   if(data.status == 1){
						$("#book_icon").removeClass("fa-spinner fa-pulse");
						$("#book_icon").addClass("fa-calendar-plus-o");
						view_details($("#c_ba_id").val());
						$("#loading_cus_txt").html(data.msg);
						$("#search_icon").removeClass("fa-search");
						$("#search_icon").addClass("fa-check");
						$("#loading_cus").removeClass("hidden");
				   }
				   else {
						$("#book_icon").removeClass("fa-spinner fa-pulse");
						$("#book_icon").addClass("fa-save");
						$("#book_appt_alert").removeClass("alert-info");
						$("#book_appt_alert").removeClass("alert-warning");
						$("#book_appt_alert").addClass("alert-danger");
						$("#book_appt_msg").html(data.msg);
						$("#book_appt_alert").removeClass("hidden");
				   }
				}
			});
		});
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
