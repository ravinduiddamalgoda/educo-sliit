<?php

            session_start();
            require 'database_config.php';
           if(isset($_GET['rating'])){
            $rating = $_GET['rating'];
            $user_ID = $_GET['user_Id'];
            $game_ID = $_GET['game_id'];

            $stmt = $conn->prepare("UPDATE subscribed SET `Rating`=? WHERE User_ID = ? AND Game_ID = ?");
			$stmt->bind_param("sss", $rating, $user_ID, $game_ID);
			$stmt->execute();

           }
            
           
            
?>