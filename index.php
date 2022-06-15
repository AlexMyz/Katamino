<?php 
include "configs/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/reset.css">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Imprima&display=swap" rel="stylesheet">

	<title>PUZZLE ME</title>

</head>
<body>
	<div class="figures">

		<div class="fig fig1"></div>
		<div class="fig fig2"></div>
		<div class="fig fig3"></div>
		<div class="fig fig4"></div>
		<div class="fig fig5"></div>
		<div class="fig fig6"></div>


	</div>
	<div class="greet-scr">
		<p class="game-name">PUZZLE ME</p>
		<div class="log-btns">
			<a href="signup-form.php" class="btn signin-btn">Sign Up</a>
			<a href="login-form.php" class="btn login-btn">Log In</a>
		</div>
	</div>
	<script src="/js/script.js"></script>
	<script src="/js/parallax.js"></script>

	
</body>
</html>