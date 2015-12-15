<?php 
header('Content-Type: text/html; charset=utf-8');
require 'islogin.php';
require '../common/db.php'; 
require '../common/Pager.pdo.class.php';

if(isset($_GET['action'])){
	if($_GET['action']=='del'){
    $id = $_GET["id"];
	$file = $_GET['path'];
	@unlink("../upfile/".$file);
	$pdo->exec("delete from dfdyyspx_news where news_id=$id");
	}
}

$currpage = isset ( $_GET ['p'] ) ? $_GET ['p'] : 1;
$pager = new Pager ( $pdo, 'dfdyyspx_news', 'news_id desc', "1=1", 10, $currpage,'*');

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
			<span id="ctitle">文章管理</span>
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
    <th width="5%" height="35" bgcolor="#F3F3F3">ID</th>
    <th width="25%" height="35" bgcolor="#F3F3F3">标题</th>
    <th width="25%" bgcolor="#F3F3F3">内容</th>
    <th width="25%" bgcolor="#F3F3F3">图片效果</th>
    <th width="5%" bgcolor="#F3F3F3">查看次数</th>
    <th width="10%" bgcolor="#F3F3F3">操作</th>
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
    <td  align="center"><?php echo $v[0]; ?></td>
    <td  align="center"><?php echo $v[2]; ?></td>
    <td align="center">
	<?php 
	    $t = strip_tags($v[3]);
        $t = preg_replace('/&nbsp;/','',$t);
        echo mb_substr($t,0,20,'utf-8').'...'; 
  
    ?>
	</td>
    <td  align="center">
    <?php
	$img = $v[1];
	if(strlen($v[1])==0){
	    echo '无图片';	
	}else{
	    echo "<img src='../upfile/$img' width=120 height=50 border=0 />";	
	}
	?>
    </td>
    <td  align="center"><?php echo $v[6]; ?></td>
    <td  align="center">
	<a href="newsupdate.php?id=<?php echo $v[0]; ?>">修改</a>&nbsp;
	<a onclick="return confirm('是否要删除产品')" href="?action=del&id=<?php echo $v[0];?>&path=<?php echo $v[1];?>">删除</a></td>
  </tr>
  <?php } ?>
  <tr bgcolor="#FFFFFF">
    <td align="center" colspan="6" style="line-height:35px">


 <?php $pager->pagenum(); ?>
</td>
  
   
  </tr>

    <tr bgcolor="#FFFFFF">
    <td align="center">&nbsp;</td>
    <td align="left" colspan='5'><span class="s_btn_wr"><input type="button" onclick="location.href='news_add.php'" value="发布新闻" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
   
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
