<?php
$users = getAll();
delUser();
delUsers();
$pages = pages();
$current_page = isset($_GET['p']) ? $_GET['p'] : 1;
?>
<form action="" method="post">
    <div id="page-wrapper">
        <div id="main-wrapper">
            <div id="main-header">
                <div class="block-left">
                    <img src="images/icons/icon_list.png" alt=""/>

                    <h1 class='title'>
                        Thành Viên
                    </h1>
                </div>
<!--                <div class="block-right">-->
<!--                    <input name="txtSearch" type="text" id="txtSearch" class="txtSearch textbox">-->
<!--                    <input type="submit" name="cmdSearch" value="Tìm kiếm"-->
<!--                           onclick="javascript:return RequiredEmptyField('.txtSearch','Chưa nhập chuỗi tìm kiếm!');"-->
<!--                           id="cmdSearch" class="cmdSearch button">-->
<!--                    <input type="submit" name="cmdReset" value="Reset" id="cmdReset" class="button">-->
<!---->
<!---->
<!--                </div>-->
            </div>
            <div id="main-content">
                <div class="widget">
                    <div class="whead">

                        <div class="block-right control">
<!--                            <a href="/admin?mod=account&action=add" id="cmdAdd" class="button buttonAdd">Thêm</a>-->
                            <input onclick="return confirm('Are you sure?')" type="submit" name="del" value="Xóa"
                                   id="cmdDel" class="button buttonDel"/></a>

                        </div>
                        <div class="clearfix">
                        </div>
                    </div>
                    <table class="aGrid" cellspacing="0" id="GridView1" style="border-collapse: collapse;">
                        <tbody>
                        <tr>
                            <th>
                                    <span class="chkHeader">
                                        <input id="chkHeader" type="checkbox" name="chkHeader"
                                               class="check_all"/></span>
                            </th>
                            <th>
                                Xóa/Sửa
                            </th>
                            <th>
                                Hiện
                            </th>
                            <th scope="col">
                                Username
                            </th>


                            <th scope="col">
                                Fullname
                            </th>

                            <th scope="col">
                                Email
                            </th>


                        </tr>
                        <?php
                        while ($user = $users->fetch(PDO::FETCH_OBJ)) {
                            ?>
                            <tr class="">
                                <td class="cellwidth1">
                                    <input value="<?php echo $user->username ?>" id="chkSelect" type="checkbox" name="usns[]"/>
                                </td>
                                <td class="cellwidth2">
                                    <a href="/admin/?mod=account&act=del&usn=<?php echo $user->username ?>"
                                       onclick="return confirm('Are you sure?')"><input type="button"
                                                                                        class="tooltip btgrid delete"
                                                                                        title="Xóa"/></a>
                                    <a href="/admin/?mod=account&action=edit&usn=<?php echo $user->username ?>"><input
                                            type="button" class="tooltip btgrid edit" title="Sửa"/></a>
                                </td>
                                <td class="cellwidth1">
                                    <input type="button" name="ImgRowStatus"
                                           class="tooltip btgrid <?php echo $user->status ? 'publish' : 'unpublish' ?> title="
                                           Đăng"
                                    id="ImgRowStatus"/>
                                </td>
                                <td class="textleft">
                                    <a href="/admin/?mod=account&action=edit&usn=<?php echo $user->username ?>" id="lblName"
                                       class="lblname"><?php echo $user->username ?></a>
                                </td>


                                <td class="textleft">
                                    <?php echo $user->fullname ?>
                                </td>

                                <td class="textleft">
                                    <?php echo $user->email ?>
                                </td>


                            </tr>
                        <?php } ?>


                        </tbody>
                    </table>
                    <div class="fg-toolbar tableFooter">

                        <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate">
                            <a href="/admin/?mod=account&p=1" tabindex="0" class="first paginate_button <?php echo $current_page==1 ? 'paginate_button_disabled' : ''?>"
                               id="dynamic_first">First</a>

							<span>
                                <?php

                                for($i = 1; $i <= $pages; $i++) {
                                    ?>
                                    <a href="/admin/?mod=account&p=<?php echo $i?>" tabindex="0" class="<?php echo $current_page == $i ? 'paginate_active' : 'paginate_button' ?>"><?php echo $i?></a>
                                <?php }?>
							</span>

                            <a href="/admin/?mod=account&p=<?php echo $pages?>" tabindex="0" class="last paginate_button <?php echo $current_page==$pages ? 'paginate_button_disabled' : ''?>" id="dynamic_last">Last</a>

                        </div>

                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix">
    </div>
</form>