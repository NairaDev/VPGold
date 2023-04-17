<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
	<style>
		footer{
			margin-top: 370px;
		}
	</style>
</head>
<body style="background:white; margin-top:200px;">

	<?php include('header.php');?>
<div class="container">
 	<div   class="alert alert-success alert_success" style="display: none;" role="alert"></div>
	<div class="alert alert-danger alert_error" style="display: none;" role="alert"></div>
		<?php if($userEmail !=''){ ?>

			<?php $newOrders = $model->getNewOrders($userEmail);
				if(count($newOrders)>0){
					$total = 0;
				?>
					<h3 style="margin-top:130px; margin-left:30px; text-align:center; font-size:30px; color:darkgrey;">New orders</h3>

				<div class="order_container" style="margin-top:100px;">
					<table id='id_order_table' class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Sum</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($newOrders as $order){ ?>
								<tr>
									<td><img style="width: 100px;" src="../../admin/assets/img/<?=$order['vProdImage']?>"></td>
									<td><?=$order['vProdName']?></td>
									<td><?=$order['iProdPrice']?> AMD</td>
									<td><?=$order['quantity']?></td>
									<td><?= $order['iProdPrice'] * $order['quantity'] ?> dram</td>
									<td><button class="btn btn-danger removeOrder" data-id="<?=$order['iOrderId']?>" >Remove</button></td>
								</tr>
						<?php  
						$total += $order['iProdPrice'] * $order['quantity'];
						} ?>
						</tbody>

					</table>
					<span style="float: right; font-weight: 500">Total: <?=$total?> dram</span>
					<button class="btn btn-success sendOrder"> Send Order</button>
				</div>


			<?php 	}else{ ?>
				<p style="text-align:center; margin-top:100px; border:1px solid lightgrey; border-left:0; border-right:0;">You don't have new orders</p>
			<?php	} ?>




		<?php 	$orders = $model->getSentOrders($userEmail);

			if(count($orders) > 0){
				$total = 0;
			?>

			<h3 style="text-align:center; margin-top:100px;">Sent orders</h3>

				<div class="order_container" style="margin-top:100px;">
					<table id='id_order_table' class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Sum</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($orders as $order){ ?>
								<tr>
									<td><img style="width: 100px;" src="../../admin/assets/img/<?=$order['vProdImage']?>"></td>
									<td><?=$order['vProdName']?></td>
									<td><?=$order['iProdPrice']?> dram</td>
									<td><?=$order['quantity']?></td>
									<td><?= $order['iProdPrice'] * $order['quantity'] ?> dram</td>
									<td>
										<?php if($order['orderStatus'] == 'Active'){ 
											$disabled = '';
											?>
											<span style="color:red;">PENDING</span>
										<?php }else{
											$disabled = 'disabled' ?>
											<span style="color:green;">Confirmed</span>
									<?php	} ?>
									</td>
									<td><button class="btn btn-danger removeOrder" <?=$disabled;?> data-id="<?=$order['iOrderId']?>" >Remove</button></td>
								</tr>
						<?php  
						$total += $order['iProdPrice'] * $order['quantity'];
						} ?>
						</tbody>

					</table>
					<span style="float: right; font-weight: 500">Total: <?=$total?> dram</span>
				</div>

			<?php }else{?>
				<p style=" border:1px solid lightgrey; border-left:0; border-right:0;">You dont have Pending orders</p>
			<?php }
		?>


		<?php 
		$confirmedByAdminOrders = $model->confirmedByAdminOrders($userEmail);

			if(count($confirmedByAdminOrders) > 0){
			$total = 0; ?>

				<h3 style="margin-top:50px; text-align:center; font-size:30px; color:darkgrey;">Confirmed orders</h3>

				<div class="order_container">
					<table id='id_order_table' class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Image</th>
								<th>Name</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Sum</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php 
							foreach($confirmedByAdminOrders as $order){ ?>
								<tr>
									<td><img style="width: 100px;" src="../../admin/assets/img/<?=$order['vProdImage']?>"></td>
									<td><?=$order['vProdName']?></td>
									<td><?=$order['iProdPrice']?> dram</td>
									<td><?=$order['quantity']?></td>
									<td><?= $order['iProdPrice'] * $order['quantity'] ?> dram</td>
									<td>
										<?php if($order['orderStatus'] == 'Active'){ 
											$disabled = '';
											?>
											<span style="color:red;">PENDING</span>
										<?php }else{
											$disabled = 'disabled' ?>
											<span style="color:green;">Confirmed</span>
									<?php	} ?>
									</td>
									
								</tr>
						<?php  
						$total += $order['iProdPrice'] * $order['quantity'];
						} ?>
						</tbody>

					</table>
					<span style="float: right; font-weight: 500">Total: <?=$total?> dram</span>
				</div>
				

			<?php }else{ ?>
				<p style="text-align:center; margin-top:100px;border:1px solid lightgrey;border-left:0; border-right:0; ">You don't have orders confirmed by Admin</p>
		<?php  }
		?>



	<?php 	} else{ ?>

		<p style="text-align:center; margin-top:100px;">Please <a href="userLogin.php">Login</a> or <a href="userRegister.php">Register</a> if you want to see your orders</p>

	<?php }?>
</div>
<script type="text/javascript" src="../assets/js/userOrders.js"></script>

 <?php require_once('footer.php')?> 


</body>
</html>