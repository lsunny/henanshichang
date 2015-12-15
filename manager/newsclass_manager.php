<?php 
require 'islogin.php';
require '../db/db.php'; 
?>
<!doctype html>
<html>
<head>
<meta charset="gbk" />
<title>欢迎光临-河南艺术培训基地-官方网站-后台管理系统Ver1.0</title>
<link rel="stylesheet" type="text/css"   href="index.css" />
<link rel="stylesheet" type="text/css"   href="icon.css" />
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
			<span id="ctitle">文章类别管理</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
		<form method="post"><input type="text" name="nclass" /><input type="submit" value="添加文章类别"/></form>
		<?php
		if(isset($_POST['nclass'])){
			$t = trim($_POST['nclass']);
			mysql_query("insert into newsclass values('{$t}')",$conn);
		}
		
		if(isset($_GET['did'])){
			$tt = $_GET['did'];
			mysql_query("delete from newsclass where ctitle='{$tt}'",$conn);
		}
		
		$r = mysql_query('select * from newsclass',$conn); 
		while((bool)$row=mysql_fetch_row($r)){
			$sql='select count(*) from news where ntype='."'$row[0]'";
			$res = mysql_query($sql,$conn);
			$nnum = mysql_result($res,0);
            echo $row[0].'('.$nnum.')&nbsp;<br/>';
            if($nnum<=0){
                echo ' <a class=del href=?did='.$row[0].'></a><br>';
		    }
		}
		?>
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
