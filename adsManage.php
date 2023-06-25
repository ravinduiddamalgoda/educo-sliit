<?php
include_once ('sessions.php');
require 'lib/generate_id.php';
require 'lib/delete_dir.php';
require 'database_config.php';

$user_id=$_SESSION['userid'];

$user_id=$_SESSION['userid'];
$uType = $_SESSION['userType'];

//echo $uType;

if($uType < 1){
	echo 
	"<script>alert('You are not a developer');
		window.location.href='index.php';
	</script>";
}
require_once('lib/pclzip.lib.php');


	if(isset($_POST["submit"])) {
		$id = generate_uuid_v4('g');
		$target_dir = "games/unapproved/$id/";
		if (!file_exists($target_dir)) {
			mkdir($target_dir, 0777);
		}
		
		$target_file = $target_dir . $id . ".zip";
		$uploadOk = 1;
		$zipOk = 1;
		$FileType = strtolower(pathinfo(basename($_FILES["file"]["name"]),PATHINFO_EXTENSION));
		//echo $target_file;	
	
		if($FileType != "zip") {
		  echo "<script>alert('Sorry, only Zip file are allowed.');</script>";
		  $uploadOk = 0;
		}
	
		if ($uploadOk == 0) {
			echo "<script>alert('Sorry, your file was not uploaded.');</script>";
		} else {
			if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
				//echo "The file ". htmlspecialchars( basename( $_FILES["file"]["name"])). " has been uploaded.";
				$archive = new PclZip($target_file);
				$result = $archive->extract(PCLZIP_OPT_BY_NAME, 'images/', PCLZIP_OPT_PATH, $target_dir);
	
				if ($result == 0) {
					$zipOk = 0;
					die("Error : ".$archive->errorInfo(true));	
				}
			} else {
			  echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
			}
		}
	
		if($zipOk == 1 AND $uploadOk == 1){
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
		}else{
			echo "<script>alert('Sorry, there was an error');</script>";
		}
	
		//$sql = "INSERT INTO Game(Game_ID, `Name`, `Description`, GType, Game_Directory, Developer_ID, Admin_ID, How_to_play, Rating, Verification) VALUES($id, $gname, $desc, $gtype,$target_dir, $dev_id, $admin_id, $htp, $rating, $verif)";
	
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
				<form id = "new_game" action="" method="post" enctype="multipart/form-data">
					<div class="form-title">Request approval for new Advertisement</div>
					<div class="input-container">
						<input class="form-input" type="text" name="gname" title="Name of the game"
       placeholder="Enter the name..." value = "<?php if(isset($_GET['reupload'])){ echo $gname;}?>" required/><br/>
					</div>
					<div class="input-container">
						<input class="form-input" type="text" name="desc" title="Description of the game"
       placeholder="Enter the description..." value = "<?php if(isset($_GET['reupload'])){ echo $desc;}?>" required/><br/>
					</div>
					<div class="input-container">
						<input class="form-input" type="text" name="htp" title="How to play?"
       placeholder="How to play" value = "<?php if(isset($_GET['reupload'])){ echo $htp;}?>" required/><br/>
					</div>
		<!-- <div class="main-radio-container">
			<div class="radio-label">Game type:</div><br/>
			<div class="sub-radio-container">
				<div class="radio-container">
						<input class="form-radio" type="radio" name="gtype" value="2D Game" <?php if(isset($_GET['reupload'])){ if($gtype == "2D Game"){echo"checked";}}?> required/>
						<label for="2D Game">2D Game</label><br/>
				</div>
				<div class="radio-container">
						<input class="form-radio" type="radio" name="gtype" value="3D Game" <?php if(isset($_GET['reupload'])){ if($gtype == "3D Game"){echo"checked";}}?>/>
						<label for="3D Game">3D Game</label><br/>
				</div>
				<div class="radio-container">
						<input class="form-radio" type="radio" name="gtype" value="Quiz" <?php if(isset($_GET['reupload'])){ if($gtype == "Quiz"){echo"checked";}}?>/>
						<label for="Quiz">Quiz</label><br/>
				</div>
			</div>
			<br/>
		</div> -->
		<div class="file">
			<label class="label">
				<div>Select a file :</div><br/>
        		<input type="file" name="file" <?php if(!isset($_GET['reupload'])){echo "required";}?>/>
      		</label>
		</div>
		<br/>
		<div class="submit-container">
					<input class="button submit" type="submit" value="Submit" name="submit">
		</div>
				</form>
			</div>
		</div>
	</body>
</html>