<?php
    require_once 'functions.php';
    if (!isAuthorized()) {
        http_response_code(403);  
    }
    foreach ($_FILES as $key => $value) {
        if (isset($_POST) && isset($_FILES)) {
            $file = $value['name'];
            $tmp = $value['tmp_name'];
            $uploaddir = 'tests/';
            $pathInfo = pathinfo($uploaddir . $file);

            if ($pathInfo['extension'] === 'json') {
                move_uploaded_file($tmp, $uploaddir . $file);
                redirect('list');
            } else {
                echo 'Файл не передан, нужен файл json.' . '<br>';
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Загрузить тесты</title>
</head>
<body>
  <form method="post" enctype="multipart/form-data">
    <legend>Загрузить тесты</legend>
      <input type="file" name="usefile1">
      <input type="file" name="usefile">
    <input type="submit" value="Отправить"><br>
  </form>
  <ul>
    <li><a href="index.php">Вход</a></li>
    <li><a href="list.php">Выбрать тест</a></li>
    <li><a href="logout.php">Выход</a></li>
  </ul>
</body>
</html>