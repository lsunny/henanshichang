<?php 
require 'islogin.php';
require '../common/db.php';
require '../common/util.php'; 
if(isset($_POST["mysub"])){
	$c = $_POST["content"];
	$update = "UPDATE configs SET cwenhua='$c'";
	$pdo->exec($update);
}
$result = $pdo->query("SELECT cwenhua FROM configs");
?>
<!doctype html>
<html>
<head>
<meta charset="gbk" />
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
			<span id="ctitle">企业文化在线编辑</span>
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

  <tr bgcolor="#FFFFFF">
    <td align="right"">内容：</td>
    <td align="left">
	<textarea name="content" cols="98" rows="10"><?php echo $result->fetchColumn(); ?></textarea>
	</td>
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
<script charset="utf-8" src="/editor/kindeditor-min.js"></script>
<script charset="utf-8" src="/editor/lang/zh_CN.js"></script>
<script>
			var editor;
			KindEditor.ready(function(K) {
				editor = K.create('textarea[name="content"]', {
					allowFileManager : true,
					resizeType : 1 ,
					width:'90%',
					height:'450'
				});
			});

</script>
</html>
