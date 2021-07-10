<?
require 'db.php';

session_start();

if ($_POST['enter']) {
  $admins = $dbh->query("SELECT * FROM admins");

  foreach ($admins as $admin) {
    if ($admin['login'] == $_POST['login'] && $admin['password'] == $_POST['password']) {
      $_SESSION['login'] = $_POST['login'];
      $_SESSION['password'] = $_POST['password'];
      header("Location: admin.php");
    }
  }
  echo 'Неверно введены логин или пароль';
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login</title>
</head>
<body>
  <form method="post">
    login<input type="text" name="login"><br>
    password<input type="password" name="password">
    <input type="submit" name="enter">
  </form>
</body>
</html>