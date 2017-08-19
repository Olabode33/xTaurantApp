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
	}
?>