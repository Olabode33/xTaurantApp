	<?php
		include "includes/header_pages.php";
	?>
		
	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-user-plus"></i> <span id="form_title_text">Add New</span> Customer
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12 " id="insert_cus">
			<div class="alert alert-info alert-dismissible hidden" role="alert" id="insert_alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				<i class="fa fa-info-circle"></i> 
				<span id="insert_msg"></span>
			</div>
		</div>
		<form action="#" class="form-horizontal" id="newcus_form">	
			<div class="col-md-10">
				<!--Bio Data-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							Bio Data
						</h4>
					</div>
					<div class="panel-collapse" role="tabpanel" aria-labelledby="case_header">
						<div class="panel-body">
							<div class="form-group">
								<label for="cardno" class="col-sm-2 control-label"><span class="text-danger">*</span>Card No.</label>
								<div class="col-sm-4">
									<input type="text" id="cardno" name="cardno" class="form-control" placeholder="xxxx/xxx/yyyy">
								</div>
											
								<label for="enroleeno" class="col-sm-2 control-label">Enrolee ID</label>
								<div class="col-sm-4">
									<input type="text" id="enroleeno" name="enroleeno" class="form-control" placeholder="xxxxxxx">
								</div>
							</div>
							
							<div class="form-group">
								<label for="cardno" class="col-sm-2 control-label">Title</label>
								<div class="col-sm-4">
									<input type="text" id="title" name="title" class="form-control" placeholder="Enter Title">
								</div>
							</div>
							
							<div class="form-group">
								<label for="sname" class="col-sm-2 control-label"> <span class="text-danger">*</span>Surname</label>
								<div class="col-sm-4">
									<input type="text" id="sname" name="sname" class="form-control" placeholder="Enter surname..." required>
								</div>
											
								<label for="fname" class="col-sm-2 control-label">Firstname</label>
								<div class="col-sm-4">
									<input type="text" id="fname" name="fname" class="form-control" placeholder="Enter firstname...">
								</div>	
							</div>
							
							<div class="form-group">	
								<label for="mname" class="col-sm-2 control-label">Middlename</label>
								<div class="col-sm-4">
									<input type="text" id="mname" name="mname" class="form-control" placeholder="Enter middlename...">
								</div>
											
								<label for="gender" class="col-sm-2 control-label">Gender</label>
								<div class="col-sm-4">
									<label class="radio-inline">
										<input type="radio" name="gender" id="gender" value="Male"> Male
									</label>
									<label class="radio-inline">
										<input type="radio" name="gender" id="gender2" value="Female"> Female
									</label>
								</div>
							</div>
							
							<div class="form-group">	
								<label for="dob" class="col-sm-2 control-label">Date of Birth</label>
								<div class="col-sm-2">
									<input type="number" id="dob_day" name="dob_day" class="form-control" placeholder="DD" min="0" max="31">
								</div>
								<div class="col-sm-2">
									<select class="form-control" id="dob_month" name="dob_month">
										<option value="">- Month -</option>
										<option value="Jan">Jan</option>
										<option value="Feb">Feb</option>
										<option value="Mar">Mar</option>
										<option value="Apr">Apr</option>
										<option value="May">May</option>
										<option value="Jun">Jun</option>
										<option value="Jul">Jul</option>
										<option value="Aug">Aug</option>
										<option value="Sep">Sep</option>
										<option value="Oct">Oct</option>
										<option value="Nov">Nov</option>
										<option value="Dec">Dec</option>
									</select>
								</div>

								<label for="age" class="col-sm-2 control-label">Age</label>
								<div class="col-sm-4">
									<input type="number" id="age" name="age" class="form-control" placeholder="yrs...">
								</div>
							</div>
					
							<div class="form-group">	
								<label for="occupation" class="col-sm-2 control-label">Occupation</label>
								<div class="col-sm-4">
									<input type="text" id="occupation" name="occupation" class="form-control" placeholder="occupation...">
								</div>
							</div>
								
						</div>
					</div>
				</div>
				<!--End Bio Data-->
				
				<!--Billing-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							Billing Information
						</h4>
					</div>
					<div class="panel-collapse" role="tabpanel" aria-labelledby="case_header">
						<div class="panel-body">
							<div class="form-group">	
								<label for="rship_type" class="col-sm-2 control-label">Relationship</label>
								<div class="col-sm-4">
									<select class="form-control" Required id="rship_type" name="rship_type">
										<option value="">-- Select --</option>
										<option value="HMO">HMO</option>
										<option value="Organisation">Organisation</option>
										<option value="Private">Private</option>
									</select>
								</div>

								<label for="rship_acc" class="col-sm-2 control-label"><span class="text-danger">*</span>Account</label>
								<div class="col-sm-4">
									<!--input type="text" id="rship_acc" name="rship_acc" class="form-control" placeholder="Relationship Account..." Required-->
									<select class="form-control" required id="rship_acc" name="rship_acc">
										<option value="">-- Select a type --</option>
									</select>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<!--End Billing-->
				
				<!--Contact-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							Contact Information
						</h4>
					</div>
					<div class="panel-collapse" role="tabpanel" aria-labelledby="case_header">
						<div class="panel-body">
							<div class="form-group">
								<label for="address" class="col-sm-2 control-label">Address</label>
								<div class="col-sm-10">
									<input type="text" id="address" name="address" class="form-control" placeholder="Address Line 1...">
								</div>
							</div>
							
							<div class="form-group">	
								<label for="add_area" class="col-sm-2 control-label">Area</label>
								<div class="col-sm-4">
									<input type="text" id="add_area" name="add_area" class="form-control" placeholder="Area...">
								</div>

								<label for="add_state" class="col-sm-2 control-label">State</label>
								<div class="col-sm-4">
									<input type="text" id="add_state" name="add_state" class="form-control" placeholder="state...">
								</div>
							</div>
							
							<div class="form-group">	
								<label for="mobile" class="col-sm-2 control-label">Mobile</label>
								<div class="col-sm-4">
									<input type="number" id="mobile" name="mobile" class="form-control" placeholder="080-...">
								</div>

								<label for="phone" class="col-sm-2 control-label">Alt Mobile</label>
								<div class="col-sm-4">
									<input type="number" id="phone" name="phone" class="form-control" placeholder="080-...">
								</div>
							</div>
										
							<div class="form-group">	
								<label for="email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-4">
									<input type="email" id="email" name="email" class="form-control" placeholder="me@sightcity.com...">
								</div>

								<label for="email2" class="col-sm-2 control-label">Alt Email</label>
								<div class="col-sm-4">
									<input type="email" id="email2" name="email2" class="form-control" placeholder="me@sightcity.com...">
								</div>
							</div>
							
						</div>
					</div>
				</div>
				<!--End Contact-->			
				
				<!--Next of Kin-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							Next of Kin
						</h4>
					</div>
					<div class="panel-collapse" role="tabpanel" aria-labelledby="case_header">
						<div class="panel-body">
							<div class="form-group">	
								<label for="nok_fname" class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-4">
									<input type="text" id="nok_fname" name="nok_fname" class="form-control" placeholder="Next of Kin's First Name...">
								</div>

								<label for="nok_lname" class="col-sm-2 control-label">Last Name</label>
								<div class="col-sm-4">
									<input type="text" id="nok_lname" name="nok_lname" class="form-control" placeholder="Next of Kin's Last Name...">
								</div>
							</div>
							
							<div class="form-group">	
								<label for="nok_mobile" class="col-sm-2 control-label">Mobile</label>
								<div class="col-sm-4">
									<input type="number" id="nok_mobile" name="nok_mobile" class="form-control" placeholder="080-...">
								</div>

								<label for="nok_email" class="col-sm-2 control-label">Email</label>
								<div class="col-sm-4">
									<input type="email" id="nok_email" name="nok_email" class="form-control" placeholder="me@sightcity.com...">
								</div>
							</div>
							
							<div class="form-group">	
								<label for="nok_rel" class="col-sm-2 control-label">Relationship</label>
								<div class="col-sm-4">
									<input type="text" id="nok_rel" name="nok_rel" class="form-control" placeholder="Relationship with Customer">
								</div>
							</div>
							
							
						</div>
					</div>
				</div>
				<!--End NOK-->
			</div>

			<div class="col-md-2">
				<a style="text-align: left;" class="btn btn-block btn-default btn-block" id="btn_goback" href="customers.php"><i class="fa fa-users"></i> View All Customers</a> 
				<button type="reset" class="btn btn-block btn-default" style="text-align: left;" id="btn_clear">
					<i class="fa fa-eraser" id=""></i> Clear
				</button> 
				<button type="submit" style="color:white; text-align: left;" class="btn btn-block btn-info sctheme">
					<i class="fa fa-save" id="save_icon"></i> Save
				</button> 
				<a style="color:white; text-align: left;" class="btn btn-block btn-danger btn-block hidden" id="btn_delete" href="#"><i class="fa fa-trash"></i> Delete</a> 
			</div>
							
			
		</form>
	</div>

	<script>
		$(document).ready( function() {		
			//$("#rship_acc").select2();
			$.get('api/Controllers/Partners_RestController.php?view=all', function(data) {
				//console.log(data);
				data = $.parseJSON(data);
				$('#rship_acc').empty();
				$('#rship_acc').append($('<option>', { 
					value: '',
					text : '-- None selected --' 
				}));
				$.each(data, function (i, item) {
					$('#rship_acc').append($('<option>', { 
						value: item.p_sname,
						text : item.p_name 
					}));
				});
			});
			
			var id = location.search;	
			id = id.split("=");
			id = id[1];
			if(id != undefined){			
				$.get('api/Controllers/Customers_RestController.php?view=single&id='+id, function(data) {
					$("#form_title_text").text("Edit");
					data = $.parseJSON(data);
					//console.log(data);
					if(data.status === undefined){
						$.each(data, function(i, item) {			
							$("#title").val(item.title);
							$("#sname").val(item.lname);
							$("#mname").val(item.mname);
							$("#fname").val(item.fname);
							$("input[name=gender][value="+item.gender+"]").attr("checked", "checked");
							$("#cardno").val(item.cardno);
							$("#enroleeno").val(item.enroleeid);
							$("#mobile").val(item.phone1);
							$("#phone").val(item.phone2);
							$("#email").val(item.email1);
							$("#email2").val(item.email2);
							$("#rship_type").val(item.rship_type);
							$("#rship_acc").val(item.rship_account).change();
							//$("#dob").val(item.dob);
							$("#dob_day").val(item.dob_day);
							$("#dob_month").val(item.dob_month).change();
							$("#age").val(item.age);
							$("#address").val(item.address);
							$("#add_area").val(item.address_area);
							$("#add_state").val(item.address_state);
							$("#occupation").val(item.occupation);
							$("#nok_fname").val(item.nok_fname);
							$("#nok_lname").val(item.nok_lname);
							$("#nok_mobile").val(item.nok_phone);
							$("#nok_email").val(item.nok_email);
							$("#nok_rel").val(item.nok_relationship);
							
							$("#btn_clear").addClass("hidden");
							//$("#btn_delete").removeClass("hidden");
							$("#btn_delete").bind("click", function(){
								$.get('api/Customers_RestController.php?view=delete&id='+item.cid, function(data) {
									//console.log(data);
									 data = $.parseJSON(data);
									 if(data.status == 1){
										$("#save_icon").removeClass("fa-spinner fa-pulse");
										$("#save_icon").addClass("fa-save");
										$("#insert_alert").removeClass("alert-info");
										$("#insert_alert").addClass("alert-success");
										$("#insert_msg").html(data.msg);
										$("#insert_alert").removeClass("hidden");
										$("#newcus_form").trigger("reset");
									}
									else {
										$("#save_icon").removeClass("fa-spinner fa-pulse");
										$("#save_icon").addClass("fa-save");
										$("#insert_alert").removeClass("alert-info");
										$("#insert_alert").addClass("alert-danger");
										$("#insert_msg").html(data.msg);
										$("#insert_cus").removeClass("hidden");
									}
								});
							});
						});
					}
				});
			}
			else{
				$.get('api/Controllers/Customers_RestController.php?view=generate_cardno', function(data) {
					$data = $.parseJSON(data);
					//Auto Generate Card no
					//$("#cardno").val($data);
					$("form_title_text").text("Add New");
				});
			}
		
			$('#newcus_form').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
				e.preventDefault();
				return false;
			  }
			});
		
			$("#newcus_form").submit(function(e) { 
				$("#save_icon").removeClass("fa-save");
				$("#save_icon").addClass("fa-spinner fa-pulse");
				
				e.preventDefault();
				
				$.ajax({
					url: (id != undefined) ?  'api/Controllers/Customers_RestController.php?view=update&id=' + id : 'api/Controllers/Customers_RestController.php?view=new',
					type: 'post',
					data : {
						'title' : $("#title").val(),
						'lname' : $("#sname").val(),
						'mname' : $("#mname").val(),
						'fname' :  $("#fname").val(),
						'gender' : $('input[name=gender]:checked').val(),
						'cardno' : $("#cardno").val(),
						'enroleeid' : $("#enroleeno").val(),
						'phone1' : $("#mobile").val(),
						'phone2' : $("#phone").val(),
						'email1' : $("#email").val(),
						'email2' : $("#email2").val(),
						'rship_type' : $("#rship_type").val(),
						'rship_account' : $("#rship_acc").val(),
						'dob_day' : $("#dob_day").val(),
						'dob_month' : $("#dob_month").val(),
						'age' : $("#age").val(),
						'address' : $("#address").val(),
						'area' : $("#add_area").val(),
						'state': $("#add_state").val(),
						'occupation' : $("#occupation").val(),
						'nok_fname' : $("#nok_fname").val(),
						'nok_lname' : $("#nok_lname").val(),
						'nok_phone' : $("#nok_mobile").val(),
						'nok_email' : $("#nok_email").val(),
						'nok_rel' : $("#nok_rel").val()
					},
					success: function(data) {
						console.log(data);
					   data = $.parseJSON(data);
					   
					   if(data.status == 1){
							$("#save_icon").removeClass("fa-spinner fa-pulse");
							$("#save_icon").addClass("fa-save");
							$("#insert_alert").removeClass("alert-info");
							$("#insert_alert").addClass("alert-success");
							$("#insert_msg").html(data.msg);
							$("#insert_alert").removeClass("hidden");
							$("#newcus_form").trigger("reset");
							window.location.href = "customers.php?msg="+data.msg;
					   }
					   else {
						   //alert(data.msg);
							$("#save_icon").removeClass("fa-spinner fa-pulse");
							$("#save_icon").addClass("fa-save");
							$("#insert_alert").removeClass("alert-info");
							$("#insert_alert").addClass("alert-danger");
							$("#insert_msg").html(data.msg);
							$("#insert_cus").removeClass("hidden");
					   }
					}
				});
			});
			
			$("#rship_type").change(function() {
				$.get('api/Controllers/Partners_RestController.php?view=type&id='+$("#rship_type").val(), function(data) {
					//alert(data);
					data = $.parseJSON(data);
					$('#rship_acc').empty();
					$.each(data, function (i, item) {
						$('#rship_acc').append($('<option>', { 
							value: item.p_sname,
							text : item.p_name 
						}));
					});
				});
				if($("#rship_type").val() == 'Private'){
					$('#rship_acc').append($('<option>', { 
						value: 'Private',
						text : 'Private' 
					}));	
				}
			});
		});
	</script>
	
	<?php
		include "includes/footer_pages.php";
	?>
