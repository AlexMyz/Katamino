<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/game.css">
    <link rel="stylesheet" type="text/css" href="css/pyro.css">

    

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="js/slick.min.js"></script>


    <title>PUZZLE ME</title>
    
</head>
<body>
    <?php require("header.php") ?>
    

    <div class="main">
        <div id="timer" class="text-center">
            <div class="countdown">
                <span id="minutes">Час: 0</span>:<span id="second">0</span>
            </div>
        </div>
    </div>
    <div class="pyro">
    <div class="before"></div>
    <div class="after"></div>
    
</div>
    <script src="js/game.js"></script>

</body>
</html>