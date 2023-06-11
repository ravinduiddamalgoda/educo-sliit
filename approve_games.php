<?php
session_start();
require 'database_config.php';
require_once('lib/pclzip.lib.php');
require_once('lib/delete_dir.php');

$user_id =$_SESSION['userid'];
$uType = $_SESSION['userType'];

if(isset($_GET["approve"])) {
    $id = $_GET["approve"];
    $zipOk = 1;
    echo $zipOk;
    $oldGameDir = "games/unapproved/$id/$id.zip";
    $oldGameDir1 = "games/unapproved/$id/";
    $newGameDir = "games/approved/$id/";
    $archive = new PclZip($oldGameDir);
	$result = $archive->extract(PCLZIP_OPT_PATH, $newGameDir);

    if (rename($oldGameDir, $newGameDir."$id.zip")) {
        echo "File moved successfully";
    } else {
        echo "Error moving file";
    }

    if ($result == 0) {
        $zipOk = 0;
        die("Error : ".$archive->errorInfo(true));	
    }

    deleteDirectory($oldGameDir1);

    if($zipOk == 1){      
        $stmt = $conn->prepare("UPDATE Game SET Verification = 'A', Admin_ID = ?, Game_Directory = ? WHERE Game_ID = ?");
    
        $stmt->bind_param("sss", $user_id, $newGameDir, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: approve_games.php");
    }
}

if(isset($_GET["reject"])) {
    $id = $_GET["reject"];
    $stmt = $conn->prepare("UPDATE Game SET Verification = 'R', Admin_ID = ? WHERE Game_ID = ?");
    $stmt->bind_param("ss", $user_id, $id);
    $stmt->execute();
    $stmt->close();
    header("Location: approve_games.php");
}


if($uType < 2){
	echo 
	"<script>alert('You are not allowed in this page');
		window.location.href='index.php';
	</script>";
}else{
    $stmt = $conn->prepare("Select * from Game where Verification = 'U'");
    $stmt->execute();

    $result = $stmt->get_result();
    $games = $result->fetch_all(MYSQLI_ASSOC);
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
    <?php include 'common_pages/navbar.php';?>
    <section class="main">
        <?php include "common_pages/profile_verticle.php"?>
        <div class="card-container">
            <?php
                //print_r($games);
                foreach($games as $game){
                    echo "
                    <div class='game-container'>
                        <div class='thumb'><img width='100px' height='100px' src='".$game['Game_Directory']."images/thumb-300x300.png'></div>
                        <div><span class='gname'>".$game['Name']."</span><span class='gtype'>".$game['GType']."</span></div>
                        <div class='download'>
                            <form method='get' action='".$game['Game_Directory'].$game['Game_ID'].".zip"."'>
                                <button class='button' name='download' type='submit'><span class='material-symbols-outlined'>
                                download</span><span class='text'>Download</span></button>
                            </form>
                        </div>
                        <div class='desc'>".$game['Description']."</div>
                        <div class='approve'> 
                            <form method='get' action=''>
                                <button value='".$game['Game_ID']."' class='button' name='approve' type='submit'><span class='material-symbols-outlined'>
                            check</span><span class='text'>Approve</span>
                                </button>
                            </form>
                        </div>
                        <div class='reject'>
                            <form method='get' action=''>
                            <button value='".$game['Game_ID']."' class='button' name='reject' type='submit'><span class='material-symbols-outlined'>
                            close</span><span class='text'>Reject</span>
                                </button>
                        </form>
                        </div>
                    </div>
                    ";

                   // echo "<div class='game'>";
                  //  echo "<h1>".$game['Name']."</h1>";
                  //  echo "<p>".$game['Description']."</p>";
                   // echo "<p>".$game['GType']."</p>";
                   // echo "<p>".$game['How_to_play']."</p>";
                   // echo "<p>".$game['Rating']."</p>";
                   // echo "<p>".$game['Verification']."</p>";
                   // echo "</div>";
                }
            ?>
        </div>
    </section>

    
</body>
</html>