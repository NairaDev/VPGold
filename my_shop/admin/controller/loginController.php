<?php
session_start();
include('../model/model.php');

if(isset($_POST['action']) && $_POST['action'] == 'login'){
    $password= $_POST['password'];
    $email= $_POST['email'];
  
    if( $password != '' && $email != ''){
    	
    	$check_admin_login = $model->check_admin_login($email,$password);


        if($check_admin_login > 0){
        	$_SESSION['adminEmail'] = $email;
            $returnArr['Action'] ='1';
            $returnArr['message'] = 'You are logged in';
        }else{
            $returnArr['Action'] = '0';
            $returnArr['message'] = "Nman admin chi gtnvel";
        }

    }else{
        $returnArr['Action'] = '0';
    	$returnArr['message'] = "mutqagreq bolor tvyalnery";
    }

    echo json_encode($returnArr);exit;
}

?>




?>