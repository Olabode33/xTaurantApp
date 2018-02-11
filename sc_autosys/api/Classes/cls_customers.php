<?php
	session_start();
	
	Class Customers {
		private $db_obj;
		
		function __construct() {
			require_once '../config/dbconn.php';
			
			$this->db_obj = new DBConfig();
		}
		
		function get_customers($id = 0) {
			$customers = array("status" => 0, "msg" => "No Customers found");
			
			$sql = "SELECT c.cid, ifnull(c.title, '-') title, ifnull(c.surname, '-') surname, ifnull(c.middlename, '') middlename, 
					ifnull(c.firstname, '') firstname, ifnull(c.gender, '-') gender, ifnull(c.cardno, '-') cardno, 
					ifnull(c.enroleeid, '-') enroleeid, ifnull(c.phoneno1, '-') phoneno1, ifnull(c.phoneno2, '') phoneno2, 
					ifnull(c.email1, '-') email1, ifnull(c.email2, '') email2, ifnull(c.rship_type, '') rship_type, 
					ifnull(c.rship_account, '-') rship_account, ifnull(c.dob, '') dob, ifnull(c.age, '-') age, 
					ifnull(c.address, '-') address, ifnull(c.address_area, '') address_area, ifnull(c.address_state, '') address_state,
					ifnull(c.occupation, '-') occupation, ifnull(c.dob_day, '-') dob_day, ifnull(c.dob_month, '-') dob_month, 
					ifnull(c.nok_fname, '-') nok_fname, ifnull(c.nok_lname, '-') nok_lname, ifnull(c.nok_email, '-') nok_email, 
					ifnull(c.nok_phone, '-') nok_phone, ifnull(c.nok_relationship, '-') nok_relationship, ifnull(ch.casenote, '-') casenote
				FROM sc_customers c
					left join sc_chistory ch on c.cid = ch.cid";
						
			if($id != 0)
				$sql .= " WHERE c.cid=?;";
			
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				
				if($id != 0)
					$stmt->bind_param('d', $id);
				
				$stmt->execute();
				$stmt->bind_result($cid, $title, $sname, $mname, $fname, $gender, $cardno, $enroleeid, $phone1, $phone2, $email1, $email2, $rship_type, $rship_acct, $dob, $age, $address, $area, $state, $occupation, 
												$dob_day, $dob_month, $nok_fname, $nok_lname, $nok_email, $nok_phone, $nok_relationship, $casenote);
				
				while($stmt->fetch()){
					$result[] = array("cid" => $cid,
												"title" => $title,
												"fname" => $fname,
												"mname" => $mname,
												"lname" => $sname,
												"gender" => $gender,
												"cardno" => $cardno,
												"enroleeid" => $enroleeid,
												"phone1" => $phone1,
												"phone2" => $phone2,
												"email1" => $email1,
												"email2" => $email2,
												"rship_type" => $rship_type,
												"rship_account" => $rship_acct,
												"dob" => $dob,
												"dob_day" => $dob_day,
												"dob_month" => $dob_month,
 												"age" => ((isset($dob) && $dob != '')?$this->get_age($dob):$age),
												"address" => $address,
												"address_area" => $area,
												"address_state" => $state,
												"occupation" => $occupation,
												"nok_fname" => $nok_fname, 
												"nok_lname" => $nok_lname, 
												"nok_email" => $nok_email, 
												"nok_phone" => $nok_phone, 
												"nok_relationship" => $nok_relationship, 
												"casenote" => $casenote);
				}
				
				if(isset($result))
					$customers = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $customers;
		}		
		
		function search_all($term) {
			$customers = array("status" => 0, "msg" => "No Results found");
			$term = '%'.$term.'%';
			
			$sql = "SELECT cid, title, surname, middlename, firstname, gender, cardno, enroleeid, phoneno1, phoneno2, email1, email2, rship_type, rship_account, dob, age, address, address_area, address_state, occupation, nok_fname
						FROM sc_customers
						WHERE concat(ifnull(cid, ''),  ' ',
												ifnull(title, ''),  ' ',
												ifnull(surname, ''), ' ',  
												ifnull(middlename, ''),  ' ', 
												ifnull(firstname, ''),  ' ',
												ifnull(gender, ''),  
												ifnull(cardno, ''),  
												ifnull(enroleeid, ''),  
												ifnull(phoneno1, ''),  
												ifnull(phoneno2, ''),  
												ifnull(email1, ''),  
												ifnull(email2, ''),  
												ifnull(rship_type, ''),  
												ifnull(rship_account, '') 
												
									) LIKE ?
						ORDER BY surname, firstname
						LIMIT 0, 10;";
									
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('s', $term);
				$stmt->execute();
				$stmt->bind_result($cid, $title, $sname, $mname, $fname, $gender, $cardno, $enroleeid, $phone1, $phone2, $email1, $email2, $rship_type, $rship_acct, $dob, $age, $address, $area, $state, $occupation, $nok);
				
				while($stmt->fetch()){
					$result[] = array("cid" => $cid,
												"title" => $title,
												"fname" => $fname,
												"mname" => $mname,
												"lname" => $sname,
												"gender" => $gender,
												"cardno" => $cardno,
												"enroleeid" => $enroleeid,
												"phone1" => $phone1,
												"phone2" => $phone2,
												"email1" => $email1,
												"email2" => $email2,
												"rship_type" => $rship_type,
												"rship_account" => $rship_acct,
												"dob" => $dob,
												"age" => $age,
												"address" => $address,
												"address_area" => $area,
												"address_state" => $state,
												"occupation" => $occupation,
												"nok" => $nok);
				}
				
				if(isset($result))
					$customers = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $customers;
		}
	
		function add_customer(){
			$_POST = array_map( 'stripslashes', $_POST );
			
			$title = strtoupper($_POST["title"]);
			$lname = strtoupper($_POST["lname"]); 
			$mname = strtoupper($_POST["mname"]);
			$fname = strtoupper($_POST["fname"]);
			$gender = strtoupper($_POST["gender"]);
			$cardno = strtoupper($_POST["cardno"]);
			$enroleeid = strtoupper($_POST["enroleeid"]);
			$phone1 = $_POST["phone1"];
			$phone2 = $_POST["phone2"];
			$email1 = strtolower($_POST["email1"]);
			$email2 = strtolower($_POST["email2"]);
			$rship_type = $_POST["rship_type"];
			$rship_account = $_POST["rship_account"];
			$dob_year = ((isset($_POST["age"]) && $_POST["age"] != '' && $_POST["age"] != ' ')?$this->get_year_of_birth_from_age($_POST["age"]):null);
			$dob_day = $_POST["dob_day"];
			$dob_month = $_POST["dob_month"];
			$age = $_POST["age"];
			$address = strtoupper($_POST["address"]);
			$area = strtoupper($_POST["area"]);
			$state = strtoupper($_POST["state"]);
			$occupation = strtoupper($_POST["occupation"]);
			$nok_fname = strtoupper($_POST["nok_fname"]);
			$nok_lname = strtoupper($_POST["nok_lname"]);
			$nok_email = strtolower($_POST["nok_email"]);
			$nok_phone = $_POST["nok_phone"];
			$nok_relationship = strtoupper($_POST["nok_rel"]);
			
			$sql = "INSERT INTO sc_customers (title, surname, middlename, firstname, gender, cardno, enroleeid, 
												phoneno1, phoneno2, email1, email2, 
												rship_type, rship_account, 
												dob_day, dob_month, dob, age, 
												address, address_area, address_state, occupation, 
												nok_fname, nok_lname, nok_phone, nok_email, nok_relationship)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssssssssssssssssssssss', $title, 
																			  $lname, 
																			  $mname,
																			  $fname, 
																			  $gender, 
																			  $cardno, 
																			  $enroleeid, 
																			  $phone1, 
																			  $phone2,
																			  $email1,
																			  $email2,
																			  $rship_type,
																			  $rship_account, 
																			  $dob_day,
																			  $dob_month,
																			  $dob_year,
																			  $age,
																			  $address,
																			  $area,
																			  $state,
																			  $occupation,
																			  $nok_fname,
																			  $nok_lname,
																			  $nok_phone,
																			  $nok_email,
																			  $nok_relationship);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Your record inserted successfully");
				}
				else {
					$msg = array("status" => 0, "msg" => "Error: " . $sql ."". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				$msg = array("status" => 0, "msg" => "Error: " . $e->message() . "");
			}		
			
			return array_filter($msg);
		}
		
		function update_customer($id){	
			$_POST = array_map( 'stripslashes', $_POST );
			
			$title = $_POST["title"];
			$lname = $_POST["lname"];
			$mname = $_POST["mname"];
			$fname = $_POST["fname"];
			$gender = $_POST["gender"];
			$cardno = $_POST["cardno"];
			$enroleeid = $_POST["cardno"];
			$phone1 = $_POST["phone1"];
			$phone2 = $_POST["phone2"];
			$email1 = $_POST["email1"];
			$email2 = $_POST["email2"];
			$rship_type = $_POST["rship_type"];
			$rship_account = $_POST["rship_account"];
			$dob_year = $this->get_year_of_birth_from_age($_POST["age"]);
			$dob_day = $_POST["dob_day"];
			$dob_month = $_POST["dob_month"];
			$age = $_POST["age"];
			$address = $_POST["address"];
			$area = $_POST["area"];
			$state = $_POST["state"];
			$occupation = $_POST["occupation"];
			$nok_fname = $_POST["nok_fname"];
			$nok_lname = $_POST["nok_lname"];
			$nok_phone = $_POST["nok_phone"];
			$nok_email = $_POST["nok_email"];
			$nok_relationship = $_POST["nok_rel"];
			
			$sql = "UPDATE sc_customers 
						SET title = ?, 
							   surname = ?, 
							   middlename = ?, 
							   firstname = ?, 
							   gender = ?, 
							   cardno = ?, 
							   enroleeid = ?, 
							   phoneno1 = ?, 
							   phoneno2 = ?, 
							   email1 = ?, 
							   email2 = ?, 
							   rship_type = ?, 
							   rship_account = ?, 
							   dob_day = ?,
							   dob_month = ?,
							   dob = ?,
							   age = ?, 
							   address = ?, 
							   address_area = ?, 
							   address_state = ?, 
							   occupation = ?, 
							   nok_fname = ?,
							   nok_lname = ?,
							   nok_phone = ?,
							   nok_email = ?,
							   nok_relationship = ?,
							   date_updated = now()
						WHERE cid = ?;";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssssssssssssssssssssssd', $title, 
																			  $lname, 
																			  $mname,
																			  $fname, 
																			  $gender, 
																			  $cardno, 
																			  $enroleeid, 
																			  $phone1, 
																			  $phone2,
																			  $email1,
																			  $email2,
																			  $rship_type,
																			  $rship_account, 
																			  $dob_day,
																			  $dob_month,
																			  $dob,
																			  $age,
																			  $address,
																			  $area,
																			  $state,
																			  $occupation,
																			  $nok_fname,
																			  $nok_lname,
																			  $nok_phone,
																			  $nok_email,
																			  $nok_relationship,
																			  $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Your record udpated successfully");
				}
				else {
					$msg = array("status" => 0, "msg" => "Error: " . $sql ."". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				$msg = array("status" => 0, "msg" => "Error: " . $e->message() . "");
			}		
			
			return array_filter($msg);
		}
	
		function update_customer_by_doctor($id){
			$_POST = array_map( 'stripslashes', $_POST );
			
			$age = $_POST["age"];
			$occupation = $_POST["occupation"];
			$dob_year = $this->get_year_of_birth_from_age($_POST["age"]);
			
			$sql = "UPDATE sc_customers 
						SET age = ?, 
							occupation = ?,
							dob
						WHERE cid = ?;";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sssd', $age,
										  $occupation,
										  $dob_year,
										  $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Your record udpated successfully");
				}
				else {
					$msg = array("status" => 0, "msg" => "Error: " . $sql ."". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				$msg = array("status" => 0, "msg" => "Error: " . $e->message() . "");
			}		
			
			return array_filter($msg);
		}
	
		function delete_customer($id) {
			$msg = array("status" => 1, "msg" => "Deleted "+ $id);
			
			return $msg;
		}
	
		function book_appointment(){
			$_POST = array_map( 'stripslashes', $_POST );
			
			$card_no = $_POST["ccard"];
			$date = $_POST["cdate"];
			$notes = $_POST["cnotes"];
			$branch = $_POST["cbranch"];
			$dep_id = isset($_POST['cdep_id']) ? $_POST['cdep_id'] : 0;
			$status = "New";
			//$branch = $_SESSION['sc_branch'];
			
			$sql = "INSERT INTO sc_appointments (customer_cardno, appointment_date, appointment_notes, appointment_status, appointment_branch, dep_id, date_created)
						VALUES (?, ?, ?, ?, ?, ?, now());";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sssssd', $card_no,
														 $date,
														 $notes,
														 $status,
														 $branch,
														 $dep_id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Appointment was booked successfully");
				}
				else {
					$msg = array("status" => 0, "msg" => "Error: " . $sql ."". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				$msg = array("status" => 0, "msg" => "Error: " . $e->message() . "");
			}		
			
			return array_filter($msg);
		}
		
		function get_appointment($id = 0, $fdate = '', $tdate = '') {
			$customers = array("status" => 0, "msg" => "No Customers found");
			
			$sql = "SELECT a.appointment_id, a.customer_cardno, a.appointment_date, a.appointment_notes, a.appointment_status, a.appointment_branch, a.date_created, 
					concat(c.title, ' ', c.surname, ' ', c.firstname) as 'fullname', c.cid,
					concat(d.fname, ' ', d.lname) as 'dep', ifnull(d.dep_id, 0) as 'dep_id'
						FROM sc_autosys_2.sc_appointments a
							LEFT JOIN sc_autosys_2.sc_customers c ON a.customer_cardno = c.cardno
							LEFT JOIN sc_autosys_2.sc_dependents d ON a.dep_id = d.dep_id
						WHERE appointment_branch = ? AND a.appointment_date = curdate()
						ORDER BY case when a.appointment_status = 'New' then 1
												  when a.appointment_status = 'Open' then 2
												  when a.appointment_status = 'Closed' then 3
												  else 4
										   end asc, a.appointment_date desc";
						
			if($id > 0)
				$sql = "SELECT a.appointment_id, a.customer_cardno, a.appointment_date, a.appointment_notes, a.appointment_status, a.appointment_branch, a.date_created, 
			concat(c.title, ' ', c.surname, ' ', c.firstname) as 'fullname', c.cid,
			concat(d.fname, ' ', d.lname) as 'dep', ifnull(d.dep_id, 0) as 'dep_id'
							FROM sc_autosys_2.sc_appointments a
								LEFT JOIN sc_autosys_2.sc_customers c ON a.customer_cardno = c.cardno
								LEFT JOIN sc_autosys_2.sc_dependents d ON a.dep_id = d.dep_id
							WHERE appointment_branch = ? AND a.appointment_id = ? AND a.appointment_date = curdate()
							ORDER BY case when a.appointment_status = 'New' then 1
													  when a.appointment_status = 'Open' then 2
													  when a.appointment_status = 'Closed' then 3
													  else 4
											   end asc, a.appointment_date desc";
										
										
			if($id == -1)
				$sql = "SELECT a.appointment_id, a.customer_cardno, a.appointment_date, a.appointment_notes, a.appointment_status, a.appointment_branch, a.date_created, 
						concat(c.title, ' ', c.surname, ' ', c.firstname) as 'fullname', c.cid,
						concat(d.fname, ' ', d.lname) as 'dep', ifnull(d.dep_id, 0) as 'dep_id'
							FROM sc_autosys_2.sc_appointments a
								LEFT JOIN sc_autosys_2.sc_customers c ON a.customer_cardno = c.cardno
								LEFT JOIN sc_autosys_2.sc_dependents d ON a.dep_id = d.dep_id
							WHERE appointment_branch = ? AND week(a.appointment_date) = week(curdate())
							ORDER BY case when a.appointment_status = 'New' then 1
													  when a.appointment_status = 'Open' then 2
													  when a.appointment_status = 'Closed' then 3
													  else 4
											   end asc, a.appointment_date desc";
											   
			if($id == -2)
				$sql = "SELECT a.appointment_id, a.customer_cardno, a.appointment_date, a.appointment_notes, a.appointment_status, a.appointment_branch, a.date_created, 
						concat(c.title, ' ', c.surname, ' ', c.firstname) as 'fullname', c.cid,
						concat(d.fname, ' ', d.lname) as 'dep', ifnull(d.dep_id, 0) as 'dep_id'
							FROM sc_autosys_2.sc_appointments a
								LEFT JOIN sc_autosys_2.sc_customers c ON a.customer_cardno = c.cardno
								LEFT JOIN sc_autosys_2.sc_dependents d ON a.dep_id = d.dep_id
							WHERE appointment_branch = ? AND month(a.appointment_date) = month(curdate())
							ORDER BY case when a.appointment_status = 'New' then 1
													  when a.appointment_status = 'Open' then 2
													  when a.appointment_status = 'Closed' then 3
													  else 4
											   end asc, a.appointment_date desc";
											   
			if($id == -3)
				$sql = "SELECT a.appointment_id, a.customer_cardno, a.appointment_date, a.appointment_notes, a.appointment_status, a.appointment_branch, a.date_created, 
						concat(c.title, ' ', c.surname, ' ', c.firstname) as 'fullname', c.cid,
						concat(d.fname, ' ', d.lname) as 'dep', ifnull(d.dep_id, 0) as 'dep_id'
							FROM sc_autosys_2.sc_appointments a
								LEFT JOIN sc_autosys_2.sc_customers c ON a.customer_cardno = c.cardno
								LEFT JOIN sc_autosys_2.sc_dependents d ON a.dep_id = d.dep_id
							WHERE appointment_branch = ? AND a.appointment_date > ? AND a.appointment_date < ?
							ORDER BY case when a.appointment_status = 'New' then 1
													  when a.appointment_status = 'Open' then 2
													  when a.appointment_status = 'Closed' then 3
													  else 4
											   end asc, a.appointment_date desc";
											   
			if($id == -4)
				$sql = "SELECT a.appointment_id, a.customer_cardno, a.appointment_date, a.appointment_notes, a.appointment_status, a.appointment_branch, a.date_created, 
						concat(c.title, ' ', c.surname, ' ', c.firstname) as 'fullname', c.cid,
						concat(d.fname, ' ', d.lname) as 'dep', ifnull(d.dep_id, 0) as 'dep_id'
							FROM sc_autosys_2.sc_appointments a
								LEFT JOIN sc_autosys_2.sc_customers c ON a.customer_cardno = c.cardno
								LEFT JOIN sc_autosys_2.sc_dependents d ON a.dep_id = d.dep_id
							WHERE c.cid = ?
							ORDER BY case when a.appointment_status = 'New' then 1
													  when a.appointment_status = 'Open' then 2
													  when a.appointment_status = 'Closed' then 3
													  else 4
											   end asc, a.appointment_date desc";
			
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				
				if($id > 0){
					$stmt->bind_param('sd',  $_SESSION['sc_branch_code'], $id);
				}
				elseif($id == -3)
					$stmt->bind_param('sss',  $_SESSION['sc_branch_code'], $fdate, $tdate);
				elseif($id == -4)
					$stmt->bind_param('s',  $fdate);
				else
					$stmt->bind_param('s',  $_SESSION['sc_branch_code']);
				
				$stmt->execute();
				$stmt->bind_result($id, $cardno, $date, $notes, $status, $branch, $date_created, $name, $cid, $dep, $dep_id);
				
				while($stmt->fetch()){
					$result[] = array("id" => $id,
												"cardno" => $cardno,
												"date" => $date,
												"notes" => $notes,
												"status" => $status,
												"branch" => $branch,
												"fname" => $name,
												"cid" => $cid,
												"dep" => $dep,
												"dep_id" => $dep_id
												);
				}
				
				if(isset($result))
					$customers = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $customers;
		}		
		
		function update_appointment_status($id, $status){			
			$sql = "UPDATE sc_appointments 
						SET appointment_status = ?
						WHERE appointment_id = ?";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sd', $status, $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Your record udpated successfully");
				}
				else {
					$msg = array("status" => 0, "msg" => "Error: " . $sql ."". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				$msg = array("status" => 0, "msg" => "Error: " . $e->message() . "");
			}		
			
			return array_filter($msg);
		}
		
		function doctors_examination(){
			//$_POST = array_map( 'stripslashes', $_POST );
			$ignore_param = '';
			
			$sql = "INSERT INTO `sc_diagnosis`
						(`complain`, `pxohx`, `pxmhx`, `pxfohx`, `pxfmhx`, `lee`, 
						 `va_unaided_r_far`, `va_unaided_r_near`, `va_unaided_l_far`, `va_unaided_l_near`, 
						 `va_aided_r_far`, `va_aided_r_near`, `va_aided_l_far`, `va_aided_l_near`, 
						 `va_pinhole_r_far`, `va_pinhole_r_near`, `va_pinhole_l_far`, `va_pinhole_l_near`,
						 `va_unaided_r_far2`, `va_unaided_l_far2`, 
						 `va_aided_r_far2`, `va_aided_l_far2`, 
						 `va_pinhole_r_far2`, `va_pinhole_l_far2`,
						 `va_far_nlp_r`, `va_far_nlp_l`, `va_far_lp_r`, `va_far_lp_l`,
						`old_spec_r`, `old_spec_l`, `iop_r`, `iop_l`, `near`, `ospadd_r`, `ospadd_l`,
						`ar_sph_cyl_x_axis_r`, `ar_sph_cyl_x_axis_l`, `sub_sph_cyl_x_axis_r`, `sub_sph_cyl_x_axis_l`, `sub_add_r`, `sub_add_l`, `sub_va_r`, `sub_va_l`,
						`fb_sph_cyl_x_axis_r`, `fb_sph_cyl_x_axix_l`, `fb_add_r`, `fb_add_l`, `fb_va_r`, `fb_va_l`, `fb_near`,
						`lids`, `conjuctiva`, `cornea`, `anterior_chamber`, `iris`, `pupil`, `lens`, `colour_vision`, `ee_others`,
						`lids_odosou`, `conjuctiva_odosou`, `cornea_odosou`, `anterior_chamber_odosou`, `iris_odosou`, `pupil_odosou`, `lens_odosou`, `colour_vision_odosou`, `ee_others_odosou`,
						`vitreous`, `choroid`, `retina`, `macular`, `disc`, `osle_others`,
						`vitreous_odosou`, `choroid_odosou`, `retina_odosou`, `macular_odosou`, `disc_odosou`, `osle_others_odosou`,
						`diagonis`, `plan`, `prescription`, `comments`, `customer_id`, `customer_cardno`, `dep_id`, `date_created`)
						VALUES
						(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,
						 ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, now());
				
			";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssssdsd', 
												$_POST['chiefcomplain'], $_POST['pxohx'], $_POST['pxmhx'], $_POST['pxfohx'], $_POST['pxfmhx'], $_POST['lee'],
												$_POST['va_far_unaided_r'], $_POST['va_near_unaided_r'], $_POST['va_far_unaided_l'], $ignore_param,
												$_POST['va_far_aided_r'], $_POST['va_near_aided_r'], $_POST['va_far_aided_l'], $ignore_param,
												$_POST['va_far_pinhole_r'], $_POST['va_near_pinhole_r'], $_POST['va_far_pinhole_l'], $ignore_param,
												$_POST['va_far2_unaided_r'], $_POST['va_far2_unaided_l'],
												$_POST['va_far2_aided_r'], $_POST['va_far2_aided_l'],
												$_POST['va_far2_pinhole_r'], $_POST['va_far2_pinhole_r'],
												$ignore_param, $ignore_param, $ignore_param, $ignore_param,
												$_POST['ospr'], $_POST['ospl'], $_POST['iopr'], $_POST['iopl'], $_POST['ospn'], $_POST['ospaddr'], $ignore_param,
												$_POST['sph_cyl_x_axis_r'], $_POST['sph_cyl_x_axis_l'], $_POST['sub_sph_cyl_x_axis_r'], $_POST['sub_sph_cyl_x_axis_l'], 
												$ignore_param, $ignore_param, 
												$_POST['sub_va_r'], $_POST['sub_va_l'],
												$_POST['fb_sph_cyl_x_axis_r'], $_POST['fb_sph_cyl_x_axis_l'], $ignore_param, $_POST['fb_add_l'], $ignore_param, $_POST['fb_va_l'], $_POST['fb_near_new'],
												$_POST['lids'], $_POST['con'], $_POST['cornea'], $_POST['antc'], $_POST['iris'], $_POST['pupl'], $_POST['lens'], $_POST['colv'], $_POST['oth'],
												$_POST['lidsodosou'], $_POST['conodosou'], $_POST['corneaodosou'], $_POST['antcodosou'], $_POST['irisodosou'], $_POST['puplodosou'], 
												$_POST['lensodosou'], $_POST['colvodosou'], $_POST['othodosou'],
												$_POST['vitr'], $_POST['chor'], $_POST['ret'], $_POST['mac'], $_POST['disc'], $_POST['oth1'], 
												$_POST['vitrodosou'], $_POST['chorodosou'], $_POST['retodosou'], $_POST['macodosou'], $_POST['discodosou'], $_POST['oth1odosou'], 
												$_POST['diag'], $_POST['plan'], $_POST['presc'], $_POST['comments'], 
												$_POST['cid'], $_POST['c_cardno'], $_POST['dep_id']);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Your record inserted successfully");
				}
				else {
					$msg = array("status" => 0, "msg" => "Error: " . $sql ."". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				$msg = array("status" => 0, "msg" => "Error: " . $e->message() . "");
			}		
			
			return array_filter($msg);
		}
	
		function add_dependant(){
			$_POST = array_map( 'stripslashes', $_POST );
			
			$lname = $_POST["lname"];
			$fname = $_POST["fname"];
			$gender = $_POST["gender"];
			$phone1 = $_POST["phone"];
			$email1 = $_POST["email"];
			$rship = $_POST["rship"];
			$primary_acct = $_POST["primary"];
			$primary_id = $_POST["pri_id"];
						
			$sql = "INSERT INTO sc_dependents (fname, lname, gender, relationship, phone, email, primary_acct, primary_cid, date_created)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, now());";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sssssssd', $fname,
											  $lname,
											  $gender,
											  $rship,
											  $phone1,
											  $email1,
											  $primary_acct,
											  $primary_id);
				
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Your record inserted successfully");
				}
				else {
					$msg = array("status" => 0, "msg" => "Error: " . $sql ."". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				$msg = array("status" => 0, "msg" => "Error: " . $e->message() . "");
			}		
			
			return array_filter($msg);
		}
		
		function get_dependents($id = 0) {
			$customers = array("status" => 0, "msg" => "No Dependents found");
			
			$sql = "SELECT dep_id, fname, lname, gender, relationship, phone, email, primary_acct, primary_cid, date_created
					FROM `sc_dependents`
					WHERE primary_acct = ?";
			
			if(is_numeric($id) && $id > 0)
				$sql = "SELECT dep_id, fname, lname, gender, relationship, phone, email, primary_acct, primary_cid, date_created
						FROM `sc_dependents`
						WHERE dep_id = ?";
			
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('s', $id);
				$stmt->execute();
				$stmt->bind_result($dep_id, $fname, $lname, $gender, $relationship, $phone, $email, $primary_acct, $primary_cid, $date_created);
				
				while($stmt->fetch()){
					$result[] = array("dep_id" => $dep_id, 
									  "fname" => $fname, 
									  "lname" => $lname, 
									  "gender" => $gender, 
									  "rship" => $relationship, 
									  "phone" => $phone, 
									  "email" => $email, 
									  "pri_acct" => $primary_acct, 
									  "pri_id" => $primary_cid, 
									  "date_created" => $date_created);
				}
				
				if(isset($result))
					$customers = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $customers;
		}		
		
		function get_treatory_summary($id = 0, $type = 'cus') {
			$customers = array("status" => 0, "msg" => "No Historical records found");
			
			$sql = "SELECT client_history_id, complain, `diagonis`, `plan`, `prescription`, `comments`, `customer_id`, `customer_cardno`, `dep_id`, `date_created`
					FROM `sc_diagnosis` ";
					
			if($type == 'dep'){
				$sql .= ' WHERE dep_id = ?';
			}
			else
				$sql .= ' WHERE customer_id = ? and dep_id = 0';
			
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('d', $id);
				$stmt->execute();
				$stmt->bind_result($treatory_id, $complain, $diagonis, $plan, $prescription, $comments, $customer_id, $customer_cardno, $dep_id, $date_created);
				
				while($stmt->fetch()){
					$result[] = array("treatory_id" => $treatory_id, 
									  "complain" => $complain, 
									  "diagonis" => $diagonis, 
									  "plan" => $plan, 
									  "prescription" => $prescription, 
									  "comments" => $comments, 
									  "customer_id" => $customer_id, 
									  "customer_cardno" => $customer_cardno, 
									  "dependant_id" => $dep_id,
									  "date_created" => $date_created);
				}
				
				if(isset($result))
					$customers = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $customers;
		}		
		
		function get_treatory_details($id = 0) {
			$customers = array("status" => 0, "msg" => "No Historical records found");
			
			$sql = "SELECT `complain`, `pxohx`, `pxmhx`, `pxfohx`, `pxfmhx`, `lee`, 
							 `va_unaided_r_far`, `va_unaided_r_near`, `va_unaided_l_far`, `va_unaided_l_near`, 
							 `va_aided_r_far`, `va_aided_r_near`, `va_aided_l_far`, `va_aided_l_near`, 
							 `va_pinhole_r_far`, `va_pinhole_r_near`, `va_pinhole_l_far`, `va_pinhole_l_near`,
							 `va_unaided_r_far2`, `va_unaided_l_far2`, 
							 `va_aided_r_far2`, `va_aided_l_far2`, 
							 `va_pinhole_r_far2`, `va_pinhole_l_far2`,
							 `va_far_nlp_r`, `va_far_nlp_r`, `va_far_lp_l`, `va_far_lp_r`,
							`old_spec_r`, `old_spec_l`, `iop_r`, `iop_l`, `near`, `ospadd_r`, `ospadd_l`,
							`ar_sph_cyl_x_axis_r`, `ar_sph_cyl_x_axis_l`, `sub_sph_cyl_x_axis_r`, `sub_sph_cyl_x_axis_l`, `sub_add_r`, `sub_add_l`, `sub_va_r`, `sub_va_l`,
							`fb_sph_cyl_x_axis_r`, `fb_sph_cyl_x_axix_l`, `fb_add_r`, `fb_add_l`, `fb_va_r`, `fb_va_l`, `fb_near`,
							`lids`, `conjuctiva`, `cornea`, `anterior_chamber`, `iris`, `pupil`, `lens`, `colour_vision`, `ee_others`,
							`lids_odosou`, `conjuctiva_odosou`, `cornea_odosou`, `anterior_chamber_odosou`, `iris_odosou`, `pupil_odosou`, `lens_odosou`, `colour_vision_odosou`, `ee_others_odosou`,
							`vitreous`, `choroid`, `retina`, `macular`, `disc`, `osle_others`,
							`vitreous_odosou`, `choroid_odosou`, `retina_odosou`, `macular_odosou`, `disc_odosou`, `osle_others_odosou`,
							`diagonis`, `plan`, `prescription`, `comments`, `customer_id`, `customer_cardno`, `dep_id`, `date_created`
					FROM `sc_diagnosis`
					WHERE client_history_id = ?";
			
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('s', $id);
				$stmt->execute();
				$stmt->bind_result($complain, $pxohx, $pxmhx, $pxfohx, $pxfmhx, $lee, 
								   $va_unaided_r_far, $va_unaided_r_near, $va_unaided_l_far, $va_unaided_l_near, 
								   $va_aided_r_far, $va_aided_r_near, $va_aided_l_far, $va_aided_l_near, 
								   $va_pinhole_r_far, $va_pinhole_r_near, $va_pinhole_l_far, $va_pinhole_l_near,
								   $va_far2_unaided_r, $va_far2_unaided_l,
								   $va_far2_aided_r, $va_far2_aided_l,
								   $va_far2_pinhole_r, $va_far2_pinhole_l,
								   $va_far_nlp_r, $va_far_nlp_l, $va_far_lp_r, $va_far_lp_l,
								   $old_spec_r, $old_spec_l, $iop_r, $iop_l, $near, $ospaddr, $ospaddl,
								   $ar_sph_cyl_x_axis_r, $ar_sph_cyl_x_axis_l, $sub_sph_cyl_x_axis_r, $sub_sph_cyl_x_axis_l, $sub_add_r, $sub_add_l, $sub_va_r, $sub_va_l,
								   $fb_sph_cyl_x_axis_r, $fb_sph_cyl_x_axix_l, $fb_add_r, $fb_add_l, $fb_va_r, $fb_va_l, $fa_near,
								   $lids, $conjuctiva, $cornea, $anterior_chamber, $iris, $pupil, $lens, $colour_vision, $ee_others,
								   $lidsodosou, $conodosou, $corneaodosou, $antcodosou, $irisodosou, $puplodosou, $lensodosou, $colvodosou, $othodosou,
								   $vitreous, $choroid, $retina, $macular, $disc, $osle_others,
								   $vitrodosou, $chorodosou, $retodosou, $macodosou, $discodosou, $oth1odosou,
								   $diagonis, $plan, $prescription, $comments, $customer_id, $customer_cardno, $dep_id, $date_created);
				
				while($stmt->fetch()){
					$result[] = array('complain' => $complain, 'pxohx' => $pxohx, 'pxmhx' => $pxmhx, 'pxfohx' => $pxfohx, 'pxfmhx' => $pxfmhx, 'lee' => $lee, 
									  'va_unaided_r_far' => $va_unaided_r_far, 'va_unaided_r_near' => $va_unaided_r_near, 'va_unaided_l_far' => $va_unaided_l_far, 'va_unaided_l_near' => $va_unaided_l_near, 
									  'va_aided_r_far' => $va_aided_r_far, 'va_aided_r_near' => $va_aided_r_near, 'va_aided_l_far' => $va_aided_l_far, 'va_aided_l_near' => $va_aided_l_near, 
									  'va_pinhole_r_far' => $va_pinhole_r_far, 'va_pinhole_r_near' => $va_pinhole_r_near, 'va_pinhole_l_far' => $va_pinhole_l_far, 'va_pinhole_l_near' => $va_pinhole_l_near,
									  'va_far2_unaided_r' => $va_far2_unaided_r, 'va_far2_unaided_l' => $va_far2_unaided_l,
									  'va_far2_aided_r' => $va_far2_aided_r, 'va_far2_aided_l' => $va_far2_aided_l,
									  'va_far2_pinhole_r' => $va_far2_pinhole_r, 'va_far2_pinhole_l' => $va_far2_pinhole_l,
									  'va_far_nlp_r' => $va_far_nlp_r, 'va_far_nlp_l' => $va_far_nlp_l, 'va_far_lp_l' => $va_far_lp_l, 'va_far_lp_r' => $va_far_lp_r,
									  'old_spec_r' => $old_spec_r, 'old_spec_l' => $old_spec_l, 'iop_r' => $iop_r, 'iop_l' => $iop_l, 'near' => $near, 'ospadd_r' => $ospaddr, 'ospadd_l' => $ospaddl,
									  'ar_sph_cyl_x_axis_r' => $ar_sph_cyl_x_axis_r, 'ar_sph_cyl_x_axis_l' => $ar_sph_cyl_x_axis_l, 'sub_sph_cyl_x_axis_r' => $sub_sph_cyl_x_axis_r, 
									  'sub_sph_cyl_x_axis_l' => $sub_sph_cyl_x_axis_l, 'sub_add_r' => $sub_add_r, 'sub_add_l' => $sub_add_l, 'sub_va_r' => $sub_va_r, 'sub_va_l' => $sub_va_l,
									  'fb_sph_cyl_x_axis_r' => $fb_sph_cyl_x_axis_r, 'fb_sph_cyl_x_axix_l' => $fb_sph_cyl_x_axix_l, 'fb_add_r' => $fb_add_r, 'fb_add_l' => $fb_add_l, 'fb_va_r' => $fb_va_r, 'fb_va_l' => $fb_va_l, 'fa_near' => $fa_near,
									  'lids' => $lids, 'conjuctiva' => $conjuctiva, 'cornea' => $cornea, 'anterior_chamber' => $anterior_chamber, 'iris' => $iris, 'pupil' => $pupil, 'lens' => $lens, 'colour_vision' => $colour_vision, 'ee_others' => $ee_others,
									  'lidsodosou' => $lidsodosou, 'conodosou' => $conodosou, 'corneaodosou' => $corneaodosou, 'antcodosou' => $antcodosou, 'irisodosou' => $irisodosou, 
									  'puplodosou' => $puplodosou, 'lensodosou' => $lensodosou, 'colvodosou' => $colvodosou, 'othodosou' => $othodosou,
									  'vitreous' => $vitreous, 'choroid' => $choroid, 'retina' => $retina, 'macular' => $macular, 'disc' => $disc, 'osle_others' => $osle_others,
									  'vitrodosou' => $vitrodosou, 'chorodosou' => $chorodosou, 'retodosou' => $retodosou, 'macodosou' => $macodosou, 'discodosou' => $discodosou, 'oth1odosou' => $oth1odosou,
									  'diagonis' => $diagonis, 'plan' => $plan, 'prescription' => $prescription, 'comments' => $comments, 'customer_id' => $customer_id, 'customer_cardno' => $customer_cardno, 'dependant_id' => $dep_id,
									  'date_created' => $date_created);
				}
				
				if(isset($result))
					$customers = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $customers;
		}		
		
		function generate_cardno(){
			$cardno = array("status" => 0, "msg" => "No Dependents found");
			
			$sn = 000;
			$branch = $_SESSION['sc_branch_code'];
			$year = date('Y');
			
			$sn_array = array();
			
			//Get serial number
			$sql_sn = "Select cardno from sc_customers where cardno like '%".$year."%'; ";
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql_sn);
				$stmt->execute();
				$stmt->bind_result($card_no);
				
				while($stmt->fetch()){
					//echo $card_no ."\n";
					$card_no_array = explode("/", $card_no);
					//echo $card_no_array[0] ."\n";
					if($card_no_array[1] == $branch)
						array_push($sn_array, $card_no_array[0]);
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				
			}
			
			//print_r($sn_array);
			
			if(count($sn_array) > 0)
				$sn = max($sn_array);
			else
				$sn = 0;
			
			$sn = (int)$sn + 1;
			
			if(strlen($sn) == 1)
				$sn = '00'.$sn;
			elseif(strlen($sn) == 2)
				$sn = '0'.$sn;
			
			$card_no = $sn . '/' . $branch . '/' . $year;
			
			return $card_no;
		}
	
		private function get_year_of_birth_from_age($age){
			$birth_year = 0;
			$cur_year = date('Y');			
			
			if(isset($age) & is_int($age)){
				$birth_year = $cur_year - $age;
			}
			else{
				$birth_year = null;
			}
			
			return $birth_year;
		}
		
		private function get_age($birth_year){
			$age = 0;
			$cur_year = date('Y');
			$birth_year = (int)$birth_year;
			
			if(isset($birth_year) || $birth_year != ''){
				$age = $cur_year - $birth_year;
			}
			else
				$age = NULL;
			
			return $age;
		}
	}
?>
