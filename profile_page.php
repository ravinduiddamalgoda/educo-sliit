<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/css/verticle_navbar.css" rel="stylesheet">
    <link href="src/css/style.css" rel="stylesheet">	
    <title>EDUCO</title>
</head>
<body>
    <?php include 'common_pages/navbar.php';?>
    <section>
        <div class="alignMain">
            <?php include "common_pages/profile_verticle.php"?>
            <div class="dataSection">
            <?php
                if (isset($_GET['button'])) {
                    $button = $_GET['button'];
                
                    if ($button === 'stats') {
                      echo "stats was clicked!";
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
        </div>
    </section>
    
</body>
</html>