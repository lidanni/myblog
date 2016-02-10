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
                    <p>作者:<input name="author" type="text" value=""></p>
                    <p>添加时间:<input name="add_time" type="text" value=""></p>
                    <p>
                        <input type="submit" value="添加文章">
                    </p>
                </form>

                <div class="am-cf">
                    <div class="am-fr">
                        <ul class="am-pagination">
                            <li class="am-disabled"><a href="#">«</a></li>
                            <li class="am-active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">»</a></li>
                        </ul>
                    </div>
                </div>

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
