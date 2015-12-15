<?php include_once("islogin.php"); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>后台管理系统Ver1.0</title>
<link href="index.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/menu.js"></script>
<script type="text/javascript" charset="gbk" src="../ueditor/editor_all_min.js"></script>
<script type="text/javascript" charset="gbk" src="../ueditor/editor_config.js"></script>
</head>
<body style="padding-top: 5px">
	<div class="mhead">网站常规管理</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="welcome.php" target="wmain">系统环境</a></li>
		</ul>
	</div>
    
    <div class="mhead">荣誉资质</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="zzadd.php" target="wmain">添加资质</a></li>
			<li><a href="zzmanager.php" target="wmain">管理资质</a></li>
			<li><a href="zzclassmanager.php" target="wmain">管理资质类别</a></li>
		</ul>
	</div>

	<div class="mhead">工程管理</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="projectadd.php" target="wmain">添加新工程</a></li>
			<li><a href="projectmanager.php" target="wmain">管理工程</a></li>
		</ul>
	</div>
    
    <div class="mhead">员工风采</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="workeradd.php" target="wmain">添加风采</a></li>
			<li><a href="workermanager.php" target="wmain">管理风采</a></li>
		</ul>
	</div>

	<div class="mhead">留言管理</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="guest_manager.php" target="wmain">管理留言</a></li>
		</ul>
	</div>

	<div class="mhead">新闻管理</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="newsclassmanager.php" target="wmain">类别管理</a></li>
			<li><a href="newsadd.php" target="wmain">发布新闻</a></li>
			<li><a href="newsmanager.php" target="wmain">管理新闻</a></li>
		</ul>
	</div>

	<div class="mhead">广告管理</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="ad_add.php" target="wmain">广告管理</a></li>
		</ul>
	</div>

		<div class="mhead">友情连接管理</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="partner_add.php" target="wmain">添加友情连接</a></li>
			<li><a href="partner_manager.php" target="wmain">管理</a></li>
		</ul>
	</div>

	<div class="mhead">系统管理</div>
	<div class="menu">
		<img src="images/menu_topline.gif" width="182" height="5" />
		<ul>
			<li><a href="admin_add.php" target="wmain">添加管理员</a></li>
			<li><a href="admin_manager.php" target="wmain">管理管理员</a></li>
			<li><a href="admin_log.php" target="wmain">日志管理</a></li>
			<li><a href="data.php?a=repair" target="wmain">修复数据</a></li>
			<li><a href="data.php?a=optimize" target="wmain">优化数据</a></li>
		</ul>
	</div>

	<div class="menubottom"></div>
</body>
</html>