<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>TQCMS | Powerful backend admin user interface</title>
    <link href="style.css" rel="stylesheet" media="all" />
    <link href="css/smoothness/jquery-ui-1.8.23.custom.css" rel="stylesheet" media="all" />
    <script type="text/javascript" src="js/jquery-1.8.0.min.js"></script>
    <script type="text/javascript" src="js/ddsmoothmenu.js"></script>
    <script type="text/javascript" src="js/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script>
    <script type="text/javascript" src="js/tooltip.js"></script>
    <script type="text/javascript" src="js/custom.js"></script>
    <!--[if IE 6]>
    <link href="css/ie6.css" rel="stylesheet" media="all" />
    <script src="js/pngfix.js"></script>
    <script>
        /* EXAMPLE */
        DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');
    </script>
    <![endif]-->
    <!--[if IE 7]>
    <link href="css/ie7.css" rel="stylesheet" media="all" />
    <![endif]-->
</head>
<body>
<div id="header">
    <div id="top-menu">
        <a href="/admin"><div class="block-left logo"><img src="images/logo.png" /></div></a>
        <div class="float-right">
            <dl id="sample" class="dropdown right-item ">

            </dl>
            <a id="viewwebsite" class="radius2 right-item" href ="#" title="Website">Website</a>
            <div id="userPanel" class="headercolumn block-right">
                <a href="" class="userinfo radius2">
                    <img src="images/avatar.png" alt="" class="radius2">
                    <span><strong>Administrator</strong></span>
                </a>
                <div class="userdrop" style="width: 151px;">
                    <ul>
                        <li><a href="/admin?logout=true">Logout</a></li>
                    </ul>
                </div>
                <!--userdrop-->
            </div>
        </div>
    </div>
    <div id="smoothmenu1" class="ddsmoothmenu">
        <ul id="navigation" class="sf-navbar">
<!--            <li><a href="index.html">Dashboard</a>-->
<!--                <ul>-->
<!--                    <li><a href="index.html">Administration</a></li>-->
<!--                    <li><a href="add.html">Forms</a></li>-->
<!--                    <li><a href="#">Tables</a></li>-->
<!--                    <li><a href="msg.html">Response Messages</a></li>-->
<!--                </ul>-->
<!--            </li>-->
            <li><a href="/admin/?mod=category">Category</a>
                <ul>
                    <li><a href="/admin/?mod=category&action=add">Add Category</a></li>

                </ul>
            </li>
            <li><a href="/admin/?mod=product">Product</a>
                <ul>
                    <li><a href="/admin/?mod=product&action=add">Add Product</a> </li>

                </ul>
            </li>
            <li><a href="/admin/?mod=account">Account</a>
<!--                <ul>-->
<!--                    <li><a href="/admin/?mod=account&action=add">Add Account</a> </li>-->
<!---->
<!--                </ul>-->
            </li>

            <li><a href="/admin/?mod=orders">Orders</a>
                <ul>
                    <li><a href="/admin/?mod=ordersdetail">OrdersDetail</a>
                </ul>
            </li>



            </li>
        </ul>
    </div>
</div>