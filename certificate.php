<?php
    require_once 'functions.php';
    if (!$_POST['generate']) {
        http_response_code(404);  
        exit;
    }

    $code = "Тест пройден!\n" . entryName() . ', ваша оценка 47!';

    $image = imagecreatetruecolor(650, 256);
    $backcolor = imagecolorallocate($image, 157, 191, 163);
    $textcolor = imagecolorallocate($image, 7, 44, 122);
    
    $boxFile = __DIR__ . '/books.png';
    if (!file_exists($boxFile)) {
        echo 'Файл с картинкой не найден';
        exit;
    }
    
    $imBox = imagecreatefrompng($boxFile);

    imagefill($image, 0, 0, $backcolor);
    imagecopy($image, $imBox, 380, 0, 0, 0, 256, 256);

    $fontFile = __DIR__ . '/font.ttf';
    if (!file_exists($fontFile)) {
        echo 'Файл с шрифтом не найден';
        exit;
    }

    imagettftext($image, 25, 0, 20, 118, $textcolor, $fontFile, $code);
    header('Content-Type: image/png');

    imagepng($image);