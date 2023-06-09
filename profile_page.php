<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/css/style_profile.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">
		
	<script src="src/js/navbar.js"></script>
    <title>EDUCO</title>
</head>
<body>
    <?php include 'common_pages/navbar.php';?>
    <section>
        <div class="alignMain">
            
                <form id="myForm" method="GET" action="">
                    <div class="menuclz">
                        <button type="submit" name="button" value="stats">stats</button>
                        <button type="submit" name="button" value="settings">Settings</button>
                        <button type="submit" name="button" value="profileImg">Change Profile Icon</button>
                        <button type="submit" name="button" value="changePw">Change Password</button>
                        <button type="submit" name="button" value="reset">Reset Data</button>
                        <button type="submit" name="button" value="reset">Delete Account</button>
                    </div>
                </form>
            
            <div>
            <?php
                echo"te";
            
            ?></div>
        </div>
    </section>
    
</body>
</html>