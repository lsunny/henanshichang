<?php
header('Content-Type: text/html; charset=utf-8');
require 'islogin.php';
include '../common/db.php';
if(isset($_POST["cname"])){
	$cname = $_POST["cname"];
	$pdo->exec("insert into dfdyyspx_news_category(cname) values('$cname')");
    header('location:news_category.php');
}else if(isset($_GET["delete"])){
    $pdo->exec("delete from dfdyyspx_news_category where cid=".$_GET["id"]);
    header('location:news_category.php');
}else if(isset($_GET["update"])){
	$c = $_GET["sort"];
	$id = $_GET["id"];
    $pdo->exec("update dfdyyspx_news_category set csort=$c where cid=$id");
    header('location:news_category.php');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>欢迎光临-河南艺术培训基地-官方网站-后台管理系统Ver1.0</title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"/>

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
			<span id="cleft"></span> <span id="ctitle">类别管理</span> <span
				id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
        <div id="imiddle_center">
        <form action="" method="post">
        <table style="margin:5px" bgcolor="#999999" width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
        <tr valign="middle" bgcolor="#FBFBFB">
            <th width="10%" align="right">类别名称：</th><td><input type="text" name="cname" style="border:1px solid gray;height:28px;line-height:28px;"/>
			<span class="s_btn_wr"><input type="submit" value="添加分类" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;
            <span class="s_btn_wr"><input type="reset" value="重置" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;
			</td>
        </tr>
        </table>
       </form>
	   <table style="margin:5px" bgcolor="#999999" width="98%" border="0" align="center" cellpadding="5" cellspacing="1">
	    <tr bgcolor="#FFFFFF">
            <th>类别名称</th>
            <th>类别排序</th>
            <th>基本操作</th>
        </tr>
        <?php 
		$sql = "select cid,cname,csort from dfdyyspx_news_category order by csort asc";
		$query = $pdo->query($sql);
		$row = $query->fetchAll(PDO::FETCH_NUM);
		foreach($row as $v){
		?>
        <tr align="center" bgcolor="#FBFBFB">
            <td><?php echo $v[1] ;?></td>
            <td><input type="text" size="6" name="<?php echo $v[0]; ?>" value="<?php echo $v[2]; ?>" /></td>
            <td><a href="?delete=yes&id=<?php echo $v[0];?>">删除</a>&nbsp;&nbsp; 
			<a href="#" onclick="location.href='news_category.php?update=yes&id=<?php echo $v[0]; ?>&sort='+$('input[name=<?php echo $v[0]; ?>]').val() ">更新</a></td>
        </tr>
		<?php
		}
		?>
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