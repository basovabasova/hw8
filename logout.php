<?php
    require_once 'functions.php';
    if (!isAuthorized()) {
        redirect('index');
    }
    session_destroy();
    redirect('index');