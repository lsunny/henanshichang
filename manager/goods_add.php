<?php 
require 'islogin.php';
require '../common/db.php';
require '../common/util.php';
ini_set('max_execution_time','180');   
if(isset($_POST["mysub"])){
    $n  = $_POST['name'];
	$f = $_POST["flag"];
	$class = $_POST["goodsclass"];
	$_SESSION['goodsclass'] = $class;
	$c = $_POST["content"];
	$t = time();
	$user = isset($_POST["nfrom"]) ? $_POST["nfrom"] : '腾达东方';
	if($_FILES['img']['size']==0){
	    alert('请选择产品图片');
	}else if(strtolower(getExt($_FILES['img']['name']))!='.jpg'){
		alert('产品图片格式不是jpg');
	}else{
		$path = '../upload/product/';
		$name = uniqid();
		$ext = strtolower(getExt($_FILES['img']['name']));
		$names = $name.$ext;
	    move_uploaded_file($_FILES['img']['tmp_name'],$path.$names);
		$w = 135;
		$h = 112;
		$img = getimagesize($path.$names);
		$ww = $img[0];
		$hh = $img[1];
		$small = imagecreatetruecolor($w,$h);
		$bimg = imagecreatefromjpeg($path.$names);
		imagecopyresized($small,$bimg,0,0,0,0,$w,$h,$ww,$hh);
		$fsmallname = $name.'_small'.$ext;
		imagejpeg($small,$path.$fsmallname);
		$insert = "insert into goods values(null,'$n',$class,'$name','$c','$user',0,$f,'$t')";
		$pdo->exec($insert);
		go("goods_add.php");
	}
}

$result = $pdo->prepare("SELECT cid,ctitle,cpid,CONCAT(cpath,',',cid) AS abspath,clevel FROM goodsclass ORDER BY abspath");
$result->execute();
$row = $result->fetchAll(PDO::FETCH_NUM);
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
			<span id="ctitle">新工程展示</span>
			<span id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
		<div id="imiddle_center">
		<form method="post" enctype="multipart/form-data">
<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
 <tr>
    <td align="right" bgcolor="#FbFbFb">工程标题：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="name"></td>
  </tr>
    <tr>
    <td align="right" bgcolor="#FFFFFF">工程类别：</td>
    <td align="left" bgcolor="#FFFFFF">
	<select name="goodsclass">
	<?php 
	foreach($row as $v){
	?>
	<option value="<?php echo $v[0] ?>" 
	<?php 
	if(isset($_SESSION['goodsclass'])){
		if($v[0]==$_SESSION['goodsclass']){
			echo 'selected';
		}
	} 
	?> >
	<?php
	if($v[4]==1){
	    echo $v[1];
	}else{
	    echo '&nbsp;├'.str_repeat('─',$v[4]-1).$v[1];
	}
	?>
	</option>
	<?php }?>
	</select>
	</td>
  </tr>
  <tr bgcolor="#FbFbFb">
    <td width="10%" align="right">产品图片：</td>
    <td width="90%" align="left"><input type="file" name="img"/><span>(图片格式是jpg格式，格式转换请使用专业的做图软件不要直接修改扩展名）</span></td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right"">内容：</td>
    <td align="left">
	<textarea name="content" cols="98" rows="10">如果是图片作品展示：可以不写任何内容</textarea>
	</td>
  </tr>
  <tr bgcolor="#FbFbFb">
    <td align="right">是否可视：</td>
    <td align="left"><input type="radio" name="flag" value="1" id="f1" checked/><label for="f1">显示</label>
<input name="flag" type="radio" id="f2" value="0"/><label for="f2">不显示</label></td>
  </tr>
    <tr bgcolor="#FFFFFF">
    <td align="right"">作者：</td>
    <td align="left"><input type="text" name="nfrom" value="河南仕畅" />	</td>
  </tr>
      <tr>
    <td align="left" bgcolor="#FbFbFb" colspan="2"> <span class="s_btn_wr"><input type="submit" name="mysub" value="提交" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="s_btn_wr"><input type="reset" value="重置" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
  </tr>
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
