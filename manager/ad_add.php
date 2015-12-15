<?php 
require 'islogin.php';
require '../common/db.php'; 
include '../common/f.php';
if(isset($_POST['title'])){
   $uf = upload('../upload/ad/',1);
   $_POST['path'] = $uf[0];
   save('hnsc_ad',$_POST);
   header('location:ad_add.php');
}

if(isset($_GET['n'],$_GET['id'])){
	$name  = $_GET['n'];
	delete('hnsc_ad',array('id'=>$_GET['id']));
	@unlink('../upload/ad/'.$name);
    header('location:ad_add.php');
}

if(isset($_GET['flag'],$_GET['id'])){
	$f = $_GET['flag'];
	$id = $_GET['id'];
	update('hnsc_ad',array('flag'=>$f),'id='.$id);
}
?>

<!doctype html>
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
			<span id="ctitle">添加新广告</span>
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
    <td width="27%" align="right" bgcolor="#FFFFFF">标题：</td>
    <td width="73%" align="left" bgcolor="#FFFFFF"><input type="text" name="title">
（标题可不填写）</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">链接：</td>
    <td align="left" bgcolor="#FbFbFb"><input name="url" type="text" value="#">
（#号代表空链接，可以不填写）</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FFFFFF">广告图片：</td>
    <td align="left" bgcolor="#FFFFFF"><input type="file" name="path"/>
      (图片格式是jpg，尺寸大小为：980px * 380px）</td>
  </tr>
  <tr>
    <td align="right" bgcolor="#FbFbFb">是否可视：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="radio" name="flag" value="y" id="f1" checked/><label for="f1">显示</label>
<input name="flag" type="radio" id="f2" value="n"/><label for="f2">不显示</label></td>
  </tr>
      <tr>
        <td align="left" bgcolor="#FbFbFb" colspan="2"><span class="s_btn_wr"><input type="submit" value="添加广告" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
        
      </tr>
</table>
</form>

		<form method="post">
<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <td width="8%" align="right" bgcolor="#FFFFFF">标题</td>
    <td width="26%" align="left" bgcolor="#FFFFFF">图片</td>
    <td width="8%" align="left" bgcolor="#FFFFFF">链接地址</td>
    <td width="8%" align="left" bgcolor="#FFFFFF">是否显示</td>
    <td width="42%" align="left" bgcolor="#FFFFFF">基本操作</td>
  </tr>
   <?php
  $row = query('hnsc_ad');
  foreach($row as $v){
	  $f = 0;
	  if($v[4]=='y'){
		$f = 1;  
	  }
  ?>
  <tr>
    <td align="right" bgcolor="#FFFFFF"><?=$v[1]?></td>
    <td align="left" bgcolor="#FFFFFF"><img width="200" height="80" src="../upload/ad/<?=$v[2]?>">&nbsp;</td>
    <td align="left" bgcolor="#FFFFFF"><?=$v[3]?></td>
    <td align="left" bgcolor="#FFFFFF">
    <?php
	if($v[4]=='y'){
	    printf("<a href='?id=%d&flag=n'>设置隐藏</a>",$v[0]);	
	}else{
	    printf("<a href='?id=%d&flag=y'>设置显示</a>",$v[0]);	
	}
	?>
    </td>
    <td align="left" bgcolor="#FFFFFF"><a href="?n=<?=$v[2]?>&id=<?=$v[0]?>">删除</a>
    
    <a href="adupdate.php?name=<?php echo $v[2]; ?>">更改图片</a>&nbsp;</td>
  </tr>
  <?php }?>
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