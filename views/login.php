<?php
include('configuratioon/functions.php');
$_SESSION['action'] = '';
?>
<link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.0.2/css/bootstrap.min.css'>
<link rel="stylesheet" href="config/core/login/style.css">
<style>
 body{
		background-image: url('imgs/back.png') !important;
		background-repeat: no-repeat !important;
		background-size: 100% !important;
}
 </style>
 
  <?php
  
		
		if(isset($_POST['student'])){
				$_SESSION['action'] = 'student';
		}
		if(isset($_POST['student_ws'])){
				if(user_verify($_POST['rollname'],'new_user_5798722')){
					$_SESSION['admin_user'] = 1;
					header("Refresh:0");
					
				}
				else{
					
				}
		}
	  if(isset($_POST['otp'])){
			if(user_verify($_POST['username'],$_POST['password'])){
				$_SESSION['action'] = 'otp';
				$_SESSION['admin_user'] = 1;
				header("Refresh:0");
			}
			else{
				
			}
		}
		if(isset($_POST['verifed'])){
			if(otp_verify($_POST['code'])){
				header('Location: index.php'); 
			}
			else{
				header('Location: index.php'); 
			}
		}
  if(($_SESSION['action'] == 'otp')){
  ?>
  <div class="container be-detail-container">
  <img src="imgs/login_req.gif"/>
    <div class="row" style="display:none">
	
	
			<div class="col-sm-6 col-sm-offset-3">
            <br>
			
			</div>
            <img src="imgs/otp.png" class="img-responsive" style="width:200px; height:200px;margin:0 auto;"><br>
            
            <h1 class="text-center" style="color: white;">Verify your Email number</h1><br>
            <p class="lead" style="align:center"></p><p style="color: white;"> Thanks for giving your details. An OTP has been sent to your Registred Enail. Please enter the 4 digit OTP below for Successful Registration</p>  <p></p>
			<br>
       
            <form method="post" id="veryfyotp" action="">
                <div class="row">                    
                <div class="form-group col-sm-8">
                	 <span style="color:red;"></span>                   
					 <input type="text" class="form-control" name="code" placeholder="Enter your OTP number" required="">
                </div>
                <button type="submit" name="verifed" class="btn btn-primary  pull-right col-sm-3">Verify</button>
                </div>
            </form>
			
        <br><br>
        </div>
    </div>        
</div>
<?php
  }
  else if(($_SESSION['action'] == 'student')){
	?>
 <div class="wrapper" id="student_home">
    <form class="form-signin" action="" method="post" style="border-radius: 4%;background-color: #f2edcd;">       
      <h2 class="form-signin-heading"><center><img src="imgs/logo.png" style="width: 100%;border-radius: 16px;"/></center></h2>
      <input type="text" class="form-control" name="rollname" placeholder="Roll Number" required>      
	  <br/>
      <button class="btn btn-lg btn-primary btn-block" name="student_ws" type="submit">Login</button> 
    </form>
  </div>
  <?php
  }
  else
  {
?>
 <div class="wrapper" id="admin_home">
    <form class="form-signin" action="" method="post" style="border-radius: 4%;background-color: #f2edcd;">       
      <h2 class="form-signin-heading"><center><img src="imgs/logo.png" style="width: 100%;border-radius: 16px;"/></center></h2>
      <input type="text" class="form-control" name="username" placeholder="Email Address">
      <input type="password" class="form-control" name="password" placeholder="Password">      
      <button class="btn btn-lg btn-primary btn-block" name="otp" type="submit">Login</button>  
    </form>
  </div>
  <?php
  }
  ?>