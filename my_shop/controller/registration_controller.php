<?php
session_start();
include('../model/model.php');


$action = isset($_POST['action']) ? $_POST['action'] : '';

if($action !='' && $action == 'submit'){

	$name = $_POST['name'];
	$surName = $_POST['surName'];
	$mail = $_POST['mail'];
	$pass = $_POST['password'];
	$confPass= $_POST['confPass'];

	$regName = '/^[a-zA-Z]{2,20}$/';
	$regSurName = '/^[a-zA-Z0-9]{2,20}$/';
	$regMail = '/^[_a-z0-9-]+(\.[_a-z0-9]+)*@[a-z0-9]+(\.[a-z0-9-]+)*(\.[a-z]{2,5})$/';

	$regPass = '/^[a-zA-Z0-9]{6,12}/';


	if(empty($name) || empty($surName) || empty($pass) || empty($confPass)){
		$_SESSION['error'] = "Please fill all fields";
		header('location:../view/registration.php');
	}else{
		if(!preg_match($regName, $name)){
			$_SESSION['error'] = 'Please enter valid Name';	
		}

		if(!preg_match($regSurName,$surName)){
			$_SESSION['error'] = 'Please enter valid Surename';
		}

		if(!preg_match($regMail,$mail)){
			$_SESSION['error'] = 'Please enter valid Email';
		}

		if(!preg_match($regPass,$pass)){

			$_SESSION['error'] = 'Please enter valid Password';
		}

		if($pass!=$confPass){
			$_SESSION['error'] = "Passwords doesn't match";
		}else{

			$check_admin = $model->check_admin($mail);
			
			if($check_admin > 0){
				$_SESSION['error'] = 'Admin already exists';
			}else{
				$add_admin = $model->add_admin($name,$surName,$mail,$pass);
				if($add_admin){
					header('location:../view/login.php');die;
				}else{
					$_SESSION['error'] = "Can't create administrator";
				}
			}
		}
		header('location:../view/registration.php');
	}
}

?>