<?php
require_once('sessions.php');
require 'database_config.php';
require_once('lib/pclzip.lib.php');
require_once('lib/delete_dir.php');

$user_id =$_SESSION['userid'];
$uType = $_SESSION['userType'];

if(isset($_POST["delete"])) {
    $stmt = $conn->prepare("DELETE FROM User WHERE User_Id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    if ($stmt->affected_rows > 0) {
        deleteDirectory($gameDir);
        echo "<script>alert('Game Deletion Successful');
        window.location.href='my_games.php';
        </script>";
    }else{
        echo "<script>alert('Game Deletion Unsuccessful');
        window.location.href='my_games.php';
        </script>";
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link href="src/css/gamecardA.css" rel="stylesheet">	
    <title>EDUCO</title>
</head>
<body>

    <style>
        .btnForm{
        width: 150px;
        height: 50px;
        border-radius: 20px;
        font-size: 25px;
        color: white;
        background-color:#E01F54;
        margin-top: 3%;
        margin-left: 24%;

    }
    </style>
    <?php include 'common_pages/navbar.php';?>
    <section class="main">
        <?php include "common_pages/profile_verticle.php"?>
        <div class="card-container">
            <form method="POST"><button type="submit" name="delete" value="delete" class = 'btnForm'><span class='material-symbols-outlined' >Delete</span></button></form>
        </div>
    </section>

    
</body>
</html>