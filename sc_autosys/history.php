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
						<div class="" id="">
							<form action="#" class="form-horizontal" id="" >
								<div class="panel-group" id="">
									<!--Client History -->
									<div class="panel panel-primary">
										<div class="panel-heading" style="border-bottom: 1px solid #e3e3e3;">
											<h3 class="panel-title"><a data-toggle="collapse" href="#ch">Client History</a></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<h5 class="col-sm-2" style="font-weight:bold">Chief Complain:</h5> 
												<div class="col-sm-10">
													<p id="chiefcomplain" class="control-label" style="text-align:left"></p>
												</div>
											</div>	
												
											<div id="ch" class="panel-collapse collapse">
												<div class="form-group">
													<h5 class="col-sm-2" style="font-weight:bold">PxOHx:</h5> 
													<div class="col-sm-10">
														<p id="pxohx" class="control-label" style="text-align:left"></p>
													</div>
												</div>	
												
												<div class="form-group">
													<h5 class="col-sm-2" style="font-weight:bold">PxMHx:</h5> 
													<div class="col-sm-10">
														<p id="pxmhx" class="control-label" style="text-align:left"></p>
													</div>
												</div>	
												
												<div class="form-group">
													<h5 class="col-sm-2" style="font-weight:bold">PxFOHx:</h5> 
													<div class="col-sm-10">
														<p id="pxfohx" class="control-label" style="text-align:left"></p>
													</div>	
												</div>
												
												<div class="form-group">
													<h5 class="col-sm-2" style="font-weight:bold">PxFMHx:</h5> 
													<div class="col-sm-10">
														<p id="pxfmhx" class="control-label" style="text-align:left"></p>
													</div>	
												</div>
												
												<div class="form-group">
													<h5 class="col-sm-2" style="font-weight:bold">LEE:</h5> 
													<div class="col-sm-10">
														<p id="lee" class="control-label" style="text-align:left"></p>
													</div>	
												</div>
											</div>
											
											<a data-toggle="collapse" href="#ch" class="btn btn-primary pull-right moreinfo">View more</a>
										</div>
										
									</div>
									<!--Examination -->
									<div class="panel panel-primary">
										<div class="panel-heading" style="border-bottom: 1px solid #e3e3e3;">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#exam">Examination</a></h3>
										</div>
										<div class="panel-body">
											<!--Header 1-->
											<div class="row">
												<div class="col-sm-2"> </div>
												<div class="col-sm-3" style="font-weight:bold;"> Unaided </div>
												<div class="col-sm-4" style="font-weight:bold;"> Aided </div>
												<div class="col-sm-3" style="font-weight:bold;"> Pinhole </div>
											</div>
											<!--Header 2-->
											<div class="row">		
												<div class="col-sm-2" style="font-weight:bold;"><u>Visual Acuity</u></div>
												<div class="col-sm-3">
													<div class="row">
														<div class="col-sm-6" style="font-weight:bold;"> R </div>
														<div class="col-sm-6" style="font-weight:bold;"> L </div>
													</div>
												</div>
												
												<div class="col-sm-4"> 
													<div class="row">
														<div class="col-sm-6" style="font-weight:bold;"> R </div>
														<div class="col-sm-6" style="font-weight:bold;"> L </div>
													</div>				
												</div>
												
												<div class="col-sm-3">
													<div class="row">
														<div class="col-sm-6" style="font-weight:bold;"> R </div>
														<div class="col-sm-6" style="font-weight:bold;"> L </div>
													</div>
												</div>					
											</div>
											<!-- Far  -->
											<div class="row">
												<div class="">
													<label for="va" class="col-sm-2 control-label" style="text-align:left">Far</label>
													<!--Unaided-->
													<div class="col-sm-3">
														<div class="row">
															<div class="col-sm-6">
																<p id="va_far_unaided_r" class="control-label" style="text-align:left"></p>
															</div>
															<div class="col-sm-6">
																<p id="va_far_unaided_l" class="control-label" style="text-align:left"></p>									
															</div>
															
														</div>
													</div>
													
													<!--Aided-->
													<div class="col-sm-4">
														<div class="row">
															<div class="col-sm-6" >
																<p id="va_far_aided_r" class="control-label" style="text-align:left"></p>
															</div>
															<div class="col-sm-6" >
																<p id="va_far_aided_l" class="control-label" style="text-align:left"></p>							
															</div>
														</div>
													</div>
													
													<!--Pinhole-->
													<div class="col-sm-3">
														<div class="row">
															<div class="col-sm-6" >
																<p id="va_far_pinhole_r" class="control-label" style="text-align:left"></p>
															</div>
															<div class="col-sm-6">
																<p id="va_far_pinhole_l" class="control-label" style="text-align:left"></p>						
															</div>
														</div>
													</div>
													
												</div>
											</div>
											
											<!--Near -->
											<div class="row">
												<div class="">
													<label for="va" class="col-sm-2 control-label" style="text-align:left">Near</label>
													<!--Unaided-->
													<div class="col-sm-3">
														<div class="row">
															<div class="col-sm-12" style="padding-right: 0px;" >
																<p id="va_near_unaided_r" class="control-label" style="text-align:left"></p>
															</div>
														</div>
													</div>
													
													<!--Aided-->
													<div class="col-sm-4">
														<div class="row">
															<div class="col-sm-12" style="padding-right: 0px;" >
																<p id="va_near_aided_r" class="control-label" style="text-align:left"></p>
															</div>
														</div>
													</div>
													
													<!--Pinhole-->
													<div class="col-sm-3">
														<div class="row">
															<div class="col-sm-12" style="padding-right: 20px;" >
																<p id="va_near_pinhole_r" class="control-label" style="text-align:left"></p>
															</div>
														</div>
													</div>
													
												</div>
											</div>
											<div id="exam" class="panel-collapse collapse">
												<!-- OSP -->
												<div class="row">
													<div class="">
														<label for="va" class="col-sm-2 control-label" style="text-align:left">Old Spec Pres:</label>
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6">
																	<p id="ospr" class="control-label" style="text-align:left"></p>
																</div>
																<div class="col-sm-6">
																	<p id="ospl" class="control-label" style="text-align:left"></p>							
																</div>
															</div>
														</div>
														
														<div class="col-sm-4">
														</div>
														
														<div class="col-sm-3">
															<div class="row">
																<label for="va" class="col-sm-3 control-label">Near</label>
																<div class="col-sm-9" style="padding-right:20px">
																	<p id="ospn" class="control-label" style="text-align:left"></p>
																</div>
															</div>
														</div>	
													</div>
												</div>
												<!-- OSP ADD-->
												<div class="row">
													<div class="">
														<label for="va" class="col-sm-2 control-label" style="text-align:left">ADD</label>
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-12">
																	<p id="ospaddr" class="control-label" style="text-align:left"></p>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- IOP -->
												<div class="row">
													<div class="">
														<label for="va" class="col-sm-2 control-label" style="text-align:left">IOP:</label>													
														<div class="col-sm-3">
															<div class="row">
																<div class="col-sm-6">
																	<p id="iopr" class="control-label" style="text-align:left"></p>
																</div>												
																<div class="col-sm-6">
																	<p id="iopl" class="control-label" style="text-align:left"></p>
																</div>
															</div>
														</div>
														
														<label for="iop" class="col-sm-3 control-label" style="text-align: left; margin-left: -20px;">mmHg</label>
														
														<div class="col-sm-3"> 
															<p id="tim" class="control-label" style="text-align:left"></p>
														</div>
													</div>
												</div>
											</div>
										
											<a data-toggle="collapse" href="#exam" class="btn btn-primary pull-right moreinfo">View more</a>
										</div>
									</div>						
									<!-- REFRACTION -->
									<div class="panel panel-primary">
										<div class="panel-heading" style="border-bottom: 1px solid #e3e3e3;">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#rr">Refraction</a></h3>
										</div>
										<div class="panel-body">
											<div id="rr" class="panel-collapse collapse">
												<div class="row">
													<h5 class="col-sm-2" style="font-weight:bold"><u>AutoRef:</u></h5> 
													<h6 class="col-sm-5" style="font-weight:bold;">R</h6>
													<h6 class="col-sm-5" style="font-weight:bold;">L</h6> 
												</div>
												<div class="row">
													<div class="col-sm-2">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Sph Cyl x Axis</h6> 
														</div>
													</div>
													
													<div class="col-sm-5">
														<div class="">
															<p id="sph_cyl_x_axis_r" class="control-label" style="text-align:left"></p>
														</div>
													</div>
										
													<div class="col-sm-5">
														<div class="">
															<p id="sph_cyl_x_axis_l" class="control-label" style="text-align:left"></p>
														</div>
													</div>	
												</div>	

												<div class="row">
													<h5 class="col-sm-2" style="font-weight:bold"><u>Subjective:</u></h5> 
												</div>	
										
												<div class="row">
													<div class="col-sm-2">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">Sph Cyl x Axis</h6> 
														</div>
													</div>
												
													<div class="col-sm-5">
														<div class="">
															<p id="sub_sph_cyl_x_axis_r" class="control-label" style="text-align:left"></p>
														</div>
													</div>
													
													<div class="col-sm-5">
														<div class="">
															<p id="sub_sph_cyl_x_axis_l" class="control-label" style="text-align:left"></p>
														</div>
													</div>
												</div>
										
												<div class="row">
													<div class="col-sm-2">
														<div class="row">
															<h6 class="col-sm-12" style="font-weight:bold">VA</h6> 
														</div>
													</div>
													
													<div class="col-sm-5">
														<div class="">
															<p id="sub_va_r" class="control-label" style="text-align:left"></p>
														</div>
													</div>
																									
													<div class="col-sm-5">
														<div class="">
															<p id="sub_va_l" class="control-label" style="text-align:left"></p>
														</div>
													</div>								
												</div>
											</div>

											<div class="row">
												<h5 class="col-sm-2" style="font-weight:bold"><u>Final Balancing:</u></h5> 
											</div>	
									
											<div class="row">
												<div class="col-sm-2">
													<div class="row">
														<h6 class="col-sm-12" style="font-weight:bold">Sph Cyl x Axis</h6> 
													</div>
												</div>
											
												<div class="col-sm-5">
													<div class="">
														<p id="fb_sph_cyl_x_axis_r" class="control-label" style="text-align:left"></p>
													</div>
												</div>
											
												<div class="col-sm-5">
													<div class="">
														<p id="fb_sph_cyl_x_axis_l" class="control-label" style="text-align:left"></p>
													</div>
												</div>			
											</div>
									
											<div class="row">
												<div class="col-sm-2">
													<div class="row">
														<h6 class="col-sm-12" style="font-weight:bold">Add</h6> 
													</div>
												</div>
												
												<div class="col-sm-10">
													<div class="">
														<p id="fb_add_l" class="control-label" style="text-align:left"></p>
													</div>
												</div>		
											</div>
									
											<div class="row">
												<div class="col-sm-2">
													<div class="row">
														<h6 class="col-sm-12" style="font-weight:bold">VA</h6> 
													</div>
												</div>
											
												<div class="col-sm-10">
													<div class="">
														<p id="fb_va_l" class="control-label" style="text-align:left"></p>
													</div>	
												</div>					
											</div>
											
											<div class="row">
												<div class="col-sm-2">
													<div class="row">
														<h6 class="col-sm-12" style="font-weight:bold">Near</h6> 
													</div>
												</div>
											
												<div class="col-sm-10">
													<div class="">
														<p id="fb_near_new" class="control-label" style="text-align:left"></p>
													</div>
												</div>				
											</div>
											
										
											<a data-toggle="collapse" href="#rr" class="btn btn-primary pull-right moreinfo">View more</a>
										</div>
									</div> 
									<!-- External Examination -->
									<div class="panel panel-primary">
										<div class="panel-heading" style="border-bottom: 1px solid #e3e3e3;">
											<h3 class="panel-title">
												<a data-toggle="collapse" data-parent="#drspage" href="#ee">External Examination</a>
											</h3>
										</div>
										<div class="panel-body">
											<div id="ee" class="panel-collapse collapse">
												<div class="row">
													<h5 class="col-sm-2" style="font-weight:bold"></h5> 
													<h6 class="col-sm-5" style="font-weight:bold;">OD</h6>
													<h6 class="col-sm-5" style="font-weight:bold;">OS</h6> 
												</div>
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">LIDS</label>
													</div>
													<div class="col-sm-5">
														<p id="lids" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="lidsodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
																	
												<div class="form-group">
													<div class="col-sm-2">
													  <label class="control-label" style="text-align:left">CONJUNCTIVA</label>
													</div>
													<div class="col-sm-5">
														<p id="con" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="conodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">CORNEA</label>
													</div>
													<div class="col-sm-5">
														<p id="cornea" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="corneaodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>									
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">ANTERIOR CHAMBER</label>
													</div>
													<div class="col-sm-5">
														<p id="antc" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="antcodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">IRIS</label>
													</div>
													<div class="col-sm-5">
														<p id="iris" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="irisodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
													  <label class="control-label" style="text-align:left">PUPIL</label>
													 </div>
													<div class="col-sm-5">
														<p id="pupl" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="puplodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
												
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">LENS</label>
													 </div>
													<div class="col-sm-5">
														<p id="lens" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="lensodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">COLOUR VISION</label>
													</div>
													<div class="col-sm-5">
														<p id="colv" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="colvodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
												
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">OTHERS</label>
													</div>
													<div class="col-sm-5">
														<p id="oth" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="othodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
											</div>
											<a data-toggle="collapse" href="#ee" class="btn btn-primary pull-right moreinfo">View more</a>
										</div>
									</div>	
									<!-- Om/SLE -->
									<div class="panel panel-primary">
										<div class="panel-heading" style="border-bottom: 1px solid #e3e3e3;">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#omsle">Ophthalmoscopy / Slit Lamp Examination</a></h3>
										</div>
										
										<div class="panel-body">
											<div id="omsle" class="panel-collapse collapse">
												<div class="row">
													<h5 class="col-sm-2" style="font-weight:bold"></h5> 
													<h6 class="col-sm-5" style="font-weight:bold;">OD</h6>
													<h6 class="col-sm-5" style="font-weight:bold;">OS</h6> 
												</div>
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">VITREOUS</label>
													</div>
													<div class="col-sm-5">
														<p id="vitr" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="vitrodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">CHOROID</label>
													</div>
													<div class="col-sm-5">
														<p id="chor" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="chorodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">RETINA</label>
													</div>
													<div class="col-sm-5">
														<p id="ret" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="retodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">MACULAR</label>
													</div>
													<div class="col-sm-5">
														<p id="mac" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="macodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">DISC</label>
													</div>
													<div class="col-sm-5">
														<p id="disc" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="discodosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
										
												<div class="form-group">
													<div class="col-sm-2">
														<label class="control-label" style="text-align:left">OTHERS</label>
													</div>
													<div class="col-sm-5">
														<p id="oth1" class="control-label" style="text-align:left"></p>
													</div>
													<div class="col-sm-5">
														<p id="oth1odosou" class="control-label" style="text-align:left"></p>
													</div>
												</div>
											
											</div>
											
											<a data-toggle="collapse" href="#omsle" class="btn btn-primary pull-right moreinfo">View more</a>
										</div>
									</div>
									<!-- Diag, Plan & Pres -->
									<div class="panel panel-primary">
										<div class="panel-heading" style="border-bottom: 1px solid #e3e3e3;">
											<h3 class="panel-title"><a data-toggle="collapse" data-parent="#drspage" href="#dpp">Diagnosis, Plan & Prescription</a></h3>
										</div>
										<div class="panel-body">
											<div id="dpp" class="panel-collapse collapse in">
												<div class="form-group">
													<label class="col-sm-12">Prescription:</label> 
													<div class="col-sm-12">
														<p id="presc" class="control-label" style="text-align:left"></p>
													</div>
												</div>

												<div class="form-group">
													<label class="col-sm-12 ">Plan:</label> 
													<div class="col-sm-12">
														<p id="plan" class="control-label" style="text-align:left"></p>
													</div>
												</div>		

												<div class="form-group">
													<label class="col-sm-12">Diagnosis:</label> 
													<div class="col-sm-12">
														<p id="diag" class="control-label" style="text-align:left"></p>
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-sm-12 ">Comments/Notes:</label> 
													<div class="col-sm-12">
														<p id="comments" class="control-label" style="text-align:left"></p>
													</div>
												</div>	
								  
											</div>
										
											<a data-toggle="collapse" href="#dpp" class="btn btn-primary pull-right moreinfo">View less</a>
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
			
			$('.moreinfo').click(function(e){
				if($(this).text() == 'View more'){
					$(this).text('View less');
				}
				else {
					$(this).text('View more');
				}
			});
			
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
							$('#chiefcomplain').text(item.complain); $('#pxohx').text(item.pxohx); $('#pxmhx').text(item.pxmhx); 
							$('#pxfohx').text(item.pxfohx); $('#pxfmhx').text(item.pxfmhx); $('#lee').text(item.lee);
							//
							$('#va_far_unaided_r').text(item.va_unaided_r_far + '  ' + item.va_far2_unaided_r); $('#va_far_unaided_l').text(item.va_unaided_l_far + '  ' +item.va_far2_unaided_l);
							$('#va_far_aided_r').text(item.va_aided_r_far + '  ' + item.va_far2_aided_r); $('#va_far_aided_l').text(item.va_aided_l_far + '  ' + item.va_far2_aided_l); 
							$('#va_far_pinhole_r').text(item.va_pinhole_r_far + '  ' + item.va_far2_pinhole_r); $('#va_far_pinhole_l').text(item.va_pinhole_l_far + '  ' + item.va_far2_pinhole_l);
							//
							$('#va_near_unaided_r').text(item.va_unaided_r_near); $('#va_near_aided_r').text(item.va_aided_r_near); $('#va_near_pinhole_r').text(item.va_pinhole_r_near);
							//
							$('#ospr').text(item.old_spec_r); $('#ospl').text(item.old_spec_l); $('#ospn').text(item.near); $('#ospaddr').text(item.ospadd_r); 
							$('#iopr').text(item.iop_r); $('#iopl').text(item.iop_l); //$('#tim').text(item.va_pinhole_r_near);
							//
							$('#sph_cyl_x_axis_r').text(item.ar_sph_cyl_x_axis_r); $('#sph_cyl_x_axis_l').text(item.ar_sph_cyl_x_axis_l);
							$('#sub_sph_cyl_x_axis_r').text(item.sub_sph_cyl_x_axis_r); $('#sub_sph_cyl_x_axis_l').text(item.sub_sph_cyl_x_axis_l);
							$('#sub_va_r').text(item.sub_va_r); $('#sub_va_l').text(item.sub_va_l);
							$('#fb_sph_cyl_x_axis_r').text(item.fb_sph_cyl_x_axis_r); $('#fb_sph_cyl_x_axis_l').text(item.fb_sph_cyl_x_axix_l);
							$('#fb_add_l').text(item.fb_add_l); $('#fb_va_l').text(item.fb_va_l); $('#fb_near_new').text(item.fa_near);
							//
							$('#lids').text(item.lids); $('#lidsodosou').text(item.lidsodosou);
							$('#con').text(item.conjuctiva); $('#conodosou').text(item.conodosou);
							$('#cornea').text(item.cornea); $('#corneaodosou').text(item.corneaodosou);
							$('#antc').text(item.anterior_chamber); $('#antcodosou').text(item.antcodosou);
							$('#iris').text(item.iris); $('#irisodosou').text(item.irisodosou);
							$('#pupl').text(item.pupil); $('#puplodosou').text(item.puplodosou);
							$('#lens').text(item.lens); $('#lensodosou').text(item.lensodosou);
							$('#colv').text(item.colour_vision); $('#colvodosou').text(item.colvodosou);
							$('#oth').text(item.ee_others); $('#othodosou').text(item.othodosou);
							//
							$('#vitr').text(item.vitreous); $('#vitrodosou').text(item.vitrodosou);
							$('#chor').text(item.choroid); $('#chorodosou').text(item.chorodosou);
							$('#ret').text(item.retina); $('#retodosou').text(item.retodosou);
							$('#mac').text(item.macular); $('#macodosou').text(item.macodosou);
							$('#disc').text(item.disc); $('#discodosou').text(item.discodosou);
							$('#oth1').text(item.osle_others); $('#oth1odosou').text(item.oth1odosou);
							//
							$('#presc').text(item.prescription); $('#plan').text(item.plan); $('#comments').text(item.comments); $('#diag').text(item.diagonis);
						});
					}
				});
			}
		});
		
	</script>	
	<?php
		include "includes/footer_pages.php";
	?>