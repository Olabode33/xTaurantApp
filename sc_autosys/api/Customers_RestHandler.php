<?php
	require ("simpleRest.php");
	require ("app/cls_customers.php");
	
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
		
	}
?>