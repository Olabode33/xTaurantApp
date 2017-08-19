<?php
	require ("Users_RestHandler.php");
	
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
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->getAllUsers();
			break;
			
		case "single":
			//to handle REST Url /user/single/<id>/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->getUser($_GET["id"]);
			break;
			
		case "add":
			//to handle REST Url /user/add/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->addUser();
			break;
			
		case "update":
			//to handle REST Url /user/update/<id>/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->updateUser($_GET["id"]);
			break;
			
		case "login":
			//to handle REST Url /user/login/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->loginUser();
			break;
			
		case "logout":
			//to handle REST Url /user/logout/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->logoutUser();
			break;
			
		case "loggedin":
			//to handle REST Url /user/loggedin/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->getLoggedUserDetails();
			break;
			
		case "":
			//404 -not found
			break;
	}
	
?>