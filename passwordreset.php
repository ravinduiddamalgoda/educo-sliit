<html>  
<head>  
    <title>Password Reset</title> 
    <link href="src/css/style.css" rel="stylesheet"> 
</head>


<?php
include_once('database_config.php');
if(isset($_REQUEST['pwdrst']))
{
  $email = base64_decode($_GET['secret']);
  $pwd = $_REQUEST['pwd'];
  $cpwd = $_REQUEST['cpwd'];
  $Pwd = password_hash($pwd, PASSWORD_DEFAULT);
  $cPwd = password_hash($cpwd, PASSWORD_DEFAULT);
  if($pwd == $cpwd)
  {
    $reset_pwd = mysqli_query($conn,"update user set Password='$pwd' where Email='$email'");
    if($reset_pwd>0)
    {
      $msg = 'Your password updated successfully <a href="index.php">Click here</a> to login';
    }
    else
    {
      $msg = "Error while updating password.";
    }
  }
  else
  {
    $msg = "Password and Confirm Password do not match";
  }
}

if($_GET['secret'])
{
  $email = base64_decode($_GET['secret']);
  $check_details = mysqli_query($conn,"select Email from user where Email='$email'");
  $res = mysqli_num_rows($check_details);
  if($res>0)
    { ?>
<body>

  <div class="container-main" style="width:500px; margin:100px auto" >
			<div class="content">
				<div class="header"></div>
				<form id = "validate_form"  method="post" enctype="multipart/form-data">
					<div class="form-title" style="text-align:center">Reset Password</div>
					<div class="input-container">
						<input class="form-input" type="password" name="pwd" title="Enter password" required
       placeholder="Password"/><br/>
					</div>
					<div class="input-container">
						<input class="form-input" type="password" name="cpwd" title="Enter password again"
       placeholder="Confirm Password"/><br/>
					</div>
                   				
					<input class="button submit" type="submit" value="Reset Password" name="pwdrst" >
				</form>
<?php } } ?>
</body>
</html>