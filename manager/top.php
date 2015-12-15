<?php
include 'islogin.php';
include '../common/util.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="keywords" content="九州电子网,九州软件,九州商务,九州网络,九州数码,九州科技,九州电子,郑州九州电子,官方网站,九州电子官方网站,九州官方,郑州九州电子科技有限公司,九州数码,九州通信,九州通讯" />
<title>九州电子-九州科技-九州数码-九州网-九州电子网-官方网站</title>
<link rel="stylesheet" type="text/css"  href="index.css" />
</head>

<body>
<div id="wtop">
		<div id="left">
			<img src="images/htlogo.gif" width="356" height="60" border="0" alt="瑞欣网络" />
		</div>
		<div id="center">管理员：<?php echo @$_SESSION['user'][1];?> &nbsp;&nbsp;上次登录地址: <?php echo iconv('gbk','utf-8',@convertip($_SESSION['user'][3]));?>&nbsp;&nbsp;上次登录时间：<?php echo date('Y-m-d H:i:s',@$_SESSION['user'][2]);?></div>
		<div id="right">
			<a href="logout.php" target="_top"></a>
		</div>
	</div>
</body>
</html>