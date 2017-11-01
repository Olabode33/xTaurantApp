	<?php
		include "includes/header_pages.php";
	?>
		
	<div>
		<ul class="nav nav-pills" style="margin-top: 10px; margin-bottom: 10px;">
			<li role="presentation" class="active"><a href="#">New</a></li>
			<li role="presentation"><a href="customers.php">Existing</a></li>
		<ul>
	</div>
	<hr  style="margin-top: 10px; margin-bottom: 10px;">

	<div class="row" style="margin-top:20px">
		<div class="col-xs-12 " id="insert_cus">
			<div class="alert alert-info alert-dismissible hidden" role="alert" id="insert_alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				<i class="fa fa-info-circle"></i> 
				<span id="insert_msg"></span>
			</div>
		</div>
		<form action="#" class="form-horizontal" id="newcus_form">
			<div class="col-md-10">
				<div class="form-group">
					<label for="cardno" class="col-sm-2 control-label"><span class="text-danger">*</span>Card No.</label>
					<div class="col-sm-4">
						<input type="text" id="cardno" name="cardno" class="form-control" placeholder="xxxx/xxx/yyyy" Required>
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
						<input type="text" id="sname" name="sname" class="form-control" placeholder="Your surname..." required>
					</div>
								
					<label for="fname" class="col-sm-2 control-label">Firstname</label>
					<div class="col-sm-4">
						<input type="text" id="fname" name="fname" class="form-control" placeholder="Your firstname...">
					</div>	
				</div>
								
				<div class="form-group">	
					<label for="mname" class="col-sm-2 control-label">Middlename</label>
					<div class="col-sm-4">
						<input type="text" id="mname" name="mname" class="form-control" placeholder="Your middlename...">
					</div>
								
					<label for="gender" class="col-sm-2 control-label">Gender</label>
					<div class="col-sm-4">
						<label class="radio-inline">
							<input type="radio" name="gender" id="gender" value="Male"> Male
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" id="gender" value="Female"> Female
						</label>
					</div>
				</div>
							
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
					<label for="dob" class="col-sm-2 control-label"><span class="text-danger">*</span>Date of Birth</label>
					<div class="col-sm-4">
						<input type="date" id="dob" name="dob" class="form-control" required>
					</div>

					<label for="age" class="col-sm-2 control-label">Age</label>
					<div class="col-sm-4">
						<input type="text" id="age" name="age" class="form-control" placeholder="yrs...">
					</div>
				</div>
								
				<div class="form-group">	
					<label for="occupation" class="col-sm-2 control-label">Occupation</label>
					<div class="col-sm-4">
						<input type="text" id="occupation" name="occupation" class="form-control" placeholder="occupation...">
					</div>

					<label for="nok" class="col-sm-2 control-label">Next of Kin</label>
					<div class="col-sm-4">
						<input type="text" id="nok" name="nok" class="form-control" placeholder="fullname...">
					</div>
				</div>
						
				<div class="form-group">	
					<label for="mobile" class="col-sm-2 control-label">Mobile</label>
					<div class="col-sm-4">
						<input type="text" id="mobile" name="mobile" class="form-control" placeholder="080-...">
					</div>

					<label for="phone" class="col-sm-2 control-label">Alt Mobile</label>
					<div class="col-sm-4">
						<input type="text" id="phone" name="phone" class="form-control" placeholder="080-...">
					</div>
				</div>
							
				<div class="form-group">	
					<label for="email" class="col-sm-2 control-label">Email</label>
					<div class="col-sm-4">
						<input type="text" id="email" name="email" class="form-control" placeholder="me@sightcity.com...">
					</div>

					<label for="email2" class="col-sm-2 control-label">Alt Email</label>
					<div class="col-sm-4">
						<input type="text" id="email2" name="email2" class="form-control" placeholder="me@sightcity.com...">
					</div>
				</div>
							
				<div class="form-group">	
					<label for="rship_type" class="col-sm-2 control-label">Relationship</label>
					<div class="col-sm-4">
						<select class="form-control" Required id="rship_type" name="rship_type">
							<option value=""></option>
							<option value="HMO">HMO</option>
							<option value="Organisation">Organisation</option>
							<option value="Private">Private</option>
							<option value="Secondary">Secondary</option>
						</select>
					</div>

					<label for="rship_acc" class="col-sm-2 control-label"><span class="text-danger">*</span>Account</label>
					<div class="col-sm-4">
						<input type="text" id="rship_acc" name="rship_acc" class="form-control" placeholder="fullname..." Required>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<button type="submit" style="color:white;" class="btn btn-block sctheme">
					Save <i class="fa fa-save" id="save_icon"></i>
				</button> 
			</div>
							
			<div style="margin-bottom:3%;"> </div>
		</form>
	</div>

	<script>
		$(document).ready( function() {			
			$("#newcus_form").submit(function(e) { 
				$("#save_icon").removeClass("fa-save");
				$("#save_icon").addClass("fa-spinner fa-pulse");
				
				e.preventDefault();
				
				$.ajax({
					url: 'api/Customers_RestController.php?view=new',
					type: 'post',
					data : {
						'title' : $("#title").val(),
						'lname' : $("#sname").val(),
						'mname' : $("#mname").val(),
						'fname' :  $("#fname").val(),
						'gender' : $("#gender").val(),
						'cardno' : $("#cardno").val(),
						'enroleeid' : $("#enroleeno").val(),
						'phone1' : $("#mobile").val(),
						'phone2' : $("#phone").val(),
						'email1' : $("#email").val(),
						'email2' : $("#email2").val(),
						'rship_type' : $("#rship_type").val(),
						'rship_account' : $("#rship_acc").val(),
						'dob' : $("#dob").val(),
						'age' : $("#age").val(),
						'address' : $("#address").val(),
						'area' : $("#add_area").val(),
						'state': $("#add_state").val(),
						'occupation' : $("#occupation").val(),
						'nok' : $("#nok").val()
					},
					success: function(data) {
					   //alert (data);
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
					}
				});
			});
		});
	</script>
	
	<?php
		include "includes/footer_pages.php";
	?>