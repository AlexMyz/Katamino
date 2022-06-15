<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/game.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <title>PUZZLE ME</title>
    
</head>
<body>
    <?php require("header.php") ?>

    <a href="#" class="btn start-btn">Почати</a>

    <!-- <div class="levels">

        <div class="lvl lvl-1">
            <label>
                <input type="radio" name="level" value="1" onchange="radioget($(this).val())">
                <img src="/img/puzzle/pic1/bg.jpg" alt="" class="level-img">
            </label>
        </div>

        <div class="lvl lvl-2">
            <label>
                <input type="radio" name="level" value="2" onchange="radioget($(this).val())">
                <img src="/img/puzzle/pic2/bg.jpg" alt="" class="level-img">
            </label>
        </div>

        <div class="lvl lvl-3">
            <label>
                <input type="radio" name="level" value="3" onchange="radioget($(this).val())">
                <img src="/img/puzzle/pic3/bg.jpg" alt="" class="level-img">
            </label>
        </div>
        <span></span>
    </div> -->



    <div class="main">
        <div id="timer" class="text-center">
            <div class="countdown">
                <span id="minutes">Час: 0</span>:<span id="second">0</span>
            </div>
            <!-- <button id="startCount" onclick="startSW()">Start</button> -->
            <!-- <button id="pauseCount" onclick="pauseSW()" disabled>Pause</button>
            <button id="resetCount" onclick="restartSW()" disabled>Restart</button> -->
        </div>
    </div>
    <script src="js/game.js"></script>

</body>
</html>