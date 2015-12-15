<?php 
require 'islogin.php';
require '../common/db.php'; 
?>
<!doctype html>
<html>
<head>
<meta charset="gbk" />
<title>欢迎光临-河南艺术培训基地-官方网站-后台管理系统Ver1.0</title>
<link href="index.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
<!--
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
//-->
</script>
</head>
<body style="margin: 5px">
	<div id="itop">
		<div id="itop_left"></div>
		<div id="itop_center">
		    <span id="cleft"></span>
			<span id="ctitle">网站右侧在线客服信息</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
		<table bgcolor="#999999" width="98%" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>
    <th height="35" colspan="2" bgcolor="#F3F3F3">&nbsp;</th>
  </tr>
  <tr>
    <td width="37%" align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="63%" align="left" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">&nbsp;</td>
    <td align="left" bgcolor="#FbFbFb">&nbsp;</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">&nbsp;</td>
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
