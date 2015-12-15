<?php 
require 'islogin.php';
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
		<form action="projectsave.php" method="post" enctype="multipart/form-data">
<table style="margin-top:6px;" bgcolor="#999999" width="99%" border="0" align="center" cellpadding="5" cellspacing="1">
 <tr>
    <td align="right" bgcolor="#FbFbFb">工程名称：</td>
    <td align="left" bgcolor="#FbFbFb"><input type="text" name="title">&nbsp;&nbsp;发布时间:<input type="text" name="ntime" value="<?=date('Y-m-d H:i:s')?>"></td>
  </tr>
    <tr>
    <td align="right" bgcolor="#FFFFFF">工程图片：</td>
    <td align="left" bgcolor="#FFFFFF"><input type="file" name="img">
      (图片格式是jpg格式，格式转换请使用专业的做图软件不要直接修改扩展名）</td>
  </tr>
  <tr bgcolor="#FbFbFb">
    <td width="10%" align="right">工程内容：</td>
    <td width="90%" align="left">
    <script id="container" name="content" type="text/plain">
    工程内容可以不填写
    </script>
    <script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
			emotionLocalization:true, /*  表情本地化 */
			lang:'zh-cn',/*  指定编辑器语言 */
			initialFrameWidth:'100%',  //初始化编辑器宽度,默认1000
            initialFrameHeight:220,/*编辑器的高*/
			textarea:'content',/* 是表单名称，用来接值*/
			initialContent:'欢迎留言!',    //初始化编辑器的内容,也可以通过textarea/script给值，看官网例子
            autoClearinitialContent:true, //是
			elementPathEnabled:false
			/*focus:true*/
		});
    </script>
    </td>
  </tr>
  <tr bgcolor="#FFFFFF">
    <td align="right">是否是精品工程：</td>
    <td align="left"><label><input type="radio" name="jflag" value="y">精品工程</label>&nbsp;&nbsp;
<label><input type="radio" name="jflag" value="n" checked>工程</label></td>
  </tr>
  <tr bgcolor="#FbFbFb">
    <td align="right">是否显示：</td>
    <td align="left">
    <label><input type="radio" name="flag" value="y" checked>显示</label>&nbsp;&nbsp;
<label><input type="radio" name="flag" value="n">不显示</label>
    </td>
  </tr>
      <tr>
    <td align="left" bgcolor="#FFFFFF" colspan="2"> <span class="s_btn_wr"><input type="submit" value="提交" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="s_btn_wr"><input type="reset" value="重置" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span></td>
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
