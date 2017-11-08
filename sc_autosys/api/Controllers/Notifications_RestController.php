<?php
	require ("../Handlers/Notifications_RestHandler.php");
	
	$view = "";
	if(isset($_GET["view"]))
		$view = $_GET["view"];
	
	/*
	controls the RESTful services
	URL mapping
	*/
	
	switch($view){
		case "recent":
			//to handle REST Url /notification/all/
			$notificationRestHandler = new Notifications_RestHandler();
			$notificationRestHandler->getNotifications(10);
			break;
			
		case "single":
			//to handle REST Url /notification/single/<id>/
			$notificationRestHandler = new Notifications_RestHandler();
			$notificationRestHandler->getNotifications(1);
			break;
			
		case "all":
			//to handle REST Url /notification/add/
			$notificationRestHandler = new Notifications_RestHandler();
			$notificationRestHandler->getNotifications('all');
			break;
			
			
		case "new":
			//to handle REST Url /notification/login/
			$notificationRestHandler = new Notifications_RestHandler();
			$notificationRestHandler->newNotification();
			break;
			
		case "delete":
			//to handle REST Url /notification/logout/
			$notificationRestHandler = new Notifications_RestHandler();
			$notificationRestHandler->deleteNotification($_GET['id']);
			break;	
			
		case "seen":
			//to handle REST Url /notification/logout/
			$notificationRestHandler = new Notifications_RestHandler();
			$notificationRestHandler->seenNotification();
			break;
		
		case "":
			//404 -not found
			break;
	}
	
?>