<?php
	session_start();

	Class User {
		private $db_obj;
		
		function __construct() {
			require_once 'config/dbconn.php';
			
			$this->db_obj = new DBConfig();
		}
		
		function add_user() {
			$msg = array("status" => 0, "msg" => "Error adding user");
			
			$title = isset($_POST['title'])? mysql_real_escape_string($_POST['title']) : '';
			$fname = isset($_POST['fname'])? mysql_real_escape_string($_POST['fname']) : '';
			$lname = isset($_POST['lname'])? mysql_real_escape_string($_POST['lname']) : '';
			$role = isset($_POST['role'])? mysql_real_escape_string($_POST['role']) : '';
			$username = isset($_POST['uname'])? mysql_real_escape_string($_POST['uname']) : '';
			$password = isset($_POST['pword'])? mysql_real_escape_string($_POST['pword']) : '';
			$branch = isset($_POST['branch'])? mysql_real_escape_string($_POST['branch']) : '';
			$status = isset($_POST['status'])? mysql_real_escape_string($_POST['status']) : '';
			
			$sql = "INSERT INTO sc_users (title, first_name, last_name, role, username, password, branch, status)
						VALUES (?, ?, ?, ?, ?, ?, ?, ?);";
						
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
			
			$title = isset($_POST['title'])? mysql_real_escape_string($_POST['title']) : '';
			$fname = isset($_POST['fname'])? mysql_real_escape_string($_POST['fname']) : '';
			$lname = isset($_POST['lname'])? mysql_real_escape_string($_POST['lname']) : '';
			$role = isset($_POST['role'])? mysql_real_escape_string($_POST['role']) : '';
			$username = isset($_POST['uname'])? mysql_real_escape_string($_POST['uname']) : '';
			$password = isset($_POST['pword'])? mysql_real_escape_string($_POST['pword']) : '';
			$branch = isset($_POST['branch'])? mysql_real_escape_string($_POST['branch']) : '';
			$status = isset($_POST['status'])? mysql_real_escape_string($_POST['status']) : '';
			
			$sql = "UPDATE sc_users 
						SET title = ?, 
							   first_name = ?, 
							   last_name = ?, 
							   role = ?, 
							   username = ?, 
							   password = ?, 
							   branch = ?, 
							   status = ?
						WHERE usrid = ?;";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('ssssssssd', $title, $fname, $lname, $role, $username, $password, $branch, $status, $id);
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
			
			$uname = isset($_POST['username'])? mysql_real_escape_string($_POST['username']) : '';
			$pass = isset($_POST['password'])? mysql_real_escape_string($_POST['password']) : '';
			
			//$user = isset($_POST['username'])? filter_input(INPUT_POST, $_POST['username']) : '';
			//$pass = isset($_POST['password'])? filter_input(INPUT_POST, $_POST['password']) : '';
			
			$users = $this->get_user();
			$msg = array("user" => $uname, "pass" => $pass);
			
			//print_r($users);
			//echo '<br>'.$uname;
			//$uname = 'bene';
			
			foreach($users as $user){
				if($uname != '' && strtolower($uname) == strtolower($user['uname']) ){
					$_SESSION['sc_userid'] = $user['userid'];
					$_SESSION['sc_title'] = $user['title'];
					$_SESSION['sc_fname'] = $user['fname'];
					$_SESSION['sc_lname'] = $user['lname'];
					$_SESSION['sc_role'] = $user['role'];
					$_SESSION['sc_uname'] = $user['uname'];
					$_SESSION['sc_branch'] = $user['branch'];
					$_SESSION['sc_status'] = $user['status'];
					
					//$msg = array("status" => 1, "msg" => "Logged in successfully");
					//$msg = $_POST;
					return $msg;
				}
				else {
					//$msg = array("status" => 0, "msg" => "Username not found!");
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
		
	}
?>
