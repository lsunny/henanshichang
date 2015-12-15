<?php
header('Content-Type: text/html; charset=utf-8');
require 'islogin.php';
require '../common/db.php'; 
require '../common/util.php';
if(isset($_POST["mysub"])){
    $t = $_POST["title"];
	$c = $_POST["content"];
	$sql = "insert into job values(null,'$t','$c')";
	if($_POST["mysub"]=='修改'){
		$id = $_POST["id"];
	    $sql = "update job set jobtitle='$t',jobinfo='$c' where id=$id";
	}
	$pdo->exec($sql);
	go("job_manager.php");
}
$sub = "提交";
$t = "";
$c = "";
if(isset($_GET["update"])){
    $sub = "修改";
	$id = $_GET["id"];
	$query = $pdo->prepare("select * from job where id=$id");
	$query->execute();
	$row = $query->fetchAll(PDO::FETCH_NUM);
	print_r($row);
	$t = $row[0][1];
	$c = $row[0][2];
}
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
			<span id="ctitle">添加招聘</span>
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
 <tr bgcolor="#FbFbFb">
    <td align="right">职位：</td>
    <td align="left"><input type="text" name="title" size="40" value="<?php echo $t; ?>" />(如：业务人员2名)</td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right"">职位描述：</td>
    <td align="left">
	<textarea name="content" cols="98" rows="10"><?php echo $c; ?></textarea>
	<?php
	if(isset($_GET["id"])){
   	    echo "<input type='hidden' name='id' value='$id' />";
	} 
	?>
	</td>
  </tr>
      <tr>
    <td align="left" bgcolor="#FbFbFb" colspan="2"> <span class="s_btn_wr"><input type="submit" name="mysub" value="<?php echo $sub; ?>" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="s_btn_wr"><input type="reset" value="重置" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
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
<script charset="utf-8" src="/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="/editor/lang/zh_CN.js"></script>
<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					resizeType : 1 ,
					width:'90%',
					height:'350'
				});
			});

</script>
</html>
