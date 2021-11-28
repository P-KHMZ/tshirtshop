<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    include_once "models/page.class.php";
    $site_data = new Site_Data();
    $site_data ->add_Css("css/tshirtshop.css");
    $site_data ->title    = "T-shirt_Shop Demo product catalog";
    $site_data ->content  = "<h1>Welcome to the tshirtshop</h1><p>..Very soon e-commerce content here</p>";
    $site_data ->content .= include_once "views/home.php";
    $template = include_once "views/templates.php";
    echo $template;
?>

