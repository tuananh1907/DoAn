<?php
$product = getProduct();
$categories = getAllCategory();
updateProduct($product);
?>
<form action="" method="post" enctype="multipart/form-data">
    <div id="page-wrapper">
        <div id="main-wrapper">
            <div id="main-header">
                <div class="block-left">
                    <img src="images/icons/icon_list.png" alt=""/>

                    <h1 class='title'>
                        Sản Phẩm :: Chỉnh Sửa
                    </h1>
                </div>
                <div class="block-right">
                    <input type="submit" name="save" value="Lưu" id="cmdAdd" class="button "/>

                    <a href="/admin/?mod=product" id="cmdDel" class="button">Hủy</a>
                </div>
            </div>
            <div id="main-content">
                <div id="content-outer">
                    <div class="content-wrapper">
                        <div class="content">
                            <div id="tabs" class="tabs">

                                <div id="tabs-1">
                                    <div class="tabs">

                                        <div id="childtabs-1">
                                            <div class="form">
                                                <div class="block-left">
                                                    <label class="desc">
                                                        Tên
                                                    </label>
                                                    <input name="name" type="text" value="<?php echo $product->name ?>"
                                                           class="field text full">


                                                    <label class="desc">
                                                        Giá
                                                    </label>
                                                    <input name="price" type="text" value="<?php echo $product->price ?>"
                                                           class="field text full">

                                                    <label class="desc">
                                                        Số Lượng
                                                    </label>
                                                    <input name="quantity" type="text"
                                                           value="<?php echo $product->quantity ?>" class="field text full">


                                                    <label class="desc">
                                                        Mô Tả
                                                    </label>
                                                    <textarea name="content" class="long full"
                                                              rows="20"><?php echo $product->description ?></textarea>


                                                    <label class="desc">
                                                        Hình ảnh
                                                    </label>
                                                    <input name="photo" type="file" class="image-upload"/>
                                                    <img src="<?php echo $product->photo ?>" alt=""/>


                                                </div>

                                                <div class="clearfix">
                                                </div>

                                                <br/><br/>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="control">
                                    <input type="submit" name="save" value="Lưu" id="cmdAdd" class="button "/>

                                    <a href="/admin/?mod=product" id="cmdDel" class="button">Hủy</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="block-left sidebar">

                    <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all">
                        <div class="portlet-header ui-widget-header">
                            <span class="ui-icon ui-icon-circle-arrow-s"></span>Tuỳ chọn
                        </div>
                        <div class="portlet-content">
                            <ul>
                                <li>
                                    <label class="desc">
                                        Trạng thái
                                    </label>
                                    <select name="status">
                                        <option value="1" <?php echo $product->status == 1 ? 'selected' : '' ?> >
                                            Hiện
                                        </option>
                                        <option value="0" <?php echo $product->status == 0 ? 'selected' : '' ?>>
                                            Ẩn
                                        </option>
                                    </select>
                                </li>

                                <li>
                                    <label class="desc">
                                        Danh Mục
                                    </label>

                                    <select name="categoryid">
                                        <?php
                                        while ($l = $categories->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <option
                                                value="<?php echo $l->id ?>" <?php echo $l->id == $product->categoryid ? 'selected' : '' ?>><?php echo $l->name ?></option>
                                        <?php } ?>
                                    </select>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>
    <div class="clearfix">
    </div>
</form>