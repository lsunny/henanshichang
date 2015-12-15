<?php 
require 'islogin.php';
require '../common/db.php';

//设置管理的是否显示
if(isset($_GET['flag'],$_GET['id'])){
	update('hnsc_project',array('flag'=>$_GET['flag']),'id='.$_GET['id']);
}else if(isset($_GET['jflag'],$_GET['id'])){
	update('hnsc_project',array('jflag'=>$_GET['jflag']),'id='.$_GET['id']);
}else if(isset($_GET['delid'])){
	delete('hnsc_project','id='.$_GET['delid']);
	@unlink('../upload/project/'.$_GET['img']);
	@unlink('../upload/project/s_'.$_GET['img']);
}

$currpage = isset($_GET['p']) ? $_GET['p'] : 1;
$rs = pager('hnsc_project',$currpage,'*',20,'1=1','order by id desc');
$rows = $rs[0];
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>工程管理-后台管理系统Ver1.0</title>
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
			<span id="ctitle">精品工程管理</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
	
<table style="margin-top:5px" bgcolor="#999999" width="95%" border="0" align="center" cellpadding="5" cellspacing="1">
  <tr>
    <th height="35" bgcolor="#F3F3F3">标题</th>
    <th height="35" bgcolor="#F3F3F3">展示图片</th>
    <th bgcolor="#F3F3F3">浏览次数</th>
    <th bgcolor="#F3F3F3">发布时间</th>
    <th bgcolor="#F3F3F3">是否精品</th>
    <th bgcolor="#F3F3F3">是否显示</th>
    <th bgcolor="#F3F3F3">操作</th>
  </tr>
  <?php
  $i = 0;
  $color = "#FbFbFb";
  foreach($rows as $v){
  		  if(++$i % 2 == 0) { 
			  $color = '#FFFFFF';
		  }else{
			  
			  $color =  '#FBFBFB';
		 }
  ?>
  <tr bgcolor="<?php echo $color;?>" onmouseover="this.bgColor='#fcf9cd'" onmouseout="this.bgColor='<?php echo $color;?>'">
    <td width="7%" align="center"><?=$v[1]?></td>
    <td width="32%" align="center"><img src="../upload/project/s_<?=$v[2]?>"></td>
    <td width="16%" align="center"><?=$v[4]?></td>
    <td width="10%" align="center"><?=date('Y-m-d H:i:s',$v[5])?></td>
    <td width="10%" align="center">
    	<?php
		if($v[6]=='y'){
			printf("<a href='?id=%d&jflag=n'>设置普通工程</a>",$v[0]);
		}else{
			printf("<a href='?id=%d&jflag=y'>设置精品工程</a>",$v[0]);
		}
		?>
    </td>
    <td width="10%" align="center">
		<?php
		if($v[7]=='y'){
			printf("<a href='?id=%d&flag=n'>设置隐藏</a>",$v[0]);
		}else{
			printf("<a href='?id=%d&flag=y'>设置显示</a>",$v[0]);
		}
		?>
    </td>
    <td width="15%" align="center">
		<a onclick="return confirm('是否要删除产品')" href="?delid=<?=$v[0]?>&img=<?=$v[2]?>">删除</a>
    </td>
  	</tr>
  <?php } ?>
  <tr bgcolor="#FFFFFF">
    <td align="center" colspan="7" style="line-height:35px"><?=$rs[1]?></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="left" colspan='6'><span class="s_btn_wr"><input type="button" onclick="location.href='projectadd.php'" value="添加工程展示" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>
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
