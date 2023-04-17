<?php 

session_start();
include('model/model.php');

?>


<!DOCTYPE html>
<html>
<head>
	<title>Home Page</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/style_index.css"> 
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>


<header>

    <nav class="navbar navbar-expand-lg navbar-light bg-light nav_header">
      <a class="navbar-brand nav_logo" href="#">VP<i class="fa fa-diamond" aria-hidden="true"></i>GOLD</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>


      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item active">
            <a class="nav-link nav_menu_a" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link nav_menu_a" href="view/userCards.php">Cards</a>
          </li>
          <li class="nav-item">
            <a  class="nav-link nav_menu_a" href="view/userOrders.php">Orders</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle nav_menu_a" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categories
            </a>
            <div class="dropdown-menu">
              <?php $show_all_categories = $model->show_all_categories();

     foreach($show_all_categories as $cat){ ?>

       <a  style="font-size:30px; text-decoration:underline;" class="dropdown-item" href="view/userProducts.php?catId=<?=$cat['iCatId']?>&catName=<?=$cat['vCatName']?>"><?=$cat['vCatName']?></a>

            <?php 	}
              ?>
						
					</div>
          </li>
        </ul>
        <div class="d-flex align-items-center">
          <a href="view/userRegister.php">
          <svg aria-hidden="true" focusable="false" role="presentation" viewBox="0 0 64 64" width="40" height="40"><path d="M35 39.84v-2.53c3.3-1.91 6-6.66 6-11.41 0-7.63 0-13.82-9-13.82s-9 6.19-9 13.82c0 4.75 2.7 9.51 6 11.41v2.53c-10.18.85-18 6-18 12.16h42c0-6.19-7.82-11.31-18-12.16z" stroke="#000" fill="black"></path></svg>
          </a>
          <a href="controller/logautController.php">
          <svg width="40px" height="40px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg" class="icon">
  <path d="M868 732h-70.3c-4.8 0-9.3 2.1-12.3 5.8-7 8.5-14.5 16.7-22.4 24.5a353.84 353.84 0 0 1-112.7 75.9A352.8 352.8 0 0 1 512.4 866c-47.9 0-94.3-9.4-137.9-27.8a353.84 353.84 0 0 1-112.7-75.9 353.28 353.28 0 0 1-76-112.5C167.3 606.2 158 559.9 158 512s9.4-94.2 27.8-137.8c17.8-42.1 43.4-80 76-112.5s70.5-58.1 112.7-75.9c43.6-18.4 90-27.8 137.9-27.8 47.9 0 94.3 9.3 137.9 27.8 42.2 17.8 80.1 43.4 112.7 75.9 7.9 7.9 15.3 16.1 22.4 24.5 3 3.7 7.6 5.8 12.3 5.8H868c6.3 0 10.2-7 6.7-12.3C798 160.5 663.8 81.6 511.3 82 271.7 82.6 79.6 277.1 82 516.4 84.4 751.9 276.2 942 512.4 942c152.1 0 285.7-78.8 362.3-197.7 3.4-5.3-.4-12.3-6.7-12.3zm88.9-226.3L815 393.7c-5.3-4.2-13-.4-13 6.3v76H488c-4.4 0-8 3.6-8 8v56c0 4.4 3.6 8 8 8h314v76c0 6.7 7.8 10.5 13 6.3l141.9-112a8 8 0 0 0 0-12.6z"/>
</svg>
          </a>
          <div class="dropdown">
              <button class="btn  dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-language fa_lang" aria-hidden="true"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="#">Armenian</a>
              <a class="dropdown-item" href="#">Russhian</a>
              <a class="dropdown-item" href="#">English</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
		
	</header> 
	<main>
  <div id="carouselExampleControls" class="carousel slide div_carusel" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100 img_4" src="assets/img/8.webp" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img_4"  src="assets/img/23.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100 img_4" src="assets/img/22.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<div class="container-fluid wrapper section1">
    <div class="row main_row_card">
      <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card card_body card_body_main" style="width: 100%;">
       <img class="card-img-top card_img"  height="400px" src="assets/img/sale1.jpg" alt="Card image cap">
       <div class="card-body">
    <h5 class="card-title">SALE</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="view/userProducts.php?catId=<?=$cat['iCatId']?>" class="btn btn-secondary btn_mx ">SEE MORE</a>
  </div>
</div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-12 ">
      <div class="card card_body card_body_main" style="width: 100%;">
       <img class="card-img-top card_img" height="400px" src="assets/img/new2.jpg" alt="Card image cap">
       <div class="card-body">
    <h5 class="card-title">NEW COLLECTION</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="view/userProducts.php?catId=8" class="btn btn-secondary btn_mx">SEE MORE</a>
  </div>
      </div>
      <!-- ?catId=8 -->
  </div>
      <div class="col-lg-4 col-md-6 col-sm-12">
      <div class="card card_body card_body_main" style="width: 100%;">
       <img class="card-img-top card_img"  height="400px" src="assets/img/top1.jpg" alt="Card image cap">
       <div class="card-body">
    <h5 class="card-title">TOP PRODUCTS</h5>
    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    <a href="view/userProducts.php?catId=9" class="btn btn-secondary btn_mx">SEE MORE</a>
  </div>
      </div>

    </div>

  </div>
              </div>
<div class="container-fluid div1">
<div class="container-fluid wrapper div2">
<div class="row align-items-center mb-5">
  <div class="col-lg-7">
  <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F3d.rhino%2Fvideos%2F1680938101976721%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
  </div>
  <div class="col-lg-5">
    <h1> So what are we doing?</h1>
    <p>
   
Jewelry 3D models and parts <br>
Textures, HDRI environment maps, material libraries<br>
Render scene setups for 3ds Max, Rhinoceros, Maya, Cinema 4D, KeyShot,<br>
V-Ray, Iray, OctaneRender, Blender<br>
Turntable animation<br>
Online video course<br>
Graphic templates and illustrations<br>

    </p>
  </div>
</div>

<div class="row align-items-center main_div_video">
  <div class="col-lg-5">
    <h1>Our team is developing digital assets for great jewelry design and visualization.</h1>

    <p>Jewelry 3D models and parts, textures, HDRI environment maps, material libraries, scene setups for photorealistic jewelry renderings, website banners, jewelry graphic templates and illustrations, etc.

We have at a great price and completely free jewelry assets.</p>
  </div>
  <div class="col-lg-7 text-right">
  <iframe src="https://www.facebook.com/plugins/video.php?height=314&href=https%3A%2F%2Fwww.facebook.com%2F3d.rhino%2Fvideos%2F1661322967271568%2F&show_text=false&width=560&t=0" width="560" height="314" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
</div>

  </div>
  </div>
  
  
<section class="container-fluid section_program_icon">
<div>
<hr>
  <h1 class="h1_main">
WHAT IS PROGRAMS WE USE
</h1>
</div>

<div class="img_prog">
 
  <ul>
    <li><img src="assets/img/rhino.webp" alt=""> </li>
    <li> <img src="assets/img/3d.webp" alt=""></li>
    <li><img src="assets/img/11.webp" alt=""></li>
    <li><img src="assets/img/12.webp" alt=""></li>
  </ul>
</div>
</section>
</main>

<footer >
  <div class="row">
    <div class="col lg-3">
      <h6>     
       <a class="a_foot" href="#">VP<i class="fa fa-diamond" aria-hidden="true"></i>GOLD</a>
      </h6>
      <p class="p_footer"> 3DJewels – CGI and 3D assets source for jewelry  design and photorealistic rendering. Photorealistic render scene setups, jewelry HDRI, textures, images, material libraries, 3D models. <br>
         Royalty-free download.</p>
    </div>
    <div class="col lg-3 foot_2">
    <h6> USER CARE</h6>
    <ul>
      <li>About Us</li>
      <li>Contact & Support</li>
      <li>FAQ</li>
      <li>Learn</li>
      <li>Discounts</li>
      <li>Payment Methods</li>
      <li>Your account</li>
      <li>News subscription</li>
</ul>
    </div>
    <div class="col lg-3">
    <h6> LEGAL TERMS</h6>
    <ul>
      <li>License & Rights</li>
      <li>Payment Security</li>
      <li>Privacy Policy
</li>
      <li>Delivery Policy
</li>
      <li>Terms and Conditions
</li>
      <li>Refund Policy
</li>

</ul>
    </div>
    <div class="col lg-3">
      <h6 class="foot_fin" style="margin-left:30px;">FOLLOW US</h6>
      <a class="a_foot" href="https://www.facebook.com/3d.rhino" target="_blank"><i class="fa fa-facebook fa_foot" aria-hidden="true"></i>
</a>
      <a class="a_foot" href="https://instagram.com/3doss_3d_designer?igshid=YmMyMTA2M2Y=" target="_blank">
      <i class="fa fa-instagram fa_foot" aria-hidden="true"></i>

      </a>
  
      <a class="a_foot" href=""><i class="fa fa-linkedin-square fa_foot" aria-hidden="true"></i>
</a>
    </div>
  </div>

</footer>
</body>
</html>