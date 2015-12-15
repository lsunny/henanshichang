<?php 
require 'islogin.php';
require '../common/db.php'; 
require '../common/util.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理系统 Ver1.0</title>
<link href="index.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	function init(){
	var h = $(document).height()-50;
	$("#imiddle").css("height",h);
	$("#imiddle_left").css("height",h);
	$("#imiddle_center").css("height",h);
	$("#imiddle_right").css("height",h);
	}
	init();
	setInterval(init,1000); 
});
</script>
</head>
<body style="margin: 5px">
	<div id="itop">
		<div id="itop_left"></div>
		<div id="itop_center">
		    <span id="cleft"></span>
			<span id="ctitle">系统环境信息</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		
		<!-- 正文 -->
		<div id="imiddle_center">

<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
   <tr>
    <th height="25" colspan="2" bgcolor="#F3F3F3" align="center">网站信息提醒</th>
  </tr>
  <tr>
    <td width="37%" align="right" bgcolor="#FFFFFF">新留言未处理：</td>
    <td width="63%" align="left" bgcolor="#FFFFFF" style="color:red">
    <?php
	$result = $pdo->query("SELECT COUNT(*) FROM hnsc_guestbook where gflag='n'");
	echo $result->fetchColumn();
	?> 个</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">总共留言人数：</td>
    <td align="left" bgcolor="#FbFbFb">
	<?php
	$result=$pdo->query("SELECT COUNT(*) FROM hnsc_guestbook");
	echo $result->fetchColumn();
	?>	个</td>
  </tr>
</table>

		<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
   <tr>
    <th height="25" colspan="2" bgcolor="#F3F3F3" align="center">管理程序版本Ver1.0&nbsp;作者：webrx@126.com&nbsp;QQ:7031633</th>
  </tr>
  <tr>
    <td width="37%" align="right" bgcolor="#FFFFFF">当前位置：</td>
    <td width="63%" align="left" bgcolor="#FFFFFF"><?php echo $_SERVER['SERVER_ADDR']; ?>(<?php echo iconv('gbk','utf-8',convertip(ip()));?>)</td>
  </tr>

  <tr>
    <td align="right" bgcolor="#FbFbFb">服务器系统：</td>
    <td align="left" bgcolor="#FbFbFb"><?php echo PHP_OS;?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">服务器软件及版本：</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo $_SERVER['SERVER_SOFTWARE'];?></td>
  </tr>
    <tr>
    <td align="right" bgcolor="#FbFbFb">PHP版本：</td>
    <td align="left" bgcolor="#FbFbFb"><?php echo PHP_VERSION;?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">MySQL数据库版本：</td>
    <td align="left" bgcolor="#FFFFFF">
	<?php
	$stmt = $pdo->prepare('select version()');
	$stmt->execute();
	echo $stmt->fetchColumn(0);
	?></td>
  </tr>
      <tr>
    <td align="right" bgcolor="#FbFbFb">上传文件大小许可：</td>
    <td align="left" bgcolor="#FbFbFb"><?php echo ini_get("upload_max_filesize");?></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">服务器会话时间：</td>
    <td align="left" bgcolor="#FFFFFF"><?php echo ini_get("session.gc_maxlifetime")/60;?>分钟</td>
  </tr>
</table>
		</div>
		<div id="imiddle_right"></div>
	</div>
	<div id="ibottom">
		<div id="ibottom_left"></div>
		<div id="ibottom_center"></div>
		<div id="ibottom_right"></div>
	</div>

</body>
</html>