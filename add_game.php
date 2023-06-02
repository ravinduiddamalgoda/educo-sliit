<?php
require 'lib/generate_id.php';
require 'database_config.php';

$user_id="asdwrtrtyf45dhg";

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

	//$conn->query($sql);
}
?>

<!doctype html>
<html lang="en">
	<head>
		<title>EDUCO</title>
		<link href="src/css/style.css" rel="stylesheet">
		<script src="src/js/navbar.js"></script>
	</head>
	<body>
		<?php include 'common_pages/adspace.php';?>
		<div class="container-main">
			<?php include 'common_pages/navbar.php';?>
			<div class="content">
				<div class="header"></div>
				<form id = "new_game" action="#" method="post" enctype="multipart/form-data">
					<div class="form-title">Request approval for new game</div>
					<div class="input-container">
						<input class="form-input" type="text" name="gname" title="Name of the game"
       placeholder="Enter the name..."/><br/>
					</div>
					<div class="input-container">
						<input class="form-input" type="text" name="desc" title="Description of the game"
       placeholder="Enter the description..."/><br/>
					</div>
					<div class="input-container">
						<input class="form-input" type="text" name="htp" title="How to play?"
       placeholder="How to play"/><br/>
					</div>
		<div class="main-radio-container">
			<div class="radio-container">
					<input class="form-radio" type="radio" name="gtype" value="2D Game"/>
					<label for="2D Game">2D Game</label><br/>
			</div>
			<div class="radio-container">
					<input class="form-radio" type="radio" name="gtype" value="3D Game"/>
					<label for="3D Game">3D Game</label><br/>
			</div>
			<div class="radio-container">
					<input class="form-radio" type="radio" name="gtype" value="Quiz"/>
					<label for="Quiz">Quiz</label><br/>
			</div>
					<br/>
</div>
					<input type="file" name="file"/><br/>
					<input class="button submit" type="submit" value="Submit" name="submit">
				</form>
			</div>
		</div>
	</body>
</html>