<?php 
require 'islogin.php';
require '../common/db.php'; 
require '../common/util.php'; 
if(isset($_GET['add'])){
	$cpath = trim($_GET['path']);
	$query = $pdo->prepare("SELECT ctitle,CONCAT(cpath,',',cid) AS abspath FROM goodsclass WHERE cid IN ($cpath)  ORDER BY abspath");
	$query->execute();
    $info = $query->fetchAll(PDO::FETCH_NUM);
	$class = '';
	foreach($info as $v){
	    $class .= $v[0].'&gt;';
	}
}


if(isset($_POST['mysub'])){
	$cpath = isset($_POST['path'])?$_POST['path']:0;
	$clevel = isset($_POST['level'])?$_POST['level']:1;
	$cpid = isset($_POST['pid'])?$_POST['pid']:0;
    $title = trim($_POST['name']);
	$pdo->exec("insert into goodsclass values(null,'$title',$cpid,'$cpath',$clevel)");
	go('goodsclass_manager.php');
}
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
			<span id="ctitle">添加分类</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
		<form action="#" method="post">
		

<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
 <tr>
    <td width="37%" align="right" bgcolor="#FFFFFF">根类别信息：</td>
    <td width="63%" align="left" bgcolor="#FFFFFF">
     <?php
	 if(isset($class)){
	      echo $class; 
	 }else{
	      echo '根分类';
	 }
	 ?>
	</td>
  </tr>

  <tr>
    <td width="37%" align="right" bgcolor="#FFFFFF">类别名称：</td>
    <td width="63%" align="left" bgcolor="#FFFFFF">
	<input type="text" name="name" value="" size="30" />
    <?php
	if(isset($_GET['add'])){
        ?>
<input type="hidden" name="level" value="<?php echo $_GET['clevel']; ?>">
<input type="hidden" name="path" value="<?php echo $_GET['path']; ?>">
<input type="hidden" name="pid" value="<?php echo $_GET['cpid'];?>">
		<?php
    }
	?>
	</td>
  </tr>
  
  <tr>
    <td colspan="2" bgcolor="#FFFFFF">
    <span class="s_btn_wr"><input type="submit" value="添加分类" name="mysub" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>
    </td>
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
