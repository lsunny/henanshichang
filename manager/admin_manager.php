<?php 
require_once 'islogin.php';
require_once '../common/db.php'; 
require_once '../common/util.php'; 
require_once '../common/Pager.pdo.class.php'; 
if(isset($_GET["id"])){
    $pdo->exec("delete from admin where id=".$_GET["id"]);
	header("location:admin_manager.php");
}
$currpage = isset ( $_GET ['p'] ) ? $_GET ['p'] : 1;
$pager = new Pager ( $pdo, 'admin', 'id asc', "1=1", 5, $currpage);
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
			<span id="ctitle">管理员管理</span>
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
    <th height="35" bgcolor="#F3F3F3">ID</th>
    <th height="35" bgcolor="#F3F3F3">账号</th>
    <th height="20" bgcolor="#F3F3F3">真实姓名</th>
    <th height="15" bgcolor="#F3F3F3">管理次数</th>
    <th height="35" bgcolor="#F3F3F3">操作</th>
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
    <td width="8%" align="center"><?php echo $v[0]; ?></td>
    <td width="20%" align="center"><?php echo $v[1]; ?></td>
    <td width="22%" align="center"><?php echo $v[2]; ?></td>
    <td width="22%" align="center">
	<?php 
        $sql = "SELECT COUNT(*) FROM adminlog WHERE aid={$v[0]}";
        $result = $pdo->prepare($sql);
	    $result->execute();
	    $recordcount = $result->fetchColumn();
		echo $recordcount;
    ?></td>
    <td width="33%" align="center">
	<a href="admin_modify.php?id=<?php echo $v[0] ;?>&n=<?php echo $v[1]; ?>&name=<?php echo $v[2]; ?>">修改密码</a>
	&nbsp;&nbsp;<a href="?id=<?php echo $v[0] ?>" onclick="return confirm('是否要删除:<?php echo $v[1]; ?>?')">删除</a></td>
  </tr>
  <?php } ?>
 <tr>
    <td colspan="5" style="line-height:35px;" align="center" bgcolor="#FFFFFF">
     <?php echo $pager->pagenum();?>
    </td>
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