<!DOCTYPE html>
<html>
<head>
	<title>Products</title>

</head>
<body>

	<?php include_once('header.php'); ?>
  <div class="dropdown">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Dropdown button
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </div>
</div>






		<?php $products = $model->get_products($catId);

		if(count($products) > 0){

		?>

<main style="padding-bottom:50px;">
    <div class="container-fluid wrapper">
        <div class="row" style="padding-top:50px">
        <?php 
        // $allNew = $model->allNew();
        // if(count($allNew)>0){ ?>
           <?php foreach($products as $prod){ ?>
            <div class="col-lg-3" style="margin-bottom:40px; ">
            <div class="card" style="width: 100%; border-radius:8px;">
                <img width="100%" height="300px" class="card-img-top" src="../../admin/assets/img/<?=$prod['vProdImage']?>" alt="Card image cap">
                <div class="card-body"  style="text-align:center">
                    <h5 class="card-title"><?=$prod['vProdName']?></h5>
                    <h5 class="card-title">Price: <?=$prod['iProdPrice']?> </h5>
                    <p class="card-text" style="font-weight:800;"> VP GOLD</p>
                    <p class="card-text" style="font-weight:800;"><?=substr($prod['vProdDesc'],0,50).' ...';?></p>
                    <button class="btn btn-success addToCard" data-value='<?=$userEmail?>' value='<?=$prod['iProdId']?>'>Add to Card</button>
                </div>
               </div>
            </div>
           <?php }
        }else{ ?>
        <p>Nothing to show</p>
   <?php   } ?>

    </div>
</div>
</main>

		 <div class="alert alert-success alert_success" style="display: none;" role="alert"></div>
		<div class="alert alert-danger alert_error" style="display: none;" role="alert"></div>

		
	




<!-- Read more Modal -->
<div class="modal fade" id="read_more_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="read_more_title"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body read_more_desc">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<!-- Check user Login modal -->

<div class="modal fade" id="check_login" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="check_login_title">Permision denied</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<p>In you want to add to card please <b>Login</b> or <b>Register</b></p>
      </div>
      <div class="modal-footer">
       	<a href="userRegister.php" class="btn btn-primary">Register</a>
       	<a href="userLogin.php" class="btn btn-primary">Login</a>
      </div>
    </div>
  </div>
</div>


	<script type="text/javascript" src="../assets/js/userProducts.js"></script>
<?php include_once('footer.php')?>
</body>
</html>