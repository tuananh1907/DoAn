<?php
/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 2/20/16
 * Time: 2:51 PM
 */
$conn = new PDO("mysql:host=localhost; dbname=mydemo", 'root', '');
$status = $conn->getAttribute(PDO::ATTR_CONNECTION_STATUS);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);



