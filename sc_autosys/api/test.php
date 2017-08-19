<?php
	include ('app/cls_users.php');
	
	$user_obj = new User();
	
	print_r($user_obj->get_user());
	
	

?>