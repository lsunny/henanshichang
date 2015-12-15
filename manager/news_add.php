<?php
header('Content-Type: text/html; charset=utf-8');
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
<script type="text/javascript" charset="utf-8" src="../ueditor/editor_all_min.js"></script>
<script type="text/javascript" charset="utf-8" src="../ueditor/editor_config.js"></script>
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
            <th width="10%" align="right">新闻标题：</th><td><input type="text" name="ntitle"/></td>
        </tr>
		<tr bgcolor="#FFFFFF">
            <th width="10%" align="right">类别：</th><td>
            <select name="ncategory">
			    <?php 
				$sql = "select cid,cname from dfdyyspx_news_category order by csort asc";
				$query = $pdo->query($sql);
				$row = $query->fetchAll(PDO::FETCH_NUM);
				foreach($row as $v){
				?>
                <option value="<?php echo $v[0]; ?>" <?php if(isset($_SESSION['category'])){echo $_SESSION['category']==$v[0] ? 'selected' : '';} ?> ><?php echo $v[1]; ?></option>
				<?php
				}
				?>
            </select>
			</td>
        </tr>

        <tr bgcolor="#FBFBFB">
            <th align="right">图片：</th><td><input type="file" name="nimg"/></td>
        </tr>
        
        <tr bgcolor="#FFFFFF">
            <th align="right">发布时间：</th><td><input type="text" name="ntime" value="<?php echo date('Y-m-d H:i:s'); ?>" onClick="WdatePicker({lang:'zh-cn',skin:'default',dateFmt:'yyyy-MM-dd HH:mm:ss'})" /></td>
        </tr>

        <tr bgcolor="#FBFBFB">
            <th align="right">来源：</th><td><input type="text" name="nfrom" value="河南艺术培训基地" onFocus="this.value=''"/></td>
        </tr>
        
        <tr bgcolor="#FBFBFB">
            <th align="right">内容：</th><td><script  id="editor" type="text/plain">这里可以书写，编辑器的初始内容</script></td>
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
<script type="text/javascript">
var ue = UE.getEditor('editor');
</script>