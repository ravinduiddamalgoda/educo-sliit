<?php include_once ('sessions.php');?>
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
    <?php include 'common_pages/adspace.php';?>
    <?php include 'common_pages/navbar.php';?>   
    <section>
        <div class="alignMain">
            
                <form id="myForm" method="GET" action="">
                    <div class="menuclz">
                        <button type="submit" name="button" value="stats" class="btnClzMenu" style="border-top-left-radius: 20px; border-top-right-radius: 20px;">Approve games</button> 
                        <!-- methent aprove games eka danna  and CSS update kranna -->
                        <button type="submit" name="button" value="settings"  class="btnClzMenu">Settings</button>
                        <button type="submit" name="button" value="profileImg" class="btnClzMenu">Change Profile Icon</button>
                        <button type="submit" name="button" value="changePw" class="btnClzMenu">Change Password</button>
                        <button type="submit" name="button" value="reset" class="btnClzMenu">Reset Data</button>
                        <button type="submit" name="button" value="delete" class="btnClzMenu" style="border-bottom-left-radius: 20px; border-bottom-right-radius: 20px;">Delete Account</button>
                    </div>
                </form>
            
            <div class="dataSection">
            <?php
                if (isset($_GET['button'])) {
                    $button = $_GET['button'];
                
                    if ($button === 'stats') {
                      echo "Approve games was clicked!";
                    } elseif ($button === 'settings') {
                      echo "settings was clicked!";
                    }
                    elseif ($button === 'profileImg') {
                        echo "Change Profile Icon was clicked!";
                    }
                    elseif ($button === 'changePw') {
                        echo "Change Password was clicked!";
                    }
                    elseif ($button === 'reset') {
                        echo "Reset Data was clicked!";
                    }
                    elseif ($button === 'delete') {
                        echo "Delete Account was clicked!";
                    }else{
                        echo "stats was clicked!";
                    }
                  }
            
            ?>
            </div>

            <!-- <form></form> -->
        </div>
    </section>
    
</body>
</html>