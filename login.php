<!doctype html>
<html lang="en">
	<head>
		<title>EDUCO</title>
		<link href="src/css/style.css" rel="stylesheet">
		
	</head>
	<body>
		<div class="container-main" style="width:500px; " >
			<div class="content">
				<div class="header"></div>
				<form id = "new_game" action="include/login.inc.php" method="post" enctype="multipart/form-data">
					<div class="form-title" style="text-align:center">Sign Up</div>
					<div class="input-container">
						<input class="form-input" type="text" name="uname" title="Enter your account username"
       placeholder="Username"/><br/>
					</div>
			
                    <div class="input-container">
						<input class="form-input" type="password" name="pwd" title="Enter your password"
       placeholder="Password"/><br/>
					</div>	
                   					
					<input class="button submit" type="submit" value="Submit" name="submit" >
				</form>
			</div>
		</div>
	</body>
</html>