<?php 
session_start();
include('../model/model.php');


$action = isset($_POST['action']) ? $_POST['action'] : '';


if($action == 'addCategory'){
	$catName = $_POST['catName'];

	if(!empty($catName)){
		$add_category = $model->add_category($catName);

		if($add_category > 0){
			$_SESSION['status'] = 'success';
			$_SESSION['message'] = 'Category created!';
		}else{
			$_SESSION['status'] = 'error';
			$_SESSION['message'] = 'Failed to create category!';
		}
	}else{
		$_SESSION['status'] = 'error';
		$_SESSION['message'] = 'Please add name!';
	}

	header('location:../index.php');

}

if($action=='updateCat'){
	$catName = $_REQUEST['catName'];
	$catId = $_REQUEST['catId'];

	$update_cat = $model->update_cat($catId,$catName);

	if($update_cat){
		$returnArr['Action'] = "1";
		$returnArr['message'] = 'Updated Successfuly!';
	}else{
		$returnArr['Action'] = "0";
		$returnArr['message'] = 'Failed to update!';
	}

	echo json_encode($returnArr); exit;

}


if($action == 'deleteCat'){
	$catId = $_REQUEST['catId'];

	$delete_cat = $model->delete_cat($catId);

	if($delete_cat){
		$returnArr['Action'] = "1";
		$returnArr['message'] = 'Deleted Successfuly!';
	}else{
		$returnArr['Action'] = "0";
		$returnArr['message'] = 'Failed to delete!';
	}

	echo json_encode($returnArr); exit;
}


?>