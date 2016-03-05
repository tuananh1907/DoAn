<?php

/**
 * Created by PhpStorm.
 * User: Tuan Anh
 * Date: 2/20/16
 * Time: 2:44 PM
 */

function getAll()
{
    $p = isset($_GET['p']) ? $_GET['p'] : 1;
    $range = RANGE;
    $offset = ($p - 1) * $range;
    global $conn;
    $categories = $conn->prepare('select * from category order by id desc LIMIT :range offset :offset');
    $categories->bindValue('range', $range, PDO::PARAM_INT);
    $categories->bindValue('offset', $offset, PDO::PARAM_INT);
    $categories->execute();
    return $categories;
}

function addCategory()
{
    global $conn;
    if (isset($_POST['add'])) {
        if (!empty($_POST['name'])) {
            $category = $conn->prepare('insert into category(name, status) values (:name, :status)');
            $category->bindValue('name', $_POST['name']);
            $category->bindValue('status', $_POST['status']);
            $category->execute();
            $_SESSION['success'] = 'Thêm danh mục thành công';
            redirect('/admin?mod=category');
        }
    }
}

function getCategory()
{
    global $conn;
    $id = $_GET['id'];
    if (isset($_GET['id'])) {
        $value = $conn->prepare('select * from category where id = :id');
        $value->bindValue('id', $id);
        $value->execute();
        $value = $value->fetch(PDO::FETCH_OBJ);
        return $value;
    }
}

function updateCategory()
{
    global $conn;
    $id = $_GET['id'];
    if (isset($_POST['save'])) {
        if (!empty($_POST['name'])) {
            $category = $conn->prepare('update category set name = :name, status = :status where id = :id');
            $category->bindValue('name', $_POST['name']);
            $category->bindValue('status', $_POST['status']);
            $category->bindValue('id', $id);
            $category->execute();
            $_SESSION['success'] = 'Cập nhật danh mục thành công';
            redirect('/admin?mod=category');
        }
    }


}

function delCategory()
{
    global $conn;
    if (isset($_GET['act'])) {
        $id = $_GET['id'];
        $act = $_GET['act'];
        if ($act == 'del') {
            try{
            $user = $conn->prepare('delete from category where id = :id');
            $user->bindValue('id', $id);
            $user->execute();
            $_SESSION['success'] = 'Xoá danh mục thành công';
            redirect('/admin?mod=category');
            }catch(PDOException $e)
            {
                $_SESSION['error'] = 'Xoá danh mục thất bại';
                redirect('/admin?mod=category');
            }
        }
    }

}

function delCategories()
{
    global $conn;
    if (isset($_POST['del'])) {
        $ids = $_POST['ids'];
        foreach ($ids as $id) {
            try
            {
            $user = $conn->prepare('delete from category where id = :id');
            $user->bindValue('id', $id);
            $user->execute();
            }catch(PDOException $e)
            {
                $_SESSION['error'] = '1 số danh mục xoá thất bại';
                redirect('/admin?mod=category');
            }


        }
        $_SESSION['success'] = 'Xoá danh mục thành công';
        redirect('/admin?mod=category');
    }
}

function countCategory()
{
    global $conn;
    $count = $conn->prepare('select count(id) as count from category');
    $count->execute();
    $count = $count->fetch(PDO::FETCH_OBJ);
    return $count->count;
}

function pages()
{
    $range = RANGE;
    $count = countCategory();
    return ceil($count / $range);

}




