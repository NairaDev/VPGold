  <?php 
session_start();
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<style>
	body{
		
    background-color:#6e6966 !important;
    background-position:top right;
    background-repeat:no-repeat;
     background-size:71%;

	}
</style>

</head>
<body style="background-image:url('../assets/img/20.jpg'); padding-top:50px;">
<section class="vh-100 bg-image"
  style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
  <div class="mask d-flex align-items-center h-100 gradient-custom-3">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px; background-color:rgba(255,255,255, 0.1);">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Create an account</h2>

              <form action="../controller/userRegisterController.php" method="post">

                <div class="form-outline mb-4">
                  <input type="text" name="name" placeholder="name" id="form3Example1cg" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="form3Example1cg">Your Name</label> -->
                </div>
				<div class="form-outline mb-4">
                  <input type="text" placeholder="Surname" name="surName" id="form3Example1cg" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="form3Example1cg">Your Surame</label> -->
                </div>

                <div class="form-outline mb-4">
                  <input type="email" placeholder="Email" name="mail"  id="form3Example3cg" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="form3Example3cg">Your Email</label> -->
                </div>
				<div class="form-outline mb-4">
                  <input type="number" placeholder="Phone" name="phone"  id="form3Example3cg" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="form3Example3cg">Your Email</label> -->
                </div>

                <div class="form-outline mb-4">
                  <input placeholder="Password" type="password" name="password"  id="form3Example4cg" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="form3Example4cg">Password</label> -->
                </div>

                <div class="form-outline mb-4">
                  <input placeholder="Repeat your password" type="password" name="confPass" id="form3Example4cdg" class="form-control form-control-lg" />
                  <!-- <label class="form-label" for="form3Example4cdg">Repeat your password</label> -->
                </div>

                <div class="d-flex justify-content-center">
				<button type="submit" name="action" value="submit" class="btn  btn-block btn-lg gradient-custom-4 text-body" style="background-color:#706866;">Register</button>

                </div>

                <p class="text-center text-muted mt-5 mb-0" style="color:black !important;">Have already an account? <a href="userLogin.php"
                    class="fw-bold text-body"><u>Login here</u></a></p>

              </form>
			
            </div>
			<?php
			if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
			}
			
			?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

	<!-- <form action="../controller/userRegisterController.php" method="post">
		<div>
			<label for="name"> Enter Name
				<input type="text" name="name" id="name">
			</label>	
		</div>
		
		<div>
			<label for="surName"> Enter Surname
				<input type="text" name="surName" id="surName">
			</label>	
		</div>

		<div>
			<label for="mail"> Enter mail
				<input type="mail" name="mail" id="mail">
			</label>	
		</div>

		<div>
			<label for="phone"> Enter phone
				<input type="text" name="phone" id="phone">
			</label>	
		</div>

		<div>
			<label for="password"> Enter password
				<input type="password" name="password" id="password">
			</label>	
		</div>

		<div>
			<label for="confPass"> Confirm password
				<input type="confPass" name="confPass" id="confPass">
			</label>	
		</div>
		
		<button type="submit" name="action" value="submit">Register</button>
	</form> -->

	<?php 

	// if(isset($_SESSION['error'])){
	// 	echo $_SESSION['error'];
	// 	unset($_SESSION['error']);
	// }
	
	// ?>

	<!-- <div>
		<p>If already has account please <a href="userLogin.php">LogIn</a> </p>
	</div> -->

</body>
</html>