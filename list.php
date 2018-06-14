<?php
    require_once 'functions.php';
    $list = glob('tests/*.json');
    $filename = 'tests';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Выбрать тест</title>
</head>
<body>
  <h1>Привет, <?php echo entryName(); ?></h1>
  <?php
      if (file_exists($filename)) {
          foreach ($list as $key => $file) {
              $test = file_get_contents($file);
              $decode = json_decode($test, true);
              $question = $decode[0]['test'];
              echo "<a href=\"test.php?test=$key\">$question</a><br>";
              if (isAuthorized()) {
                  echo "<a href=\"delete.php?test=$key\">Удалить тест</a><br>";;
              }
          }
      } else {
          echo "Папка $filename не существует";
      }       
  ?>
  <ul>
    <li><a href="index.php">Вход</a></li>
    <?php
        if (isAuthorized()) { ?>
          <li><a href="admin.php">Загрузить тесты</a></li>
          <li><a href="logout.php">Выход</a></li>
    <?php } ?>
  </ul>
</body>
</html>