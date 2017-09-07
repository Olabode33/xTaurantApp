<?php
	require ("Customers_RestHandler.php");
	
	$view = "";
	if(isset($_GET["view"]))
		$view = $_GET["view"];
	
	/*
	controls the RESTful services
	URL mapping
	*/
	
	switch($view){
		case "all":
			//to handle REST Url /customer/all/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getAllCustomers();
			break;
			
		case "single":
			//to handle REST Url /customer/single/<id>/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getCustomer($_GET["id"]);
			break;
			
		case "new":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->addNewCustomer();
			break;	
			
		case "search":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->searchCustomers($_GET['q']);
			break;
			
		case "update":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->updateCustomer($_GET['id']);
			break;	
			
		case "delete":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->deleteCustomer($_GET['id']);
			break;
			
		//case "":
			//404 -not found
			//break;
	}
	
?>