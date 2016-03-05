<?php
$categories = getAllCategory();
addProduct();


?>
<form action="" method="post" enctype="multipart/form-data">
    <div id="page-wrapper">
        <div id="main-wrapper">
            <div id="main-header">
                <div class="block-left">
                    <img src="images/icons/icon_list.png" alt=""/>

                    <h1 class='title'>
                        Sản Phẩm :: Thêm Mới
                    </h1>
                </div>
                <div class="block-right">
                    <input type="submit" name="add" value="Thêm" id="cmdAdd" class="button "/>

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
                                                    <input name="name" type="text" value="" class="field text full">



                                                    <label class="desc">
                                                        Giá
                                                    </label>
                                                    <input name="price" type="text" value="" class="field text full">

                                                    <label class="desc">
                                                        Số Lượng
                                                    </label>
                                                    <input name="quantity" type="text" value="" class="field text full">



                                                    <label class="desc">
                                                        Mô Tả
                                                    </label>
                                                    <textarea name="description" class="long full" rows="20"></textarea>


                                                        <label class="desc">
                                                            Hình ảnh
                                                        </label>
                                                        <input name="photo" type="file" class="image-upload" />


                                                </div>

                                                <div class="clearfix">
                                                </div>

                                                <br/><br/>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="control">
                                    <input type="submit" name="add" value="Thêm" id="cmdAdd" class="button "/>

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
                                        <option value="1" >
                                            Hiện
                                        </option>
                                        <option value="0">
                                            Ẩn
                                        </option>
                                    </select>
                                </li>
                                <li>
                                    <label class="desc">
                                        Danh Mục
                                    </label>

                                    <select name="categoryid" >
                                        <?php
                                        while ($l = $categories->fetch(PDO::FETCH_OBJ)) {
                                            ?>
                                            <option value="<?php echo $l->id?>"><?php echo $l->name?></option>
                                        <?php }?>
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
<div class="clearfix">
</div>
