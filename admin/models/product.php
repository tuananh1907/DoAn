<?php

function getAll()
{
    global $conn;
    $p = isset($_GET['p']) ? $_GET['p'] : 1;
    $range = RANGE;
    $offset = ($p - 1)*$range;
    $product = $conn->prepare('select product.*, category.name as categoryname from product left join category on product.categoryid = category.id order by id desc limit :range offset :offset');
    $product->bindValue('range', $range, PDO::PARAM_INT);
    $product->bindValue('offset', $offset, PDO::PARAM_INT);
    $product->execute();
    return $product;
}

function getAllCategory()
{
    global $conn;
    $categories = $conn->prepare('select * from category');
    $categories->execute();
    return $categories;
}

function uploadPhoto()
{
    $type = $_FILES['photo']['type'];
    $size = ($_FILES['photo']['size'] / 1024) / 1024;
    if (($size > 2) || ( $type != 'image/jpg' && $type != 'image/jpeg' && $type != 'image/png')) {
        //redirect('/admin/?mod=product&action=add');
        return '';
    } else {

        if (!empty($_FILES['photo']['name'])) {
            copy($_FILES['photo']['tmp_name'], 'uploads/' . $_FILES['photo']['name']);
            return '/admin/uploads/' . $_FILES['photo']['name'];
        }
        return '';

    }
}

function addProduct()
{
    global $conn;
    if (isset($_POST['add'])) {
        if (!empty($_POST['name'])) {
            try{
                $photo = uploadPhoto();
                $product = $conn->prepare('insert into product(name, price, quantity, description, status, categoryid, photo) values (:name, :price, :quantity, :description, :status, :categoryid, :photo)');
                $product->bindValue('name', $_POST['name']);
                $product->bindValue('price', $_POST['price']);
                $product->bindValue('quantity', $_POST['quantity']);
                $product->bindValue('description', $_POST['description']);
                $product->bindValue('status', $_POST['status']);
                $product->bindValue('categoryid', $_POST['categoryid']);
                $product->bindValue('photo', $photo);
                $product->execute();
                $_SESSION['success'] = 'Thêm sản phẩm thành công';
                redirect('/admin?mod=product');
            } catch (PDOException $e)
            {
                $_SESSION['error'] = 'Thêm sản phẩm thất bại';
            }

        }
    }
}

function getProduct()
{
    global $conn;
    $id = $_GET['id'];
    $val = $conn->prepare('select * from product where id = :id');
    $val->bindValue('id', $id);
    $val->execute();
    return $val->fetch(PDO::FETCH_OBJ);

}

function updateProduct($old_product)
{
    global $conn;
    $id = $_GET['id'];
    if (isset($_POST['save'])) {
        if (!empty($_POST['name'])) {
            $photo = uploadPhoto();
            $photo = (!empty($photo)) ? $photo : $old_product->photo;
            $product = $conn->prepare('update product set name = :name, price = :price, quantity = :quantity, description = :description, status = :status, categoryid = :categoryid, photo = :photo where id = :id');
            $product->bindValue('name', $_POST['name']);
            $product->bindValue('price', $_POST['price']);
            $product->bindValue('quantity', $_POST['quantity']);
            $product->bindValue('description', $_POST['description']);
            $product->bindValue('status', $_POST['status']);
            $product->bindValue('categoryid', $_POST['categoryid']);
            $product->bindValue('photo', $photo);
            $product->bindValue('id', $id);
            $product->execute();
            $_SESSION['success'] = 'Cập nhật sản phẩm thành công';
            redirect('/admin?mod=product');

        }
    }
}

function delProduct()
{
    global $conn;
    if ( isset($_GET['act']) ) {
        $id = $_GET['id'];
        $act = $_GET['act'];
        if ($act == 'del') {
            try{
                $user = $conn->prepare('delete from product where id = :id');
                $user->bindValue('id', $id);
                $user->execute();
                $_SESSION['success'] = 'Xoá sản phẩm thành công';
                redirect('/admin?mod=product');
            }catch (PDOException $e)
            {
                $_SESSION['error'] = 'Xoá sản phẩm thất bại';
                redirect('/admin?mod=product');
                //echo "<br>" . $e->getMessage();
            }
        }
    }

}

function delProducts() {
    global $conn;
    if (isset($_POST['del'])) {

        $ids = $_POST['ids'];
        foreach ($ids as $id) {
            try{
                $user = $conn->prepare('delete from product where id = :id');
                $user->bindValue('id', $id);
                $user->execute();
            }catch (PDOException $e)
            {
                $_SESSION['error'] = '1 số sản phẩm xoá thất bại';
                redirect('/admin?mod=product');
            }
        }
        $_SESSION['success'] = 'Xoá sản phẩm thành công';
        redirect('/admin?mod=product');


    }
}

function countProduct() {
    global $conn;
    $count = $conn->prepare('select count(id) as count from product');
    $count->execute();
    $count = $count->fetch(PDO::FETCH_OBJ);
    return $count->count;
}

function pages() {
    $range = RANGE;
    $count = countProduct();
    return ceil($count / $range);

}


