<?php

function getAll() {
    $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
    $range = RANGE;
    $offset = ($current_page - 1)*$range ;
    global $conn;
    $ord = $conn->prepare('select * from orders left join account on orders.username = account.username order by id desc limit :range offset :offset');
    $ord->bindValue('range', $range, PDO::PARAM_INT);
    $ord->bindValue('offset', $offset, PDO::PARAM_INT);
    $ord->execute();
    return $ord;
}

function countOrders() {
    global $conn;
    $count = $conn->prepare('select count(id) as count from orders');
    $count->execute();
    $count = $count->fetch(PDO::FETCH_OBJ);
    return $count->count;
}

function pages() {
    $range = RANGE;
    $count = countOrders();
    return ceil($count/$range);
}
