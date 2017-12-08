<?php
	require ("../Handlers/Customers_RestHandler.php");
	
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
			
		case "dupdated":
			//to handle REST Url /customer/single/<id>/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->doctorsUpdate($_GET["id"]);
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
			
		case "book_appointment":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->bookAppointment();
			break;
			
		case "get_all_appointments":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getAppointments();
			break;
			
		case "get_appointment":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getAppointment($_GET['id']);
			break;
			
		case "open_appointment":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->openAppointment($_GET['id']);
			break;
			
		case "close_appointment":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->closeAppointment($_GET['id']);
			break;
			
		case "examine":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->examine();
			break;
			
		case "add_dependent":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->addDependent();
			break;
			
		case "get_dependents":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getDependents($_GET['id']);
			break;
			
		case "treatory_summary":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->treatorySummary($_GET['id']);
			break;
			
		case "dep_treatory_summary":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->treatorySummary($_GET['id'], 'dep');
			break;
			
		case "treatory_detail":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->treatoryDetail($_GET['id']);
			break;
			
		case "get_weekly_appointments":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getAppointment(-1);
			break;
			
		case "get_monthly_appointments":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getAppointment(-2);
			break;
			
		case "get_custom_appointments":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getAppointment(-3, isset($_GET['fdate'])?$_GET['fdate']:'', isset($_GET['tdate'])?$_GET['tdate']:'');
			break;
			
		case "get_customer_appointments":
			//to handle REST Url /customer/new/
			$customersRestHandler = new Customers_RestHandler();
			$customersRestHandler->getAppointment(-4, $_GET['id']);
			break;
		//case "":
			//404 -not found
			//break;
	}
	
?>