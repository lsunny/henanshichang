<?php
include 'islogin.php';
include '../common/db.php';
include '../common/Pager.pdo.class.php';
include '../common/util.php';
if(isset($_GET["id"])){
    $pdo->exec("delete from adminlog where id=".$_GET["id"]);
}
$currpage = isset ( $_GET ['p'] ) ? $_GET ['p'] : 1;
$pager = new Pager ( $pdo, 'adminlog,admin', 'adminlog.id desc', "adminlog.aid = admin.id", 15, $currpage,'adminlog.id,info,account,truename,atime,aip');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>欢迎光临-河南艺术培训基地-官方网站-后台管理系统Ver1.0</title>
<link rel="stylesheet" type="text/css" href="index.css" />
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
			<span id="ctitle">管理员日志管理</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
<table style="margin-top:5px" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>
    <th height="35" bgcolor="#F3F3F3">&nbsp;</th>
    <th height="35" bgcolor="#F3F3F3">操作信息</th>
    <th height="35" bgcolor="#F3F3F3">账号（姓名）</th>
    <th height="35" bgcolor="#F3F3F3">操作时间</th>
    <th bgcolor="#F3F3F3">操作IP及地区</th>
    <th bgcolor="#F3F3F3">操作</th>
  </tr>
  <?php 
  $i = 0;
  $color = "#FbFbFb";
  foreach($pager->query() as $v){
	  	  if(++$i % 2 == 0) { 
			  $color = '#FFFFFF';
		  }else{
			  
			  $color =  '#FBFBFB';
		 }
	  ?>
  <tr bgcolor="<?php echo $color;?>" onmouseover="this.bgColor='#fcf9cd'" onmouseout="this.bgColor='<?php echo $color;?>'">
    <td width="2%" align="center"><input type="checkbox" name="del[]" value="<?php echo $v[0];?>"></td>
    <td width="14%" align="center"><?php echo $v[1]; ?></td>
    <td width="15%" align="center"><?php echo $v[2]; ?>(<?php echo $v[3]; ?>)</td>
    <td width="17%" align="center"><?php echo date('Y-m-d H:i:s',$v[4]); ?></td>
    <td width="46%" align="center"><?php echo $v[5].'/'.iconv('gbk','utf-8',convertip($v[5])); ?></td>
    <td width="6%" align="center"><a href="?id=<?php echo $v[0] ;?>">删除</a></td>
  </tr>
  <?php }?>
  <tr>
    <td colspan="6" style="line-height:35px" align="center" bgcolor="#FFFFFF"><?php $pager->pagenum(); ?></td>
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