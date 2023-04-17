<?php 
session_start();
include('../model/model.php');

$action = isset($_POST['action']) ? $_POST['action'] : '';

if($action == 'removeOrder'){
	$orderId = $_POST['orderId'];

	$removeOrder = $model->removeOrder($orderId);

	if($removeOrder){
		$returnArr['Action'] = '1';
		$returnArr['message'] = 'Order Removed';
	}else{
		$returnArr['Action'] = '1';
		$returnArr['message'] = 'Failed to remove order';
	}

	echo json_encode($returnArr); exit;
}


if($action == 'sendOrder'){
	$userEmail = $_SESSION['userEmail'];

	$sendOrder = $model->sendOrder($userEmail);

	if($sendOrder){
		$returnArr['Action'] = '1';
		$returnArr['message'] = 'Order confirmed!';
	}else{
		$returnArr['Action'] = '0';
		$returnArr['message'] = 'Failed to confirm order';
	}

	echo json_encode($returnArr);
}

?>