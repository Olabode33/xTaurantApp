<?php
	require ("simpleRest.php");
	require ("../Classes/cls_users.php");
	
	class Users_RestHandler extends SimpleRest {
		function getAllUsers () {
			$user_obj = new User();
			$rawData = $user_obj->get_user();
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'No Users Found');
			}
			else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function getUser($id) {
			$user_obj = new User();
			$rawData = $user_obj->get_user($id);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'User not found!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function addUser() {
			$user_obj = new User();
			$rawData = $user_obj->add_user();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error adding User!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function updateUser($id) {
			$user_obj = new User();
			$rawData = $user_obj->update_user($id);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error updating User!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function loginUser() {
			$user_obj = new User();
			$rawData = $user_obj->login_user();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error Logging in!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function logoutUser() {
			$user_obj = new User();
			$rawData = $user_obj->logout_user();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error Logging in!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function getLoggedUserDetails() {
			$user_obj = new User();
			$rawData = $user_obj->get_logged_user_detail();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error: no Logged in user!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
	
		public function changePass($id, $type) {
			$user_obj = new User();
			$rawData = $user_obj->change_password($id, $type);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error updating password!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function deactivate($id, $type) {
			$user_obj = new User();
			$rawData = $user_obj->deactivate($id, $type);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error updating deactivating User!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
	}
?>