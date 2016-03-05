<?php

function getAll() {
    global $conn;
    $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
    $range = RANGE;
    $offset = ($current_page - 1)*$range ;
    $orddt = $conn->prepare('select * from ordersdetail left join product on ordersdetail.productid = product.id order by ordersid desc limit :range offset :offset');
    $orddt->bindValue('range',$range, PDO::PARAM_INT);
    $orddt->bindValue('offset',$offset, PDO::PARAM_INT);
    $orddt->execute();
    return $orddt;
}

function countOrdersDetail() {
    global $conn;
    $count = $conn->prepare('select count(productid) as count from ordersdetail');
    $count->execute();
    $count = $count->fetch(PDO::FETCH_OBJ);
    return $count->count;
}

function pages() {
    $range = RANGE;
    $count = countOrdersDetail();
    return ceil($count/$range);
}