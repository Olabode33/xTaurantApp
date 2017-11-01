<?php
	require ("../Handlers/Partners_RestHandler.php");
	
	$view = "";
	if(isset($_GET["view"]))
		$view = $_GET["view"];
	
	/*
	controls the RESTful services
	URL mapping
	*/
	
	switch($view){
		case "all":
			//to handle REST Url /user/all/
			$partnerRestHandler = new Partners_RestHandler();
			$partnerRestHandler->getAllPartners();
			break;
			
		case "single":
			//to handle REST Url /user/single/<id>/
			$partnerRestHandler = new Partners_RestHandler();
			$partnerRestHandler->getPartner($_GET["id"]);
			break;
			
		case "type":
			//to handle REST Url /user/single/<id>/
			$partnerRestHandler = new Partners_RestHandler();
			$partnerRestHandler->getPartnerFor($_GET["id"]);
			break;
			
		case "new":
			//to handle REST Url /user/add/
			$partnerRestHandler = new Partners_RestHandler();
			$partnerRestHandler->addPartner();
			break;
			
		case "edit":
			//to handle REST Url /user/update/<id>/
			$partnerRestHandler = new Partners_RestHandler();
			$partnerRestHandler->updatePartner($_GET["id"]);
			break;
			
		case "search":
			//to handle REST Url /user/update/<id>/
			$partnerRestHandler = new Partners_RestHandler();
			$partnerRestHandler->searchPartner($_GET["id"]);
			break;
			
		case "":
			//404 -not found
			break;
	}
	
?>