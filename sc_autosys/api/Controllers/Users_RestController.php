<?php
	require ("../Handlers/Users_RestHandler.php");
	
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
			
		case "new":
			//to handle REST Url /user/add/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->addUser();
			break;
			
		case "edit":
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
			
		case "changepass":
			//to handle REST Url /user/update/<id>/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->changePass($_GET["id"], "change");
			break;
			
		case "resetpass":
			//to handle REST Url /user/update/<id>/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->changePass($_GET["id"], "reset");
			break;
		
		case "deactivate":
			//to handle REST Url /user/update/<id>/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->deactivate($_GET["id"], "Lock");
			break;
			
		case "reactivate":
			//to handle REST Url /user/update/<id>/
			$userRestHandler = new Users_RestHandler();
			$userRestHandler->deactivate($_GET["id"], "Unlock");
			break;
			
		case "":
			//404 -not found
			break;
	}
	
?>