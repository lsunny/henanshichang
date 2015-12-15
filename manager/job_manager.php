<?php 
header('Content-Type: text/html; charset=utf-8');
require 'islogin.php';
require '../common/db.php'; 
require '../common/util.php';
if(isset($_GET["del"])){
	$did = $_GET["id"];
	$del = "delete from job where id = $did";
	$pdo->exec($del);
	alert("删除成功");
}

$result = $pdo->prepare("select * from job order by id desc");
$result->execute();
$row = $result->fetchALL(PDO::FETCH_NUM);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
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
			<span id="ctitle">招聘管理</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
	
<table bgcolor="#999999" width="95%" style="margin-top:5px;" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr bgcolor="#FbFbFb">
    <td align="center" >职位</td>
    <td align="center">职位描述</td>
    <td align="center">操作</td>
  </tr>
<?php foreach($row as $v){?>
  <tr  bgcolor="#FFFFFF">
    <td width="22%" align="left"><?php echo $v[1]; ?></td>
    <td width="65%" align="left"><?php echo $v[2]; ?></td>
    <td width="13%" align="center"><a href="?del=yes&id=<?php echo $v[0]; ?>">删除</a>&nbsp;&nbsp;<a href="job_add.php?update=yes&id=<?php echo $v[0]; ?>">修改</a></td>
  </tr>
  <?php } ?>
  
  <tr bgcolor="#FbFbFb">
    <td align="right" >&nbsp;</td>
    <td colspan="2" align="left"> <span class="s_btn_wr"><input type="button" onclick="location.href='job_add.php'" name="mysub" value="发布招聘" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
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
