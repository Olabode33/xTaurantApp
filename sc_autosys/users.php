	<?php
		include "includes/header_pages.php";
	?>
	
	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-user-circle"></i> User Management
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12 hidden" id="result_msg">
			<div class="alert alert-success alert-dismissable" role="alert">
				<!--a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a-->
				<i class="fa fa-check"></i> <span id="result_msg_txt">Showing top 10 results</span>
			</div>
		</div>
		<div class="col-xs-12 col-sm-6 hidden" style="margin-bottom: 20px">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-search"></i></div>
				<input type="text" id="txt_search" name="txt_search" class="form-control input-lg" placeholder="Enter your search terms">
			</div>
		</div>
		<div class="col-xs-12" style="margin-bottom: 20px">
			<a href="newuser.php" class="btn btn-primary pull-right"><i class="fa fa-user-plus"></i> Add New User</a>
		</div>
		<div class="col-xs-12">
			<div id="summary-list">
				<div class="table-responsive">
					<table class="table table-hover" id="tbl_users" >
						<thead class="thead-inverse">	
							<th class="col-xs-2" >Role</th>						
							<th class="col-xs-2">Surname</th>
							<th class="col-xs-2">First Name</th>
							<th class="col-xs-2">Username</th>	
							<th class="col-xs-2">Branch</th>
							<th class="col-xs-2">Actions</th>				
						</thead>
						
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="hidden" id="details">
				<div class="row" style="margin-bottom: 10px;">
					<div class="col-sm-10">
						<div class="table-responsive">
							<table class="table table-striped">
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
								<tr>
									<td><label><strong>Relationship</strong></label></td>
									<td id="rship_type">_____________</td>		
									<td><label><strong>Account</strong></label></td>
									<td id="rship_account">_____________</td>	
								</tr>
							</table>
						</div>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default btn-block" onclick="view_summary()" style="text-align: left;"><i class="fa fa-reply"></i> Back To Summary</button>
						<a style="color:white; text-align: left;" class="btn btn-block sctheme btn-block" id="btn_udpated" href="#"><i class="fa fa-pencil-square-o"></i> Update</a> 
						<a style="color:white; background-color:cornflowerblue; text-align: left;" class="btn btn-block" id="btn_book_app" href="#"><i class="fa fa-calendar-plus-o"></i> Book Appointment</a> 
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready( function() {
			//$('#loading_cus').removeClass("hidden");
			$("#summary-list").addClass("hidden");
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
			
			$.get('api/Controllers/Users_RestController.php?view=all', function(data) {
				data = $.parseJSON(data);
				//console.log(data);
					
				var t = $("#tbl_users");
				$("#tbl_users tbody").empty();
					
				if(data.status != 0) {
					$("#loading_txt").html("Showing all users!");
					
					$.each(data, function(i, item) {
						row = $('<tr></tr>');
						rowData = $('<td></td>').text(item.role);
						row.append(rowData);
						rowData = $('<td></td>').text(item.lname);
						row.append(rowData);
						rowData = $('<td></td>').text(item.fname);
						row.append(rowData);
						rowData = $('<td></td>').html(
													item.uname
													+
													(item.status == 'Locked' ? ' <div class="badge"  style="background-color: #d9534f;"><i class="fa fa-lock"></i></div>' : '')
													+
													(item.status == 'New' ? ' <div class="badge"  style="background-color: green;"><i class="fa fa-asterisk"></i></div>' : '')
												);
						row.append(rowData);
						rowData = $('<td></td>').text(item.branch);
						row.append(rowData);
							
							
						viewButton = $('<a></a>').addClass("btn btn-warning btn-xs details").html('<i class="fa fa-pencil-square-o"></i>');
						viewButton.attr('href', 'newuser.php?id='+item.userid);
						viewButton.attr('data-toggle', 'tooltip');
						viewButton.attr('title', 'View Details');
						//viewButton.attr('', 'view_details('+item.cid+')');
						rowData = $('<td></td>').append(viewButton);
						
						resetButton = $('<button></button>').addClass("btn btn-primary btn-xs details").html('<i class="fa fa-key"></i>');
						//deactivateButton.attr('href', 'newuser.php?id='+item.userid);
						resetButton.attr('data-toggle', 'tooltip');
						resetButton.attr('title', 'Reset User\'s Password');
						resetButton.attr('onclick', 'reset_pass('+item.userid+')');
						rowData.append(' ');
						rowData.append(resetButton);
						
						deactivateButton = $('<button></button>').addClass("btn " + (item.status == 'Locked' ? "btn-success" : "btn-danger") +"  btn-xs details").html(item.status == 'Locked' ? '<i class="fa fa-unlock-alt"></i></div>' : '<i class="fa fa-lock"></i></div>');
						//deactivateButton.attr('href', 'newuser.php?id='+item.userid);
						deactivateButton.attr('data-toggle', 'tooltip');
						deactivateButton.attr('title', (item.status == 'Locked' ? "Re-activate" : "Deactivate") + ' User');
						deactivateButton.attr('onclick', 'deactivate_user('+item.userid + ', "'+(item.status == 'Locked' ? "unlock" : "lock")+'")');
						rowData.append(' ');
						rowData.append(deactivateButton);
							
						row.append(rowData);
							
						t.append(row);
					});
				}
				else {
					$("#loading_cus_txt").html(data.msg);
				}
					
				$("#summary-list").removeClass("hidden");
				$("#loading_cus").removeClass("hidden");
	
			});
		}
				
		function view_summary() {
			$("#summary-list").removeClass("hidden");
			$("#details").addClass("hidden");
		}
		
		function update_record() {
			
		}
		
		function reset_pass(userid) {
			$.get('api/Controllers/Users_RestController.php?view=resetpass&id='+userid, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				if(data.status != 0){
					$("#result_msg_txt").text(data.msg)
					$("#result_msg").removeClass("hidden");
					search();
				}
			});
		}
		
		function deactivate_user(userid, lock) {
			var uri = 'api/Controllers/Users_RestController.php?view=deactivate&id='+userid;
			
			if(lock == 'unlock')
				uri = 'api/Controllers/Users_RestController.php?view=reactivate&id='+userid;
			else
				uri = 'api/Controllers/Users_RestController.php?view=deactivate&id='+userid;
			
			$.get(uri, function(data) {
				console.log(data)
				data = $.parseJSON(data);
				if(data.status != 0){
					$("#result_msg_txt").text(data.msg)
					$("#result_msg").removeClass("hidden");
					search();
				}
			});
			
			
		}
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
