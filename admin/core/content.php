<?php
require_once 'init.php';
if (isset($_GET['mod']))  {
    $folder = $_GET['mod'];
    //require model
    require "models/$folder" . '.php';

    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        require "templates/$folder/$action" . '.php';
    } else {
        require "templates/$folder/index.php";
    }

} else {
    require 'templates/dashboard.php';
}