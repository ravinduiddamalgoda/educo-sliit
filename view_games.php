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
    <?php 
        $game_id = $_GET['id'];
        $user_id = $_SESSION['userid'];
        $user_name = $_SESSION['userName'];
    
    ?>
    <!-- get name by get request -->
    <div class="layoutMain">
        <div class="data">
            <div>
                <script>
                    const U_ID = "<?php echo isset($user_id) ? $user_id : ''; ?>";
                    const G_ID = "<?php echo isset($game_id) ? $game_id : ''; ?>";


                    
                </script>
                <?php
                require 'database_config.php';
                if(!isset($_SESSION['userid'])){
                    
                    echo'
                    <script>
                    alert("You need to Login to countiue!!!");
                    window.location.href = "login.php";
                    
                    </script>
                    ';
                }
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

                echo '<h1 class="title">' . $Game_name . '</h1>
                    <hr>';
                echo "<h3 class ='title2'>You Are : $user_name <br> ID : $user_id <br></h3> ";

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
                    echo "<iframe name='game' width='100%' height='600px' class='iframClz' src='games/approved/$game_id/index.html'></iframe>";
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
            <div class="rating">
            <h3 class="fayerPlay"> Rate to the game</h3>
            
            <div class="star-direction">

            
            <?php 
                    // $user_id = $_SESSION['userid'];
                    $query =  "SELECT Rating FROM subscribed WHERE User_ID = '$user_id' AND  Game_ID='$game_id'";
                    $resultRating = $conn->query($sql);
                    if ($resultRating->num_rows > 0) {
                        while ($row = $resultRating->fetch_assoc()) {
                            $rate = $row["Rating"];
                        }
                        
                        if($rate == null){
                            for($i = 1; $i <6; $i++){
                                echo "<ion-icon name='star-outline' class='starClass'></ion-icon> ";
                            }
                        }
                        else{
                            for($i = 1; $i <6; $i++){
                                if( $rate >= $i){
                                    echo "<ion-icon name='star' class='starClass'></ion-icon> ";
                                }else{
                                    echo "<ion-icon name='star-outline' class='starClass'></ion-icon> ";
                                }
                            }
                        }
                        
                        
                    }

                
                ?>
                
           


            </div>
            <button class = "btnEditsub" id="btnEditsub" onclick="editRating()">Edit Rating</button>
        </div>
        </div>
        <div class="scoreBoardArea">
            <h1 class = "scoreCardHead">Score Board</h1>
            <table class = "styled-table">
                <tr>
                <thead>
                    <th>User Name</th>
                    <th>Score</th>
                </thead>
                <tbody>
                    <?php 
                $query_score = "SELECT ID From game_scoreboard WHERE Game_ID = '$game_id'";
                $result_score = $conn->query($query_score);
                
                if ($result_score->num_rows > 0) {
                    while ($row = $result_score->fetch_assoc()) {
                        echo'<tr>';
                        $ID = $row["ID"];
                        //  echo'<td>'.$ID.'</td>';
                        $score_query  = "SELECT U.Username , S.Score FROM scoreboard S , user U , user_scoreboard US WHERE s.ID = '$ID' AND U.User_ID = US.User_ID AND S.ID = US.ID;";
                        $result_table = $conn->query($score_query);
                        if($result_table->num_rows > 0){
                            while($row_score = $result_table->fetch_assoc()){
                                echo'<td>'.$row_score['Username'].'</td>';
                                echo'<td>'.$row_score['Score'].'</td>';
                            }
                        }
                        echo'</tr>';
                }
            }
            
            ?>
                
                </tbody>      
            </table>
            
        </div>
    </div>

    <script src="src/js/scoreAdd.js"></script>          
    <?php include 'common_pages/footer.php'; ?>
</body>

</html>