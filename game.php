<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/game.css">


    <title>Katamino</title>
    <?php require('configs/connect.php');?>
    
</head>
<body>
    <a class="logout" href="logout.php">Вихід</a>
    <?php
        if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != null) {
            $sql = "SELECT username FROM user WHERE id = " . $_SESSION['user_id'] . "";
            $result = mysqli_query($conn, $sql);
            $user = $result->fetch_assoc();
            ?>
        <h1>Hello, <?=$user['username']?></h1>
    <?php } ?>
    <div class="wrapper">
        <h4 class="timer">*timer*</h4>
        <div id="game">
            <div id="board"></div>
            <div id="pieces"></div>
        </div>
    </div>
    <script src="js/game.js"></script>
</body>
</html>