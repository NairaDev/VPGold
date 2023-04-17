<?php 
session_start();
include('model/model.php');
if(!isset($_SESSION['adminEmail'])){
	header('location:view/registration.php');
}


?>



<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>
	
<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light nav_header">
      <a class="navbar-brand nav_logo" href="#"  style="font-size:25px; fonr-weight:30px; letter-spacing:5px;">VP<i class="fa fa-diamond" aria-hidden="true"></i>GOLD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
         
          <li class="nav-item">
            <a  class="nav-link nav_menu_a" style="font-size:25px; letter-spacing:5px;" href="view/orders.php">Orders</a>
          </li>
          
						
			
        </ul>
        <div class="d-flex align-items-center">
          <a href="view/registration.php">
            <svg aria-hidden="true" focusable="false" role="presentation" viewBox="0 0 64 64" width="40" height="40"><path d="M35 39.84v-2.53c3.3-1.91 6-6.66 6-11.41 0-7.63 0-13.82-9-13.82s-9 6.19-9 13.82c0 4.75 2.7 9.51 6 11.41v2.53c-10.18.85-18 6-18 12.16h42c0-6.19-7.82-11.31-18-12.16z" stroke="#000" fill="black"></path></svg>
          </a>
          <a href="controller/logautController.php">
          <svg width="40px" height="40px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon">
  <path d="M868 732h-70.3c-4.8 0-9.3 2.1-12.3 5.8-7 8.5-14.5 16.7-22.4 24.5a353.84 353.84 0 0 1-112.7 75.9A352.8 352.8 0 0 1 512.4 866c-47.9 0-94.3-9.4-137.9-27.8a353.84 353.84 0 0 1-112.7-75.9 353.28 353.28 0 0 1-76-112.5C167.3 606.2 158 559.9 158 512s9.4-94.2 27.8-137.8c17.8-42.1 43.4-80 76-112.5s70.5-58.1 112.7-75.9c43.6-18.4 90-27.8 137.9-27.8 47.9 0 94.3 9.3 137.9 27.8 42.2 17.8 80.1 43.4 112.7 75.9 7.9 7.9 15.3 16.1 22.4 24.5 3 3.7 7.6 5.8 12.3 5.8H868c6.3 0 10.2-7 6.7-12.3C798 160.5 663.8 81.6 511.3 82 271.7 82.6 79.6 277.1 82 516.4 84.4 751.9 276.2 942 512.4 942c152.1 0 285.7-78.8 362.3-197.7 3.4-5.3-.4-12.3-6.7-12.3zm88.9-226.3L815 393.7c-5.3-4.2-13-.4-13 6.3v76H488c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h314v76c0 6.7 7.8 10.5 13 6.3l141.9-112a8 8 0 0 0 0-12.6z"/>
</svg>
            <!-- <svg aria-hidden="true" focusable="false" role="presentation" viewBox="0 0 64 64" width="40" height="40"><path d="M35 39.84v-2.53c3.3-1.91 6-6.66 6-11.41 0-7.63 0-13.82-9-13.82s-9 6.19-9 13.82c0 4.75 2.7 9.51 6 11.41v2.53c-10.18.85-18 6-18 12.16h42c0-6.19-7.82-11.31-18-12.16z" stroke="#000" fill="transparent"></path>OUT</svg> -->
          </a>
       
        </div>
       
      </div>
    </nav>
		
	</header> 


	<!-- <div class="add_category_container" style="width:50%; margin:auto;">
		<form style="width:40%" action="controller/categoryController.php" method="post" class="my-5 mx-auto text-center">
			<label for="catName" class=" d-block text-left">Add Name</label>
			<input type="text" name="catName " id="catName" class="form-control mb-3">
			<button type="submit" name="action" value="addCategory" class="btn btn-success px-5 py-2">Add</button>
		</form>
		<?php 
		if(isset($_SESSION['status'])){
			if($_SESSION['status'] == 'success'){ ?>
				<div class="alert alert-success" role="alert"><?= $_SESSION['message']?></div>

			<?php }elseif($_SESSION['status'] == 'error'){ ?>
				<div class="alert alert-danger" role="alert"><?= $_SESSION['message']?></div>
			<?php	}
			unset($_SESSION['status']);
			unset($_SESSION['message']);
		}
		?>
	</div>


	<div class="display_categories_container" style="width:100%">
		<div class="alert alert-success" role="alert" style="display: none;"></div>
		<div class="alert alert-danger" role="alert" style="display: none;"></div>
		<?php $show_all_categories = $model->show_all_categories();
		if(count($show_all_categories)>0){ ?>
	
			<table class="table table-hover mx-auto" style="width: 50%;border: 1px solid #ced4da;">
				<thead>
					<tr>
						<th class="border-0">Category Name</th>
						<th class="border-0"></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($show_all_categories as $category){?>
						<tr>
							<td contenteditable="" class="catName align-middle"><?= $category['vCatName']?></td>
							<td class="text-right">
								<a class="btn btn-info" target="_blank" href="view/products.php?catId=<?=$category['iCatId']?>&catName=<?=$category['vCatName']?>">Open</a>
								<button class="btn btn-warning updateCat" data-value="<?=$category['iCatId']?>">Update</button>
								<button class="btn btn-danger deleteCat" data-value="<?=$category['iCatId']?>">Delete</button>

							</td>
						</tr>
					<?php } ?> 
				</tbody>
			</table>
			
		<?php }else{ ?>
			<p>No results to display</p>
		<?php } ?>
	</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
  	$(function(){
  		$('.updateCat').on('click', function(){
  			let catName = $('.catName').html();
  			let catId = $(this).data('value');

  			$.ajax({
  				url:'controller/categoryController.php',
  				method:'post',
  				dataType:'json',
  				data:{
  					catName,
  					catId,
  					action:'updateCat'
  				},
  				success: function(data){
  					if(data['Action'] == '1'){
  						$('.alert-success').html(data['message']);
  						$('.alert-success').fadeIn();
  						$('.alert-success').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}else{
  						$('.alert-danger').html(data['message']);
  						$('.alert-danger').fadeIn();
  						$('.alert-danger').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}
  				}
  			})
  			
  		})



  		$('.deleteCat').on('click', function(){
  			let catId = $(this).data('value');

  			$.ajax({
  				url:'controller/categoryController.php',
  				method:'post',
  				dataType:'json',
  				data:{
  					catId,
  					action:'deleteCat'
  				},
  				success: function(data){
  					if(data['Action'] == '1'){
  						$('.alert-success').html(data['message']);
  						$('.alert-success').fadeIn();
  						$('.alert-success').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}else{
  						$('.alert-danger').html(data['message']);
  						$('.alert-danger').fadeIn();
  						$('.alert-danger').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}
  				}
  			})
  			
  		})
  	})
  	
  </script>
</body>
</html> -->

<div class="add_category_container"  style="width:50%; margin:auto;">
		<form style="width:40%;" action="controller/categoryController.php" method="post" class="my-5 mx-auto text-center">
			<label for="catName" class=" d-block text-left">Add Name</label>
			<input type="text" name="catName" id="catName" class="form-control mb-3">

			<button type="submit" name="action" value="addCategory" class="btn btn-success px-5 py-2">Add</button>
		</form>
		<?php 
		if(isset($_SESSION['status'])){
			if($_SESSION['status'] == 'success'){ ?>
				<div class="alert alert-success" role="alert"><?= $_SESSION['message']?></div>

			<?php }elseif($_SESSION['status'] == 'error'){ ?>
				<div class="alert alert-danger" role="alert"><?= $_SESSION['message']?></div>
			<?php	}
			unset($_SESSION['status']);
			unset($_SESSION['message']);
		}
		?>
	</div>


	<div class="display_categories_container">
		<div class="alert alert-success" role="alert" style="display: none;"></div>
		<div class="alert alert-danger" role="alert" style="display: none;"></div>
		<?php $show_all_categories = $model->show_all_categories();
		if(count($show_all_categories)>0){ ?>
			<table class="table table-hover mx-auto" style="width: 50%; border: 1px solid #ced4da;">
				<thead>
					<tr>
						<th>Category Name</th>
						<th style="width: 42%;">Actions</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($show_all_categories as $category){?>
						<tr>
							<td contenteditable="" class="catName align-middle"><?= $category['vCatName']?></td>
							<td class="text-right" >
								<a class="btn btn-info" target="_blank" href="view/products.php?catId=<?=$category['iCatId']?>&catName=<?=$category['vCatName']?>">Open</a>
								<button class="btn btn-warning updateCat" data-value="<?=$category['iCatId']?>">Update</button>
								<button class="btn btn-danger deleteCat" data-value="<?=$category['iCatId']?>">Delete</button>

							</td>
						</tr>
					<?php } ?> 
				</tbody>
			</table>
		<?php }else{ ?>
			<p>No results to display</p>
		<?php } ?>
	</div>


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">
  	$(function(){
  		$('.updateCat').on('click', function(){
  			let catName = $('.catName').html();
  			let catId = $(this).data('value');

  			$.ajax({
  				url:'controller/categoryController.php',
  				method:'post',
  				dataType:'json',
  				data:{
  					catName,
  					catId,
  					action:'updateCat'
  				},
  				success: function(data){
  					if(data['Action'] == '1'){
  						$('.alert-success').html(data['message']);
  						$('.alert-success').fadeIn();
  						$('.alert-success').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}else{
  						$('.alert-danger').html(data['message']);
  						$('.alert-danger').fadeIn();
  						$('.alert-danger').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}
  				}
  			})
  			
  		})



  		$('.deleteCat').on('click', function(){
  			let catId = $(this).data('value');

  			$.ajax({
  				url:'controller/categoryController.php',
  				method:'post',
  				dataType:'json',
  				data:{
  					catId,
  					action:'deleteCat'
  				},
  				success: function(data){
  					if(data['Action'] == '1'){
  						$('.alert-success').html(data['message']);
  						$('.alert-success').fadeIn();
  						$('.alert-success').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}else{
  						$('.alert-danger').html(data['message']);
  						$('.alert-danger').fadeIn();
  						$('.alert-danger').fadeOut(2500);
  						setTimeout(function(){
  							location.reload();
  						},3000);
  					}
  				}
  			})
  			
  		})
  	})
  	
  </script>
  
</body>
</html>