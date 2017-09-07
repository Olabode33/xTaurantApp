<?php
	Class Customers {
		private $db_obj;
		
		function __construct() {
			require_once 'config/dbconn.php';
			
			$this->db_obj = new DBConfig();
		}
		
		function get_customers($id = 0) {
			$customers = array("status" => 0, "msg" => "No Customers found");
			
			$sql = "SELECT cid, title, surname, middlename, firstname, gender, cardno, enroleeid, phoneno1, phoneno2, email1, email2, rship_type, rship_account, dob, age, address, address_area, address_state, occupation, nok
						FROM sc_customers";
						
			if($id != 0)
				$sql .= " WHERE cid=?;";
			
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				
				if($id != 0)
					$stmt->bind_param('d', $id);
				
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
		
		function search_all($term) {
			$customers = array("status" => 0, "msg" => "No Results found");
			$term = '%'.$term.'%';
			
			$sql = "SELECT cid, title, surname, middlename, firstname, gender, cardno, enroleeid, phoneno1, phoneno2, email1, email2, rship_type, rship_account, dob, age, address, address_area, address_state, occupation, nok
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
												ifnull(rship_account, ''),  
												ifnull(dob, ''),  
												ifnull(age, ''),  
												ifnull(address, ''),  
												ifnull(address_area, ''),  
												ifnull(address_state, ''),  
												ifnull(occupation, ''),  
												ifnull(nok, '')
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
			$dob = $_POST["dob"];
			$age = $_POST["age"];
			$address = $_POST["address"];
			$area = $_POST["area"];
			$state = $_POST["state"];
			$occupation = $_POST["occupation"];
			$nok = $_POST["nok"];
			
			$sql = "INSERT INTO sc_customers (title, surname, middlename, firstname, gender, cardno, enroleeid, phoneno1, phoneno2, email1, email2, rship_type, rship_account, dob, age, address, address_area, address_state, occupation, nok)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?);";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssssssssssssssss', $title, 
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
																			  $dob,
																			  $age,
																			  $address,
																			  $area,
																			  $state,
																			  $occupation,
																			  $nok);
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
			$dob = $_POST["dob"];
			$age = $_POST["age"];
			$address = $_POST["address"];
			$area = $_POST["area"];
			$state = $_POST["state"];
			$occupation = $_POST["occupation"];
			$nok = $_POST["nok"];
			
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
							   dob = ?, 
							   age = ?, 
							   address = ?, 
							   address_area = ?, 
							   address_state = ?, 
							   occupation = ?, 
							   nok = ?
						WHERE cid = ?;";
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssssssssssssssssd', $title, 
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
																			  $dob,
																			  $age,
																			  $address,
																			  $area,
																			  $state,
																			  $occupation,
																			  $nok,
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
	}
?>