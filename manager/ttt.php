<?php
include 'islogin.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>无标题文档</title>
<link rel="stylesheet" type="text/css"  href="index.css" />
</head>

<body>

<div id="wtop">
		<div id="left">
			<img src="images/htlogo.gif" width="356" height="60" border="0" alt="瑞欣网络" />
		</div>
		<div id="center">管理员：<?php echo @$_SESSION['user'][1];?> &nbsp;&nbsp;上次登录地址: <?php echo @convertip($_SESSION['user'][3]);?>&nbsp;&nbsp;上次登录时间：<?php echo date('Y-m-d H:i:s',@$_SESSION['user'][2]);?></div>
		<div id="right">
			<a href="logout.php" target="_top"></a>
		</div>
	</div>
</body>
</html>