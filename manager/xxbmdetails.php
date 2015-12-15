<?php
!isset($_GET['id'])&&exit;
include '../common/db.php';
$result = mysql_query('select * from xxbm where xxbm_id='.$_GET['id'],$conn);
mysql_query('update xxbm set xxbm_flag=1 where xxbm_id='.$_GET['id'],$conn);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>欢迎光临-河南艺术培训基地-官方网站-后台管理系统Ver1.0</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
			<span id="ctitle">报名详细资料</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
        <table style="margin:5px" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr bgcolor="#F3F3F3">
    <th width="100" align="right">联系人：</th>
    <td><?php echo mysql_result($result,0,1); ?>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <th align="right">性别：</th>
    <td><?php echo mysql_result($result,0,3); ?>&nbsp;</td>
  </tr>
  <tr bgcolor="#F3F3F3">
    <th align="right">年龄：</th>
    <td><?php  echo mysql_result($result,0,2); ?></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <th align="right">联系电话：</th>
 <td><?php  echo mysql_result($result,0,9); ?></td>
  </tr>
  
  <tr bgcolor="#F3F3F3">
    <th align="right">家庭地址：</th>
 <td><?php  echo mysql_result($result,0,4); ?></td>    
  </tr>
  <tr bgcolor="#FFFFFF">
    <th align="right">所在班级：</th>

 <td><?php  echo mysql_result($result,0,5); ?></td>
  </tr>
  <tr bgcolor="#F3F3F3">
    <th align="right">班主任电话：</th>
 <td><?php  echo mysql_result($result,0,6); ?></td>
  </tr>
  
   
  <tr bgcolor="#FFFFFF">
    <th align="right">学历：</th>
 <td><?php  echo mysql_result($result,0,7); ?></td>
  </tr>
  
    <tr bgcolor="#F3F3F3">
    <th align="right">报名专业：</th>
 <td><?php  echo mysql_result($result,0,10); ?></td>
  </tr>
  
    <tr bgcolor="#FFFFFF">
    <th align="right">内容：</th>
 <td><?php  echo mysql_result($result,0,8); ?></td>
  </tr>
  
  <tr bgcolor="#FFFFFF">
    <th align="right">报名时间：</th>
 <td><?php  echo mysql_result($result,0,14); ?></td>
  </tr>
  <tr bgcolor="#F3F3F3">
    <th align="right">联系QQ：</th>
 <td><?php  echo mysql_result($result,0,11); ?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <th align="right">网上报名时间：</th>
 <td><?php  echo date('m月d日H时i分',mysql_result($result,0,12)); ?></td>
  </tr>
  <tr bgcolor="#F3F3F3">
    <th align="right">报名时IP：</th>
    <td><?php echo mysql_result($result,0,13);?>&nbsp;</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td>&nbsp;</td>
    <td><button onClick="location.href='xxbm.php?p=<?php echo $_GET['p']; ?>&id=<?php echo mysql_result($result,0,0); ?>'">删除</button>&nbsp;&nbsp;<button onClick="location.href='xxbm.php?p=<?php echo $_GET['p']; ?>'">返回</button>&nbsp;</td>
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