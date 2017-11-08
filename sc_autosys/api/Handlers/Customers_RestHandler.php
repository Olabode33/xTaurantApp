<?php
	require ("simpleRest.php");
	require ("../Classes/cls_customers.php");
	
	class Customers_RestHandler extends SimpleRest {
		function getAllCustomers () {
			$customer_obj = new Customers();
			$rawData = $customer_obj->get_customers();
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'No Customers Found!');
			}
			else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function getCustomer($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->get_customers($id);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Customer not found!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function doctorsUpdate($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->update_customer_by_doctor($id);

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Customer not found!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function examine() {
			$customer_obj = new Customers();
			$rawData = $customer_obj->doctors_examination();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('error' => 'Customer not found!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function addNewCustomer() {
			$customer_obj = new Customers();
			$rawData = $customer_obj->add_customer();

			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while adding new customer!');		
			} else {
				$statusCode = 200;
			}

			$this->getResponse($rawData, $statusCode);
		}
		
		public function searchCustomers($term) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->search_all($term);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while searching for customers!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function updateCustomer($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->update_customer($id);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while updating customer\'s record!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function deleteCustomer($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->delete_customer($id);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while deleting customer\'s record!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function bookAppointment() {
			$customer_obj = new Customers();
			$rawData = $customer_obj->book_appointment();
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while booking appointment!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function getAppointments() {
			$customer_obj = new Customers();
			$rawData = $customer_obj->get_appointment();
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while retrieving appointments!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function getAppointment($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->get_appointment($id);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while retrieving appointments!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function openAppointment($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->update_appointment_status($id, "Open");
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while updating appointments status!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function closeAppointment($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->update_appointment_status($id, "Closed");
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured while updating appointments status!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function addDependent() {
			$customer_obj = new Customers();
			$rawData = $customer_obj->add_dependant();
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured add dependent!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function getDependents($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->get_dependents($id);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error occured add dependent!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function treatorySummary($id, $type='cus') {
			$customer_obj = new Customers();
			$rawData = $customer_obj->get_treatory_summary($id, $type);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error retrieving treatment history summary!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
		public function treatoryDetail($id) {
			$customer_obj = new Customers();
			$rawData = $customer_obj->get_treatory_details($id);
			
			if(empty($rawData)) {
				$statusCode = 404;
				$rawData = array('Error' => 'An error retrieving treatment history detail!');
			} else {
				$statusCode = 200;
			}
			
			$this->getResponse($rawData, $statusCode);
		}
		
	}
?>