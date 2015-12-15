<?php
require 'islogin.php';
include '../common/db.php';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8" />
<title>后台管理系统Ver1.0</title>

<link href="index.css" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/WdatePicker.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="../ueditor/ueditor.all.js"></script>
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
			<span id="cleft"></span> <span id="ctitle">添加新闻</span> <span
				id="cright"></span>
		</div>
		<div id="itop_right"></div>
	</div>
	<div id="imiddle">
		<div id="imiddle_left"></div>
		<!-- 正文 -->
        <div id="imiddle_center">
        <form action="newssave.php" method="post" enctype="multipart/form-data">
        <table style="margin:5px" bgcolor="#999999" width="100%" border="0" align="center" cellpadding="5" cellspacing="1">
        <tr bgcolor="#FBFBFB">
            <th width="10%" align="right">新闻标题：</th><td align="left"><input type="text" name="title"/></td>
        </tr>
		<tr bgcolor="#FFFFFF">
            <th width="10%" align="right">类别：</th><td align="left">
           <select name="cname">
	<?php
	$cc = query('hnsc_newsclass');
	foreach($cc as $v){
	    printf("<option value='%s'>%s</option>",$v[0],$v[0]);	
	}
	?>
</select>
			</td>
        </tr>

        
        <tr bgcolor="#FFFFFF">
            <th align="right">发布时间：</th><td align="left"><input type="text" name="ntime" value="<?=date('Y-m-d H:i:s')?>" onClick="WdatePicker({lang:'zh-cn',skin:'default',dateFmt:'yyyy-MM-dd HH:mm:ss'})" /></td>
        </tr>

        <tr bgcolor="#FBFBFB">
            <th align="right">来源：</th><td align="left"><input type="text" name="author" value="河南仕畅"></td>
        </tr>
        
        <tr bgcolor="#FBFBFB">
            <th align="right">内容：</th><td align="left">
 <script id="container" name="content" type="text/plain">
        这里写你的初始化内容
    </script>
    <script type="text/javascript">
        var ue = UE.getEditor('container',{
			emotionLocalization:true, /*  表情本地化 */
			lang:'zh-cn',/*  指定编辑器语言 */
			initialFrameWidth:'100%',  //初始化编辑器宽度,默认1000
            initialFrameHeight:320,/*编辑器的高*/
			textarea:'content',/* 是表单名称，用来接值*/
			initialContent:'欢迎留言!',    //初始化编辑器的内容,也可以通过textarea/script给值，看官网例子
            autoClearinitialContent:true, //是
			elementPathEnabled:false
			/*focus:true*/
		});
    </script>            
            </td>
        </tr>
        
        <tr bgcolor="#FBFBFB">
            <th>&nbsp;</th><td>
            <span class="s_btn_wr"><input type="submit" value="发布新闻" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;
            <span class="s_btn_wr"><input type="reset" value="重置" class="s_btn" onmousedown="this.className='s_btn s_btn_h'" onmouseout="this.className='s_btn'"></span>&nbsp;
            </td>
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