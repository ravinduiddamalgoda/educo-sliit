<?php 
include_once ('sessions.php');
include 'lib/code.php'
?>

<!doctype html>
<html lang="en">

<head>
	<title>EDUCO</title>
	<link href="src/css/style.css" rel="stylesheet">
	<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" /> -->
	<script src="src/js/navbar.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="src/css/doc_styles.css">

</head>

<body>
	<?php include 'common_pages/adspace.php'; ?>
	<?php include 'common_pages/navbar.php'; ?>
	<div class="container-main">
		<div class="doc-nav">
			<ul>
				<li><a href="#pre-requirements">Pre-requirements</a></li>
				<li><a href="#educo-score-api">EDUCO Score API</a>
					<ul>
						<li><a href="#introduction">Introduction</a></li>
						<li><a href="#scoreboard">Scoreboard</a></li>
						<li><a href="#getting-username">Getting Username</a></li>
						<li><a href="#testing">Testing</a></li>
						<li><a href="#folder-structure">Folder Structure</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="doc-container">
			<h1>Documentation</h1>
			<p>
			This documentation is intended for developers who aim to create games for the EDUCO website.
			</p>
			<h2 id="pre-requirements">Pre-requirements</h2>
			<p>Before beginning development of games for the EDUCO website, it is essential to possess the following:<br/></p>
				<ul>
					<li>A fundamental understanding of HTML, CSS, and JavaScript</li>
					<li>A basic knowledge of PHP</li>
					<li>A developer account on the EDUCO website</li>
					<li>Familiarity with the EDUCO Score API</li>
				</ul>
			<h2 id="educo-score-api">EDUCO score API</h2>
			<ul>
					<li><h2 id="introduction">Introduction</h2></li>
					The EDUCO Score API is a simple and straightforward JavaScript function that allows developers to submit player scores from their games to the EDUCO website. By integrating the EDUCO Score API into their games, developers can easily track and record player performance. This documentation provides detailed information on how to use and test the EDUCO Score API, as well as the pre-requisites for its usage.
					<li><h2 id="scoreboard">Scoreboard</h2></li>
					The submission of the score to the EDUCO API is a crucial component of your game. The scoreboard, which consists of a div element displaying the score and a submit button, facilitates this process. Developers can utilize the following code to create a scoreboard and may choose to add additional features as desired. The EDUCO Score API is a straightforward JavaScript function that accepts a single parameter.
					<?php echo code('function submitScore(score) {
    // API functions
}', 'JavaScript')?>
	Upon completion of the game, developers are required to call the EDUCO Score API function to submit the player’s score. The score, represented as an integer, is passed as an argument to the function. As the game is loaded within an <code class="inlineCode">iframe</code> tag, it is necessary to use the <code class="inlineCode">parent</code> object when calling the function.
	<?php echo code('parent.submitScore(score);', 'JavaScript')?>
	<li><h2 id="getting-username">Getting Username</h2></li>
	Users username is stored in a JavaScript Glocal variable <code class="inlineCode">uName</code>. Developers can use this variable to get the username of the user who is playing the game. Since the game is loaded using and <code class="inclineCode">Iframe</code> tag, it is necessary to use the <code class="inlineCode">parent</code> object when accessing the variable.
	<?php echo code('var UserName = parent.uName;', "JavaScript")?>
	
	
	<li><h2 id="testing">Testing</h2>
					Developers can test the functionality of the games implementation if EDUCO Score API by using the following code. 
<br/><ul>
	<li>Create a new HTML file in the root directory.</li>
	<li>Paste the given code into it</li>
	<li>Open the new HTML file using a server Environment (Ex: XAMPP)<br/>(*note that opening the file locally using <code class="inlineCode">file://</code> protocol may not work because of the restrictions placed)</li>
</ul>
<br/>
If your intergration is successful the function displays an alert box containing the score after your scoreboard is submitted.
					<?php echo code('<iframe src="index.html" width="800px" height="500px"></iframe>

<script>
	var uName = "Sunera";

    function submitScore(score) {
        alert("Your Score is : " + score);
    }
</script>');?>

Alternatively developers can refer to the <a style="text-decoration:underline; color:#0000ff" href="games/example.zip">example game</a> EDUCO developers made as reference. <br/>
				</li>
					<li><h2 id="folder-structure">Folder Structure</h2></li>
					EDUCO website only accepts zip files as game uploads. Developers must zip the content in the root directory (without the directory itself).
					Following is the Recommended file structure for your project. <br/>
					<p style="color:red">(*Including the files and folders marked with ` is a must.)</p>
					<?php echo code('[file_name].zip
	┝ `images`
	│	┝ `thumb 200x300.png`
	│	┝ `thumb 300x300.png`
	│	└ [other_images]
	┝ src
	│	┝ css
	│	│	└ style.css
	│	└ js
	│	 	└ script.js
	└ `index.html`'); ?>	
			</ul>
		</div>
	</div>
</div>
	<?php include 'common_pages/footer.php'; ?>
</body>

</html>