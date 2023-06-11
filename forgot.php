<html>  
<head>  
    <title>Forgot Password</title>  
    <link href="src/css/style.css" rel="stylesheet">
</head>


<?php
include_once('database_config.php');
if(isset($_REQUEST['pwdrst']))
{
  $email = $_REQUEST['email'];
  $check_email = mysqli_query($conn,"select Email from user where Email='$email'");
  $res = mysqli_num_rows($check_email);
  if($res>0)
  {
    $message = '<div>
     <p><b>Hello!</b></p>
     <p>You are recieving this email because we recieved a password reset request for your account.</p>
     <br>
     <p><button class="button submit"><a href="http://localhost/educo-sliit/educo-sliit/passwordreset.php?secret='.base64_encode($email).'">Reset Password</a></button></p>
     <br>
     <p>If you did not request a password reset, no further action is required.</p>
    </div>';

include_once("SMTP/class.phpmailer.php");
include_once("SMTP/class.smtp.php");
$email = $email; 
$mail = new PHPMailer;
$mail->IsSMTP();
$mail->SMTPAuth = true;                 
$mail->SMTPSecure = "tls";      
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587; 
$mail->Username = "educo893@gmail.com";   
$mail->Password = "EDUCO2023";   
$mail->FromName = "Tech Area";
$mail->AddAddress($email);
$mail->Subject = "Reset Password";
$mail->isHTML( TRUE );
$mail->Body =$message;
if($mail->send())
{
  $msg = "We have e-mailed your password reset link!";
}
}
else
{
  $msg = "We can't find a user with that email address";
}
}

?>
<body>

       
       <p class="error"><?php if(!empty($msg)){ echo $msg; } ?></p>

       <div class="container-main" style="width:500px; margin:100px auto" >
			<div class="content">
				<div class="header"></div>
				<form id = "validate_form" method="post" enctype="multipart/form-data">
					<div class="form-title" style="text-align:center">Forgot Password</div>
					<div class="input-container">
						<input class="form-input" type="text" name="email" title="Enter your account Email"
       placeholder="Enter Email"/><br/>
					</div>
				
					<input class="button submit" type="submit" value="Reset Password" name="pwdrst" >
				</form>
     </form>
     </div>
   </div>  
  </div>
</body>
</html>