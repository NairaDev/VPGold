<!DOCTYPE html>
<html>
<head>
	<title>Cards</title>
	<STYLE>
		footer{
			margin-top:350px;
		}
	</STYLE>
</head>
<body>

	<?php include_once('header.php'); ?>

	<h1>hello</h1>
	<?php 

	if($userEmail!=''){ ?>

		<h3 style="text-align:center; margin-top:100px;">Selected Products</h3>

		<?php $cards = $model->getCards($userEmail); 

		if(count($cards)>0){ 
			$total = 0;
			?>

			<div class="col-md-12" style="margin-top: 50px;"></div>

			<div class="alert alert-success alert_success" style="display: none;" role="alert"></div>
			<div class="alert alert-danger alert_error" style="display: none;" role="alert"></div>

			<table id="id_table_cards" class="table table-bordered table-hover" style="margin: auto;">
				
				<thead>
					<tr>
						<th>Image</th>
						<th>Name</th>
						<th>Unit Price</th>
						<th>Quantity</th>
						<th>Sum</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($cards as $card){ ?>

						<tr>
							<td><img style="width: 100px;" src="../../admin/assets/img/<?=$card['vProdImage']?>"></td>
							<td><?=$card['vProdName']?></td>
							<td><?=$card['iProdPrice']?></td>
							<td>  <input type="text" class="quantity" data-value="<?=$card['iProdId']?>" value="<?=$card['quantity']?>"></td>
							<td><?=$card['iProdPrice'] * $card['quantity']?></td>
							<td><button class="btn btn-danger removeCard" data-id="<?=$card['iCardId']?>">Remove</button></td>
						</tr>


					<?php

					$total +=$card['iProdPrice'] * $card['quantity'];
					  } ?>
				</tbody>
			</table>

			<div style="margin-top: 30px; padding-left: 30px;">
				<div class="totalSum">Total: <?=$total;?></div>

				<button class="btn btn-success createOrder">Create Order</button>
			</div>


		<?php }else{ ?>

			<p style="text-align:center; margin-top:100px; border:1px solid lightgrey; font-size:20px;" >You don't have orders</p>

	<?php }


		?>
		

	<?php }else{ ?>
		<p style="text-align:center; margin-top:100px; border:1px solid lightgrey;">Please <a href="userLogin.php">Login</a> or <a href="userRegister.php">Register</a> if you want to see your orders</p>
	<?php } ?>

<script type="text/javascript" src="../assets/js/userCards.js"></script>
<?php
include_once('footer.php');
?>
</body>
</html>