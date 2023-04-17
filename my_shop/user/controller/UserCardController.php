<?php 
session_start();
include('../model/model.php');

$action = isset($_POST['action']) ? $_POST['action'] : '';

if($action == 'addToCard'){
	$userEmail = $_POST['userEmail'];
	$prodId = $_POST['prodId'];

		$check_card = $model->check_card($userEmail, $prodId);

			if($check_card > 0){
				$quantity = 1;
				$update_card = $model->update_card($userEmail, $prodId,$quantity,'add');

				if($update_card){
					$returnArr['Action'] = '1';
					$returnArr['message'] = 'Card updated';
				}else{
					$returnArr['Action'] = '0';
					$returnArr['message'] = 'Failed to update card';
				}


			}else{
				
				$add_to_card = $model->add_to_card($userEmail, $prodId);

				if($add_to_card){
					$returnArr['Action'] = '1';
					$returnArr['message'] = 'Product added to card';
				}else{
					$returnArr['Action'] = '0';
					$returnArr['message'] = 'Failed to add';
				}
			}

		

		echo json_encode($returnArr);exit;
}



if($action == 'updateCardQuant'){
	$prodId = $_POST['prodId'];
	$quant = $_POST['quant'];
	$userEmail = $_SESSION['userEmail'];

	$updateCardQuant = $model->update_card($userEmail,$prodId,$quant,'update');

	if($updateCardQuant){
		$returnArr['Action'] = '1';
		$returnArr['message'] = 'Card updated';
	}else{
		$returnArr['Action'] = '0';
		$returnArr['message'] = 'Failed to update card';
	}

	echo json_encode($returnArr);exit;
}


if($action =='removeCard'){
	$cardId = $_POST['cardId'];

	$removeCard = $model->removeCard($cardId);

	if($removeCard){
		$returnArr['Action'] = '1';
		$returnArr['message'] = 'Card deleted';
	}else{
		$returnArr['Action'] = '0';
		$returnArr['message'] = 'Failed to delete card';
	}

	echo json_encode($returnArr);exit;
}



if($action == 'createOrder'){


	$cards = $model->getCards($_SESSION['userEmail']);

	if(count($cards)>0){

			foreach($cards as $card){
				$prodId = $card['iProdId'];
				$quant = $card['quantity'];
				$cardId = $card['iCardId'];
				$userEmail = $_SESSION['userEmail'];

				$createOrder = $model->createOrder($prodId,$userEmail,$quant);
				

				if($createOrder){

					$model->removeCard($cardId);

					$returnArr['Action'] = '1';
					$returnArr['message'] = 'Order Created';
				}else{
					$returnArr['Action'] = '0';
					$returnArr['message'] = 'Failed to create order';
				}
			}
		}else{
			$returnArr['Action'] = '0';
			$returnArr['message'] = 'Nothing to order';
		}

		echo json_encode($returnArr);exit;
}


?>