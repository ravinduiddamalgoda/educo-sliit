<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src/css/games.css">
    <title>Educo</title>
</head>
<body>
    <?php include 'common_pages/adspace.php';?>
    <?php include 'common_pages/navbar.php';?>

    <!-- get name by get request -->
    <div class="layoutMain">
        <div class="data">
            <h1>Game Name</h1>
            <hr>
            <div>
                <?php 
                    require 'database_config.php';

                    // need to get data from Database
                        
                    $subscribe = false;
                    if($subscribe){
                        echo "
                        <p class= 'fayerPlay'>You Can Play Game</p>
                        ";
                    }
                    else{
                        echo"
                        <button class = 'btnsub'>Subscribe</button>
                        ";
                    }
                ?>
            </div>
        </div>
    </div>
    
   

    
</body>
</html>