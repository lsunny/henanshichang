<?php include_once "islogin.php"; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>后台管理系统Ver1.0</title>
<meta charset="utf-8">
<link href="index.css" type="text/css" rel="stylesheet">
</head>
<!-- 主框架程序内容 -->
<frameset rows="60,*" cols="*" border="0">
    <frame src="top.php" scrolling="no"/>
    <frameset rows="*" cols="184,*">
        <frame src="left.php" name="fleft" frameborder="0" scrolling="no"  noresize />
        <frame src="welcome.php" name="wmain" />
    </frameset>
</frameset>
<noframes><body>您的浏览器不支持框架！！！</body></noframes></html>