<!--blog评论,需要登录验证,用户信息存在t_admin中,根据t_admin中的
admin_name,admin_pwd进行验证,验证通过才能将"评论"插入数据库中

有3张表:
t_admin  用户信息表,用于登录验证,登录成功后进入index页面,
index页面中点击blog,进入blog页面中,可评论
t_blog 文件从数据库中查出
t_comment
网站又一个添加评论功能
-->
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的主页</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/blog.css">
</head>
<body>

	<?php include 'nav.php'; ?>

	<div id="header" class="blog_header">
		<img class="header-bg" src="img/bg2.jpg" alt="">
	</div>

	<div id="content">
		<div class="container">
			<img src="img/single.jpg" alt="">

			<p 	style="word-break:break-all;" class="blog_content">
				<?php echo $blog->content; ?>
			</p>

			<div class="author">
				<p>Written by <span><?php echo $blog->admin_name; ?></span></p>
				<img src="<?php echo $blog->admin_photo; ?>" alt="">
				<p class="des">View all posts by: <span><?php echo $blog->admin_name; ?></span></p>
			</div>

			<p class="article">Article Comment</p>
			<ul class="blog_comment">
				<?php
					foreach($comments as $comment) {
				?>
					<li><?php echo $comment->comment; ?><li>
				<?php
					}
				?>
			</ul>

			<p class="add" >Add Comment</p>
			<div class="add-comment">
				<span>*</span>
				<textarea class="area"></textarea>
				<p><input data-id="<?php echo $blog->blog_id;?>" class="submit" type="button" value="submit"></p>
			</div>
		</div>
	</div>


	<?php include 'footer.php'; ?>

	<script src="js/require.js" data-main="js/blog.js"></script>


</body>
</html>