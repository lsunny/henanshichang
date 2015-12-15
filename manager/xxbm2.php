<?php
header('Content-Type: text/html; charset=utf-8');
include 'islogin.php';
include '../common/db.php';
include '../common/Pager.pdo.class.php';
include '../common/util.php';

if(isset($_GET['id'])){
    mysql_query('delete from dfdyyspx_xxbm where xxbm_id='.$_GET['id'],$conn);	
}

if(isset($_POST['delall'])){
	$ids = implode(',',$_POST['delall']);
    $del = "delete from dfdyyspx_xxbm where xxbm_id in ($ids)";
	mysql_query($del,$conn);
}
$currpage = isset ( $_GET ['p'] ) ? $_GET ['p'] : 1;
$pager = new Pager ( $pdo, 'dfdyyspx_xxbm', 'xxbm_id desc', "1=1", 10, $currpage,'*');
$result = $pager->query();
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
			<span id="ctitle">网上报名管理</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
<form action="" method="post">
<table style="margin:5px" bgcolor="#999999" width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
<tr bgcolor="#F3F3F3">
<th>&nbsp;</th>
<th>联系人/QQ</th>
<th>联系人电话</th>
<th>性别</th>
<th>报名标题</th>
<th>内容</th>
<th>时间</th>
<th>处理情况</th>
<th>操作</th>
</tr>
<?php
foreach($result as $row){
//while($row = @mysql_fetch_row($result)){
	?>
    <tr align="center" bgcolor="#ffffff" onMouseOver="this.bgColor='#fdf5ea'" onMouseOut="this.bgColor='white'">
          <td><input type="checkbox" name="delall[]" value="<?php echo $row[0]; ?>" /></td>
    <td><?php echo $row[2];echo strlen($row[6])==0 ? '' : '/QQ:'.$row[6]; ?>&nbsp;</td>

      <td><?php echo $row[5];?>&nbsp;</td>
      <td><?php echo $row[3];?>&nbsp;</td>
      <td><?php echo $row[1];?>&nbsp;</td>
      <td><?php echo $row[4];?>&nbsp;</td>
      <td><?php echo date('m月d日H时i分',$row[7]);?>&nbsp;</td>
      
      <td><?php echo $row[10]==1 ? '已处理' : '未处理'; ?></td>
      <td><a href='xxbmdetails2.php?p=<?php echo $currpage; ?>&id=<?php echo $row[0];?>'>查看详细</a>&nbsp;&nbsp;
	  <?php 
	  if($row[10]==1){
		  echo '<a href=?p='.$currpage.'&id='.$row[0].' >删除</a>';  
	  }
	  ?>
      </td>
    </tr>
    <?php
}
?>
<tr align="center" bgcolor="#ffffff"><td colspan="9">
<?php
$pager->pagenum();
?>
</td></tr>
<tr bgcolor="#ffffff"><td colspan="9">
<input type="button" onclick="$('input[type=checkbox]').attr('checked',true)" value="全选" />
<input type="button" onclick="$('input[type=checkbox]').attr('checked',false)" value="取消" />
<input type="button" onclick="$('input[type=checkbox]').each(function(){$(this).attr('checked',!$(this).attr('checked'))});" value="反选" />
<input type="submit" value="删除所选"/>
</td></tr>
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