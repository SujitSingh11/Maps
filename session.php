<?php
    session_start();
    
    $_SESSION['latitude'] = $_COOKIE['latitude'];
    $_SESSION['longitude'] = $_COOKIE['longitude'];
    $_SESSION['locality'] = $_COOKIE['locality'];
    $_SESSION['country'] = $_COOKIE['country'];
    if (isset($_COOKIE['administrative_area_level_1'])) {
        $_SESSION['administrative_area_level_1'] = $_COOKIE['administrative_area_level_1'];
    }else {
        $_SESSION['administrative_area_level_1'] = null;
    }
    if (isset($_COOKIE['administrative_area_level_2'])) {
        $_SESSION['administrative_area_level_2'] = $_COOKIE['administrative_area_level_2'];
    }else {
        $_SESSION['administrative_area_level_2'] = null;
    }
    header('location: save.php');

 ?>
