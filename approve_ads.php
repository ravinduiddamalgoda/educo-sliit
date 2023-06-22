<?php
require_once('sessions.php');
require 'database_config.php';

$user_id = $_SESSION['userid'];
$uType = $_SESSION['userType'];

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


    if(isset($_POST["submit"])) {
        $id = generate_uuid_v4('g');
        $target_dir = "games/unapproved/$id/";
        if (!file_exists($target_dir)) {
            mkdir($target_dir, 0777);
        }
        

        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        echo $target_file;	

        if($FileType != "zip") {
        echo "Sorry, only Zip file are allowed.";
        $uploadOk = 0;
        }

        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
            } else {
            echo "Sorry, there was an error uploading your file.";
            }
        }

        $gname = $_POST["gname"];
        $desc = $_POST["desc"];
        $gtype = $_POST["gtype"];
        $dev_id = $user_id;
        $admin_id = NULL;
        $htp = $_POST["htp"];
        $rating = 0;
        $verif = "U";

        $stmt = $conn->prepare("INSERT INTO Game(Game_ID, `Name`, `Description`, GType, Game_Directory, Developer_ID, Admin_ID, How_to_play, Rating, Verification) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssis", $id, $gname, $desc, $gtype, $target_dir, $dev_id, $admin_id, $htp, $rating, $verif);
        $stmt->execute();



        //$sql = "INSERT INTO Game(Game_ID, `Name`, `Description`, GType, Game_Directory, Developer_ID, Admin_ID, How_to_play, Rating, Verification) VALUES($id, $gname, $desc, $gtype,$target_dir, $dev_id, $admin_id, $htp, $rating, $verif)";

        //$conn->query($sql);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="src/css/style.css" rel="stylesheet">
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
                                <button type='submit'>Download!</button>
                            </form>
                        </div>
                        <div class='desc'>".$game['Description']."</div>
                        <div class='approve'>no</div>
                        <div class='download'>delete</div>
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