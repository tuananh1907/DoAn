<?php
$categories = addCategory();
?>
<form action="" method="post">
    <div id="page-wrapper">
        <div id="main-wrapper">
            <div id="main-header">
                <div class="block-left">
                    <img src="images/icons/icon_list.png" alt=""/>

                    <h1 class='title'>
                        Danh Mục :: Thêm Mới
                    </h1>
                </div>
                <div class="block-right">
                    <input type="submit" name="add" value="Thêm" id="cmdAdd" class="button "/>

                    <a href="/admin/?mod=category" id="cmdDel" class="button">Hủy</a>

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


                                                </div>
                                                <div class="clearfix">
                                                </div>

                                                <br/><br/>

                                            </div>
                                        </div>
                                        <div id="childtabs-2">
                                            <div class="form">

                                                <div class="clearfix">
                                                </div>

                                                <br/><br/>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="control">
                                    <input type="submit" name="add" value="Thêm" id="cmdAdd" class="button "/>

                                    <a href="/admin/?mod=category" id="cmdDel" class="button">Hủy</a>
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

                                    <div>
                                        <select name="status">
                                            <option value="1" >
                                                Hiện
                                            </option>
                                            <option value="0">
                                                Ẩn
                                            </option>
                                        </select>
                                    </div>
                                </li>
                                <li>

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