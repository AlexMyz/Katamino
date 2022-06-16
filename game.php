<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/game.css">



	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/game.js"></script>

    <title>PUZZLE ME</title>
    <?php require('configs/connect.php');?>
    
</head>
<body>
    <div class="header">
        <?php
            if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
                $sql = "SELECT username FROM user WHERE id = " . $_SESSION['user_id'] . "";
                $result = mysqli_query($conn, $sql);
                $user = $result->fetch_assoc();
                ?>
            <h4 class="username">Привіт, <?=$user['username']?></h4>
        <?php } ?>
        <h1 class="game-name">PUZZLE ME</h1>
        <a class="logout-btn" href="logout.php">Вихід</a>
    </div>

    <div class="main">
	<span class="timer">
        Час: 15:50
    </span>	
	</div>
</body>
</html>