<?php session_start();
/******************************** 
	 DATABASE & FUNCTIONS 
********************************/
require('config/config.php');
require('model/functions.fn.php');
$email = $_POST['email'];
$password = $_POST['password'];


/********************************
			PROCESS
********************************/

if(isset($email) && isset($password)){
	if(!empty($email) && !empty($password)){

		// TODO

		// Force user connection to access dashboard
		userConnection($db, $email, $password);
		
		header('Location: dashboard.php');

	}else{
		$error = 'Champs requis !';
	}
}

/******************************** 
			VIEW 
********************************/
include 'view/_header.php';
include 'view/login.php';
include 'view/_footer.php';