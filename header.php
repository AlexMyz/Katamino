<style>
.logout-btn{
    position: absolute;
    top: 20px;
    right: 10px;
    text-decoration: none;
    color: #fff;
    padding: 15px 35px;
    font-size: 20px;
    border: 2px solid #fff;
    border-radius: 10px;
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    transition: .2s;
    box-shadow: 3px 3px 1px rgb(0, 0, 0, 0.06);
    background-color: #96C3F8;
}

.logout-btn:hover {
    background-color: #64abfc;
}

.username {
    font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    text-align: left;
    color: white;
    font-size: 35px;
    font-weight: 400;
    position: absolute;
    top: 25px;
    left: 20px;
}
.header {
    width: 100%;
}
.game-name {
    font-family: 'Roboto', sans-serif;
    font-size: 80px;
    text-transform: uppercase;
    color: white;
    text-shadow: 2px 3px 1px rgb(0, 0, 0, 0.1);
    padding: 10px 0 30px;
}

</style>

<div class="header">
    <?php
        require('configs/connect.php');
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
