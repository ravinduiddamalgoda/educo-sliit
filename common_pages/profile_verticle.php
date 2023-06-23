<?php
require_once("sessions.php");
echo '
<link href="src/css/verticle_navbar.css" rel="stylesheet">
<script>
document.addEventListener("DOMContentLoaded", () => {
	const path = window.location.pathname;
	const page = path.split("/").pop();
	const element = document.querySelector(\'[data-tab="\'+page+\'"]\');
	element.classList.add("active");
});
</script>
<div class="menu">
	<ul class="verticle-menu">
		<a href=""><li data-tab="stats.php">Stats</li></a>
		<a href=""><li data-tab="settings.php">Settings</li></a>
		<a href=""><li data-tab="prof_icon.php">Change Profile Icon</li></a>
		<a href=""><li data-tab="change_password.php">Change Password</li></a>
';
	if($_SESSION["userType"] > 0){
		echo '<a href="my_games.php"><li data-tab="my_games.php">My Games</li></a>';
	}

	if($_SESSION["userType"] == 2){
		echo '<a href="approve_games.php"><li class="" data-tab="approve_games.php">Approve Games</li></a>';
		echo '<a href="approve_ads.php"><li data-tab="approve_ads.php">Approve Ads</li></a>';
	}


	echo '
		<a href=""><li  data-tab="delete_account.php">Delete Account</li></a>
	</ul>
</div>
';
?>