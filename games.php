<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="src/css/gamesMain.css" rel="stylesheet">

    <title>Educo</title>
</head>
<body>
    <?php include 'common_pages/adspace.php';?>
    <?php include 'common_pages/navbar.php';?>
    <h1 class="title">What's New in EDUCO</h1>
    <div class="container">
        
            <?php 
              require 'database_config.php';
              
              $sql= "SELECT * from game  where  Verification='V' ";
              $result=$conn->query($sql);

              if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                             
                    echo'
                    <div class="gameCard">
                    <img src="/games/approved/'.$row["Game_ID"].'/images/thumb-300x200.png" alt="" width="300px" height= "200px" class="imgStyle">
                    <h1>'.$row["Name"].'</h1>
                    <form method="get" action="view_games.php">
                        <input type= "text" name="id" value = "'.$row["Game_ID"].'" class="inputId">
                        <button class="btnForm" type="submit">Play Game</button>
                    </form>
                    
                    </div>
                    ';
                }
              }else{
                echo "<h2 class= 'noData'>No Games Approved Yet...</h2>";
              }
            
            ?>
        
        
        
    </div>


    <?php include 'common_pages/footer.php';?>
</body>
</html>