	<?php
		include "includes/header_pages.php";
	?>
	
	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-bell"></i> Annoucements
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12 hidden" id="result_msg">
			<div class="alert alert-success alert-dismissable" role="alert">
				<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				<i class="fa fa-check"></i> <span id="result_msg_txt">Showing top 10 results</span>
			</div>
		</div>
		<div class="col-xs-12" style="margin-bottom: 20px">
			<button class="btn btn-primary pull-right" id="btn_new" onclick="view_new();"><i class="fa fa-plus"></i> Make Annoucement</a>
		</div>
		<div class="col-xs-12">
			<div id="notification-list">
				<div class="table-responsive">
					<table class="table table-hover" id="tbl_notifications" >
						<thead class="thead-inverse">	
							<th class="col-xs-7" >Message</th>						
							<th class="col-xs-2">Author</th>
							<th class="col-xs-2">Date</th>				
							<th class="col-xs-1"></th>				
						</thead>
						
						<tbody>
							
						</tbody>
					</table>
				</div>
			</div>
			<div class="hidden" id="new-notification">
				<form action="#" class="form-horizontal" id="newnotification_form">
					<div class="panel panel-primary">
						<div class="panel-heading" role="tab">
							<h4 class="panel-title">Create New Notification</h4>
						</div>
						<div class="panel-body">
							<div class="form-group">								
								<label for="opass" class="col-sm-2 control-label">Message</label>
								<div class="col-sm-10">
									<textarea id="nmsg" name="nmsg" class="form-control" placeholder="Enter the message for your notification..." required rows=5></textarea>
								</div>
							</div>
								
							<div class="form-group">								
								<label for="" class="col-sm-2 control-label"></label>
								<div class="col-sm-10">
									<button type="reset" class="btn btn-default" style="text-align: left;" id="btn_clear">
										<i class="fa fa-eraser" id=""></i> Clear
									</button> 
									<button type="submit" style="color:white; text-align: left;" class="btn btn-info sctheme">
										<i class="fa fa-save" id="save_icon"></i> Save
									</button> 
									<p class="help-block"><i class="fa fa-info-circle"></i> This notification would be seen by all users.</p>
								</div>
							</div>
						</div>
					</div>		
				</form>
			</div>
		</div>
	</div>
	
	<script>
		$(document).ready( function() {
			//$('#loading_cus').removeClass("hidden");
			//$("#notification-list").addClass("hidden");
			search();
		});
		
		function search () {
			$.get('api/Controllers/Notifications_RestController.php?view=all', function(data) {
				data = $.parseJSON(data);
				//console.log(data);
					
				var t = $("#tbl_notifications");
				$("#tbl_notifications tbody").empty();
					
				if(data.status != 0) {
					$.each(data, function(i, item) {
						//console.log(item);
						row = $('<tr></tr>');
						rowData = $('<td></td>').html((item.status == 'New')?'<strong>'+item.msg+'</strong>':item.msg);
						row.append(rowData);
						rowData = $('<td></td>').text(item.fname + ' ' + item.lname);
						row.append(rowData);
						rowData = $('<td></td>').text(item.date);
						row.append(rowData);
						
						deleteButton = $('<a></a>').addClass("text-danger").html('<i class="fa fa-times"></i>');
						deleteButton.attr('data-toggle', 'tooltip');
						deleteButton.attr('title', 'Delete Notifications');
						deleteButton.attr('onclick', 'delete_notification('+item.id+')');
						rowData = $('<td></td>').append(deleteButton);

						row.append(rowData);
							
						t.append(row);
					});
				}
				else {
					$("#tbl_notifications tbody").html(data.msg);
				}
			});
		}
				
		function view_all() {
			search();
			$("#notification-list").removeClass("hidden");
			$("#new-notification").addClass("hidden");
		}
		
		function view_new() {
			$("#notification-list").addClass("hidden");
			$("#new-notification").removeClass("hidden");
		}
		
		function delete_notification(id){
			$.get('api/Controllers/Notifications_RestController.php?view=delete&id='+id, function(data) {
				data = $.parseJSON(data);
				
				$("#result_msg_txt").html(data.msg);
				$("#result_msg").removeClass("info");
				$("#result_msg").removeClass("danger");
				$("#result_msg").addClass("success");
				$("#result_msg").removeClass("hidden");
				search();
			});
		}
		
		$("#newnotification_form").submit(function(e) { 
			$("#save_icon").removeClass("fa-save");
			$("#save_icon").addClass("fa-spinner fa-pulse");
				
			e.preventDefault();
				
			$.ajax({
				url: 'api/Controllers/Notifications_RestController.php?view=new',
				type: 'post',
				data : {
					'msg': $("#nmsg").val()
				},
				success: function(data) {
					console.log
					data = $.parseJSON(data);
					if(data.status == 1){
						$("#save_icon").removeClass("fa-spinner fa-pulse");
						$("#save_icon").addClass("fa-save");
						$("#result_msg_txt").html(data.msg);
						$("#result_msg").removeClass("info");
						$("#result_msg").removeClass("danger");
						$("#result_msg").addClass("success");
						$("#result_msg").removeClass("hidden");
						//show_snackbar($("#nmsg").val());
						$("#newnotification_form").trigger("reset");
						view_all();
					}
					else {
						$("#save_icon").removeClass("fa-spinner fa-pulse");
						$("#save_icon").addClass("fa-save");
						$("#result_msg").removeClass("alert-info");
						$("#result_msg").removeClass("alert-success");
						$("#result_msg").addClass("alert-danger");
						$("#result_msg_txt").html(data.msg);
						$("#result_msg").removeClass("hidden");
					}
				}
			});
		});
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
