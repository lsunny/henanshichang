<?php 
require 'islogin.php';
require '../common/db.php';

if(isset($_GET['action'])){
    $id = $_GET["id"];
	$path = $_GET["path"];
	$pdo->exec("delete from goodsclass where cid=$id or cpid like '%$id%'");
}


$result = $pdo->prepare("SELECT cid,ctitle,cpid,CONCAT(cpath,',',cid) AS abspath,clevel FROM goodsclass ORDER BY abspath");
$result->execute();
$row = $result->fetchAll(PDO::FETCH_NUM);
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
			<span id="ctitle">分类管理</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
	
<table style="margin-top:5px" bgcolor="#999999" width="95%" border="0" align="center" cellpadding="2" cellspacing="1">
  <tr>
    <th height="35" bgcolor="#F3F3F3">ID</th>
    <th height="35" bgcolor="#F3F3F3">类别名称</th>
    <th bgcolor="#F3F3F3">父ID</th>
    <th bgcolor="#F3F3F3">类的层级</th>
    <th bgcolor="#F3F3F3">级别</th>
    <th bgcolor="#F3F3F3">操作</th>
  </tr>
  <?php
 
  foreach($row as $v){
  
  ?>
  <tr bgcolor="#FFFFFF" onmouseover="this.bgColor='#dbe7fb'" onmouseout="this.bgColor='#ffffff'">
    <td width="4%" align="center"><?php echo $v[0];?></td>
    <td width="28%" align="left">&nbsp;
<?php
	if($v[4]==1){
	    echo $v[1];
	}else{
	    echo '&nbsp;├'.str_repeat('─',$v[4]-1).$v[1];
	}
?></td>
    <td width="6%" align="center"><?php echo $v[2];?></td>
    <td width="35%" align="center"><?php echo $v[3];?></td>
    <td width="7%" align="center"><?php echo $v[4];?></td>
    <td width="22%" align="center"><a href="goodsclass_add.php?add=yes&path=<?php echo $v[3];?>&cpid=<?php echo $v[0];?>&clevel=<?php echo $v[4]+1 ;?>">添加子类</a> <a onclick="return confirm('是否要删除此分类，删除后直接也会把此分类的子分类删除')" href="?action=del&id=<?php echo $v[0];?>&path=<?php echo $v[3];?>">删除本类</a></td>
  </tr>
  <?php } ?>
  <tr bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="left" colspan='5'><span class="s_btn_wr"><input type="button" onclick="location.href='goodsclass_add.php'" value="添加根类" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
   
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
