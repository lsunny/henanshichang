<?php 
header('Content-Type: text/html; charset=utf-8');
require 'islogin.php';
require '../common/db.php'; 
require '../common/util.php';
if($_FILES){
	$_POST['title'] = $_POST['name'];
	unset($_POST['name']);
	if($_FILES['img']['error']==0){
		include '../common/f.php';
		$f = upload('../upload/partner/',1);
		$_POST['img'] = $f[0];
	}
	save('partner',$_POST);
	go('partner_manager.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>后台管理系统Ver1.0</title>
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
			<span id="ctitle">添加友情链接</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		
		<!-- 正文 -->
		<div id="imiddle_center">
		<form method="post" enctype="multipart/form-data">
<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td width="27%" align="right" bgcolor="#FFFFFF">友情链接企业名称：</td>
    <td width="73%" align="left" bgcolor="#FFFFFF"><input type="text" name="name"/></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">友情链接标志图片</td>
    <td align="left" bgcolor="#FbFbFb"><input type="file" name="img"/>
    <span>(图片格式是.jpg尺寸不要太大格式为宽度为90px , 高为50px，也可以不选图片）</span></td>
  </tr>

    <tr>
    <td width="27%" align="right" bgcolor="#FFFFFF">友情链接网址：</td>
    <td width="73%" align="left" bgcolor="#FFFFFF"><input type="text" value="http://www.hnshichang.com" name="url" size="35"/><span>(如果没有网址，可以不用输入)</span></td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">是否显示：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="radio" name="flag" value="1" id="f1" checked/><label for="f1">显示</label>
<input name="flag" type="radio" id="f2" value="0"/><label for="f2">不显示</label></td>
  </tr>
      <tr>
    <td align="left" bgcolor="#FFFFFF" colspan="2">
    <span class="s_btn_wr"><input type="submit" value="添加链接" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>

  </tr>
</table>
</form>
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