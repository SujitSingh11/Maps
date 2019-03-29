<?php
    require 'db.php';
    session_start();


    if (isset($_SESSION['longitude']) && isset($_SESSION['latitude']) && isset($_SESSION['locality']) && isset($_SESSION['country'])) {
        $lng = $_SESSION['longitude'];
        $lat = $_SESSION['latitude'];
        $locality = $_SESSION['locality'];
        $country = $_SESSION['country'];
        if (isset($_SESSION['administrative_area_level_1'])) {
            $admin_lvl1 = $_SESSION['administrative_area_level_1'];
        }else {
            $admin_lvl1 = null;
        }
        if (isset($_COOKIE['administrative_area_level_2'])) {
            $admin_lvl2 = $_SESSION['administrative_area_level_2'];
        }else {
            $admin_lvl2 = null;
        }

        $sql_loc = "INSERT INTO `markers` (`country`, `locality`, `administrative_area_level_1`, `administrative_area_level_2`, `lat`, `lng`) VALUES ('$country','$locality','$admin_lvl1','$admin_lvl2','$lat','$lng')";

        if ($query_loc = mysqli_query($conn,$sql_loc)) {
            header('location: location_search.php');
        }else {
            $_SESSION['message'] = "Failed";
        }

    }

?>
