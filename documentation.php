<?php include 'lib/code.php'?>

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
						<li><a href="#how-to-use">How to Use</a></li>
						<li><a href="#testing">Testing</a></li>
					</ul>
				</li>
			</ul>
		</div>
		<div class="doc-container">
			<h1>Documentation</h1>
			<p>This Documentation is for developers who is intending to develop games for the EDUCO website

			</p>
			<h2 id="pre-requirements">Pre-requirements</h2>
			<p>Before you start developing games for the EDUCO website, you need to have the following:<br/></p>
				<ul>
					<li>Basic knowledge of HTML, CSS and JavaScript</li>
					<li>Basic knowledge of PHP</li>
					<li>Developer account in EDUCO website</li>
					<li>Basic knowledge of EDUCO score API</li>
				</ul>
			<h2 id="educo-score-api">EDUCO score API</h2>
			<ul>
					<li><h2 id="introduction">Introduction</h2></li>
					<li><h2 id="how-to-use">How to Use</h2></li>
					<li><h2 id="testing">Testing</h2>
					<?php echo code('function myFunction() {
	console.log("Hello, world!");
}
function myFunction() {
	console.log("Hello, world!");
}
function myFunction() {
	console.log("Hello, world!");
}
function myFunction() {
	console.log("Hello, world!");
}
function myFunction() {
	console.log("Hello, world!");
}', "JavaScript"); ?>		
				</li>
			</ul>
		</div>
	</div>
</div>
	<?php include 'common_pages/footer.php'; ?>
</body>

</html>