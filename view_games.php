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
    <?php include 'common_pages/adspace.php'; ?>
    <?php include 'common_pages/navbar.php'; ?>

    <!-- get name by get request -->
    <div class="layoutMain">
        <div class="data">

            <div>
                <script>
                    function display(a) {
                        alert(a);
                    }
                </script>
                <?php
                require 'database_config.php';
                $game_id = $_GET['id'];
                $user_id = $_SESSION['userid'];
                $user_name = $_SESSION['userName'];


                $sql = "SELECT * from game  where  Game_ID='$game_id' ";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $Game_name = $row["Name"];
                    }
                }

                echo '<h1>' . $Game_name . '</h1>
                    <hr>';
                echo "<h3>You Are : $user_name <br> ID : $user_id <br></h3> ";

                // need to get data from Database
                
                $sql = "SELECT * from subscribed  where  Game_ID='$game_id' AND User_ID = '$user_id' ";
                $resultSub = $conn->query($sql);
                $subscribe = false;
                if ($resultSub->num_rows > 0) {
                    $subscribe = true;
                }



                ?>
                <div width="1000px" height="1000px">


                    <?php

                    if ($subscribe) {
                        echo '
                        <p class= "fayerPlay">You Can Play Game</p>
                        <form method="post" action="subscribe.php">
                            <input type= "text" name="userid" value = "'.$user_id.'" class="inputId">
                            <input type= "text" name="gameid" value = "'.$game_id.'" class="inputId">
                            <input type= "text" name="type" value = "unsub" class="inputId">
                            <br>
                            <button class = "btnsub">Unsubscribe</button>
                        </form>
        
                        ';
                    echo
                        "<script>var userid='$user_id';
                        var username='$user_name';
                        var gameid='$game_id';     
                        </script>";
                    echo "<iframe name='game' width='100%' height='1000px' class='iframClz' src='games/approved/$game_id/index.html'></iframe>";
                        // readfile("games/approved/$game_id/index.html");

                    } else {
                        echo '
                        <h2 class= "fayerPlay">Subscribe to Play Game</h2>
                        <form method="post" action="subscribe.php">
                            <input type= "text" name="userid" value = "'.$user_id.'" class="inputId">
                            <input type= "text" name="gameid" value = "'.$game_id.'" class="inputId">
                            <input type= "text" name="type" value = "sub" class="inputId">
                            <br>
                            <button class = "btnsub">Subscribe</button>
                        </form>
                        
                        ';
                    }
                    
                        ?>

                </div>

            </div>
        </div>
    </div>


    <?php include 'common_pages/footer.php'; ?>
</body>

</html>