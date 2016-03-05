<?php

function getAll()
{
    $p = isset($_GET['p']) ?  $_GET['p'] : 1;
    $range = RANGE;
    $offset = ($p - 1)*$range;
    global $conn;
    $user = $conn->prepare('select * from account order by username desc LIMIT :range offset :offset');
    $user->bindValue('range', $range, PDO::PARAM_INT);
    $user->bindValue('offset', $offset, PDO::PARAM_INT);
    $user->execute();
    return $user;

}

function addUser()
{
    global $conn;
    if (isset($_POST['add'])) {
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $conn->prepare('insert into account (username, password, fullname, email, status) values (:username, :password, :fullname, :email, :status)');
            $user->bindValue('username', $_POST['username']);
            $user->bindValue('password', md5($_POST['password']));
            $user->bindValue('fullname', $_POST['fullname']);
            $user->bindValue('email', $_POST['email']);
            $user->bindValue('status', $_POST['status']);
            $user->execute();
            redirect('/admin?mod=account');
        }
    }
}

function getUser()
{
    global $conn;
    $username = $_GET['usn'];
    $user = $conn->prepare('select * from account where username = :username');
    $user->bindValue('username', $username);
    $user->execute();
    return $user->fetch(PDO::FETCH_OBJ);
}

function updateUser()
{
    global $conn;
    $usn = $_GET['usn'];
    if (isset($_POST['save'])) {
//        if (!empty($_POST['username'])) {
            $user = $conn->prepare('update account set fullname = :fullname, email = :email, status = :status where username = :username');

            $user->bindValue('fullname', $_POST['fullname']);
            $user->bindValue('email', $_POST['email']);
            $user->bindValue('status', $_POST['status']);
            $user->bindValue('username', $usn);
            $user->execute();
            $_SESSION['success'] = 'Cập nhật tài khoản thành công';
            redirect('/admin?mod=account');
//        }

    }
}

function delUser()
{
    global $conn;
    if (isset($_GET['act'])) {
        $usn = $_GET['usn'];
        $act = $_GET['act'];
        if ($act == 'del') {
            try
            {
            $user = $conn->prepare('delete from account where username = :username');
            $user->bindValue('username', $usn);
            $user->execute();
            $_SESSION['success'] = 'Xoá tài khoản thành công';
            redirect('/admin?mod=account');
            }catch(PDOException $e)
            {
                $_SESSION['error'] = 'Xoá tài khoản thất bại';
                redirect('/admin?mod=account');
            }
        }
    }

}

function delUsers()
{
    global $conn;
    if (isset($_POST['del'])) {
        $usns = $_POST['usns'];
        foreach ($usns as $usn) {
            try
            {
            $user = $conn->prepare('delete from account where username = :username');
            $user->bindValue('username', $usn);
            $user->execute();
            }catch(PDOException $e)
            {
                $_SESSION['error'] = 'Xoá tài khoản thất bại';
                redirect('/admin?mod=account');
            }
        }
        $_SESSION['success'] = 'Xoá tài khoản thất bại';
        redirect('/admin?mod=account');
    }

}

function countUser() {
    global $conn;
    $count = $conn->prepare('select count(username) as count from account');
    $count->execute();
    $count = $count->fetch(PDO::FETCH_OBJ);
    return $count->count;
}

function pages() {
    $range = RANGE;
    $count = countUser();
    return ceil($count / $range);

}