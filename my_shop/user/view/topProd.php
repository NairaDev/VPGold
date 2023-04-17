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
        background-color:black !important;
        color:white;
        
    }
</style>

</head>
<body>

	 <?php include_once('header.php'); ?>


	

<main style="padding-bottom:50px;">
    <div class="container-fluid wrapper">
        <div class="row" style="padding-top:50px">
        <?php 
        $allTop = $model->allTop();
        if(count($allTop)>0){ ?>
           <?php foreach($allTop as $top){ ?>
            <div class="col-lg-3" style="padding-bottom:50px">
            <div class="card" style="width: 18rem;">
                <img width="100%" height="300px" class="card-img-top" src="../../admin/assets/img/<?=$top['vProdImage']?>   " alt="Card image cap">
                <div class="card-body"  style="text-align:center">
                    <h5 class="card-title"><?=$top['vProdName']?></h5>
                    <h5 class="card-title">Price: <?=$top['iProdPrice']?> </h5>
                    <p class="card-text" style="font-weight:800;"> 20% discount.</p>
                    <p class="card-text" style="font-weight:800;"><?=substr($top['vProdDesc'],0,50).' ...';?></p>
                    
                    <button class="btn btn-success but addToCard" style="padding: 10px 60px;" data-value='<?=$userEmail?>' value='<?=$sale['iProdId']?>'>Add to Card</button>
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