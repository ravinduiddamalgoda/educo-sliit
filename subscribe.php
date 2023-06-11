<?php 
    session_start();
    require 'database_config.php';

    $game_id = $_POST['gameid'];
    $user_id = $_POST['userid'];
    $type = $_POST['type'];

    if ($type === "sub"){
        $stmt = $conn->prepare("INSERT INTO subscribed(User_ID, Game_ID) VALUES(?, ?)");
	    $stmt->bind_param("ss",$user_id,$game_id );
	    $stmt->execute();
        echo"<script>
            alert('Subscribed');
        </script>";
        header('location:../view_games.php?id='.$game_id.'');
        // echo'To subscribe';
    }
    else if($type === "unsub"){
        $sql =  $conn->prepare("DELETE FROM subscribed WHERE User_ID=? AND Game_ID=?");
        $sql->bind_param("ss",$user_id,$game_id );
        $sql->execute();
        echo"<script>
        alert('UnSubscribed');
    </script>";
        header('location:../view_games.php?id='.$game_id.'');
    }

?>