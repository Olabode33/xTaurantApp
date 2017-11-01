<?php
	session_start();

	Class Partner {
		private $db_obj;
		
		function __construct() {
			require_once '../config/dbconn.php';
			
			$this->db_obj = new DBConfig();
		}
		
		function add_partner() {
			$msg = array("status" => 0, "msg" => "Error adding partner");
			
			$name = $_POST['p_name'] ;
			$sname = $_POST['p_sname'];
			$type = $_POST['p_type'];
			$addr = $_POST['p_addr'];
			$area = $_POST['p_area'];
			$state = $_POST['p_state'];
			$email = $_POST['p_email'];
			$phoneno = $_POST['p_phone'];
			
			$sql = "INSERT INTO `sc_partners` (`ptrname`, `ptr_shortname`, `ptrtype`, `ptr_address`, `add_area`, `add_state`, `email`, `phoneno`)
					VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssss', $name, $sname, $type, $addr, $area, $state, $email, $phoneno);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Your record inserted successfully");
				}
				else {
					$msg = array("status" => 0, " msg" => "Error: <br>" . $sql ."<br>". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				
			}		
			
			return $msg;
		}
		
		function get_partner($id = 0, $type="all"){
			$partners = array("status" => 0, "msg" => "No Partners Found");
			
			$sql = "SELECT `ptrid`, `ptrname`, `ptr_shortname`, `ptrtype`, `ptr_address`, `add_area`, `add_state`, `email`, `phoneno`
						 FROM `sc_partners`";
						
			if($id != 0){
				$sql .= " WHERE ptrid = ?;";
			}
			if($type != "all"){
				$sql .= " WHERE ptrtype = ?;";
			}
			
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				
				if($id != 0)
					$stmt->bind_param('d', $id);
				
				if($type != "all")
					$stmt->bind_param('s', $type);
				
				$stmt->execute();
				$stmt->bind_result($p_id, $p_name, $p_sname, $p_type, $p_add, $p_area, $p_state, $p_email, $p_phone);
				
				while($stmt->fetch()){
					$result[] = array("p_id" => $p_id,
												"p_name" => $p_name,
												"p_sname" => $p_sname,
												"p_type" => $p_type,
												"p_addr" => $p_add,
												"p_area" => $p_area,
												"p_state" => $p_state,
												"p_email" => $p_email,
												"p_phone" => $p_phone);
				}
				
				if(isset($result))
					$partners = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $partners;
		}
		
		function update_partner($id) {
			$msg = array("status" => 0, "msg" => "Error adding user");
			
			$name = $_POST['p_name'] ;
			$sname = $_POST['p_sname'];
			$type = $_POST['p_type'];
			$addr = $_POST['p_addr'];
			$area = $_POST['p_area'];
			$state = $_POST['p_state'];
			$email = $_POST['p_email'];
			$phoneno = $_POST['p_phone'];
			
			$sql = "UPDATE `sc_partners` 
						SET `ptrname` = ?, 
							`ptr_shortname` = ?, 
							`ptrtype` = ?, 
							`ptr_address` = ?, 
							`add_area` = ?, 
							`add_state` = ?,
							`email` = ?,
							`phoneno` = ?
						WHERE `ptrid` = ?";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssssd', $name, $sname, $type, $addr, $area, $state, $email, $phoneno, $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Partner's record successfully updated");
				}
				else {
					$msg = array("status" => 0, " msg" => "Error: <br>" . $sql ."<br>". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				
			}		
			
			return $msg;
		}
		
		function delete_partner($id) {
			$msg = array("status" => 0, "msg" => "Error deleting partner");
			
			$sql = "DELETE FROM sc_partners 
						WHERE ptrid = ?;";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('d', $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Partner record successfully deleted");
				}
				else {
					$msg = array("status" => 0, " msg" => "Error: <br>" . $sql ."<br>". mysqli_error($conn)); 
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				
			}		
			
			return $msg;
		}
		
		function search_partner($q=""){
			$partners = array("status" => 0, "msg" => "No Partners Found");
			$q = '%'.$q.'%';
			
			$sql = "SELECT `ptrid`, `ptrname`, `ptr_shortname`, `ptrtype`, `ptr_address`, `add_area`, `add_state`, `email`, `phoneno`
					FROM `sc_partners`
					WHERE concat(ifnull(`ptrid`, ''), ' ', 
								 ifnull(`ptrname`, ''), ' ',
								 ifnull(`ptr_shortname`, ''), ' ',
								 ifnull(`ptrtype`, ''), ' ',
								 ifnull(`ptr_address`, ''), ' ',
								 ifnull(`add_area`, ''), ' ',
								 ifnull(`add_state`, ''), ' ',
								 ifnull(`email`, ''), ' ',
								 ifnull(`phoneno`, ''), ' '
								) LIKE ?
					LIMIT 0, 10";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('s', $q);
				$stmt->execute();
				$stmt->bind_result($p_id, $p_name, $p_sname, $p_type, $p_add, $p_area, $p_state, $p_email, $p_phone);
				
				while($stmt->fetch()){
					$result[] = array("p_id" => $p_id,
												"p_name" => $p_name,
												"p_sname" => $p_sname,
												"p_type" => $p_type,
												"p_addr" => $p_add,
												"p_area" => $p_area,
												"p_state" => $p_state,
												"p_email" => $p_email,
												"p_phone" => $p_phone);
				}
				
				if(isset($result))
					$partners = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $partners;
		}
		
	}	
?>
