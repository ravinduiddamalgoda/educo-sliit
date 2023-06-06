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
				<form id = "new_game" action="include/signup.inc.php" method="post" enctype="multipart/form-data">
					<div class="form-title" style="text-align:center">Sign Up</div>
					<div class="input-container">
						<input class="form-input" type="text" name="uid" title="Enter your account username"
       placeholder="Username"/><br/>
					</div>
					<div class="input-container">
						<input class="form-input" type="text" name="email" title="Enter your account Email"
       placeholder="Email"/><br/>
					</div>
                    <div class="input-container">
						<input class="form-input" type="text" name="age" title="Enter your age"
       placeholder="Age"/><br/>
					</div>
                   
                   
		<div class="main-radio-container">
			<div class="radio-container">
					<input class="form-radio" type="radio" name="gender" value="Male"/>
					<label for="Male">Male</label><br/>
			</div>
			<div class="radio-container">
					<input class="form-radio" type="radio" name="gender" value="Female"/>
					<label for="Female">Female</label><br/>
			</div>
					<br/>
        </div>

        <div class="main-radio-container">
			<div class="radio-container">
					<input class="form-radio" type="radio" name="aType" value="Student"/>
					<label for="Student">Student</label><br/>
			</div>
			<div class="radio-container">
					<input class="form-radio" type="radio" name="aType" value="Developer"/>
					<label for="Developer">Developer</label><br/>
			</div>
					<br/>
        </div>

                    <div class="input-container">
						<input class="form-input" type="password" name="pwd" title="Enter secured password"
       placeholder="Password"/><br/>
					</div>	
                    <div class="input-container">
						<input class="form-input" type="password" name="pwdrepeat" title="Repeat the entered password"
       placeholder="Repeat password"/><br/>
					</div>					
					<input class="button submit" type="submit" value="Submit" name="submit" >
				</form>
			</div>
		</div>
	</body>
</html>