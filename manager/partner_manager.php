<?php 
header('Content-Type: text/html; charset=utf-8');
require 'islogin.php';
require '../common/db.php'; 
require '../common/util.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>后台管理系统Ver1.0</title>
<link href="index.css" type="text/css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="icon.css" />
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
	setInterval(init,3000); 
});
//-->
</script>
</head>
<body style="margin: 5px">
	<div id="itop">
		<div id="itop_left"></div>
		<div id="itop_center">
		    <span id="cleft"></span>
			<span id="ctitle">管理友情链接</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		
		<!-- 正文 -->
		<div id="imiddle_center">
		<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr bgcolor="#F3F3F3" height="25">
    <td width="30%" align="center">图片</td>
    <td width="15%" align="center">企业名称</td>
    <td width="22%" align="center">网址</td>
    <td width="6%" align="center" >是否显示</td>
    <td width="27%" align="center">基本操作</td>
  </tr>
  <?php
if(isset($_GET['flag'])){
	$f = $_GET['flag'];
	$i = $_GET['id'];
	$pdo->exec("update partner set flag={$f} where id={$i}");
}

//删除某一广告项
if(isset($_GET['img'])){
	$i = $_GET['id'];
	$img = $_GET['img'];
	$pdo->exec('delete from partner where id='.$i);
	$imgf = '../upload/partner/'.$img;
	if(file_exists($imgf)){
	    @unlink($imgf);
	}
}

  $sql = "select * from partner order by id desc";
  $result = $pdo->prepare($sql);
  $result->execute();
  $row = $result->fetchAll(PDO::FETCH_NUM);
  $i=1;
  foreach($row as $v){
	  	  $i++;
	  if($i%2==0){
	      $c = '#FbFbFb';
	  }else{
		  $c = '#FFFFFF';
	  }
  ?>
  <tr bgcolor="<?php echo $c;?>"  onmouseover="this.bgColor='#fcf9cd'" onmouseout="this.bgColor='<?php echo $c;?>'">
    <td align="right" >
    <?php
	if(empty($v[3])){
		echo '文本链接';
	}else{
	?>
    <img src="../upload/partner/<?php echo $v[3];?>" border="0" width="90" height="50">
    <?php
	}
	?>
    </td>
    <td align="left" ><?php echo $v[1] ;?></td>
    <td align="left" ><?php echo $v[2] ;?></td>
    <td align="left"><a class="<?php if($v[4]==1){echo 'yes';}else{echo 'no';}?>" href="?id=<?php echo $v[0];?>&flag=<?php if($v[4]==1){echo 0;}else{echo 1;}?>"></a></td>
    <td align="left" ><span><a onclick="return confirm('确认删除吗?')" href="?id=<?php echo $v[0];?>&img=<?php echo $v[3];?>">删除</a></span></td>
  </tr>
  <?php } ?>
 <tr>
    <td colspan="5" align="left" bgcolor="#FbFbFb">
    
    <span class="s_btn_wr"><input onClick="location.href='partner_add.php'" type="button" value="添加链接" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>
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
