<?php
    require_once 'functions.php';
    if (!isAuthorized()) {
        http_response_code(403); 
    }

    $list = glob('tests/*.json');
    foreach ($list as $key => $file) {
        if ($key == $_GET['test']) {
            unlink($file);
            redirect('list');
        }
    }