<?php
    require_once 'functions.php';
    if (isAuthorized()) {
        redirect('admin');
    }
    if (!empty($_GET['name'])) {
        setcookie('name', $_GET['name']);
        redirect('list');
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Вход</title>
</head>
<body>
  <form method="get">
    <input type="text" name="name" placeholder="Введите ваше имя">
    <input type="submit" value="Отправить">    
  </form>
  <p><a href="login.php">Are you admin?</a></p>
</body>
</html>