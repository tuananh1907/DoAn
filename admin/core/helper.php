<?php
/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 2/20/16
 * Time: 7:14 PM
*/


function _pr($string) {
    echo '<pre>';
    print_r($string);
    die();
}

function redirect($url) {
    header("Location: $url", true); die();
}