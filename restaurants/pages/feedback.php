<?php
	include_once 'app/cls-survey.php';
	include_once 'utility/utility.php';

	$util_obj = new Utility();
	$survey_obj = new Survey();

	$surveys = $survey_obj->getSurveys();
	 ///echo $surveys[0]['survey_id'];
	 
	 $s_index = 0;
	 if(isset($_GET['s']))
		 $s_index = $_GET['s']++;
	 
	 $seen = array();
	 $more = 'none';
	 if(isset($_GET['more'])){
		 $more = array();
		 $more = $_SESSION['seen'];
	 }		 
	 //echo $s_index;
	 
	 if(isset($_POST['q']) && $_POST['q'] == 'submit'){
		 $rows = $survey_obj->recordResponse();
		 
		 if($rows > 0){
			 // $_SESSION['feedback'] = '<div class="alert alert-dismissible alert-success">
																// <button type="button" class="close" data-dismiss="alert">&times;</button>
																// Response recorded.
															  // </div>';
				header('Location: index.php?a=message&m=feedback&ag='.$_POST['age'].'&gd='.$_POST['gender']);
				//echo '<script></script>';
		 }
		 else {
			 $_SESSION['feedback'] = '<div class="alert alert-dismissible alert-danger">
																<button type="button" class="close" data-dismiss="alert">&times;</button>
																Error recording response.
															  </div>';
				header('Location: index.php?a=survey');
		 }
	 }
	 
	$questions = $survey_obj->getQuestions($surveys);		
	echo '';
?>
<section class="section">
		<br>
		<div class="container">
			<div class="section-header">
				<h1 class="section-title wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="300ms">
					<a href="index.php?a=actions" class="btn btn-fab btn-primary"  data-toggle="tooltip" title="Go Back to Actions"><i class="fa fa-arrow-left"></i></a>
					Feedback
				</h1>
				<hr>
			</div>
			<div class="wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="400ms">
				
				<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'].'?a=feedback&s='.$s_index; ?>" method="post" enctype="application/x-www-form-urlencoded" name="form" id="form">
					<fieldset>
						<div class="form-group inline">
							<div class="col-sm-6 col-md-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="500ms">
								<h2 class="section-subtitle">Age</h2>
								<select id="age" name="age" class="form-control input-sm" style="font-size: 16px;">
									<option value="">- Select an Option -</option>
									<option value="1" <?php echo ((isset($_GET['ag']) && $_GET['ag'] == '1')?' selected ': '');?>><12</option>
									<option value="2" <?php echo ((isset($_GET['ag']) && $_GET['ag'] == '2')?' selected ': '');?>>13 - 19</option>
									<option value="3"<?php echo ((isset($_GET['ag']) && $_GET['ag'] == '3')?' selected ': '');?>>20 - 40</option>
									<option value="4"<?php echo ((isset($_GET['ag']) && $_GET['ag'] == '4')?' selected ': '');?>>41 - 58</option>
									<option value="5"<?php echo ((isset($_GET['ag']) && $_GET['ag'] == '5')?' selected ': '');?>>>59</option>
								</select>
							</div>
							<div class="hidden-xs hidden-sm col-md-4">
								&nbsp;
							</div>
							<div class="col-sm-6 col-md-4 wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="600ms">
								<h2 class="section-subtitle">Gender</h2>
								<div class="col-sm-6">
									<div class="radio radio-primary pull-right">
										<label style="font-size: 16px;">
											<input type="radio" value="M" name="gender" id="genderM" required="true" <?php echo ((isset($_GET['gd']) && $_GET['gd'] == 'M')?' checked ': '');?>> 
											<span class="circle"></span><span class="check"></span>
											<i class="fa fa-male"></i> Male
										</label>
									</div>
								</div>
								<div class="col-sm-6">
									<div class="radio radio-primary pull-right">
										<label style="font-size: 16px;">
											<input type="radio" value="F" name="gender"  id="genderF" required="true" <?php echo ((isset($_GET['gd']) && $_GET['gd'] == 'F')?' checked ': '');?> > 
											<span class="circle"></span><span class="check"></span>
											<i class="fa fa-female"></i> Female
										</label>
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<hr>
					<?php
						$count = 1;
						$delay = 700;
						foreach ($questions as $question){
							echo '<fieldset>';
										// <legend>&nbsp;';
										//	.$question['subgroup'];
							// echo '</legend>';
							array_push($seen, $question['question_id']);

								echo '<div class="form-group wow fadeInRight" data-wow-duration="1000ms" data-wow-delay="'.$delay.'ms">';
								echo '<h4 class="col-sm-10"><b>'.$question['question'].'</b></h4>
											<input type="hidden" name = "q'.$count.'_id" id = "q'.$count.'_id" value = "'.$question['question_id'].'">
											<div class="col-sm-10">';
												$opts = $survey_obj->getOptions($question['option_group']);
												//print_r($opts);
												if($question['option_group'] == 1 || $question['option_group'] == 5){
													echo '<div class="GF_contentContainer">
																<div class="GF_labelColumn">
																	<div class="GF_labelPlaceholder"></div>
																	<div class="GF_labelContainer">
																		<div class="GF_contentRangeLabel">
																			'.$opts['0']['opt'].'
																		</div>
																	</div>
																</div>';
													foreach($opts as $opt){
														//echo '<pre>';print_r($opt);echo '</pre>';
														echo '<label class="GF_contentColumn">
																	<div class="GF_contentLabel">'.$opt['opt_value'].'&nbsp;&nbsp;</div>
																	<div class="GF_contentInput">
																		<div class="radio radio-primary radio-inline">
																			<div class="radio radio-primary">
																				<label>
																					<input type="'.$question['type'].'" name="'.((isset($question['multiple']) && $question['multiple'] == 1)?'q'.$count.'_opt[]':'q'.$count.'_opt').'" value="'.$opt['opt_value'].'">
																					<span class="circle"></span><span class="check"></span>
																				</label>
																			</div>
																		</div>
																	</div>
																 </label>';
													}
													
													echo '	<div class="GF_labelColumn">
																	<div class="GF_labelPlaceholder"></div>
																	<div class="GF_labelContainer">
																		<div class="GF_contentRangeLabel">
																			'.$opts['4']['opt'].'
																		</div>
																	</div>
																</div>
															</div>';
												}
												else {
													foreach($opts as $opt){
														echo '<div class="'.$question['type'].'">
																	<div class="radio radio-primary">
																		<label>
																			<input type="'.$question['type'].'" name="'.((isset($question['multiple']) && $question['multiple'] == 1)?'q'.$count.'_opt[]':'q'.$count.'_opt').'" value="'.$opt['opt_value'].'">
																			<span class="circle"></span><span class="check"></span>
																			'.$opt['opt'].'
																		</label>
																	</div>
																 </div>';
													}
												}
								echo  	'</div>
										 </div>';
							
							echo '</fieldset><hr>';
							$count++;
							$delay += 200;
						}
						
						$_SESSION['seen'] = $seen;
					?>			
					
					<div class="form-group wow fadeInRight">
						<div class="col-sm-12">
							<span class="btn-bottom">
								<button type="reset" class="btn btn-default btn-flat btn-fab btn-block" <?php echo  isset($theme_color)?$theme_color:''  ?> data-toggle="tooltip" title="Clear"><i class="mdi-action-settings-backup-restore"></i></button>
								&nbsp;
								<button type="submit" class="btn  btn-primary btn-fab btn-block <?php echo isset($theme_color)?$theme_color:'' ; ?>" name="q" value="submit" data-toggle="tooltip" title="Submit"><i class="mdi-content-send"></i></button>
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
</section>	
<?php
//}
?>
