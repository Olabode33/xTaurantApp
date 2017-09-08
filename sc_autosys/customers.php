	<?php
		include "includes/header_pages.php";
	?>
	
	<div>
		<ul class="nav nav-pills" style="margin-top:1%">
			<li role="presentation"><a href="newcust.php">New</a></li>
			<li role="presentation" class="active"><a href="customers.php">Existing</a></li>
		<ul>
	</div>
	<hr  style="margin-top: 10px; margin-bottom: 10px;">

	<div class="row" style="margin-top: 20px">
		<div class="col-xs-12 col-sm-6" style="margin-bottom: 20px">
			<div class="input-group">
				<div class="input-group-addon"><i class="fa fa-search"></i></div>
				<input type="text" id="txt_search" name="txt_search" class="form-control input-lg" placeholder="Enter your search terms">
			</div>
		</div>
		<div class="col-xs-12 hidden" id="loading_cus">
			<div class="alert alert-info" role="alert">
				<i class="fa fa-search"></i> <span id="loading_cus_txt">Showing top 10 results</span>
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
						<a style="color:white; background-color:cornflowerblue; text-align: left;" class="btn btn-block disabled" id="btn_book_app" href="#"><i class="fa fa-calendar-plus-o"></i> Book Appointment</a> 
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
			
			$("#txt_search").keyup(function () {
				search();
			});
		});
		
		function search () {
			var term = $("#txt_search").val();
			
			$.get('api/Customers_RestController.php?view=search&q='+term, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
					
				var t = $("#tbl_customers");
				$("#tbl_customers tbody").empty();
					
				if(data.status != 0) {
					$("#loading_cus_txt").html("Showing top " + data.length + " results!");
					
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
			});
		}
		
		function view_details(id) {
			//alert("button " +id+" was clicked");
			$("#summary-list").addClass("hidden");
			$("#details").removeClass("hidden");
			$("#loading_cus").addClass("hidden");
			
			$.get('api/Customers_RestController.php?view=single&id='+id, function(data) {
				data = $.parseJSON(data);
				console.log(data);
				
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
					$("#btn_udpated").attr("href", "newcust.php?id="+item.cid);
					//$("#btn_book_app").attr("href", "newcust.php?id="+item.cid);
				});
			});
		}
		
		function view_summary() {
			$("#summary-list").removeClass("hidden");
			$("#details").addClass("hidden");
		}
		
		function update_record() {
			
		}
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
