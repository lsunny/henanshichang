<?php 
require_once 'islogin.php';
require_once '../common/db.php'; 
if(isset($_GET['n'],$_GET['id'])){
	$name  = $_GET['n'];
	delete('hnsc_zz',array('id'=>$_GET['id']));
	@unlink('../upload/zz/'.$name);
	@unlink('../upload/zz/s_'.$name);
    header('location:zzmanager.php');
}else if(isset($_GET['flag'],$_GET['id'])){
	update('hnsc_zz',array('flag'=>$_GET['flag']),'id='.$_GET['id']);
}
$currpage = isset ( $_GET ['p'] ) ? $_GET ['p'] : 1;
$rs = pager('hnsc_zz',$currpage,'*',5,'1=1','order by id desc');
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
			<span id="ctitle">资质管理</span>
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
    <th height="35" bgcolor="#F3F3F3">标题</th>
    <th height="35" bgcolor="#F3F3F3">图片</th>
    <th height="20" bgcolor="#F3F3F3">资质类别</th>
    <th height="15" bgcolor="#F3F3F3">是否显示</th>
    <th height="35" bgcolor="#F3F3F3">操作</th>
  </tr>
  <?php 
      $i = 0;
	  $color = "#FbFbFb";
      foreach($rs[0] as $v){
		  if(++$i % 2 == 0) { 
			  $color = '#FFFFFF';
		  }else{
			  
			  $color =  '#FBFBFB';
		 }		  
  ?>
  <tr bgcolor="<?php echo $color;?>" onmouseover="this.bgColor='#fcf9cd'" onmouseout="this.bgColor='<?php echo $color;?>'">
    <td width="8%" align="center"><?php echo $v[1]; ?></td>
    <td width="20%" align="center"><img width="100" src="../upload/zz/s_<?=$v[2]?>"></td>
    <td width="22%" align="center"><?php echo $v[3]; ?></td>
    <td width="22%" align="center">
    <?php
		if($v[4]=='y'){
			printf("<a href='?id=%d&flag=n'>设置隐藏</a>",$v[0]);
		}else{
			printf("<a href='?id=%d&flag=y'>设置显示</a>",$v[0]);
		}
	?>
    </td>
    <td width="33%" align="center">
    	<a href="?n=<?=$v[2]?>&id=<?=$v[0]?>" onclick="return confirm('是否要删除:<?php echo $v[1]; ?>?')">删除</a>
    </td>
  </tr>
  <?php } ?>
 <tr>
    <td colspan="5" style="line-height:35px;" align="center" bgcolor="#FFFFFF">
     <?=$rs[1]?>
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