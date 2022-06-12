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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Imprima&display=swap" rel="stylesheet">
	<title>Katamino</title>
</head>
<body>
	<div class="figures">
		<img class="fig fig1" src="/img/start-screen/fig-1.png" alt="">
		<img class="fig fig2" src="/img/start-screen/fig-3.png" alt="">
		<img class="fig fig3" src="/img/start-screen/fig-2.png" alt="">
		<img class="fig fig4" src="/img/start-screen/fig-4.png" alt="">
	</div>
	<div class="greet-scr">
		<p class="game-name">Katamino</p>
		<div class="log">
			<a href="#" class="btn signin-btn">Sign In</a>
			<a href="login-form.php" class="btn login-btn">Login</a>
		</div>
	</div>
	<script src="/js/script.js"></script>
</body>
</html>