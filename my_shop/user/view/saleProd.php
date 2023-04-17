<!DOCTYPE html>
<html>
<head>
	<title>Cards</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
    img{
        transition:1.5s;
    }
    img:hover{
    transform:scale(1.1);
    }
    .but{
        background-color:grey !important;
        color:black;
       

    
    }
</style>

</head>
<body>

	 <?php include_once('header.php'); ?>


	

<main style="padding-bottom:50px;">
    <div class="container-fluid wrapper">
        <div class="row" style="padding-top:50px">
        <?php 
        $allSale = $model->allSale();
        if(count($allSale)>0){ ?>
           <?php foreach($allSale as $sale){ ?>
            <div class="col-lg-3" style="margin-bottom:40px" >
            <div class="card" style="width: 100%;">
                <img width="100%" height="300px" class="card-img-top" src="../../admin/assets/img/<?=$sale['vProdImage']?>   " alt="Card image cap">
                <div class="card-body"  style="text-align:center">
                    <h5 class="card-title"><?=$sale['vProdName']?></h5>
                    <h5 class="card-title">Price: <?=$sale['iProdPrice']?> </h5>
                    <p class="card-text" style="font-weight:800;">Only this week <br> you can buy it with a <br> 20% discount.</p>
                    <p class="card-text" style="font-weight:800;"><?=substr($sale['vProdDesc'],0,50).' ...';?></p>
                    <button class="btn btn-success but addToCard" style="padding: 10px 60px;" data-value='<?=$userEmail?>' value='<?=$top['iProdId']?>'>Add to Card</button>
                </div>
               </div>
            </div>
           <?php }
        }else{ ?>
        <p>Nothing to show</p>
   <?php   } ?>

    </div>
</div>

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
</main>
<script type="text/javascript" src="../assets/js/userProducts.js"></script>
<?php include_once('footer.php'); ?>