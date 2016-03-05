<?php

function getAll() {
    $current_page = isset($_GET['p']) ? $_GET['p'] : 1;
    $range = RANGE;
    $offset = ($current_page - 1)*$range ;
    global $conn;
    $ord = $conn->prepare('select orders.*, account.username from orders left join account on orders.username = account.username order by id desc limit :range offset :offset');
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

function getOrders()
{
    global $conn;
    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        $value = $conn->prepare('select * from orders where id = :id');
        $value->bindValue('id', $id);
        $value->execute();
        $value = $value->fetch(PDO::FETCH_OBJ);
        return $value;
    }
}

function updateOrders() {
    global $conn;
    $id = $_GET['id'];
    if ( isset($_POST['save']) ) {
       if(!empty($_POST['name'])) {
           $ord = $conn->prepare('update orders set name = :name, status = :status where id = :id');
           $ord->bindValue('name', $_POST['name']);
           $ord->bindValue('status', $_POST['status']);
           $ord->bindValue('id', $id);
           $ord->execute();
           $_SESSION['success'] = 'Cập nhật đơn hàng thành công';
           redirect('/admin?mod=orders');
       }
    }

}