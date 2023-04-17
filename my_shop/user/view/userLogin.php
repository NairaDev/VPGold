<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
	body{
		
    background-color:#6e6966 !important;
    background-position:top right;
    background-repeat:no-repeat;
     background-size:71%;

  
	}
</style>
</head>
<body>

<body style="background-image:url('../assets/img/20.jpg');">
<section class="vh-100 bg-image" >
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-6">
        <div class="card rounded-3 text-black" style="border-radius: 15px; background-color:rgba(255,255,255, 0.1);">
        
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  
                  <h4 class="mt-1 mb-5 pb-1 text-center" >We are The VP GOLD Team</h4>
                </div>

                <form method="post">
                  <p>Please login to your account</p>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">Username</label>
                    <input type="email" name="email" id="form2Example11" class="form-control email"
                      placeholder="Phone number or email address" />
                    
                  </div>

                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example22">Password</label>
                    <input type="password" name="password" id="form2Example22" class="form-control password" />
                    
                  </div>

                 

                </form>
                <div class="text-center pt-1 mb-5 pb-1">
                <button name="action"  style="color:black !important; background-color:#706866;"  class="btn  btn-block btn-lg gradient-custom-4 text-body login" value="submit">log In</button>
                  </div>
                

                  <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>
    <div class="alert alert-danger" role="alert" style="display:none;" ></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- <div class="alert alert-success mx-auto" role="alert" style="display:none;"></div>
    <div class="alert alert-danger" role="alert" style="display:none;" ></div> -->
    <!-- <form method="post">
        <input type="email" name="email" class="email" placeholder="Enter email">
        <input type="password" name="password" class="password" placeholder="Enter password">
        
    </form>
    <button name="action" class="login" value="submit">log In</button>

    <div class="alert alert-success" role="alert" style="display:none;"></div>
    <div class="alert alert-danger" role="alert" style="display:none;" ></div> -->

   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript">
            $(function(){
                $('.login').click(function(){
                    let email = $('.email').val();
                    let password = $('.password').val();
                    $.ajax({
                        url:'../controller/userLoginController.php',
                        method:'post',
                        // type:'post',
                        dataType:'json',
                        data:{
                            email,
                            password,
                            action:'login'
                        },
                        success:function(data){
                            if(data['Action'] == '1'){
                                console.log(data);
                                $('.alert-success').html(data['message']);
                                $('.alert-success').fadeIn();
                                $('.alert-success').fadeOut(2500);
                                setTimeout(function(){
                                    location.href='../index.php';
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
   <?php
  // include_once('footer.php')?>
</body>
</html>