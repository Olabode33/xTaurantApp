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
	}
?>