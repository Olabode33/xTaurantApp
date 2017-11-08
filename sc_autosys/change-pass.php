	<?php
		include "includes/header_pages.php";
	?>
		
	<div class="row" style="margin-top:20px">
		<div class="col-xs-12 " id="insert_cus">
			<div class="alert alert-info alert-dismissible hidden" role="alert" id="insert_alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				<i class="fa fa-info-circle"></i> 
				<span id="insert_msg"> You would have to login again after your password has been successfully changed</span>
			</div>
		</div>
		
		<form action="#" class="form-horizontal" id="newuser_form">
			<div class="col-md-10">		
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">Change Password</h4>
					</div>
					<div class="panel-body">
						<div class="form-group">								
							<label for="opass" class="col-sm-2 control-label">Old Password</label>
							<div class="col-sm-4">
								<input type="password" id="opass" name="opass" class="form-control" placeholder="Enter your old password..." required>
							</div>
						</div>
										
						<div class="form-group" id="pass_grp">								
							<label for="npass" class="col-sm-2 control-label">New Password</label>
							<div class="col-sm-4">
								<input type="password" id="npass" name="npass" class="form-control" placeholder="Enter your new password..." required>
							</div>
							
							<label for="cpass" class="col-sm-2 control-label">Confirm Password</label>
							<div class="col-sm-4">
								<input type="password" id="cpass" name="cpass" class="form-control" placeholder="Confirm your new password..." required>
							</div>
						</div>
						
						<div class="form-group">								
							<label for="opass" class="col-sm-2 control-label"></label>
							<div class="col-sm-10">
								<button type="reset" class="btn btn-default" style="text-align: left;" id="btn_clear">
									<i class="fa fa-eraser" id=""></i> Clear
								</button> 
								<button type="submit" style="color:white; text-align: left;" class="btn btn-info sctheme">
									<i class="fa fa-save" id="save_icon"></i> Change Password
								</button> 
								<p class="help-block"><i class="fa fa-info-circle"></i> You would have to login again.</p>
							</div>
						</div>
					</div>
				</div>		
			</div>

			<div class="col-md-2">
				
			</div>
							
			<div style="margin-bottom:3%;"> </div>
		</form>
	</div>

	<script>
		$(document).ready( function() {		
			//$("#rship_acc").select2();
			
			$("#npass").keyup(function () {
				validate();
			});
			$("#cpass").keyup(function () {
				validate();
			});
			
			var id = location.search;	
			id = id.split("=");
			id = id[1];
		
			$("#newuser_form").submit(function(e) { 
				$("#save_icon").removeClass("fa-save");
				$("#save_icon").addClass("fa-spinner fa-pulse");
				
				e.preventDefault();
				
				if(validate()){
					$.ajax({
						url: 'api/Controllers/Users_RestController.php?view=changepass&id=' + id,
						type: 'post',
						data : {
							'opass': $("#opass").val(),
							'npass': $("#npass").val()
						},
						success: function(data) {
						   //alert (data);
						   data = $.parseJSON(data);
						   if(data.status == 1){
								$("#save_icon").removeClass("fa-spinner fa-pulse");
								$("#save_icon").addClass("fa-check");
								window.location.href = "index.php?a=changepass";
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
					$("#insert_msg").html("Password mis-match, Please re-type the password");
					$("#insert_alert").removeClass("hidden");
				}
			});
			
			function validate() {
				var pass = $('#npass').val();
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