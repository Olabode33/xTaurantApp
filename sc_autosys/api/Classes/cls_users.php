<?php
	session_start();

	Class User {
		private $db_obj;
		
		function __construct() {
			require_once '../config/dbconn.php';
			
			$this->db_obj = new DBConfig();
		}
		
		function add_user() {
			$msg = array("status" => 0, "msg" => "Error adding user");
			
			$title = $_POST['title'] ;
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$role = $_POST['role'];
			$username = $_POST['uname'];
			$password = $this->encrypt_pass($_POST['pass']);
			$branch = $_POST['branch'];
			$status = 'New';
			
			$sql = "INSERT INTO sc_users (title, first_name, last_name, role, username, password, branch, status, datecreated)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?, now());";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssss', $title, $fname, $lname, $role, $username, $password, $branch, $status);
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
		
		function get_user($id = 0){
			$users = array("status" => 0, "msg" => "No Users Found");
			
			$sql = "SELECT usrid, title, first_name, last_name, role, username, password, branch, status
						FROM sc_users";
						
			if($id != 0){
				$sql .= " WHERE usrid = ?;";
			}
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				
				if($id != 0)
					$stmt->bind_param('d', $id);
				
				$stmt->execute();
				$stmt->bind_result($userid, $title, $fname, $lname, $role, $uname, $pass, $branch, $status);
				
				while($stmt->fetch()){
					$result[] = array("userid" => $userid,
											"title" => $title,
											"fname" => $fname,
											"lname" => $lname,
											"role" => $role,
											"uname" => $uname,
											"pword" => $pass,
											"branch" => $branch,
											"status" => $status);
				}
				
				if(isset($result))
					$users = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $users;
		}
		
		function update_user($id) {
			$msg = array("status" => 0, "msg" => "Error adding user");
			
			$title = $_POST['title'] ;
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$role = $_POST['role'];
			$username = $_POST['uname'];
			//$password = $this->encrypt_pass($_POST['pass']);
			$branch = $_POST['branch'];
			$status = 'Approved';
			
			// $title = 'Mr' ;
			// $fname ='Hallelujah';
			// $lname = 'Hapstism';
			// $role = 'Admin';
			// $username = 'arios';
			// $password ='gundam';
			// $branch = 'VI';
			// $status = 'Approved';
			
			$sql = "UPDATE sc_users 
						SET title = ?, 
							   first_name = ?, 
							   last_name = ?, 
							   role = ?, 
							   username = ?, 
							   branch = ?
						WHERE usrid = ?;";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssd', $title, $fname, $lname, $role, $username, $branch, $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "User record successfully updated");
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
		
		function delete_user($id) {
			$msg = array("status" => 0, "msg" => "Error deleting user");
			
			$sql = "DELETE FROM sc_users 
						WHERE usrid = ?;";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('d', $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "User record successfully deleted");
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
		
		function login_user() {
			$msg = array("status" => 0, "msg" => "Invalid login credentials!");
			
			//$uname = isset($_POST['username'])? mysql_real_escape_string($_POST['username']) : '';
			//$pass = isset($_POST['password'])? mysql_real_escape_string($_POST['password']) : '';
			
			//$uname = isset($_POST['username'])? filter_input(INPUT_POST, $_POST['username']) : '';
			//$pass = isset($_POST['password'])? filter_input(INPUT_POST, $_POST['password']) : '';
			
			$uname = $_POST['username'];
			$pass = $this->encrypt_pass($_POST['password']);//
			//$pass = $_POST['password'];
			$branch_code = $_POST['branch'];
			
			//Get Branch Code
			$sql_bc = "Select branch from sc_branch where branch_code = '".$branch_code."'; ";
			try {
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql_bc);
				$stmt->execute();
				$stmt->bind_result($branch_cd);
				
				while($stmt->fetch()){
					$branch = $branch_cd;
				}
				
				mysqli_close($conn);
			}
			catch(Exception $e){
				
			}
			
			$users = $this->get_user();
			//$msg = array("user" => $uname, "pass" => $pass);
			
			//print_r($users);
			//echo '<br>'.$uname;
			//$uname = 'bene';
			
			foreach($users as $user){
				if($uname != '' && strtolower($uname) == strtolower($user['uname']) && $pass == $user['pword']){
					$_SESSION['sc_userid'] = $user['userid'];
					$_SESSION['sc_title'] = $user['title'];
					$_SESSION['sc_fname'] = $user['fname'];
					$_SESSION['sc_lname'] = $user['lname'];
					$_SESSION['sc_role'] = $user['role'];
					$_SESSION['sc_uname'] = $user['uname'];
					$_SESSION['sc_branch'] = $branch;
					$_SESSION['sc_branch_code'] = $branch_code;
					$_SESSION['sc_status'] = $user['status'];
					
					$msg = array("status" => 1, "msg" => "Logged in successfully");
					//$msg = $_POST;
					//return $msg;
					break;
				}
				else {
					$msg = array("status" => 0, "msg" => "User or password not found!");
				}
			}
			
			return $msg;
		}
		
		function logout_user() {
			session_unset();
			
			$msg = array("status" => "1", "msg" => "Logged Out Successfully!");
			
			return $msg;
		}
		
		function get_logged_user_detail() {
			$msg = array("status" => 0, "msg" => "Invalid login credentials!");
			
			if(isset($_SESSION['sc_uname'])){					
					$msg  = array("userid" => $_SESSION['sc_userid'],
											"title" => $_SESSION['sc_title'] ,
											"fname" => $_SESSION['sc_fname'],
											"lname" => $_SESSION['sc_lname'],
											"role" => $_SESSION['sc_role'],
											"uname" => $_SESSION['sc_uname'],
											"branch" => $_SESSION['sc_branch'],
											"status" => $_SESSION['sc_status']);
			}
			else {
				$msg = array("status" => 0, "msg" => "No logged in User!");
			}
			
			return $msg;
		}
		
		function change_password($id, $type="change") {
			$msg = array("status" => 0, "msg" => "Error changing password");
			
			if($type == "reset"){
				$status = 'New';
				$password = $this->encrypt_pass('password#321#');
			}
			else {
				$old_password = $this->encrypt_pass($_POST['opass']);
				//$old_password = $_POST['opass'];
				$password = $this->encrypt_pass($_POST['npass']);
				
				$status = "Approved";
					
				$users = $this->get_user($id);
				
				foreach($users as $user){
					if($old_password == $user['pword']){
						//Do nothing
					}
					else {
						$msg = array("status" => 0, "msg" => "Wrong old password! Please type in the correct old password!! Old".$user['fname'].": User".$old_password);
						return $msg;
					}
				}
			}
			
			$sql = "UPDATE sc_users 
						SET password = ?,
							   status = ?
						WHERE usrid = ?;";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssd', $password, $status, $id);
				if($stmt->execute() ){
					if($type == 'reset')
						$msg = array("status" => 1, "msg" => "User password successfully resetted to 'password#321#'");
					else
						$msg = array("status" => 1, "msg" => "User password successfully changed");
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
	
		function deactivate($id, $type="Lock") {
			
			$status = ($type == 'Lock' ? 'Locked' : 'New');
			$action = ($type == 'Lock' ? 'User successfully locked!' : 'User successfully unlocked!');
			
			$msg = array("status" => 0, "msg" => "Error "+ ($type == 'Lock' ? 'Deactivating' : 'Re-activating') +" user");
			
			$sql = "UPDATE sc_users 
						SET status = ?
						WHERE usrid = ?;";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sd', $status, $id);
				if($stmt->execute() ){
					if($type == 'Lock')
						$msg = array("status" => 1, "msg" => "User successfully deactivated");
					else
						$msg = array("status" => 1, "msg" => "User successfully re-activated");					
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
	
		
		private function encrypt_pass($pword) {
			$hash_pword = hash('sha256', $pword);		
			$new_pword = substr($hash_pword, 5, 15);
			
			return $new_pword;
		}
	}	
?>
