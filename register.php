<?php session_start();
require('config/config.php');
require('model/functions.fn.php');

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
/*===============================
	Register
===============================*/

if(isset($email) && isset($password) && isset($username)){
	if(!empty($email) && !empty($password) && !empty($username)){

		// TODO

		// Force user connection to access dashboard

		if(isUsernameAvailable($db, $username) && isEmailAvailable($db, $email)){
			userRegistration($db, $username, $email, $password);
			userConnection($db, $email, $password);
			header('Location: dashboard.php');

		} else if(isUsernameAvailable($db, $username)==false) {
			$error = 'Username déjà pris';


		} else if(isEmailAvailable($db, $email)==false) {
			$error = 'Email déjà pris';

		}

	}else{
		$error = 'Champs requis !';
	}
}


include 'view/_header.php';
include 'view/register.php';
include 'view/_footer.php';
