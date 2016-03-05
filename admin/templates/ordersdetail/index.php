<?php
$ordersdetail = getAll();
countOrdersDetail();
$pages = pages();
$current_page = isset($_GET['p']) ? $_GET['p'] : 1;
?>
<div id="page-wrapper">
    <div id="main-wrapper">
        <div id="main-header">
            <div class="block-left">
                <img src="images/icons/icon_list.png" alt="" />
                <h1 class='title'>
                    OrdersDetail
                </h1>
            </div>

        </div>
        <div id="main-content">
            <div class="widget">
                <div class="whead">


                    <div class="clearfix">
                    </div>
                </div>
                <table class="aGrid" cellspacing="0" id="GridView1" style="border-collapse: collapse;">
                    <tbody>
                    <tr>



                        <th scope="col">
                            Tên sản phẩm
                        </th>
                        <th>
                            Giá
                        </th>
                        <th scope="col">
                             Số lượng
                        </th>
                        <th scope="col">
                            Mã đơn hàng
                        </th>



                    </tr>
                    <?php
                    while ($orddt = $ordersdetail->fetch(PDO::FETCH_OBJ)) {

                    ?>
                    <tr class="">



                        <td class="textleft">
                            <?php echo $orddt->name?>
                        </td>
                        <td class="textleft">
                            <a id="lblCategory"><?php echo $orddt->price?></a>
                        </td>
                        <td class="textleft">
                            <a id="lblCategory"><?php echo $orddt->quantity?></a>
                        </td>

                        <td class="textleft">
                            <a id="lblCategory"><?php echo $orddt->ordersid?></a>
                        </td>


                    </tr>
                    <?php }?>




                    </tbody>
                </table>
                <div class="fg-toolbar tableFooter">

                    <div class="dataTables_paginate paging_full_numbers" id="dynamic_paginate">
                        <a href="/admin?mod=ordersdetail&p=1" tabindex="0" class="first paginate_button <?php echo $current_page == 1 ? 'paginate_button_disabled' : ''?>" id="dynamic_first">First</a>

							<span>
                                <?php
                                for ($i = 1; $i <= $pages; $i++) {
                                ?>
							<a href="/admin?mod=ordersdetail&p=<?php echo $i?>" tabindex="0" class="<?php echo $current_page == $i ? 'paginate_active' : 'paginate_button'?>"><?php echo $i?></a>
                                <?php }?>

							</span>

                        <a href="/admin?mod=ordersdetail&p=<?php echo $pages?>" tabindex="0" class="last paginate_button <?php echo $current_page == $pages ? 'paginate_button_disabled' : ''?>" id="dynamic_last">Last</a>

                    </div>
                    <div class="showgotopage">
                        <input type="text" name="txtgotopage" class="txtgotopage" />

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