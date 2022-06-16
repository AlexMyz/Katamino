
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
    <title>Реєстрація</title>
    <?php require('configs/connect.php');?>

</head>
<body>
  
  <div class="wrapper fadeInDown">
    <div id="formContent">
      <form action="#" method="POST">
        <h2>Реєстрація</h2>
        <?php 
        if(isset($_POST['submit'])) {
          $sql = "SELECT * FROM user WHERE `email`='" . $_POST['email'] . "'";
          $result = mysqli_query($conn, $sql);
          $email = $result->fetch_assoc();
          if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password'])) {
            ?>
              <h6 style='color: red'>Заповніть всі поля</h6>
            <?php
          } else if ($email) {
            ?>
              <h6 style='color: red'>Користувач з таким e-mail вже існує</h6>
            <?php
          } else if(empty($email)){
            $sql = "INSERT INTO `user` (`username`, `email`, `password`)
            VALUES ('" . $_POST['name'] . "', '" . $_POST['email'] . "','" . $_POST['password'] . "')";
  
            if(mysqli_query($conn, $sql)) {
              echo "INSERT";
              header("Location: /");
            } else {
              echo "Error " . $sql . "<br>" . mysqli_error($conn);
            }
          }
          mysqli_close($conn);
        }
      ?>
        <input type="text" id="name" class="fadeIn second" name="name" placeholder="Логін">
        <input type="text" id="email" class="fadeIn second" name="email" placeholder="e-mail">
        <input type="text" id="password" class="fadeIn third" name="password" placeholder="Пароль">
        <input type="submit" name="submit" class="fadeIn fourth" value="Зареєструватися">
      </form>
    </div>
  </div>
</body>
</html>
