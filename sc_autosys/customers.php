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
													<td><label><strong></strong></label></td>
													<td id="nok"></td>	
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
											<table class="table table-hover" id="tbl_treatory2" >
												<thead class="thead-inverse">							
													<th class="col-xs-2">Date</th>
													<th class="col-xs-3">Diagnosis</th>
													<th class="col-xs-3">Prescription</th>	
													<th class="col-xs-3">Note</th>		
													<th class="col-xs-1">Action</th>		
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
													<th class="col-xs-3">Name</th>
													<th class="col-xs-1" >Gender</th>
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
							<!-- Appointment History-->
							<div class="panel panel-primary">
								<div class="panel-heading" role="tab" id="appistory_header">
									<h4 class="panel-title">
										<a role="button" data-toggle="collapse" data-parent="#accordion" href="#appistory" aria-expanded="true" aria-controls="collapseOne">Appointment History</a>
									</h4>
								</div>
								<div id="appistory" class="panel-collapse collapse" role="tabpanel" aria-labelledby="appistory_header">
									<div class="panel-body">
										<div class="table-responsive">
											<table class="table table-hover" id="tbl_appistory" >
												<thead class="thead-inverse">							
													<th class="col-xs-4">Date</th>
													<th class="col-xs-4">Branch</th>
													<th class="col-xs-4">Status</th>		
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
						<button type="button" style="text-align: left;" class="btn btn-block btn-success" id="btn_add_dep">
							<i class="fa fa-plus"></i>  &nbsp;Add Dependent
						</button> 
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
										<input type="hidden" placeholder="" name="c_dep_id" id="c_dep_id" class="form-control">
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
								<label class="col-sm-2 control-label" for="cdate">Branch</label>
								<div class=" col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-map-marker"></i>
										</div>
										<select class="form-control" Required id="cbranch" name="cbranch">
											<option value="">-- Select a Branch --</option>
											<option value="Ikeja">Ikeja</option>
											<option value="VI">Victoria Island</option>
										</select>
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
			
			<div class="hidden" id="add_new_dep">
				<div class="panel panel-primary">
					<div class="panel-heading" role="tab">
						<h4 class="panel-title">Add New Dependent</h4>
					</div>
					<div class="panel-body">
						<form action="#" class="form-horizontal" id="frm_new_dep">
							<div class="alert alert-info hidden" role="alert" id="new_dep_alert">
								<i class="fa fa-info-circle"></i> 
								<span id="new_dep_msg"></span>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="pri_acct_name">Primary Account Name</label>
								<div class=" col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-user-circle"></i>
										</div>
										<input type="text" placeholder="" name="pri_acct_name" id="pri_acct_name" class="form-control" disabled>
										<input type="hidden" placeholder="" name="pri_acct_id" id="pri_acct_id" class="form-control">
									</div>
								</div>
								<label class="col-sm-2 control-label" for="pri_cardno">Card No.</label>
								<div class="col-sm-4">
									<div class="input-group">
										<div class="input-group-addon">
											<i class="fa fa-address-card-o"></i>
										</div>
										<input type="text" placeholder="" name="pri_cardno" id="pri_cardno" class="form-control" disabled>
									</div>
								</div>
							</div>	
							
							<div class="form-group">
								<label class="col-sm-2 control-label" for="newdep_fname">First Name</label>
								<div class=" col-sm-4">
									<input type="text" placeholder="Dependent's First Name" name="newdep_fname" id="newdep_fname" class="form-control">
								</div>
								<label class="col-sm-2 control-label" for="newdep_lname">Last Name</label>
								<div class="col-sm-4">
									<input type="text" placeholder="Dependent's Last Name" name="newdep_lname" id="newdep_lname" class="form-control">
								</div>
							</div>	
							<div class="form-group">
								<label for="newdep_gender" class="col-sm-2 control-label">Gender</label>
								<div class="col-sm-4">
									<label class="radio-inline">
										<input type="radio" name="newdep_gender" id="newdep_gender" value="Male"> Male
									</label>
									<label class="radio-inline">
										<input type="radio" name="newdep_gender" id="newdep_gender" value="Female"> Female
									</label>
								</div>
								<label class="col-sm-2 control-label" for="newdep_relationship">Relationship</label>
								<div class="col-sm-4">
									<input type="text" placeholder="Relationship with Primary Accounts" name="newdep_relationship" id="newdep_relationship" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label" for="newdep_phone">Mobile Number</label>
								<div class=" col-sm-4">
									<input type="number" placeholder="Dependent's mobile number" name="newdep_phone" id="newdep_phone" class="form-control">
								</div>
								<label class="col-sm-2 control-label" for="newdep_email">Email</label>
								<div class="col-sm-4">
									<input type="email" placeholder="Dependent's email" name="newdep_email" id="newdep_email" class="form-control">
								</div>
							</div>	
							<div class="form-group">
								<label class="col-sm-2 control-label" for="submit"></label>
								<div class=" col-sm-4">
									<button type="submit" class="btn btn-primary" id="btn_add_new_dep"><i class="fa fa-plus" id="new_dep_icon"></i> Add Dependent</button> 
									<button type="button" class="btn btn-default" id="btn_back2details"><i class="fa fa-reply"></i> Go Back</button> 
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		
		</div>
	</div>
	
	<!-- Modal div to delete a project --> 
	<div class="modal fade" id="history_details" tabindex="-1" role="dialog"  aria-labelledby="projectTitle" aria-hidden="true"> 
		<div class="modal-dialog modal-lg modal-header-danger" role="document"> 
			<div class="modal-content"> 
				<div class="modal-header"> 
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true"> &times; </button> 
					<h4 class="modal-title" id="projectTitle">View History Details</h4> 
				</div> 
				<div class="modal-body">
					<div class="panel-group" id="h_drspage">
						<!--Client History -->
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"><a data-toggle="collapse" data-parent="#h_drspage" href="#h_ch">Client History</a></h3>
							</div>
							<div id="h_ch" class="panel-collapse collapse">
								<div class="panel-body">
									<div class="row">
										<b class="col-sm-3">Chief Complain:</b> 
										<div class="col-sm-9">
											<p id="h_chiefcomplain"></p>
										</div>
									</div>	
														
									<div class="row">
										<b class="col-sm-3">PxOHx:</b> 
										<div class="col-sm-9">
											<p type="text" id="h_pxohx"></p>
										</div>
									</div>	
															
									<div class="row">
										<b class="col-sm-3">PxMHx:</b> 
										<div class="col-sm-9">
											<p id="h_pxmhx"></p>
										</div>
									</div>	
															
									<div class="row">
										<b class="col-sm-3">PxFOHx:</b> 
										<div class="col-sm-9">
											<p id="h_pxfohx"></p>
										</div>	
									</div>
									
									<div class="row">
										<b class="col-sm-3">PxFMHx:</b> 
										<div class="col-sm-9">
											<p id="h_pxfmhx"></p>
										</div>	
									</div>
															
									<div class="row">
										<b class="col-sm-3">LEE:</b> 
										<div class="col-sm-9">
											<p id="h_lee"></p>
										</div>	
									</div>
								</div>
							</div>
						</div>
						<!--Examination-->
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title"><a data-toggle="collapse" data-parent="#h_drspage" href="#h_exam">Examination</a></h3>
							</div>
							<div id="h_exam" class="panel-collapse collapse">
								<div class="panel-body">
									<!--Header 1-->
									<div class="row">
										<div class="col-sm-3"> </div>
										<div class="col-sm-3" style="font-weight:bold; text-align:center"> Unaided </div>
										<div class="col-sm-3" style="font-weight:bold; text-align:center"> Aided </div>
										<div class="col-sm-3" style="font-weight:bold; text-align:center"> Pinhole </div>
									</div>
									<!--Header 2-->
									<div class="row">		
										<div class="col-sm-3" style="font-weight:bold; text-align: right"> Visual Acuity</div>
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="font-weight:bold; text-align:center"> R </div>
												<div class="col-sm-6" style="font-weight:bold; text-align:center"> L </div>
											</div>
										</div>
													
										<div class="col-sm-3"> 
											<div class="row">
												<div class="col-sm-6" style="font-weight:bold; text-align:center"> R </div>
												<div class="col-sm-6" style="font-weight:bold; text-align:center"> L </div>
											</div>				
										</div>
													
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="font-weight:bold; text-align:center"> R </div>
												<div class="col-sm-6" style="font-weight:bold; text-align:center"> L </div>
											</div>
										</div>					
									</div>
									<!-- Far  -->
									<div class="row">
										<b for="va" class="col-sm-3 control-label">Far</b>
										<!--Unaided-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="padding-right: 0px;" >
													<p id="h_va_far_unaided_r"></p>
												</div>
												<div class="col-sm-6" style="padding-left: 0px;">
													<p id="h_va_far_unaided_l"></p>							
												</div>
											</div>
										</div>
														
										<!--Aided-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="padding-right: 0px;" >
													<p id="h_va_far_aided_r"></p>
												</div>
												<div class="col-sm-6" style="padding-left: 0px;">
													<p id="h_va_far_aided_l"></p>									
												</div>
											</div>
										</div>
														
										<!--Pinhole-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="padding-right: 0px;" >
													<p id="h_va_far_pinhole_r"></p>
												</div>
												<div class="col-sm-6" style="padding-left: 0px; padding-right:20px">
													<p id="h_va_far_pinhole_l"></p>								
												</div>
											</div>
										</div>
														
									</div>
									<!-- Far Row 2-->
									<div class="row">
										<b for="va" class="col-sm-3 control-label"></b>
										<!--Far2 Unaided-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="padding-right: 0px;" >
													<p id="h_va_far2_unaided_r"></p>
												</div>
												<div class="col-sm-6" style="padding-left: 0px;">
													<p id="h_va_far2_unaided_l"></p>								
												</div>
											</div>
										</div>
														
										<!--Aided-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="padding-right: 0px;" >
													<p id="h_va_far2_aided_r"></p>
												</div>
												<div class="col-sm-6" style="padding-left: 0px;">
													<p id="va_far2_aided_l"></p>								
												</div>
											</div>
										</div>
														
										<!--Pinhole-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="padding-right: 0px;" >
													<p id="h_va_far2_pinhole_r"></p>
												</div>
												<div class="col-sm-6" style="padding-left: 0px; padding-right:20px">
													<p id="h_va_far2_pinhole_l"></p>								
												</div>
											</div>
										</div>
														
									</div>
												
									<!--Near -->
									<div class="row">
										<b class="col-sm-3 control-label">Near</b>
										<!--Unaided-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-12" style="padding-right: 0px;" >
													<p id="h_va_near_unaided_r"></p>
												</div>
												<!--div class="col-sm-6" style="padding-left: 0px;">
													<p id="h_va_near_unaided_l"></p>						
												</div-->
																
											</div>
										</div>
														
										<!--Aided-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-12" style="padding-right: 0px;" >
													<p id="h_va_near_aided_r"></p>
												</div>
												<!--div class="col-sm-6" style="padding-left: 0px;">
													<p id="h_va_near_aided_l"></p>								
												</div-->
											</div>
										</div>
										
										<!--Pinhole-->
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-12" style="padding-right: 20px;" >
													<p id="h_va_near_pinhole_r"></p>
												</div>
												<!--div class="col-sm-6" style="padding-left: 0px; padding-right:20px">
													<p id="h_va_near_pinhole_l"></p>								
												</div-->
											</div>
										</div>
														
									</div>
												
									<!-- OSP -->
									<div class="row">
										<b class="col-sm-3 control-label">Old Spec Pres:</b>
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6"  style="padding-right: 0px;" >
													<p id="h_ospr"></p>
												</div>
												<div class="col-sm-6"  style="padding-left: 0px;" >
													<p id="h_opsl" ></p>								
												</div>
											</div>
										</div>
										
										<div class="col-sm-3">
										</div>
										
										<div class="col-sm-3">
											<div class="row">
												<b for="va" class="col-sm-3 control-label">Near</b>
												<div class="col-sm-9" style="padding-right:20px">
													<p id="h_ospn"></p>
												</div>
											</div>
										</div>	
									</div>
									<!-- OSP ADD-->
									<div class="row">
										<b for="va" class="col-sm-3 control-label">ADD</b>
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-12"  style="padding-right: 0px;" >
													<p id="h_ospaddr"></p>
												</div>
												<!--div class="col-sm-6"  style="padding-left: 0px;" >
													<input type="text" id="opsaddl" name="ospaddl" class="form-control">								
												</div-->
											</div>
										</div>
									</div>
									<!-- IOP -->
									<div class="row">
										<b for="va" class="col-sm-3 control-label">IOP:</b>													
										<div class="col-sm-3">
											<div class="row">
												<div class="col-sm-6" style="padding-right: 0px;">
													<p id="h_iopr"></p>
												</div>												
												<div class="col-sm-6" style="padding-left: 0px;">
													<p id="h_iopl" ></p>
												</div>
											</div>
										</div>
										
										<b for="iop" class="col-sm-3 control-label" style="text-align: left; margin-left: -20px;">mmHg</b>
										
										<div class="col-sm-3" style="padding-right:20px"> 
											<p id="tim"> </p>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					
					</div>
				</div> 
				<div class="modal-footer"> 
					
				</div> 
			</div><!-- /.modal-content --> 
		</div><!-- /.modal-dialog -->
	</div><!-- /.modal -->
	
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
							
						viewButton = $('<button></button>').addClass("btn btn-primary btn-xs details").html('<i class="fa fa-info-circle" aria-hidden="true"></i> View Details');
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
				$("#add_new_dep").addClass("hidden");
			});
		}
		
		function view_details(id) {
			//alert("button " +id+" was clicked");
			$("#summary-list").addClass("hidden");
			$("#details").removeClass("hidden");
			$("#loading_cus").addClass("hidden");
			$("#book_appointment").addClass("hidden");
			$("#add_new_dep").addClass("hidden");
			
			$.get('api/Controllers/Customers_RestController.php?view=single&id='+id, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				//alert(data);
				
				$.each(data, function(i, item) {
					$("#cardno").html(item.cardno);
					$("#enroleeno").html(item.enroleeid);
					$("#fullname").html(item.title + " " + item.fname + ' ' + item.lname);
					$("#gender").html(item.gender);
					$("#fulladdress").html(item.address + ", " + item.address_area + " " + item.address_state);
					$("#dob").html(item.dob_month + ' ' + item.dob_day + ' ' + item.dob);
					$("#age").html(item.age);
					$("#occupation").html(item.occupation);
					$("#nok").html(item.nok);
					$("#mobile").html(item.phone1 + ", " + item.phone2);
					$("#email").html(item.email1 + ",  " + item.email2);
					$("#rship_type").html(item.rship_type);
					$("#rship_account").html(item.rship_account);
					$("#chistory_note").html(item.casenote);
					$("#nok_fname").html(item.nok_fname + ' ' + item.nok_lname);
					$("#nok_relationship").html(item.nok_relationship);
					$("#nok_email").html(item.nok_email);
					$("#nok_phone").html(item.nok_phone);
					$("#btn_udpated").attr("href", "newcust.php?id="+item.cid);
					$("#btn_book_app").attr("onclick", "book_c_appt("+item.cid+")");
					$("#btn_add_dep").attr("onclick", "add_new_dep("+item.cid+")");
				
					
					//Load Dependents Details
					$.get('api/Controllers/Customers_RestController.php?view=get_dependents&id='+item.cardno, function(data) {
						data = $.parseJSON(data);
						//console.log(data);
							
						var t = $("#tbl_dependents");
						$("#tbl_dependents tbody").empty();
							
						if(data.status != 0) {					
							$.each(data, function(i, item) {
								row = $('<tr></tr>');
								rowData = $('<td></td>').html('<a role="button" data-toggle="collapse" href=".depid'+item.dep_id+'">' + item.lname + " " + item.fname + '</a>');
								row.append(rowData);								
								rowData = $('<td></td>').text(item.gender);
								row.append(rowData);
								rowData = $('<td></td>').text(item.rship);
								row.append(rowData);
								rowData = $('<td></td>').text(item.phone);
								row.append(rowData);
								rowData = $('<td></td>').text(item.email);
								row.append(rowData);
									
								bookAppButton = $('<button></button>').addClass("btn btn-primary btn-xs details").html('<i class="fa fa-calendar-plus-o"></i> Book Appointment');
								//viewButton.attr('href', '#');
								bookAppButton.attr('data-toggle', 'tooltip');
								bookAppButton.attr('title', 'Book an Appointment for dependent');
								bookAppButton.attr('onclick', 'book_c_appt('+item.pri_id+', '+item.dep_id+')');
								rowData = $('<td></td>').append(bookAppButton);
									
								row.append(rowData);
									
								t.append(row);
								
								//Load Dependents Treatory
								uri = 'api/Controllers/Customers_RestController.php?view=dep_treatory_summary&id='+item.dep_id
				
								$.get(uri, function(datat) {
									datat = $.parseJSON(datat);
									
									header_row = $('<tr></tr>').addClass('panel-collapse collapse info');
									header_row.addClass('depid' + item.dep_id);
									hRowData = $('<td colspan="6"></td>').html("<i>Treatment History</i>");
									header_row.append(hRowData);
									
									titleRow = $('<tr></tr>').addClass('panel-collapse collapse active');
									titleRow.addClass('depid' + item.dep_id);
									
									tRowData = $('<td></td>').html('<strong>Date</strong>');
									titleRow.append(tRowData);
									
									tRowData = $('<td colspan="2"></td>').html('<strong>Prescription</strong>');
									titleRow.append(tRowData);
									
									tRowData = $('<td></td>').html('<strong>Plan</strong>');
									titleRow.append(tRowData);
									
									tRowData = $('<td></td>').html('<strong>Diagnosis</strong>');
									titleRow.append(tRowData);
									
									tRowData = $('<td></td>').html('<strong>Comments</strong>');
									titleRow.append(tRowData);
									
									t.append(header_row);
									t.append(titleRow);
										
									if(datat.status != 0) {					
										$.each(datat, function(i, itemt) {		
											var app_date = itemt.date_created.split(" "); 
											row = $('<tr></tr>').addClass('panel-collapse collapse');
											row.addClass('depid' + item.dep_id)
											
											viewButton = $('<a></a>').addClass("btn btn-primary btn-xs doctor-only").text(app_date[0]);
											//viewButton.attr('data-toggle', 'modal');
											//viewButton.attr('data-target', '#history_details');
											//viewButton.attr('data-tid', itemt.treatory_id);
											viewButton.attr('href', 'history.php?id='+itemt.customer_id+'&h='+itemt.treatory_id+'&a='+0+'&dep='+item.dep_id);
											rowData = $('<td></td>').append(viewButton);
												
											row.append(rowData);
											
											rowData = $('<td colspan="2"></td>').text(itemt.prescription);
											row.append(rowData);
											
											rowData = $('<td></td>').text(itemt.plan);
											row.append(rowData);
											
											rowData = $('<td></td>').text(itemt.diagonis);
											row.append(rowData);
											
											rowData = $('<td></td>').text(itemt.comments);
											row.append(rowData);
												
											t.append(row);
										});
									}
								});
							});
						}
						else {
							$("#tbl_dependents tbody").html(data.msg);
						}
					});
				});
				
				
			});
			
			//Load Treatory
			$.get('api/Controllers/Customers_RestController.php?view=treatory_summary&id='+id, function(datat) {
				datat = $.parseJSON(datat);
				//console.log(datat);
				var tt = $("#tbl_treatory2");
				$("#tbl_treatory2 tbody").empty();
					
				if(datat.status != 0) {					
					$.each(datat, function(i, itemt) {		
						var app_date = itemt.date_created.split(" "); 
						//app_date = app_date[0]
						
						row = $('<tr></tr>');
						rowData = $('<td></td>').text(app_date[0]);
						row.append(rowData);
						rowData = $('<td></td>').text(itemt.diagonis);
						row.append(rowData);
						rowData = $('<td></td>').text(itemt.prescription);
						row.append(rowData);
						rowData = $('<td></td>').text(itemt.comments);
						row.append(rowData);
							
						viewButton = $('<a></a>').addClass("btn btn-primary btn-xs doctor-only").html('<i class="fa fa-info-circle"></i> View');
						//viewButton.attr('href', '#');
						//viewButton.attr('data-toggle', 'modal');
						//viewButton.attr('data-target', '#history_details');
						//viewButton.attr('data-tid', itemt.treatory_id);
						viewButton.attr('href', 'history.php?id='+itemt.customer_id+'&h='+itemt.treatory_id+'&a=0');
						rowData = $('<td></td>').append(viewButton);
							
						row.append(rowData);
							
						tt.append(row);
					});
				}
				else {
					$("#tbl_treatory2 tbody").html(datat.msg);
				}
			});
			
			//Load Appointment History
			$.get('api/Controllers/Customers_RestController.php?view=get_customer_appointments&id='+id, function(datat) {
				datat = $.parseJSON(datat);
				//console.log(datat);
				var tt = $("#tbl_appistory");
				$("#tbl_appistory tbody").empty();
					
				if(datat.status != 0) {					
					$.each(datat, function(i, itemt) {		
						row = $('<tr></tr>');
						rowData = $('<td></td>').text(itemt.date);
						row.append(rowData);
						rowData = $('<td></td>').text(itemt.branch);
						row.append(rowData);
						var app_status = itemt.status;
						var t_date = new Date();
						t_date.setHours(0,0,0,0);
						var idate = new Date(itemt.date) ;
						idate.setHours(0,0,0,0);
						//console.log(t_date + " :: " + idate);
						//alert(idate - t_date);
						if(itemt.status == 'New' && idate < t_date)
							app_status = 'Missed';
						if(itemt.status == 'Open' && idate < t_date)
							app_status = 'Missed';
						
						rowData = $('<td></td>').html('<div class="badge" '+(app_status == 'New'? ' style="background-color: green"': app_status == 'Closed'? ' style="background-color: #337ab7"': '')+'>' + app_status + "</div>");
						row.append(rowData);
						
						tt.append(row);
					});
				}
				else {
					$("#tbl_appistory tbody").html(datat.msg);
				}
			});
			
			
		}
		
		function view_summary() {
			$("#summary-list").removeClass("hidden");
			$("#details").addClass("hidden");
			$("#book_appointment").addClass("hidden");
			$("#add_new_dep").addClass("hidden");
			search();
		}
		
		function book_c_appt(id, dep_id) {
			$("#frm_book_appoitment").trigger("reset");
			$.get('api/Controllers/Customers_RestController.php?view=single&id='+id, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				//console.log(data);
				
				$.each(data, function(i, item) {
					$("#c_ba_id").val(id);
					$("#ccard").val(item.cardno);
					$("#cname").val(item.title + " " + item.fname + ' ' + item.lname);
					$('#cdate').val(new Date().toISOString().split('T')[0]);
					$('#cbranch').val(item.branch);
					$('#c_dep_id').val(dep_id);
					if(dep_id > 0){
						$.get('api/Controllers/Customers_RestController.php?view=get_dependents&id='+dep_id, function(data) {
							data = $.parseJSON(data);
							data = data[0];
							
							$("#cname").val(data.fname + " " + data.lname);
						});
						$('#cnotes').val('For a dependent')
					}
					$("#btn_back2view").attr("onclick", "view_details("+id+")");
				});
				
			});
			
			$("#summary-list").addClass("hidden");
			$("#details").addClass("hidden");
			$("#add_new_dep").addClass("hidden");
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
					'cnotes': $("#cnotes").val(),
					'cbranch': $("#cbranch").val(),
					'cdep_id': $("#c_dep_id").val()
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
	
		function add_new_dep(id) {
			$("#frm_book_appoitment").trigger("reset");
			$.get('api/Controllers/Customers_RestController.php?view=single&id='+id, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				
				$.each(data, function(i, item) {
					$("#pri_acct_id").val(id);
					$("#pri_cardno").val(item.cardno);
					$("#pri_acct_name").val(item.title + " " + item.fname + ' ' + item.lname);
					$("#btn_back2details").attr("onclick", "view_details("+id+")");
				});
				
			});
			
			$("#summary-list").addClass("hidden");
			$("#details").addClass("hidden");
			$("#book_appointment").addClass("hidden");
			$("#add_new_dep").removeClass("hidden");
		}
	
		$('#frm_new_dep').on('keyup keypress', function(e) {
		  var keyCode = e.keyCode || e.which;
		  if (keyCode === 13) { 
			e.preventDefault();
			return false;
		  }
		});
	
		$("#frm_new_dep").submit(function(e) { 
			$("#new_dep_icon").removeClass("fa-plus");
			$("#new_dep_icon").addClass("fa-spinner fa-pulse");
				
			e.preventDefault();
			
			$.ajax({
				url: 'api/Controllers/Customers_RestController.php?view=add_dependent',
				type: 'post',
				data : {
					'pri_id' : $("#pri_acct_id").val(),
					'primary': $("#pri_cardno").val(),
					'fname': $("#newdep_fname").val(),
					'lname': $("#newdep_lname").val(),
					'gender': $("#newdep_gender").val(),
					'rship': $("#newdep_relationship").val(),
					'email': $("#newdep_email").val(),
					'phone': $("#newdep_phone").val(),
				},
				success: function(data) {
				   //alert (data);
				   data = $.parseJSON(data);
				   if(data.status == 1){
						$("#new_dep_icon").removeClass("fa-spinner fa-pulse");
						$("#new_dep_icon").addClass("fa-plus");
						view_details($("#pri_acct_id").val());
						$("#loading_cus_txt").html(data.msg);
						$("#search_icon").removeClass("fa-search");
						$("#search_icon").addClass("fa-check");
						$("#loading_cus").removeClass("hidden");
				   }
				   else {
						$("#new_dep_icon").removeClass("fa-spinner fa-pulse");
						$("#new_dep_icon").addClass("fa-save");
						$("#book_appt_alert").removeClass("alert-info");
						$("#book_appt_alert").removeClass("alert-warning");
						$("#book_appt_alert").addClass("alert-danger");
						$("#loading_cus_txt").html(data.msg);
						$("#book_appt_alert").removeClass("hidden");
				   }
				}
			});
		});
	
		$('#history_details').on('show.bs.modal', function (event) {
			var button = $(event.relatedTarget) // Button that triggered the modal
			var th_id = button.data('tid') // Extract info from data-* attributes
			var name = button.data('dep') // Extract info from data-* attributes
			
			//console.log(th_id);
		  
			$.get('api/Controllers/Customers_RestController.php?view=treatory_detail&id='+th_id, function(data) {
				data = $.parseJSON(data);
				//console.log(data);
				if(data.status === undefined){
					$.each(data, function(i, item) {
						$('#h_chiefcomplain').html(item.complain); $('#h_pxohx').html(item.pxohx); $('#h_pxmhx').html(item.pxmhx); 
						$('#h_pxfohx').html(item.pxfohx); $('#h_pxfmhx').html(item.pxfmhx); $('#h_lee').html(item.lee);
						
						$('#h_va_unaided_r_far').html(item.va_unaided_r_far); $('#h_va_unaided_r_near').html(item.va_unaided_r_near);
						$('#h_va_unaided_l_far').html(item.va_unaided_l_far);$('#h_va_unaided_l_near').html(item.va_unaided_l_near);
						$('#h_va_aided_r_far').html(item.va_aided_r_far); $('#h_va_aided_r_near').html(item.va_aided_r_near); 
						$('#h_va_aided_l_far').html(item.va_aided_l_far); $('#h_va_aided_l_near').html(item.va_aided_l_near);
						$('#h_va_pinhole_r_far').html(item.va_pinhole_r_far); $('#h_va_pinhole_r_near').html(item.va_pinhole_r_near); 
						$('#h_va_pinhole_l_far').html(item.va_pinhole_l_far); $('#h_va_pinhole_l_near').html(item.va_pinhole_l_near);
						$('#h_va_far2_unaided_r').html(item.va_far2_unaided_r); $('#h_va_far2_unaided_l').html(item.va_far2_unaided_l);
						$('#h_va_far2_aided_r').html(item.va_far2_aided_r); $('#h_va_far2_aided_l').html(item.va_far2_aided_l);
						$('#h_va_far2_pinhole_r').html(item.va_far2_pinhole_r); $('#h_va_far2_pinhole_r').html(item.va_far2_pinhole_r);
						$('#h_va_far_nlp_r').html(item.va_far_nlp_r); $('#h_va_far_nlp_l').html(item.va_far_nlp_l); $('#h_va_far_lp_l').html(item.va_far_lp_l); $('#h_va_far_lp_r').html(item.va_far_lp_r);
						$('#h_old_spec_r').html(item.old_spec_r); $('#h_old_spec_l').html(item.old_spec_l); 
						$('#h_iop_r').html(item.iop_r); $('#h_iop_l').html(item.iop_l); $('#h_near').html(item.near); $('#h_ospadd_r').html(item.ospaddr); $('#h_ospadd_l').html(item.ospaddl);
					});
				}
			});
		})
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>
