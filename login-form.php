
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/log-style.css">
    <title>Вхід</title>
    <?php require('configs/connect.php');?>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
  
    <form action="#" method="POST">
    <h2> Вхід </h2>
    <?php
      if(isset($_POST['submit'])) {
        if(empty($_POST['email']) || empty($_POST['password'])) {
            ?>
            <h6 style='color: red'>Заповніть всі поля</h6>
          <?php
        } 
        else {
            $sql = "SELECT * FROM `user` 
            WHERE `email`='" . $_POST['email'] . "' 
            AND `password`='" . $_POST['password'] . "'";
            $result = mysqli_query($conn, $sql);
            $user = $result->fetch_assoc();
            if(!empty($user)) {
              $_SESSION["user_id"]=$user['id'];
              header("Location: game.php");
            }
            else if (empty($user)){
              ?>
              <h6 style='color: red'> Такого користувача не знайдено </h6>
              <?php
            }
        }
     }
  ?>
      <input type="text" id="login" class="fadeIn second" name="email" placeholder="E-mail">
      <input type="text" id="password" class="fadeIn third" name="password" placeholder="Пароль">
      <input type="submit" name="submit" class="fadeIn fourth" value="Увійти">
    </form>
  </div>
</div>
</body>
</html>
