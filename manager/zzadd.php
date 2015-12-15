<?php 
require 'islogin.php';
require '../common/db.php'; 
include '../common/f.php';
if(isset($_POST['title'])){
	 
  	 $uf = upload('../upload/zz/',1);
   	 $_POST['url'] = $uf[0];

	include '../common/i.php';
	save('hnsc_zz',$_POST);
	thumb('../upload/zz/'.$uf[0],false,201,142,'s_');
	logo('../upload/zz/'.$uf[0]);
    header('location:zzmanager.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>后台管理系统Ver1.0</title>
<link href="index.css" type="text/css" rel="stylesheet">
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
	$('input[type=file]').change(function(){
		var url = $(this).val();
		url = url.split("\\");
		var n = url[url.length-1];
		n = n.substring(0,n.lastIndexOf('.'));
		$('#title').val(n);
	});
});
//-->
</script>
</head>
<body style="margin: 5px">
	<div id="itop">
		<div id="itop_left"></div>
		<div id="itop_center">
		    <span id="cleft"></span>
			<span id="ctitle">添加新资质</span>
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
    <td width="27%" align="right" bgcolor="#FFFFFF">类别：</td>
    <td width="73%" align="left" bgcolor="#FFFFFF">
    <select name="cname">
 <?php
 			$rows = query('hnsc_zzclass');
			foreach($rows as $v){
				printf("<option value='%s'>%s</option>",$v[0],$v[0]);
			}
?>
</select><a href="zzclassmanager.php">添加类别</a>
    </td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">资质描述：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="title" id="title"></td>
  </tr>
   <tr>
    <td align="right" bgcolor="#FFFFFF">资质图片：</td>
    <td align="left" bgcolor="#FFFFFF"><input type="file" name="zzfile"> (图片格式是jpg）</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">是否可视：</td>
    <td align="left" bgcolor="#FbFbFb"><label><input type="radio" name="flag" value="y" checked>&nbsp;显示&nbsp;&nbsp;</label>
<label><input type="radio" name="flag" value="n">&nbsp;不显示</label></td>
  </tr>
      <tr>
        <td align="left" bgcolor="#FbFbFb" colspan="2"><span class="s_btn_wr"><input type="submit" value="添加资质" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
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