<?php 
session_start();
include('../model/model.php');


include_once('header.php');


?>


<!DOCTYPE html>
<html>
<head>
	<title>Orders</title>
</head>
<body>

	<div class="container-fluid">
	<?php 	$orders = $model->getOrdersForAdmin();

		if(count($orders) > 0){
			$total = 0;
		 ?>
          <h3>New orders</h3>
		 <div class="alert alert-success alert_success" style="display: none;" role="alert"></div>
			<div class="alert alert-danger alert_error" style="display: none;" role="alert"></div>

			<h3>Sent orders</h3>

			<div class="order_container">
				<table id='id_order_table' class="table table-bordered table-hover">
					<thead>
						<tr>
							<th>Image</th>
							<th>Name</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Sum</th>
							<th>User Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Status</th>
							<th>Actions</th>
						</tr>
					</thead>
					<tbody>
						<?php 
						foreach($orders as $order){ ?>
							<tr>
								<td><img style="width: 100px;" src="../assets/img/<?=$order['vProdImage']?>"></td>
								<td><?=$order['vProdName']?></td>
								<td><?=$order['iProdPrice']?> dram</td>
								<td><?=$order['quantity']?></td>
								<td><?= $order['iProdPrice'] * $order['quantity'] ?> dram</td>
								<td><?=$order['userName']?></td>
								<td><?=$order['phone']?></td>
								<td><?=$order['userEmail']?></td>
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
								<td><button class="btn btn-primary confirmOrder" <?=$disabled;?> data-id="<?=$order['iOrderId']?>" >Confirme</button></td>
							</tr>
					<?php  
					$total += $order['iProdPrice'] * $order['quantity'];
					 } ?>
					</tbody>

				</table>
				<span style="float: right; font-weight: 500">Total: <?=$total?> dram</span>
			</div>

		<?php }else{?>
			<p>You dont have orders</p>
		<?php }
	 ?>

	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <script type="text/javascript">
  	
  	$(function(){
  		$('.confirmOrder').on('click', function(){
  			let orderId = $(this).data('id');

  			$.ajax({
  				url:'../controller/productController.php',
  				method:'post',
  				dataType:'json',
  				data:{
  					orderId,
  					action:'confirmOrder'
  				},
  				success: function(data){
				if(data['Action'] == '1'){
					$('.alert_success').html(data['message']);
					$('.alert_success').fadeIn();
					$('.alert_success').fadeOut(2000);
					setTimeout(function(){
						location.reload();
					},2000);
				}else{
					$('.alert_error').html(data['message']);
					$('.alert_error').fadeIn();
					$('.alert_error').fadeOut(2000);
					setTimeout(function(){
						location.reload();
					},2000);
				}
			}

  			})
  		})
  	})
  </script>
  </div>

</body>
</html>