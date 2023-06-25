<?php 
    session_start();
    require 'database_config.php';
    require 'lib/generate_scoreID.php';

    if(isset($_GET['score'])){
        $user_ID = $_GET['user_id'];
        $game_ID = $_GET['game_id'];
        $score = $_GET['score'];
        $score_id = ID_Generate_4_export();

        // $score_id = ID_Generate_4_export();
        echo $score_id;
        // $data_Score = 12;
        $stmt = $conn->prepare("INSERT INTO scoreboard (ID , Score) VALUES(?, ?)");
        $stmt->bind_param("ss",$score_id, $score);
        $stmt->execute();

        $stmtUser = $conn->prepare("INSERT INTO user_scoreboard (ID , User_ID) VALUES(?, ?)");
        $stmtUser->bind_param("ss",$score_id, $user_ID);
        $stmtUser->execute();
        $stmtGame = $conn->prepare("INSERT INTO game_scoreboard (ID , Game_ID) VALUES(?, ?)");
        $stmtGame->bind_param("ss",$score_id, $game_ID);
        $stmtGame->execute();
    }
    
    



?>