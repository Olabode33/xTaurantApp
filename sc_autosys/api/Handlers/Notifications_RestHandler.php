<?php
	require ("simpleRest.php");
	require ("../Classes/cls_notification.php");
	
	class Notifications_RestHandler extends SimpleRest {
		function getNotifications($limit) {
			$notification_obj = new Notification();
			$rawData = $notification_obj->get_notifications($limit);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'No Notifications Found');
			}
			else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function newNotification() {
			$notification_obj = new Notification();
			$rawData = $notification_obj->add_notification();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error adding User!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function deleteNotification($id) {
			$notification_obj = new Notification();
			$rawData = $notification_obj->delete_notification($id);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error deleting User!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function seenNotification() {
			$notification_obj = new Notification();
			$rawData = $notification_obj->update_status();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Error deleting User!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
	}
?>