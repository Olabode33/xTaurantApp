	<?php
		include "includes/header_pages.php";
	?>
		
	<!--div>
		<ul class="nav nav-pills" style="margin-top: 10px; margin-bottom: 10px;">
			<li role="presentation" class="active"><a href="newuser.php"><i class="fa fa-user-plus"></i> New</a></li>
			<!--li role="presentation"><a href="users.php">Existing</a></li>
		</ul>
	</div>
	<hr  style="margin-top: 10px; margin-bottom: 10px;"-->

	<div class="row" >
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-user-circle"></i> User Management
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12 " id="insert_cus">
			<div class="alert alert-info alert-dismissible hidden" role="alert" id="insert_alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				<i class="fa fa-info-circle"></i> 
				<span id="insert_msg"></span>
			</div>
		</div>
		<form action="#" class="form-horizontal" id="newuser_form">
			<div class="col-md-10">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span id="pnl_title">User's<span> Details
						</h4>
					</div>
					<div class="panel-collapse" role="tabpanel" aria-labelledby="case_header">
						<div class="panel-body">
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
								<label for="uname" class="col-sm-2 control-label">Username</label>
								<div class="col-sm-4">
									<input type="text" id="uname" name="uname" class="form-control" placeholder="Your username / login name...">
								</div>
							</div>
							
							<div class="form-group">	
								<label for="role" class="col-sm-2 control-label">Role</label>
								<div class="col-sm-4">
									<select class="form-control" Required id="role" name="role">
										<option value="">-- Select a role --</option>
										<option value="Doctor">Doctor</option>
										<option value="Front Desk">Front Desk</option>
										<option value="Admin">Administrator</option>
									</select>
								</div>
							</div>
											
							<div class="form-group" id="pass_grp">								
								<label for="pass" class="col-sm-2 control-label">Password</label>
								<div class="col-sm-4">
									<input type="password" id="pass" name="pass" class="form-control" placeholder="Enter your password..." required>
								</div>
								
								<label for="cpass" class="col-sm-2 control-label">Confirm Password</label>
								<div class="col-sm-4">
									<input type="password" id="cpass" name="cpass" class="form-control" placeholder="Confirm your password..." required>
								</div>
							</div>
										
							<div class="form-group">	
								<label for="ubranch" class="col-sm-2 control-label">Branch</label>
								<div class="col-sm-4">
									<select class="form-control" id="ubranch" name="ubranch">
										<option value="">-- Select a branch --</option>
										<option value="VI">VI</option>
										<option value="Ikeja">Ikeja</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-2">
				<a class="btn btn-block btn-default" style="text-align: left;" id="btn_back" href="users.php">
					<i class="fa fa-users" id=""></i> Back to all Users
				</a> 
				<button type="reset" class="btn btn-block btn-default" style="text-align: left;" id="btn_clear">
					<i class="fa fa-eraser" id=""></i> Clear
				</button> 
				<button type="submit" style="color:white; text-align: left;" class="btn btn-block sctheme">
					<i class="fa fa-save" id="save_icon"></i> Save
				</button> 
			</div>
							
			<div style="margin-bottom:3%;"> </div>
		</form>
	</div>

	<script>
		$(document).ready( function() {		
			//$("#rship_acc").select2();
			
			$("#pass").keyup(function () {
				validate();
			});
			$("#cpass").keyup(function () {
				validate();
			});
			
			var id = location.search;	
			id = id.split("=");
			id = id[1];
			if(id != undefined){			
				//$("#frm_title").html("Edit User")
				$.get('api/Controllers/Users_RestController.php?view=single&id='+id, function(data) {
					data = $.parseJSON(data);
					//console.log(data);
					if(data.status === undefined){
						$.each(data, function(i, item) {			
							$("#title").val(item.title);
							$("#sname").val(item.lname);
							$("#fname").val(item.fname);
							$("#role").val(item.role).change();
							$("#uname").val(item.uname);	
							$("#pass").val(item.pword);
							$("#cpass").val(item.pword);
							$("#ubranch").val(item.branch).change();
							
							
							$("#pass").attr("disable", false);
							$("#cpass").attr("disable", false);							
							$("#pass_grp").addClass("hidden");
							
							$("#btn_clear").addClass("hidden");
						});
					}
				});
			}
		
			$('#newuser_form').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
				e.preventDefault();
				return false;
			  }
			});
		
			$("#newuser_form").submit(function(e) { 
				$("#save_icon").removeClass("fa-save");
				$("#save_icon").addClass("fa-spinner fa-pulse");
				
				e.preventDefault();
				
				if(validate()){
					$.ajax({
						url: (id != undefined) ?  'api/Controllers/Users_RestController.php?view=edit&id=' + id : 'api/Controllers/Users_RestController.php?view=new',
						type: 'post',
						data : {
							'title' : $("#title").val(),
							'lname' : $("#sname").val(),
							'fname' :  $("#fname").val(),
							'role': $("#role").val(),
							'uname': $("#uname").val(),
							'pass': $("#pass").val(),
							'branch': $("#ubranch").val()
						},
						success: function(data) {
						   //alert (data);
						   data = $.parseJSON(data);
						   if(data.status == 1){
								$("#save_icon").removeClass("fa-spinner fa-pulse");
								$("#save_icon").addClass("fa-save");
								$("#insert_alert").removeClass("alert-info");
								$("#insert_alert").removeClass("alert-warning");
								$("#insert_alert").addClass("alert-success");
								$("#insert_msg").html(data.msg);
								$("#insert_alert").removeClass("hidden");
								$("#newuser_form").trigger("reset");
								window.location.href = "users.php?msg="+data.msg	
						   }
						   else {
								$("#save_icon").removeClass("fa-spinner fa-pulse");
								$("#save_icon").addClass("fa-save");
								$("#insert_alert").removeClass("alert-info");
								$("#insert_alert").removeClass("alert-warning");
								$("#insert_alert").addClass("alert-danger");
								$("#insert_msg").html(data.msg);
								$("#insert_cus").removeClass("hidden");
						   }
						}
					});
				}
				else {
					$("#save_icon").removeClass("fa-spinner fa-pulse");
					$("#save_icon").addClass("fa-save");
					$("#insert_alert").removeClass("alert-info");
					$("#insert_alert").addClass("alert-warning");
					$("#insert_msg").html("Password mis-match, Please retype the password");
					$("#insert_alert").removeClass("hidden");
				}
			});
			
			function validate() {
				var pass = $('#pass').val();
				var cpass = $('#cpass').val();
				
				if(pass != "" || cpass != ""){
					if(pass == cpass){
						$("#pass_grp").removeClass("has-error");
						$("#pass_grp").addClass("has-success");
						return true;
					}
					else {
						$("#pass_grp").removeClass("has-success")
						$("#pass_grp").addClass("has-error");
						return false;
					}
				}
				else {
					$("#pass_grp").removeClass("has-error");
					$("#pass_grp").addClass("has-error");
					return false;
				}
			}
		});
	</script>
	
	<?php
		include "includes/footer_pages.php";
	?>