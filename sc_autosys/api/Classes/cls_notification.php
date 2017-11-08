<?php
	session_start();

	Class Notification {
		private $db_obj;
		
		function __construct() {
			require_once '../config/dbconn.php';
			
			$this->db_obj = new DBConfig();
		}
		
		function add_notification() {
			$msg = array("status" => 0, "msg" => "Error adding notification");
			
			$message = $_POST['msg'] ;
			$author = $_SESSION['sc_userid'];
			$status = 'New';
			
			$sql = "INSERT INTO sc_notifications (msg, author, status, date_created)
						VALUES (?, ?, ?, now());";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('sds',$message, $author, $status);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Notification created successfully");
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
		
		function get_notifications($limit = 10){
			$notifications = array("status" => 0, "msg" => "No Notifications Found");
			
			$sql = "SELECT notification_id, msg, author, u.first_name, u.last_name, n.status, n.date_created
					FROM sc_notifications n
						LEFT JOIN sc_users u ON n.author = u.usrid
					WHERE n.status = 'New'
					ORDER BY date_created desc
					LIMIT ?";
					
			if($limit == 'all'){
				$sql = "SELECT notification_id, msg, author, u.first_name, u.last_name, n.status, n.date_created
						FROM sc_notifications n
							LEFT JOIN sc_users u ON n.author = u.usrid
						ORDER BY date_created desc";
			}
			
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				if($limit != 'all')
					$stmt->bind_param('d', $limit);
				$stmt->execute();
				$stmt->bind_result($id, $msg, $author, $fname, $lname, $status, $date_created);
				
				while($stmt->fetch()){
					$result[] = array("id" => $id,
									  "msg" => $msg,
									  "author" => $author,
									  "fname" => $fname,
									  "lname" => $lname,
									  "status" => $status,
									  "date" => $date_created);
				}
				
				if(isset($result))
					$notifications = $result;
				
				mysqli_close($conn);
			}
			catch (Exception $e){
				
			}
			
			return $notifications;
		}
		
		function delete_notification($id) {
			$msg = array("status" => 0, "msg" => "Error deleting notification");
			
			$sql = "DELETE FROM sc_notifications 
						WHERE notification_id = ?;";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				$stmt->bind_param('d', $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Notification successfully deleted");
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
		
		function update_status() {
			$msg = array("status" => 0, "msg" => "Error deleting notification");
			
			$sql = "UPDATE sc_notifications 
						SET status = 'Seen'
						WHERE status = 'New';";
						
			try{
				$conn = $this->db_obj->db_connect();
				$stmt = $conn->prepare($sql);
				//$stmt->bind_param('d', $id);
				if($stmt->execute() ){
					$msg = array("status" => 1, "msg" => "Notification seen");
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
	}	
?>
