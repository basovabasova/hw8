<?php
    require_once 'functions.php';
    if (!isAuthorized() && !isQuest()) {
        redirect('index');
    }
    if (isAuthorized()) {
        session_destroy();
        redirect('index');
    }
    if (isQuest()) {
        setcookie('name', $_GET['name'], time() -1);
        redirect('index');
    }    