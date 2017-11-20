	<?php
		include "includes/header_pages.php";
	?>
	
	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-plus"></i> Add New Partners
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12 " id="insert_cus">
			<div class="alert alert-info alert-dismissible hidden" role="alert" id="insert_alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>	
				<i class="fa fa-info-circle"></i> 
				<span id="insert_msg"></span>
			</div>
		</div>
		<form action="#" class="form-horizontal" id="newPartnerForm">	
			<div class="col-md-10">
				<!--Details-->
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							Partner's Details
						</h4>
					</div>
					<div class="panel-collapse" role="tabpanel" aria-labelledby="case_header">
						<div class="panel-body">
							<div class="form-group">
								<label for="cardno" class="col-sm-2 control-label"><span class="text-danger">*</span>Short Name</label>
								<div class="col-sm-4">
									<input type="text" id="p_sname" name="p_sname" class="form-control" placeholder="Short Name / Code" Required>
								</div>
								<label for="cardno" class="col-sm-2 control-label"><span class="text-danger">*</span>Type</label>
								<div class="col-sm-4">
									<select id="p_type" name="p_type" class="form-control" required>
										<option value="">-- Select Type --</option>
										<option value="HMO">HMO</option>
										<option value="Organisation">Organisation</option>
									</select>
								</div>
							</div>
							
							<div class="form-group">
								<label for="cardno" class="col-sm-2 control-label"><span class="text-danger">*</span>Full Name</label>
								<div class="col-sm-10">
									<input type="text" id="p_name" name="p_name" class="form-control" placeholder="Full Name" required>
								</div>
							</div>
							
							<div class="form-group">
								<label for="cardno" class="col-sm-2 control-label"><span class="text-danger">*</span>Address</label>
								<div class="col-sm-10">
									<input type="text" id="p_addr" name="p_addr" class="form-control" placeholder="Address Line 1" required>
								</div>
							</div>
							
							<div class="form-group">	
								<label for="dob" class="col-sm-2 control-label"><span class="text-danger">*</span>Area</label>
								<div class="col-sm-4">
									<input type="text" id="p_area" name="p_area" class="form-control" placeholder="Area" required>
								</div>
								<label for="age" class="col-sm-2 control-label"><span class="text-danger">*</span>State</label>
								<div class="col-sm-4">
									<input type="text" id="p_state" name="p_state" class="form-control" placeholder="State" required>
								</div>
							</div>
					
							<div class="form-group">	
								<label for="dob" class="col-sm-2 control-label"><span class="text-danger">*</span>Mobile</label>
								<div class="col-sm-4">
									<input type="number" id="p_phone" name="p_phone" class="form-control" placeholder="Mobile" required>
								</div>
								<label for="age" class="col-sm-2 control-label"><span class="text-danger">*</span>Email</label>
								<div class="col-sm-4">
									<input type="email" id="p_email" name="p_email" class="form-control" placeholder="Email" required>
								</div>
							</div>
								
						</div>
					</div>
				</div>
				<!--End Bio Data-->
			</div>

			<div class="col-md-2">
				<a style="text-align: left;" class="btn btn-block btn-default btn-block" id="btn_goback" href="partners.php"><i class="fa fa-cubes"></i> View All Partners</a> 
				<button type="reset" class="btn btn-block btn-default" style="text-align: left;" id="btn_clear">
					<i class="fa fa-eraser" id=""></i> Clear
				</button> 
				<button type="submit" style="color:white; text-align: left;" class="btn btn-block sctheme">
					<i class="fa fa-save" id="save_icon"></i> Save
				</button> 
				<a style="color:white; text-align: left;" class="btn btn-block btn-danger btn-block hidden" id="btn_delete" href="#"><i class="fa fa-trash"></i> Delete</a> 
			</div>
							
			
		</form>
	</div>

	<script>
		$(document).ready( function() {		
		
			var id = location.search;	
			id = id.split("=");
			id = id[1];
			if(id != undefined){			
				$.get('api/Controllers/Partners_RestController.php?view=single&id='+id, function(data) {
					data = $.parseJSON(data);
					//console.log(data);
					if(data.status === undefined){
						$.each(data, function(i, item) {			
							$("#p_sname").val(item.p_sname);
							$("#p_name").val(item.p_name);
							$("#p_type").val(item.p_type);
							$("#p_addr").val(item.p_addr);
							$("#p_area").val(item.p_area);
							$("#p_state").val(item.p_state);
							$("#p_phone").val(item.p_phone);
							$("#p_email").val(item.p_email);
							
							$("#btn_goback").removeClass("hidden");
							$("#btn_clear").addClass("hidden");
							//$("#btn_delete").removeClass("hidden");
							$("#btn_delete").bind("click", function(){
								$.get('api/Partners_RestController.php?view=delete&id='+item.p_id, function(data) {
									console.log(data);
									 data = $.parseJSON(data);
									 if(data.status == 1){
										$("#save_icon").removeClass("fa-spinner fa-pulse");
										$("#save_icon").addClass("fa-save");
										$("#insert_alert").removeClass("alert-info");
										$("#insert_alert").addClass("alert-success");
										$("#insert_msg").html(data.msg);
										$("#insert_alert").removeClass("hidden");
										$("#newPartnerForm").trigger("reset");
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
		
			$('#newPartnerForm').on('keyup keypress', function(e) {
			  var keyCode = e.keyCode || e.which;
			  if (keyCode === 13) { 
				e.preventDefault();
				return false;
			  }
			});
		
			$("#newPartnerForm").submit(function(e) { 
				$("#save_icon").removeClass("fa-save");
				$("#save_icon").addClass("fa-spinner fa-pulse");
				
				e.preventDefault();
				
				$.ajax({
					url: (id != undefined) ?  'api/Controllers/Partners_RestController.php?view=edit&id=' + id : 'api/Controllers/Partners_RestController.php?view=new',
					type: 'post',
					data : {
						'p_sname' : $("#p_sname").val(),
						'p_name' : $("#p_name").val(),
						'p_type' : $("#p_type").val(),
						'p_addr' :  $("#p_addr").val(),
						'p_area' : $("#p_area").val(),
						'p_state' : $("#p_state").val(),
						'p_email' : $("#p_email").val(),
						'p_phone' : $("#p_phone").val()
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
							$("#newPartnerForm").trigger("reset");
							window.location.href = "partners.php?msg="+data.msg
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
