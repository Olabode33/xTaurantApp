	<?php
		include "includes/header_pages.php";
	?>
	
	<div class="row">
		<h4 class="col-sm-12" style="margin-top: 15px;">
			<i class="fa fa-user-md"></i> Treatment Details
			<hr style="margin-top: 10px; margin-bottom: 10px;">
		</h4>
		<div class="col-xs-12">
				<div class="alert alert-info hidden" role="alert" id="examine_alert">
					<i class="fa fa-info-circle"></i> 
					<span id="examine_msg"></span>
				</div>
				<div class="row">
					<div class="col-sm-4">
						<div class="panel panel-primary" >
							<div class="panel-heading ">
								<h3 class="panel-title">Background Info</h3>
							</div>
							<div class="panel-body">
								<div class="">
									<form action="#" class="form-horizontal" id="frm_cust_bio">
										<div class="form-group">
											<label for="cardno" class="col-sm-4 control-label">Card No.</label>
											<div class="col-sm-8">
												<input type="text" placeholder="" name="cardno" id="cardno" class="form-control" disabled>
											</div>
										</div>
										
										<div class="form-group">
											<label for="fullname" class="col-sm-4 control-label" id="lbl_title">Title</label>
											<div class="col-sm-8">
												<input type="text" placeholder="" name="title" id="title" class="form-control" disabled>
											</div>
										</div>
										
										<div class="form-group">
											<label for="fullname" class="col-sm-4 control-label" id="lbl_fname">Firstname</label>
											<div class="col-sm-8">
												<input type="text" placeholder="" name="fname" id="fname" class="form-control" disabled>
											</div>
										</div>
										
										<div class="form-group">
											<label for="fullname" class="col-sm-4 control-label" id="lbl_lname">Surname</label>
											<div class="col-sm-8">
												<input type="text" placeholder="" name="lname" id="lname" class="form-control" disabled>
											</div>
										</div>
										
										<div class="form-group">	
											<label for="gender" class="col-sm-4 control-label" id="lbl_gender">Gender</label>
											<div class="col-sm-8">
												<input type="text" placeholder="" name="gender" id="gender" class="form-control" disabled>
											</div>
										</div>
										
										<div class="form-group">	
											<label for="age" class="col-sm-4 control-label" id="lbl_age">Age</label>
											<div class="col-sm-8">
												<input type="number" placeholder="" name="age" id="age" class="form-control edit-cust" disabled>
											</div>
										</div>
									
										<div class="form-group">	
											<label for="occupation" class="col-sm-4 control-label" id="lbl_occp">Occupation</label>
											<div class="col-sm-8">
												<input type="text" placeholder="" name="occupation" id="occupation" class="form-control edit-cust" disabled>
											</div>
										</div>
										
										<div class="form-group">	
											<div class="col-sm-12">
												<a href="customers.php" class="btn btn-block btn-primary" id="btn_go_back" ><i class="fa fa-reply"></i> Go Back</a> 
											</div>
											<!--div class="col-sm-6">
												<button type="submit" class="btn btn-block btn-info sctheme" id="btn_save_cust"><i class="fa fa-save" id="btn_save_cust_icon"></i> Save</button> 
											</div-->
										</div>
										<div class="alert alert-info hidden" role="alert" id="is_dep">
											<i class="fa fa-info-circle"></i> 
											<span>This is a dependant</span>
										</div>
										
									</form>
								</div>
								
						 </div>
						</div>
					</div>
					<div class="col-sm-8">
						<!--Doctors form-->
						<div class="" id="doctor_form">
							<form action="#" class="form-horizontal" id="frm_doctors_input" >
								<div class="panel-group" id="drspage">
									<!--Client History -->
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#ch">Client History</a></h3>
										</div>
										<div id="ch" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="form-group">
													<h5 class="col-sm-3" style="font-weight:bold">Chief Complain:</h5> 
													<div class="col-sm-9">
														<textarea id="chiefcomplain" name="chiefcomplain" class="form-control"></textarea>
													</div>
												</div>	
											
												<div class="form-group">
													<h5 class="col-sm-3" style="font-weight:bold">PxOHx:</h5> 
													<div class="col-sm-9">
														<input type="text" id="pxohx" name="pxohx" class="form-control">
													</div>
												</div>	
												
												<div class="form-group">
													<h5 class="col-sm-3" style="font-weight:bold">PxMHx:</h5> 
													<div class="col-sm-9">
														<input type="text" id="pxmhx" name="pxmhx" class="form-control">
													</div>
												</div>	
												
												<div class="form-group">
													<h5 class="col-sm-3" style="font-weight:bold">PxFOHx:</h5> 
													<div class="col-sm-9">
														<input type="text" id="pxfohx" name="pxfohx" class="form-control">
													</div>	
												</div>
												
												<div class="form-group">
													<h5 class="col-sm-3" style="font-weight:bold">PxFMHx:</h5> 
													<div class="col-sm-9">
														<input type="text" id="pxfmhx" name="pxfmhx" class="form-control">
													</div>	
												</div>
												
												<div class="form-group">
													<h5 class="col-sm-3" style="font-weight:bold">LEE:</h5> 

													<div class="col-sm-9">
														<input type="text" id="lee" name="lee" class="form-control">
													</div>	
												</div>
											</div>
										</div>
										
									</div>
									<!--Examination -->
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#exam">Examination</a></h3>
										</div>
										<div id="exam" class="panel-collapse collapse">
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
													<div class="form-group">
														<label for="va" class="col-sm-3 control-label">Far</label>
														<!--Unaided-->
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6" style="padding-right: 0px;" >
																	<select class="form-control" name="va_far_unaided_r" id="va_far_unaided_r">
																		<option value=""></option>
																		<option value="NLP">NLP</option>
																		<option value="LP">LP</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>
																</div>
																<div class="col-sm-6" style="padding-left: 0px;">
																	<select class="form-control" name="va_far_unaided_l" id="va_far_unaided_l">
																		<option value=""></option>
																		<option value="NLP">NLP</option>
																		<option value="LP">LP</option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>									
																</div>
																
															</div>
														</div>
														
														<!--Aided-->
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6" style="padding-right: 0px;" >
																	<select class="form-control" name="va_far_aided_r" id="va_far_aided_r">
																		<option value=""></option>
																		<option value="NLP">NLP</option>
																		<option value="LP">LP</option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>
																</div>
																<div class="col-sm-6" style="padding-left: 0px;">
																	<select class="form-control" name="va_far_aided_l" id="va_far_aided_l">
																		<option value=""></option>
																		<option value="NLP">NLP</option>
																		<option value="LP">LP</option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>									
																</div>
															</div>
														</div>
														
														<!--Pinhole-->
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6" style="padding-right: 0px;" >
																	<select class="form-control" name="va_far_pinhole_r" id="va_far_pinhole_r">
																		<option value=""></option>
																		<option value="NLP">NLP</option>
																		<option value="LP">LP</option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>
																</div>
																<div class="col-sm-6" style="padding-left: 0px; padding-right:20px">
																	<select class="form-control" name="va_far_pinhole_l" id="va_far_pinhole_l">
																		<option value=""></option>
																		<option value="NLP">NLP</option>
																		<option value="LP">LP</option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>									
																</div>
															</div>
														</div>
														
													</div>
												</div>
												<!--Near -->
												<div class="row">
													<div class="form-group">
														<label for="va" class="col-sm-3 control-label">Near</label>
														<!--Unaided-->
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-12" style="padding-right: 0px;" >
																	<select class="form-control" name="va_near_unaided_r" id="va_near_unaided_r">
																		<option value=""></option>
																		<option value="N.5">N.5</option>
																		<option value="N.6">N.6</option>
																		<option value="N.8">N.8</option>
																		<option value="N.10">N.10</option>
																		<option value="N.12">N.12</option>
																		<option value="N.14">N.14</option>
																		<option value="N.18">N.18</option>
																		<option value="N.24">N.24</option>
																		<option value="N.36">N.36</option>
																		<option value="N.48">N.48</option>
																	</select>
																</div>
																<!--div class="col-sm-6" style="padding-left: 0px;">
																	<select class="form-control" name="va_near_unaided_l" id="va_near_unaided_l">
																		<option value=""></option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>									
																</div-->
																
															</div>
														</div>
														
														<!--Aided-->
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-12" style="padding-right: 0px;" >
																	<select class="form-control" name="va_near_aided_r" id="va_near_aided_r">
																		<option value=""></option>
																		<option value="N.5">N.5</option>
																		<option value="N.6">N.6</option>
																		<option value="N.8">N.8</option>
																		<option value="N.10">N.10</option>
																		<option value="N.12">N.12</option>
																		<option value="N.14">N.14</option>
																		<option value="N.18">N.18</option>
																		<option value="N.24">N.24</option>
																		<option value="N.36">N.36</option>
																		<option value="N.48">N.48</option>
																	</select>
																</div>
																<!--div class="col-sm-6" style="padding-left: 0px;">
																	<select class="form-control" name="va_near_aided_l" id="va_near_aided_l">
																		<option value=""></option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>									
																</div-->
															</div>
														</div>
														
														<!--Pinhole-->
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-12" style="padding-right: 20px;" >
																	<select class="form-control" name="va_near_pinhole_r" id="va_near_pinhole_r">
																		<option value=""></option>
																		<option value="N.5">N.5</option>
																		<option value="N.6">N.6</option>
																		<option value="N.8">N.8</option>
																		<option value="N.10">N.10</option>
																		<option value="N.12">N.12</option>
																		<option value="N.14">N.14</option>
																		<option value="N.18">N.18</option>
																		<option value="N.24">N.24</option>
																		<option value="N.36">N.36</option>
																		<option value="N.48">N.48</option>
																	</select>
																</div>
																<!--div class="col-sm-6" style="padding-left: 0px; padding-right:20px">
																	<select class="form-control" name="va_near_pinhole_l" id="va_near_pinhole_l">
																		<option value=""></option>
																		<option value="HM@6m">HM@6m</option>
																		<option value="CF@6m">CF@6m</option>
																		<option value="6/60">6/60</option>
																		<option value="6/36">6/36</option>
																		<option value="6/24">6/24</option>
																		<option value="6/18">6/18</option>
																		<option value="6/12">6/12</option>
																		<option value="6/9">6/9</option>
																		<option value="6/6">6/6</option>
																		<option value="6/5">6/5</option>
																		<option value="6/4">6/4</option>
																	</select>									
																</div-->
															</div>
														</div>
														
													</div>
												</div>
												
												<!-- OSP -->
												<div class="row">
													<div class="form-group">
														<label for="va" class="col-sm-3 control-label">Old Spec Pres:</label>
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6"  style="padding-right: 0px;" >
																	<input type="text" id="ospr" name="ospr" class="form-control">
																</div>
																<div class="col-sm-6"  style="padding-left: 0px;" >
																	<input type="text" id="opsl" name="ospl" class="form-control">								
																</div>
															</div>
														</div>
														
														<div class="col-sm-3">
														</div>
														
														<div class="col-sm-3">
															<div class="row">
																<label for="va" class="col-sm-3 control-label">Near</label>
																<div class="col-sm-9" style="padding-right:20px">
																	<input type="text" id="ospn" name="ospn" class="form-control">
																</div>
															</div>
														</div>	
													</div>
												</div>
												<!-- OSP ADD-->
												<div class="row">
													<div class="form-group">
														<label for="va" class="col-sm-3 control-label">ADD</label>
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6"  style="padding-right: 0px;" >
																	<input type="text" id="ospaddr" name="ospaddr" class="form-control">
																</div>
																<div class="col-sm-6"  style="padding-left: 0px;" >
																	<input type="text" id="opsaddl" name="ospaddl" class="form-control">								
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- IOP -->
												<div class="row">
													<div class="form-group">
														<label for="va" class="col-sm-3 control-label">IOP:</label>													
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6" style="padding-right: 0px;">
																	<input type="text" id="iop" name="iopr" class="form-control">
																</div>												
																<div class="col-sm-6" style="padding-left: 0px;">
																	<input type="text" id="iop" name="iopl" class="form-control">
																</div>
															</div>
														</div>
														
														<label for="iop" class="col-sm-3 control-label"></label>
														
														<div class="col-sm-3" style="padding-right:20px"> 
															<input type="time" class="form-control" id="tim"> 
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									
									<!-- REFRACTION -->
									<div class="panel panel-default panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#rr">Refraction</a></h3>
										</div>
										<div id="rr" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="row">
													<h5 class="col-sm-4" style="font-weight:bold">AutoRef:</h5> 
													<h6 class="col-sm-4" style="font-weight:bold; text-align:center">R</h6>
													<h6 class="col-sm-4" style="font-weight:bold; text-align:center">L</h6> 
												</div>
												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Sph Cyl x Axis</h6> 
														</div>
													</div>
													
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id="sph_cyl_x_axis_r" name="sph_cyl_x_axis_r" class="form-control">
														</div>
													</div>
										
													<div class="col-sm-4" style="padding-right:20px">
														<div class="form-group">
															<input type="text" id="sph_cyl_x_axis_l" name="sph_cyl_x_axis_l" class="form-control">
														</div>
													</div>	
												</div>	

												<div class="row">
													<h5 class="col-sm-4" style="font-weight:bold">Subjective:</h5> 
												</div>	
										
												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Sph Cyl x Axis</h6> 
														</div>
													</div>
												
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id="sub_sph_cyl_x_axis_r" name="sub_sph_cyl_x_axis_r" class="form-control">
														</div>
													</div>
													
													<div class="col-sm-4" style="padding-right:20px">
														<div class="form-group">
															<input type="text" id="sub_sph_cyl_x_axis_l" name="sub_sph_cyl_x_axis_l" class="form-control">
														</div>
													</div>
												</div>

												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Add</h6> 
														</div>
													</div>
												
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id="sub_add_r" name="sub_add_r" class="form-control">
														</div>
													</div>
										
													<div class="col-sm-4" style="padding-right:20px">
														<div class="form-group">
															<input type="text" id="sub_add_l" name="sub_add_l" class="form-control">
														</div>													
													</div>					
												</div>
										
												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">VA</h6> 
														</div>
													</div>
													
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id="sub_va_r" name="sub_va_r" class="form-control">
														</div>
													</div>
																									
													<div class="col-sm-4" style="padding-right:20px">
														<div class="form-group">
															<input type="text" id="sub_va_l" name="sub_va_l" class="form-control">
														</div>
													</div>								
												</div>

												<div class="row">
													<h5 class="col-sm-4" style="font-weight:bold">Final Balancing:</h5> 
												</div>	
										
												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Sph Cyl x Axis</h6> 
														</div>
													</div>
												
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id="fb_sph_cyl_x_axis_r" name="fb_sph_cyl_x_axis_r" class="form-control">
														</div>
													</div>
												
													<div class="col-sm-4" style="padding-right:20px">
														<div class="form-group">
															<input type="text" id="fb_sph_cyl_x_axis_l" name="fb_sph_cyl_x_axis_l" class="form-control">
														</div>
													</div>			
												</div>
										
												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Add</h6> 
														</div>
													</div>
													
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id="fb_add_r" name="fb_add_r" class="form-control">
														</div>
													</div>
													
													<div class="col-sm-4" style="padding-right:20px">
														<div class="form-group">
															<input type="text" id="fb_add_l" name="fb_add_l" class="form-control">
														</div>
													</div>		
												</div>
										
												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">VA</h6> 
														</div>
													</div>
												
													<div class="col-sm-4">
														<div class="form-group">
															<input type="text" id="fb_va_r" name="fb_va_r" class="form-control">
														</div>
													</div>
												
													<div class="col-sm-4" style="padding-right:20px">
														<div class="form-group">
															<input type="text" id="fb_va_l" name="fb_va_l" class="form-control">
														</div>	
													</div>					
												</div>
												
												<div class="row">
													<div class="col-sm-4">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Near</h6> 
														</div>
													</div>
												
													<div class="col-sm-8">
														<div class="form-group">
															<input type="text" id="fb_near_new" name="fb_near_new" class="form-control">
														</div>
													</div>				
												</div>
											
											</div>
										</div>
									</div> 
									<!-- External Examination -->
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#ee">External Examination</a></h3>
										</div>
										<div id="ee" class="panel-collapse collapse">
											<div class="panel-body">
									
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">LIDS</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="lids" name="lids" class="form-control">
													</div>
												</div>
																	
												<div class="form-group">
													<div class="col-sm-3">
													  <label class="control-label">CONJUNCTIVA</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="con" name="con" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">CORNEA</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="cornea" name="cornea" class="form-control">
													</div>
												</div>									
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">ANTERIOR CHAMBER</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="antc" name="antc" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">IRIS</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="iris" name="iris" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
													  <label class="control-label">PUPIL</label>
													 </div>
													<div class="col-sm-9">
													  <input type="text" id="pupl" name="pupl" class="form-control">
													</div>
												</div>
												
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">LENS</label>
													 </div>
													<div class="col-sm-9">
														<input type="text" id="lens" name="lens" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">COLOUR VISION</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="colv" name="colv" class="form-control">
													</div>
												</div>
												
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">OTHERS</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="oth" name="oth" class="form-control">
													</div>
												</div>
											</div>
										</div>
									</div>	
									<!-- Om/SLE -->
									<div class="panel panel-default panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#omsle">Ophthalmoscopy / Slit Lamp Examination</a></h3>
										</div>
										<div id="omsle" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">VITREOUS</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="vitr" name="vitr" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">CHOROID</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="chor" name="chor" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">RETINA</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="ret" name="ret" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">MACULAR</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="mac" name="mac" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">DISC</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="disc" name="disc" class="form-control">
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-3">
														<label class="control-label">OTHERS</label>
													</div>
													<div class="col-sm-9">
														<input type="text" id="oth1" name="oth1" class="form-control">
													</div>
												</div>
											
											</div>
										</div>
									</div>
									<!-- Diag, Plan & Pres -->
									<div class="panel panel-default panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#dpp">Diagnosis, Plan & Prescription</a></h3>
										</div>
										<div id="dpp" class="panel-collapse collapse">
											<div class="panel-body">
												<div class="form-group">
													<label class="col-sm-12">Prescription:</label> 
													<div class="col-sm-12">
														<textarea id="presc" name="presc" class="form-control"></textarea>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-12 ">Plan:</label> 
													<div class="col-sm-12">
														<textarea id="plan" name="plan" class="form-control"></textarea>
													</div>
												</div>		

												<div class="form-group">
													<label class="col-sm-12">Diagnosis:</label> 
													<div class="col-sm-12">
														<textarea type="text" id="diag" name="diag" class="form-control"></textarea>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-12 ">Comments/Notes:</label> 
													<div class="col-sm-12">
														<textarea id="comments" name="comments" class="form-control"></textarea>
													</div>
												</div>	
								  
											</div>
										</div>
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
			$(".form-control").attr("disabled", "true");
			var c_cid = location.search;
			c_cid = c_cid.split("=");
			c_depid = c_cid[4];
			a_id = c_cid[3];
			th_id = c_cid[2];
			c_cid = c_cid[1].split("&");
			c_cid = c_cid[0];
			th_id = th_id.split("&");
			th_id = th_id[0];
			a_id = 	a_id.split("&");
			a_id = 	a_id[0];
			//console.log(a_id);
			
			if(a_id > 0)
				$("#btn_go_back").attr("href", "dr_view.php?id="+c_cid+"a="+a_id+"&dep="+c_depid);
			
			if(c_cid != undefined){			
				//$("#frm_title").html("Edit User")
				$.get('api/Controllers/Customers_RestController.php?view=single&id='+c_cid, function(data) {
					data = $.parseJSON(data);
					//console.log(data);
					if(data.status === undefined){
						$.each(data, function(i, item) {			
							$("#cardno").val(item.cardno);
							$("#title").val(item.title);
							$("#fname").val(item.fname);
							$("#lname").val(item.lname);
							$("#gender").val(item.gender);
							$("#age").val(item.age);	
							$("#occupation").val(item.occupation);
							$("#btn_bk_appt").attr("onclick", "book_c_appt("+c_cid+")");
							$("#is_dep").addClass("hidden");
							
							$("#lbl_title").text("Title");
							$("#lbl_occp").text("Occupation");
							$("#lbl_fname").text("Firstname");
							$("#lbl_lname").text("Surname");
							$("#lbl_gender").text("Gender");
							$("#lbl_age").text("Age");
							
							if(c_depid > 0){
								$.get('api/Controllers/Customers_RestController.php?view=get_dependents&id='+c_depid, function(data) {
									data = $.parseJSON(data);
									//console.log(data);
									if(data.status === undefined){
										$.each(data, function(i, depitem) {			
											$("#cardno").val(item.cardno);
											$("#title").val(item.fname + ' ' + item.lname);
											$("#fname").val(depitem.fname);
											$("#lname").val(depitem.lname);
											$("#gender").val(depitem.gender);
											$("#age").val('-');	
											$("#occupation").val(depitem.rship);
											$("#btn_bk_appt").attr("onclick", "book_c_appt("+c_cid+")")
											$("#btn_edit_cust").addClass("hidden");
											$("#is_dep").removeClass("hidden");
											
											$("#lbl_title").text("Primary Account");
											$("#lbl_occp").text("Relationship");
											$("#lbl_fname").text("Dependent's Firstname");
											$("#lbl_lname").text("Dependent's Surname");
											$("#lbl_gender").text("Dependent's Gender");
											$("#lbl_age").text("-");
										});
									}
								});
							}
						});
					}
				});
			}
		
		
			if(th_id != undefined){
				$.get('api/Controllers/Customers_RestController.php?view=treatory_detail&id='+th_id, function(data) {
					data = $.parseJSON(data);
					if(data.status === undefined){
						$.each(data, function(i, item) {
							$('#chiefcomplain').val(item.complain); $('#pxohx').val(item.pxohx); $('#pxmhx').val(item.pxmhx); $('#pxfohx').val(item.pxfohx); $('#pxfmhx').val(item.pxfmhx); $('#lee').val(item.lee);
						});
					}
				});
			}
		});
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>