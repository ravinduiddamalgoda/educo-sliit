<?php
    session_start();
?>

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
                <script>
                    function display(a){
                        alert(a);
                    }
                </script>
                <?php 
                    require 'database_config.php';

                    $game_id = $_GET['id'];
                    $user_id = $_SESSION['userid'];
                    $user_name = $_SESSION['userName'];

                    echo " You Are : $user_name <br> ID : $user_id <br> Playing : $game_id <br>";

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
                <div width="1000px" height="1000px">
                    

                    <?php
                        echo 
                        "<script>var userid='$user_id';
                        var username='$user_name';
                        var gameid='$game_id';     
                        </script>";
                        echo "<iframe name='game' width='100%' height='100%' src='games/approved/$game_id/index.html'></iframe>"
                       // readfile("games/approved/$game_id/index.html");
                    ?>

                </div>

            </div>
        </div>
    </div>
    

    <?php include 'common_pages/footer.php';?>
</body>
</html>