<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的主页</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/amazeui.min.css"/>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<?php include 'admin_header.php'; ?>

<div class="am-cf admin-main">

    <?php include 'admin_sidebar.php';?>

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">文章管理</strong> / <small>blog</small>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">

                <form action="admin/add_blog" method="post">
                    添加文章信息:
                    <p>标题:<input name="title" type="text" value=""></p>
                    <p>内容:<textarea name="content" style="width: 300px; height: 65px;" ></textarea>
                    </p>
                    <p>文章配图:<input name="img" type="text" value=""></p>
                    <input name="author" type="hidden" value="<?php echo $admin->admin_id;?>">
                    <p>
                        <input type="submit" value="新增">
                    </p>
                </form>
            </div>
        </div>
    </div>
    <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© Design by Li Danni 2015.</p>
</footer>


<script src="js/jquery.js"></script>
<script src="js/amazeui.min.js"></script>

</body>
</html>
